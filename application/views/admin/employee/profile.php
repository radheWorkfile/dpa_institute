<div class="content-body">
            <div class="container-fluid">
            <div class="row">
            <div class="col-xl-4">
            <div class="card overflow-hidden">
            <div class="text-center p-3 overlay-box ">
            <div class="profile-photo">
            <p style=""><img src="<?php echo base_url(); ?>uploads/employee/no_img.png" width="100" class="img-fluid rounded-circle profile-img" alt=""></p>
            </div>
            <h3 class="mt-3 mb-1 text-white">Profile Details</h3>
            <p class="text-white mb-0"><?php echo ($isMember->first_name) ? $isMember->first_name : '<span class="text-center text-danger">N/A</span>'; ?></p>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Name :- </span> <strong class="text-muted"><?php echo ($isMember->first_name.' '.$isMember->last_name) ? $isMember->first_name.' '.$isMember->last_name : '<span class="text-center text-danger">N/A</span>'; ?></strong></li>
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Email Id :- </span><strong class="text-muted"><?php echo ($isMember->email_id) ? $isMember->email_id : '<span class="text-center text-danger">N/A</span>'; ?></strong></li>
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Mobile Number :- </span><strong class="text-muted"><?php echo ($isMember->mobile_number) ? $isMember->mobile_number : '<span class="text-center text-danger">N/A</span>'; ?></strong></li>
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Address :- </span><strong class="text-muted"><?php echo ($isMember->address) ? $isMember->address : '<span class="text-center text-danger">N/A</span>'; ?></strong></li>
            </ul>
            <div class="card-footer border-0 mt-0">
            <button class="btn btn-primary btn-lg btn-block"> 
             <a href="<?php echo base_url('administrator/employee/statewise');?>" class="text-white"><i class="fa fa-bell-o"></i> View More...</a>
            </button>
            </div>
            </div>
            </div>

            <!-- ------------------------------------------------------------------   -->

            <div class="col-xl-8">
            <div class="card h-auto">
            <div class="card-body card-size">
            <div class="profile-tab">
            <div class="custom-tab-1">
            <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active" aria-selected="false" role="tab" tabindex="-1">Personal Details</a></li>
            <li class="nav-item" role="presentation"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Contact Details</a></li>
            <!-- <li class="nav-item" role="presentation"><a href="#more-details" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">More Details...</a></li> -->
            </ul>
            <div class="tab-content">

<!-- ------------------------------- Personal Information section start -------------------------------------- -->

            <div id="my-posts" class="tab-pane fade active show" role="tabpanel">
            <h4 class="text-primary mb-4 mt-4">Personal Details</h4>
            <div class="profile-personal-info">
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i>&nbsp;&nbsp; Employee Id <span class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span class="text-success">
            <?php echo ($isMember->user_id) ? $isMember->user_id : '<span class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i>&nbsp;&nbsp; Name <span class="pull-right">:</span>
            </h5>
            </div>
            <div class="col-9"><span><?php echo ($isMember->first_name.'  '.$isMember->last_name) ? $isMember->first_name.'  '.$isMember->last_name : '<span class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i> &nbsp;&nbsp;Father Name <span class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span><?php echo ($isMember->father_name) ? $isMember->father_name : '<span class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i> &nbsp;&nbsp;Mobile Number <span class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span><?php echo ($isMember->mobile_number) ? '+91 '.$isMember->mobile_number : '<span class="text-center text-danger">N/A</span>'; ?></span></span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i> &nbsp;&nbsp; Email Id <span class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span><?php echo ($isMember->email_id) ? $isMember->email_id : '<span class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i> &nbsp;&nbsp; Gender <span    class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span>
                <?php 
                echo ($isMember->gender == 'Male') ? 'Male' :
                (($isMember->gender == 'Female') ? 'Female' :
                (($isMember->gender == 'Transgender') ? 'Transgender' :
                (($isMember->gender == 'Rather not say') ? 'Rather not say' :
                '<span class="text-center text-danger">N/A</span>')));
                ?>
            </span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i> &nbsp;&nbsp; Date of Birth <span class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span><?php echo ($isMember->dob) ? $isMember->dob : '<span    class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>
            </div>
            </div>
<!-- ---------------------------- Personal Information section end ----------------------------------------- -->


<!-- ------------------------------------------ seting section start ------------------------------------ -->
            <div id="profile-settings" class="tab-pane fade" role="tabpanel">
            <h4 class="text-primary mb-4 mt-4">Contact Details</h4>
            <div class="profile-personal-info">
           
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i>&nbsp;&nbsp; Mobile Number <span class="pull-right">:</span>
            </h5>
            </div>
            <div class="col-9"><?php echo ($isMember->mobile_number) ? '+91 '.$isMember->mobile_number:'<span class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i> &nbsp;&nbsp;Email Id <span   class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span><?php echo ($isMember->email_id) ? $isMember->email_id:'<span class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i>&nbsp;&nbsp; Address<span      class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span><?php echo ($isMember->address) ? $isMember->address:'<span class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>


            
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i> &nbsp;&nbsp; State <span      class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><?php echo ($isMember->state) ? $isMember->current_working_city:'<span class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i> &nbsp;&nbsp;District <span    class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span> <?php echo ($isMember->district) ? $isMember->district:'<span class="text-center text-danger">N/A</span>'; ?> </span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i> &nbsp;&nbsp; Pincode<span class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span><?php echo ($isMember->zipcode) ? $isMember->zipcode:'<span class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>




            
            </div>
            </div>
<!-- ------------------------Seting section end ------------------------------------- -->
<!-- ----------------------- More Details section start ------------------------------------- -->
            <div id="more-details" class="tab-pane fade" role="tabpanel">
            <h1 class="text-center text-404 text-danger mt-8">404</h1>
            </div>
<!-- ----------------------- More Details section  ---------------------------------- -->         
            </div>
            </div>
            </div>
            </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="replyModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Post Reply</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
            <form>
            <textarea class="form-control" rows="4">Message</textarea>
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close button>
            <button type="button" class="btn btn-primary">Reply</button>
            </div>
            </div>
            </div>
            </div>
            </div>          
            <!-- ------------------------------------------------------------------   -->
            </div>
            </div> </div> </div>
<!-- ======================================= Model Sectioin Start =================================  -->
                <style>.rk-spin{animation:rk-spin 2s infinite linear}@keyframes rk-spin{0%{transform:rotate(0deg)}100%{transform:rotate(359deg)}}</style>
                <div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
                <div class="delMsg"><i class="fe fe-sliders"></i><span><i class="fas fa-gear fa-spin" style="font-size:14px;color:#6a4343;"></i></span><span style="color:#6a4343;"> Manage Status</span></div>
                <div class="actnData py-2"><i class="fa fa-cog rk-spin" aria-hidden="true"></i> Are you sure want to activate of Shift ID #F33333</div>
                <div id="mdlFtrBtn">
                <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfChangesStatus" data-id="@misingh143">Confirm <i class="si si-check"></i>
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
            </script>