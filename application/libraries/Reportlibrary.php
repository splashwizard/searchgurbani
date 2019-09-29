<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Common library function goes here
 */
class Reportlibrary
{
    // CodeIgniter instance
    private $_CI;

    private $_systemOperations = array(
        'ACTION_ICONS_EDIT_DELETE',
        'VIEW',
        'VIEW_ICON',
        'EDIT',
        'EDIT_ICON',
        'DELETE',
        'DELETE_ICON',
        'OTHER_ICON',
        'OTHER_TEXT',
        'SELECT_ICON',
        'PRICE_REF_ICON',
        'ENABLE_ICON',
    );

    /**
     * ReportLibrary constructor.
     */
    public function __construct()
    {

        $this->_CI = &get_instance();
    }

    /**
     * @param array $resultSetObject
     * @param $reportColumnsKey
     * @param null $obj
     * @return array
     * @throws Exception
     */
    public function makeReportColumns(array $resultSetObject, $reportColumnsKey, $obj = null)
    {

        $dataArray = $resultSetObject['resultSet'];

        $tableResponse = array();

        $tableResponse['iTotalRecords'] = empty($resultSetObject['foundRows']) ? 0 : $resultSetObject['foundRows'];

        $tableResponse['iTotalDisplayRecords'] = empty($resultSetObject['foundRows']) ? 0 : $resultSetObject['foundRows'];

        $tableResponse['aaData'] = array();

        $reportColumns = $this->getReportColumns($reportColumnsKey);

        if (count($dataArray) > 0 && count($reportColumns) > 0) {

            foreach ($dataArray as $data) {

                $tmp = array();

                foreach ($reportColumns as $key => $valueArr) {

                    $align_div = array();
                    $align_div['start'] = '';
                    $align_div['end'] = '';

                    if (array_key_exists('align', $valueArr) && !empty($valueArr['align'])) {
                        $align_div = $this->_setCellAlign($valueArr, $align_div);
                    }

                    $field = empty($valueArr['jsonField']) ? '' : $valueArr['jsonField'];

                    if (array_key_exists('isLink', $valueArr) == TRUE && $valueArr['isLink'] == TRUE) {
                        $tmp[] = $this->_isLink($data, $valueArr, $align_div, $field);
                    } elseif (array_key_exists('isImage', $valueArr) == TRUE && $valueArr['isImage'] == TRUE) {
                        $tmp[] = $this->_isImage($data, $valueArr, $align_div, $field);
                    } elseif (array_key_exists('isExtURL', $valueArr) == TRUE && $valueArr['isExtURL'] == TRUE) {
                        $tmp[] = $this->_isExtURL($data, $valueArr, $align_div, $field);
                    } else {
                        $tmp[] = $align_div['start'] . $this->_parseField($valueArr, $data, $field) . $align_div['end'];
                    }
                }

                $tableResponse['aaData'][] = $tmp;
            }
        }

        return $tableResponse;
    }

    /**
     * Returns columns used in report
     * This function has limitation that all report columns should be in report_config.php file.
     * Name of index should be of type Coulomb_report_<report_name>_Columns.
     *
     * @method getReportColumn
     * @access Public
     *
     * @param reportName String madatory Name of report for which columns are to be fetched
     * @return Array of Coulmns
     */
    public function getReportColumns($reportName = null)
    {

        $this->_CI->load->config('report_config_default');

        $reportColumns = $this->_CI->config->item($reportName);

        if (empty($reportColumns)) {
            Throw New Exception();
        } else {
            return $reportColumns;
        }
    }

    public function _setCellAlign($valueArr, $align_div)
    {
        $align_div['start'] = '<div align="' . $valueArr['align'] . '">';
        $align_div['end'] = '</div>';
        return $align_div;
    }

