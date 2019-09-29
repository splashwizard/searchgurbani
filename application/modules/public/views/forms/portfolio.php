<style>

    body {

        background-color: #FFF8ED;

        font-family: Helvetica, Arial, sans-serif;

        margin: 0;

    }

    h1 {

        border-bottom: 1px solid #E0E0E0;

        font-size: 18px;

        font-weight: bold;

        margin-bottom: 6px;

        padding-bottom: 7px;

    }

    .right a {

        background-color: #000000;

        color: #FFFFFF;

        font-size: 11px;

        font-weight: bold;

        line-height: 24px;

        padding: 2px 6px;

        margin: 0 0 0 105px;

        text-decoration: none;

    }

    #header {

        font-size: 20px;

        padding: 6px 0 7px 10px;

        text-align: center;

        width: 98%;

    }

    #wrapper {

        margin: 10px;

        min-height: 260px;

        padding: 0;

        width: 95%;

    }

    #wrapper ul {

        -moz-border-radius: 10px 10px 10px 10px;

        background-color: #FFFFFF;

        border: 1px solid #E0E0E0;

        padding: 0;

        margin: 0;

    }

    #wrapper ul li:last-child {

        border-bottom: medium none;

    }

    #wrapper ul li {

        border-bottom: 1px solid #E0E0E0;

        display: block;

        font-size: 16px;

        font-family: Helvetica, Arial, sans-serif;

        font-weight: bold;

        list-style: none outside none;

        padding: 0;

        width: 94%;

    }

    #wrapper ul li a {

        background: url(http://ci2.searchgurbani.com/Mobile/images/arrow.png) no-repeat scroll right center transparent;

        margin: 0 10px 0 0;

        line-height: 24px;

        text-decoration: none;

        padding: 8px 35px 8px 10px;

        color: #000000;

        display: block;

        font-weight: bold;

        line-height: 24px;

        width: auto;

    }

    .content {

        -moz-border-radius: 10px 10px 10px 10px;

        background-color: #FFFFFF;

        border: 1px solid #E0E0E0;

        line-height: 17px;

        margin-bottom: 4px;

        padding: 15px 10px;

        width: 95%;

    }

    .info {
        color: red;
        padding-bottom: 5px;
    }


</style>

<body>

<?php /*?><div id="header"><img alt="Search Gurbani" src="Mobile/images/logo.jpg"></div><?php */ ?>

