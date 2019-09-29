<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mdl_users extends MY_Model
{
    function get_all_users_datatable($pagingParams = array())
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

    function comments_update($data = array(), $where = array())
    {
        $rs = $this->db->update('GB', $data, $where);

        return true;
    }

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

    function get_all_users(){
        $this->db->select('*');
        $this->db->from('USERS');
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $row = $result->result_array();
        } else {
            return false;
        }

    }

    function update_user($db_data,$email)
    {
        $this->db->where('email', $email);
        $rs = $this->db->update('USERS', $db_data);

        return $rs;
    }
}
