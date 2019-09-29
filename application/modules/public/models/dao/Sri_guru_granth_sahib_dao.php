<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sri_guru_granth_sahib_dao extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get list of Authors in SGGS for Combo box
     */
    function get_authors_list($enable_any = true)
    {
        $SQL = "SELECT distinct author FROM S01 WHERE author <> '' ORDER BY author ASC";
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
        $SQL = "SELECT distinct raag FROM S01 WHERE raag <> '' ORDER BY raag ASC";
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
     * Get lines using Ang No.
     */
    function get_lines($page_no) // $page_no - Ang No.
    {
        $SQL = "SELECT *, ID AS id, pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, shabdID AS shabad_id, shabdlineID AS shabadlineno, attributes AS pattrib from S01 WHERE pageID = " . $this->db->escape($page_no) . " ORDER BY pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get keywords and meanings
     * @lines - Array
     */
    function get_dictionary_words($lines) // $page_no - Ang No.
    {
        $keywords = array();
        foreach ($lines->result() as $line) {
            $SQL = "
			SELECT punjabi, concat(`roman`,' - ',`English`) AS `meaning`
			FROM `SK01`
			WHERE '" . $line->punjabi . "' LIKE concat( '% ', `punjabi` , ' %' )
			OR '" . $line->punjabi . "' LIKE concat( `punjabi` , ' %' ) ";
            $rs = $this->db->query($SQL);
            if ($rs->num_rows() > 0) {
                foreach ($rs->result() as $row) {
                    $keywords[$row->punjabi] = $row->meaning;
                }
            }
        }
        return array_unique($keywords);
    }

    /**
     * Get the List of Chapters
     */
    function get_chapters()
    {
        $SQL = "SELECT *, chapterID AS chapter_id, pageID AS page_id, chapterE AS chapter_name from SC01 WHERE chapterID > 1 AND `table` = 'S01' ORDER BY chapterID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get the List of Authors
     */
    function get_authors()
    {
        //$SQL = "SELECT distinct author FROM S01 WHERE author <> '' ORDER BY author ASC";

        $this->db->distinct('S01.author');
        $this->db->select('S01.author, AT01.ID, AT01.slug');
        $this->db->from('S01');
        $this->db->join('AT01','AT01.ID=S01.author_id');
        $this->db->where("S01.author != ''");

        $this->db->order_by('S01.author ASC');


        $rs = $this->db->get();
        if ($rs->row_array() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get the List of Raags of an Author
     */
    function get_raags_of_author($author_name)
    {
        $SQL = "
		SELECT 
			distinct `raag`,
			`pageID` AS pageno 
		FROM 
			`S01` 
		WHERE 
			`author` = " . $this->db->escape($author_name) . " 
		GROUP BY 
			`raag`, `pageID`
		ORDER BY 
			`raag` ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get the List of Raags of an Author
     */
    function get_raags_of_author_by_at01($author_name)
    {
        $this->db->select("AT01.*, S01.raag, S01.pageID AS pageno");
        $this->db->from("AT01");
        $this->db->where("AT01.slug", $author_name);
        $this->db->join("S01", "S01.author_id = AT01.ID");
        $this->db->order_by("raag", "asc");
        $this->db->group_by("raag, pageID");
        $rs = $this->db->get();
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    function get_lines_in_shabad($shabad_id)
    {
        $SQL = "SELECT *,ID AS id, pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, shabdID AS shabad_id, shabdlineID AS shabadlineno, attributes AS pattrib FROM S01 WHERE shabdID = ". $this->db->escape($shabad_id) ." ORDER BY lineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    function get_lines_in_varse($varse_id)
    {
        $SQL = "SELECT *,ID AS id, pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, shabdID AS shabad_id, shabdlineID AS shabadlineno, attributes AS pattrib FROM S01 WHERE verseID = ". $this->db->escape($varse_id) ." ORDER BY lineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    function get_raags()
    {
        $SQL="SELECT id,name FROM R01 ORDER BY name";
        $rs=$this->db->query($SQL);
        if($rs->num_rows()>0)
        {
            return $rs;
        }else{
            return false;
        }
    }


}