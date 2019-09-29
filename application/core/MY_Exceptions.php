<?php defined('BASEPATH') OR exit('No direct script access allowed');
    
    class MY_Exceptions extends CI_Exceptions
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function show_404($page = '', $log_error = true)
        {
            if (is_cli()) {
                $heading = 'Not Found';
                $message = 'The controller/method pair you requested was not found.';
            } else {
                $heading = '404 Page Not Found';
                $message = 'The page you requested was not found.';
            }
            
            // By default we log this, but allow a dev to skip it
            if ($log_error) {
                log_message('error', $heading . ': ' . $page);
            }
            
            $CI =& get_instance();
            $CI->load->library('uri');
            $uri = $CI->uri->uri_string();
            $uri_seg_1 = $CI->uri->segment(1);
            $uri_seg_2 = $CI->uri->segment(2);
            $uri_seg_3 = $CI->uri->segment(3);
            $uri_seg_4 = $CI->uri->segment(4);
            
            $ar_301_redirects = [];
            
            if (in_array($uri_seg_1, ['amrit_keertan'])) {
                
                if ($uri_seg_2 == 'chapter_index') {
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        $uri => empty($uri_seg_3) ? 'amrit-keertan/index/chapter' : (empty($uri_seg_4) ? "amrit-keertan/chapter/$uri_seg_3" : "amrit-keertan/chapter/$uri_seg_3/$uri_seg_4")
                    ]);
                } elseif ($uri_seg_2 == 'chapter') {
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        $uri => empty($uri_seg_3) ? 'amrit-keertan/index/chapter' : (empty($uri_seg_4) ? "amrit-keertan/chapter/$uri_seg_3" : "amrit-keertan/chapter/$uri_seg_3/$uri_seg_4")
                    ]);
                } elseif ($uri_seg_2 == 'english_index') {
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        $uri => empty($uri_seg_3) ? 'amrit-keertan/index/english' : "amrit-keertan/index/english/$uri_seg_3"
                    ]);
                } elseif ($uri_seg_2 == 'hindi_index') {
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        $uri => empty($uri_seg_3) ? 'amrit-keertan/index/hindi' : "amrit-keertan/index/hindi/$uri_seg_3"
                    ]);
                } elseif ($uri_seg_2 == 'punjabi_index') {
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        $uri => empty($uri_seg_3) ? 'amrit-keertan/index/punjabi' : "amrit-keertan/index/punjabi/$uri_seg_3"
                    ]);
                } else {
                    if (strpos($uri, 'amrit_keertan/page') !== false) {
                        $ar_301_redirects = array_merge($ar_301_redirects, [
                            $uri => $uri,
                        ]);
                    } elseif (strpos($uri, 'amrit_keertan/shabad') !== false) {
                        
                        $CI =& get_instance();
                        $CI->db->where('shabadID', 15000 + $uri_seg_3);
                        $query = $CI->db->get('AS01');
                        $row = $query->row_array();
                        
                        if (!empty($row)) {
                            $ar_301_redirects = array_merge($ar_301_redirects, [
                                $uri => ('amrit-keertan/shabad/' . $row['shabadID'] . '/' .
                                         url_title($row['shabad_name'])),
                            ]);
                        }
                    }
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        'amrit_keertan/search'       => 'amrit-keertan/search',
                        'amrit_keertan/page_by_page' => 'amrit-keertan/page-by-page',
                        'amrit_keertan/introduction' => 'amrit-keertan/introduction',
                    ]);
                }
                
            } elseif ($uri_seg_1 == 'baanis') {
                
                $ar_301_redirects = array_merge($ar_301_redirects, array(
                    'baanis/aarti'                => str_replace('_', '-', $uri),
                    'baanis/akal_ustati'          => str_replace('_', '-', $uri),
                    'baanis/anand_sahib'          => str_replace('_', '-', $uri),
                    'baanis/anand_sahib_bhog'     => str_replace('_', '-', $uri),
                    'baanis/asa_ki_vaar'          => str_replace('_', '-', $uri),
                    'baanis/baarah_maaha'         => str_replace('_', '-', $uri),
                    'baanis/baavan_akhree'        => str_replace('_', '-', $uri),
                    'baanis/bachitar_natak'       => str_replace('_', '-', $uri),
                    'baanis/chaubolay_m5'         => str_replace('_', '-', $uri),
                    'baanis/chaupai_sahib'        => str_replace('_', '-', $uri),
                    'baanis/dhakanee_oankaar'     => str_replace('_', '-', $uri),
                    'baanis/dukh_bhanjani_sahib'  => str_replace('_', '-', $uri),
                    'baanis/gathaa'               => str_replace('_', '-', $uri),
                    'baanis/jaap_sahib'           => str_replace('_', '-', $uri),
                    'baanis/japji_sahib'          => str_replace('_', '-', $uri),
                    'baanis/kirtan_sohila'        => str_replace('_', '-', $uri),
                    'baanis/laavan_anand_karaj'   => str_replace('_', '-', $uri),
                    'baanis/phunhay_m5'           => str_replace('_', '-', $uri),
                    'baanis/ramkali_sadh'         => str_replace('_', '-', $uri),
                    'baanis/rehraas_sahib'        => str_replace('_', '-', $uri),
                    'baanis/salok_farid_ji'       => str_replace('_', '-', $uri),
                    'baanis/salok_kabeer_ji'      => str_replace('_', '-', $uri),
                    'baanis/salok_m9'             => str_replace('_', '-', $uri),
                    'baanis/salok_sehskritee'     => str_replace('_', '-', $uri),
                    'baanis/savaiye_m1'           => str_replace('_', '-', $uri),
                    'baanis/savaiye_m2'           => str_replace('_', '-', $uri),
                    'baanis/savaiye_m3'           => str_replace('_', '-', $uri),
                    'baanis/savaiye_m4'           => str_replace('_', '-', $uri),
                    'baanis/savaiye_m5'           => str_replace('_', '-', $uri),
                    'baanis/shabad_hazare'        => str_replace('_', '-', $uri),
                    'baanis/sidh_gosht'           => str_replace('_', '-', $uri),
                    'baanis/sukhmana_sahib'       => str_replace('_', '-', $uri),
                    'baanis/sukhmani_sahib'       => str_replace('_', '-', $uri),
                    'baanis/tvai_prasadh_savaiye' => str_replace('_', '-', $uri),
                ));
                
            } elseif ($uri_seg_1 == 'raags') {
                
                $ar_301_redirects = array_merge($ar_301_redirects, array(
                    'raags/raag_asa'         => str_replace('_', '-', $uri),
                    'raags/raag_bairari'     => str_replace('_', '-', $uri),
                    'raags/raag_basant'      => str_replace('_', '-', $uri),
                    'raags/raag_bhairav'     => str_replace('_', '-', $uri),
                    'raags/raag_bihagara'    => str_replace('_', '-', $uri),
                    'raags/raag_bilaval'     => str_replace('_', '-', $uri),
                    'raags/raag_devgandhari' => str_replace('_', '-', $uri),
                    'raags/raag_dhanasri'    => str_replace('_', '-', $uri),
                    'raags/raag_gauri'       => str_replace('_', '-', $uri),
                    'raags/raag_gond'        => str_replace('_', '-', $uri),
                    'raags/raag_gujri'       => str_replace('_', '-', $uri),
                    'raags/raag_jaijaiwanti' => str_replace('_', '-', $uri),
                    'raags/raag_jaitsri'     => str_replace('_', '-', $uri),
                    'raags/raag_kalyan'      => str_replace('_', '-', $uri),
                    'raags/raag_kanara'      => str_replace('_', '-', $uri),
                    'raags/raag_kedara'      => str_replace('_', '-', $uri),
                    'raags/raag_majh'        => str_replace('_', '-', $uri),
                    'raags/raag_malar'       => str_replace('_', '-', $uri),
                    'raags/raag_maligaura'   => str_replace('_', '-', $uri),
                    'raags/raag_maru'        => str_replace('_', '-', $uri),
                    'raags/raag_nutnarain'   => str_replace('_', '-', $uri),
                    'raags/raag_prabhati'    => str_replace('_', '-', $uri),
                    'raags/raag_ramkali'     => str_replace('_', '-', $uri),
                    'raags/raag_sarang'      => str_replace('_', '-', $uri),
                    'raags/raag_siri'        => str_replace('_', '-', $uri),
                    'raags/raag_sorathi'     => str_replace('_', '-', $uri),
                    'raags/raag_suhi'        => str_replace('_', '-', $uri),
                    'raags/raag_tilang'      => str_replace('_', '-', $uri),
                    'raags/raag_todi'        => str_replace('_', '-', $uri),
                    'raags/raag_tukhari'     => str_replace('_', '-', $uri),
                    'raags/raag_vadahans'    => str_replace('_', '-', $uri),
                    'raags/thaat_asavari'    => str_replace('_', '-', $uri),
                    'raags/thaat_bhairav'    => str_replace('_', '-', $uri),
                    'raags/thaat_bhairavi'   => str_replace('_', '-', $uri),
                    'raags/thaat_bilaval'    => str_replace('_', '-', $uri),
                    'raags/thaat_kafi'       => str_replace('_', '-', $uri),
                    'raags/thaat_kalyan'     => str_replace('_', '-', $uri),
                    'raags/thaat_khamaj'     => str_replace('_', '-', $uri),
                    'raags/thaat_marwa'      => str_replace('_', '-', $uri),
                    'raags/thaat_poorvi'     => str_replace('_', '-', $uri),
                    'raags/thaat_todi'       => str_replace('_', '-', $uri),
                ));
                
            } elseif ($uri_seg_1 == 'taal') {
                
                $ar_301_redirects = array_merge($ar_301_redirects, array(
                    'taal/taal_dadra' => str_replace('_', '-', $uri),
                    'taal/taal_rupak' => str_replace('_', '-', $uri),
                    'taal/taal_teen'  => str_replace('_', '-', $uri),
                ));
                
            } elseif ($uri_seg_1 == 'bhagats') {
                
                $ar_301_redirects = array_merge($ar_301_redirects, array(
                    'bhagats/baba_farid'       => str_replace('_', '-', $uri),
                    'bhagats/bhagat_beni'      => str_replace('_', '-', $uri),
                    'bhagats/bhagat_bhikan'    => str_replace('_', '-', $uri),
                    'bhagats/bhagat_dhanna'    => str_replace('_', '-', $uri),
                    'bhagats/bhagat_jaidev'    => str_replace('_', '-', $uri),
                    'bhagats/bhagat_kabir'     => str_replace('_', '-', $uri),
                    'bhagats/bhagat_namdev'    => str_replace('_', '-', $uri),
                    'bhagats/bhagat_parmanand' => str_replace('_', '-', $uri),
                    'bhagats/bhagat_pipa'      => str_replace('_', '-', $uri),
                    'bhagats/bhagat_ramanand'  => str_replace('_', '-', $uri),
                    'bhagats/bhagat_ravidas'   => str_replace('_', '-', $uri),
                    'bhagats/bhagat_sadhna'    => str_replace('_', '-', $uri),
                    'bhagats/bhagat_sain'      => str_replace('_', '-', $uri),
                    'bhagats/bhagat_surdas'    => str_replace('_', '-', $uri),
                    'bhagats/bhagat_trilochan' => str_replace('_', '-', $uri),
                ));
                
            } elseif ($uri_seg_1 == 'bhai_gurdas_vaaran') {
                
                if ($uri_seg_2 == 'vaar_index') {
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        $uri => empty($uri_seg_3) ? 'bhai-gurdas-vaaran/index/vaar' : "bhai-gurdas-vaaran/index/vaar/$uri_seg_3"
                    ]);
                } else {
                    $ar_301_redirects = array_merge($ar_301_redirects, array(
                        $uri => str_replace('_', '-', $uri),
                    ));
                }
                
            } elseif ($uri_seg_1 == 'bhai_nand_lal') {
                
                $ar_301_redirects = array_merge($ar_301_redirects, array(
                    'bhai_nand_lal/ganjnama'                         => str_replace('_', '-', $uri),
                    'bhai_nand_lal/ganjnama/page'                    => str_replace('_', '-', $uri),
                    'bhai_nand_lal/ghazal'                           => str_replace('_', '-', $uri),
                    'bhai_nand_lal/ghazal/page'                      => str_replace('_', '-', $uri),
                    'bhai_nand_lal/introduction'                     => str_replace('_', '-', $uri),
                    'bhai_nand_lal'                                  => str_replace('_', '-', $uri),
                    'bhai_nand_lal/jot_bikas'                        => str_replace('_', '-', $uri),
                    'bhai_nand_lal/jot_bikas/page'                   => str_replace('_', '-', $uri),
                    'bhai_nand_lal/quatrains'                        => str_replace('_', '-', $uri),
                    'bhai_nand_lal/quatrains/page'                   => str_replace('_', '-', $uri),
                    'bhai_nand_lal/rahitnama'                        => str_replace('_', '-', $uri),
                    'bhai_nand_lal/rahitnama/page'                   => str_replace('_', '-', $uri),
                    'bhai_nand_lal/tankahnama'                       => str_replace('_', '-', $uri),
                    'bhai_nand_lal/tankahnama/page'                  => str_replace('_', '-', $uri),
                    'bhai_nand_lal/zindginama'                       => str_replace('_', '-', $uri),
                    'bhai_nand_lal/zindginama/page'                  => str_replace('_', '-', $uri),
                    'bhai_nand_lal/search_bhai_nand_lal/search_form' => 'bhai-nand-lal/search',
                ));
                
            } elseif ($uri_seg_1 == 'dasam_granth') {
                
                if ($uri_seg_2 == 'chapter_index') {
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        $uri => empty($uri_seg_3) ? 'dasam-granth/index/chapter/en' : "dasam-granth/index/chapter/$uri_seg_3"
                    ]);
                } else {
                    $ar_301_redirects = array_merge($ar_301_redirects, array(
                        $uri => str_replace('_', '-', $uri),
                    ));
                }
                
            } elseif (in_array($uri_seg_1, [
                'faridkot_wala_teeka',
                'guru_granth_kosh',
                'mahan_kosh',
                'kabit_savaiye',
                'sri_gur_pratap_suraj_granth',
                'sri_guru_granth_darpan',
                'sri_nanak_prakash'
            ])) {
                
                $ar_301_redirects = array_merge($ar_301_redirects, array(
                    $uri => str_replace('_', '-', $uri),
                ));
                
            } elseif ($uri_seg_1 == 'guru_granth_sahib') {
                
                if ($uri_seg_2 == 'chapter_index') {
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        $uri => 'guru-granth-sahib/index/chapter'
                    ]);
                } elseif ($uri_seg_2 == 'author_index') {
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        $uri => 'guru-granth-sahib/index/author'
                    ]);
                } elseif ($uri_seg_2 == 'author') {
                    $ar_301_redirects = array_merge($ar_301_redirects, [
                        $uri => empty($uri_seg_3) ? 'guru-granth-sahib/author' : "guru-granth-sahib/author/" .
                                                                                 url_title(str_replace('%20',
                                                                                     '-',
                                                                                     $uri_seg_3),
                                                                                     '-', true)
                    ]);
                } else {
                    $ar_301_redirects = array_merge($ar_301_redirects, array(
                        $uri => str_replace('_', '-', $uri),
                    ));
                }
                
            } else {
                $ar_301_redirects = array_merge($ar_301_redirects, array( // old_uri => new_uri
                                                                          "main.php?book=sri_guru_granth_sahib&action=intro"            => "guru-granth-sahib",
                                                                          "main.php?book=sri_guru_granth_sahib&action=index"            => "guru-granth-sahib",
                                                                          "main.php?book=sri_guru_granth_sahib&action=pagebypage"       => "guru-granth-sahib/ang-by-ang",
                                                                          "main.php?book=sri_guru_granth_sahib&action=advsrch"          => "guru-granth-sahib/search",
                                                                          "main.php?book=sri_guru_granth_sahib&action=pageindex"        => "guru-granth-sahib/index/chapter",
                                                                          "main.php?book=sri_guru_granth_sahib&action=authorindex"      => "guru-granth-sahib/index/author",
                                                                          "main.php?book=sri_guru_granth_sahib&action=pagebypage&page=" => "guru-granth-sahib/ang",
                                                                          "main.php?book=amrit_keertan&action=index"                    => "amrit-keertan",
                                                                          "main.php?book=amrit_keertan&action=pagebypage"               => "amrit-keertan/page-by-page",
                                                                          "main.php?book=amrit_keertan&action=chapterindex"             => "amrit-keertan/index/chapter",
                                                                          "main.php?book=amrit_keertan&action=alphaindex"               => "amrit-keertan/index/english",
                                                                          "main.php?book=amrit_keertan&action=punjabiindex"             => "amrit-keertan/index/punjabi",
                                                                          "main.php?book=amrit_keertan&action=hindiindex"               => "amrit-keertan/index/hindi",
                                                                          "main.php?book=amrit_keertan&action=advsrch"                  => "amrit-keertan/search",
                                                                          "main.php?book=bhai_gurdas_vaaran&action=index"               => "bhai-gurdas-vaaran",
                                                                          "main.php?book=bhai_gurdas_vaaran&action=pauripage"           => "bhai-gurdas-vaaran/pauri-by-pauri",
                                                                          "main.php?book=bhai_gurdas_vaaran&action=vaarindex"           => "bhai-gurdas-vaaran/index/vaar",
                                                                          "main.php?book=bhai_gurdas_vaaran&action=advsrch"             => "bhai-gurdas-vaaran/search",
                                                                          "main.php?book=dasam_granth&action=index"                     => "dasam-granth",
                                                                          "main.php?book=dasam_granth&action=chapterindex"              => "dasam-granth/index/chapter",
                                                                          "main.php?book=dasam_granth&action=pagebypage"                => "dasam-granth/page-by-page",
                                                                          "main.php?book=dasam_granth&action=advsrch"                   => "dasam-granth/search",
                                                                          "main.php?book=mahan_kosh&action=index"                       => "mahan-kosh",
                                                                          "main.php?book=gurugranth_kosh&action=index"                  => "guru-granth-kosh",
                                                                          "main.php?book=sri_nanak_prakash&action=index"                => "sri-nanak-prakash",
                                                                          "main.php?book=sri_gur_pratap_suraj_granth&action=index"      => "sri-gur-pratap-suraj-granth",
                                                                          "main.php?book=faridkot_wala_teeka&action=index"              => "faridkot-wala-teeka",
                                                                          "main.php?book=sri_guru_granth_darpan&action=index"           => "sri-guru-granth-darpan",
                                                                          "main.php?book=maansarovar&action=index"                      => "maansarovar",
                                                                          "gurus/gurus.htm"                                             => "gurus",
                                                                          "bhagats/bhagat-index.htm"                                    => "bhagats",
                                                                          "bhagats/bhatt-index.htm"                                     => "bhatts",
                                                                          "raags/index.php"                                             => "raags",
                                                                          "fonts/index.php"                                             => "unicode",
                                                                          "fonts"                                                       => "unicode",
                                                                          "preferen.php"                                                => "preferences",
                                                                          "feedback"                                                    => "feedback",
                                                                          "sgdv"                                                        => "sgdv",
                                                                          "raags/raag_siri.php"                                         => "raags/raag-siri",
                                                                          "raags/raag_devgandhari.php"                                  => "raags/raag-devgandhari",
                                                                          "raags/raag_jaitsri.php"                                      => "raags/raag-jaitsri",
                                                                          "raags/raag_bilaval.php"                                      => "raags/raag-bilaval",
                                                                          "raags/raag_maru.php"                                         => "raags/raag-maru",
                                                                          "raags/raag_sarang.php"                                       => "raags/raag-sarang",
                                                                          "raags/raag_majh.php"                                         => "raags/raag-majh",
                                                                          "raags/raag_bihagara.php"                                     => "raags/raag-bihagara",
                                                                          "raags/raag_todi.php"                                         => "raags/raag-todi",
                                                                          "raags/raag_gond.php"                                         => "raags/raag-gond",
                                                                          "raags/raag_tukhari.php"                                      => "raags/raag-tukhari",
                                                                          "raags/raag_malar.php"                                        => "raags/raag-malar",
                                                                          "raags/raag_gauri.php"                                        => "raags/raag-gauri",
                                                                          "raags/raag_vadahans.php"                                     => "raags/raag-vadahans",
                                                                          "raags/raag_bairari.php"                                      => "raags/raag-bairari",
                                                                          "raags/raag_ramkali.php"                                      => "raags/raag-ramkali",
                                                                          "raags/raag_kedara.php"                                       => "raags/raag-kedara",
                                                                          "raags/raag_kanara.php"                                       => "raags/raag-kanara",
                                                                          "raags/raag_asa.php"                                          => "raags/raag-asa",
                                                                          "raags/raag_sorathi.php"                                      => "raags/raag-sorathi",
                                                                          "raags/raag_tilang.php"                                       => "raags/raag-tilang",
                                                                          "raags/raag_nutnarain.php"                                    => "raags/raag-nutnarain",
                                                                          "raags/raag_bhairav.php"                                      => "raags/raag-bhairav",
                                                                          "raags/raag_kalyan.php"                                       => "raags/raag-kalyan",
                                                                          "raags/raag_gujri.php"                                        => "raags/raag-gujri",
                                                                          "raags/raag_dhanasri.php"                                     => "raags/raag-dhanasri",
                                                                          "raags/raag_suhi.php"                                         => "raags/raag-suhi",
                                                                          "raags/raag_maligaura.php"                                    => "raags/raag-maligaura",
                                                                          "raags/raag_basant.php"                                       => "raags/raag-basant",
                                                                          "raags/raag_prabhati.php"                                     => "raags/raag-prabhati",
                                                                          "raags/raag_jaijaiwanti.php"                                  => "raags/raag-jaijaiwanti"
                ));
            }
            
            $request_uri = $this->__get_request_uri();
            
            foreach ($ar_301_redirects as $old_uri => $new_uri) {
                if (is_start_with($request_uri, $old_uri)) {
                    
                    $response = $this->__check_http_status(str_replace('_', '-', $new_uri));
                    
                    if ($response == 200) {
                        redirect(base_url(str_replace('_', '-', $new_uri)), 'location', 301);
                        exit();
                    }
                }
            }
            
            echo set_status_header(404);
            
            $data['theme'] = 'theme_1';
            $data['meta_title'] = 'Search Gurbani : Gurbani Research Website';
            $data['meta_description']
                = 'A comprehensive web site on research and  exploration of Sri Guru Granth Sahib, Amrit Keertan Gutka, Bhai Gurdas Vaaran, Kabit Bhai Gurdaas ,Sri Dasam Granth Sahib, exegesis , Gurbani, Gurbanee vichaar';
            $data['meta_keywords']
                = 'Gurbaanee Keertan,Gurmat Sangeet, Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan, Mahankosh, Kosh, Hukumnama, Baanis, Japji, jaap, Sukhmani, Ardaas';
            
            $data['title'] = '404 - Page Not Found';
            $data['content'] = 'The page you requested was not found.';
            
            $CI->load->view('errors/404', $data);
            exit(4); // EXIT_UNKNOWN_FILE
        }
        
        private function __get_request_uri()
        {
            $CI =& get_instance();
            $CI->load->library('uri');
            
            $uri = $CI->uri->uri_string();
            $request_uri = $uri;
            
            if (!empty($_SERVER['QUERY_STRING'])) {
                $request_uri .= "?" . $_SERVER['QUERY_STRING'];
            }
            
            return $request_uri;
        }
        
        private function __check_http_status($new_uri)
        {
            $ch = curl_init(base_url($new_uri));
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_exec($ch);
            $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            return $response;
        }
    }