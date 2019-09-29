<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Shared extends My_Controller
{

    function __construct()
    {
        parent::__construct();

    }

    /**
     * SGGS - Line
     */
    function guru_granth_sahib($label1 = 'ang', $ang = 1, $label2 = 'line', $line_no = 1)
    {
        $this->load->model('dao/common_dao');

        if ($label1 == 'ang') {
            $data = array('table' => 'S01',
                'where' => array(
                    "lineID" => $line_no,
                    "pageID" => $ang
                )
            );
            $page_data['link'] = site_url('guru-granth-sahib/ang/' . $ang . '/line/' . $line_no);
            $page_data['title'] = 'Sri Guru Granth Sahib ji affirms:';
            $page_data['line'] = $this->common_dao->get_line($data);
            $page_data['attributes'] = 'Ang: ' . $ang . ', Line: ' . $line_no;

            // load the page
            $page_data['theme'] = 'theme_2';
            $page_data['meta_title'] = $page_data['title'];
            $page_data['meta_description'] = $this->get_description($page_data['line']);
            $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

            $this->load->view('components/shared', $page_data);
        } else if ($label1 == 'shabad') {
            $data = array('table' => 'S01',
                'where' => array(
                    "shabdlineID" => $line_no,
                    "shabdID" => $ang
                )
            );
            $page_data['link'] = site_url('guru-granth-sahib/shabad/' . $ang . '/line/' . $line_no);
            $page_data['title'] = 'Sri Guru Granth Sahib Ang';
            $page_data['line'] = $this->common_dao->get_line($data);
            $page_data['attributes'] = 'Shabad: ' . $ang . ', Line: ' . $line_no;

            // load the page
            $page_data['theme'] = 'theme_2';
            $page_data['meta_title'] = $page_data['title'];
            $page_data['meta_description'] = $this->get_description($page_data['line']);
            $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

            $this->load->view('components/shared', $page_data);
        } else {
            $data = array('table' => 'S01',
                'where' => array(
                    "verseID" => $ang,
                )
            );

            $page_data['title'] = 'Sri Guru Granth Sahib ji Verse';
            $page_data['lines'] = $this->common_dao->get_line_verse($data);
            $page_data['table'] = 'S01';

            // load the page
            $page_data['theme'] = 'theme_2';
            $page_data['meta_title'] = $page_data['title'];
            $page_data['meta_description'] = $this->get_description($page_data['lines']->result(), true);
            $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

            $this->load->view('components/shared-verse', $page_data);
        }
    }

    /**
     * AK - Line
     */
    function amrit_keertan($label1 = 'page', $page_no = 1, $label2 = 'line', $line_no = 1)
    {
        $this->load->model('dao/common_dao');
        $data = array('table' => 'A01',
            'where' => array(
                "pagelineID" => $line_no,
                "pageID" => $page_no
            )
        );

        $page_data['link'] = site_url('amrit-keertan/page/' . $page_no . '/line/' . $line_no);
        $page_data['title'] = 'Amrit Keertan Gutka';
        $page_data['line'] = $this->common_dao->get_line($data);
        $page_data['attributes'] = 'Page: ' . $page_no . ', Line: ' . $line_no;

        // load the page
        $page_data['theme'] = 'theme_3';
        $page_data['meta_title'] = $page_data['title'];
        $page_data['meta_description'] = $this->get_description($page_data['line']);
        $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('components/shared', $page_data);
    }

    private function get_description($line_data, $multi_array = false)
    {

        $meta_description = '';

        if ($multi_array) {

            foreach ($line_data as $index => $item) {

                if (isset($item->punjabi)) {
                    $meta_description .= html_escape($item->punjabi) . '<br/>';
                }
                if (isset($item->english)) {
                    $meta_description .= html_escape($item->english) . '<br/>';
                }
                if (isset($item->hindi)) {
                    $meta_description .= html_escape($item->hindi) . '<br/>';
                }

            }
        } else {

            if (isset($line_data->punjabi)) {
                $meta_description .= html_escape($line_data->punjabi) . '<br/>';
            }
            if (isset($line_data->english)) {
                $meta_description .= html_escape($line_data->english) . '<br/>';
            }
            if (isset($line_data->hindi)) {
                $meta_description .= html_escape($line_data->hindi) . '<br/>';
            }

        }

        return $meta_description;
    }

    /**
     * AK - Shabad Line
     */
    function amrit_keertan_shabad($shabad = 'shabad', $shabad_id = '', $shabad_text = 'shabad-text', $label1 = 'line', $line_no)
    {
        $this->load->model('dao/common_dao');
        $data = array('table' => 'A01',
            'where' => array(
                "pagelineID" => $line_no,
                "shabadID" => $shabad_id
            )
        );

        $page_data['link'] = site_url('amrit-keertan/' . $shabad . '/' . $shabad_id . '/' . $shabad_text . '/line/' . $line_no);
        $page_data['title'] = 'Amrit Keertan Shabad';
        $page_data['line'] = $this->common_dao->get_line($data);
        $page_data['attributes'] = 'Shabad: ' . $shabad_id . ', Line: ' . $line_no;

        // load the page
        $page_data['theme'] = 'theme_3';
        $page_data['meta_title'] = $page_data['title'];
        $page_data['meta_description'] = $this->get_description($page_data['line']);
        $page_data['meta_keywords'] = 'Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan, shabad, shabd, Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('components/shared', $page_data);
    }

    /**
     * BGV - Line
     */
    function bhai_gurdas_vaaran($label1 = 'vaar', $vaar_no = 1, $label2 = 'pauri', $pauri_no = 1, $label3 = 'line', $line_no)
    {
        $this->load->model('dao/common_dao');
        $data = array('table' => 'B01',
            'where' => array(
                "vaarID" => $vaar_no,
                "pauriID" => $pauri_no,
                "pauri_lineID" => $line_no
            )
        );

        $page_data['link'] = site_url('bhai-gurdas-vaaran/vaar/' . $vaar_no . '/pauri/' . $pauri_no . '/line/' . $line_no);
        $page_data['title'] = 'Bhai Gurdas Vaaran';
        $page_data['line'] = $this->common_dao->get_line($data);
        $page_data['attributes'] = 'Vaar: ' . $vaar_no . ', Pauri: ' . $pauri_no . ', Line: ' . $line_no;

        // load the page
        $page_data['theme'] = 'theme_4';
        $page_data['meta_title'] = $page_data['title'];
        $page_data['meta_description'] = $this->get_description($page_data['line']);
        $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('components/shared', $page_data);
    }

    /**
     * DG - Line
     */
    function dasam_granth($label1 = 'page', $page_no = 1, $label2 = 'line', $line_no = 1)
    {
        $this->load->model('dao/common_dao');

        if ($label1 == 'page') {
            $data = array('table' => 'D01',
                'where' => array(
                    "pagelineID" => $line_no,
                    "pageID" => $page_no
                )
            );

            $page_data['link'] = site_url('dasam-granth/page/' . $page_no . '/line/' . $line_no);
            $page_data['title'] = 'Sri Dasam Granth Sahib';
            $page_data['line'] = $this->common_dao->get_line($data);
            $page_data['attributes'] = 'Page: ' . $page_no . ', Line: ' . $line_no;

            // load the page
            $page_data['theme'] = 'theme_5';
            $page_data['meta_title'] = $page_data['title'];
            $page_data['meta_description'] = $this->get_description($page_data['line']);
            $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

            $this->load->view('components/shared', $page_data);

        } else if ($label1 == 'shabad') {

            $data = array('table' => 'D01',
                'where' => array(
                    "shabdlineID" => $line_no,
                    "shabdID" => $page_no
                )
            );

            $page_data['link'] = site_url('dasam-granth/shabad/' . $page_no . '/line/' . $line_no);
            $page_data['title'] = 'Sri Dasam Granth Sahib Page';
            $page_data['line'] = $this->common_dao->get_line($data);
            $page_data['attributes'] = 'Page: ' . $page_no . ', Line: ' . $line_no;

            // load the page
            $page_data['theme'] = 'theme_5';
            $page_data['meta_title'] = $page_data['title'];
            $page_data['meta_description'] = $this->get_description($page_data['line']);
            $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

            $this->load->view('components/shared', $page_data);
        } else {
            $data = array('table' => 'D01',
                'where' => array(
                    "verseID" => $page_no
                )
            );

            $page_data['title'] = 'Sri Dasam Granth Sahib Verse';
            $page_data['lines'] = $this->common_dao->get_line_verse($data);
            $page_data['table'] = 'D01';

            // load the page
            $page_data['theme'] = 'theme_5';
            $page_data['meta_title'] = $page_data['title'];
            $page_data['meta_description'] = $this->get_description($page_data['lines']->result(), true);
            $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

            $this->load->view('components/shared-verse', $page_data);
        }
    }

    /**
     * KS - Line
     */
    function kabit_savaiye($label1 = 'kabit', $page_no = 1, $label2 = 'line', $line_no = 1)
    {
        $this->load->model('dao/common_dao');
        $data = array('table' => 'K01',
            'where' => array(
                "lineID" => $line_no,
                "kabitID" => $page_no
            )
        );

        $page_data['link'] = site_url('kabit-savaiye/kabit/' . $page_no . '/line/' . $line_no);
        $page_data['title'] = 'Kabit Savaiye';
        $page_data['line'] = $this->common_dao->get_line($data);
        $page_data['attributes'] = 'Kabit: ' . $page_no . ', Line: ' . $line_no;

        // load the page
        $page_data['theme'] = 'theme_6';
        $page_data['meta_title'] = $page_data['title'];
        $page_data['meta_description'] = $this->get_description($page_data['line']);
        $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('components/shared', $page_data);
    }

    /**
     * Bhai Nand Lal - Line
     */
    function bhai_nand_lal($type = 'ghazal', $title1 = 'page', $page_no = 1, $title2 = 'line', $line_no = 1)
    {
        if ($title1 != 'verse') {
            if ($type == 'quatrains') {
                $page_ID = $page_no + 63;
            } else if ($type == 'zindginama') {
                $page_ID = $page_no + 82;
            } else if ($type == 'ganjnama') {
                $page_ID = $page_no + 124;
            } else if ($type == 'jot-bikas') {
                $page_ID = $page_no + 158;
            } else if ($type == 'jot-bikas-persian') {
                $page_ID = $page_no + 143;
            } else if ($type == 'rahitnama') {
                $page_ID = $page_no + 162;
            } else if ($type == 'tankahnama') {
                $page_ID = $page_no + 166;
            } else {
                $page_ID = $page_no;
            }
        }

        $this->load->model('dao/common_dao');

        $ar_scripts = array(
            'ghazal' => 'Ghazal',
            'quatrains' => 'Rubaaee',
            'zindginama' => 'Zindginama',
            'ganjnama' => 'Ganjnaama',
            'jot-bikas' => 'Jot Bigaas Punjabi',
            'jot-bikas-persian' => 'Jot Bigaas Persian',
            'rahitnama' => 'Rahitnama',
            'tankahnama' => 'Tankahnama'
        );
        if ($title1 == 'page') {
            $data = array('table' => 'N01',
                'where' => array(
                    "name" => $ar_scripts[$type],
                    "pageID" => $page_ID,
                    "pagelineID" => $line_no
                )
            );

            $page_data['link'] = site_url('bhai-nand-lal/' . $type . '/page/' . $page_no . '/line/' . $line_no);
            $page_data['title'] = 'Bhai Nand Lal - ' . $ar_scripts[$type];
            $page_data['line'] = $this->common_dao->get_line($data);
            $page_data['attributes'] = 'Page: ' . $page_no . ', Line: ' . $line_no;

            // load the page
            $page_data['theme'] = 'theme_7';
            $page_data['meta_title'] = $page_data['title'];
            $page_data['meta_description'] = $this->get_description($page_data['line']);
            $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

            $this->load->view('components/shared', $page_data);
        } else {

            $data = array('table' => 'N01',
                'where' => array(
                    "name" => $ar_scripts[$type],
                    "verseID" => $page_no,
                )
            );
            $page_data['title'] = 'Bhai Nand Lal - ' . $ar_scripts[$type] . ' Verse';
            $page_data['lines'] = $this->common_dao->get_line_verse($data);

            $page_data['table'] = 'N01';
            $page_data['name'] = $type;

            // load the page
            $page_data['theme'] = 'theme_7';
            $page_data['meta_title'] = $page_data['title'];
            $page_data['meta_description'] = $this->get_description($page_data['lines']->result(), true);
            $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

            $this->load->view('components/shared-verse', $page_data);
        }

    }

    function bhai_nand_lal_shabad($type = 'ghazal', $title1 = 'shabad', $page_no = 1, $title2 = 'line', $line_no = 1)
    {

        $this->load->model('dao/common_dao');

        $ar_scripts = array(
            'ghazal' => 'Ghazal',
            'quatrains' => 'Rubaaee',
            'zindginama' => 'Zindginama',
            'ganjnama' => 'Ganjnaama',
            'jot-bikas' => 'Jot Bigaas Punjabi',
            'jot-bikas-persian' => 'Jot Bigaas Persian',
            'rahitnama' => 'Rahitnama',
            'tankahnama' => 'Tankahnama'
        );
        $data = array('table' => 'N01',
            'where' => array(
                "name" => $ar_scripts[$type],
                "shabadID" => $page_no,
                "shabadlineID" => $line_no
            )
        );

        $page_data['link'] = site_url('bhai-nand-lal/' . $type . '/shabad/' . $page_no . '/line/' . $line_no);
        $page_data['title'] = 'Bhai Nand Lal - ' . $ar_scripts[$type] . ' Page';
        $page_data['line'] = $this->common_dao->get_line($data);
        $page_data['attributes'] = 'shabad: ' . $page_no . ', Line: ' . $line_no;

        // load the page
        $page_data['theme'] = 'theme_7';
        $page_data['meta_title'] = $page_data['title'];
        $page_data['meta_description'] = $this->get_description($page_data['line']);
        $page_data['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('components/shared', $page_data);
    }
}
