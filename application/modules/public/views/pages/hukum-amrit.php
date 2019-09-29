<div class="page-content">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-md-1 col-md-offset-3"></div>

            <div class="col-md-4 col-xs-8 text-center">


                <div class="input-group date datepicker " style="width:247px; margin: 0 auto;">
                    <input type="text" class="form-control" name="hukum_date" placeholder="Select a date" id="hukum_date" value="<?php echo !empty($dt) ? $dt : $date_hukam; ?>">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>

            </div>
        </div>
        <?php
        if (!empty($hukum_message)) {
            ?>
                <h3 class="text-center"><?php echo $hukum_message ?></h3>
            <?php
        }else {
            ?>
            <div class="timee">
                <?php echo $hukamdatetime; ?>
            </div>
            <div class="punjabi_fonts">
                <div class="punjabi_fonts_center">
                    <?php echo $titlePunjabi; ?>
                </div>
                <div class="punjabi_fonts_left">
                    <?php echo $contentPunjabi; ?>
                </div>
                <div class="punjabi_fonts_full_width">
                    <div class="punjabi_fonts_full_left">
                        <?php echo $leftFooterPunjabi; ?>
                    </div>
                    <div class="punjabi_fonts_full_right">
                        <?php echo $rightFooterPunjabi; ?>
                    </div>
                </div>
                <div class="punjabi_fonts_full_width">
                    <div class="punjabi_fonts_left viakhiya">
                        <?php echo $viyakhyaPunjabi; ?>
                    </div>
                </div>
            </div>
            <div class="english_viakhya">
            <div class="english_viakhya_title">
                <?php echo $titleEnglish; ?>
            </div>
            <div class="english_viakhya_cont">
                <?php echo $contentEnglish; ?>
            </div>
            <div class="english_viakhya_full_width">
                <div class="english_viakhya_full_left">
                    <?php echo $leftFooterEnglish; ?>
                </div>
                <div class="english_viakhya_full_right">
                    <?php echo $rightFooterEnglish; ?>
                </div>
            </div>
            </div><?php
        }
?>
    </div>
</div>

<script type="text/javascript">
    hukum_url = '<?php echo $hukum_url;?>'
</script>
