<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Resources_dao extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get list of volumes
     */
    function get_volumes($book_id = 1)
    {
        $SQL = "SELECT * from BV01 WHERE book_id = " . $this->db->escape($book_id);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get list of chapters in volume
     */
    function get_chapters($book_id = 1, $volume_id = 1)
    {
        $SQL = "SELECT * from BC01 WHERE 
					book_id = " . $this->db->escape($book_id) . " 
					and volume_id = " . $volume_id;
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }


    /**
     * Get lines of chapter and volume
     */
    function get_lines($book_id = 1, $volume_id = 1, $page_no = 1, $table = '')
    {
        $SQL = "SELECT * from `" . $table . "` WHERE 
					volume_id = " . $this->db->escape($volume_id) . " 
					and page_id = " . $this->db->escape($page_no);
        $rs = $this->db->query($SQL);
        log_message("info", $SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get lines count
     */
    function get_lines_count($book_id = 1, $volume_id = 1, $page_no = 1, $table = '')
    {
        $SQL = "SELECT count(*) as `cnt` from `" . $table . "` WHERE 
					volume_id = " . $this->db->escape($volume_id);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0]->cnt;
        } else {
            return 0;
        }
    }

    /**
     * Get lines
     */
    function get_kosh_lines($keyword, $table = '', $index = 0, $alpha = '')
    {
        if ($table == 'SK01') {
            $SQL = "
				SELECT 
					ID as `id`,
					punjabi as `word`,
					roman as `roman`,
					Gurmukhi as `gurmukhi`,
					English as `english`,
					`mahankosh` as `mahankosh`
				from `" . $table . "` where punjabi like '" . ($alpha == 'alpha' ? '' : '%') . $this->db->escape_like_str($keyword) . "%'
			LIMIT " . $index . ",25
			";
        } else {
            $SQL = "
				SELECT * from `" . $table . "` where word like '" . ($alpha == 'alpha' ? '' : '%') . $this->db->escape_like_str($keyword) . "%'
				LIMIT " . $index . ",25
			";
        }
        //log_message('INFO',$SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get lines count
     */
    function get_kosh_lines_count($keyword, $table = '', $alpha = '')
    {
        if ($table == 'SK01') {
            $SQL = "
				SELECT count(*) as `cnt` from `SK01` where punjabi like '" . ($alpha == 'alpha' ? '' : '%') . $this->db->escape_like_str($keyword) . "%'
			";
        } else {
            $SQL = "
				SELECT count(*) as `cnt` from `" . $table . "` where word like '" . ($alpha == 'alpha' ? '' : '%') . $this->db->escape_like_str($keyword) . "%'
			";
        }
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0]->cnt;
        } else {
            return 0;
        }
    }

    /**
     * Get words from maansarovar
     */
    function get_maan_words($keyword = '', $index = 0, $alpha = '')
    {
        $SQL = "
			SELECT 
				DISTINCT word as `word`
			from 
				`B-MAAN` 
			where 
				`word` <> '' 
				AND word like '" . ($alpha == 'alpha' ? '' : '%') . $this->db->escape_like_str($keyword) . "%'
		";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get quotations from maansarovar
     */
    function get_maan_quotations($keyword = '')
    {
        $SQL = "
			SELECT 
				*
			from 
				`B-MAAN` 
			where 
				`words` = '" . $this->db->escape_like_str($keyword) . "'
		";
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }
}

?>