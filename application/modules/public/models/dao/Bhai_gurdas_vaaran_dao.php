<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bhai_gurdas_vaaran_dao extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get pauri lines using vaar no. and pauri no.
     */
    function get_pauri_lines($vaar_no, $pauri_no)
    {
        $SQL = "
		SELECT *, pauriID as paurino, pauri_lineID as pauri_lineno, attributes as lattrib from `B01` WHERE vaarID = " . $this->db->escape($vaar_no) . " AND pauriID = " . $this->db->escape($pauri_no) . " AND pauri_lineID != 0  ORDER BY pauri_lineID ASC";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }

    }


    /**
     * Get count of pauries in a vaar
     */
    function get_pauries($vaar_no)
    {
        $SQL = "
		SELECT 
			DISTINCT pauriID as paurino, pauri_name_punjabi, pauri_name_roman,lineID,pauri_lineID
		FROM 
			`B01`
		WHERE 
			`vaarID` = " . $this->db->escape($vaar_no) . "
			AND (
				pauri_name_punjabi <> ''
				OR pauri_name_roman <> ''
			)
		";
        $rs = $this->db->query($SQL);

        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get pauri name by vaar_no and pauri_no
     */
    function get_pauri_name($vaar_no, $pauri_no)
    {
        $SQL = "
		SELECT 
			DISTINCT pauriID as paurino, pauri_name_punjabi, pauri_name_roman
		FROM 
			`B01`
		WHERE 
			`vaarID` = " . $this->db->escape($vaar_no) . "
			and `pauriID` = " . $this->db->escape($pauri_no) . "
			AND (
				pauri_name_punjabi <> ''
				OR pauri_name_roman <> ''
			)
		";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0];
        } else {
            return false;
        }
    }

    /**
     * Get count of pauries in a vaar
     */
    function get_pauri_count($vaar_no)
    {
        $SQL = "
		SELECT count(distinct pauriID) as `pauri_count` from `B01` WHERE vaarID = " . $this->db->escape($vaar_no);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return 0 + $row[0]->pauri_count;
        } else {
            return 0;
        }
    }
}