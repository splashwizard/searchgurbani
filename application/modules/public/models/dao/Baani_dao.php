<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Baani_dao extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get lines of jaap_sahib
     */

    function get_jaap_sahib($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, attributes AS lattrib, punjabi, english, hindi, roman, urdu, teeka AS dgteeka, translit
		FROM
			D01
		WHERE 
			lineID >= 1 and lineID <= 807
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    /**
     * Get lines of Tvai Prasadh Savaiye
     */
    function get_tvai_prasadh_savaiye($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, attributes AS lattrib, punjabi, english, hindi, roman, urdu, teeka AS dgteeka, translit
		FROM 
			D01
		WHERE 
			lineID >= 900 and lineID <= 940
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Chaupai Sahib

    function get_chaupai_sahib($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, attributes AS lattrib, punjabi, english, hindi, roman, urdu, teeka AS dgteeka, translit
		FROM 
			D01
		WHERE 
			lineID >= 65823 and lineID <= 65943
		LIMIT
			$index, $limit
		";

         $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Kirtan Sohila

    function get_kirtan_sohila($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu         
		FROM 
			S01
		WHERE 
			lineID >= 534 and lineID <= 589
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Anand Sahib(Bhog)

    function get_anand_sahib_bhog($index = 0, $limit = 25)
    {
        $SQL = "
				SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu         

			
		FROM 
			S01
		WHERE 
			(lineID >= 39320 and lineID <= 39347) OR
			(lineID >= 39524 and lineID <= 39529)
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Anand Sahib

    function get_anand_sahib($index = 0, $limit = 25)
    {
        $SQL = "
				SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu         

		FROM 
			S01
		WHERE 
			lineID >= 39320 and lineID <= 39529
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

//Rehraas Sahib

    function get_rehraas_sahib($index = 0, $limit = 25)
    {

        $SQL = "
		SELECT 
			lineID AS lineno, translit, punjabi, hindi, english
		FROM 
			S01
		WHERE 
			lineID >= 20475 and lineID <= 20478
		
		UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID>= 21213 and lineID <= 21220
		
		UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 386 and lineID <= 533

		UNION

		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			D01
		WHERE 
			lineID >= 65823 and lineID <= 65943
			
		UNION

		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			D01
		WHERE 
			lineID >= 13116 and lineID <= 13122	
		
		UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 39320 and lineID <= 39347
		
		UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 39524 and lineID <= 39529
		
		UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 60557 and lineID <= 60567
		
		UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 41301 and lineID <= 41309
		
		UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 23134 and lineID <= 23149
		
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

//Laavan( Anand Karaj)

    function get_laavan_anand_karaj($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 33104 and lineID <= 33128
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

//Asa Ki Vaar
    function get_asa_ki_vaar($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			(lineID >= 20376 and lineID <= 20381) OR
			(lineID >= 20880 and lineID <= 21515)
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

//Sidh Gosht
    function get_sidh_gosht($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 40184 and lineID <= 40589
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

//Ramkali Sadh
    function get_ramkali_sadh($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 39530 and lineID <= 39567
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

//Dhakanee Oankaar
    function get_dhakanee_oankaar($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 39785 and lineID <= 40183
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

//Baavan Akhree
    function get_baavan_akhree($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 10899 and lineID <= 11587
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

//Baarah Maaha
    function get_baarah_maaha($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 5450 and lineID <= 5578
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Salok Sehskritee
    function get_salok_sehskritee($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 57828 and lineID <= 58088
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    ////Gathaa
    function get_gathaa($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 58089 and lineID <= 58149
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Phunhay M: 5
    function get_phunhay_m5($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 58150 and lineID <= 58243
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Chaubolay M:5
    function get_chaubolay_m5($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 58244 and lineID <= 58267
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Salok Kabeer ji
    function get_salok_kabeer_ji($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 58268 and lineID <= 58761
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Salok Farid ji
    function get_salok_farid_ji($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 58762 and lineID <= 59058
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Savaiye M: 1
    function get_savaiye_m1($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 59184 and lineID <= 59235
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Savaiye M: 2
    function get_savaiye_m2($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 59236 and lineID <= 59287
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Savaiye M: 3
    function get_savaiye_m3($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 59288 and lineID <= 59411
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Savaiye M: 4
    function get_savaiye_m4($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 59412 and lineID <= 59733
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Savaiye M: 5
    function get_savaiye_m5($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 59734 and lineID <= 59838
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Salok M: 9
    function get_salok_m9($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 60440 and lineID <= 60556
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }


    //Bachitar Natak

    function get_bachitar_natak($index = 0, $limit = 50)
    {
        $SQL = "
		SELECT 
			pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, attributes AS lattrib, punjabi, english, hindi, roman, urdu, teeka AS dgteeka, translit
		FROM 
			D01
		WHERE 
			lineID >= 1901 and lineID <= 3859
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Akal Ustati

    function get_akal_ustati($index = 0, $limit = 50)
    {
        $SQL = "
		SELECT 
			pageID AS pageno, pagelineID AS pagelineno, lineID AS lineno, attributes AS lattrib, punjabi, english, hindi, roman, urdu, teeka AS dgteeka, translit
		FROM 
			D01
		WHERE 
			lineID >= 808 and lineID <= 1900
		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //shabad_hazare

    function get_shabad_hazare($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			(lineID >= 3845 and lineID <= 3861) OR
			(lineID >= 28687 and lineID <= 28703) OR
			(lineID >= 31051 and lineID <= 31084) OR
			(lineID >= 31403 and lineID <= 31413) OR
			(lineID >= 33956 and lineID <= 33979) 
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Sukhmana sahib

    function get_sukhmana_sahib($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			(lineID >= 35509 and lineID <= 35623) OR 
			(lineID >= 42040 and lineID <= 42154) OR 
			(lineID >= 56083 and lineID <= 56197) OR 
			(lineID >= 56608 and lineID <= 56722)
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Dukh Bhanjani Sahib

    function get_dukh_bhanjani_sahib($index = 0, $limit = 25)
    {
        $SQL = "
			SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			(lineID >= 9403 and lineID <= 9413) 
		UNION
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			(lineID >= 8176 and lineID <= 8197) OR 
			(lineID >= 8420 and lineID <= 8430) OR 
			(lineID >= 8660 and lineID <= 8677) OR 
			(lineID >= 8714 and lineID <= 8724) OR 
			(lineID >= 8906 and lineID <= 8916) OR 
			(lineID >= 34226 and lineID <= 34240) OR 
			(lineID >= 34449 and lineID <= 34462) OR 
			(lineID >= 34470 and lineID <= 34476) OR 
			(lineID >= 34491 and lineID <= 34497) OR 
			(lineID >= 34502 and lineID <= 34508) OR 
			(lineID >= 34768 and lineID <= 34778) OR 
			(lineID >= 34889 and lineID <= 34903) OR 
			(lineID >= 34981 and lineID <= 34987) OR 
			(lineID >= 34995 and lineID <= 35008) OR 
			(lineID >= 35049 and lineID <= 35055) OR 
			(lineID >= 35196 and lineID <= 35202)
		UNION
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			(lineID >= 26623 and lineID <= 26633) OR 
			(lineID >= 26899 and lineID <= 26905) OR 
			(lineID >= 26913 and lineID <= 26926) OR 
			(lineID >= 26934 and lineID <= 26947)
		UNION
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			(lineID >= 26871 and lineID <= 26877) OR 
			(lineID >= 26957 and lineID <= 26963) OR 
			(lineID >= 26941 and lineID <= 26947) OR 
			(lineID >= 26971 and lineID <= 26977) OR 
			(lineID >= 27068 and lineID <= 27086) OR 
			(lineID >= 35327 and lineID <= 35333)
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Japji Sahib

    function get_japji_sahib($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu         
		FROM 
			S01
		WHERE 
			lineID >= 1 and lineID <= 385
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

    //Sukhmani Sahib

    function get_sukhmani_sahib($index = 0, $limit = 25)
    {
        $SQL = "
		SELECT 
			pageID AS pageno,pagelineID AS pagelineno,lineID AS lineno, shabdID AS shabad_id,shabdlineID AS shabadlineno, raag, author, punjabi, hindi, translit,roman, english, lareedar, urdu
		FROM 
			S01
		WHERE 
			lineID >= 11588 and lineID <= 13614
		LIMIT
			$index, $limit
		";

        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

//Aarti

    function get_aarti($index = 0, $limit = 25)
    {

        $SQL = "
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 554 and lineID <= 567
		
		UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 30046 and lineID <= 30055
		
		UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 30073 and lineID <= 30083
            
        UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 57731 and lineID <= 57738    

		UNION
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			S01
		WHERE 
			lineID >= 30092 and lineID <= 30101  
			
		UNION	
		
		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			A01
		WHERE 
			lineID >= 30883 and lineID <= 30900 		
        
        	UNION

		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			D01
		WHERE 
			lineID >= 14209 and lineID <= 14210
			
		UNION

		SELECT 
			lineID AS lineno,translit,punjabi,hindi,english
		FROM 
			A01
		WHERE 
			lineID >= 30901 and lineID <= 30914	
		

		LIMIT
			$index, $limit
		";
        log_message('info', $SQL);
        $rs = $this->db->query($SQL);
        if ($rs->num_rows() > 0) {
            return $rs;
        } else {
            return false;
        }
    }

}


?>