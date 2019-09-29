<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Preferences extends My_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $this->load->view('pages/preferences', $page);
    }

    function save()
    {
        global $SG_Preferences;
        $main_heading_rel = [
            'lang_1',
            'lang_14',
            'lang_26'
        ];
        $main_heading = $this->input->get('main_heading');

        $warning = '';
        foreach ($SG_Preferences as $pref_key => $pref_val) {
            if (in_array($pref_key, $main_heading_rel)) {

                foreach ($main_heading_rel as $rel_index => $rel_item) {
                    if ($rel_item == $main_heading) {
                        set_cookie($rel_item, "yes", 7 * 24 * 60 * 60); // one week expiry
                    } else {
                        set_cookie($rel_item, "no", 7 * 24 * 60 * 60); // one week expiry
                    }
                }

            } else {
                if ($this->input->get($pref_key) == '') {
                    set_cookie($pref_key, "no", 7 * 24 * 60 * 60); // one week expiry
                } else {
                    set_cookie($pref_key, $this->input->get($pref_key), 7 * 24 * 60 * 60); // one week expiry
                }
            }
        }

        if (empty($main_heading) and $this->input->get('lang_2') != "yes" and $this->input->get('lang_3') != "yes") {
            set_cookie('lang_1', "yes", 7 * 24 * 60 * 60);
            set_cookie('lang_2', "yes", 7 * 24 * 60 * 60);
            set_cookie('lang_3', "yes", 7 * 24 * 60 * 60);
            $warning = "Atleast Gurmuki, Phonetic English (Translitration) and Hindi should be selected";
        }

        if ($this->input->get('language')) {
            delete_cookie("csstypeG");
            setcookie("csstypeG", $this->input->get('language'), time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, TRUE);
        }

        if ($this->input->get('PhonEnglish')) {
            delete_cookie("PhonEnglish");
            setcookie("PhonEnglish", $this->input->get('PhonEnglish'), time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, TRUE);
        }

        if ($this->input->get('HinTrans')) {
            delete_cookie("HinTrans");
            setcookie("HinTrans", $this->input->get('HinTrans'), time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, TRUE);
        }

        if ($this->input->get('EngTrans')) {
            delete_cookie("EngTrans");
            setcookie("EngTrans", $this->input->get('EngTrans'), time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, TRUE);
        }


        $this->session->set_flashdata('referer', $this->input->get('referer'));
        $this->session->set_flashdata('response', '<div class="success">Preferences are updated. ' . $warning . '</div>');

        echo 'success';
    }

    function reset_defaults()
    {
        global $SG_Preferences;
        $warning = '';
        $SG_Preferences = array(
            'lang_1' => 'yes',
            'lang_2' => 'yes',
            'lang_3' => 'yes',
            'lang_4' => 'yes',
            'lang_5' => 'no',
            'lang_6' => 'no',
            'lang_7' => 'no',
            'lang_8' => 'no',
            'lang_9' => 'no',
            'lang_10' => 'no',
            'lang_11' => 'no',
            'lang_12' => 'no',
            'lang_13' => 'no',
            'lang_14' => 'no',
            'lang_15' => 'no',
            'lang_16' => 'no',
            'lang_17' => 'no',
            'lang_18' => 'no',
            'lang_19' => 'no',
            'lang_20' => 'no',
            'lang_21' => 'no',
            'lang_22' => 'no',
            'lang_23' => 'no',
            'lang_24' => 'no',
            'lang_25' => 'no',
            'lang_26' => 'no',
            'lang_27' => 'no',
            // Misc
            'text_type' => 'line_by_line',
            'share_text_name' => 'english',
            'share_type' => 'line',
            'ucharan_type' => 'normal',
            'main_heading' => 'lang_1',
            'mouse_over_gurmukhi_dictionary' => 'no',
            'show_attributes' => 'yes',
            'csstypeG' => 'arial',
            'PhonEnglish' => 'arial',
            'HinTrans' => 'arial',
            'EngTrans' => 'arial',
            'language' => 'Default'
        );
        foreach ($SG_Preferences as $pref_key => $pref_val) {
            delete_cookie($pref_key);
        }

        setcookie("csstypeG", 'WebAkharSlim', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, TRUE);
        setcookie("PhonEnglish", 'arial', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, TRUE);
        setcookie("HinTrans", 'arial', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, TRUE);
        setcookie("EngTrans", 'arial', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, TRUE);


        $this->session->set_flashdata('response', '<div class="success">Preferences are reset. ' . $warning . '</div>');

        echo json_encode($SG_Preferences);
    }

    function lareevar_assist_session_set()
    {

        global $SG_Preferences;

        $lareevar_assist = $this->input->get('lareevar_assist');
        set_cookie('lareevar_assist', $lareevar_assist, time() + 7 * 24 * 60 * 60);
        $SG_Preferences['lareevar_assist'] = $lareevar_assist;

        echo $lareevar_assist;
    }

    function sharing_session_set()
    {
        global $SG_Preferences;

        $sharing_session = $this->input->get('sharing_session');
        set_cookie('allow_share_lines', $sharing_session, time() + 7 * 24 * 60 * 60);
        $SG_Preferences['allow_share_lines'] = $sharing_session;

        echo $sharing_session;
    }
}