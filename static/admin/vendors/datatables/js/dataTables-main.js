$(document).ready(function () {
    initTables();
});

function initTables() {

    $("table.dyntable:visible").each(function (i, ele) {

        var ele = $(ele);

        var source = ele.attr('source');

        var jsonStr = ele.attr('jsonInfo');

        var max_rows = ele.attr("max_rows");

        ele.DataTable({
            "bDestroy": true,
            "bFilter": true,
            "bLengthChange": true,
            "iDisplayLength": 10,
            "bSort": true,
            "bServerSide": true,
            "bProcessing": true,
            "bJQueryUI": false,
            "sPaginationType": "full_numbers",
            "sAjaxSource": source,
            "oLanguage": {
                "sEmptyTable": 'No data available'

            },
            "aaSorting": [[0, 'asc']],
            "aoColumns": eval(jsonStr),
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details for ' + data[0] + ' ' + data[1];
                        }
                    }),
                    renderer: function (api, rowIdx, columns) {
                        var data = $.map(columns, function (col, i) {
                            return '<tr>' +
                                '<td>' + col.title + ':' + '</td> ' +
                                '<td>' + col.data + '</td>' +
                                '</tr>';
                        }).join('');

                        return $('<table/>').append(data);
                    }
                }
            }
        })
    });


    $("table.dyntable:visible").each(function (i, ele) {

        var ele = $(ele);

        ele.dataTable().fnFilterOnReturn()

    });


    /*$('table.dyntable').dataTable().fnFilterOnReturn();*/

}
