<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hukumnama_Dao extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get hukumnama titles
     */
    function get_hukumnama_titles($ang = 0, $type = 'pageno')
    {
        if($ang != 0)
        {
            $SQL = 'SELECT * FROM `HKM01` WHERE `'.$type.'`= ' . str_replace("_", ".", $this->db->escape($ang));

        }
        else
        {
            $SQL = "SELECT * FROM `HKM01`";
        }

        $rs = $this->db->query($SQL);

        if ($rs->num_rows() > 0) {
            return $rs;
        }
        else{
            return false;
        }
    }

    /**
     * Get hukumnama lines (paras)
     */
    function get_lines($ang, $type = 'pageno')
    {
        $SQL = '
			SELECT
				S01.ss_para,S01.ID AS id, S01.pageID AS pageno, S01.pagelineID AS pagelineno, S01.lineID AS lineno, S01.shabdID AS shabad_id, S01.shabdlineID AS shabadlineno, S01.attributes AS pattrib,S01.punjabi,S01.translit,S01.english
			FROM
				S01
			JOIN
				`HKM01` 
				ON
					S01.lineID >= HKM01.line_start
					AND S01.lineID <= HKM01.line_end
			WHERE
				HKM01.' . $type . ' = ' . str_replace("_", ".", $this->db->escape($ang));
        $rs = $this->db->query($SQL);

        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

}

?>