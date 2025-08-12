$(document).ready(function() {
    $("#createItem").on("submit", function(e) {
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


var targetItemLIst = '';
$(document).ready(function() {
    let searchObj = {};
    var targetAction = $('#targetItem').attr('data-id');
    targetItemLIst = {
        printTable: function(search_data) {
            getpaginate(search_data, '#targetItem', targetAction, 'Only For Tnx id, Month.');
        }
    };
    targetItemLIst.printTable(searchObj);
});




$(document).ready(function() {
    $("#bannerCreate_sec").hide();
    $("#banner_section").on("click", function() {
        $("#bannerCreate_sec").toggle();
        $("#banner_list").toggle();
    });
});

function validateEmail(input) {
    input.value = input.value.toLowerCase().replace(/[^a-z0-9@.]/g, '');
    const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
    const errorMessage = document.getElementById('error-message');
    if (!emailPattern.test(input.value)) {
        errorMessage.textContent = "Invalid email address.";
    } else {
        errorMessage.textContent = "";
    }
}


$(document).ready(function() {
    $("#donate-payment").hide();
    $("#amount").keyup(function() {
        if (!$("#amount").val().trim()) {
            $("#donate-payment").hide();
        } else {
            $("#donate-payment").show();
        }
    });
});


$('#imageInput').on('change', function() {
    $input = $(this);
    if ($input.val().length > 0) {
        fileReader = new FileReader();
        fileReader.onload = function(data) {
            $('.image-preview').attr('src', data.target.result);
        }
        fileReader.readAsDataURL($input.prop('files')[0]);
        $('.image-button').css('display', 'none');
        $('.image-preview').css('display', 'block');
        $('.change-image').css('display', 'block');
    }
});

$('.change-image').on('click', function() {
    $control = $(this);
    $('#imageInput').val('');
    $preview = $('.image-preview');
    $preview.attr('src', '');
    $preview.css('display', 'none');
    $control.css('display', 'none');
    $('.image-button').css('display', 'block');
});