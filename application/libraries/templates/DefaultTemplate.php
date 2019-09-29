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
    class DefaultTemplate extends Template
    {

        public function __construct()
        {
            parent::__construct();

            $this->_CI = & get_instance();
            $this->min_root_loc = $this->_CI->config->item('min_root_loc');
        }

        public function render($view, array $data = array())
        {
            $return_val = $this->CI->load->viewPartial($view, $data);

            $data['template_content'] = $return_val;

            $css_tags = $this->collectCss("public", isset($data['local_css']) ? $data['local_css'] : array());
            $data['template_css'] = implode("\n", $css_tags);

            $script_tags = $this->collectJs("public", isset($data['local_js']) ? $data['local_js'] : array());
            $data['template_js'] = implode("\n", $script_tags);

            $share_data['text'] = isset($data['meta_title']) ? $data['meta_title'] : '';
            $share_data['link'] = current_url();
    
            $data['template_authdata'] = $this->CI->session->userdata('searchgurbani');
            
            $data['template_share_this'] = $this->CI->load->viewPartial($this->viewPath . 'components/share-this', $data);
            $data['template_header_menu'] = $this->CI->load->viewPartial($this->viewPath . 'components/header-menu', $data);
            $data['template_header_banner'] = $this->CI->load->viewPartial($this->viewPath . 'components/header-banner', $data);
    
            $data['template_header'] = $this->CI->load->viewPartial($this->viewPath . 'header', $data);
            $data['template_footer'] = $this->CI->load->viewPartial($this->viewPath . 'footer', $data);
            
            $return_val = $this->CI->load->viewPartial($this->viewPath . $this->masterTemplate, $data);
            return $return_val;
        }

        /**
         * Build an array of all the require css files as defined in
         * coulomb_static_config.php and provided by the action in $data['local_css']
         *
         * @param array $local_css
         * @return multitype:string
         */
        public function collectCss($modulename, $local_css = array())
        {
            if ($modulename == "admin")
                $coulomb_css_arr = array_values($this->CI->config->item('admin_default_css'));
            else
                $coulomb_css_arr = array_values($this->CI->config->item('default_css'));

            $coulomb_config_css = $this->CI->config->item('css_arr');

            if (!empty($local_css) && is_array($local_css)) {
                foreach ($local_css as $css_file) {
                    if (isset($coulomb_config_css[$css_file])) {
                        $coulomb_css_arr[] = $coulomb_config_css[$css_file];
                    }
                }
            }

            $css = array();
            if (!empty($coulomb_css_arr) && is_array($coulomb_css_arr)) {
                foreach ($coulomb_css_arr as $cssFile) {
                    $params = '';
//                    if (isset($cssFile['name']) && file_exists($cssFile['name'])) {
//                        $modtime = filemtime($cssFile['name']);
//                        $params = "&" . $modtime;
//                    }

                    $media = '';
                    if (!empty($cssFile['media-print'])) {
                        $media = get_last_segment() == 'print-view' ? 'screen,print' : 'print';
                    }

                    if (!empty($cssFile['cdn'])) {

                        $css_text = '<link href="' . $cssFile['name'] . $params . '" rel="stylesheet" type="text/css" media="' . $media . '"';

                    } else {
                        $css_text = '<link href="' . base_url($this->min_root_loc) . $cssFile['name'] . $params . '" rel="stylesheet" type="text/css" media="' . $media . '"';
                    }

                    if (isset($cssFile['media'])) {
                        $css_text .= ' media="' . $cssFile['media'] . '"';
                    }
                    $css_text .= ' />' . "\n";

                    $css[] = $css_text;
                }
            }
            return $css;
        }

        /**
         * Build an array of all the require JavaScript files as defined in
         * coulomb_static_config.php and provided by the action in $data['local_js']
         *
         * @param array $local_js
         * @return multitype:string
         */
        public function collectJs($modulename, $local_js = array())
        {
            if ($modulename == "admin")
                $coulomb_js_arr = array_values($this->CI->config->item('admin_default_js'));
            else
                $coulomb_js_arr = array_values($this->CI->config->item('default_js'));

            $coulomb_config_js_arr = $this->CI->config->item('js_arr');

            if (!empty($local_js) && is_array($local_js)) {
                foreach ($local_js as $js_index) {
                    if (isset($coulomb_config_js_arr[$js_index])) {
                        $coulomb_js_arr[] = $coulomb_config_js_arr[$js_index];
                    }
                }
            }

            $js = array();
            if (!empty($coulomb_js_arr) && is_array($coulomb_js_arr)) {
                foreach ($coulomb_js_arr as $jsFile) {
                    $params = '';
//                    if (isset($jsFile['name']) && file_exists($jsFile['name'])) {
//                        $modtime = filemtime($jsFile['name']);
//                        $params = "&" . $modtime;
//                    }
                    if (!empty($jsFile['cdn'])) {
                        $js_tag = '<script type="text/javascript" charset="UTF-8" src="' . $jsFile['name'] . $params . '"';
                        $js_tag .= '></script>' . "\n";
                    } else {
                        $js_tag = '<script type="text/javascript" charset="UTF-8" src="' . base_url($this->min_root_loc) . $jsFile['name'] . $params . '"';
                        $js_tag .= '></script>' . "\n";
                    }
                    $js[] = $js_tag;
                }
            }
            return $js;
        }

    }
    