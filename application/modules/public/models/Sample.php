<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sample extends CI_Model
{
    function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_ak_results($data)
    {
        $SQL = "
		SELECT 
			*
		FROM 
			A01
		WHERE MATCH(
			shabad_name
		) AGAINST(" . $this->db->escape($data) . ")
		";
        $res = $this->db->query($SQL);
        if ($res->num_rows() > 0) {
            return $res;
        } else {
            return false;
        }
    }

    function news($id, $name, $first_name, $last_name, $gender, $email)
    {


        $query = mysql_query("select * from FB WHERE FbID='$id'");
        $num = @mysql_num_rows($query);
        $set = "  FbName='$name',First_name='$first_name',Last_name='$last_name',Sex='$gender',Email='$email',date=now()";
        if ($num > 0) {
            $newsFb = "UPDATE FB SET " . $set . " WHERE FbID='" . $id . "'";
            $res = $this->db->query($newsFb);
            return $res;

        } else {
            $newsFb = "INSERT INTO FB SET FbID='" . $id . "', " . $set;
            $res = $this->db->query($newsFb);
            return $res;


        }
    }

    function saveNewsletter($data)
    {
        $rs = $this->db->insert('NEWS', $data);
        return $rs;
    }

    function saveFedback($data)
    {
        $SQL = "SELECT * FROM `FB` where Email='" . $data['Email'] . "'";
        $rsFb = $this->db->query($SQL);
        if ($rsFb->num_rows() == 0) {
            $queryFb = $this->db->insert('FB', $data);
            return $queryFb;
        }
    }

    function allNewsletter()
    {
        $allNewsletter = $this->db->get('NEWS');

        foreach ($allNewsletter->result() as $news) {
            $newsLe[] = $news;

        }
        return $newsLe;
    }

    function deleteNewsletter($id)
    {
        $queryDel = $this->db->query("DELETE FROM NEWS WHERE id=" . $id);
        return true;
    }

    function getAllNewsletter($id)
    {
        $alluser = array();
        $query = $this->db->query("select * FROM NEWS WHERE id=" . $id);
        foreach ($query->result() as $row) {
            $alluser = $row;
        }
        return $alluser;
    }

    function editNewsletter($id)
    {
        $alluser = array();
        $query = $this->db->query("select * FROM NEWS WHERE id=" . $id);
        $edituser = $query->result();
        return $edituser;
    }

    function getAllMails()
    {
        $query = $this->db->get('FB');
        foreach ($query->result() as $row) {
            $alluser[] = $row->Email;

        }
        return $alluser;
    }

    function updateNewsletter($data)
    {
        $title = addslashes($data['title']);
        $content = addslashes($data['content']);
        $date = $data['date'];
        $set = "title='" . $this->db->escape($title) . "',content='" . $this->db->escape($content) . "',date='$date'";
        $newsUpdate = "UPDATE NEWS SET " . $set . " WHERE id='" . $data['id'] . "'";
        $res = $this->db->query($newsUpdate);
        return $res;
    }

    function pagelist($num = null, $offset = null)
    {
        // $query = $this->db->get_where('takibi_pages', array('fbid' => $me['id']));
        // return $query->result();

        $query = $this->db->query("select * FROM NEWS limit $offset,$num");
        $allnews = $query->result();
        return $allnews;

        //echo "select * from takibi_pages where fbid = '".$me['id']."' limit $num , $offset";

        // return $query = $this->db->get();

    }

    function countHukamnama($date)
    {

        $query = $this->db->query("select * FROM hukamnama WHERE status='0' and date='$date'");
        $selectHukam = $query->result();
        return $selectHukam;
    }

    function countHukamnamaAmrit($date)
    {

        $query = $this->db->query("select * FROM HKMDS WHERE date_hukam='$date'");
        $selectHukam = $query->result();
        return $selectHukam;
    }

    function countHukamnamaAmritInt($hukumtime)
    {

        $query = $this->db->query("select * FROM HKMDS WHERE hukamdatetime='$hukumtime'");
        $selectHukam = $query->result();
        return $selectHukam;
    }

    function insertHukamnama($content, $head, $date)
    {
        $set = "content='" . $this->db->escape($content) . "',head='$head',date='$date',status='0',fromHukam='harmindarSahib'";
        $newsFb = "INSERT INTO hukamnama SET " . $set;

        $res = $this->db->query($newsFb);
        return $res;
    }

    function insertHukamnamaAmrit($info)
    {
        return $this->db->insert('HKMDS', $info);
    }

    function selectHukamnama()
    {
        $query = $this->db->query("select * FROM hukamnama WHERE status='0' order by date desc limit 1");
        $selectHukam = $query->result();
        return $selectHukam;
    }

    function selectHukamnamaAmritRss()
    {
        $query = $this->db->query("select * FROM HKMDS  order by adddatetime desc limit 10");
        $selectHukam = $query->result();
        return $selectHukam;
    }

    function selectHukamnamaAmrit($dt)
    {
        if ($dt != "") {
            $query = $this->db->query("select * FROM HKMDS WHERE date_hukam='$dt' order by adddatetime desc limit 1");
        } else {
            $query = $this->db->query("select * FROM HKMDS  order by adddatetime desc limit 1");
        }
        $selectHukam = $query->result();
        return $selectHukam;
    }

    function get_all_hukumnama()
    {
        $this->db->select('*');
        $this->db->from('HKMDS');
        $response = $this->db->get();

        if (!empty($response) && $response->num_rows() > 0){
            return $response->result_array();
        }else{
            return false;
        }

    }

    function countHukamnamaBangla($date)
    {

        $query = $this->db->query("select * FROM hukamnama WHERE status='1' and date='$date'");
        $selectHukam = $query->result();
        return $selectHukam;
    }

    function insertHukamnamaBangla($content, $date)
    {

        $set = "content='" . $this->db->escape($content) . "',date='$date',status='1',fromHukam='banglaSahib'";
        $newsFb = "INSERT INTO hukamnama SET " . $set;

        $res = $this->db->query($newsFb);

        return $res;
    }

    function banglaSahibHukam()
    {

        $query = $this->db->query("select * FROM hukamnama WHERE status='1' order by date desc limit 1 ");
        $selectHukam = $query->result();
        return $selectHukam;
    }

    function countHukamnamaSisganj($date)
    {

        $query = $this->db->query("select * FROM hukamnama WHERE status='2' and date='$date'");
        $selectHukam = $query->result();
        return $selectHukam;
    }

    function insertHukamnamaSisganj($content, $date)
    {
        $set = "content='" . $this->db->escape($content) . "',date='$date',status='2',fromHukam='sisganj'";
        $newsFb = "INSERT INTO hukamnama SET " . $set;

        $res = $this->db->query($newsFb);
        return $res;
    }

    function SisganjSahibHukam()
    {

        $query = $this->db->query("select * FROM hukamnama WHERE status='2' order by date desc limit 1");

        $selectHukam = $query->result();

        return $selectHukam;
    }

    function countHukamnamaRakabganj($date)
    {

        $query = $this->db->query("select * FROM hukamnama WHERE status='3' and date='$date'");
        $selectHukam = $query->result();
        return $selectHukam;
    }

    function insertHukamnamaRakabganj($content, $date)
    {
        $set = "content='" . $this->db->escape($content) . "',date='$date',status='3',fromHukam='rakabganj'";
        $newsFb = "INSERT INTO hukamnama SET " . $set;

        $res = $this->db->query($newsFb);
        return $res;
    }

    function RakabganjSahibHukam()
    {

        $query = $this->db->query("select * FROM hukamnama WHERE status='3' order by date desc limit 1");

        $selectHukam = $query->result();

        return $selectHukam;
    }


}

?>