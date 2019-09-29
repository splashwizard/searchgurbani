<?php
    global $SG_SearchTypes, $SG_SearchLanguage, $SG_ScriptureTypes;

    $sess_search_parameters = $this->session->userdata('search_parameters');

    $msg = '';
    if ($this->session->flashdata("response") != "")
    {
        $msg = $this->session->flashdata("response");
    }
?>
<!-- Start of Individual Search Form -->

<link rel="stylesheet"
      href="<?php echo base_url(); ?>static/css/typeahead.autocomplete.css"
      type="text/css"/>

<div class="page-content">
    <div class="container-fluid">
        <h4 class="top-heading bold no-top">
            Advanced
            Search <?php echo $msg; ?></h4>

        <div class="search_panel">
            <div class="hidden-xs">
                <!-- form for large screens -->
                <form id="search_gurbanis_frm"
                      action="<?php echo site_url("public/scriptures/search_results_preview"); ?>"
                      method="post"
                      name="search_home"
                      id="search_gurbanis_frm">
                    <input type="hidden"
                           name="individual_search"
                           id="individual_search"
                           value="1"/>
                    <input type="hidden"
                           name="scripture"
                           id="scripture"
                           value="<?php echo $scripture; ?>"/>
                    <input type="hidden"
                           name="<?php echo $scripture; ?>"
                           id="<?php echo $scripture; ?>"
                           value="1"/>
                    <input type="hidden"
                           name="pageID"
                           id="searchPageID"/>
                    <div class="row">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <ul class="column-1">
                                <li class="">
                                    &nbsp
                                </li>
                                <li class="bold">
                                    Find results
                                </li>
                                <li class="">
                                    &nbsp
                                </li>
                                <li class="">
                                    &nbsp
                                </li>
                                <li class="bold">
                                    Language
                                </li>
                                <?php if ($SG_ScriptureTypes[$scripture]['author'] == TRUE)
                                { ?>
                                    <li class="bold">
                                        Author
                                    </li>
                                <?php } ?>
                                <?php if ($SG_ScriptureTypes[$scripture]['raag'] == TRUE)
                                { ?>
                                    <li class="bold">
                                        Raag
                                    </li>
                                <?php } ?>
                                <?php if ($SG_ScriptureTypes[$scripture][0] == 'bnl')
                                { ?>
                                    <li class="bold">
                                        Categories
                                    </li>
                                <?php } ?>
                                <li class="bold"><?php echo ucwords($SG_ScriptureTypes[$scripture]['page_name'] . "s"); ?></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <ul class="column-2">
                                <li class=""><p>
                                        Find
                                        results
                                        with
                                        text</p>
                                </li>
                                <li class="">
                                    &nbsp
                                </li>
                                <li class="">
                                    &nbsp
                                </li>
                                <li class=""><p>
                                        Return
                                        results</p>
                                </li>
                                <li class=""><p>
                                        Find
                                        results in
                                        language</p>
                                </li>
                                <?php if ($SG_ScriptureTypes[$scripture]['author'] == TRUE)
                                { ?>
                                    <li class="">
                                        <p>Find
                                            results
                                            from
                                            text
                                            written
                                            by</p>
                                    </li>
                                <?php } ?>
                                <?php if ($SG_ScriptureTypes[$scripture]['raag'] == TRUE)
                                { ?>
                                    <li class="">
                                        <p>Find
                                            results
                                            from
                                            text
                                            related
                                            to
                                            raag</p>
                                    </li>
                                <?php } ?>
                                <?php if ($SG_ScriptureTypes[$scripture][0] == 'bnl')
                                { ?>
                                    <li class="">
                                        <p>Search
                                            from</p>
                                    </li>
                                <?php } ?>
                                <li class=""><p>
                                        Find
                                        results
                                        from <?php echo $SG_ScriptureTypes[$scripture]['page_name']; ?>
                                        between</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-8">
                            <ul class="column-3">
                                <li>
                                    <input size="25"
                                           value="<?php echo $sess_search_parameters['search_text']; ?>"
                                           name="SearchData"
                                           id="SearchData"
                                           autocomplete="off"
                                           class="tt-input form-control search-input"
                                           spellcheck="false"
                                           dir="auto"
                                           style="position: relative; vertical-align: top; background-color: #fff;"
                                           type="text">
                                    <!--                                    <object class="typeahead-loader" data="-->
                                    <?php //echo base_url('images/loader.svg') ?><!--"-->
                                    <!--                                            type="image/svg+xml"-->
                                    <!--                                            style="left: 192px; top: 6px; position: absolute; width: 18px;vertical-align: middle; display: none;">-->
                                    <!--                                        <img class="typeahead-loader" src="-->
                                    <?php //echo base_url('images/loading.gif') ?><!--"-->
                                    <!--                                             style="left: 192px; top: 6px; position: absolute; width: 18px;vertical-align: middle; display: none;"/>-->
                                    <!--                                    </object>-->
                                </li>
                                <li><br><br>
                                    <input type="submit"
                                           value="Search"
                                           name="SubmitSearch"
                                           id="SubmitSearch"
                                           class="button"/>
                                </li>
                                <li>
                                    <?php echo form_dropdown('Searchtype', $SG_SearchTypes, $sess_search_parameters['search_type'], 'id="Searchtype"'); ?>
                                </li>
                                <li></li>
                                <li>
                                    <?php
                                        $js = ' onChange="change_keypad(this.value);" id="language"';
                                        echo form_dropdown('language', $SG_SearchLanguage, $sess_search_parameters['search_language'], $js);
                                    ?>
                                </li>
                                <?php
                                    if ($SG_ScriptureTypes[$scripture]['author'] == TRUE)
                                    {
                                        ?>

                                        <li>
                                            <?php
                                                echo '<select name="author" ID="author">';
                                                echo '<option value="">Any Author</option> ';
                                                foreach ($authors->result() as $author)
                                                {
                                                    echo '<option value=' . $author->ID . '>' . $author->author . '</option>';
                                                }
                                                echo '</select>';
                                            ?>
                                        </li>
                                        <?php
                                    }
                                    if ($SG_ScriptureTypes[$scripture]['raag'] == TRUE)
                                    {
                                        ?>
                                        <li>
                                            <?php
                                                echo '<select name="raag" id="raag">';
                                                echo '<option value="">Any Raag</option> ';
                                                foreach ($raags->result() as $raag)
                                                {
                                                    echo '<option value=' . $raag->id . '>' . $raag->name . '</option>';
                                                }
                                                echo '</select>';
                                            ?>
                                        </li>
                                        <?php
                                    }
                                    if ($SG_ScriptureTypes[$scripture][0] == 'bnl')
                                    {
                                        ?>
                                        <li>
                                            <?php
                                                echo '<select name="bnlSelect" id="bnlSelect">';
                                                echo '<option value="">All Categories</option>';
                                                foreach ($bnlSelect->result() as $bnlname)
                                                {
                                                    echo '<option value = ' . str_replace(" ", "_", $bnlname->name) . '>' . $bnlname->name . '</option >';
                                                }
                                                echo '</select>';
                                            ?>

                                        </li>
                                        <?php
                                    }
                                ?>
                                <li></li>
                                <li>
                                    <input size="5"
                                           value="<?php echo $SG_ScriptureTypes[$scripture]['page_from']; ?>"
                                           name="page_from"
                                           id="page_from"
                                           type="text">
                                    and
                                    <input size="5"
                                           value="<?php echo $SG_ScriptureTypes[$scripture]['page_to']; ?>"
                                           name="page_to"
                                           id="page_to"
                                           type="text">
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="hidden-lg hidden-md hidden-sm table-responsive">
                <!-- form for small screens -->
                <form id="search_gurbanis_frm"
                      action="<?php echo site_url("public/scriptures/search_results_preview"); ?>"
                      method="post"
                      name="search_home"
                      id="search_gurbanis_frm">
                    <input type="hidden"
                           name="individual_search"
                           id="individual_search"
                           value="1"/>
                    <input type="hidden"
                           name="scripture"
                           id="scripture"
                           value="<?php echo $scripture; ?>"/>
                    <input type="hidden"
                           name="<?php echo $scripture; ?>"
                           id="<?php echo $scripture; ?>"
                           value="1"/>
                    <input type="hidden"
                           name="pageID"
                           id="searchPageID"/>
                    <table width="100%"
                           cellspacing="5"
                           cellpadding="10"
                           border="0"
                           class="table">
                        <tbody>
                        <tr>
                            <td>Find results with
                                text
                            </td>
                            <td>
                                <input size="25"
                                       value="<?php echo $sess_search_parameters['search_text']; ?>"
                                       name="SearchData"
                                       id="SearchData"
                                       autocomplete="off"
                                       class="tt-input"
                                       spellcheck="false"
                                       dir="auto"
                                       style="position: relative; vertical-align: top; background-color: #fff;"
                                       type="text">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>

                                <input value="Search"
                                       name="SubmitSearch"
                                       id="SubmitSearch"
                                       class="button"
                                       type="submit">
                            </td>

                        </tr>
                        <tr>
                            <td>Return results
                            </td>
                            <td><?php echo form_dropdown('Searchtype', $SG_SearchTypes, $sess_search_parameters['search_type'], 'id="Searchtype"'); ?>
                            </td>
                        </tr>
                        <tr>

                            <td>Find results in
                                language
                            </td>
                            <td><?php
                                    $js = ' onChange="change_keypad(this.value);" id="language"';
                                    echo form_dropdown('language', $SG_SearchLanguage, $sess_search_parameters['search_language'], $js);
                                ?>
                            </td>
                        </tr>

                        <?php
                            if ($SG_ScriptureTypes[$scripture]['author'] == TRUE)
                            {
                                ?>

                                <tr>
                                    <td>Find
                                        results
                                        from text
                                        written by
                                    </td>
                                    <td>
                                        <?php
                                            echo '<select name="author" ID="author">';
                                            echo '<option value="">Any Author</option> ';
                                            foreach ($authors->result() as $author)
                                            {
                                                echo '<option value=' . $author->ID . '>' . $author->author . '</option>';
                                            }
                                            echo '</select>';
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            if ($SG_ScriptureTypes[$scripture]['raag'] == TRUE)
                            {
                                ?>
                                <tr>
                                    <td>Find
                                        results
                                        from text
                                        related to
                                        raag
                                    </td>
                                    <td>
                                        <?php
                                            echo '<select name="raag" id="raag">';
                                            echo '<option value="">Any Raag</option> ';
                                            foreach ($raags->result() as $raag)
                                            {
                                                echo '<option value=' . $raag->id . '>' . $raag->name . '</option>';
                                            }
                                            echo '</select>';
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            if ($SG_ScriptureTypes[$scripture][0] == 'bnl')
                            {
                                ?>
                                <tr>
                                    <td>Search
                                        from
                                    </td>
                                    <td>
                                        <?php
                                            echo '<select name="bnlSelect" id="bnlSelect">';
                                            echo '<option value="">All Categories</option>';
                                            foreach ($bnlSelect->result() as $bnlname)
                                            {
                                                echo '<option value = ' . str_replace(" ", "_", $bnlname->name) . '>' . $bnlname->name . '</option >';
                                            }
                                            echo '</select>';
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>

                        <tr>

                            <td>Find results from
                                page between
                            </td>
                            <td><input size="5"
                                       value="<?php echo $SG_ScriptureTypes[$scripture]['page_from']; ?>"
                                       name="page_from"
                                       id="page_from"
                                       type="text">
                                and
                                <input size="5"
                                       value="<?php echo $SG_ScriptureTypes[$scripture]['page_to']; ?>"
                                       name="page_to"
                                       id="page_to"
                                       type="text">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div><!-- .page-content ends -->

<div
        id="key_pad_punjabi"<?php echo $sess_search_parameters['search_language'] == "PUNJABI" ? '' : ' style="display:none;"'; ?>><?php echo $this->load->viewPartial('keypads/punjabi'); ?> </div>
<div
        id="key_pad_hindi"<?php echo $sess_search_parameters['search_language'] == "hindi" ? '' : ' style="display:none;"'; ?>><?php echo $this->load->viewPartial('keypads/hindi'); ?> </div>

<!-- End of Individual Search Form -->

<script type="text/javascript"
        src="<?php echo base_url(); ?>static/js/jquery.bgiframe.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>static/js/jquery.dimensions.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>static/js/auto-complete/typeahead.bundle.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>static/js/auto-complete/bloodhound.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>static/js/auto-complete/individual-auto-complete.js"></script>