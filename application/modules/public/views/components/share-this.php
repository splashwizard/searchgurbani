<!--jssocials Button BEGIN -->
<?php
$style = 'style="';
if ($this->session->userdata('sharing_session') == 'off') {
    $style .= 'display: none;';
}
$style .= '"';
?>

<div class="social-add" <?php echo $style ?>>
    <div class="shareRoundIcons"
         data-sharelink="<?php echo $link; ?>"
         data-whastsappsharelink="<?php echo $whatsapp_sharelink; ?>"
         data-sharetext="<?php echo $text; ?>">
    </div>
</div>
