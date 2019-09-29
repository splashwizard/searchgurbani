<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dasam_granth_dao extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_lines_in_shabad($shabad_id)
    {
        $SQL = "SELECT *,ID AS id, pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, shabdID AS shabad_id, shabdlineID AS shabadlineno, attributes AS pattrib FROM D01 WHERE shabdID = ". $this->db->escape($shabad_id) ." ORDER BY lineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get lines using Page No.
     */
    function get_lines($page_no) // $page_no - Page No.
    {
        $SQL = "SELECT *,pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, attributes AS lattrib, punjabi, english, hindi, roman, urdu, teeka AS dgteeka, translit from D01 WHERE pageID = " . $this->db->escape($page_no) . " ORDER BY pagelineID ASC";
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
    function get_chapters($lang_type)
    {
        if ($lang_type == 'en'):
            $SQL = "SELECT parentID, chapterID AS chapter_id, chapterE AS chapter_name, pageID AS page_id,lineID,endID from SC01 WHERE chapterID > 1 AND `table` = 'D01' ORDER BY chapterID ASC";
        else:
            $SQL = "SELECT parentID, chapterID AS chapter_id, chapterP AS chapter_name, pageID AS page_id,lineID,endID from SC01 WHERE chapterID > 1 AND `table` = 'D01' ORDER BY chapterID ASC";
        endif;

        $rs = $this->db->query($SQL);

        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }
}