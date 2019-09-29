<?php
global $SG_SearchTypes, $SG_SearchLanguage, $SG_ScriptureTypes;
/*echo "<pre>";
print_r($listF);
echo "</pre>";
echo "-------------------";
echo "<pre>";
print_r($pagination_links);
echo "</pre>";exit;
*/

?>
<!-- Start of Individual Search Form -->
<h2><strong>Newsletter</strong></h2><br/>

<script type="text/javascript" src="<?php echo base_url(min_root_loc()); ?>scripts/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(min_root_loc()); ?>scripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "textareas",
        theme: "advanced",
        plugins: "spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,

        // Skin options
        skin: "o2k7",
        skin_variant: "silver",

        // Example content CSS (should be your site CSS)
        content_css: "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url: "tinymce/examples/lists/template_list.js",
        external_link_list_url: "tinymce/examples/lists/link_list.js",
        external_image_list_url: "tinymce/examples/lists/image_list.js",
        media_external_list_url: "tinymce/examples/lists/media_list.js",

        // Replace values for the template plugin
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        }
    });
    $(document).ready(function () {
        $("#newsletter").validate();
    })
</script>
<style>
    .selectNews {
        width: 100px;
        float: left;
        border-right: 1px solid;
        border-bottom: 1px solid;
        height: 20px;
        overflow: hidden;
    }

    .titleNews {
        width: 200px;
        float: left;
        border-right: 1px solid;
        border-bottom: 1px solid;
        height: 20px;
        overflow: hidden;
    }

    .contentNews {
        width: 395px;
        float: left;
        border-right: 1px solid;
        border-bottom: 1px solid;
        height: 20px;
        overflow: hidden;
    }

    .actionNews {
        width: 100px;
        float: left;
        border-bottom: 1px solid;
        height: 20px;
        overflow: hidden;
    }

    .contentNews p {
        float: left;
        height: 19px;
        margin: 0;
        overflow: hidden;
    }

    .error1 {
        color: #FF0000;
    }

</style>
<form action="<?php echo site_url("newsletter/newsletter_save"); ?>" method="post" name="newsletter" id="newsletter">
    <div class="search_panel" style="clear:both;">
        <div style="padding-bottom: 10px;width: 100%;">
            <label>Title</label>
            <input type="text" name="title" id="title" class="required" size="44">
        </div>
        <div style=" padding-bottom: 10px; width: 100%;">
            <label>Content</label>
            <textarea name="content" id="content" class="required"></textarea>
        </div>
    </div>
    <input type="submit" name="saveNewsletter" value="Save Newsletter">
</form>
<br/>

<h2><strong>All Newsletter</strong></h2><br/>
<?php //echo $this->pagination->create_links();?>
<p class="pagination_links">Pages: <?php echo $pagination_links; ?>&nbsp;</p>
<div style="width:800px;border:1px solid; font-size: 13px; font-weight: bold;">
    <form method="post" action="<?php echo site_url("newsletter/sendMail"); ?>" name="sendmail">
        <div style="width:100%;float:left;">
            <div class="selectNews">Select</div>
            <div class="titleNews">Title</div>
            <div class="contentNews">Content</div>
            <div class="actionNews">Action</div>
            <?php
            foreach ($arr as $newsAll) {
                ?>
                <div style="width:100%;float:left;">
                    <div class="selectNews"><input type="checkbox" name="name[<?= $newsAll->id ?>]"/></div>
                    <div class="titleNews"><?= $newsAll->title ?></div>
                    <div class="contentNews"><?= $newsAll->content ?></div>
                    <div class="actionNews"><a
                            href="<?php echo site_url("newsletter/newsletter_edit/" . $newsAll->id); ?>">Edit</a> <a
                            href="<?php echo site_url("newsletter/newsletter_delete/" . $newsAll->id); ?>">Delete</a>
                    </div>
                </div>
                <?
            }

            ?>

        </div>
        <input type="submit" value="Send Mail" name="mail"/>
    </form>
</div>