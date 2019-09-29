<link rel="stylesheet" href="<?php echo base_url(); ?>styles/typeahead.autocomplete.css"
      type="text/css"/>

<h2><?php echo $book_name; ?></h2>
<form action="<?php echo site_url($book_controller . '/do-search'); ?>" method="post"
      name="frmResourcesSearch">
    <input type="hidden" name="table_name" id="table_name" value="<?php echo $book_name; ?>">
    <div>
        <div class="dictionary-srch-frm" style="display: block; padding-bottom: 35px; padding-left: 325px;">
            <input style="float: left" type="text" class="text_box ac_input" id="keyword" name="keyword" value=""
                   size="25">
            <input style="float: left" name="Submit" type="submit" value="Search" class="btn"/>
        </div>
        <?php echo $this->load->viewPartial('keypads/punjabi'); ?>
    </div>
</form>

<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.bgiframe.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.dimensions.js"></script>

<?php if($book_name == 'GurShabad Ratanakar Mahankosh' || $book_name == 'Sri Guru Granth Kosh' ||
         $book_name == 'Maansarovar' || $book_name == 'SGGS Kosh'
)
{ ?>
    <script type="text/javascript"
            src="<?php echo base_url(); ?>scripts/auto-complete/typeahead.bundle.js"></script>
<?php } ?>

<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/auto-complete/bloodhound.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>scripts/auto-complete/mahan-kosh-auto-complete.js"></script>