<div id="wrapper">

    <div class="content">

        <?php

        global $SG_SearchTypes, $SG_SearchLanguage, $SG_ScriptureTypes;


        $sess_search_parameters = $this->session->userdata('search_parameters');


        //print_r($sess_search_parameters);exit;

        $msg = '';

        if ($this->session->flashdata("response") != "") {

            $msg = $this->session->flashdata("response");

        }


        ?>

        <!-- Start of Individual Search Form -->

        <?php /*?>	<h2><strong>Advanced Search <?php echo $SG_ScriptureTypes[$scripture][1]; ?></strong></h2><br /><?php */ ?>

        <h1>SGGS Search<span class="right"><a onClick="switchPage('extra0', 'index')"
                                              href="http://ci2.searchgurbani.com/scriptures/main_mob">back</a></span>
        </h1>

        <?php echo $msg; ?>

        <link rel="stylesheet" href="<?php echo base_url(); ?>styles/jquery.autocomplete.css" type="text/css"/>

        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.bgiframe.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.dimensions.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.autocomplete.js"></script>

        <script>

            $(document).ready(function () {

                $("#SearchData").autocomplete('<?php echo site_url('ajax/get_words');?>', {

                    extraParams: {

                        language: function () {
                            return $("#language").val();
                        }

                    }

                });

            });

        </script>

        <style>

            .data_in {
                float: left;
                width: 175px;
                font-size: 14px;
            }

            .data_in select {
                width: 175px;
                float: left;
            }

            select {
                width: 175px;
                float: left;
            }

        </style>

        <script type="text/javascript" src="<?php echo base_url(); ?>scripts/validator.js"></script>

        <form action="<?php echo site_url("scriptures/portfolio"); ?>" method="post" name="search_home"
              id="search_home">

            <div class="search_panel">

                <table border="0" cellpadding="5" cellspacing="0" width="80%">

                    <tr>

                        <td rowspan="2" align="center" bgcolor="#CAB99D" style="vertical-align:top;"><strong>Find
                                results</strong></td>

                        <td>

                            <div style="float:left; width:100px; font-size:14px;">

                                Find results with text

                            </div>

                            <div style="float:left; width:100px; font-size:14px;">

                                <input type="hidden" name="individual_search" id="individual_search" value="1"/>

                                <input type="hidden" name="scripture" id="scripture" value="<?php echo $scripture; ?>"/>

                                <input type="hidden" name="<?php echo $scripture; ?>" id="<?php echo $scripture; ?>"
                                       value="1"/>

                                <input type="text" size="25"
                                       value="<?php echo $sess_search_parameters['search_text']; ?>" name="SearchData"
                                       id="SearchData" autocomplete="off"/>

                                <input type="submit" value="Search" name="SubmitSearch" id="SubmitSearch"
                                       class="button"/>

                            </div>

                        </td>

                    </tr>

                    <tr>


                        <td>

                            <div style="float:left; width:100px; font-size:14px;">

                                Return results

                            </div>

                            <div style="float:left; width:100px; font-size:14px;">

                                <?php

                                echo form_dropdown('Searchtype', $SG_SearchTypes, $sess_search_parameters['search_type']);

                                ?>

                                <input type="checkbox"
                                       name="case" <?php echo $sess_search_parameters['search_case_sensitive'] == "on" ? " checked='checked'" : ""; ?>
                                       value="on"/>

                                Case Sensitive

                            </div>

                        </td>

                    </tr>

                    <tr>

                        <td align="center" bgcolor="#CAB99D"><strong>Language</strong></td>

                        <td>

                            <div style="float:left; width:100px; font-size:14px;">

                                Find results in language

                            </div>

                            <div style="float:left; width:100px; font-size:14px;">

                                <?php

                                $js = ' onChange="change_keypad(this.value);" id="language"';

                                echo form_dropdown('language', $SG_SearchLanguage, $sess_search_parameters['search_language'], $js);

                                ?>

                            </div>

                        </td>

                    </tr>

                    <?php

                    if ($SG_ScriptureTypes[$scripture]['author'] == true) {

                        ?>

                        <tr>

                            <td align="center" bgcolor="#CAB99D"><strong>Author</strong></td>

                            <td>

                                <div style="float:left; width:100px; font-size:14px;">

                                    Find results from text written by

                                </div>

                                <div style="float:left; width:100px; font-size:14px;">

                                    <?php

                                    echo form_dropdown('author', $authors, $sess_search_parameters['search_author']);

                                    ?>

                                </div>

                            </td>

                        </tr>

                        <?php

                    }

                    if ($SG_ScriptureTypes[$scripture]['raag'] == true) {

                        ?>

                        <tr>

                            <td align="center" bgcolor="#CAB99D"><strong>Raag</strong></td>

                            <td>

                                <div style="float:left; width:100px; font-size:14px;">

                                    Find results from text related to raag

                                </div>

                                <div class="data_in">

                                    <?php

                                    echo form_dropdown('raag', $raags, $sess_search_parameters['search_raag']);

                                    ?>

                                </div>

                            </td>

                        </tr>

                        <?php

                    }

                    ?>

                    <tr>

                        <td align="center" bgcolor="#CAB99D">
                            <strong><?php echo ucwords($SG_ScriptureTypes[$scripture]['page_name'] . "s"); ?></strong>
                        </td>

                        <td>

                            <div style="float:left; font-size:14px; width:115px;">Find results
                                from <?php echo $SG_ScriptureTypes[$scripture]['page_name']; ?> between

                            </div>

                            <div style="float:left; width:60px; font-size:14px;">

                                <input type="text" size="5"
                                       value="<?php echo $SG_ScriptureTypes[$scripture]['page_from']; ?>"
                                       name="page_from" id="page_from"/>

                                and

                                <input type="text" size="5"
                                       value="<?php echo $SG_ScriptureTypes[$scripture]['page_to']; ?>" name="page_to"
                                       id="page_to"/>

                            </div>

                        </td>

                    </tr>

                </table>
            </div>

        </form>

        <br/>


        <div
            id="key_pad_punjabi"<?php echo $sess_search_parameters['search_language'] == "punjabi" ? '' : ' style="display:none;"'; ?>><?php $this->load->view('keypads/punjabi'); ?> </div>

        <div
            id="key_pad_hindi"<?php echo $sess_search_parameters['search_language'] == "hindi" ? '' : ' style="display:none;"'; ?>><?php $this->load->view('keypads/hindi'); ?> </div>


        <script type="text/javascript">


            var frm = new Validator("search_home");


            frm.addValidation("SearchData", "req", "Please enter any keyword to proceed the search");

            frm.setAddnlValidationFunction("search_form_validation");

            function search_form_validation() {

                if (document.getElementById('ggs').checked == false && document.getElementById('ak').checked == false && document.getElementById('bgv').checked == false && document.getElementById('dg').checked == false && document.getElementById('ks').checked == false) {

                    alert('Please select any book to search');

                    return false;

                }

                else {

                    return true;

                }

            }


            function change_keypad(language) {

                switch (language) {

                    case 'hindi':

                        document.getElementById('key_pad_punjabi').style.display = 'none';

                        document.getElementById('key_pad_hindi').style.display = 'block';

                        document.getElementById("SearchData").value = "";

                        break;

                    case 'punjabi':

                        document.getElementById('key_pad_punjabi').style.display = 'block';

                        document.getElementById('key_pad_hindi').style.display = 'none';

                        document.getElementById("SearchData").value = "";

                        break;

                    default:

                        document.getElementById('key_pad_punjabi').style.display = 'none';

                        document.getElementById('key_pad_hindi').style.display = 'none';

                        document.getElementById("SearchData").value = "";

                        break;

                }

            }


            function pad(char) {

                document.getElementById("SearchData").value += char;

                $("#SearchData").focus();

                $("#SearchData").trigger('forceFill');

            }


        </script>


        <!-- End of Individual Search Form -->

    </div>

</div>

</body>