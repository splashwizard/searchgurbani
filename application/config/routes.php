<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    /*
    | -------------------------------------------------------------------------
    | URI ROUTING
    | -------------------------------------------------------------------------
    | This file lets you re-map URI requests to specific controller functions.
    |
    | Typically there is a one-to-one relationship between a URL string
    | and its corresponding controller class/method. The segments in a
    | URL normally follow this pattern:
    |
    |	example.com/class/method/id/
    |
    | In some instances, however, you may want to remap this relationship
    | so that a different class/function is called than the one
    | corresponding to the URL.
    |
    | Please see the user guide for complete details:
    |
    |	https://codeigniter.com/user_guide/general/routing.html
    |
    | -------------------------------------------------------------------------
    | RESERVED ROUTES
    | -------------------------------------------------------------------------
    |
    | There are three reserved routes:
    |
    |	$route['default_controller'] = 'welcome';
    |
    | This route indicates which controller class should be loaded if the
    | URI contains no data. In the above example, the "welcome" class
    | would be loaded.
    |
    |	$route['404_override'] = 'errors/page_missing';
    |
    | This route will tell the Router which controller/method to use if those
    | provided in the URL cannot be matched to a valid route.
    |
    |	$route['translate_uri_dashes'] = FALSE;
    |
    | This is not exactly a route, but allows you to automatically route
    | controller and method names that contain dashes. '-' isn't a valid
    | class or method name character, so it requires translation.
    | When you set this option to TRUE, it will replace ALL dashes in the
    | controller and method URI segments.
    |
    | Examples:	my-controller/index	-> my_controller/index
    |		my-controller/my-method	-> my_controller/my_method
    */
    
    /**
     * guru-granth-sahib
     */
    
    
    $route['guru-granth-sahib'] = 'public/guru_granth_sahib/introduction';
    $route['guru-granth-sahib/introduction'] = 'public/guru_granth_sahib/introduction';
    $route['guru-granth-sahib/ang-by-ang'] = 'public/guru_granth_sahib/ang_by_ang';
    $route['guru-granth-sahib/ang/(:any)'] = 'public/guru_granth_sahib/ang/$1';
    $route['guru-granth-sahib/ang/(:any)/(:any)'] = 'public/guru_granth_sahib/ang/$1/$2';
    $route['guru-granth-sahib/ang/(:any)/line/(:any)'] = 'public/guru_granth_sahib/ang/$1/line/$2';
    $route['guru-granth-sahib/shabad/(:any)/line/(:any)'] = 'public/guru_granth_sahib/shabad/$1/line/$2';
    $route['guru-granth-sahib/verse/(:any)'] = 'public/guru-granth-sahib/verse/$1';
    $route['guru-granth-sahib/verse/(:any)/(:any)'] = 'public/guru-granth-sahib/verse/$1/$2';
    $route['guru-granth-sahib/shabad/(:any)/line/(:any)/(:any)'] = 'public/guru_granth_sahib/shabad/$1/line/$2/$1';
    $route['guru-granth-sahib/verse/(:any)/line/(:any)'] = 'public/guru_granth_sahib/verse/$1/line/$2';
    $route['guru-granth-sahib/index/(chapter|author)'] = 'public/guru_granth_sahib/$1_index';
    $route['guru-granth-sahib/author/(:any)'] = 'public/guru_granth_sahib/author/$1';
    $route['guru-granth-sahib/search'] = 'public/guru_granth_sahib/search';
    $route['guru-granth-sahib/search-results'] = 'public/guru_granth_sahib/search_results';
    $route['guru-granth-sahib/search-results/(:any)'] = 'public/guru_granth_sahib/search_results/$1';
    $route['guru-granth-sahib/search-results/(:any)/(:any)'] = 'public/guru_granth_sahib/search_results/$1/$2';
    $route['guru-granth-sahib/ajax-remember-me'] = 'public/guru_granth_sahib/ajax_remember_me';
    /**
     * amrit-keertan
     */
    $route['amrit-keertan'] = 'public/amrit_keertan/introduction';
    $route['amrit-keertan/introduction'] = 'public/amrit_keertan/introduction';
    $route['amrit-keertan/page-by-page'] = 'public/amrit_keertan/page_by_page';
    $route['amrit-keertan/page-by-page/(:any)'] = 'public/amrit_keertan/page_by_page/$1';
    $route['amrit-keertan/page/(:any)'] = 'public/amrit_keertan/page/$1';
    $route['amrit-keertan/page/(:any)/(:any)'] = 'public/amrit_keertan/page/$1/$2';
    $route['amrit-keertan/page/(:any)/line/(:any)'] = 'public/amrit_keertan/page/$1/line/$2';
    $route['amrit-keertan/shabad/(:any)/(:any)'] = 'public/amrit_keertan/shabad/$1/$2';
    $route['amrit-keertan/shabad/(:any)/(:any)/(:any)'] = 'public/amrit_keertan/shabad/$1/$2/$3';
    $route['amrit-keertan/shabad/(:any)/(:any)/line/(:any)'] = 'public/amrit_keertan/shabad/$1/$2/line/$3';
    $route['amrit-keertan/shabad/(:any)/(:any)/line/(:any)/(:any)'] = 'public/amrit_keertan/shabad/$1/$2/line/$3/$1';
    $route['amrit-keertan/index/chapter'] = 'public/amrit_keertan/chapter_index';
    $route['amrit-keertan/index/(english|punjabi|hindi)'] = 'public/amrit_keertan/$1_index';
    $route['amrit-keertan/index/(english|punjabi|hindi)/(:any)'] = 'public/amrit_keertan/$1_index/$2';
    $route['amrit-keertan/(chapter|english|punjabi|hindi)/(:any)/(:any)'] = 'public/amrit_keertan/$1/$2/$3';
    $route['amrit-keertan/search'] = 'public/amrit_keertan/search';
    $route['amrit-keertan/search-results'] = 'public/amrit_keertan/search_results';
    $route['amrit-keertan/search-results/(:any)'] = 'public/amrit_keertan/search_results/$1';
    $route['amrit-keertan/search-results/(:any)/(:any)'] = 'public/amrit_keertan/search_results/$1/$2';
    $route['amrit-keertan/ajax-remember-me'] = 'public/amrit_keertan/ajax_remember_me';
    
    /**
     * bhai-gurdas-vaaran
     */
    $route['bhai-gurdas-vaaran'] = 'public/bhai_gurdas_vaaran/introduction';
    $route['bhai-gurdas-vaaran/introduction'] = 'public/bhai_gurdas_vaaran/introduction';
    $route['bhai-gurdas-vaaran/pauri-by-pauri'] = 'public/bhai_gurdas_vaaran/pauri_by_pauri';
    $route['bhai-gurdas-vaaran/vaar/(:any)/pauri/(:any)']
        = 'public/bhai_gurdas_vaaran/vaar/$1/pauri/$2';
    $route['bhai-gurdas-vaaran/vaar/(:any)/pauri/(:any)/(:any)']
        = 'public/bhai_gurdas_vaaran/vaar/$1/pauri/$2/$3';
    $route['bhai-gurdas-vaaran/vaar/(:any)/pauri/(:any)/line/(:any)']
        = 'public/bhai_gurdas_vaaran/vaar/$1/pauri/$2/line/$3';
    $route['bhai-gurdas-vaaran/index/vaar'] = 'public/bhai_gurdas_vaaran/vaar_index';
    $route['bhai-gurdas-vaaran/index/vaar/(:any)'] = 'public/bhai_gurdas_vaaran/vaar_index/$1';
    $route['bhai-gurdas-vaaran/search'] = 'public/bhai_gurdas_vaaran/search';
    $route['bhai-gurdas-vaaran/search-results'] = 'public/bhai_gurdas_vaaran/search_results';
    $route['bhai-gurdas-vaaran/search-results/(:any)']
        = 'public/bhai_gurdas_vaaran/search_results/$1';
    $route['bhai-gurdas-vaaran/search-results/(:any)/(:any)']
        = 'public/bhai_gurdas_vaaran/search_results/$1/$2';
    $route['bhai-gurdas-vaaran/ajax-remember-me'] = 'public/bhai_gurdas_vaaran/ajax_remember_me';
    
    /**
     * dasam-granth
     */
    $route['dasam-granth'] = 'public/dasam_granth/introduction';
    $route['dasam-granth/introduction'] = 'public/dasam_granth/introduction';
    $route['dasam-granth/page-by-page'] = 'public/dasam_granth/page_by_page';
    $route['dasam-granth/page/(:any)'] = 'public/dasam_granth/page/$1';
    $route['dasam-granth/page/(:any)/(:any)'] = 'public/dasam_granth/page/$1/$2';
    $route['dasam-granth/page/(:any)/line/(:any)'] = 'public/dasam_granth/page/$1/line/$2';
    $route['dasam-granth/verse/(:any)'] = 'public/dasam_granth/verse/$1';
    $route['dasam-granth/verse/(:any)/(:any)'] = 'public/dasam_granth/verse/$1/$2';
    $route['dasam-granth/shabad/(:any)/line/(:any)'] = 'public/dasam_granth/shabad/$1/line/$2';
    $route['dasam-granth/shabad/(:any)/line/(:any)/(:any)'] = 'public/dasam_granth/shabad/$1/line/$2/$3';
    $route['dasam-granth/index/chapter/(en|pb)'] = 'public/dasam_granth/chapter_index/$1';
    $route['dasam-granth/search'] = 'public/dasam_granth/search';
    $route['dasam-granth/search-results'] = 'public/dasam_granth/search_results';
    $route['dasam-granth/search-results/(:any)'] = 'public/dasam_granth/search_results/$1';
    $route['dasam-granth/search-results/(:any)/(:any)'] = 'public/dasam_granth/search_results/$1/$2';
    $route['dasam-granth/ajax-remember-me'] = 'public/dasam_granth/ajax_remember_me';
    /**
     * kabit-savaiye
     */
    $route['kabit-savaiye/kabit-by-kabit'] = 'public/kabit_savaiye/kabit_by_kabit';
    $route['kabit-savaiye/kabit/(:any)'] = 'public/kabit_savaiye/kabit/$1';
    $route['kabit-savaiye/kabit/(:any)/(:any)'] = 'public/kabit_savaiye/kabit/$1/$2';
    $route['kabit-savaiye/kabit/(:any)/line/(:any)'] = 'public/kabit_savaiye/kabit/$1/line/$2';
    $route['kabit-savaiye/search'] = 'public/kabit_savaiye/search';
    $route['kabit-savaiye/search-results'] = 'public/kabit_savaiye/search_results';
    $route['kabit-savaiye/search-results/(:any)'] = 'public/kabit_savaiye/search_results/$1';
    $route['kabit-savaiye/search-results/(:any)/(:any)'] = 'public/kabit_savaiye/search_results/$1/$2';
    $route['kabit-savaiye/ajax-remember-me'] = 'public/kabit_savaiye/ajax_remember_me';
    
    /**
     * bhai-nand-lal
     */
    
    $route['bhai-nand-lal'] = 'public/bhai_nand_lal/introduction';
    $route['bhai-nand-lal/introduction'] = 'public/bhai_nand_lal/introduction';
    $route['bhai-nand-lal/(ghazal|quatrains|zindginama|ganjnama|jot-bikas|jot-bikas-persian|rahitnama|tankahnama)']
        = 'public/bhai_nand_lal/$1/index';
    $route['bhai-nand-lal/(ghazal|quatrains|zindginama|ganjnama|jot-bikas|jot-bikas-persian|rahitnama|tankahnama)/page']
        = 'public/bhai_nand_lal/$1/page';
    $route['bhai-nand-lal/(ghazal|quatrains|zindginama|ganjnama|jot-bikas|jot-bikas-persian|rahitnama|tankahnama)/page/(:any)']
        = 'public/bhai_nand_lal/$1/page/$2';
    $route['bhai-nand-lal/(ghazal|quatrains|zindginama|ganjnama|jot-bikas|jot-bikas-persian|rahitnama|tankahnama)/page/(:any)/(:any)']
        = 'public/bhai_nand_lal/$1/page/$2/$3';
    $route['bhai-nand-lal/(ghazal|quatrains|zindginama|ganjnama|jot-bikas|jot-bikas-persian|rahitnama|tankahnama)/page/(:any)/line/(:any)']
        = 'public/bhai_nand_lal/$1/page/$2/line/$3';
    
    $route['bhai-nand-lal/search'] = 'public/bhai_nand_lal/search_bhai_nand_lal/search';
    $route['bhai-nand-lal/search-results']
        = 'public/bhai_nand_lal/search_bhai_nand_lal/search_results';
    $route['bhai-nand-lal/search-results/(:num)']
        = 'public/bhai_nand_lal/search_bhai_nand_lal/search_results/$1';
    $route['bhai-nand-lal/search-results/(:num)/(:any)']
        = 'public/bhai_nand_lal/search_bhai_nand_lal/search_results/$1/$2';
    $route['bhai-nand-lal/(ghazal|quatrains|zindginama|ganjnama|jot-bikas|jot-bikas-persian|rahitnama|tankahnama)/ajax-remember-me']
        = 'public/bhai_nand_lal/$1/ajax_remember_me';
    
    $route['bhai-nand-lal/(ghazal|quatrains|zindginama|ganjnama|jot-bikas|jot-bikas-persian|rahitnama|tankahnama)/shabad/(:any)/line/(:any)']
        = 'public/bhai_nand_lal/$1/shabad/$2/line/$3';
    $route['bhai-nand-lal/(ghazal|quatrains|zindginama|ganjnama|jot-bikas|jot-bikas-persian|rahitnama|tankahnama)/shabad/(:any)/line/(:any)/(:any)'] = 'public/bhai_nand_lal/$1/shabad/$2/line/$3/$4';
    $route['bhai-nand-lal/(ghazal|quatrains|zindginama|ganjnama|jot-bikas|jot-bikas-persian|rahitnama|tankahnama)/verse/(:any)'] = 'public/bhai_nand_lal/$1/verse/$2';
    $route['bhai-nand-lal/(ghazal|quatrains|zindginama|ganjnama|jot-bikas|jot-bikas-persian|rahitnama|tankahnama)/verse/(:any)/(:any)'] = 'public/bhai_nand_lal/$1/verse/$2/$3';
    /**
     * baanis
     */
    
    $route['baanis/japji-sahib'] = 'public/baanis/japji_sahib';
    $route['baanis/japji-sahib/(:any)'] = 'public/baanis/japji_sahib/$1';
    $route['baanis/japji-sahib/(:any)/(:any)'] = 'public/baanis/japji_sahib/$1/$2';
    
    $route['baanis/jaap-sahib'] = 'public/baanis/jaap_sahib';
    $route['baanis/jaap-sahib/(:any)'] = 'public/baanis/jaap_sahib/$1';
    $route['baanis/jaap-sahib/(:any)/(:any)'] = 'public/baanis/jaap_sahib/$1/$2';
    
    $route['baanis/tvai-prasadh-savaiye'] = 'public/baanis/tvai_prasadh_savaiye';
    $route['baanis/tvai-prasadh-savaiye/(:any)'] = 'public/baanis/tvai_prasadh_savaiye/$1';
    $route['baanis/tvai-prasadh-savaiye/(:any)/(:any)']
        = 'public/baanis/tvai_prasadh_savaiye/$1/$2';
    
    $route['baanis/chaupai-sahib'] = 'public/baanis/chaupai_sahib';
    $route['baanis/chaupai-sahib/(:any)'] = 'public/baanis/chaupai_sahib/$1';
    $route['baanis/chaupai-sahib/(:any)/(:any)'] = 'public/baanis/chaupai_sahib/$1/$2';
    
    $route['baanis/anand-sahib'] = 'public/baanis/anand_sahib';
    $route['baanis/anand-sahib/(:any)'] = 'public/baanis/anand_sahib/$1';
    $route['baanis/anand-sahib/(:any)/(:any)'] = 'public/baanis/anand_sahib/$1/$2';
    
    $route['baanis/rehraas-sahib'] = 'public/baanis/rehraas_sahib';
    $route['baanis/rehraas-sahib/(:any)'] = 'public/baanis/rehraas_sahib/$1';
    $route['baanis/rehraas-sahib/(:any)/(:any)'] = 'public/baanis/rehraas_sahib/$1/$2';
    
    $route['baanis/kirtan-sohila'] = 'public/baanis/kirtan_sohila';
    $route['baanis/kirtan-sohila/(:any)'] = 'public/baanis/kirtan_sohila/$1';
    $route['baanis/kirtan-sohila/(:any)/(:any)'] = 'public/baanis/kirtan_sohila/$1/$2';
    
    $route['baanis/anand-sahib-bhog'] = 'public/baanis/anand_sahib_bhog';
    $route['baanis/anand-sahib-bhog/(:any)'] = 'public/baanis/anand_sahib_bhog/$1';
    $route['baanis/anand-sahib-bhog/(:any)/(:any)'] = 'public/baanis/anand_sahib_bhog/$1/$2';
    
    $route['baanis/aarti'] = 'public/baanis/aarti';
    $route['baanis/aarti/(:any)'] = 'public/baanis/aarti/$1';
    $route['baanis/aarti/(:any)/(:any)'] = 'public/baanis/aarti/$1/$2';
    
    $route['baanis/laavan-anand-karaj'] = 'public/baanis/laavan_anand_karaj';
    $route['baanis/laavan-anand-karaj/(:any)'] = 'public/baanis/laavan_anand_karaj/$1';
    $route['baanis/laavan-anand-karaj/(:any)/(:any)'] = 'public/baanis/laavan_anand_karaj/$1/$2';
    
    $route['baanis/asa-ki-vaar'] = 'public/baanis/asa_ki_vaar';
    $route['baanis/asa-ki-vaar/(:any)'] = 'public/baanis/asa_ki_vaar/$1';
    $route['baanis/asa-ki-vaar/(:any)/(:any)'] = 'public/baanis/asa_ki_vaar/$1/$2';
    
    $route['baanis/sukhmani-sahib'] = 'public/baanis/sukhmani_sahib';
    $route['baanis/sukhmani-sahib/(:any)'] = 'public/baanis/sukhmani_sahib/$1';
    $route['baanis/sukhmani-sahib/(:any)/(:any)'] = 'public/baanis/sukhmani_sahib/$1/$2';
    
    $route['baanis/sidh-gosht'] = 'public/baanis/sidh_gosht';
    $route['baanis/sidh-gosht/(:any)'] = 'public/baanis/sidh_gosht/$1';
    $route['baanis/sidh-gosht/(:any)/(:any)'] = 'public/baanis/sidh_gosht/$1/$2';
    
    $route['baanis/ramkali-sadh'] = 'public/baanis/ramkali_sadh';
    $route['baanis/ramkali-sadh/(:any)'] = 'public/baanis/ramkali_sadh/$1';
    $route['baanis/ramkali-sadh/(:any)/(:any)'] = 'public/baanis/ramkali_sadh/$1/$2';
    
    $route['baanis/dhakanee-oankaar'] = 'public/baanis/dhakanee_oankaar';
    $route['baanis/dhakanee-oankaar/(:any)'] = 'public/baanis/dhakanee_oankaar/$1';
    $route['baanis/dhakanee-oankaar/(:any)/(:any)'] = 'public/baanis/dhakanee_oankaar/$1/$2';
    
    $route['baanis/baavan-akhree'] = 'public/baanis/baavan_akhree';
    $route['baanis/baavan-akhree/(:any)'] = 'public/baanis/baavan_akhree/$1';
    $route['baanis/baavan-akhree/(:any)/(:any)'] = 'public/baanis/baavan_akhree/$1/$2';
    
    $route['baanis/shabad-hazare'] = 'public/baanis/shabad_hazare';
    $route['baanis/shabad-hazare/(:any)'] = 'public/baanis/shabad_hazare/$1';
    $route['baanis/shabad-hazare/(:any)/(:any)'] = 'public/baanis/shabad_hazare/$1/$2';
    
    $route['baanis/baarah-maaha'] = 'public/baanis/baarah_maaha';
    $route['baanis/baarah-maaha/(:any)'] = 'public/baanis/baarah_maaha/$1';
    $route['baanis/baarah-maaha/(:any)/(:any)'] = 'public/baanis/baarah_maaha/$1/$2';
    
    $route['baanis/sukhmana-sahib'] = 'public/baanis/sukhmana_sahib';
    $route['baanis/sukhmana-sahib/(:any)'] = 'public/baanis/sukhmana_sahib/$1';
    $route['baanis/sukhmana-sahib/(:any)/(:any)'] = 'public/baanis/sukhmana_sahib/$1/$2';
    
    $route['baanis/dukh-bhanjani-sahib'] = 'public/baanis/dukh_bhanjani_sahib';
    $route['baanis/dukh-bhanjani-sahib/(:any)'] = 'public/baanis/dukh_bhanjani_sahib/$1';
    $route['baanis/dukh-bhanjani-sahib/(:any)/(:any)'] = 'public/baanis/dukh_bhanjani_sahib/$1/$2';
    
    $route['baanis/salok-sehskritee'] = 'public/baanis/salok_sehskritee';
    $route['baanis/salok-sehskritee/(:any)'] = 'public/baanis/salok_sehskritee/$1';
    $route['baanis/salok-sehskritee/(:any)/(:any)'] = 'public/baanis/salok_sehskritee/$1/$2';
    
    $route['baanis/gathaa'] = 'public/baanis/gathaa';
    $route['baanis/gathaa/(:any)'] = 'public/baanis/gathaa/$1';
    $route['baanis/gathaa/(:any)/(:any)'] = 'public/baanis/gathaa/$1/$2';
    
    $route['baanis/phunhay-m5'] = 'public/baanis/phunhay_m5';
    $route['baanis/phunhay-m5/(:any)'] = 'public/baanis/phunhay_m5/$1';
    $route['baanis/phunhay-m5/(:any)/(:any)'] = 'public/baanis/phunhay_m5/$1/$2';
    
    $route['baanis/salok-kabeer-ji'] = 'public/baanis/salok_kabeer_ji';
    $route['baanis/salok-kabeer-ji/(:any)'] = 'public/baanis/salok_kabeer_ji/$1';
    $route['baanis/salok-kabeer-ji/(:any)/(:any)'] = 'public/baanis/salok_kabeer_ji/$1/$2';
    
    $route['baanis/salok-farid-ji'] = 'public/baanis/salok_farid_ji';
    $route['baanis/salok-farid-ji/(:any)'] = 'public/baanis/salok_farid_ji/$1';
    $route['baanis/salok-farid-ji/(:any)/(:any)'] = 'public/baanis/salok_farid_ji/$1/$2';
    
    $route['baanis/savaiye-m1'] = 'public/baanis/savaiye_m1';
    $route['baanis/savaiye-m1/(:any)'] = 'public/baanis/savaiye_m1/$1';
    $route['baanis/savaiye-m1/(:any)/(:any)'] = 'public/baanis/savaiye_m1/$1/$2';
    
    $route['baanis/savaiye-m2'] = 'public/baanis/savaiye_m2';
    $route['baanis/savaiye-m2/(:any)'] = 'public/baanis/savaiye_m2/$1';
    $route['baanis/savaiye-m2/(:any)/(:any)'] = 'public/baanis/savaiye_m2/$1/$2';
    
    $route['baanis/savaiye-m3'] = 'public/baanis/savaiye_m3';
    $route['baanis/savaiye-m3/(:any)'] = 'public/baanis/savaiye_m3/$1';
    $route['baanis/savaiye-m3/(:any)/(:any)'] = 'public/baanis/savaiye_m3/$1/$2';
    
    $route['baanis/savaiye-m4'] = 'public/baanis/savaiye_m4';
    $route['baanis/savaiye-m4/(:any)'] = 'public/baanis/savaiye_m4/$1';
    $route['baanis/savaiye-m4/(:any)/(:any)'] = 'public/baanis/savaiye_m4/$1/$2';
    
    $route['baanis/savaiye-m5'] = 'public/baanis/savaiye_m5';
    $route['baanis/savaiye-m5/(:any)'] = 'public/baanis/savaiye_m5/$1';
    $route['baanis/savaiye-m5/(:any)/(:any)'] = 'public/baanis/savaiye_m5/$1/$2';
    
    $route['baanis/chaubolay-m5'] = 'public/baanis/chaubolay_m5';
    $route['baanis/chaubolay-m5/(:any)'] = 'public/baanis/chaubolay_m5/$1';
    $route['baanis/chaubolay-m5/(:any)/(:any)'] = 'public/baanis/chaubolay_m5/$1/$2';
    
    $route['baanis/salok-m9'] = 'public/baanis/salok_m9';
    $route['baanis/salok-m9/(:any)'] = 'public/baanis/salok_m9/$1';
    $route['baanis/salok-m9/(:any)/(:any)'] = 'public/baanis/salok_m9/$1/$2';
    
    $route['baanis/akal-ustati'] = 'public/baanis/akal_ustati';
    $route['baanis/akal-ustati/(:any)'] = 'public/baanis/akal_ustati/$1';
    $route['baanis/akal-ustati/(:any)/(:any)'] = 'public/baanis/akal_ustati/$1/$2';
    
    $route['baanis/bachitar-natak'] = 'public/baanis/bachitar_natak';
    $route['baanis/bachitar-natak/(:any)'] = 'public/baanis/bachitar_natak/$1';
    $route['baanis/bachitar-natak/(:any)/(:any)'] = 'public/baanis/bachitar_natak/$1/$2';
    
    
    /**
     * resources
     */
    
    $route['hukumapp'] = 'public/rssapp';

    $route['hukum/rss'] = 'public/hukum/rss';

    $route['hukumnama'] = 'public/hukumnama';
    $route['hukumnama/ang/(:any)'] = 'public/hukumnama/ang/$1';
    $route['hukum'] = 'public/hukum/index';
    $route['hukum/index'] = 'public/hukum/index';
    $route['hukumnama/cyber'] = 'public/hukumnama/cyber';
    $route['sgdv/isg'] = 'public/sgdv/isg';
    $route['sgdv'] = 'public/sgdv';
    /*
     * mahan kosh
     */
    $route['mahan-kosh'] = 'public/mahan_kosh';
    $route['mahan-kosh/do-search'] = 'public/mahan_kosh/do_search';
    $route['mahan-kosh/do-search/(:any)/(:any)'] = 'public/mahan_kosh/do_search/$1/$2';
    $route['mahan-kosh/view'] = 'public/mahan_kosh/view';
    $route['mahan-kosh/view/(:any)'] = 'public/mahan_kosh/view/$1';
    $route['mahan-kosh/view/(:any)/(:any)'] = 'public/mahan_kosh/view/$1/$2';
    
    
    /*
     *sggs-kosh
     */
    $route['sggs-kosh/do-search/(:any)'] = 'public/sggs_kosh/do_search/$1';
    $route['sggs-kosh/view'] = 'public/sggs_kosh/view';
    $route['sggs-kosh/do-search/(:any)/(:any)'] = 'public/sggs_kosh/do_search/$1/$2';
    
    
    /*
     * guru granth kosh
     */
    $route['guru-granth-kosh'] = 'public/guru_granth_kosh';
    $route['guru-granth-kosh/do-search'] = 'public/guru_granth_kosh/do_search';
    $route['guru-granth-kosh/do-search/(:any)/(:any)'] = 'public/guru_granth_kosh/do_search/$1/$2';
    $route['guru-granth-kosh/view'] = 'public/guru_granth_kosh/view';
    $route['guru-granth-kosh/view/(:any)'] = 'public/guru_granth_kosh/view/$1';
    $route['guru-granth-kosh/view/(:any)/(:any)'] = 'public/guru_granth_kosh/view/$1/$2';
    /*
     * sri nanak prakash
     */
    $route['sri-nanak-prakash'] = 'public/sri_nanak_prakash';
    $route['sri-nanak-prakash/do-search'] = 'public/sri_nanak_prakash/do_search';
    $route['sri-nanak-prakash/search-preview'] = 'public/sri_nanak_prakash/search_preview';
    $route['sri-nanak-prakash/search-preview/(:any)']
        = 'public/sri_nanak_prakash/search_preview/$1';
    $route['sri-nanak-prakash/search-preview/(:any)/(:any)']
        = 'public/sri_nanak_prakash/search_preview/$1/$2';
    $route['sri-nanak-prakash/page'] = 'public/sri_nanak_prakash/page';
    $route['sri-nanak-prakash/page/(:any)'] = 'public/sri_nanak_prakash/page/$1';
    $route['sri-nanak-prakash/page/(:any)/(highlight|hindi|gurmukhi|ajax|print-view)']
        = 'public/sri_nanak_prakash/page/$1/$2';
    $route['sri-nanak-prakash/page/(:any)/volume/(:any)']
        = 'public/sri_nanak_prakash/page/$1/volume/$2';
    $route['sri-nanak-prakash/chapters/(:any)'] = 'public/sri_nanak_prakash/chapters/$1';
    
    /*
     *sri gur pratap suraj granth
     */
    $route['sri-gur-pratap-suraj-granth'] = 'public/sri_gur_pratap_suraj_granth';
    $route['sri-gur-pratap-suraj-granth/do-search']
        = 'public/sri_gur_pratap_suraj_granth/do_search';
    $route['sri-gur-pratap-suraj-granth/search-preview']
        = 'public/sri_gur_pratap_suraj_granth/search_preview';
    $route['sri-gur-pratap-suraj-granth/search-preview/(:any)']
        = 'public/sri_gur_pratap_suraj_granth/search_preview/$1';
    $route['sri-gur-pratap-suraj-granth/search-preview/(:any)/(:any)']
        = 'public/sri_gur_pratap_suraj_granth/search_preview/$1/$2';
    $route['sri-gur-pratap-suraj-granth/chapters/(:any)']
        = 'public/sri_gur_pratap_suraj_granth/chapters/$1';
    $route['sri-gur-pratap-suraj-granth/chapters/(:any)/(:any)']
        = 'public/sri_gur_pratap_suraj_granth/chapters/$1/$2';
    $route['sri-gur-pratap-suraj-granth/page'] = 'public/sri_gur_pratap_suraj_granth/page';
    $route['sri-gur-pratap-suraj-granth/page/(:any)']
        = 'public/sri_gur_pratap_suraj_granth/page/$1';
    $route['sri-gur-pratap-suraj-granth/page/(:any)/(:any)']
        = 'public/sri_gur_pratap_suraj_granth/page/$1/$2';
    $route['sri-gur-pratap-suraj-granth/page/(:any)/highlight']
        = 'public/sri_gur_pratap_suraj_granth/page/highlight';
    $route['sri-gur-pratap-suraj-granth/volumes'] = 'public/sri_gur_pratap_suraj_granth/volumes';
    $route['sri-gur-pratap-suraj-granth/page/(:any)/volume/(:any)']
        = 'public/sri_gur_pratap_suraj_granth/page/$1/volume/$2';
    $route['sri-gur-pratap-suraj-granth/page/(:any)/volume/(:any)/(hindi|gurmukhi)']
        = 'public/sri_gur_pratap_suraj_granth/page/$1/volume/$2/$3';
    /*
     * faridkot wala teeka
     */
    $route['faridkot-wala-teeka'] = 'public/faridkot_wala_teeka';
    $route['faridkot-wala-teeka/do-search'] = 'public/faridkot_wala_teeka/do_search';
    $route['faridkot-wala-teeka/search-preview'] = 'public/faridkot_wala_teeka/search_preview';
    $route['faridkot-wala-teeka/search-preview/(:any)']
        = 'public/faridkot_wala_teeka/search_preview/$1';
    $route['faridkot-wala-teeka/search-preview/(:any)/(:any)']
        = 'public/faridkot_wala_teeka/search_preview/$1/$2';
    $route['faridkot-wala-teeka/page'] = 'public/faridkot_wala_teeka/page';
    $route['faridkot-wala-teeka/page/(:any)'] = 'public/faridkot_wala_teeka/page/$1';
    $route['faridkot-wala-teeka/page/(:any)/(highlight|hindi|gurmukhi|ajax|print-view)']
        = 'public/faridkot_wala_teeka/page/$1/$2';
    $route['faridkot-wala-teeka/page/(:any)/volume/(:any)']
        = 'public/faridkot_wala_teeka/page/$1/volume/$2';
    $route['faridkot-wala-teeka/chapters'] = 'public/faridkot_wala_teeka/chapters';
    $route['faridkot-wala-teeka/chapters/(:any)'] = 'public/faridkot_wala_teeka/chapters/$1';
    /*
     * sri guru granth darpan
     */
    $route['sri-guru-granth-darpan'] = 'public/sri_guru_granth_darpan';
    $route['sri-guru-granth-darpan/do-search'] = 'public/sri_guru_granth_darpan/do_search';
    $route['sri-guru-granth-darpan/search-preview']
        = 'public/sri_guru_granth_darpan/search_preview';
    $route['sri-guru-granth-darpan/search-preview/(:any)']
        = 'public/sri_guru_granth_darpan/search_preview/$1';
    $route['sri-guru-granth-darpan/search-preview/(:any)/(:any)']
        = 'public/sri_guru_granth_darpan/search_preview/$1/$2';
    $route['sri-guru-granth-darpan/page'] = 'public/sri_guru_granth_darpan/page';
    $route['sri-guru-granth-darpan/page/(:any)'] = 'public/sri_guru_granth_darpan/page/$1';
    $route['sri-guru-granth-darpan/page/(:any)/(highlight|hindi|gurmukhi|ajax|print-view)']
        = 'public/sri_guru_granth_darpan/page/$1/$2';
    /*
     * maansarovar
     */
    $route['maansarovar'] = 'public/maansarovar';
    $route['maansarovar/do-search'] = 'public/maansarovar/do_search';
    $route['maansarovar/do-search/(:any)/alpha'] = 'public/maansarovar/do_search/$1/alpha';
    $route['maansarovar/words'] = 'public/maansarovar/words';
    $route['maansarovar/quotations/(:any)'] = 'public/maansarovar/quotations/$1';
    
    
    $route['gurus'] = 'public/gurus';
    $route['gurus/(:any)'] = 'public/gurus/$1';
    $route['bhagats'] = 'public/bhagats';
    $route['bhagats/(:any)'] = 'public/bhagats/$1';
    $route['bhatts'] = 'public/bhatts';
    $route['bhatts/(:any)'] = 'public/bhatts/$1';
    $route['raags'] = 'public/raags';
    $route['raags/(:any)'] = 'public/raags/$1';
    $route['taal'] = 'public/taal';
    $route['taal/(:any)'] = 'public/taal/$1';
    $route['saaj'] = 'public/saaj';
    $route['saaj/(:any)'] = 'public/saaj/$1';
    $route['unicode'] = 'public/unicode';
    
    $route['scriptures/search-results-preview'] = 'public/scriptures/search_results_preview';
    $route['scriptures/search'] = 'public/scriptures/search';
    $route['contact-us'] = 'public/scriptures/contactUs';
    $route['home/search-results-preview'] = 'public/home/search_results_preview';
    
    $route['preferences'] = 'public/preferences';
    $route['preferences/(:any)'] = 'public/preferences/$1';
    $route['feedback'] = 'public/feedback';
    $route['feedback/(:any)'] = 'public/feedback/$1';
    $route['sitemap'] = 'public/sitemap';
    $route['sitemap/(:any)'] = 'public/sitemap/$1';
    
    $route['sitemap/(:any)'] = 'public/sitemap/$1';
    $route['sitemap/(:any)'] = 'public/sitemap/$1';
    
    
    $route['music/page/(:any)'] = 'public/music/page/$1';
    $route['compilation/page'] = 'public/compilation/page';
    $route['compilation/page/(:any)'] = 'public/compilation/page/$1';
    
    /**
     * shared
     */
    $route['shared/(:any)/(:any)/(:any)'] = 'public/shared/$1/$2/$3';
    $route['shared/(:any)/(:any)/(:any)/(:any)'] = 'public/shared/$1/$2/$3/$4';
    $route['shared/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'public/shared/$1/$2/$3/$4/$5';
    $route['shared/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'public/shared/$1/$2/$3/$4/$5/$6';
    $route['shared/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)']
        = 'public/shared/$1/$2/$3/$4/$5/$6/$7';
    
    /**
     * gestbook
     */
    $route['guestbook'] = 'public/guestbook/index';
    $route['guestbook/index'] = 'public/guestbook/index';
    $route['guestbook/index/(:any)'] = 'public/guestbook/index/$1';
    $route['guestbook/post'] = 'public/guestbook/post';
    
    
    /**
     * admin
     */
    $route['admin'] = 'admin/main/index';
    $route['admin/login'] = 'auth/index/admin_login';
    $route['admin/forgot-password'] = 'auth/index/forgot_password';
    $route['admin/forgot-password-email'] = 'auth/index/forgot_password_email';
    $route['admin/change-password'] = 'admin/main/change_password';
    $route['logout'] = 'auth/index/logout';
    
    /**
     * admin guestbook
     */
    $route['admin/guestbook'] = 'admin/guestbook/index';
    $route['admin/guestbook/disable'] = 'admin/guestbook/disable';
    $route['admin/guestbook/enable'] = 'admin/guestbook/enable';
    $route['admin/guestbook/edit/(:any)'] = 'admin/guestbook/edit/$1';
   /**
    *
    */
    $route['admin/users'] = 'admin/users/index';
    $route['admin/users/newssubscribeview'] = 'admin/users/news_letter_subscribe_view';
    $route['admin/users/newssubscribe'] = 'admin/users/news_letter_subscribe';

    /**
     * Hauth
     */
    $route['hauth/facebook'] = 'public/hauth/login/Facebook';
    $route['hauth/googleplus'] = 'public/hauth/login/Google';
    $route['hauth/linkedin'] = 'public/hauth/login/LinkedIn';
    $route['hauth/register'] = 'public/hauth/register';
    $route['hauth/login'] = 'public/hauth/email_login';
    $route['hauth/endpoint'] = 'public/hauth/endpoint';
    $route['hauth/logout'] = 'public/hauth/logout';
    
    
    $route['default_controller'] = 'public/home';
    $route['404_override'] = '';
    $route['translate_uri_dashes'] = true;


