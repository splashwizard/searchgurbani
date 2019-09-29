<link rel="stylesheet" href="<?php echo base_url(); ?>static/css/typeahead.autocomplete.css"
      type="text/css"/>

<h3 class="maroon small-bottom center"><?php echo $book_name; ?></h3>

<form action="<?php echo site_url($book_controller . '/do-search'); ?>" method="post"
      name="frmResourcesSearch" class="general-page-auto-search">

    <div class="row">
        <input type="hidden" name="table_name" id="table_name" value="<?php echo $book_name; ?>">

        <div class="col-sm-3 col-xs-6 col-sm-offset-4">
            <input type="text" class="form-control browse-search" id="keyword" name="keyword"
                   value="">
        </div>
        <div class="col-sm-1 col-xs-6">
            <button class="btn search-btn bl">Search</button>
        </div>
    </div>

    <div class="row">
        <div class="punjabi-keypad">
            <?php echo $this->load->viewPartial('keypads/punjabi'); ?>
        </div>
    </div>
</form>

<script type="text/javascript" src="<?php echo base_url(min_root_loc()); ?>static/js/jquery.bgiframe.js"></script>
<script type="text/javascript"
        src="<?php echo base_url(); ?>static/js/jquery.dimensions.js"></script>

<?php if($book_name == 'GurShabad Ratanakar Mahankosh' || $book_name == 'Sri Guru Granth Kosh' ||
         $book_name == 'Maansarovar' || $book_name == 'SGGS Kosh'
)
{ ?>
    <script type="text/javascript"
            src="<?php echo base_url(); ?>static/js/auto-complete/typeahead.bundle.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url(); ?>static/js/auto-complete/bloodhound.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url(); ?>static/js/auto-complete/mahan-kosh-auto-complete.js"></script>
<?php } ?>

<script type="text/javascript"
        src="<?php echo base_url(); ?>static/js/auto-complete/pad.js"></script>
