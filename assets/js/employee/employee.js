var memberList = '';
$(document).ready(function() {
    /**********************************************************************************************/
    document.getElementById('inputState').addEventListener('change', myAmoliSelect);
    document.getElementById('empRole').addEventListener('change', myAmoliRoleAction);
    document.getElementById('inputDistrict').addEventListener('change', myAmoliSelect);
    document.getElementById('inputBlock').addEventListener('change', myAmoliSelect);
    document.getElementById('inputPanchayat').addEventListener('change', myAmoliSelect);
    /**********************************************************************************************/
    let searchObj = {};
    var target = $('#target').val();
    // memberList = {printTable: function (search_data){getpaginate(search_data, '#myTable', target, 'Only For Id, Name.');}}
    //  memberList.printTable(searchObj);
    $(".addDtManage").click(function() {
        let actNbtn = $(this).attr('id');
        if (actNbtn == 'addDtManage') {
            $("i", '#addDtManage').toggleClass("bi-plus-lg bi-arrow-left");
            $("#addDtManageTxt").html('Back');
            $("#searchDetails,#empListData").hide();
            $("#createEmployee").show();
            $('#addDtManage').attr('id', 'backToListShow');
        } else if (actNbtn == 'backToListShow' || actNbtn == "bkSrch_01") {
            $("i", '#addDtManage').toggleClass("bi-plus-lg bi-arrow-left");
            $("#addDtManageTxt").html('Create New');
            $("#searchDetails,#createEmployee").hide();
            $("#empListData").show();
            $('#backToListShow').attr('id', 'addDtManage');
        }
    });
    $(".keyUpAction").keyup(function() {
        let actNbtn = $(this).attr('id');
        if (actNbtn == 'email_id') { $("#username").val($("#email_id").val()); }
    });
});

function myAmoliSelect() {
    let valueData = this.value;
    let getTrgtId = $(this).attr('data-id');
    let getResourceLoc = $('#arvActionTrgt').val();
    $('#' + getTrgtId).html($('<option>', { value: '99999', text: 'Please Wait...' }));
    $('#' + getTrgtId).selectpicker('refresh');
    $.post(getResourceLoc, { id: valueData, actnType: getTrgtId }, function(htmlAmi) {
        $('#' + getTrgtId).empty();
        $('#' + getTrgtId).html($('<option>', { value: '', text: 'Choose option' }));
        $.each(htmlAmi, function(index, user) { $('#' + getTrgtId).append($('<option>', { value: user.id, text: user.state_cities })); });
        $('#' + getTrgtId).selectpicker('refresh');
    }, 'json');
}

function myAmoliRoleAction() {
    let valueData = this.value;
    let getResourceLoc = $('#arvActionTrgt').val();
    if (valueData == '1') {
        $('#vilgeID,#pnchaytID,#blockID,#distctID').hide();
        $('#stateID,#empRoleID').removeClass('col-md-4').addClass('col-md-6');
    } else if (valueData == '2') {
        $('#vilgeID,#pnchaytID,#blockID').hide();
        $('#stateID,#empRoleID,#distctID').removeClass('col-md-6').addClass('col-md-4');
        $('#distctID').show();
    } else if (valueData == '3') {
        $('#vilgeID,#pnchaytID').hide();
        $('#stateID,#empRoleID,#distctID,#blockID').removeClass('col-md-4').addClass('col-md-6');
        $('#distctID,#blockID').show();
    } else if (valueData == '4') {
        $('#vilgeID').hide();
        $('#distctID,#blockID,#pnchaytID').removeClass('col-md-6').addClass('col-md-4');
        $('#distctID,#blockID,#pnchaytID').show();
    } else if (valueData == '5') {
        $('#distctID,#blockID,#pnchaytID,#vilgeID,#empRoleID,#stateID').removeClass('col-md-4').addClass('col-md-6');
        $('#distctID,#blockID,#pnchaytID,#vilgeID').show();
    }
    /* $.post(getResourceLoc,{id:valueData,actnType:'empRole'},function(htmlAmi)
	{
		 $('#employeeWorkRole').html(htmlAmi.id);	
		},'json');*/

}

$('#create_employee').submit(function(e) {
    let base_url = $(this).attr('data-id');
    e.preventDefault();
    $.ajax({
        url: base_url,
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        beforeSend: function() { $('#saveDetails').html('<i class="fa fa-sun bx-spin"></i> Please Wait'); },
        complete: function() { $('#saveDetails').html('<i class="bx bx-save"></i> Submit'); },
        success: function(htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.href = htmlAmi.returnLoc; }, 2000); } //window.location.reload(1);
        }
    });

});