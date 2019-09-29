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
        <h3>Guestbook Posting is currently disabled due to persistent spam and abuse by a user Sunny Rai <br/>sunny.1000@live.co.uk
        </h3>

    </div>
    <div class="clearer"></div>
</div>
