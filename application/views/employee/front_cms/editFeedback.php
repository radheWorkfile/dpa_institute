
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
          <form id="updateFeedback" data-id="<?php echo $targetItem;?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
   
            <div class="row py-3 px-5">
            <div class="col-md-2"></div>
            <div class="col-md-8"style="border:1px solid #eaeaea;padding: 5rem;"> 
            <h3 class="text-center color-g">Tell Us How We're Doing </h3> <hr>
            <div class="mb-3 mt-3">
            <p class="color-g">&nbsp;Enter Subject</p>
            <div class="input-group m-t-1">
            <span class="input-group-text"> <i class="fa fa-user color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="subject" id="subject" value="<?php echo $feedbackData->feedback?$feedbackData->feedback:'';?>" placeholder="Enter Subject.." required="">
            <input type="hidden" class="form-control border-left-end" name="id" id="id" value="<?php echo $feedbackData->id?$feedbackData->id:'';?>">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>

            <div class="mb-3">
            <p class="color-g">&nbsp;Enter discription</p>
            <div class="input-group m-t-1">
            <span class="input-group-text"> <i class="fa fa-user color-g"></i> </span>
            <textarea class="form-control" maxlength="400" rows="4" id="discription" name="discription"  spellcheck="false" required=""><?php echo $feedbackData->discription?$feedbackData->discription:'';?></textarea>
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>

          
            <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary mt-2" id="saveDetails">
            <i class="fa fa-save"></i> Submit
            </button>
            </div>



            </div>
            <div class="col-md-2"></div>
            </div>
            </form>
    <!-- ============================================== Banner section end ================================== -->
 
      </div>
      </div>
      </div>
      </div>
      </div>      
      </div> 


      <!-- ======================================= Model Sectioin Start =================================  -->
<div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
            <div class="delMsg"><i class="fe fe-sliders"></i><span><i class="fas fa-gear fa-spin" style="font-size:14px;color:#6a4343;"></i></span><span style="color:#6a4343;"> Manage Status</span></div>
                <div class="actnData py-2"> Are you sure want to activate of Shift ID #F33333</div>
                <div id="mdlFtrBtn">
                  <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfChangesStatus" data-id="@misingh143">
                        Confirm <i class="si si-check"></i>
                  </button>
                  <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal" style="margin-right:10px;">
                    <i class="fa fa-arrow-left"></i> Back 
                  </button>   
               </div>	
            </div>
    </div>
</div>
</div>
<!-- ========================================== Model Section End  rk-spin ==============================  -->



      <style>
        .m-t-1{margin-top:-1rem;}
        .color-g{color:#027076;}
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

                 
<script>
    $(document).ready(function() {
    $("#updateFeedback").on("submit", function(e) {
      alert("Hhhhhhhhh");
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
                toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
                if (htmlAmi.addClas == 'tSuccess') {
                    setTimeout(function() { window.location.href = htmlAmi.returnLoc; }, 2000);
                }
            }
        });
    });
});
</script>

<script src="<?php echo base_url('assets/js/employee/front_cms/feedback.js') ?>"></script>

