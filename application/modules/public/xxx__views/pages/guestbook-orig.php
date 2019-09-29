<h2>Guestbook</h2>
<div id="guestbook">
    <div id="comments"><br/>
        <?php

        if ($comments != false) {
            foreach ($comments as $comment) {
                ?>
                <div class="comment">
				<span class="name"><strong><?php echo $comment->name; ?></strong> <em>said on</em>
                    <?php echo date("d-M-Y", strtotime($comment->datetime)); ?></span>
                    <span class="message"><?php echo $comment->message; ?></span>
                </div>
                <?php
            }
        } else {
            echo "<p>No comments made yet! Be the first one to comment here.</p>";
        }
        echo "<br />" . $pagination_links;

        ?>
    </div>
    <div id="new_comment">
        <h3>Post your comment</h3>
        <?php
        echo "<div class='error'>" . validation_errors() . "</div>";
        if ($this->session->flashdata('response') != "")
            echo $this->session->flashdata('response');
        ?>
        <form action="<?php echo site_url('guestbook/post'); ?>" method="post">
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
                <input name="verification_image" type="text" size="5" maxlength="6">
            </p>
            <p>
                <input name="submit" type="submit" value="Send Message">
                <br>
                <small>* All fields are mandatory</small>
            </p>
        </form>
    </div>
    <div class="clearer"></div>
</div>
