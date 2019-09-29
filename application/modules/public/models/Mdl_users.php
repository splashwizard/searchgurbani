<?php defined('BASEPATH') OR exit('No direct script access allowed');
    
    
    class Mdl_users extends MY_Model
    {
        
        function __construct()
        {
            parent::__construct();
        }
        
        function get_user_by($params)
        {
            $this->db->select('*');
            $this->db->from('USERS');
            $this->db->where($params);
            $query = $this->db->get();
            
            if (!empty($query->num_rows())) {
                return $query->row_array();
            } else {
                return false;
            }
        }
        
        /*
		 * function to add new employee
		 */
        function add_user($params)
        {
            $params = $this->append_datetime($params, true);
            $this->db->insert('USERS', $params);
            
            return $this->db->insert_id();
        }
        
        /*
         * function to update employee
         */
        function update_user($cond, $params)
        {
            $params = $this->append_datetime($params, false);
            $this->db->where($cond);
            
            return $response = $this->db->update('employees', $params);
        }
        
    }
	