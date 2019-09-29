/**
 * Created by office on 21/2/17.
 */

function change_keypad(language) {
    switch (language) {
        case 'hindi':
            document.getElementById('key_pad_punjabi').style.display = 'none';
            document.getElementById('key_pad_hindi').style.display = 'block';
            document.getElementById("SearchData").value = "";
            break;
        case 'PUNJABI':
            document.getElementById('key_pad_punjabi').style.display = 'block';
            document.getElementById('key_pad_hindi').style.display = 'none';
            document.getElementById("SearchData").value = "";
            break;
        default:
            document.getElementById('key_pad_punjabi').style.display = 'none';
            document.getElementById('key_pad_hindi').style.display = 'none';
            document.getElementById("SearchData").value = "";
            break;
    }
}

function pad(char) {
    var prevVal = $('#SearchData').val();
    $('#SearchData').eq(0).val(prevVal + char).trigger("input");
    $('#SearchData').focus();
}

$(document).ready(function () {

    $('#SearchData').keyup(function (e) {
        $("#searchPageID").val('');
        // $("#searchTableID").val('');
    });

    $("#language").change(function () {
        var $self = $(this);
        $('#SearchData').val('');
        getSearchDataCallback();
    });

    $("#Searchtype").change(function (e) {
        var $self = $(this);
        $('#SearchData').val('');
        getSearchDataCallback();

        if($self.val() == 'PHRASE') {
            $("#language").val('PUNJABI').trigger('change');

            $("#language option[value='ROMAN']").prop('disabled', true);
            $("#language option[value='PUNJABI-ASC']").prop('disabled', true);

            $("#author").prop('disabled', true);
            $("#raag").prop('disabled', true);
            $("#page_from").prop('disabled', true);
            $("#page_to").prop('disabled', true);
        } else {
            $("#language option[value='ROMAN']").prop('disabled', false);
            $("#language option[value='PUNJABI-ASC']").prop('disabled', false);

            $("#author").prop('disabled', false);
            $("#raag").prop('disabled', false);
            $("#page_from").prop('disabled', false);
            $("#page_to").prop('disabled', false);
        }
    });

    getSearchDataCallback();
});

function getSearchDataCallback() {

    $("#searchPageID").val('');
    // $("#searchTableID").val('');

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
            url: base_url + 'public/ajax/get_words',
            prepare: function (q, rq) {

                $(".typeahead-loader").show();

                rq.data = {
                    q: $("#SearchData").val(),
                    // source: 'S01',
                    searchtype: $("#Searchtype").val(),
                    language: $("#language").val(),
                    author: $("#author").val(),
                    raag: $("#raag").val(),
                    page_from: $("#page_from").val(),
                    page_to: $("#page_to").val(),
                    scripture: $("#scripture").val(),
                    individual_search: $("#individual_search").val(),
                    bnlSelect: $("#bnlSelect").val()

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

    $('#SearchData').typeahead('destroy');

    $('#SearchData').typeahead(null, {
        hint: true,
        highlight: true,
        displayKey: 'word',
        limit: 99999,
        source: searchAuto.ttAdapter(),
        templates: {
            suggestion: function (data) {

                var querystr = $('#SearchData').val();
                var result = data.word.trim();

                if ($("#Searchtype").val() == 'FL_begin') {

                    querystr = querystr.replace(/\s+/g, "[a-z@]* ");
                    // querystr = querystr.replace(/~+$/, "");
                    var reg = new RegExp('^' + querystr, 'gim');

                } else if ($("#Searchtype").val() == 'FL_any') {

                    querystr = querystr.replace(/\s+/g, "[a-z@]* ");
                    // querystr = querystr.replace(/~+$/, "");
                    var reg = new RegExp('(?:\\s|^)' + querystr, 'gim');

                } else if ($("#Searchtype").val() == 'PHRASE') {

                    querystr = querystr.replace(/\s+/g, "[a-z]* ");
                    // querystr = querystr.replace(/~+$/, "");
                    var reg = new RegExp(querystr, 'gim');

                }

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