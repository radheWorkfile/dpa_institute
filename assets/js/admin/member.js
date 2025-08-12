 $(document).ready(function() {
     document.getElementById('memWrkSctr').addEventListener('change', myAmoliSelect);
     document.getElementById('inputState').addEventListener('change', myAmoliSelect);
     $(".keyUpAction").keyup(function() { let actNbtn = $(this).attr('id'); if (actNbtn == 'email_id') { $("#username").val($("#email_id").val()); } });
 });


 function myAmoliSelect() {
     let valueData = this.value;
     let trgtID = $(this).attr('data-id');
     let getResourceLoc = $('#arvActionTrgt').val();
     let actNbtn = $(this).attr('id');
     if (actNbtn == 'inputState') { finDetails(getResourceLoc, trgtID, valueData) } else if (actNbtn == 'memWrkSctr') {
         if (valueData == '7') {
             $('#crntJBLoc').hide();
             $('.frBsnsDetails').show();
         } else {
             $('#crntJBLoc').show();
             $('.frBsnsDetails').hide();
         }
         finDetails(getResourceLoc, trgtID, valueData)
     }
 }

 function finDetails(resourceLoc, trgtID, valueData) {
     $('#' + trgtID).html($('<option>', { value: '99999', text: 'Please Wait...' }));
     $('#' + trgtID).selectpicker('refresh');
     $.post(resourceLoc, { id: valueData, actnType: trgtID }, function(htmlAmi) {
         $('#' + trgtID).empty();
         $('#' + trgtID).html($('<option>', { value: '', text: 'Choose option' }));
         $.each(htmlAmi, function(index, user) { $('#' + trgtID).append($('<option>', { value: user.id, text: user.targetName })); });
         $('#' + trgtID).selectpicker('refresh');
     }, 'json');
 }

 $('#createMember').submit(function(e) {
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
         complete: function() { $('#saveDetails').html('<i class="fa fa-save"></i> Submit'); },
         success: function(htmlAmi) {
             toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
             if (htmlAmi.addClas == 'tSuccess') {
                 setTimeout(function() {
                     window.location.href = htmlAmi.returnLoc;
                 }, 1000);
             }
         }
     });
 });


 function myAmoliSelect() {
     let valueData = this.value;
     let trgtID = $(this).attr('data-id');
     let getResourceLoc = $('#arvActionTrgt').val();
     let actNbtn = $(this).attr('id');
     if (actNbtn == 'inputState') { finDetails(getResourceLoc, trgtID, valueData) } else if (actNbtn == 'memWrkSctr') {
         if (valueData == '7') {
             $('#crntJBLoc').hide();
             $('.frBsnsDetails').show();
         } else {
             $('#crntJBLoc').show();
             $('.frBsnsDetails').hide();
         }
         finDetails(getResourceLoc, trgtID, valueData)
     }
 }

 function finDetails(resourceLoc, trgtID, valueData) {
     $('#' + trgtID).html($('<option>', { value: '99999', text: 'Please Wait...' }));
     $('#' + trgtID).selectpicker('refresh');
     $.post(resourceLoc, { id: valueData, actnType: trgtID }, function(htmlAmi) {
         $('#' + trgtID).empty();
         $('#' + trgtID).html($('<option>', { value: '', text: 'Choose option' }));
         $.each(htmlAmi, function(index, user) { $('#' + trgtID).append($('<option>', { value: user.id, text: user.targetName })); });
         $('#' + trgtID).selectpicker('refresh');
     }, 'json');
 }

 $('#create_member').submit(function(e) {
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
         complete: function() { $('#saveDetails').html('<i class="fa fa-save"></i> Submit'); },
         success: function(htmlAmi) {
             toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
             if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.href = htmlAmi.returnLoc; }, 2000); }
         }
     });

 });