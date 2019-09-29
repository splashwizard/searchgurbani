<div class="page-content">
    <div class="container-fluid">
        <div class="contents">
            <h2 class="top-heading no-top">Guestbook</h2>
            <br/>
            <div>
                <a type="button" class="btn btn-info" href="<?php echo site_url('guestbook/post'); ?>">Post To Guestbook </a>
            </div>
            <br>
            <p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>
            <div id="guestbook">
                <div id="comments"><br/>
                    <?php

                    if ($comments != false) {
                        foreach ($comments as $comment) {
                        ?>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong><?php echo $comment->name; ?></strong> <em>said on</em>
                                    <?php echo date("d-M-Y", strtotime($comment->updated)); ?></h3></div>
                            <div class="panel-body"><h3><?php echo $comment->message; ?></h3></div>
                        </div>
                    <?php
                        }
                    } else {
                            ?>
                            <div class="panel panel-info">
                                <div class="panel-heading"></div>
                                <h3 class="panel-title"></h3>
                                <div class="panel-body"><h3>No comments made yet! Be the first one to comment here.</h3></div>
                            </div>
                        <?php
                    }
                    echo '<p class="pagination_links">' . $pagination_links . '</p>';
                    ?>
            </div>
                <br/>
            <div>
                <a type="button" class="btn btn-info" href="<?php echo site_url('guestbook/post'); ?>">Post To Guestbook </a>
            </div>
                <br/>
            <div class="clearer"></div>
        </div>
    </div>
</div>
</div>
