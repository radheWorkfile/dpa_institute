$(function() {
    $(document).on("click", '.getAction', function() {
        let actNbtn = $(this).attr('data-id');
        let getData = actNbtn.split('===');
        if (getData[0] == 'miStatusView') {
            let target = $('#base_url').val() + getData[1];
            $.post(target, { oprType: getData[0], id: getData[2] }, function(htmlAmi) {
                $('.actnData').html(htmlAmi.msg);
                $('#cnfChangesStatus').attr('data-id', htmlAmi.action);
            }, 'json');
        } else if (getData[0] == 'miStatusChange') {
            let target = $('#base_url').val() + getData[1];
            $('#cnfChanges').html('<i class="fe fe-settings bx-spin"></i> Please Wait').removeClass('btn-outline-secondary').addClass('btn-outline-primary');
            $.post(target, { oprType: getData[0], id: getData[2] }, function(htmlAmi) {
                $('#cnfChanges').html('Confirm <i class="si si-check"></i>').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
                $("#arvs--" + getData[2]).addClass(htmlAmi.btnAdCls).removeClass(htmlAmi.btnRmvCls).html(htmlAmi.btnTxt);
                $('.actnData').html(htmlAmi.msg);
                $('#statusChange').delay(3000).modal('hide');
            }, 'json');

        }
    });
});



$(document).ready(function() {
    $("#bannerCreate_sec").hide();
    $("#banner_section").on("click", function() {
        $("#bannerCreate_sec").toggle();
        $("#banner_list").toggle();
    });
});

$(document).ready(function() {
    $("#create_volunteer").on("submit", function(e) {
        let base_url = $(this).attr('data-id');
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: base_url,
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            success: function(htmlAmi) {
                toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
                if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.href = htmlAmi.returnLoc; }, 2000); }
            },
        });
    });
});




var targeteventList_item = '';
$(document).ready(function() {
    let searchObj = {};
    var targetAction = $('#targetSection').attr('data-id');
    targeteventList_item = {
        printTable: function(search_data) {
            getpaginate(search_data, '#targetSection', targetAction, 'Only For Tnx id, Month.');
        }
    };
    targeteventList_item.printTable(searchObj);
});