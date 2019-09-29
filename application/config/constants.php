<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE') OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE') OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE') OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ') OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE') OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE') OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE') OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE') OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT') OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT') OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| SG_Variables
|--------------------------------------------------------------------------
|
| These variables are used globally
|
| key
| (0) form_field_name,
| (1) script_full_name,
| (2) ??,
| (3) table_name,
| (4) page_no_field_name,
| (5) page_no_start,
| (6) page_no_end,
[controller_name] controller_name
|
*/
$SG_ScriptureTypes = array("ggs" => array(
    0 => "ggs",
    1 => "Sri Guru Granth Sahib",
    2 => "S01",
    3 => "S01",
    4 => "pageno",
    5 => 1,
    6 => 1430,
    "page_name" => "page",
    "page_from" => 1,
    "page_to" => 1430,
    "author" => true,
    "raag" => true,
    "controller_name" => "guru_granth_sahib",
    "controller_name_dash" => "guru-granth-sahib"
),

    "ak" => array(
        0 => "ak",
        1 => "Amrit Keertan",
        2 => "A01",
        3 => "A01",
        4 => "pageno",
        5 => 65,
        6 => 1040,
        "page_name" => "page",
        "page_from" => 65,
        "page_to" => 1040,
        "author" => true,
        "raag" => true,
        "controller_name" => "amrit_keertan",
        "controller_name_dash" => "amrit-keertan"
    ),

    "bgv" => array(
        0 => "bgv",
        1 => "Bhai Gurdas Vaaran",
        2 => "B01",
        3 => "B01",
        4 => "vaarno",
        5 => 1,
        6 => 41,
        "page_name" => "vaar",
        "page_from" => 1,
        "page_to" => 41,
        "author" => false,
        "raag" => false,
        "controller_name" => "bhai_gurdas_vaaran",
        "controller_name_dash" => "bhai-gurdas-vaaran"
    ),
    "bnl" => array(
        0 => "bnl",
        1 => "Bhai Nand Lal",
        2 => "N01",
        3 => "N01",
        4 => "lineno",
        5 => 1,
        6 => 150,

        "page_name" => "lineno",
        "page_from" => 1,
        "page_to" => 150,
        "author" => false,
        "raag" => false,

        "controller_name" => "bhai_nand_lal/search_bhai_nand_lal",
        "controller_name_dash" => "bhai-nand-lal"
    ),

    "dg" => array(
        0 => "dg",
        1 => "Sri Dasam Granth Sahib",
        2 => "D01",
        3 => "D01",
        4 => "pageno",
        5 => 1,
        6 => 1477,
        "page_name" => "page",
        "page_from" => 1,
        "page_to" => 2820,
        "author" => false,
        "raag" => false,
        "controller_name" => "dasam_granth",
        "controller_name_dash" => "dasam-granth"
    ),

    "ks" => array(
        0 => "ks",
        1 => "Kabit Savaiye",
        2 => "K01",
        3 => "K01",
        4 => "kabit",
        5 => 1,
        6 => 675,
        "page_name" => "kabit",
        "page_from" => 1,
        "page_to" => 675,
        "author" => false,
        "raag" => false,
        "controller_name" => "kabit_savaiye",
        "controller_name_dash" => "kabit-savaiye"
    )

);


