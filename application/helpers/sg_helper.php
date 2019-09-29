<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function get_data_by_preferences($data, $pref_name)
{
    global $SG_Preferences;
    if ($SG_Preferences[$pref_name] == "yes" || $SG_Preferences[$pref_name] == "on")
        return $data;
    else
        return '';
}

//	function print_page_by_page_lareevar($lareevar_lines,$pref_name,$alt_row = -1){
//
//		global $SG_Preferences;
//
//		if($SG_Preferences['lang_26'] == "yes" && $pref_name =='lareevar_assist_button'){
//			$alt_row = 1;
//			}
//
//		if($pref_name == 'lareevar'){
//			$pre_name = 'Lareevar';
//		}
//		if($pref_name == 'lareevar_assist_button'){
//			$pre_name = 'Lareevar assist button';
//		}
//
//		$output = '';
//		if ($SG_Preferences[$pref_name] == "yes"){
//			$output .= '<p><strong>In ' . $pre_name . '</strong></p>';
//			$output .= '<div class="line row' . $alt_row . '">';
//			foreach ($lareevar_lines as $lareevar_line)
//			{
//				$output .= $lareevar_line['data'];
//			}
//			$output .= '</div>';
//		}
//		return $output;
//	}

function get_printable_languages($scripture)
{
    global $SG_Preferences, $SG_Languages;
    $languages = array();
    foreach ($SG_Languages as $language_key => $language_data) {
        if (in_array($scripture, $language_data['tables']) and
            $language_data['active'] == true and
            $SG_Preferences[$language_key] == 'yes'
        ) {
            if (is_array($language_data["field_name"])) {
                foreach ($language_data["field_name"] as $lang) {
                    $languages[] = array($language_key, $lang, 'lang_name' => $language_data['lang_name'], 'data' => '');
                }
            } else {
                $languages[] = array($language_key, $language_data["field_name"], 'lang_name' => $language_data['lang_name'], 'data' => '');
            }
        }
    }
    return $languages;
}

function print_line($language = array(), $row_object, $keywords = array(), $class = '')
{
    global $SG_Preferences;
    $output = '';
    $lang_class = $language[0] == 'lang_26' ? 'lang_1' : $language[0]; // lang_1, lang_2,..
    $field = $language[1] == 'lareevar' ? 'punjabi' : $language[1]; // punjbai, hindi,..

    if (isset($row_object->$field)) {
	
	    if ($field == 'punjabi' and $SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $data = $row_object->$field;
            foreach ($keywords as $keyword => $meaning) {
                $replace = '<a class="tt" title="' . $meaning . '" href="' . site_url('sggs-kosh/do-search/' . $keyword) . '" target="_blank">' . $keyword . '</a>';
                //$data = str_replace($keyword." ",$replace,$data);
                $data = str_replace(" " . $keyword . " ", " " . $replace . " ", " " . $data);
            }
            $output .= '<p class="' . $lang_class . $class . '">' . $data . '</p>';
        } else {
	        
            $rtl = ($field == 'urdu' ? ' align="right"' : '');
		    
	        if($SG_Preferences['lang_26'] == "yes" && $lang_class == "lang_1" ){
		        $output .= print_lareevar_assist_line($row_object->punjabi);
		        
	        }else{
		        $output .= '<p class="' . $lang_class . $class . '" ' . $rtl . '>' . $row_object->$field . '</p>';
	        }
            
        }
    }
    return $output;
}

function print_lareevar_assist_line($lareevar_assist,$highlight = ''){
	global $SG_Preferences;
	if ($SG_Preferences['lang_26'] == "yes"){
		$words = explode(" ", $lareevar_assist);
		$output_string = '';
		$output = '';
		$lareevar_obj = true;
		
		foreach($words as $key => $word){
			
			$output_string .= '<span data-lareevar-obj="'.$lareevar_obj.'">' . $word . '</span>';
			$lareevar_obj = !$lareevar_obj;
		}
		$output .='<p class="lang_1 '.$highlight.'">' .$output_string . '</p>';
	}else{
		$output = '';
	}
	
	return $output;
}


/**
 * (!) DEPRECATED
 */
function display_lines_of($scripture, $row_object, $keywords = array())
{
    global $SG_Preferences, $SG_Languages;
    $output = '';
    foreach ($SG_Languages as $language_key => $language_data) {
        if (in_array($scripture, $language_data['tables']) and
            $language_data['active'] == true and
            $SG_Preferences[$language_key] == 'yes'
        ) {
            if (is_array($language_data["field_name"])) {
                foreach ($language_data["field_name"] as $lang) {
                    $languages[] = array($language_key, $lang);
                }
            } else {
                $languages[] = array($language_key, $language_data["field_name"]);
            }
        }
    }
    //print_r($languages);exit;
    //print_r($keywords);exit;
    foreach ($languages as $language) {
        //lang
        $field = $language[1];
        if ($language[1] == 'punjabi' and $SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $data = $row_object->$field;
            foreach ($keywords as $keyword => $meaning) {
                $replace = '<a class="tt" title="' . $meaning . '" href="' . site_url('resources/dictionary/' . $keyword) . '" target="_blank">' . $keyword . '</a>';
                //$data = str_replace($keyword." ",$replace,$data);
                $data = str_replace(" " . $keyword . " ", " " . $replace . " ", " " . $data);
            }
            $output .= '<p class="' . $language[0] . '">' . $data . '</p>';
        } else {
            $output .= '<p class="' . $language[0] . '">' . $row_object->$field . '</p>';
        }
    }
    //echo $output;exit;
    return $output;
}

