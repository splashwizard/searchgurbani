<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bhai_nand_lal_dao extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    /**
     * Get lines using Page No.
     */

    function get_lines_in_shabad($shabad_id)
    {
        $SQL = "SELECT *,pagelineID AS lineno, pageID AS `no`,shabadlineID AS shabadlineno, shabadID AS shabad_id, attributes AS lattrib FROM N01 WHERE shabadID = " . $this->db->escape($shabad_id) . " ORDER BY pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    function get_ghazal_lines($page_no = 0, $limit = 10) // $page_no - Page No.
    {


        $SQL = "SELECT
					*,pagelineID AS lineno, pageID AS `no`, attributes AS attrib, punjabi, translit,english, hindi,roman, urdu,teeka
				from
					N01
				WHERE
					`name` = 'Ghazal'
				AND 
					`pageID`= $page_no
				ORDER BY
					pageID ASC, pagelineID ASC";
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
    function get_quatrains_lines($page_no = 0, $limit = 10) // $page_no - Page No.
    {


        $this->db->select_min('pageID');
        $this->db->from('N01');
        $this->db->where("name='Rubaaee'");
        $rs1=$this->db->get();
        if ($rs1->num_rows() > 0)
        {
            $rs2 = $rs1->result_array();
            $first_pageID = $rs2[0]['pageID'];
            $first_pageID=$first_pageID-1;

        }
        $page_no=$first_pageID+$page_no;

        $SQL = "SELECT
					*,pagelineID AS `lineno`, pageID AS `no`, attributes AS `attrib`, punjabi, translit, english, hindi,roman, urdu ,teeka
				from
					N01
				WHERE
					`name` = 'Rubaaee'
				AND 
					`pageID`= $page_no	
				ORDER BY
					pageID ASC, pagelineID ASC";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }

    }

    /**
     * Get lines count using Page No.
     */
    function get_zindginama_line_count() // $page_no - Page No.
    {
        $SQL = "SELECT count(*) as `cnt` from N01 WHERE `name` = 'Zindginama' ORDER BY pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0]->cnt;
        } else {
            return 0;
        }

    }

    /**
     * Get lines using Page No.
     */
    function get_zindginama_lines($page_no = 0, $limit = 10) // $page_no - Page No.
    {

        $this->db->select_min('pageID');
        $this->db->from('N01');
        $this->db->where("name='Zindginama'");
        $rs1=$this->db->get();
        if ($rs1->num_rows() > 0)
        {
            $rs2 = $rs1->result_array();
            $first_pageID = $rs2[0]['pageID'];
            $first_pageID=$first_pageID-1;

        }
        $page_no=$first_pageID+$page_no;

        $SQL = "SELECT *,pagelineID AS lineno, pageID AS no, attributes AS attrib, punjabi, translit, english, roman, urdu, hindi,teeka from N01 WHERE `name` = 'Zindginama' AND `pageID`= $page_no ORDER BY pageID ASC, pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }

    }


    /**
     * Get lines count using Page No.
     */
    function get_ganjnama_line_count() // $page_no - Page No.
    {
        $SQL = "SELECT count(*) as `cnt` from N01 WHERE `name` = 'Ganjnaama' ORDER BY pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0]->cnt;
        } else {
            return 0;
        }

    }

    /**
     * Get lines using Page No.
     */
    function get_ganjnama_lines($page_no = 0, $limit = 10) // $page_no - Page No.
    {

        $this->db->select_min('pageID');
        $this->db->from('N01');
        $this->db->where("name='Ganjnaama'");
        $rs1=$this->db->get();
        if ($rs1->num_rows() > 0)
        {
            $rs2 = $rs1->result_array();
            $first_pageID = $rs2[0]['pageID'];
            $first_pageID=$first_pageID-1;

        }
        $page_no=$first_pageID+$page_no;

        $SQL = "SELECT *,pagelineID AS lineno, pageID AS no, attributes AS attrib, punjabi, translit, english, hindi,roman, urdu,teeka from N01 WHERE `name` = 'Ganjnaama' AND `pageID`= $page_no ORDER BY pageID ASC, pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }

    }

    /**
     * Get lines count using Page No.
     */
    function get_jot_bikas_line_count() // $page_no - Page No.
    {
        $SQL = "SELECT count(*) as `cnt` from N01 WHERE `name` = 'Jot Bigaas Punjabi' ORDER BY pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0]->cnt;
        } else {
            return 0;
        }

    }

    /**
     * Get lines using Page No.
     */
    function get_jot_bikas_lines($page_no = 0, $limit = 10) // $page_no - Page No.
    {
        $this->db->select_min('pageID');
        $this->db->from('N01');
        $this->db->where("name='Jot Bigaas Punjabi'");
        $rs1=$this->db->get();
        if ($rs1->num_rows() > 0)
        {
            $rs2 = $rs1->result_array();
            $first_pageID = $rs2[0]['pageID'];
            $first_pageID=$first_pageID-1;

        }
        $page_no=$first_pageID+$page_no;
        $SQL = "SELECT *,pagelineID AS lineno, pageID AS no, attributes AS attrib, punjabi, translit, english, hindi, roman, urdu,teeka from N01 WHERE `name` = 'Jot Bigaas Punjabi' AND `pageID`= $page_no ORDER BY pageID ASC, pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }

    }

    /**
     * Get lines count using Page No.
     */
    function get_jot_bikas_persian_line_count() // $page_no - Page No.
    {
        $SQL = "SELECT count(*) as `cnt` from N01 WHERE `name` = 'Jot bigaas Persian' ORDER BY pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0]->cnt;
        } else {
            return 0;
        }

    }

    /**
     * Get lines using Page No.
     */
    function get_jot_bikas_persian_lines($page_no = 0, $limit = 10) // $page_no - Page No.
    {
        $this->db->select_min('pageID');
        $this->db->from('N01');
        $this->db->where("name='Jot bigaas Persian'");
        $rs1=$this->db->get();
        if ($rs1->num_rows() > 0)
        {
            $rs2 = $rs1->result_array();
            $first_pageID = $rs2[0]['pageID'];
            $first_pageID=$first_pageID-1;

        }
        $page_no=$first_pageID+$page_no;
        $SQL = "SELECT *,pagelineID AS lineno, pageID AS no, attributes AS attrib, punjabi, translit,	hindi, english, roman, urdu,teeka from N01 WHERE `name` = 'Jot bigaas Persian' AND `pageID`= $page_no ORDER BY pageID ASC, pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }

    }


    /**
     * Get lines count using Page No.
     */
    function get_rahitnama_line_count() // $page_no - Page No.
    {
        $SQL = "SELECT count(*) as `cnt` from N01 WHERE `name` = 'Rahitnama' ORDER BY pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0]->cnt;
        } else {
            return 0;
        }

    }

    /**
     * Get lines using Page No.
     */
    function get_rahitnama_lines($page_no = 0, $limit = 10)// $page_no - Page No.
    {
        $this->db->select_min('pageID');
        $this->db->from('N01');
        $this->db->where("name='Rahitnama'");
        $rs1=$this->db->get();
        if ($rs1->num_rows() > 0)
        {
            $rs2 = $rs1->result_array();
            $first_pageID = $rs2[0]['pageID'];
            $first_pageID=$first_pageID-1;

        }
        $page_no=$first_pageID+$page_no;
        $SQL = "SELECT *,pagelineID AS lineno, pageID AS no, attributes AS attrib, punjabi, translit, hindi, english, roman, urdu, teeka from N01 WHERE `name` = 'Rahitnama' AND `pageID`= $page_no ORDER BY pageID ASC, pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }

    }

    /**
     * Get lines count using Page No.
     */
    function get_tankahnama_line_count() // $page_no - Page No.
    {
        $SQL = "SELECT count(*) as `cnt` from N01 WHERE `name` = 'Tankahnama' ORDER BY pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0]->cnt;
        } else {
            return 0;
        }

    }

    /**
     * Get lines using Page No.
     */
    function get_tankahnama_lines($page_no = 0, $limit = 10) // $page_no - Page No.
    {
        $this->db->select_min('pageID');
        $this->db->from('N01');
        $this->db->where("name='Tankahnama'");
        $rs1=$this->db->get();
        if ($rs1->num_rows() > 0)
        {
            $rs2 = $rs1->result_array();
            $first_pageID = $rs2[0]['pageID'];
            $first_pageID=$first_pageID-1;

        }
        $page_no=$first_pageID+$page_no;
        $SQL = "SELECT *,pagelineID AS lineno, pageID AS no, attributes AS attrib, punjabi, translit,hindi, english, roman, urdu,teeka from N01 WHERE `name` = 'Tankahnama' AND `pageID`= $page_no ORDER BY pageID ASC, pagelineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }

    }

    function searchText($text, $num = null, $offset = null) // $page_no - Page No.
    {
        $SQL = "SELECT * from N01 WHERE `name` = 'Ghazal' and `translit-old` like '" . $this->db->escape_like_str($text) . "%' limit $offset,$num ";
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchCount($text) // $page_no - Page No.
    {
        //echo $num;
        //echo '---'.$offset;exit;
        $SQL = "SELECT * from N01 WHERE `name` = 'Ghazal' and `translit-old` like '" . $this->db->escape_like_str($text) . "%'  ";
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchTextQua($text, $num = null, $offset = null) // $page_no - Page No.
    {
        $SQL = "SELECT * from N01 WHERE `name` = 'Rubaaee' and `translit-old` like '" . $this->db->escape_like_str($text) . "%' limit $offset,$num ";
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchCountQua($text) // $page_no - Page No.
    {
        //echo $num;
        //echo '---'.$offset;exit;
        $SQL = "SELECT * from N01 WHERE `name` = 'Rubaaee' and `translit-old` like '" . $this->db->escape_like_str($text) . "%'  ";
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchTextZindginama($text, $num = null, $offset = null) // $page_no - Page No.
    {

        $SQL = "SELECT * from N01 WHERE `name` = 'Zindginama' and `translit-old` like '" . $this->db->escape_like_str($text) . "%' limit $offset,$num ";
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchCountZindginama($text) // $page_no - Page No.
    {
        //echo $num;
        //echo '---'.$offset;exit;
        $SQL = "SELECT * from N01 WHERE `name` = 'Zindginama' and `translit-old` like '" . $this->db->escape_like_str($text) . "%'  ";
        //	echo $SQL;exit;
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchTextGanjnama($text, $num = null, $offset = null) // $page_no - Page No.
    {

        $SQL = "SELECT * from N01 WHERE `name` = 'Ganjnaama' and `translit-old` like '" . $this->db->escape_like_str($text) . "%' limit $offset,$num ";
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchCountGanjnama($text) // $page_no - Page No.
    {
        //echo $num;
        //echo '---'.$offset;exit;
        $SQL = "SELECT * from N01 WHERE `name` = 'Ganjnaama' and `translit-old` like '" . $this->db->escape_like_str($text) . "%'  ";
        //	echo $SQL;exit;
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchTextJot_Bikas($text, $num = null, $offset = null) // $page_no - Page No.
    {

        $SQL = "SELECT * from N01 WHERE `name` = 'Jote Bigas: Punjabi' and `translit-old` like '" . $this->db->escape_like_str($text) . "%' limit $offset,$num ";
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchCountJot_Bikas($text) // $page_no - Page No.
    {
        //echo $num;
        //echo '---'.$offset;exit;
        $SQL = "SELECT * from N01 WHERE `name` = 'Jote Bigas: Punjabi' and `translit-old` like '" . $this->db->escape_like_str($text) . "%'  ";
        //	echo $SQL;exit;
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchTextJot_Bikas_persian($text, $num = null, $offset = null) // $page_no - Page No.
    {

        $SQL = "SELECT * from N01 WHERE `name` = 'Jote Bigas: Persian' and `translit-old` like '" . $this->db->escape_like_str($text) . "%' limit $offset,$num ";
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchCountJot_Bikas_persian($text) // $page_no - Page No.
    {
        //echo $num;
        //echo '---'.$offset;exit;
        $SQL = "SELECT * from N01 WHERE `name` = 'Jote Bigas: Persian' and `translit-old` like '" . $this->db->escape_like_str($text) . "%'  ";
        //	echo $SQL;exit;
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchTextRahitnama($text, $num = null, $offset = null) // $page_no - Page No.
    {

        $SQL = "SELECT * from N01 WHERE `name` = 'Rahit Nama' and `translit-old` like '" . $this->db->escape_like_str($text) . "%' limit $offset,$num ";
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchCountRahitnama($text) // $page_no - Page No.
    {
        //echo $num;
        //echo '---'.$offset;exit;
        $SQL = "SELECT * from N01 WHERE `name` = 'Rahit Nama' and `translit-old` like '" . $this->db->escape_like_str($text) . "%'  ";
        //	echo $SQL;exit;
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchTextTankahnama($text, $num = null, $offset = null) // $page_no - Page No.
    {

        $SQL = "SELECT * from N01 WHERE `name` = 'Tankhah Naama' and `translit-old` like '" . $this->db->escape_like_str($text) . "%' limit $offset,$num ";
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function searchCountTankahnama($text) // $page_no - Page No.
    {
        //echo $num;
        //echo '---'.$offset;exit;
        $SQL = "SELECT * from N01 WHERE `name` = 'Tankhah Naama' and `translit-old` like '" . $this->db->escape_like_str($text) . "%'  ";
        //	echo $SQL;exit;
        $rs = $this->db->query($SQL);
        $search = $rs->result();
        return $search;


    }

    function bnlSelect_name()
    {
        $SQL="SELECT  DISTINCT name FROM N01 ORDER  BY name ";
        $rs=$this->db->query($SQL);
        if($rs->num_rows()>0)
        {
            return $rs;
        }else{
            return false;
        }
    }

}