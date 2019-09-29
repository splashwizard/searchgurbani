<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Mdl_employees extends MY_Model
	{
		/*
			 * Get employee by employee_id
			 */
		function get_employee($employee_id)
		{
			return $this->db->get_where('employees',array('employee_id'=>$employee_id))->row_array();
		}
		
		/*
		 * Get all employees
		 */
		function get_all_employees()
		{
			return $this->db->get('employees')->result_array();
		}
		
		/**
		 * @param $cond
		 * @return mixed
		 */
		function get_employee_by($cond) {
			return $this->db->get_where('employees', $cond)->row_array();
		}
		
		/**
		 * @param $cond
		 * @return mixed
		 */
		function get_employee_by_multiple($cond) {
			return $this->db->get_where('employees', $cond)->result_array();
		}
		
		/*
		 * Get all employees
		 */
		function get_all_employees_datatable($pagingParams = array())
		{
			//Doing this because as per coding guidelines we are not supposed to return CI query object
			$this->db->select('SQL_CALC_FOUND_ROWS 1', false);
			$this->db->select($this->select_db_cols);
			
			if (!empty($pagingParams['order_by'])) {
				if (empty($pagingParams['order_direction'])) {
					$pagingParams['order_direction'] = '';
				}
				
				switch ($pagingParams['order_by']) {
					default:
						$this->db->order_by($pagingParams['order_by'], $pagingParams['order_direction']);
						break;
				}
			}
			
			$search = empty($pagingParams['search']) ? array() : $pagingParams['search'];
			if (!empty($search)) {
				$this->db->like($this->list_search_key, $search);
			}
			
			$return = $this->getWithCount($this->tbl_name, $pagingParams['records_per_page'], $pagingParams['offset']);
			return $return;
		}
		
		/*
		 * function to add new employee
		 */
		function add_employee($params)
		{
			$params = $this->append_datetime($params, true);
			$this->db->insert('employees',$params);
			return $this->db->insert_id();
		}
		
		/*
		 * function to update employee
		 */
		function update_employee($employee_id,$params)
		{
			$params = $this->append_datetime($params, false);
			$this->db->where('employee_id',$employee_id);
			return $response = $this->db->update('employees',$params);
		}
		
		/*
		 * function to delete employee
		 */
		function delete_employee($employee_id)
		{
			$response = $this->db->delete('employees',array('employee_id'=>$employee_id));
			if($response)
			{
				return "employee deleted successfully";
			}
			else
			{
				return "Error occuring while deleting employee";
			}
		}
		
		public function get_activity_for_calendar_single_emp($cond) {
			$this->db->select('project_activity.*, projects.name as project_name, projects.description as project_description, employees.name as employee_name', FALSE);
			$this->db->where($cond);
			$this->db->join('projects', 'projects.project_id = project_activity.project_id');
			$this->db->join('employees', 'employees.employee_id = project_activity.employee_id');
			$q = $this->db->get('project_activity');
			return $q->result_array();
		}
	}