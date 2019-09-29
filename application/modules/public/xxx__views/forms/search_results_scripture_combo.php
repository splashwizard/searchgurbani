<?php
global $SG_SearchTypes, $SG_SearchLanguage;
$sess_search_parameters = $this->session->userdata('search_parameters');

$search_results = $this->session->userdata('search_results');
foreach ($search_results as $scripture => $result) {
    if ($result['result_count'] > 0)
        $combo_data[$scripture] = $result['scripture_name'];
}
echo form_dropdown('change_scripture', $combo_data, $this_page, " onChange='gotoResults(this.value);'");
?>
<script type="text/javascript">
    function gotoResults(scripture) {
        switch (scripture) {
            case 'ggs':
                url = 'guru-granth-sahib';
                break;
            case 'ak':
                url = 'amrit-keertan';
                break;
            case 'bgv':
                url = 'bhai-gurdas-vaaran';
                break;
            case 'dg':
                url = 'dasam-granth';
                break;
            case 'ks':
                url = 'kabit-savaiye';
                break;
            default:
                url = '';
                break;
        }
        if (url != '' && url != 0)
            document.location.href = "<?php echo site_url(); ?>/" + url + "/search-results/";
    }
</script>