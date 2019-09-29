<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {
    
/*    public function view($view, $vars = array(), $return = FALSE)
    {
        list($path, $_view) = Modules::find($view, $this->_module, 'views/');
        
        if ($path != FALSE)
        {
            $this->_ci_view_paths = array($path => TRUE) + $this->_ci_view_paths;
            $view = $_view;
        }
        
        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_prepare_view_vars($vars), '_ci_return' => $return));
    }*/
    
    private $_template = 'default';
    private $_template_data = array('content' => '');
    
    /**
     * Sets the layout for the current page.
     *
     * The layout to be set must exist in the themes directory in Application folder
     *
     * @param string $template same as a folder name for the theme inside themes directory
     * @param array $data
     */
    public function setTemplate($template, array $data = array())
    {
        $this->_template = $template;
        $this->templateData($data);
    }
    
    /**
     * Set additional data that is needed in the Template layout.
     *
     * Set the variables like Title, Keyword, default_css etc. that will be used in the
     * Master layout or parts of it.
     *
     * @param array $data
     */
    public function templateData(array $data = array())
    {
        $this->_template_data = array_merge($this->_template_data, $data);
    }
    
    public function viewPage($view, $view_data, $template = null)
    {
        $template = empty($template) ? $this->_template : $template;
        $return = '';
        $this->library('templates/' . $template . 'Template', null, 'template');
        $this->templateData($view_data);
        $CI = & get_instance();
        $return = $CI->template->render($view, $this->_template_data);
        return $return;
    }
    
    public function viewPartial($view, array $view_data = array())
    {
        return parent::view($view, $view_data, true);
    }
    
    /**
     * (non-PHPdoc)
     * @see MX_Loader::view()
     */
    public function view($view, $view_data = array(), $return_view = false, $template = null)
    {
        $return = $this->viewPage($view, $view_data, $template);
        if (false === $return_view)
        {
            echo $return;
        }
        else
        {
            return $return;
        }
    }
    
    public function setTemplateBlank()
    {
        $this->_template_data = array();
    }
}