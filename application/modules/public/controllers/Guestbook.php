<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guestbook extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->library('recaptchalib');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('pagination');
        $this->load->model('dao/common_dao');
        $this->load->helper('captcha_generator');
        $this->load->library('recaptcha');
    }

    function index($index = 0)
    {
        $page['comments_count'] = $this->common_dao->get_guestbook_comments_count(array("status" => 1));

        $config = array('base_url' => site_url('guestbook/index'),
            'total_rows' => $page['comments_count'],
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a href="">',
            'cur_tag_close' => '</a></li>',
            'per_page' => '10'
        );
        $this->pagination->initialize($config);

        $page['comments'] = $this->common_dao->get_guestbook_comments(array("status" => 1), $index);
        $page['pagination_links'] = $this->pagination->create_links();

        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Guestbook:SearchGurbani.com';
        $page['meta_description'] = 'Guestbook -SearchGurbani.com';

        $this->load->view('pages/guestbook', $page);
    }

    function post()
    {

        if ($this->form_validation->run("guestbook") == FALSE) {

            $page['theme'] = 'theme_7';
            $page['meta_title'] = 'Guestbook:SearchGurbani.com';
            $page['meta_description'] = 'Guestbook -SearchGurbani.com';
            $this->load->view('pages/guestbook-post', $page);

        } else {

            $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

            $response = $this->recaptcha->verifyResponse($recaptchaResponse);

            if (isset($response['success']) and $response['success'] === TRUE) {
                $gb_data = array(
                    "created" => date("Y-m-d H:i:s"),
                    "updated" => date("Y-m-d H:i:s"),
                    "name" => $this->input->post("name"),
                    "email" => $this->input->post("email"),
                    "message" => $this->input->post("message"),
                    "status" => 1
                );
                $message = $this->common_dao->new_guestbook_comment($gb_data);
                if ($message == 'success') {
                    $subject = "New guestbook entry @ SearchGurbani.Com";
                    $message = '
                        <p>Dear Admin,</p>
                        <p>A new guestbook entry was made in SearchGurbani.com. Below are the details.   </p>
                        <table border="0" cellspacing="0" cellpadding="3">
                          <tr>
                            <td align="left" valign="top">Name</td>
                            <td align="left" valign="top">:</td>
                            <td align="left" valign="top">' . $this->input->post('name') . '</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">Email ID </td>
                            <td align="left" valign="top">:</td>
                            <td align="left" valign="top">' . $this->input->post('email') . '</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">Message</td>
                            <td align="left" valign="top">:</td>
                            <td align="left" valign="top">' . nl2br($this->input->post('message')) . '</td>
                          </tr>
                        </table>
			        ';

                    $config = Array(
                        'mailtype' => 'html', // html/text
                        'newline' => '\r\n',
                        'wordwrap' => TRUE
                    );
                    $this->email->initialize($config);

                    $this->email->from($this->config->item('guestbook_email'));
                    $this->email->to($this->input->post("email"));
                    $this->email->subject($subject);
                    $this->email->message($message);
                    $this->email->send();

                } else {
                    echo 'error';
                }
            } else {
                $this->session->set_flashdata('captchaFailed', 'Sorry Google Recaptcha Unsuccessful!!');
            }
            redirect('guestbook/index');
        }


    }

    function fbcaptcha_check($verification_code)
    {
        $this->load->helper('captcha_generator');
        if (check_captcha($verification_code)) {
            return true;
        } else {
            $this->form_validation->set_message('fbcaptcha_check', "The verification code you entered is wrong");
            return false;
        }
    }

    function ggcaptcha_check()
    {
        $resp = recaptcha_check_answer(PRIVATE_KEY,
            $_SERVER["REMOTE_ADDR"],
            $_POST["recaptcha_challenge_field"],
            $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
            return true;
        } else {
            $this->form_validation->set_message('ggcaptcha_check', "The verification code you entered is wrong");
            return false;
            //$error = $resp->error;
        }
    }

}