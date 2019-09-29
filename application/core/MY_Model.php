<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Base model for the application
 *
 */
class MY_Model extends CI_Model
{

    /**
     * Constructor.
     * @return
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Function that returns resultset from result object. Used in many models, moved to base model.
     */
    public function getResultSet($query)
    {
        $result = null;
        if ($query && $query->num_rows() > 0)
        {
            $result = $query->result();
        }
        return $result;
    }

    /**
     * function will return the total rows for the query and the result set as an array.
     * this will be used for calculation total rows for the query which helps us
     * in calculation the total number of possible pages as per the offset.
     *
     */
    public function getWithCount($table = '', $limit = null, $offset = null)
    {
        $result = null;
        if (in_array($this->db->dbdriver, array('mysql', 'mysqli')))
        {
            $this->db->protect_identifiers($table, false);
//                $this->db->select("SQL_CALC_FOUND_ROWS 1", false);

//                This is important coz escaping is necessary here
//                array_unshift($this->db->qb_select, array_pop($this->db->qb_select));

            $query = $this->db->get($table, $limit, $offset);

//                echo $this->db->last_query();exit;

            $result = array(
                'foundRows' => $this->found_rows(),
                'resultSet' => $this->getResultSet($query),
            );
        }


        return $result;
    }

    /**
     *  this function will returns the total number of rows for the last executed query.
     */
    public function found_rows()
    {
        if (!in_array($this->db->dbdriver, array('mysql', 'mysqli')))
        {
            throw new Exception('found rows is currently available for mysql drivers only');
        }
        $total_rows = 0;
        $query = $this->db->query('select found_rows() as total_rows'); // this query needs to be skipped from last_query function
        $result = $this->getResultSet($query);

        if (!empty($result))
        {
            $total_rows = empty($result[0]->total_rows) ? 0 : $result[0]->total_rows;
        }

        // skipping the found rows query from last_query function by removing this query from $this->db->queries array.
        // this is helpful when we want to see actual query using last_query function that will returns the last executed query.
        // if this is not done then we always get the 'select found_rows() as total_rows' query as output of last_query function.
        $totalQueries = count($this->db->queries);
        if ($totalQueries > 0)
        {
            if (isset($this->db->queries[$totalQueries - 1]))
            {
                unset($this->db->queries[$totalQueries - 1]);
            }
        }


        return $total_rows;
    }

    /**
     * @param $data table data
     * @param $new either data is new or being edited
     * @return array return the data after appending time
     */
    public function append_datetime($data, $new)
    {
        if ($new == 1) {
            $data = array_merge($data, array(
                'created' => date('Y-m-d H:i:s', time()),
                'modified' => date('Y-m-d H:i:s', time())
            ));
        } else {
            $data = array_merge($data, array(
                'modified' => date('Y-m-d H:i:s', time())
            ));
        }
        return $data;
    }

}
