<?php
    
    class Feedback extends My_Controller
    {
        function __construct()
        
        {
            
            parent::__construct();
            
            $this->load->library('form_validation');
            $this->load->library('commonLibrary');
            $this->load->library('recaptcha');
            $this->load->model('sample');
            
        }
        
        function index()
        
        {
            
            
            $page['theme'] = 'theme_7';
            
            $page['meta_title'] = 'Feedback Form : SearchGurbani.com';
            
            $page['meta_description'] = 'Feedback Form -SearchGurbani.com';
            
            
            $this->load->view('pages/feedback', $page);
            
            
        }
        
        function send()
        
        {
            $recaptcha = $this->input->post('g-recaptcha-response');
            
            
            if($this->form_validation->run("feedback") == FALSE)
            {
                
                $page['theme'] = 'theme_7';
                
                $page['meta_title'] = 'Feedback Form : SearchGurbani.com';
                
                $page['meta_description'] = 'Feedback Form -SearchGurbani.com';
                
                
                $this->load->view('pages/feedback', $page);
                
                
            }
            else
            {
                
                $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

                $response = $this->recaptcha->verifyResponse($recaptchaResponse);

                if (isset($response['success']) and $response['success'] === TRUE)
                {
                    $subject = "New feedback @ SearchGurbani.Com";


                    $message
                        = '

				<p>Dear Admin,</p>

				<p>A new feedback was posted in SearchGurbani.com. Below are the details.   </p>

				<table border="0" cellspacing="0" cellpadding="3">

				  <tr>

					<td align="left" valign="top">Name</td>

					<td align="left" valign="top">:</td>

					<td align="left" valign="top">' . $this->input->post('name') . '</td>

				  </tr>

				  <tr>

					<td align="left" valign="top">Email ID </td>

					<td align="left" valign="top">:</td>

					<td align="left" valign="top">' . $this->input->post('emailid') . '</td>

				  </tr>

				  <tr>

					<td align="left" valign="top">Subject</td>

					<td align="left" valign="top">:</td>

					<td align="left" valign="top">' . $this->input->post('subject') . '</td>

				  </tr>

				  <tr>

					<td align="left" valign="top">Message</td>

					<td align="left" valign="top">:</td>

					<td align="left" valign="top">' . nl2br($this->input->post('message')) . '</td>

				  </tr>

				</table>

			';

                    
                    $this->commonlibrary->send($this->input->post('emailid'), "SG Notifications",
                        $this->config->item('feedback_email'), $subject, $message);
                    
                    $dataFb = array(
                        "date"       => date("Y-m-d H:i:s"),
                        "First_name" => $this->input->post('name'),
                        "Email"      => $this->input->post('emailid'),
                        "status"     => '2'
                    );

                    //            $dataRes = $this->sample->saveFedback($dataFb);
                    if($this->input->post('send_copy') == "yes")
                    {
                        
                        $subject = "Your feedback @ SearchGurbani.Com";
                        
                        $message
                            = '

					<p>Dear ' . $this->input->post('name') . ',</p>

					<p>Your feedback was posted in SearchGurbani.com. Below are the details.</p>

					<table border="0" cellspacing="0" cellpadding="3">

					  <tr>

						<td align="left" valign="top">Name</td>

						<td align="left" valign="top">:</td>

						<td align="left" valign="top">' . $this->input->post('name') . '</td>

					  </tr>

					  <tr>

						<td align="left" valign="top">Email ID </td>

						<td align="left" valign="top">:</td>

						<td align="left" valign="top">' . $this->input->post('emailid') . '</td>

					  </tr>

					  <tr>

						<td align="left" valign="top">Subject</td>

						<td align="left" valign="top">:</td>

						<td align="left" valign="top">' . $this->input->post('subject') . '</td>

					  </tr>

					  <tr>

						<td align="left" valign="top">Message</td>

						<td align="left" valign="top">:</td>

						<td align="left" valign="top">' . nl2br($this->input->post('message')) . '</td>

					  </tr>

					</table>

				';
                        
                        $this->commonlibrary->send($this->config->item('feedback_email_to_from'), "SG Notifications",
                                                   $this->input->post('emailid'), $subject,
                                                   $message);
                        
                    }


                    
                    $this->session->set_flashdata("response",
                                                  "<div class='success'>Your feedback posted</div>");
                    
                }
                else
                {
                    $this->session->set_flashdata('captchaFailed',
                                                  'Sorry Google Recaptcha Unsuccessful!!');
                }
                
                redirect('feedback');
                
            }
            
        }
    }