    public function _isLink($data, $valueArr, $align_div, $field)
    {
        $paramString = '';
        $paramArray = '';
        $propertyString = '';
        $attrArray = '';

        if (array_key_exists('linkTarget', $valueArr) && !empty($valueArr['linkTarget'])) {

            if (!empty($valueArr['linkAtts'])) {

                foreach ($valueArr['linkAtts'] as $property => $propertyValue) {

                    if (!empty($propertyValue['type']) && $propertyValue['type'] = 'dynamic') {

                        $tmpValue = $data->{$propertyValue['field']};
                    } else {

                        $tmpValue = $propertyValue['value'];
                    }

                    $attrArray[$property] = $tmpValue;
                    $propertyString .= "$property='$tmpValue' ";
                }
            }

            if (array_key_exists('linkParams', $valueArr) && !empty($valueArr['linkParams'])) {

                $tmpArray = array();

                if (!empty($valueArr['type']) && is_array($valueArr['type']) && is_array($valueArr['linkParams'])) {
                    foreach ($valueArr['type'] as $varTypeName => $varTypeValueField) {

                        $paramArray[$varTypeValueField] = $data->$valueArr['linkParams'][$varTypeValueField];
                    }
                } else {
                    foreach ($valueArr['linkParams'] as $varName => $varValueField) {

                        $tmpArray[] = $data->$varValueField;
                    }
                    $paramString = implode('/', $tmpArray);
                }
            }

            if (array_key_exists('buildhttpquery', $valueArr) && !empty($valueArr['buildhttpquery'])) {
                $tmpArray = (array)$data;
                $httpquery = http_build_query($tmpArray);
                $paramString = '?' . $httpquery;
            }

            $additionalInlineJs = NULL;

            if (array_key_exists('systemDefaults', $valueArr) && !empty($valueArr['systemDefaults'])) {

                if (!empty($valueArr['type'])
                    && ((is_array($valueArr['type']) && !empty(array_intersect($valueArr['type'], $this->_systemOperations)))
                        || in_array(strtoupper($valueArr['type']), $this->_systemOperations))
                ) {
                    if (is_array($valueArr['type'])) {
                        foreach ($valueArr['type'] as $tk => $tval) {
                            if (($tval == 'DELETE' || $tval == 'DELETE_ICON')) {
                                $additionalInlineJs[$tval] = "onClick=\"javascript:return confirm('Are you sure you want to delete?')\"";
                            } elseif (($tval == 'ENABLE_ICON')) {
                                $icon_type = $attrArray['data-status'] == '1' ? 'ENABLE_ICON' : 'DISABLE_ICON';
                                $tmp_icon['override'] = $icon_type;
                                $enable_disable_jsfunc = $tval == $icon_type ? 'disable_comment(this, ' . $data->id . ');' : 'enable_comment(this, ' . $data->id . ');';
                                $additionalInlineJs[$tval] = "onClick=\"javascript:return " . $enable_disable_jsfunc . "\"";
                            }
                            $tmp_icon['type'] = $tval;
                            $linkCaption[$tval] = $this->_parseLinkCaption($tmp_icon);
                        }
                    } else {
                        if (($valueArr['type'] == 'DELETE' || $valueArr['type'] == 'DELETE_ICON') && !empty($valueArr['confirmBox'])) {
                            $additionalInlineJs = "onClick=\"javascript:return confirm('Are you sure you want to delete?')\"";
                        }
                        $linkCaption = $this->_parseLinkCaption($valueArr);
                    }
                } else {

                    Throw New Exception('Something weird happened.');
                }
            } else {

                $linkCaption = $align_div['start'] . $data->$field . $align_div['end'];
            }
            $tmp = '';
            if (is_array($linkCaption)) {
                $tmp .= $align_div['start'];
                foreach ($linkCaption as $lk => $lval) {
                    $tmp .= "<a " . (empty($additionalInlineJs[$lk]) ? null : $additionalInlineJs[$lk]) . " href=\"" . base_url(sprintf($valueArr['linkTarget'][$lk], $paramArray[$lk])) . "\" $propertyString>" . $lval . "</a>";
                }
                $tmp .= $align_div['end'];
            } else {
                $tmp = $align_div['start'] . "<a $additionalInlineJs href=\"" . base_url(sprintf($valueArr['linkTarget'], $paramString)) . "\" $propertyString>" . $linkCaption . "</a>" . $align_div['end'];
            }
        } else {

            $tmp = $align_div['start'] . $data->$field . $align_div['end'];
        }
        return $tmp;
    }

