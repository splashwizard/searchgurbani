<div class="page-content">
    <div class="container-fluid">
        <?php

        if ($line != false) {
            echo '<div class="line"><h2 class="no-top">' . $title . '</h2><br />';
            echo '<p class="lang_1">' . $line->punjabi . '</p>';
            echo '<p class="lang_2">' . $line->translit . '</p>';
            echo '<p class="lang_3">' . $line->hindi . '</p>';
            echo '<p><a href="' . $link . '" class="btn btn-default">' . $attributes . '</a></p></div>';
        } else {
            echo '<h2>Oops! The data you want to see here is not found</h2>';

            echo '<p><a href="' . site_url() . '" style="text-decoration:underline;">Goto Website</a></p>';
        }

        ?>

    </div>
</div>
