<style>

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

        text-decoration: none;

    }

    body {

        background-color: #FCF6E6;

        font-family: Helvetica, Arial, sans-serif;

        margin: 0;

        font-size: 13px;

    }

    #header {

        font-size: 20px;

        padding: 6px 0 7px 10px;

        text-align: center;

    }

    #wrapper_new {

        margin: 10px 0;

        min-height: 260px;

        padding: 0;

        width: 280px;

    }

    #wrapper {

        margin: 10px;
        padding: 0;
        width: 97%;

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

        width: 298px;

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
        width: 99%;

    }

    .content_inner {

        margin: 0 auto;
        padding: 0 10px 0 0;
        width: 100%;

    }


</style>

<body>

<?php /*?><div id="header"><img alt="Search Gurbani" src="Mobile/images/logo.jpg"></div><?php */ ?>

<div id="wrapper">

    <div class="content">

        <h1>Amrit Keertan<span class="right" style="float:right;"><a href="<?= base_url() ?>scriptures/"
                                                                     style="margin-right:10px;">Home</a></span></h1>

        <div class="content_inner">

            <!--http://ci2.searchgurbani.com/scriptures/amrit_keertan-->

            <div style="background-color:#fceaaa" align="center">

                <h2><strong>Amrit Keertan - Shabads</strong></h2>

                <p><span class="alpha">

		<?php


        foreach ($alphabets as $alphabet) {

            echo '

			<a href="' . site_url('scriptures/amrit-keertan/' . $alphabet) . '" class="">' . $alphabet . '</a>&nbsp;&nbsp;

			';

        }


        ?>

	  </span></p>

            </div>

            <br/>

            <div class="section_title">

                <span class="col_sl_no">No.</span>

                <span class="col_section_name">Shabad Title</span>

                <span class="col_page_no">Page No.</span><br class="clearer"/>

            </div>


            <?php


            $i = 1;

            $id = 0;

            if ($shabads != false) {

                foreach ($shabads->result() as $shabad) {

                    $id++;

                    $url_shabad_name = url_title($shabad->shabad_name, 'underscore', TRUE);

                    echo '

			<div class="section_line line row' . $i . '">

			  <span class="col_sl_no">' . $id . '</span>

			  <a href="' . site_url('scriptures/shabad/' . $shabad->shabad_id . '/' . $url_shabad_name) . '"><span class="col_section_name">' . $shabad->$shabad_field . '</span></a>

			  <a href="' . site_url('scriptures/page/' . $shabad->pageno) . '"><span class="col_page_no">' . $shabad->pageno . '</span></a>

			  <div class="clearer"></div>

			</div>

			';


                    $i = -$i;

                }

            } else {

                echo '

		<div class="section_line line row' . $i . '">

		  <span class="col_section_name">No shabads available</span>

		  <div class="clearer"></div>

		</div>

		';

            }


            ?>

        </div>
    </div>

</div>
</body>