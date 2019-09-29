<?php
class Rssapp_model extends CI_Model {
	
	function __construct(){
		 parent::__construct();
	}
	
	function saveFeedsGuid($info)/*****to save user data*****/
	{
		return $this->db->insert('RSS-FEED', $info);
	}
	function getFeedsGuid($pageId,$guid)
	{
		$query=$this->db->query("SELECT * FROM `RSS-FEED` where pageId='".$pageId."' and guid='".$guid."'");
		return $links=$query->result_array();
	}
	
}

?>