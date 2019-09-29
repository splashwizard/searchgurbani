<style>

    /** maansarovar **/
    .maan_words_index {

    }
    .word {
        display:block;
        width:200px;
        margin:2px;
        background:#F7DFCA;
        padding:2px;
        float:left;
        font-weight:400;
        font-size:11pt;
    }
    .word:hover {
        background:#FFCC99;
    }

</style>

<!--start-->
<div class="page-content">
    <div class="container-fluid">
        <div class="contents">
        <div style="background-color:#fceaaa" align="center">
            <h3 class="top-heading no-top">Maansarovar - Words</h3>
        </div>

        <div class="browse-letters center">
			<span class="bold xx-text"><a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%95/alpha">&#2581;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%96/alpha">&#2582;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%97/alpha">&#2583;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%98/alpha">&#2584;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%99/alpha">&#2585;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9A/alpha">&#2586;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9B/alpha">&#2587;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9C/alpha">&#2588;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9D/alpha">&#2589;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9E/alpha">&#2590;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9F/alpha">&#2591;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A0/alpha">&#2592;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A1/alpha">&#2593;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A2/alpha">&#2594;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A3/alpha">&#2595;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A4/alpha">&#2596;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A5/alpha">&#2597;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A6/alpha">&#2598;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A7/alpha">&#2599;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A8/alpha">&#2600;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AA/alpha">&#2602;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AB/alpha">&#2603;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AC/alpha">&#2604;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AD/alpha">&#2605;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AE/alpha">&#2606;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AF/alpha">&#2607;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%B0/alpha">&#2608;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%B2/alpha">&#2610;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%B5/alpha">&#2613;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%B8/alpha">&#2616;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%B9/alpha">&#2617;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A9%99/alpha">&#2649;</a>&nbsp;</span>
            </div>
        <p class="bold center small-bottom">Browse by letter</p>
        <br/>
        <div class="row">
            <div class="col-md-3">
                <strong>Words found for '<?php echo $keyword; ?>'</strong>
            </div>
            <div class="col-md-9 text-right">
                <ul class="inline-block highlight-li">
                    <li><a href="<?php echo site_url('maansarovar'); ?>" class="button">Search Page</a></li>
                </ul>
            </div>
            <br>
            <div>
                <?php

                    $i = 1;
                    $n = 1;
                    if ($words != false) {
                        foreach ($words->result() as $row) {
                            echo '<a style="" href="' . site_url('maansarovar/quotations/' . $row->word) . '" class="word">' . $row->word . '&nbsp;&nbsp;&nbsp;</a>';

                            $i = -$i;
                            $n++;
                        }
                    } else {
                        echo '<p>No words found</p>';
                    }
                 ?>
            </div>
            <div class="clearer"></div>
        </div>
        <!--end-->
        <br>
        <div class="browse-letters center">
			<span class="bold xx-text"><a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%95/alpha">&#2581;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%96/alpha">&#2582;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%97/alpha">&#2583;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%98/alpha">&#2584;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%99/alpha">&#2585;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9A/alpha">&#2586;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9B/alpha">&#2587;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9C/alpha">&#2588;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9D/alpha">&#2589;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9E/alpha">&#2590;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%9F/alpha">&#2591;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A0/alpha">&#2592;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A1/alpha">&#2593;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A2/alpha">&#2594;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A3/alpha">&#2595;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A4/alpha">&#2596;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A5/alpha">&#2597;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A6/alpha">&#2598;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A7/alpha">&#2599;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%A8/alpha">&#2600;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AA/alpha">&#2602;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AB/alpha">&#2603;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AC/alpha">&#2604;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AD/alpha">&#2605;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AE/alpha">&#2606;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%AF/alpha">&#2607;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%B0/alpha">&#2608;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%B2/alpha">&#2610;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%B5/alpha">&#2613;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%B8/alpha">&#2616;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A8%B9/alpha">&#2617;</a>&nbsp; <a
                    href="<?php echo site_url('maansarovar/do-search'); ?>/%E0%A9%99/alpha">&#2649;</a>&nbsp;</span>
        </div>
        <p class="bold center small-bottom">Browse by letter</p>
    </div>
</div>
</div>