$SG_BNL = array(
    "zindginama" => array(
        "page_name" => "page",
        "page_from" => 1,
        "page_to" => 42,
        "db_start_pageID" => 83,
        "controller_name" => "bhai_nand_lal/zindginama",
        "controller_name_dash" => "bhai-nand-lal/zindginama"
    ),
    "ganjnama" => array(
        "page_name" => "page",
        "page_from" => 1,
        "page_to" => 19,
        "db_start_pageID" => 125,
        "controller_name" => "bhai_nand_lal/ganjnama",
        "controller_name_dash" => "bhai-nand-lal/ganjnama"
    ),
    "jot_bikas" => array(
        "page_name" => "page",
        "page_from" => 1,
        "page_to" => 4,
        "db_start_pageID" => 159,
        "controller_name" => "bhai_nand_lal/jot_bikas",
        "controller_name_dash" => "bhai-nand-lal/jot-bikas"
    ),
    "jot_bikas_persian" => array(
        "page_name" => "page",
        "page_from" => 1,
        "page_to" => 15,
        "db_start_pageID" => 144,
        "controller_name" => "bhai_nand_lal/jot_bikas_persian",
        "controller_name_dash" => "bhai-nand-lal/jot-bikas-persian"
    ),
    "rahitnama" => array(
        "page_name" => "page",
        "page_from" => 1,
        "page_to" => 4,
        "db_start_pageID" => 163,
        "controller_name" => "bhai_nand_lal/rahitnama",
        "controller_name_dash" => "bhai-nand-lal/rahitnama"
    ),
    "tankahnama" => array(
        "page_name" => "page",
        "page_from" => 1,
        "page_to" => 6,
        "db_start_pageID" => 167,
        "controller_name" => "bhai_nand_lal/tankahnama",
        "controller_name_dash" => "bhai-nand-lal/tankahnama"
    ),

    "ghazal" => array(
        "page_name" => "page",
        "page_from" => 1,
        "page_to" => 63,
        "db_start_pageID" => 1,
        "controller_name" => "bhai_nand_lal/ghazal",
        "controller_name_dash" => "bhai-nand-lal/ghazal"
    ),
    "quatrains" => array(
        "page_name" => "page",
        "page_from" => 1,
        "db_start_pageID" => 64,
        "page_to" => 19,
        "controller_name" => "bhai_nand_lal/quatrains",
        "controller_name_dash" => "bhai-nand-lal/quatrains"
    )
);


//$SG_SearchTypes = array("firstLetter" => "first letters search in the begin",
//    "firstLetterSearchData" => "first letters search anywhere",
//    "begin" => "begins with",
//    "alldata" => "with all of the words",
//    "anydata" => "with any of the words",
//    "withoutdata" => "without the words",
//    "exact" => "with the exact phrase"
//);
//
//$SG_SearchLanguage = array("translit" => "Transliteration",
//    "punjabi" => "Gurmukhi",
//    "english" => "English",
//    "hindi" => "Hindi"
//);

$SG_SearchTypes = array(
    "FL_begin" => "First letter Beginning",
    "FL_any" => "First letter Anywhere",
    "PHRASE" => "Phrase",

);

$SG_SearchLanguage = array(
    "ROMAN" => "Phonetic Roman",
    "PUNJABI-ASC" => "Gurmukhi ASCII",
    "PUNJABI" => "Gurmukhi Unicode"

);

