<h2>Send us your valuable feedback</h2>
<div id="feedback">
    <?php
    echo "<div class='error'>" . validation_errors() . "</div>";
    if ($this->session->flashdata('response') != "")
        echo $this->session->flashdata('response');
    ?>
    <form action="<?php echo site_url('feedback/send'); ?>" method="post">
        <p>Name:
            <small>*</small>
            <br/>
            <input name="name" type="text" maxlength="30" value="<?php echo set_value('name'); ?>"/>
        </p>
        <p>Email ID:
            <small>*</small>
            <br/>
            <input name="emailid" type="text" maxlength="100" value="<?php echo set_value('emailid'); ?>"/>
        </p>
        <p>Subject:
            <small>*</small>
            <br>
            <select name="subject">
                <option value="Search Gurbani Feedback">Search Gurbani Feedback</option>
            </select>
        </p>
        <p>Message:
            <small>*</small>
            <br>
            <textarea name="message" cols="60" rows="4"
                      style="font-family:Tahoma,Arial; font-size:12px;"><?php echo set_value('message'); ?></textarea>
        </p>
        <p>Type the code you see on the image below:
            <small>*</small>
            <br>
            <?php
            //if(!isset($error)) { $error = ""; }
            //echo $this->recaptchalib->recaptcha_get_html(PUBLIC_KEY, $error); ?>
            <img src="<?php echo site_url('captcha'); ?>" align="absmiddle"/>
            <input name="verification_image" type="text" size="5" maxlength="6"></p>
        <p><label><input name="send_copy" type="checkbox" value="yes"> Send me a copy of this mail</label></p>
        <p>
            <input name="submit" type="submit" value="Send Message">
            <br>
            <small>* All fields are mandatory</small>
        </p>
    </form>
</div>