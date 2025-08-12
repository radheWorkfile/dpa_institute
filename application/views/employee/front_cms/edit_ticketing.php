
<!-- previewImage -->
<div class="content-body">
      <div class="container-fluid">
      <div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card">
      <div class="card-header">
      <h4 class="card-title"><?php echo $title;?></h4>
      </div>
      <div class="card-body">
      <div class="basic-form">
          <!-- ============================================ Banner section start ================================== -->
          <form id="update_ticketing" data-id="<?php echo $targetItem;?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
         <div class="row">
         <div class="row mt-4">


               <div class="col-md-3"></div>
               <div class="col-md-6 py-5 px-5"style="border:1px solid #eeeded;boarder-radius:2rem!important;">


        <h3 class="text-center">Manage Tickets</h3>


               <div class="col-md-12">
         <p class="text-man text-color-g">&nbsp;Enter Subject</p>
         <div class="input-group m-t-1">
         <div class="input-group">
         <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
         <input type="text" class="form-control border-left-end" value="<?php echo $ticket_details->subject?$ticket_details->subject:''; ?>" name="subject" id="subject" placeholder="Enter Subject.." oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
         <input type="hidden" name="id" id="id"  value="<?php echo $ticket_details->id; ?>">
         <div class="invalid-feedback">Please Enter Heading.
         </div>
         </div>
         </div>
         </div>


         <div class="col-md-6"style="display:none;">
         <p class="text-man text-color-g">&nbsp;Upoload File ( png, jpg, jpeg )</p>
         <div class="input-group m-t-1">
         <div class="input-group">
         <span class="input-group-text"> <i class="fa fa-cloud-upload text-color-g"></i> </span>
         <input class="form-control" type="file" id="file" name="file">
         <div class="invalid-feedback">Please Enter Heading.
         </div>
         </div>
         </div>
         </div>



         <div class="col-md-12 mt-3">
          <p class="text-man text-color-g">&nbsp;Message</p>
          <div class="input-group m-t-1">
          <div class="input-group">
          <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
          <textarea class="form-control" maxlength="400" rows="4" id="text" name="text" placeholder="Enter Message" spellcheck="false" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"><?php echo $ticket_details->asked_question?$ticket_details->asked_question:''; ?></textarea>
          <div class="invalid-feedback">Please Enter Heading.
          </div>
          </div>
          </div>
          </div>


          <div class="row mt-3">
          <div class="col-md-5"></div>
          <div class="col-md-7">
          <button type="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
          </div>
          </div>



               </div>
               <div class="col-md-3"></div>

         </div>

         </div>

          


            </form>
    <!-- ============================================== Banner section end ================================== -->
 
      </div>
                 
      </div>
      </div>
      </div>
      </div>      
      </div> 



      <style>
           .sRvDeactive {
           padding: 4px 8px 4px 8px;
           background-color: #EE4B5C4F;
           color: #EE4B5C;
           border-radius: 3px;
           cursor: pointer;
           font-size: .8rem;
         }
         .sRvActive {
           padding: 4px 15px 4px 15px;
           background-color: #0AC89024;
           color: #009569;
           border-radius: 3px;
           cursor: pointer;
           font-size: .8rem;
         }
         .sRvSuspnd {
           padding: 4px 8px 4px 8px;
           background-color: #FF9F003D;
           color: #9D6200;
           border-radius: 3px;
           cursor: pointer;
           font-size: .8rem;
         }
         </style>


      <!-- <script src="<?//php echo base_url('assets/js/admin/employee.js') ?>"></script> -->
      <script src="<?php echo base_url('assets/js/employee/front_cms/ticket.js') ?>"></script>

<script>
  
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
    $("#update_ticketing").on("submit", function(e) {
        let base_url = $(this).attr('data-id');
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: base_url,
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            dataType: 'json',
            success: function(htmlAmi) {
                console.log(htmlAmi);
                toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
                if (htmlAmi.addClass == 'tSuccess') {
                    setTimeout(function() { window.location.href = htmlAmi.returnLoc; }, 1000);
                }
            }
        });
    });
});

</script>
