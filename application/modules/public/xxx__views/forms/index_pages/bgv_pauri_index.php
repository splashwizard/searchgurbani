<!--start-->

<h2><strong>Bhai Gurdas Vaaran - Vaar Index</strong></h2>
<div id="vaar_index"><strong>Vaar #</strong><br/>

    <?php

    for ($i = 1; $i <= 40; $i++) {
        echo '<a href="' . site_url('public/bhai-gurdas-vaaran/vaar/' . $i . '/pauri/1') . '"> ' . $i . ' </a>';
        if ($i % 10 == 0)
            echo '<br /><div class="clearer"></div>';
    }

    ?>
    <div class="clearer"></div>
</div>
<!--end-->