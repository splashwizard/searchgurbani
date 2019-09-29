<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Amrit_keertan_dao extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get list of Authors in SGGS for Combo box
     */
    function get_authors()
    {
        $this->db->distinct('A01.author');
        $this->db->select('A01.author, AT01.ID,AT01.author');
        $this->db->from('A01');
        $this->db->join('AT01','AT01.author=A01.author');
        $this->db->where("A01.author != ''");

        $this->db->order_by('A01.author ASC');


        $rs = $this->db->get();
        if ($rs->row_array() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    function get_authors_list($enable_any = true)
    {
        $SQL = "SELECT distinct author FROM A01 WHERE author <> '' ORDER BY author ASC";
        $rs = $this->db->query($SQL);
        $ar_list = array();
        if ($enable_any)
            $ar_list['any'] = 'Any Author';
        if ($rs->num_rows() > 0) {
            foreach ($rs->result() as $row) {
                $ar_list[$row->author] = $row->author;
            }
        } else {
            $ar_list['noauthor'] = 'No Authors';
        }
        return $ar_list;
    }

    /**
     * Get list of Raags in SGGS for Combo box
     */
    function get_raags_list($enable_any = true)
    {
        $SQL = "SELECT distinct raag FROM A01 WHERE raag <> '' ORDER BY raag ASC";
        $rs = $this->db->query($SQL);
        $ar_list = array();
        if ($enable_any)
            $ar_list['any'] = 'Any Raag';
        if ($rs->num_rows() > 0) {
            foreach ($rs->result() as $row) {
                $ar_list[$row->raag] = $row->raag;
            }
        } else {
            $ar_list['noauthor'] = 'No Authors';
        }
        return $ar_list;
    }

    /**
     * Get lines using Page No.
     */
    function get_lines($page_no) // $page_no - Page No.
    {
        $this->db->select('A01.lineID AS lineno, A01.sectionID AS section_id, A01.pageID AS pageno, A01.pagelineID AS pagelineno, A01.shabadID AS shabad_id, A01.attributes AS lattrib,A01.raag, A01.punjabi, A01.translit, A01.author, A01.hindi, A01.roman,A01.translit-old,A01.urdu, AS01.shabad_name,A01.english');
        $this->db->from('A01');
        $this->db->join('AS01', 'AS01.shabadID = A01.shabadID');
        $this->db->where("A01.pageID = " . $this->db->escape($page_no));
        $this->db->order_by('A01.pagelineID ASC');

        $rs = $this->db->get();



       // $SQL = "SELECT lineID AS lineno, sectionID AS section_id, pageID AS pageno, pagelineID AS pagelineno, shabadID AS shabad_id, attributes AS lattrib,raag,punjabi,translit,author from A01 WHERE pageID = " . $this->db->escape($page_no) . " ORDER BY pagelineno ASC";
        //$rs = $this->db->query($SQL);
        if ($rs->row_array() > 0) {
            return $rs;
        } else {
            return false;
        }

    }

    function get_random_lines($page_no) // $page_no - Page No.
    {
        $SQL = "SELECT * from A01 WHERE pageID = " . $this->db->escape($page_no) . " ORDER BY RAND() LIMIT 1";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }

    }

    /**
     * Get the List of Chapters
     */
    function get_chapters()
    {
        $SQL = "SELECT sectionID AS section_id,section,pageID AS pageno from AC01 ORDER BY sectionID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get the List of Shabads in a chapter
     */
    function get_shabads_in_chapter($chapter_id)
    {
        $SQL = "SELECT shabadID AS shabad_id,shabad_name, pageID AS pageno FROM ASC01 WHERE sectionID = " . $this->db->escape($chapter_id) . " ORDER BY pageID ASC";
        $rs = $this->db->query($SQL);
//        p($this->db->last_query());
//        p($rs->result());
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get the List of Shabads in a chapter
     */
    function get_shabads_by_alphabet($alpha, $language)
    {
        $SQL = "SELECT ID AS id, shabadID AS shabad_id, shabad_name, shabad_punjabi, shabad_hindi, pagelineID AS pagelineno , pageID AS pageno ,lineID AS lineno FROM AS01 WHERE $language LIKE '" . $this->db->escape_like_str($alpha) . "%' ORDER BY $language ASC";
        $rs = $this->db->query($SQL);
        log_message('info', $SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get the lines of a shabad
     */


    function get_lines_in_shabad($shabad_id)
    {
        $SQL = "SELECT lineID AS lineno, sectionID AS section_id,shabadlineID AS shabadlineno, pageID AS pageno, pagelineID AS pagelineno, shabadID AS shabad_id, attributes AS lattrib,raag,hindi,urdu,roman,punjabi,translit,author,english FROM A01 WHERE shabadID = " . $this->db->escape($shabad_id) . " ORDER BY lineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    function get_youtubeid_for_shabad($shabad_id)
    {
        $this->db->select('youtubeID, ID');
        $this->db->from('ASC01');
        $this->db->where('shabadID', $shabad_id);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $row = $result->row_array();
        } else {
            return false;
        }
    }

    /**
     * Get the shabad info
     */
    function get_shabad_info($shabad_id)
    {
        $this->db->select('AS01.shabad_name,AC01.section AS section_name ,AC01.sectionID, AS01.shabadID AS shabad_id, AS01.shabad_punjabi, A01.sectionID,A01.author, A01.raag, AS01.pageID AS pageno,A01.lineID AS lineno');
        $this->db->from('AS01');
        $this->db->join('A01','A01.shabadID=AS01.shabadID');
        $this->db->join('AC01','AC01.sectionID=A01.sectionID');
        $this->db->where("AS01.shabadID = " . $this->db->escape($shabad_id));
        $this->db->limit('1');

        $rs = $this->db->get();
        if ($rs->row_array() > 0) {
            $row = $rs->result();
            return $row[0];
        } else {
            return false;
        }
    }

    /**
     * Get the chapter name
     */
    function get_chapter_name($chapter_id)
    {
        $SQL = "SELECT section FROM AC01 WHERE sectionID = " . $this->db->escape($chapter_id);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0]->section;
        } else {
            return '';
        }
    }

    function get_raags()
    {
        $SQL="SELECT `id`,`name` FROM R01 ORDER BY `name`";
        $rs=$this->db->query($SQL);
        if($rs->num_rows()>0)
        {
            return $rs;
        }else{
            return false;
        }
    }
}

?>