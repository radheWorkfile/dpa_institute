<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-white"><?php echo $title; ?></h4>
                        <div class="card-action">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item py-1">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- --------------------------- News List Section Start ------------------- -->
                    <div class="tab-content" id="banner_list" style="padding:1rem 2rem;">
                        <div class="tab-pane fade active show" id="allMembers" role="tabpanel">
                            <div class="table-responsive">
                                <table id="targetItem" data-id="<?php echo $targetItemLIst; ?>" class="table table-hover table-responsive-sm mb-0">
                                    <thead class="thead-arvDef">
                                        <tr>
                                            <th><strong>S.No</strong></th>
                                            <th><strong>Emp Id</strong></th>
                                            <th><strong>Name</strong></th>
                                            <th><strong>Mobile No</strong></th>
                                            <th><strong>Aadhaar No</strong></th>
                                            <th><strong>Pan No</strong></th>
                                            <th><strong>Status</strong></th>
                                            <th style="width:85px;"><strong>Actions</strong></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- --------------------------- News List Section End ------------------- -->
                </div>
            </div>
        </div>
    </div>
</div>

           
        <div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
        <div class="delMsg"><i class="fe fe-sliders"></i><span><i class="fas fa-gear fa-spin" style="font-size:14px;color:#6a4343;"></i></span><span style="color:#6a4343;"> Manage Status</span></div>
        <div class="actnData py-2"> Are you sure want to Approve of Shift ID #F33333</div>
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


<script src="<?php echo base_url('assets/js/admin/kyc/kyc_verified.js') ?>"></script>







