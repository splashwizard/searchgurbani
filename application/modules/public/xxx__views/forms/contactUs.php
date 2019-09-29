<script type="text/javascript" src="<?= base_url() ?>scripts/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>scripts/jquery.validate.js"></script>
<link href="<?= base_url() ?>Mobile/css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>
<div id="header"><img alt="Search Gurbani" src="/Mobile/images/logo.jpg"></div>
<script type="text/javascript">

    $(document).ready(function () {
        $("#contact_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            }
        });

    });

</script>
<?php

if ($this->session->userdata('checkmail') == 'true') {
    echo "Your message has been sent";
    $array_items = array('checkmail' => 'true');
    $this->session->unset_userdata($array_items);

} else if ($this->session->userdata('checkmail') == 'false') {
    echo "Please fill the form details correctly";
    //$this->session->unset_userdata('checkmail');
    $array_items = array('checkmail' => 'false');
    $this->session->unset_userdata($array_items);
}
?>
<style>
    .error1 {
        color: #FF0000;
        width: 100%;
        margin-bottom: 3px;
    }

    label {
        color: #5B5A5A;
        float: left;
        font-size: 12px;
        font-weight: bold;
        width: 100%;
    }

    input.button {
        -moz-border-radius: 5px 5px 5px 5px;
        background-color: #333333;
        color: #CCCCCC;
        font-size: 14px;
        font-weight: bold;
        padding: 10px;
        text-align: center;
        width: 265px;
    }
</style>
<div id="wrapper">
    <div class="content">
        <h1>
            Contact
            <span class="right">
					<a href="<?= base_url() ?>scriptures/">Home</a>
				</span>
        </h1>

        <p>Send us your feedback.</p>
        <form id="contact_form" name="contact_form" method="post" action="" style="width:300px;">
            <label for="name">Name*</label>
            <input type="text" name="name" size="20" value="" id="name" class="required">

            <label for="email">Email*</label>
            <input type="text" name="email" size="20" value="" id="email">

            <label for="website">Website*</label>
            <input type="text" name="website" size="20" value="" id="website" class="required">

            <label for="message">Message*</label>
            <textarea name="message" rows="5" id="message" class="required"></textarea>

            <input type="submit" name="send" value="Send" class="button" id="send" size="16">
        </form>
    </div>
</div>