<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kabit_savaiye_dao extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get lines using Page No.
     */
    function get_lines($page_no) // $page_no - Page No.
    {
        $SQL = "SELECT 	lineID AS lineno, kabitID AS kabit, kabitlineID AS k_line, attributes AS lattrib, punjabi, punctuation, english, translit, hindi, urdu, roman from `K01` WHERE kabitID = " . $this->db->escape($page_no) . " AND kabitlineID != 0 ORDER BY lineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }

    }
}

?>