    /**
     * @param $valueArr
     * @return string
     * @throws Exception
     */
    private function _parseLinkCaption($valueArr)
    {
        $operation = $valueArr['type'];

        switch ($operation) {
            case 'VIEW':

                $return = 'VIEW';

                // later we will get values from lang

                break;

            case 'VIEW_ICON':

                $return = "<img src='" . base_url() . "static/images/admin/icons/preview.png' title='View'>";

                // later we will get values from lang

                break;

            case 'EDIT':

                $return = 'EDIT';

                // later we will get values from lang

                break;

            case 'EDIT_ICON':

                $return = "<i class=\"fa fa-edit\"></i>&nbsp;";

                // later we will get values from lang

                break;

            case 'DELETE':

                $return = 'DELETE';

                // later we will get values from lang

                break;

            case 'DELETE_ICON':

                $return = "<i class=\"fa fa-remove\"></i>&nbsp;";

                // later we will get values from lang

                break;

            case 'ENABLE_ICON':

                if (!empty($valueArr['override']) && ($valueArr['override'] == 'DISABLE_ICON')) {
                    $return = "<i class=\"fa fa-toggle-off \"></i>&nbsp;";
                } else {
                    $return = "<i class=\"fa fa-toggle-on \"></i>&nbsp;";
                }
                break;

            case 'OTHER_ICON':

                if (empty($valueArr['iconPath'])) {

                    Throw New Exception('Icon path was not found');
                }

                $title = empty($valueArr['titleText']) ? '' : "title = '{$valueArr['titleText']}'";

                $return = "<img src='" . base_url() . "{$valueArr['iconPath']}' $title>";

                break;

            case 'OTHER_TEXT':

                if (empty($valueArr['otherText'])) {

                    Throw New Exception('Link text missing');
                }

                $return = $valueArr['otherText'];

                break;
        }

        return $return;
    }

    public function _isImage($data, $valueArr, $align_div, $field)
    {
        if ($data->$field != 'No Data' && !empty($data->$field)) {

            $tmp[] = $align_div['start'] . '<img src="http://' . $data->$field . '" style="height:100px; width:100px;" />' . $align_div['end'];
        } else {
            $tmp[] = $align_div['start'] . 'No Image Found' . $align_div['end'];
        }
        return $tmp;
    }

    public function _isExtURL($data, $valueArr, $align_div, $field)
    {
        if ($data->$field != 'No Data') {
            $external_url = preg_replace('#^https?://#', '', $data->$field);
            $external_url = 'http://' . $external_url;
            $tmp[] = $align_div['start'] . '<a href="' . $external_url . '" target="_blank" >LINK</a>' . $align_div['end'];
        } else {
            $tmp[] = $align_div['start'] . 'No Link Found' . $align_div['end'];
        }
        return $tmp;
    }

    /**
     * @param $configArr
     * @param $objectRow
     * @param $fieldName
     * @return mixed
     */
    private function _parseField($configArr, $objectRow, $fieldName)
    {

        //p('$fieldName='.$fieldName, 0);

        $fieldValue = $objectRow->$fieldName;

        $return = $fieldValue;

        if (!empty($configArr['callBack']) && !empty($configArr['callBackType']) && !empty($configArr['callBackClass']) && !empty($configArr['callBackFunction'])) {

            $triggerCallback = true;

            $class = strtolower($configArr['callBackClass']);

            $function = $configArr['callBackFunction'];

            switch ($configArr['callBackType']) {
                case 'library':
                case 'model':

                    $callBackType = $configArr['callBackType'];

                    $this->_CI->load->$callBackType($class);

                    break;

                default:

                    $triggerCallback = false;
            }

            //@TODO - Static methods ? is_callable implementation is to be done

            $return = $triggerCallback === true ? $this->_CI->$class->$function($fieldValue, $objectRow) : $fieldValue;
        }

        return $return;
    }

