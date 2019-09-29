<div class="page-content">
    <div class="container-fluid">
        <div style="background:#FFFFCC; border:1px solid #993300; padding:10px;"
        <h2><strong><?php echo $title; ?></strong></h2>
        <p><?php echo $content; ?></p>
    </div>
</div>
</div>

<div class="sitemap">
    <?php
    $page['theme_1'] = 'theme_8';
    $page['title'] = '404 - Page Not Found';
    echo $this->load->viewPartial('public/pages/sitemap', $page);
    ?>
</div>