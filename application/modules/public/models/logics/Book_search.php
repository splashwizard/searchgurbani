<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Book_search extends CI_Model
{
    var $books = array("1" => array("id" => 1, "table" => 'B-SNP'),
        "2" => array("id" => 2, "table" => 'B-SGPS'),
        "3" => array("id" => 3, "table" => 'B-FWT'),
        "4" => array("id" => 4, "table" => 'B-GGD')
    );

    /**
     * Method to get the occurences of the search terms
     */
    function get_occurrences($keyword, $book_id, $index = 0)
    {
        // Global Variables
        $keyword = trim($keyword);
        $SQL = "
			SELECT
			*,
			(
				(
					CHAR_LENGTH(text) - (
											CHAR_LENGTH(
												REPLACE(text,'?','')
											)
										)
				) 
				/ 
				CHAR_LENGTH('?')
			) as `weight`
			FROM `" . $this->books[$book_id]['table'] . "`
			WHERE
				text like '%?%'
			ORDER BY weight DESC
			LIMIT " . $index . ",25
		";
        $rs = $this->db->query($SQL, array($keyword, $keyword, $this->db->escape_like_str($keyword)));
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    function get_occurrences_count($keyword, $book_id)
    {
        // Global Variables
        global $books;

        $SQL = "
			SELECT count(*) as `cnt`
			FROM `" . $this->books[$book_id]['table'] . "`
			WHERE
				text like '%?%'
		";
        $rs = $this->db->query($SQL, array(trim($keyword)));
        if ($rs->num_rows() > 0) {
            $row = $rs->result();
            return $row[0]->cnt;
        } else {
            return 0;
        }
    }

}

?>