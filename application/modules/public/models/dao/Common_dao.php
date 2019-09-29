<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Common_dao extends CI_Model
{
   /* function Common_Dao()
    {
        parent::__construct();
    }*/
public function __construct(){
}
    /**
     * Get lines
     */
    function get_line($data = array())
    {

        $SQL = "
			SELECT
				*
			FROM
				`" . $data['table'] . "`
			WHERE
				1 
		";

        foreach ($data['where'] as $field => $value) {
            $SQL .= ' and ' . $field . ' = ' . $this->db->escape($value);
        }

        $rs = $this->db->query($SQL);

        //echo $this->db->last_query();exit;
        if ($rs->num_rows() > 0) {
            $rows = $rs->result();
            return $rows[0];
        } else {
            return false;
        }
    }
    function get_line_verse($data = array())
    {

        $SQL = "
			SELECT
				*
			FROM
				`" . $data['table'] . "`
			WHERE
				1 
		";

        foreach ($data['where'] as $field => $value) {
            $SQL .= ' and ' . $field . ' = ' . $this->db->escape($value);
        }

        $rs = $this->db->query($SQL);

        //echo $this->db->last_query();exit;
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get list of Authors in SGGS for Combo box
     */
    function get_autocomplete_words($keyword = '', $language = '', $source = '')
    {
        //$SQL = "SELECT word from `SXW01` where srch like '%". $keyword ."%'";
        //$SQL = "SELECT distinct chapter_name as word from `SC01` where chapter_name like '%". $keyword ."%'";
        if ($source != '') {
            if ($source == 'SK01') {
                $SQL = "SELECT distinct `punjabi` AS word FROM  `SK01` WHERE `punjabi` like '" . $this->db->escape_like_str($keyword) . "%' LIMIT 30";
            } else {
                $SQL = "SELECT distinct `word` AS word FROM  `$source` WHERE `word` like '" . $this->db->escape_like_str($keyword) . "%' LIMIT 30";
            }
        } else {
            if ($language == "punjabi") {
                $SQL = "SELECT `word_p` AS word FROM  `AUTOC` WHERE `srch_p` like '" . $this->db->escape_like_str($keyword) . "%' LIMIT 30";
            } elseif ($language == "hindi") {
                $SQL = "SELECT `word_h` AS word FROM  `AUTOC` WHERE `srch_h` like '" . $this->db->escape_like_str($keyword) . "%' LIMIT 30";
            } elseif ($language == "translit") {
                $SQL = "SELECT `word_r` AS word FROM  `AUTOC` WHERE `word_r` like '" . $this->db->escape_like_str($keyword) . "%' LIMIT 30";
            } else {
                return false;
            }
        }
        log_message('INFO', $SQL);
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
			SELECT punjabi, concat(`roman`,' - ',`English`) as `meaning`
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
     * Get guestbook comments
     * @comments - Array
     */
    function get_guestbook_comments($where = array(), $index = 0) // $page_no - Ang No.
    {
        $this->db->order_by('created', 'desc');
        $rs = $this->db->get_where('GB', $where, 10, $index);//$this->db->query($SQL,$where);
        if ($rs->num_rows() > 0) {
            return $rs->result();
        } else {
            return false;
        }
    }

    /**
     * Get guestbook comments
     * @comments - Array
     */
    function get_guestbook_comments_count($where = array()) // $page_no - Ang No.
    {
        $SQL = "SELECT count(*) as cnt FROM `GB` order by created desc";
        $rs = $this->db->query($SQL, $where);
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return 0 + $row[0]->cnt;
        } else {
            return false;
        }
    }

    /**
     * New guestbook comment
     */
    function new_guestbook_comment($data = array())
    {

        if($this->db->insert('GB', $data)){
            return 'success';
        }else{
            return 'error';
        }
//        $rs = $this->db->insert('GB', $data);
//        $dataFb = array(
//            "date" => $data['datetime'],
//            "First_name" => $data['name'],
//            "Email" => $data['emailid'],
//            "status" => '1'
//        );
//        $queryFb = $this->db->insert('FB', $dataFb);

//        return $this->db->insert_id();

    }

    /**
     * Guestbook comment update
     */


}

?>