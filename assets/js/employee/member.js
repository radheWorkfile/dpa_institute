 $(document).ready(function() {
     document.getElementById('memWrkSctr').addEventListener('change', myAmoliSelect);
     document.getElementById('inputState').addEventListener('change', myAmoliSelect);
     $(".keyUpAction").keyup(function() { let actNbtn = $(this).attr('id'); if (actNbtn == 'email_id') { $("#username").val($("#email_id").val()); } });
 });


 $(function() {
     $(document).unbind("click", '.ActnCmdByAmi').on("click", '.ActnCmdByAmi', function() {
         let actNbtn = $(this).attr('id');
         let uriActn = $(this).attr('data-id');
         let spltStr = uriActn.split("===");
         let targetUrl = $("#base_url").val() + spltStr[1];
         let txtNms = (spltStr[0] == "certift") ? '<i class="las la-certificate"></i>' : '<i class="las la-id-card"></i>';
         $('#' + actNbtn).html('<i class="fa fa-sun bx-spin"></i>');
         $.post(targetUrl, { endDt: 'confirm' },
             function(htmlAmi) {

                 $('#' + actNbtn).html(txtNms);
                 var frame1 = $('<iframe />');
                 frame1[0].name = "frame1";
                 $("body").append(frame1);
                 var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                 frameDoc.document.open();
                 frameDoc.document.write(htmlAmi);
                 frameDoc.document.close();
                 setTimeout(function() {
                     window.frames["frame1"].focus();
                     window.frames["frame1"].print();
                     frame1.remove();
                 }, 500);
             });
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

 var memberListItem = '';
 $(document).ready(function() {
     let searchObj = {};
     var targetAction = $('#memberList').attr('data-id');
     memberListItem = {
         printTable: function(search_data) {
             getpaginate(search_data, '#memberList', targetAction, 'Only For Tnx id, Month.');
         }
     };
     memberListItem.printTable(searchObj);
 });