    /**
     * @param $configIndex
     * @param $config
     * @return mixed
     * @throws Exception
     */
    public function makeTable($configIndex, $config)
    {
        $columns = array_flip(lang($configIndex));

        $arrayWidth = $this->fetchWidthArr($configIndex);
        $jsonSortable = $this->fetchSortableArr($configIndex);

        $this->_CI->load->library('Table');

        $tableId = uniqid();

        if (isset($config['source'])) {
            //$open = '<table jsonInfo="'.$jsonSortable.'" id="'.$tableId.'" class="dyntable" source="' . $config['source'] . '" width="100%">';
            $open = "<table jsonInfo='$jsonSortable' id='$tableId' class='dyntable table table-striped table-advance table-hover display dataTable' source='{$config['source']}' width='100%'>";
        } else {
            $open = '<table id="' . $tableId . '" class="dyntable" width="100%">';
        }

        $tmpl = array("table_open" => $open, "tfoot_open" => "<tfoot>", "footer_row_start" => "<tr>", "footer_cell_start" => "<td>", "footer_cell_end" => "</td>", "footer_row_end" => "</tr>", "tfoot_close" => "</tfoot>");

        $this->_CI->table->set_template($tmpl);

        if (!empty($arrayWidth) && is_array($arrayWidth)) {
            $this->_CI->table->widths = $arrayWidth;
        }

        $this->_CI->table->set_heading(array_keys($columns));
        $i = 0;

        return $this->_CI->table->generate($tableId);
    }

    /**
     * @param null $reportName
     * @return array
     * @throws Exception
     */
    public function fetchWidthArr($reportName = null)
    {
        $this->_CI->load->config('report_config_default');

        $reportColumns = $this->_CI->config->item($reportName);

        if (empty($reportColumns)) {
            Throw New Exception();
        }

        $widthArr = array();

        foreach ($reportColumns as $key => $arr) {
            if (!empty($arr['width'])) {
                $widthArr[] = $arr['width'];
            }
        }

        return $widthArr;
    }

    /**
     * @param null $reportName
     * @return string
     * @throws Exception
     */
    public function fetchSortableArr($reportName = null)
    {
        $this->_CI->load->config('report_config_default');

        $reportColumns = $this->_CI->config->item($reportName);

        if (empty($reportColumns)) {
            Throw New Exception();
        }

        $sortableArr = array();

        foreach ($reportColumns as $key => $arr) {
            if (array_key_exists('isSortable', $arr)) {
                $flag = $arr['isSortable'] == TRUE ? TRUE : FALSE;
            } else {
                $flag = TRUE;
            }

            array_push($sortableArr, array('bSortable' => $flag));
        }
        return json_encode($sortableArr);
    }

    /**
     * Get paging parameters from GET/config vars.
     *
     * Creates an array of four elements that we can use to send paging/sorting parameter to BL.
     *
     * @param array $sortColumns is an array of grid columns that can be used for sorting.
     *
     * @return array contaning the following elements.
     *
     * offset
     * records_per_page
     * order_by
     * order_direction
     *
     */
    public function getPagingParams(array $sortColumns)
    {
        $sortColumns = array_values($sortColumns);

        $sortColIndex = $this->_CI->input->get("iSortCol_0");

        $sort = null;
        $order = null;

        if (!empty($sortColumns[$sortColIndex])) {
            $sort = $sortColumns[$sortColIndex];
            $order = $this->_CI->input->get("sSortDir_0");
        }

        $pagingParams = array();
        $pagingParams['order_by'] = $sort;
        $pagingParams['order_direction'] = $order;

        // Get start counter of the records to be displayed.
        $offset = $this->_CI->input->get('iDisplayStart');
        $pagingParams['offset'] = intval($offset);

        $search = $this->_CI->input->get('sSearch');
        $pagingParams['search'] = $search;

        //$records_per_page = $this->_CI->config->item('records_per_page');
        $records_per_page = $this->_CI->input->get('iDisplayLength');
        $pagingParams['records_per_page'] = $records_per_page;
        return $pagingParams;
    }
}
