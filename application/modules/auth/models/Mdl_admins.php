<?php defined('BASEPATH') OR exit('No direct script access allowed');
    
    
    class Mdl_admins extends My_Model
    {
        
        function __construct()
        {
            parent::__construct();
        }
        
        function get_user_by_username($username)
        {
            
            $this->db->select('*');
            $this->db->from('ADMINS');
            $this->db->where('username', $username);
            $query = $this->db->get();
            
            if (!empty($query)) {
                return $query->row_array();
            } else {
                return false;
            }
        }
        
        function get_user_by_id($id)
        {
            
            $this->db->select('*');
            $this->db->from('ADMINS');
            $this->db->where('id', $id);
            $query = $this->db->get();
            
            if (!empty($query)) {
                return $query->row_array();
            } else {
                return false;
            }
        }
        function get_admin_det($params)
        {
            $rs = $this->db->get_where('ADMINS', $params);
            if ($rs->num_rows() > 0) {
                return $rs->row_array();
            } else {
                return false;
            }
        }
        
        function update_password($id,$params){
            $this->db->where('id',$id);
            return $response = $this->db->update('ADMINS',$params);
        }
    }
	