/*
|--------------------------------------------------------------------------
| Website Language Preferences
|--------------------------------------------------------------------------
|
| The website's search results language preferences.
| Loaded with default languages at first.
| While changing them in the preferences page it will be stored in
| browser cookies and will be used from the cookies.
|
*/
$SG_Languages = array(

    "lang_1" => array(
        "lang_name" => "Gurmukhi",//to be displayed in preferences page
        "field_name" => "punjabi", //fields to be displayes in the page view (if its an array we should show all fields mentioned
        "tables" => array("ggs", "ak", "bgv", "dg", "ks", "zindginama", "ganjnama", "jot_bikas", "jot_bikas_persian", "rahitnama", "tankahnama", "ghazal", "quatrains"),
        // available in the scriptures
        "active" => true,
        'relation' => 'main_heading'
    ),
    "lang_14" => array(
	    "lang_name" => "Punctuations Gurmukhi",
	    "field_name" => "punctuation",
	    "tables" => array("ggs", "ak", "bgv", "dg", "ks", "zindginama", "ganjnama", "jot_bikas", "jot_bikas_persian", "rahitnama", "tankahnama", "ghazal", "quatrains"),
	    "active" => true,
	    'relation' => 'main_heading'
    ),
    "lang_26" => array(
	    "lang_name" => "Lareevar",
	    "field_name" => "lareevar",
	    "tables" => array("ggs", "ak", "bgv", "dg", "ks", "zindginama", "ganjnama", "jot_bikas", "jot_bikas_persian", "rahitnama", "tankahnama", "ghazal", "quatrains"),
	    "active" => true,
	    'relation' => 'main_heading'
    ),
    "lang_2" => array(
        "lang_name" => "Phonetic English",
        "field_name" => "translit",
        "tables" => array("ggs", "ak", "bgv", "dg", "ks", "zindginama", "ganjnama", "jot_bikas", "jot_bikas_persian", "rahitnama", "tankahnama", "ghazal", "quatrains"),
        "active" => true
    ),
    "lang_3" => array(
        "lang_name" => "Hindi Transliteration",
        "field_name" => "hindi",
        "tables" => array("ggs", "ak", "bgv", "dg", "ks", "zindginama", "ganjnama", "jot_bikas", "jot_bikas_persian", "rahitnama", "tankahnama", "ghazal", "quatrains"),
        "active" => true
    ),
    "lang_4" => array(
        "lang_name" => "English Translation",
        "field_name" => "english",
        "tables" => array("ggs", "ak", "bgv", "dg", "ks", "zindginama", "ganjnama", "jot_bikas", "jot_bikas_persian", "rahitnama", "tankahnama", "ghazal", "quatrains"),
        "active" => true
    ),
    "lang_5" => array(
        "lang_name" => "English Transliteration",
        "field_name" => "roman",
        "tables" => array("ggs", "ak", "bgv", "dg", "ks", "zindginama", "ganjnama", "jot_bikas", "jot_bikas_persian", "rahitnama", "tankahnama", "ghazal", "quatrains"),
        "active" => true
    ),

    "lang_6" => array(
        "lang_name" => "Shahmukhi Transliteration",
        "field_name" => "urdu",
        "tables" => array("ggs", "ak", "bgv", "dg", "ks", "zindginama", "ganjnama", "jot_bikas", "jot_bikas_persian", "rahitnama", "tankahnama", "ghazal", "quatrains"),
        "active" => true
    ),
    "lang_7" => array(
        "lang_name" => "Kabit Bhai Gurdas Teeka  by Sant Sampuran Singh - Gurmukhi",
        "field_name" => "teeka_punjabi",
        "tables" => array("ks"),
        "active" => true
    ),
    "lang_8" => array(
        "lang_name" => "Kabit Bhai Gurdas Teeka  by Sant Sampuran Singh - Hindi",
        "field_name" => "teeka_hindi",
        "tables" => array("ks"),
        "active" => true
    ),
    "lang_9" => array(
        "lang_name" => "Kabit Bhai Gurdas Teeka  by Sant Sampuran Singh - Phonetic English",
        "field_name" => "teeka_roman",
        "tables" => array("ks"),
        "active" => true
    ),
    "lang_10" => array(
        "lang_name" => "Vaaran Bhai Gurdas  Teeka by Giani Hazara Singh  (Edited by Bhai Veer Singh ) - Gurmukhi",
        "field_name" => "teeka",
        "tables" => array("bgv"),
        "active" => true
    ),
    "lang_11" => array(
        "lang_name" => "Vaaran Bhai Gurdas  Teeka by Giani Hazara Singh  (Edited by Bhai Veer Singh ) - Hindi",
        "field_name" => "teeka_hindi",
        "tables" => array("bgv"),
        "active" => true
    ),
    "lang_12" => array(
        "lang_name" => "Vaaran Bhai Gurdas  Teeka by Giani Hazara Singh  (Edited by Bhai Veer Singh ) - Phonetic English",
        "field_name" => "teeka_roman",
        "tables" => array("bgv"),
        "active" => true
    ),
    "lang_13" => array(
        "lang_name" => "Varaan Bhai Gurdas punctuation published by SGPC Amritsar",
        "field_name" => array("sgpc", "sgpc2"),
        "tables" => array("bgv"),
        "active" => true
    ),
    "lang_27" => array(
	    "lang_name" => "Teeka Bhai Nand Lal Baani",
	    "field_name" => array("teeka"),
	    "tables" => array("bnl","ghazal","ganjnama","jot_bikas","jot_bikas_persian","quatrains","rahitnama","tankahnama","zindginama"),
	    "active" => true
    ),
    "lang_15" => array(
        "lang_name" => "Dasam Granth teeka (by Rattan Singh Jaggi)",
        "field_name" => array("dgteeka"),
        "tables" => array("dg"),
        "active" => true
    ),
    "lang_16" => array(
        "lang_name" => "Translation of Sri Guru Granth Sahib ji (by S. Manmohan Singh) - Punjabi",
        "field_name" => "punj_mms",
        "tables" => array("ggs"),
        "active" => true
    ),
    "lang_17" => array(
        "lang_name" => "Translation of Sri Guru Granth Sahib ji (by S. Manmohan Singh) - English",
        "field_name" => "eng_mms",
        "tables" => array("ggs"),
        "active" => true
    ),
    "lang_18" => array(
        "lang_name" => "Guru Granth Sahib Darpan (by Prof. Sahib Singh)",
        "field_name" => array("ss_line", "ss_pad", "ss_para"),
        "tables" => array("ggs"),
        "active" => true
    ),
    "lang_19" => array(
        "lang_name" => "Faridkot Wala Teeka",
        "field_name" => array("fwt", "fwt_2", "fwt_3"),
        "tables" => array("ggs"),
        "active" => true
    ),
    "lang_20" => array(
        "lang_name" => "Shabadarth Sri Guru Granth Sahib ji published by SGPC Amritsar",
        "field_name" => array("sgpc_1", "sgpc_2", "sgpc_3"),
        "tables" => array("ggs"),
        "active" => true
    ),
    "lang_21" => array(
        "lang_name" => "Spanish",
        "field_name" => "spanish",
        "tables" => array("ggs", "ak", "bgv", "dg", "ks"),
        "active" => false
    ),
    "lang_22" => array(
        "lang_name" => "French",
        "field_name" => "french",
        "tables" => array("ggs", "ak", "bgv", "dg", "ks"),
        "active" => false
    ),
    "lang_23" => array(
        "lang_name" => "German",
        "field_name" => "german",
        "tables" => array("ggs", "ak", "bgv", "dg", "ks"),
        "active" => false
    ),
    "lang_24" => array(
        "lang_name" => "Teeka by Dr. Rattan Singh 'Jaggi'",
        "field_name" => "dgteeka",
        "tables" => array("dg"),
        "active" => false
    ),
    "lang_25" => array(
        "lang_name" => "Faridkot Wala Teeka in Hindi",
        "field_name" => "fwt_hindi",
        "tables" => array("ggs"),
        "active" => true
    ),
);

