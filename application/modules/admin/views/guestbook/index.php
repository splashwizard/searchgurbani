<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Guestbook</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php
                        if(!empty($flash_message)) {
                            ?>
                            <div class="col-sm-12">
                                <div
                                    class="row alert alert-info">
                                    <?php echo $flash_message; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

<!--                        <div class="pull-left">-->
<!--                            <a href="--><?php //echo site_url('employee-add'); ?><!--" class="btn btn-success">Add</a>-->
<!--                        </div>-->

                        <?php echo $table; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<script type="text/javascript">
    var url = '<?php echo base_url() ?>';

    function disable_comment(el, id) {
        var $el = $(el);
        var id = id;


            var request = $.ajax({
                url: url + 'admin/guestbook/enable',
                data: {
                    id: id
                },
                type: "GET"

            }).done(function (msg) {

                if(msg == true){
                    $el.attr('onclick', 'javascript:return enable_comment(this, '+id+');');
                    $el.find('i').removeClass('fa-toggle-on').addClass('fa-toggle-off');
                }
            });



        return false;
    }

    function enable_comment(el, id) {
        var $el = $(el);
        var id = id;

            var request = $.ajax({
                url: url + 'admin/guestbook/disable',
                data: {
                    id: id
                },
                type: "GET"
            }).done(function (msg) {
                if(msg == true){
                    $el.attr('onclick', 'javascript:return disable_comment(this, '+id+');');
                    $el.find('i').removeClass('fa-toggle-off').addClass('fa-toggle-on');
                }
            });

        return false;
    }
</script>