/**
 * Highlight the given $keywords in the $line
 * based on the $highlight_type
 *
 * @keyword        - May be a single word or multiple words
 * @line            - the line where the keywords to be replaced
 * @highlight_type    - a value from global $SG_SearchTypes array
 *
 * @return            - A string of line with the keywords surrounded with highlight class
 */

function highlight_keywords($keywords, $line, $highlight_type)
{
    $class = 'hl';
    switch ($highlight_type) {
        case 'firstLetter':

            break;
        case 'firstLetterSearchData':

            break;
        case 'begin':
            $line = str_ireplace($keywords, '<span class="' . $class . '">' . $keywords . '</span>', $line);
            break;
        case 'alldata':
            $keywords_ar = explode(" ", $keywords);
            foreach ($keywords_ar as $kw) {
                $line = str_ireplace($kw, '<span class="' . $class . '">' . $kw . '</span>', $line);
            }
            break;
        case 'anydata':
            $keywords_ar = explode(" ", $keywords);
            foreach ($keywords_ar as $kw) {
                $line = str_ireplace($kw, '<span class="' . $class . '">' . $kw . '</span>', $line);
            }
            break;
        case 'withoutdata':

            break;
        case 'exact':
            $line = str_ireplace($keywords, '<span class="' . $class . '">' . $keywords . '</span>', $line);
            break;
    }
    return $line;
}


function utf8tohtml($utf8, $encodeTags)
{
    $result = '';
    for ($i = 0; $i < strlen($utf8); $i++) {
        $char = $utf8[$i];
        $ascii = ord($char);
        if ($ascii < 128) {
            // one-byte character
            $result .= ($encodeTags) ? htmlentities($char) : $char;
        } else if ($ascii < 192) {
            // non-utf8 character or not a start byte
        } else if ($ascii < 224) {
            // two-byte character
            $result .= htmlentities(substr($utf8, $i, 2), ENT_QUOTES, 'UTF-8');
            $i++;
        } else if ($ascii < 240) {
            // three-byte character
            $ascii1 = ord($utf8[$i + 1]);
            $ascii2 = ord($utf8[$i + 2]);
            $unicode = (15 & $ascii) * 4096 +
                (63 & $ascii1) * 64 +
                (63 & $ascii2);
            $result .= "&#$unicode;";
            $i += 2;
        } else if ($ascii < 248) {
            // four-byte character
            $ascii1 = ord($utf8[$i + 1]);
            $ascii2 = ord($utf8[$i + 2]);
            $ascii3 = ord($utf8[$i + 3]);
            $unicode = (15 & $ascii) * 262144 +
                (63 & $ascii1) * 4096 +
                (63 & $ascii2) * 64 +
                (63 & $ascii3);
            $result .= "&#$unicode;";
            $i += 3;
        }
    }
    return $result;
}

/**
 * Get the last segment of the current URL
 */
function get_last_segment()
{
    $CI =& get_instance();
    $n = $CI->uri->total_segments();
    return $CI->uri->segment($n);
}

function is_start_with($string, $needle)
{
    $len = strlen($needle);
    $substr = substr($string, 0, $len);
    if (strtolower($substr) == strtolower($needle)) {
        return true;
    } else {
        return false;
    }
}

function stringSearch($strStart, $strEnd, $strSearchString, $showPos = false, $arrSubStr = array())
{
    //print "Start String: ".$strStart."<br>";
    //print "End String: ".$strEnd."<hr>";

    $intStartLen = strlen($strStart);
    $intEndLen = strlen($strEnd);
    //==========================================
    $intStartPos = strpos($strSearchString, $strStart);

    if ($intStartPos === false)
        return $arrSubStr;

    $strRemainAfterStart = substr($strSearchString, $intStartPos + $intStartLen);

    $intEndPos = strpos($strRemainAfterStart, $strEnd);
    if ($intEndPos !== false)
        $intEndPos = $intEndPos + $intStartPos + $intStartLen;
    else
        return $arrSubStr;

    $intResultStartPos = $intStartPos + $intStartLen;
    $strResult = substr($strSearchString, $intResultStartPos, $intEndPos - $intResultStartPos);

    $strRemain = substr($strSearchString, $intEndPos + $intEndLen);
    $intNextStartPos = strpos($strRemain, $strStart);

    if ($showPos == true) {
        $arrList['S'] = $intStartPos;
        $arrList['E'] = $intEndPos;
        $arrList['L'] = $intEndPos - $intResultStartPos;
        $arrSubStr[] = $arrList;
    } else {
        $arrSubStr[] = $strResult;
    }

    if ($intNextStartPos !== false && $intStartPos !== false && $intEndPos !== false)
        return $this->stringSearch($strStart, $strEnd, $strRemain, $showPos, $arrSubStr);
    else
        return $arrSubStr;
}