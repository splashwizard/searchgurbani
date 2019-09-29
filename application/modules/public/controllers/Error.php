<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends My_Controller
{

    function error_404()
    {
        $ar_301_redirects = array( // old_uri => new_uri
            "main.php?book=sri_guru_granth_sahib&action=intro" => "guru-granth-sahib/introduction",
            "main.php?book=sri_guru_granth_sahib&action=index" => "guru-granth-sahib/introduction",
            "main.php?book=sri_guru_granth_sahib&action=pagebypage" => "guru-granth-sahib/ang-by-ang",
            "main.php?book=sri_guru_granth_sahib&action=advsrch" => "guru-granth-sahib/search",
            "main.php?book=sri_guru_granth_sahib&action=pageindex" => "guru-granth-sahib/index/chapter",
            "main.php?book=sri_guru_granth_sahib&action=authorindex" => "guru-granth-sahib/author-index",
            "main.php?book=sri_guru_granth_sahib&action=pagebypage&page=" => "guru-granth-sahib/ang",
            "main.php?book=amrit_keertan&action=index" => "amrit-keertan",
            "main.php?book=amrit_keertan&action=pagebypage" => "amrit-keertan/page-by-page",
            "main.php?book=amrit_keertan&action=chapterindex" => "amrit-keertan/index/chapter",
            "main.php?book=amrit_keertan&action=alphaindex" => "amrit-keertan/english-index",
            "main.php?book=amrit_keertan&action=punjabiindex" => "amrit-keertan/punjabi-index",
            "main.php?book=amrit_keertan&action=hindiindex" => "amrit-keertan/hindi-index",
            "main.php?book=amrit_keertan&action=advsrch" => "amrit-keertan/search",
            "main.php?book=bhai_gurdas_vaaran&action=index" => "bhai-gurdas-vaaran/introduction",
            "main.php?book=bhai_gurdas_vaaran&action=pauripage" => "bhai-gurdas-vaaran/pauri-by-pauri",
            "main.php?book=bhai_gurdas_vaaran&action=vaarindex" => "bhai-gurdas-vaaran/vaar-index",
            "main.php?book=bhai_gurdas_vaaran&action=advsrch" => "bhai-gurdas-vaaran/search",
            "main.php?book=dasam_granth&action=index" => "dasam-granth/introduction",
            "main.php?book=dasam_granth&action=chapterindex" => "dasam-granth/index/chapter",
            "main.php?book=dasam_granth&action=pagebypage" => "dasam-granth/page-by-page",
            "main.php?book=dasam_granth&action=advsrch" => "dasam-granth/search",
            "main.php?book=mahan_kosh&action=index" => "mahan-kosh",
            "main.php?book=gurugranth_kosh&action=index" => "guru-granth-kosh",
            "main.php?book=sri_nanak_prakash&action=index" => "sri-nanak-prakash",
            "main.php?book=sri_gur_pratap_suraj_granth&action=index" => "sri-gur-pratap-suraj-granth",
            "main.php?book=faridkot_wala_teeka&action=index" => "faridkot-wala-teeka",
            "main.php?book=sri_guru_granth_darpan&action=index" => "sri-guru-granth-darpan",
            "main.php?book=maansarovar&action=index" => "maansarovar",
            "gurus/gurus.htm" => "gurus",
            "bhagats/bhagat-index.htm" => "bhagats",
            "bhagats/bhatt-index.htm" => "bhatts",
            "raags/index.php" => "raags",
            "fonts/index.php" => "unicode",
            "fonts" => "unicode",
            "preferen.php" => "preferences",
            "feedback" => "feedback",
            "sgdv" => "sgdv",
            "raags/raag_siri.php" => "raags/raag-siri",
            "raags/raag_devgandhari.php" => "raags/raag-devgandhari",
            "raags/raag_jaitsri.php" => "raags/raag-jaitsri",
            "raags/raag_bilaval.php" => "raags/raag-bilaval",
            "raags/raag_maru.php" => "raags/raag-maru",
            "raags/raag_sarang.php" => "raags/raag-sarang",
            "raags/raag_majh.php" => "raags/raag-majh",
            "raags/raag_bihagara.php" => "raags/raag-bihagara",
            "raags/raag_todi.php" => "raags/raag-todi",
            "raags/raag_gond.php" => "raags/raag-gond",
            "raags/raag_tukhari.php" => "raags/raag-tukhari",
            "raags/raag_malar.php" => "raags/raag-malar",
            "raags/raag_gauri.php" => "raags/raag-gauri",
            "raags/raag_vadahans.php" => "raags/raag-vadahans",
            "raags/raag_bairari.php" => "raags/raag-bairari",
            "raags/raag_ramkali.php" => "raags/raag-ramkali",
            "raags/raag_kedara.php" => "raags/raag-kedara",
            "raags/raag_kanara.php" => "raags/raag-kanara",
            "raags/raag_asa.php" => "raags/raag-asa",
            "raags/raag_sorathi.php" => "raags/raag-sorathi",
            "raags/raag_tilang.php" => "raags/raag-tilang",
            "raags/raag_nutnarain.php" => "raags/raag-nutnarain",
            "raags/raag_bhairav.php" => "raags/raag-bhairav",
            "raags/raag_kalyan.php" => "raags/raag-kalyan",
            "raags/raag_gujri.php" => "raags/raag-gujri",
            "raags/raag_dhanasri.php" => "raags/raag-dhanasri",
            "raags/raag_suhi.php" => "raags/raag-suhi",
            "raags/raag_maligaura.php" => "raags/raag-maligaura",
            "raags/raag_basant.php" => "raags/raag-basant",
            "raags/raag_prabhati.php" => "raags/raag-prabhati",
            "raags/raag_jaijaiwanti.php" => "raags/raag-jaijaiwanti"
        );
        
        foreach ($ar_301_redirects as $old_uri => $new_uri) {
            if (is_start_with($_SERVER['REQUEST_URI'], "/" . $old_uri)) {
                redirect($new_uri, 'location', 301);
                exit();
            }
        }

        echo set_status_header(404);

        $page['theme'] = 'theme_1';
        $page['meta_title'] = 'Search Gurbani : Gurbani Research Website';
        $page['meta_description'] = 'A comprehensive web site on research and  exploration of Sri Guru Granth Sahib, Amrit Keertan Gutka, Bhai Gurdas Vaaran, Kabit Bhai Gurdaas ,Sri Dasam Granth Sahib, exegesis , Gurbani, Gurbanee vichaar';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat Sangeet, Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan, Mahankosh, Kosh, Hukumnama, Baanis, Japji, jaap, Sukhmani, Ardaas';
    
        $page['title'] = '404 - Page Not Found';
        $page['content'] = 'The page you requested was not found.';

        $this->load->view('errors/404', $page);

    }
}