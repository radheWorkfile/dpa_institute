<div class="content-body">
            <div class="container-fluid">
            <div class="row">
            <div class="col-xl-4">
            <div class="card overflow-hidden">
            <div class="text-center p-3 overlay-box ">
            <div class="profile-photo">
            <p style=""><img src="<?php echo base_url(); ?>uploads/member/no_img.png" width="100" class="img-fluid rounded-circle profile-img" alt=""></p>
            </div>
            <h3 class="mt-3 mb-1 text-white">Profile Details</h3>
            <p class="text-white mb-0"><?php echo ($isMember->name) ? $isMember->name : '<span class="text-center text-danger">N/A</span>'; ?></p>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Name :- </span> <strong class="text-muted"><?php echo ($isMember->name) ? $isMember->name : '<span class="text-center text-danger">N/A</span>'; ?></strong></li>
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Email Id :- </span><strong class="text-muted"><?php echo ($isMember->email_id) ? $isMember->email_id : '<span class="text-center text-danger">N/A</span>'; ?></strong></li>
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Mobile Number :- </span><strong class="text-muted"><?php echo ($isMember->mobile_number) ? $isMember->mobile_number : '<span class="text-center text-danger">N/A</span>'; ?></strong></li>
            <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Address :- </span><strong class="text-muted"><?php echo ($isMember->address) ? $isMember->address : '<span class="text-center text-danger">N/A</span>'; ?></strong></li>
            </ul>
            <div class="card-footer border-0 mt-0">
            <button class="btn btn-primary btn-lg btn-block">
            <i class="fa fa-bell-o"></i> View More...
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
            <li class="nav-item" role="presentation"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active" aria-selected="true" role="tab">Personal Details</a></li>
            <li class="nav-item" role="presentation"><a href="#more-details" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">More Details...</a></li>
            </ul>
            <div class="tab-content">

<!-- ------------------------------- Personal Information section start -------------------------------------- -->

            <div id="my-posts" class="tab-pane fade active show" role="tabpanel">
            <h4 class="text-primary mb-4 mt-4">Personal Details</h4>
            <div class="profile-personal-info">
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i>&nbsp;&nbsp; Member Id <span class="pull-right">:</span></h5>
            </div>
            <div class="col-9"><span class="text-success">
            <?php echo ($isMember->member_id) ? $isMember->member_id : '<span class="text-center text-danger">N/A</span>'; ?></span>
            </div>
            </div>
            <div class="row mb-3">
            <div class="col-3">
            <h5 class="f-w-500"><i class="fa fa-circle text-primary-light me-1"></i>&nbsp;&nbsp; Name <span class="pull-right">:</span>
            </h5>
            </div>
            <div class="col-9"><span><?php echo ($isMember->name) ? $isMember->name : '<span class="text-center text-danger">N/A</span>'; ?></span>
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
                echo ($isMember->gender == 1) ? 'Male' :
                (($isMember->gender == 2) ? 'Female' :
                (($isMember->gender == 3) ? 'Transgender' :
                (($isMember->gender == 4) ? 'Rather not say' :
                '<span class="text-center text-danger">N/A</span>')));
                ?>
            </span>
            </div>
            </div>
            </div>
            </div>
<!-- ---------------------------- Personal Information section end ----------------------------------------- -->

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