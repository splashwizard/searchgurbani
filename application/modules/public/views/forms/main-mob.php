<html>
<head>
    <style>

        body {

            background-color: #FFF8ED;

            font-family: Helvetica, Arial, sans-serif;

            margin: 0;

        }

        #header {

            font-size: 20px;

            padding: 6px 0 7px 10px;

            text-align: center;

            width: 98%;

        }

        #wrapper {

            margin: 10px;

            min-height: 90%;

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

            width: 100%;

        }

        #wrapper ul li a {

            background: url(<?php echo base_url(); ?>/Mobile/images/arrow.png) no-repeat scroll right center transparent;

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

    </style>
</head>


<body>

<div id="header"><img alt="Search Gurbani" src="/Mobile/images/logo.jpg"></div>

<div id="wrapper">


    <ul>

        <li><a href="<?php echo base_url(); ?>scriptures/search_form">Gurbani Search</a></li>

        <li><a href="<?php echo base_url(); ?>scriptures/sggs">SGGS</a></li>

        <li><a href="<?php echo base_url(); ?>scriptures/amrit-keertan">Amrit Keertan Index</a></li>
        <li><a href="<?php echo base_url(); ?>scriptures/setting">Preference </a></li>

        <li><a href="<?php echo base_url(); ?>scriptures/contactUs">Contact</a></li>

        <li><a href="http://www.searchgurbani.com/?normal_view=1">Normal website</a></li>

    </ul>

</div>
</body>
</html>