/**
 * Created by office on 21/2/17.
 */

function pad(char) {
    var prevVal = $('#keyword').val();
    $('#keyword').eq(0).val(prevVal + char).trigger("input");
    $('#keyword').focus();
}

$(document).ready(function () {

    getSearchDataCallback();
});

function getSearchDataCallback() {


    var searchAuto = new Bloodhound({
        datumTokenizer: function (d) {
            var tokens = [];
            //the available string is 'name' in your datum
            var stringSize = d.word.length;
            //multiple combinations for every available size
            //(eg. dog = d, o, g, do, og, dog)
            for (var size = 1; size <= stringSize; size++) {
                for (var i = 0; i + size <= stringSize; i++) {
                    tokens.push(d.word.substr(i, size));
                }
            }
            return tokens;
        },
        // datumTokenizer: Bloodhound.tokenizers.obj.whitespace('word'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: base_url + 'public/ajax/get_resources_words',
            prepare: function (q, rq) {

                $(".typeahead-loader").show();

                rq.data = {
                    q: $("#keyword").val(),
                    // source: 'MK01',
                    table_name: $("#table_name").val(),
                };
                return rq;
            },
            transport: function (obj, onS, onE) {

                $.ajax(obj).done(done).fail(fail).always(always);

                function done(data, textStatus, request) {
                    // Don't forget to fire the callback for Bloodhound
                    onS(data);
                }

                function fail(request, textStatus, errorThrown) {
                    // Don't forget the error callback for Bloodhound
                    onE(errorThrown);
                }

                function always() {
                    $(".typeahead-loader").hide();
                }
            }
        }
    });

    searchAuto.initialize();

    $('#keyword').typeahead('destroy');

    $('#keyword').typeahead(null, {
        hint: true,
        highlight: true,
        displayKey: 'word',
        limit: 9999,
        source: searchAuto.ttAdapter(),
        templates: {
            suggestion: function (data) {

                var querystr = $('#keyword').val();
                var result = data.word.trim();

                querystr = querystr.replace(/\s+/g, "[a-z]* ");
                // querystr = querystr.replace(/~+$/, "");
                var reg = new RegExp(querystr, 'gim');


                var final_str = result.replace(reg, function (str) {
                    return '<b>' + str + '</b>'
                });

                return '<div class="tt-suggestion tt-selectable">' + final_str + '</div>';
            }
        }
    }).on("typeahead:selected", function ($e, datum) {
        $("#searchPageID").val(datum.id);
        // $("#searchTableID").val(datum.id);
    });
}