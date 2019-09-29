<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
    /**
     * Default template
     */
    require_once 'Template.php';

    /**
     * Default template implementation.
     * 
     * It is the default renderer of all the pages if any other renderer is not used.
     */
    class AdminTemplate extends Template
    {

        public function __construct()
        {
            parent::__construct();

            $this->_CI = & get_instance();
            $this->viewPath = "templates/admin/";
        }

        public function render($view, array $data = array())
        {
            $return_val = $this->CI->load->viewPartial($view, $data);

            $data['template_content'] = $return_val;

            $css_tags = $this->collectCss("admin", isset($data['local_css']) ? $data['local_css'] : array());
            $data['template_css'] = implode("\n", $css_tags);
            $script_tags = $this->collectJs("admin", isset($data['local_js']) ? $data['local_js'] : array());

            $data['template_js'] = implode("\n", $script_tags);

            $data['template_title'] = '';

            $this->CI->load->library('session');
            $sess_user_auth = $this->CI->session->userdata('admin_user_auth');
            if(isset($sess_user_auth['id'])){
                $this->CI->load->model('auth/Mdl_admins');
                $user_det = $this->CI->Mdl_admins->get_user_by_id($sess_user_auth['id']);
                $data['template_user_name'] = $user_det['name'];
        
            }

            $data['template_header'] = $this->CI->load->viewPartial($this->viewPath . 'header', $data);
            $data['template_footer'] = $this->CI->load->viewPartial($this->viewPath . 'footer', $data);

            $return_val = $this->CI->load->viewPartial($this->viewPath . $this->masterTemplate, $data);
            return $return_val;
        }

    }
    