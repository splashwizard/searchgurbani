<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_search extends CI_Model
{
    public function get_words($searchVal)
    {

        $TABLE_MAP = array(
            'ak' => 'A01',
            'ggs' => 'S01',
            'dg' => 'D01',
            'ks' => 'K01',
            'bnl' => 'N01',
            'bgv' => 'B01',
        );
        $TABLE = $TABLE_MAP[$searchVal['scripture']];

        $PRIMARY_COL = (in_array($TABLE, array('S01', 'K01', 'N01', 'D01'))) ? 'ID' : 'lineID';

        $QUERY_STR_FL = $this->db->escape_like_str($searchVal['keyword']);
        $QUERY_STR_FL = trim(str_replace(' ', '[a-z\@]* ', $QUERY_STR_FL));
        $SQL_COND = '';
        $JOIN_COL = '';
        $JOIN_TABLE = FALSE;

        if ($TABLE == 'N01' && !empty($searchVal['bnlSelect'])) {

            $JOIN_TABLE = TRUE;
            $JOIN_COL .= ', ' . $TABLE . '.name';
            $SQL_COND .= ' AND `' . $TABLE . '`.`name` = ' .
            $this->db->escape($searchVal['bnlSelect']);

        }

        if (!empty($searchVal['author'])) {

            $JOIN_TABLE = TRUE;
            $JOIN_COL .= ', ' . $TABLE . '.author_id';
            $SQL_COND .= ' AND `' . $TABLE . '`.`author_id` = ' .
            $this->db->escape($searchVal['author']);
        }

        if (!empty($searchVal['raag'])) {

            $JOIN_TABLE = TRUE;
            $JOIN_COL .= ', ' . $TABLE . '.raag_id';
            $SQL_COND .= ' AND `' . $TABLE . '`.`raag_id` = ' .
            $this->db->escape($searchVal['raag']);
        }

        $colName = array(
            'table' => $JOIN_TABLE == TRUE ? '`SX01`.`table`' : '`table`',
            'pageID' => $JOIN_TABLE == TRUE ? '`SX01`.`pageID`' : '`pageID`',
            'walpha' => $JOIN_TABLE == TRUE ? '`SX01`.`walpha`' : '`walpha`',
            'wgamma' => $JOIN_TABLE == TRUE ? '`SX01`.`wgamma`' : '`wgamma`',
            'wgamma-a' => $JOIN_TABLE == TRUE ? '`SX01`.`wgamma-a`' : '`wgamma-a`',
        );

        if (!empty($searchVal['page_from'])) {

            $SQL_COND .= ' AND ' . $colName['pageID'] . ' >= ' .
                $this->db->escape($searchVal['page_from']);
        }

        if (!empty($searchVal['page_to'])) {

            $SQL_COND .= ' AND ' . $colName['pageID'] . ' <= ' .
                $this->db->escape($searchVal['page_to']);
        }

        if ($searchVal['language'] == 'ROMAN') {

            if ($searchVal['searchtype'] == 'FL_begin') {

                $SQL_COND .= " AND " . $colName['walpha'] . " RLIKE '^" . $QUERY_STR_FL .
                    "' ORDER BY " . $colName['walpha'] . " ASC";

            } elseif ($searchVal['searchtype'] == 'FL_any') {

                $SQL_COND .= " AND " . $colName['walpha'] . " RLIKE '[[:<:]]" . $QUERY_STR_FL .
                    "' ORDER BY " . $colName['walpha'] . " ASC";

            } elseif ($searchVal['searchtype'] == 'PHRASE') {

                $SQL
                    = "SELECT LTRIM(`srch`) AS word, ID AS id FROM `SXW01` WHERE `source`= '$TABLE' AND `srch` like '%" .
                    $this->db->escape_like_str($searchVal['keyword']) . "%' LIMIT 100";
            }

            if ($searchVal['searchtype'] != 'PHRASE') {

                if ($JOIN_TABLE == TRUE) {

                    $SQL
                        = "SELECT `SX01`.`walpha` AS word, SX01.pageID AS id $JOIN_COL FROM `SX01` JOIN $TABLE on SX01.tableID = $TABLE.$PRIMARY_COL WHERE `SX01`.`table` = '$TABLE'" .
                        $SQL_COND;
                } else {

                    $SQL = "SELECT " . $colName['walpha'] . " AS word, " . $colName['pageID'] .
                        " AS id FROM `SX01` WHERE " . $colName['table'] . " = '$TABLE'" .
                        $SQL_COND;
                }
            }

        } elseif ($searchVal['language'] == 'PUNJABI-ASC') {

            if ($searchVal['searchtype'] == 'FL_begin') {

                $SQL_COND .= " AND " . $colName['wgamma-a'] . " RLIKE '^" . $QUERY_STR_FL .
                    "' ORDER BY " . $colName['wgamma-a'] . " ASC";

            } elseif ($searchVal['searchtype'] == 'FL_any') {

                $SQL_COND .= " AND " . $colName['wgamma-a'] . " RLIKE '[[:<:]]" . $QUERY_STR_FL .
                    "' ORDER BY " . $colName['wgamma-a'] . " ASC";

            } elseif ($searchVal['searchtype'] == 'PHRASE') {

                $SQL
                    = "SELECT LTRIM(`word`) AS word, ID AS id FROM `SXW01` WHERE `source`= '$TABLE' AND `word` like '%" .
                    $this->db->escape_like_str($searchVal['keyword']) . "%' LIMIT 100";
            }

            if ($searchVal['searchtype'] != 'PHRASE') {

                if ($JOIN_TABLE == TRUE) {

                    $SQL
                        = "SELECT `SX01`.`wgamma-a` AS word, SX01.pageID AS id $JOIN_COL FROM `SX01` JOIN $TABLE on SX01.tableID = $TABLE.$PRIMARY_COL WHERE `SX01`.`table` = '$TABLE'" .
                        $SQL_COND;
                } else {

                    $SQL = "SELECT " . $colName['wgamma-a'] . " AS word, " .
                        $colName['pageID'] . " AS id FROM `SX01` WHERE " .
                        $colName['table'] . " = '$TABLE'" . $SQL_COND;
                }
            }
        } elseif ($searchVal['language'] == 'PUNJABI') {

            if ($searchVal['searchtype'] == 'FL_begin') {

                $SQL_COND .= " AND " . $colName['wgamma'] . " RLIKE '^" . $QUERY_STR_FL .
                    "' ORDER BY " . $colName['wgamma'] . " ASC";

            } elseif ($searchVal['searchtype'] == 'FL_any') {

                $SQL_COND .= " AND " . $colName['wgamma'] . " RLIKE '[[:<:]]" . $QUERY_STR_FL .
                    "' ORDER BY " . $colName['wgamma'] . " ASC";

            } elseif ($searchVal['searchtype'] == 'PHRASE') {

                $SQL
                    = "SELECT LTRIM(`word`) AS word, ID AS id FROM `SXW01` WHERE `source`= '$TABLE' AND `word` like '%" .
                    $this->db->escape_like_str($searchVal['keyword']) . "%' LIMIT 100";
            }

            if ($searchVal['searchtype'] != 'PHRASE') {

                if ($JOIN_TABLE == TRUE) {

                    $SQL
                        = "SELECT `SX01`.`wgamma` AS word, SX01.pageID AS id $JOIN_COL FROM `SX01` JOIN $TABLE on SX01.tableID = $TABLE.$PRIMARY_COL WHERE `SX01`.`table` = '$TABLE'" .
                        $SQL_COND;
                } else {

                    $SQL = "SELECT " . $colName['wgamma'] . " AS word, " . $colName['pageID'] .
                        " AS id FROM `SX01` WHERE " . $colName['table'] . " = '$TABLE'" .
                        $SQL_COND;
                }
            }
        }

        $rs = $this->db->query($SQL);

        if (!empty($rs) && $rs->num_rows() > 0) {
            return $rs;
        } else {
            return FALSE;
        }
    }

    public function get_allwords($searchVal)
    {

        $query_str_FL = $this->db->escape_like_str($searchVal['keyword']);
        $query_str_FL = trim(str_replace(' ', '[a-z\@]* ', $query_str_FL));

        $ALL_SELECT = '';
        $ALL_SELECT_PHRASE = '';
        if ($searchVal['ggs'] == 'true') {

            $ALL_SELECT .= " AND ( `table` = 'S01'";
            $ALL_SELECT_PHRASE .= " AND ( `source` = 'S01'";
        }

        if ($searchVal['ak'] == 'true') {
            if ($searchVal['ggs'] == 'false') {
                $ALL_SELECT .= " AND ( `table` = 'A01'";
                $ALL_SELECT_PHRASE .= " AND ( `source` = 'A01'";
            } else {
                $ALL_SELECT .= " OR `table` = 'A01'";
                $ALL_SELECT_PHRASE .= " OR `source` = 'A01'";
            }
        }

        if ($searchVal['bgv'] == 'true') {
            if ($searchVal['ggs'] == 'false' && $searchVal['ak'] == 'false') {
                $ALL_SELECT .= " AND ( `table` = 'B01'";
                $ALL_SELECT_PHRASE .= " AND ( `source` = 'B01'";
            } else {
                $ALL_SELECT .= " OR `table` = 'B01'";
                $ALL_SELECT_PHRASE .= " OR `source` = 'B01'";
            }
        }

        if ($searchVal['dg'] == 'true') {
            if ($searchVal['ggs'] == 'false' && $searchVal['ak'] == 'false' &&
                $searchVal['bgv'] == 'false'
            ) {
                $ALL_SELECT .= " AND ( `table` = 'D01'";
                $ALL_SELECT_PHRASE .= " AND ( `source` = 'D01'";
            } else {
                $ALL_SELECT .= " OR `table` = 'D01'";
                $ALL_SELECT_PHRASE .= " OR `source` = 'D01'";
            }
        }

        if ($searchVal['ks'] == 'true') {
            if ($searchVal['ggs'] == 'false' && $searchVal['ak'] == 'false' &&
                $searchVal['bgv'] == 'false' && $searchVal['dg'] == 'false'
            ) {
                $ALL_SELECT .= " AND ( `table` = 'K01'";
                $ALL_SELECT_PHRASE .= " AND ( `source` = 'K01'";
            } else {
                $ALL_SELECT .= " OR `table` = 'K01'";
                $ALL_SELECT_PHRASE .= " OR `source` = 'K01'";
            }
        }

        if ($searchVal['bnl'] == 'true') {
            if ($searchVal['ggs'] == 'false' && $searchVal['ak'] == 'false' &&
                $searchVal['bgv'] == 'false' && $searchVal['dg'] == 'false' &&
                $searchVal['ks'] == 'false'
            ) {
                $ALL_SELECT .= " AND ( `table` = 'N01'";
                $ALL_SELECT_PHRASE .= " AND ( `source` = 'N01'";
            } else {
                $ALL_SELECT .= " OR `table` = 'N01'";
                $ALL_SELECT_PHRASE .= " OR `source` = 'N01'";
            }
        }

        $ALL_SELECT .= ")";
        $ALL_SELECT_PHRASE .= ")";

        if ($searchVal['language'] == 'ROMAN') {

            if ($searchVal['searchtype'] == 'FL_begin') {
                $SQL = "SELECT walpha AS word, ID as id FROM SX01 WHERE walpha RLIKE '^" .
                    $query_str_FL . "'" . $ALL_SELECT . " LIMIT 100";


            } elseif ($searchVal['searchtype'] == 'FL_any') {
                $SQL = "SELECT walpha AS word, ID as id FROM SX01 WHERE walpha RLIKE '[[:<:]]" .
                    $query_str_FL . "'" . $ALL_SELECT . " LIMIT 100";
            }

        }

        if ($searchVal['language'] == 'PUNJABI-ASC') {

            if ($searchVal['searchtype'] == 'FL_begin') {
                $SQL
                    = "SELECT `wgamma-a` AS word, ID as id FROM SX01 WHERE `wgamma-a` RLIKE '^" .
                    $query_str_FL . "'" . $ALL_SELECT . " LIMIT 100";
            } elseif ($searchVal['searchtype'] == 'FL_any') {
                $SQL
                    = "SELECT `wgamma-a` AS word, ID as id FROM SX01 WHERE `wgamma-a` RLIKE '[[:<:]]" .
                    $query_str_FL . "'" . $ALL_SELECT . " LIMIT 100";
            }

        }

        if ($searchVal['language'] == 'PUNJABI') {

            if ($searchVal['searchtype'] == 'FL_begin') {
                $SQL = "SELECT `wgamma` AS word, ID as id FROM SX01 WHERE `wgamma` RLIKE '^" .
                    $query_str_FL . "'" . $ALL_SELECT . " LIMIT 100";
            } elseif ($searchVal['searchtype'] == 'FL_any') {
                $SQL = "SELECT `wgamma` AS word, ID as id FROM SX01 WHERE `wgamma` RLIKE '[[:<:]]" .
                    $query_str_FL . "'" . $ALL_SELECT . " LIMIT 100";
            } elseif ($searchVal['searchtype'] == 'PHRASE') {

                $SQL
                    = "SELECT LTRIM(`word`) AS word, ID AS id FROM `SXW01` WHERE `word` like '%" .
                    $this->db->escape_like_str($searchVal['keyword']) . "%' $ALL_SELECT_PHRASE  LIMIT 100";
            }
        }

        $rs = $this->db->query($SQL);

        if (!empty($rs) && $rs->num_rows() > 0) {
            return $rs;
        } else {
            return FALSE;
        }
    }

    public function get_resources_allwords($searchVal){

        if($searchVal['table_name'] == 'GurShabad Ratanakar Mahankosh') {
            $SQL = "SELECT LTRIM(`word`) AS word, ID AS id FROM `MK01` WHERE `word` like '%" .
                $this->db->escape_like_str($searchVal['keyword']) . "%' LIMIT 100";
        }
        elseif($searchVal['table_name'] == 'Sri Guru Granth Kosh') {
            $SQL = "SELECT LTRIM(`word`) AS word, id FROM `GK01` WHERE `word` like '%" .
                $this->db->escape_like_str($searchVal['keyword']) . "%' LIMIT 100";
        }
        elseif($searchVal['table_name'] == 'Maansarovar') {
            $SQL = "SELECT LTRIM(`words`) AS word, id FROM `B-MAAN` WHERE `words` like '%" .
                $this->db->escape_like_str($searchVal['keyword']) . "%' LIMIT 100";
        }
        elseif($searchVal['table_name'] == 'SGGS Kosh') {
            $SQL = "SELECT LTRIM(`punjabi`) AS word, ID FROM `SK01` WHERE `punjabi` like '%" .
                $this->db->escape_like_str($searchVal['keyword']) . "%' LIMIT 100";
        }
        else{
            return $rs=array();
        }
        
        $rs = $this->db->query($SQL);

        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return FALSE;
        }

    }

    public function search_logic_count($search_text, $search_type, $search_tableID,
                                       $search_case_sensitive, $search_language,
                                       $search_scriptures,
                                       $search_author = '', $search_raag = '',
                                       $search_page_from = '', $search_page_to = '',
                                       $individual_search = '', $search_from = '')
    {

        // Global Variables
        global $SG_ScriptureTypes;

        // Set search parameters in Sessoin
        $search_parameters = array("search_text" => $search_text,
            "search_type" => $search_type,
            "search_tableID" => $search_tableID,
            "search_case_sensitive" => $search_case_sensitive,
            "search_language" => $search_language,
            "search_author" => $search_author,
            "search_raag" => $search_raag,
            "search_page_from" => $search_page_from,
            "search_page_to" => $search_page_to,
            "individual_search" => $individual_search
        );

        $this->session->set_userdata('search_parameters', $search_parameters);
        $result_counts = array();// initializing result count array


        $query_str_FL = $this->db->escape_like_str($search_text);
        $query_str_FL = trim(str_replace(' ', '[a-z\@]* ', $query_str_FL));

        foreach ($search_scriptures as $scripture) {

            /* Search for guru granth sahib*/

            if ($scripture == 'ggs') {


                $result_counts[$scripture]
                    = array("scripture_name" => $SG_ScriptureTypes[$scripture][1],
                    "result_count" => 0, "result_query" => '');


                $SQL_language_table = '';

                if ($search_language == 'ROMAN')
                    $SQL_language_table .= "SX01.walpha";

                if ($search_language == 'PUNJABI-ASC')
                    $SQL_language_table .= "SX01.`wgamma-a`";

                if ($search_language == 'PUNJABI')
                    $SQL_language_table .= "SX01.wgamma";

                $SQL_part = '';

                if ($search_author) {
                    $SQL_part .= " AND S01.author_id= " . $search_author . " ";
                }

                if ($search_raag) {

                    $SQL_part .= " AND S01.raag_id= " . $search_raag;
                }

                if ($search_page_from || $search_page_to) {
                    $SQL_part .= " AND S01.pageID BETWEEN " . $search_page_from . " AND " .
                        $search_page_to;
                }

                if ($search_type == 'FL_begin') {
                    if ($search_tableID == '') {
                        $SQL
                            = "SELECT  S01.*,S01.ID AS id, S01.pageID AS pageno, S01.pagelineID AS pagelineno, S01.lineID AS lineno, S01.shabdID AS shabad_id, S01.shabdlineID AS shabadlineno, S01.attributes AS pattrib,SX01.table,SX01.tableID," . $SQL_language_table . " FROM S01 JOIN SX01 on S01.ID = SX01.tableID WHERE SX01.table='S01' " .
                            $SQL_part . " AND " . $SQL_language_table . " RLIKE '^" . $query_str_FL .
                            "' ORDER BY S01.pagelineID ASC";
                    } else {
                        $SQL
                            = "SELECT  S01.*,S01.ID AS id, S01.pageID AS pageno, S01.pagelineID AS pagelineno, S01.lineID AS lineno, S01.shabdID AS shabad_id, S01.shabdlineID AS shabadlineno, S01.attributes AS pattrib,SX01.table,SX01.tableID FROM S01 JOIN SX01 on S01.ID = SX01.tableID WHERE SX01.table='S01' AND SX01.tableID=" .
                            $search_tableID;
                    }
                }

                elseif ($search_type == 'FL_any') {
                    if ($search_tableID == '') {
                        $SQL
                            = "SELECT  S01.*,S01.ID AS id, S01.pageID AS pageno, S01.pagelineID AS pagelineno, S01.lineID AS lineno, S01.shabdID AS shabad_id, S01.shabdlineID AS shabadlineno, S01.attributes AS pattrib,SX01.table,SX01.tableID," . $SQL_language_table . " FROM S01 JOIN SX01 on S01.ID = SX01.tableID WHERE SX01.table='S01' " .
                            $SQL_part . " AND " . $SQL_language_table . " RLIKE '[[:<:]]" . $query_str_FL .
                            "' ORDER BY S01.pagelineID ASC";
                    } else {
                        $SQL
                            = "SELECT  S01.*,S01.ID AS id, S01.pageID AS pageno, S01.pagelineID AS pagelineno, S01.lineID AS lineno, S01.shabdID AS shabad_id, S01.shabdlineID AS shabadlineno, S01.attributes AS pattrib,SX01.table,SX01.tableID FROM S01 JOIN SX01 on S01.ID = SX01.tableID WHERE SX01.table='S01' AND SX01.tableID=" .
                            $search_tableID;
                    }
                }

                elseif($search_type == 'PHRASE')
                {
                    $SQL="SELECT *,ID AS id, pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, shabdID AS shabad_id, shabdlineID AS shabadlineno, attributes AS pattrib FROM `S01` WHERE punjabi LIKE '%".$this->db->escape_like_str($search_text)."%'".$SQL_part." ORDER BY pagelineID ASC";
                }

                $rs = $this->db->query($SQL);

                $full_text_query = base64_encode($SQL);

                if ($rs->num_rows() > 0) {
                    $result_counts[$scripture]['result_count'] = $rs->num_rows();
                    $result_counts[$scripture]['result_query'] = $full_text_query;
                }


            }

            /* search for amrit keertan */

            if ($scripture == 'ak') {

                $result_counts[$scripture]
                    = array("scripture_name" => $SG_ScriptureTypes[$scripture][1],
                    "result_count" => 0, "result_query" => '');

                $SQL_part = '';
                $SQL_language_table = '';

                if ($search_language == 'ROMAN') {
                    $SQL_language_table .= "SX01.walpha";
                }
                if ($search_language == 'PUNJABI-ASC') {
                    $SQL_language_table .= "SX01.`wgamma-a`";
                }
                if ($search_language == 'PUNJABI') {
                    $SQL_language_table .= "SX01.wgamma";
                }


                if ($search_author) {

                    $SQL_part .= " AND A01.author_id= " . $search_author . " ";
                }

                if ($search_raag) {

                    $SQL_part .= " AND A01.raag_id= " . $search_raag;
                }

                if ($search_page_from || $search_page_to) {
                    $SQL_part .= " AND A01.pageID BETWEEN " . $search_page_from . " AND " .
                        $search_page_to;
                }

                if ($search_type == 'FL_begin') {
                    if ($search_tableID == '') {
                        $SQL
                            = "SELECT  A01.*,A01.lineID AS lineno, A01.sectionID AS section_id, A01.pageID AS pageno, A01.pagelineID AS pagelineno, A01.shabadID AS shabad_id, A01.attributes AS lattrib,A01.raag, A01.punjabi, A01.translit, A01.author, A01.hindi, A01.roman,A01.english,SX01.shabadID,SX01.table,SX01.tableID,AS01.shabad_name,AS01.shabadID," . $SQL_language_table . " FROM A01 JOIN SX01 on A01.lineID = SX01.tableID JOIN AS01 on SX01.shabadID=AS01.shabadID WHERE SX01.table='A01' " .
                            $SQL_part . " AND " . $SQL_language_table . " RLIKE '^" . $query_str_FL .
                            "' ORDER BY A01.pagelineID ASC";
                    } else {
                        $SQL
                            = "SELECT  A01.*,A01.lineID AS lineno, A01.sectionID AS section_id, A01.pageID AS pageno, A01.pagelineID AS pagelineno, A01.shabadID AS shabad_id, A01.attributes AS lattrib,A01.raag, A01.punjabi, A01.translit, A01.author, A01.hindi, A01.roman,A01.urdu,A01.english,SX01.table,SX01.tableID,SX01.shabadID,AS01.shabad_name,AS01.shabadID FROM A01 JOIN SX01 on A01.lineID = SX01.tableID JOIN AS01 on A01.shabadID=AS01.shabadID WHERE SX01.table='A01' AND SX01.tableID=" .
                            $search_tableID;
                    }
                }

                elseif ($search_type == 'FL_any') {
                    if ($search_tableID == '') {
                        $SQL
                            = "SELECT  A01.*,A01.lineID AS lineno, A01.sectionID AS section_id, A01.pageID AS pageno, A01.pagelineID AS pagelineno, A01.shabadID AS shabad_id, A01.attributes AS lattrib,A01.raag, A01.punjabi, A01.translit, A01.author, A01.hindi, A01.roman,A01.english,SX01.shabadID,SX01.table,AS01.shabad_name,AS01.shabadID," . $SQL_language_table . " FROM A01 JOIN SX01 on A01.lineID = SX01.tableID JOIN AS01 on A01.shabadID=AS01.shabadID WHERE SX01.table='A01' " .
                            $SQL_part . " AND " . $SQL_language_table . " RLIKE '[[:<:]]" . $query_str_FL .
                            "' ORDER BY A01.pagelineID ASC";
                    } else {
                        $SQL
                            = "SELECT  A01.*,A01.lineID AS lineno, A01.sectionID AS section_id, A01.pageID AS pageno, A01.pagelineID AS pagelineno, A01.shabadID AS shabad_id, A01.attributes AS lattrib,A01.raag, A01.punjabi, A01.translit, A01.author, A01.hindi, A01.roman,A01.urdu,A01.english,SX01.table,SX01.shabadID,AS01.shabad_name,AS01.shabadID FROM A01 JOIN SX01 on A01.lineID = SX01.tableID JOIN AS01 on A01.shabadID=AS01.shabadID WHERE SX01.table='A01' AND SX01.tableID=" .
                            $search_tableID;
                    }
                }

                elseif ($search_type == 'PHRASE'){

                    $SQL="SELECT  *, lineID AS lineno, sectionID AS section_id, pageID AS pageno, pagelineID AS pagelineno, shabadID AS shabad_id, attributes AS lattrib, raag, punjabi, translit, author, hindi, roman,english FROM A01 WHERE punjabi LIKE '%".$this->db->escape_like_str($search_text)."%'".$SQL_part." ORDER BY pagelineID ASC";
                }

                $rs = $this->db->query($SQL);
                $full_text_query = base64_encode($SQL);

                if ($rs->num_rows() > 0) {
                    $result_counts[$scripture]['result_count'] = $rs->num_rows();
                    $result_counts[$scripture]['result_query'] = $full_text_query;
                }


            }


            /* search for bhai gurdas vaaran*/

            if ($scripture == 'bgv') {

                $result_counts[$scripture]
                    = array("scripture_name" => $SG_ScriptureTypes[$scripture][1],
                    "result_count" => 0, "result_query" => '');

                $SQL_language_table = '';

                if ($search_language == 'ROMAN')
                    $SQL_language_table .= "SX01.walpha";

                if ($search_language == 'PUNJABI-ASC')
                    $SQL_language_table .= "SX01.`wgamma-a`";

                if ($search_language == 'PUNJABI')
                    $SQL_language_table .= "SX01.wgamma";

                $SQL_part = '';

                if ($search_page_from || $search_page_to) {
                    $SQL_part .= " AND B01.vaarID BETWEEN " . $search_page_from . " AND " .
                        $search_page_to;
                }

                if ($search_type == 'FL_begin') {
                    if ($search_tableID == '') {
                        $SQL
                            = "SELECT B01.*,B01.vaarID AS vaarno, B01.pauriID AS paurino, B01.pauri_lineID AS pauri_lineno, B01.attributes AS lattrib,SX01.table,SX01.tableID," . $SQL_language_table . " FROM B01 JOIN SX01 on B01.lineID = SX01.tableID WHERE SX01.table='B01' " .
                            $SQL_part . " AND " . $SQL_language_table . " RLIKE '^" . $query_str_FL .
                            "' ORDER BY B01.pauri_lineID ASC";
                    } else {
                        $SQL
                            = "SELECT B01.*,B01.vaarID AS vaarno, B01.pauriID AS paurino, B01.pauri_lineID AS pauri_lineno, B01.attributes AS lattrib,SX01.table,SX01.tableID,SX01.walpha FROM B01 JOIN SX01 on B01.lineID = SX01.tableID WHERE SX01.table='B01' AND SX01.tableID = " .
                            $search_tableID;
                    }
                }

                elseif ($search_type == 'FL_any') {
                    if ($search_tableID == '') {
                        $SQL
                            = "SELECT B01.*,B01.vaarID AS vaarno, B01.pauriID AS paurino, B01.pauri_lineID AS pauri_lineno, B01.attributes AS lattrib,SX01.table,SX01.tableID," . $SQL_language_table . " FROM B01 JOIN SX01 on B01.lineID = SX01.tableID WHERE SX01.table='B01' " .
                            $SQL_part . " AND " . $SQL_language_table . " RLIKE '[[:<:]]" . $query_str_FL .
                            "' ORDER BY B01.pauri_lineID ASC";

                    } else {
                        $SQL
                            = "SELECT B01.*,B01.vaarID AS vaarno, B01.pauriID AS paurino, B01.pauri_lineID AS pauri_lineno, B01.attributes AS lattrib,SX01.table,SX01.tableID,SX01.walpha FROM B01 JOIN SX01 on B01.lineID = SX01.tableID WHERE SX01.table='B01' AND SX01.tableID = " .
                            $search_tableID;
                    }

                }

                elseif ($search_type == 'PHRASE'){

                    $SQL="SELECT *,B01.vaarID AS vaarno, pauriID AS paurino, pauri_lineID AS pauri_lineno, attributes AS lattrib FROM B01 WHERE punjabi LIKE '%".$this->db->escape_like_str($search_text)."%'".$SQL_part." ORDER BY pauri_lineID ASC";
                }

                $rs = $this->db->query($SQL);
                $full_text_query = base64_encode($SQL);

                if ($rs->num_rows() > 0) {
                    $result_counts[$scripture]['result_count'] = $rs->num_rows();
                    $result_counts[$scripture]['result_query'] = $full_text_query;
                }


            }

            /* search for dasam granth */


            if ($scripture == 'dg') {

                $result_counts[$scripture]
                    = array("scripture_name" => $SG_ScriptureTypes[$scripture][1],
                    "result_count" => 0, "result_query" => '');

                    $SQL_language_table = '';

                    if ($search_language == 'ROMAN')
                        $SQL_language_table .= "SX01.walpha";

                    if ($search_language == 'PUNJABI-ASC')
                        $SQL_language_table .= "SX01.`wgamma-a`";

                    if ($search_language == 'PUNJABI')
                        $SQL_language_table .= "SX01.wgamma";

                    $SQL_part = '';

                    if ($search_page_from || $search_page_to) {
                        $SQL_part .= " AND D01.pageID BETWEEN " . $search_page_from . " AND " .
                            $search_page_to;
                    }

                    if ($search_type == 'FL_begin') {
                        if ($search_tableID == '') {
                            $SQL
                                = "SELECT D01.*,D01.pageID AS pageno, D01.pagelineID AS pagelineno, D01.lineID AS lineno, D01.attributes AS lattrib, D01.punjabi, D01.english, D01.hindi, D01.roman, D01.urdu, D01.teeka AS dgteeka, D01.translit,SX01.table,SX01.tableID," . $SQL_language_table . " FROM D01 JOIN SX01 on D01.ID = SX01.tableID WHERE SX01.table='D01'" .
                                $SQL_part . " AND " . $SQL_language_table . " RLIKE '^" . $query_str_FL .
                                "' ORDER BY D01.pagelineID ASC";
                        } else {
                            $SQL
                                = "SELECT D01.*,D01.pageID AS pageno, D01.pagelineID AS pagelineno, D01.lineID AS lineno, D01.attributes AS lattrib, D01.punjabi, D01.english, D01.hindi, D01.roman, D01.urdu, D01.teeka AS dgteeka, D01.translit,SX01.table,SX01.tableID FROM D01 JOIN SX01 on D01.ID = SX01.tableID WHERE SX01.table= 'D01' AND SX01.tableID = " .
                                $search_tableID;
                        }
                    }

                    elseif ($search_type == 'FL_any') {
                        if ($search_tableID == '') {
                            $SQL
                                = "SELECT D01.*,D01.pageID AS pageno, D01.pagelineID AS pagelineno, D01.lineID AS lineno, D01.attributes AS lattrib, D01.punjabi, D01.english, D01.hindi, D01.roman, D01.urdu, D01.teeka AS dgteeka, D01.translit,SX01.table,SX01.tableID," . $SQL_language_table . " FROM D01 JOIN SX01 on D01.ID = SX01.tableID WHERE SX01.table='D01'" .
                                $SQL_part . " AND " . $SQL_language_table . " RLIKE '[[:<:]]" . $query_str_FL .
                                "' ORDER BY D01.pagelineID ASC";
                        } else {
                            $SQL
                                = "SELECT D01.*,D01.pageID AS pageno, D01.pagelineID AS pagelineno, D01.lineID AS lineno, D01.attributes AS lattrib, D01.punjabi, D01.english, D01.hindi, D01.roman, D01.urdu, D01.teeka AS dgteeka, D01.translit,SX01.table,SX01.tableID FROM D01 JOIN SX01 on D01.ID = SX01.tableID WHERE SX01.table= 'D01' AND SX01.tableID = " .
                                $search_tableID;
                        }
                    }

                    elseif($search_type == 'PHRASE'){

                        $SQL="SELECT *,pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, attributes AS lattrib, punjabi, english, hindi, roman, urdu, teeka AS dgteeka, translit FROM D01 WHERE punjabi LIKE '%".$this->db->escape_like_str($search_text)."%'".$SQL_part." ORDER BY pagelineID ASC";
                    }

                    $rs = $this->db->query($SQL);
                    $full_text_query = base64_encode($SQL);

                    if ($rs->num_rows() > 0) {
                        $result_counts[$scripture]['result_count'] = $rs->num_rows();
                        $result_counts[$scripture]['result_query'] = $full_text_query;
                    }



            }

            /* search for kabit savaiye */

            if ($scripture == 'ks') {

                $result_counts[$scripture]
                    = array("scripture_name" => $SG_ScriptureTypes[$scripture][1],
                    "result_count" => 0, "result_query" => '');

                    $SQL_language_table = '';

                    if ($search_language == 'ROMAN')
                        $SQL_language_table .= "SX01.walpha";

                    if ($search_language == 'PUNJABI-ASC')
                        $SQL_language_table .= "SX01.`wgamma-a`";

                    if ($search_language == 'PUNJABI')
                        $SQL_language_table .= "SX01.wgamma";

                    $SQL_part = '';

                    if ($search_page_from || $search_page_to) {
                        $SQL_part .= " AND K01.kabitID BETWEEN " . $search_page_from . " AND " .
                            $search_page_to;
                    }

                    if ($search_type == 'FL_begin') {
                        if ($search_tableID == '') {
                            $SQL
                                = "SELECT K01.*,K01.lineID AS lineno, K01.kabitID AS kabit, K01.kabitlineID AS k_line, K01.attributes AS lattrib, K01.punjabi, K01.punctuation, K01.english, K01.translit, K01.hindi, K01.urdu, K01.roman,SX01.table,SX01.tableID," . $SQL_language_table . " FROM `K01`JOIN SX01 on K01.ID = SX01.tableID WHERE SX01.table='K01'" .
                                $SQL_part . " AND " . $SQL_language_table . " RLIKE '^" . $query_str_FL .
                                "' ORDER BY K01.kabitID ASC";
                        } else {
                            $SQL
                                = "SELECT K01.*,K01.lineID AS lineno, K01.kabitID AS kabit, K01.kabitlineID AS k_line, K01.attributes AS lattrib, K01.punjabi, K01.punctuation, K01.english, K01.translit, K01.hindi, K01.urdu, K01.roman,SX01.table,SX01.tableID,SX01.walpha FROM `K01`JOIN SX01 on K01.ID = SX01.tableID WHERE SX01.table='K01' AND SX01.tableID = " .
                                $search_tableID;
                        }
                    }

                    elseif ($search_type == 'FL_any') {
                        if ($search_tableID == '') {
                            $SQL
                                = "SELECT K01.*,K01.lineID AS lineno, K01.kabitID AS kabit, K01.kabitlineID AS k_line, K01.attributes AS lattrib, K01.punjabi, K01.punctuation, K01.english, K01.translit, K01.hindi, K01.urdu, K01.roman,SX01.table,SX01.tableID," . $SQL_language_table . " FROM `K01`JOIN SX01 on K01.ID = SX01.tableID WHERE SX01.table='K01'" .
                                $SQL_part . " AND " . $SQL_language_table . " RLIKE '[[:<:]]" . $query_str_FL .
                                "' ORDER BY K01.kabitID ASC";
                        } else {
                            $SQL
                                = "SELECT K01.*,K01.lineID AS lineno, K01.kabitID AS kabit, K01.kabitlineID AS k_line, K01.attributes AS lattrib, K01.punjabi, K01.punctuation, K01.english, K01.translit, K01.hindi, K01.urdu, K01.roman,SX01.table,SX01.tableID,SX01.walpha FROM `K01`JOIN SX01 on K01.ID = SX01.tableID WHERE SX01.table='K01' AND SX01.tableID = " .
                                $search_tableID;
                        }
                    }

                    elseif ($search_type == 'PHRASE'){

                        $SQL="SELECT *,lineID AS lineno, kabitID AS kabit, kabitlineID AS k_line, attributes AS lattrib, punjabi, punctuation, english, translit, hindi, urdu, roman FROM K01 WHERE punjabi LIKE '%".$this->db->escape_like_str($search_text)."%'".$SQL_part." ORDER BY kabitID ASC";
                    }

                    $rs = $this->db->query($SQL);
                    $full_text_query = base64_encode($SQL);

                    if ($rs->num_rows() > 0) {
                        $result_counts[$scripture]['result_count'] = $rs->num_rows();
                        $result_counts[$scripture]['result_query'] = $full_text_query;
                    }



            }

            /* search for vai nand lal*/

            if ($scripture == 'bnl') {

                $result_counts[$scripture]
                    = array("scripture_name" => $SG_ScriptureTypes[$scripture][1],
                    "result_count" => 0, "result_query" => '');

                $SQL_language_table = '';

                if ($search_language == 'ROMAN')
                    $SQL_language_table .= "SX01.walpha";

                if ($search_language == 'PUNJABI-ASC')
                    $SQL_language_table .= "SX01.`wgamma-a`";

                if ($search_language == 'PUNJABI')
                    $SQL_language_table .= "SX01.wgamma";

                    $SQL_part = '';

                    if ($search_page_from || $search_page_to) {
                        $SQL_part .= " AND N01.pageID BETWEEN " . $search_page_from . " AND " .
                            $search_page_to;
                    }

                    if (!empty($search_from)) {
                        if ($search_from == 'Ghazal') {
                            $SQL_part .= " AND N01.name = 'Ghazal'";
                        } elseif ($search_from == 'Rubaaee') {
                            $SQL_part .= " AND N01.name = 'Rubaaee'";

                        } elseif ($search_from == 'Zindginama') {
                            $SQL_part .= " AND N01.name = 'Zindginama'";

                        } elseif ($search_from == 'Ganjnaama') {
                            $SQL_part .= " AND N01.name = 'Ganjnaama'";

                        } elseif ($search_from == 'Jot_Bigaas_Persian') {
                            $SQL_part .= " AND N01.name = 'Jot Bigaas Persian'";

                        } elseif ($search_from == 'Jot_Bigaas_Punjabi') {
                            $SQL_part .= " AND N01.name = 'Jot Bigaas Punjabi'";

                        } elseif ($search_from == 'Rahitnama') {
                            $SQL_part .= " AND N01.name = 'Rahitnama'";

                        } elseif ($search_from == 'Tankahnama') {
                            $SQL_part .= " AND N01.name = 'Tankahnama'";

                        }
                    }

                    if ($search_type == 'FL_begin') {
                        if ($search_tableID == '') {

                            $SQL
                                = "SELECT N01.*,N01.pagelineID AS `lineno`,N01.name, N01.pageID AS `no`, N01.attributes AS `attrib`, N01.punjabi, N01.translit, N01.english, N01.hindi,N01.roman, N01.urdu,SX01.table,SX01.tableID," . $SQL_language_table . " FROM N01 JOIN SX01 on N01.ID = SX01.tableID WHERE SX01.table='N01'" .
                                $SQL_part . " AND " . $SQL_language_table . " RLIKE '^" . $query_str_FL .
                                "' ORDER BY N01.pagelineID ASC";
                        } else {

                            $SQL
                                = "SELECT N01.*,N01.pagelineID AS `lineno`,N01.name N01.pageID AS `no`, N01.attributes AS `attrib`, N01.punjabi, N01.translit, N01.english, N01.hindi,N01.roman, N01.urdu,SX01.table,SX01.tableID,SX01.walpha FROM N01 JOIN SX01 on N01.ID = SX01.tableID WHERE SX01.table='N01' AND SX01.tableID = " .
                                $search_tableID;
                        }
                    }

                    elseif ($search_type == 'FL_any') {
                        if ($search_tableID == '') {
                            $SQL
                                = "SELECT N01.*,N01.pagelineID AS `lineno`,N01.name, N01.pageID AS `no`, N01.attributes AS `attrib`, N01.punjabi, N01.translit, N01.english, N01.hindi,N01.roman, N01.urdu,SX01.table,SX01.tableID,".$SQL_language_table." FROM N01 JOIN SX01 on N01.ID = SX01.tableID WHERE SX01.table='N01'" .
                                $SQL_part . " AND " . $SQL_language_table . " RLIKE '[[:<:]]" . $query_str_FL .
                                "' ORDER BY N01.pagelineID ASC";
                        } else {
                            $SQL
                                = "SELECT N01.*,N01.pagelineID AS `lineno`,N01.name, N01.pageID AS `no`, N01.attributes AS `attrib`, N01.punjabi, N01.translit, N01.english, N01.hindi,N01.roman, N01.urdu,SX01.table,SX01.tableID FROM N01 JOIN SX01 on N01.ID = SX01.tableID WHERE SX01.table='N01' AND SX01.tableID = " .
                                $search_tableID;
                        }
                    }

                    elseif ($search_type == 'PHRASE'){
                        $SQL="SELECT *,pagelineID AS `lineno`,`name`, pageID AS `no`, attributes AS `attrib`, punjabi, translit, english, hindi, roman, urdu FROM N01 WHERE punjabi LIKE '%".$this->db->escape_like_str($search_text)."%'".$SQL_part." ORDER BY pagelineID ASC";
                    }

                    $rs = $this->db->query($SQL);
                    $full_text_query = base64_encode($SQL);

                    if ($rs->num_rows() > 0) {
                        $result_counts[$scripture]['result_count'] = $rs->num_rows();
                        $result_counts[$scripture]['result_query'] = $full_text_query;
                    }


            }


        }

        $this->session->set_userdata('search_results', $result_counts);

    }

    public function get_results($query, $index = 0)
    {

        $query = base64_decode($query);

        $query .= " limit $index,25";

        $rs = $this->db->query($query);

        if (!empty($rs) && $rs->num_rows() > 0) {
            return $rs;
        } else {
            return FALSE;
        }
    }
}