$SG_Preferences = array(
    "lang_1" => "yes",
    "lang_2" => "yes",
    "lang_3" => "no",
    "lang_4" => "yes",
    "lang_5" => "no",
    "lang_6" => "no",
    "lang_7" => "no",
    "lang_8" => "no",
    "lang_9" => "no",
    "lang_10" => "no",
    "lang_11" => "no",
    "lang_12" => "no",
    "lang_13" => "no",
    "lang_14" => "no",
    "lang_15" => "no",
    "lang_16" => "no",
    "lang_17" => "no",
    "lang_18" => "no",
    "lang_19" => "no",
    "lang_20" => "no",
    "lang_21" => "no",
    "lang_22" => "no",
    "lang_23" => "no",
    "lang_24" => "no",
    "lang_25" => "no",
    "lang_26" => "no",
    "lang_27" => "no",
    // Misc
    "text_type" => "line_by_line",
    'share_text_name' => 'english',
    'share_type' => 'line',
    "ucharan_type" => "normal",
    "mouse_over_gurmukhi_dictionary" => "no",
    "show_attributes" => "yes",
    "allow_share_lines" => "off",
    "lareevar_assist" => "off",
);


/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('EXIT_SUCCESS') OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR') OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG') OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE') OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS') OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT') OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE') OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN') OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX') OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

/* End of file constants.php */
/* Location: ./system/application/config/constants.php */