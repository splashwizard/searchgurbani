<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search_logic extends CI_Model
{

    /**
     * Method to get the occurences of the search terms in each Scriptures
     */
    function get_results_count($search_text, $search_type, $search_case_sensitive, $search_language, $search_scriptures,
                               $search_author = '', $search_raag = '', $search_page_from = '', $search_page_to = '', $individual_search = '', $search_from = '')
    {

        // Global Variables
        global $SG_ScriptureTypes;

        $search_text = $this->db->escape($search_text);
        // Set search parameters in Sessoin
        $search_parameters = array("search_text" => $search_text,
            "search_type" => $search_type,
            "search_case_sensitive" => $search_case_sensitive,
            "search_language" => $search_language,
            "search_author" => $search_author,
            "search_raag" => $search_raag,
            "search_page_from" => $search_page_from,
            "search_page_to" => $search_page_to,
            "individual_search" => $individual_search
        );
        /*echo "<pre>";
        print_r($search_parameters);
        echo "-";
        print_r($search_scriptures);


        exit;*/
        $this->session->set_userdata('search_parameters', $search_parameters);
        $result_counts = array();// initializing result count array

        //check if Case Sensitive is required or not
        if ($search_case_sensitive == "on") {
            $binary = 'Binary';
            log_message('info', 'SG: Search is case sensitive');
        } else {
            $binary = '';
            log_message('info', 'SG: Search is NON case sensitive');
        }


        foreach ($search_scriptures as $scripture) {
            // Local Variables - Initialization
            $utf = 0; //Search Language's Unicode Format
            $regexpression = ''; //
            $page_start = $SG_ScriptureTypes[$scripture][5];//1;
            $page_end = $SG_ScriptureTypes[$scripture][6];//1430;
            $index = 0;
            $raag = 'any';
            $ar_query = '';


            $result_counts[$scripture] = array("scripture_name" => $SG_ScriptureTypes[$scripture][1],
                "result_count" => 0,
                "result_query" => '');


            /**
             * srigurugranthsahib    (punjabi,english,translit,hindi)
             * amritkeertan        (punjabi,english,translit,hindi)
             * bhai gurdas vaaran    (punjabi,english,translit,hindi)
             * dasamgranth            (punjabi,english,translit,hindi)
             * kabit bhai gurdas    (punjabi,translit,hindi)
             */
            if ($scripture == 'ks' and $search_language == 'english') {
                //echo "skipped " .$scripture;
                continue;
            }

            if ($individual_search == 1) {


                if ($scripture == 'ggs' or $scripture == 'ak') {
                    $ar_query .= ($search_raag != "any" ? " and raag = '" . $search_raag . "'" : "");
                    $ar_query .= ($search_author != "any" ? " and author = '" . $search_author . "'" : "");
                }

                if ($search_page_from != "" and $search_page_to != "") {
                    $ar_query .= " and `" . $SG_ScriptureTypes[$scripture][4] . "` >= " . $this->db->escape($search_page_from) . " and `" . $SG_ScriptureTypes[$scripture][4] . "` <= " . $this->db->escape($search_page_to) . " ";
                }
                if ($scripture == 'bnl' or $search_from != '') {
                    $ar_query .= " and name='" . $search_from . "'";
                }

                /*if($search_from != '')
                {
                        $ar_query .= " and name='".$search_from."'";
                }*/


            }

            //echo $ar_query."sdds";exit;

            if ($search_type == "firstLetter" or $search_type == "firstLetterSearchData") {

                // Search Type: first letters search in the begin
                log_message('info', 'SG: Search Type: first letters search in the begin');

                if ($search_language == 'punjabi' or $search_language == 'hindi') {

                    $utf = 1;
                    log_message('info', 'SG: Search Languange is UTF1 (' . $search_language . ')');
                    $search_text_max_length = 8;

                    /** Existing code **/
                    $search_text_length = strlen(utf8_decode($search_text));
                    $ln = strlen($search_text) / $search_text_length;
                    $cond = '';

                    for ($i = 0; $i < $search_text_length; $i++) {
                        $let = mb_substr($search_text, $i, 1, "utf-8");
                        if ($i < (mb_strlen($search_text) - 1))
                            $regexpression .= $let . "[^ ]*[ ]+";
                        else
                            $regexpression .= $let;

                        if ($search_type == "firstLetter") {
                            if ($i > 0)
                                $cond .= " OR ($binary trim($search_language) LIKE '$let%') ";
                            else
                                $cond .= " ($binary trim($search_language) LIKE '$let%') ";
                        } else {
                            if ($i > 0)
                                $cond .= "OR ($binary trim($search_language) LIKE '% $let%' OR $binary trim($search_language) LIKE '$let%')";
                            else
                                $cond .= "($binary trim($search_language) LIKE '% $let%' OR $binary trim($search_language) LIKE '$let%')";
                        }
                        if ($i > ($search_text_max_length - 1))
                            break;
                    }
                    $cond = ' (' . $cond . ') ';
                    if ($scripture == 'bnl' and ($search_from == 'Ghazal' or $search_from == 'Rubaaee')) {
                        $query = "select 
								*, 0 as sorder  
							from 
								`" . $SG_ScriptureTypes[$scripture][2] . "` 
							where 
								$cond $ar_query and 
								(`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end)";

                        $actual_result = "select 
										*, 1 as sorder 
									from 
										`" . $SG_ScriptureTypes[$scripture][2] . "` 
									where 
										$cond $ar_query and 
										(`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end)";
                    } else {
                        $query = "select 
								*, 0 as sorder  
							from 
								`" . $SG_ScriptureTypes[$scripture][3] . "` 
							where 
								$cond $ar_query and 
								(`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end)";

                        $actual_result = "select 
										*, 1 as sorder 
									from 
										`" . $SG_ScriptureTypes[$scripture][3] . "` 
									where 
										$cond $ar_query and 
										(`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end)";
                    }
                    if ($scripture == 'bnl') {
                        log_message('info', 'SG: This page query: ' . $query);
                        //$rs_select 		= $this->db->query($query);
                        //$countresult 	= $rs_select->num_rows();
                        log_message('info', 'SG: All records for count query: ' . $actual_result);
                        $rs_actual = $this->db->query($actual_result);
                        // Result
                        $result_counts[$scripture]['result_count'] = $rs_actual->num_rows();
                        $result_counts[$scripture]['result_query'] = base64_encode($actual_result);
                    } else {
                        $regbegin_middle = "/ ";
                        $regbegin = "/^";
                        $regexpression .= "/";

                        $regexp_middle = $regbegin_middle . $regexpression;
                        $regexp_begin = $regbegin . $regexpression;

                        //$query = $query." order by sorder, `".$SG_ScriptureTypes[$scripture][4]."`, pagelineno limit $index,25";

                        $rs_select = $this->db->query($query);

                        $countresult = $rs_select->num_rows();

                        $rs_actual = $this->db->query($actual_result);
                        $aktotal = 0;

                        /*
                        $this->session->set_userdata('sess_page_query',$query);
                        $this->session->set_userdata('sess_full_query',$actual_result);
                        */
                        $utf_rows = array();
                        $ak_lines = array();
                        foreach ($rs_actual->result() as $row) {
                            if (preg_match($regexp_begin, $row->$search_language)) {
                                $aktotal++;
                                $utf_rows[] = $row;
                                $ak_lines[] = $row->lineno;
                            } elseif ($search_type != "firstLetter" && preg_match($regexp_middle, $row->$search_language)) {
                                $aktotal++;
                                $utf_rows[] = $row;
                                $ak_lines[] = $row->lineno;
                            }
                        }

                        $nu = array();
                        for ($p = $index; $p < count($utf_rows); $p++) {
                            if ($p - $index > 24)
                                break;
                            $nu[] = $utf_rows[$p];
                        }
                        $utf_rows = $nu;

                        $SQL = "select * from `" . $SG_ScriptureTypes[$scripture][3] . "` where lineno in (";

                        $query = $this->db->where_in('lineno', $ak_lines);

                        $SQL_wr = '';
                        foreach ($ak_lines as $qry_line_no) {
                            $SQL_wr .= $qry_line_no . ",";
                        }
                        $SQL .= trim($SQL_wr, ",") . ")";

                        $result_counts[$scripture]['result_count'] = $aktotal;
                        $result_counts[$scripture]['result_query'] = base64_encode($SQL);
                        /** End: Existing code **/

                    }

                    //echo $query."====";
                    //echo $actual_result."====";exit;


                } else {
                    $utf = 0;
                    $search_text = preg_replace("/[-\s\n\r\'\"_,;:\.]+/", "", $search_text);
                    $search_text_length = strlen($search_text);
                    $search_text_max_length = 8;

                    log_message('info', 'SG: Search Languange is NOT UTF (' . $search_language . ')');

                    for ($i = 0; $i < $search_text_length; $i++) {
                        if ($i < ($search_text_length - 1))
                            $regexpression .= substr($search_text, $i, 1) . "[^ ]*[ ]+";
                        else
                            $regexpression .= substr($search_text, $i, 1);
                        if ($i == $search_text_max_length)
                            break;
                    }

                    $regbegin_middle = "' ";
                    $regbegin = "'^";
                    $regexpression .= "'";

                    $regexp_middle = $regbegin_middle . $regexpression;
                    $regexp_begin = $regbegin . $regexpression;

                    $rm_expression = " OR $binary trim($search_language) RLIKE $regexp_middle";

                    if ($search_type == "firstLetter")
                        $rm_expression = '';
                    if ($scripture == 'bnl' and ($search_from == 'Ghazal' or $search_from == 'Rubaaee')) {
                        $query = "select 
								*, 0 as sorder  
							from 
								`" . $SG_ScriptureTypes[$scripture][2] . "` 
							where 
								($binary trim($search_language) RLIKE $regexp_begin $rm_expression) $ar_query and 
								(`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end)";

                        $actual_result = "select 
										*, 1 as sorder  
									from 
										`" . $SG_ScriptureTypes[$scripture][2] . "` 
									where 
										($binary trim($search_language) RLIKE $regexp_begin $rm_expression) $ar_query and 
										(`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end)";

                    } else {
                        $query = "select 
								*, 0 as sorder  
							from 
								`" . $SG_ScriptureTypes[$scripture][3] . "` 
							where 
								($binary trim($search_language) RLIKE $regexp_begin $rm_expression) $ar_query and 
								(`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end)";

                        $actual_result = "select 
										*, 1 as sorder  
									from 
										`" . $SG_ScriptureTypes[$scripture][3] . "` 
									where 
										($binary trim($search_language) RLIKE $regexp_begin $rm_expression) $ar_query and 
										(`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end)";

                    }


                    //$query 			= $query." order by sorder, `".$SG_ScriptureTypes[$scripture][4]."`, pagelineno limit $index,25";

                    log_message('info', 'SG: This page query: ' . $query);
                    //$rs_select 		= $this->db->query($query);
                    //$countresult 	= $rs_select->num_rows();

                    log_message('info', 'SG: All records for count query: ' . $actual_result);
                    $rs_actual = $this->db->query($actual_result);

                    // Result


                    $result_counts[$scripture]['result_count'] = $rs_actual->num_rows();
                    $result_counts[$scripture]['result_query'] = base64_encode($actual_result);
                }
            } elseif ($search_type == "alldata") {

                // Search Type: with all of the words
                log_message('info', 'SG: Search Type: with all of the words');
                /** Init's **/
                $query = '';

                /** Replacing symbols to spaces **/
                $search_text = preg_replace("/[-\s\n\r\'\"_,;:\.]+/", " ", $search_text);
                /** Splitting keywords **/
                $ar_search_keywords = explode(" ", $search_text);
                if ($scripture == 'bnl' and ($search_from == 'Ghazal' or $search_from == 'Rubaaee')) {
                    $full_text_query = "
					select * 
					from 
						`" . $SG_ScriptureTypes[$scripture][2] . "`
					where 
						1 $ar_query
						{query}
						and (`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end) 
				";
                } else {
                    $full_text_query = "
					select * 
					from 
						`" . $SG_ScriptureTypes[$scripture][3] . "`
					where 
						1 $ar_query
						{query}
						and (`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end) 
				";
                }


                $page_result = " limit $index,25";

                foreach ($ar_search_keywords as $search_keyword) {
                    if ($search_keyword != "") {
                        $query .= " and $binary $search_language like '%$search_keyword%' ";
                    }
                }
                $full_text_query = str_replace("{query}", trim($query), $full_text_query);

                if ($raag != "any") {
                    $full_text_query .= " and raag like '%$raag'";
                }

                log_message('info', 'SG: All records for count query: ' . $full_text_query);
                $rs_actual = $this->db->query($full_text_query);

                // Result
                $result_counts[$scripture]['result_count'] = $rs_actual->num_rows();
                $result_counts[$scripture]['result_query'] = base64_encode($full_text_query);
            } elseif ($search_type == "anydata") {

                // Search Type: with any of the words
                log_message('info', 'SG: Search Type: with any of the words');
                /** Init's **/
                $query = '';

                /** Replacing symbols to spaces **/
                $search_text = preg_replace("/[-\s\n\r\'\"_,;:\.]+/", " ", $search_text);

                /** Splitting keywords **/
                $ar_search_keywords = explode(" ", $search_text);
                if ($scripture == 'bnl' and ($search_from == 'Ghazal' or $search_from == 'Rubaaee')) {
                    $full_text_query = "
					select * 
					from 
						`" . $SG_ScriptureTypes[$scripture][2] . "`
					where 
						1 $ar_query
						and ({query})
						and (`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end) 
				";
                } else {
                    $full_text_query = "
					select * 
					from 
						`" . $SG_ScriptureTypes[$scripture][3] . "`
					where 
						1 $ar_query
						and ({query})
						and (`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end) 
				";
                }


                $page_result = " limit $index,25";

                foreach ($ar_search_keywords as $search_keyword) {
                    if ($search_keyword != "") {
                        $query .= ($query == '' ? '' : " or ") . " $binary $search_language like '%$search_keyword%' ";
                    }
                }
                $full_text_query = str_replace("{query}", trim($query), $full_text_query);

                if ($raag != "any") {
                    $full_text_query .= " and raag like '%$raag'";
                }

                log_message('info', 'SG: All records for count query: ' . $full_text_query);
                $rs_actual = $this->db->query($full_text_query);

                // Result
                $result_counts[$scripture]['result_count'] = $rs_actual->num_rows();
                $result_counts[$scripture]['result_query'] = base64_encode($full_text_query);
            } elseif ($search_type == "withoutdata") {

                // Search Type: without the words
                log_message('info', 'SG: Search Type: without the words');
                /** Init's **/
                $query = '';

                /** Replacing symbols to spaces **/
                $search_text = preg_replace("/[-\s\n\r\'\"_,;:\.]+/", " ", $search_text);
                /** Splitting keywords **/
                $ar_search_keywords = explode(" ", $search_text);

                if ($scripture == 'bnl' and ($search_from == 'Ghazal' or $search_from == 'Rubaaee')) {
                    $full_text_query = "
					select * 
					from 
						`" . $SG_ScriptureTypes[$scripture][2] . "`
					where 
						1 $ar_query
						{query}
						and (`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end) 
				";
                } else {
                    $full_text_query = "
					select * 
					from 
						`" . $SG_ScriptureTypes[$scripture][3] . "`
					where 
						1 $ar_query
						{query}
						and (`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end) 
				";
                }


                $page_result = " limit $index,25";

                foreach ($ar_search_keywords as $search_keyword) {
                    if ($search_keyword != "") {
                        $query .= " and $binary $search_language NOT like '%$search_keyword%' ";
                    }
                }
                $full_text_query = str_replace("{query}", trim($query), $full_text_query);

                if ($raag != "any") {
                    $full_text_query .= " and raag like '%$raag'";
                }

                log_message('info', 'SG: All records for count query: ' . $full_text_query);
                $rs_actual = $this->db->query($full_text_query);

                // Result
                $result_counts[$scripture]['result_count'] = $rs_actual->num_rows();
                $result_counts[$scripture]['result_query'] = base64_encode($full_text_query);
            } elseif ($search_type == "begin") {

                // Search Type: begins with
                log_message('info', 'SG: Search Type: begins with');
                /** Init's **/
                $query = '';

                /** Replacing symbols to spaces **/
                //$search_text = preg_replace("/[-\s\n\r\'\"_,;:\.]+/"," ",$search_text);
                /** Splitting keywords **/
                if ($scripture == 'bnl' and ($search_from == 'Ghazal' or $search_from == 'Rubaaee')) {
                    $full_text_query = "
					select * 
					from 
						`" . $SG_ScriptureTypes[$scripture][2] . "`
					where 
						$binary $search_language like '" . trim($this->db->escape($search_text), "'") . "%' $ar_query
						and (`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end) 
				";
                } else {
                    $full_text_query = "
					select * 
					from 
						`" . $SG_ScriptureTypes[$scripture][3] . "`
					where 
						$binary $search_language like '" . trim($this->db->escape($search_text), "'") . "%' $ar_query
						and (`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end) 
				";
                }


                $page_result = " limit $index,25";

                if ($raag != "any") {
                    $full_text_query .= " and raag like '%$raag'";
                }

                log_message('info', 'SG: All records for count query: ' . $full_text_query);
                $rs_actual = $this->db->query($full_text_query);

                // Result
                $result_counts[$scripture]['result_count'] = $rs_actual->num_rows();
                $result_counts[$scripture]['result_query'] = base64_encode($full_text_query);
            } elseif ($search_type == "exact") {

                // Search Type: with the exact phrase
                log_message('info', 'SG: Search Type: with the exact phrase');
                /** Init's **/
                $query = '';

                /** Replacing symbols to spaces **/
                //$search_text = preg_replace("/[-\s\n\r\'\"_,;:\.]+/"," ",$search_text);

                /** Splitting keywords **/
                if ($scripture == 'bnl' and ($search_from == 'Ghazal' or $search_from == 'Rubaaee')) {
                    $full_text_query = "
					select * 
					from 
						`" . $SG_ScriptureTypes[$scripture][2] . "`
					where 
						$binary $search_language LIKE '%" . trim($this->db->escape($search_text), "'") . "%' $ar_query
						and (`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end)
				";//MATCH(`$search_language`) AGAINST (\"". trim($this->db->escape($search_text),"'") ."\")
                } else {
                    $full_text_query = "
					select * 
					from 
						`" . $SG_ScriptureTypes[$scripture][3] . "`
					where 
						$binary $search_language LIKE '%" . trim($this->db->escape($search_text), "'") . "%' $ar_query
						and (`" . $SG_ScriptureTypes[$scripture][4] . "` between $page_start and $page_end)
				";//MATCH(`$search_language`) AGAINST (\"". trim($this->db->escape($search_text),"'") ."\")
                }


                $page_result = " limit $index,25";

                if ($raag != "any") {
                    $full_text_query .= " and raag like '%$raag'";
                }

                log_message('info', 'SG: All records for count query: ' . $full_text_query);
                $rs_actual = $this->db->query($full_text_query);

                // Result
                $result_counts[$scripture]['result_count'] = $rs_actual->num_rows();
                $result_counts[$scripture]['result_query'] = base64_encode($full_text_query);
            }
        }
        /*echo "<pre>";
        print_r($result_counts);
        echo "</pre>";*/
        $this->session->set_userdata('search_results', $result_counts);
        return $result_counts;

    }


    /**
     * Get search results using the query from session (BEFORE base64_decode()
     * @query - base64_encoded SQL query
     * return @results - DB Query Result Object
     */
    function get_results($query, $index = 0, $order_by = "")
    {

        $query = base64_decode($query);
        $query .= $order_by . " limit $index, 25";
        //echo $query;exit;
        $rs = $this->db->query($query);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }
}

?>