<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Base Template class
 */

/**
 * Base Template class for other Template's comfort
 */
abstract class Template
{

    const DS = DIRECTORY_SEPARATOR;

    //Path of the views within the Template folder
    protected $viewPath;
    //Holder for CI instance
    //We may need to use the CI library
    protected $CI;
    //Default Name of the the master template file
    protected $masterTemplate = 'master';
    //Default template name
    protected $template = 'default';

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->viewPath = 'templates' . self::DS . $this->template . self::DS;
    }

    /**
     * Abstract functio that all child classes must implement
     *
     * @param string $view
     * @param array $data
     * @param boolean $return
     */
    abstract public function render($view, array $data = array());

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
                if (isset($cssFile['name']) && file_exists($cssFile['name'])) {
                    $modtime = filemtime($cssFile['name']);
                    $params = "?" . $modtime;
                }

                $media = '';
                if (!empty($cssFile['media-print'])) {
                    $media = get_last_segment() == 'print-view' ? 'screen,print' : 'print';
                }

                if (!empty($cssFile['cdn'])) {

                    $css_text = '<link href="' . $cssFile['name'] . $params . '" rel="stylesheet" type="text/css" media="' . $media . '"';

                } else {
                    $css_text = '<link href="' . base_url() . $cssFile['name'] . $params . '" rel="stylesheet" type="text/css" media="' . $media . '"';
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
                if (isset($jsFile['name']) && file_exists($jsFile['name'])) {
                    $modtime = filemtime($jsFile['name']);
                    $params = "?" . $modtime;
                }
                if (!empty($jsFile['cdn'])) {
                    $js_tag = '<script type="text/javascript" charset="UTF-8" src="' . $jsFile['name'] . $params . '"';
                    $js_tag .= '></script>' . "\n";
                } else {
                    $js_tag = '<script type="text/javascript" charset="UTF-8" src="' . base_url() . $jsFile['name'] . $params . '"';
                    $js_tag .= '></script>' . "\n";
                }
                $js[] = $js_tag;
            }
        }
        return $js;
    }

}
