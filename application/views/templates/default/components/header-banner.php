<?php

    if ($theme == 'theme_3' || $theme == 'theme_6' || $theme == 'theme_7')
    {
        
        ?>
        <div id="banner">
            <div class="container-fluid">
                <img src="<?php echo base_url(); ?>static/images/banner01.jpg"
                     class="img-responsive"/>
            </div>
        </div>

        <?php
    }
    else
    {
        ?>
        <div id="banner">
            <div class="container-fluid">
                <img src="<?php echo base_url(); ?>static/images/banner.jpg"
                     class="img-responsive"/>
            </div>
        </div>
        <?php
    }
?>