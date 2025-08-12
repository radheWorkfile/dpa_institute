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
                                <table id="donatePay" data-id="<?php echo $targetDonationList; ?>" class="table table-hover table-responsive-sm mb-0">
                                    <thead class="thead-arvDef">
                                        <tr>
                                            <th class="text-center"><strong>S.No</strong></th>
                                            <th class="text-center"><strong>Donation Id</strong></th>
                                            <th class="text-center"><strong>Name</strong></th>
                                            <th class="text-center"><strong>Email-Id</strong></th>
                                            <th class="text-center"><strong>Mobile No</strong></th>
                                            <th class="text-center"><strong>Image</strong></th>
                                            <th class="text-center"><strong>Amount</strong></th>
                                            <th class="text-center"><strong>Status</strong></th>
                                            <th class="text-center"><strong>Actions</strong></th>
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

             <!-- =================================== Status Model section End ======================== -->
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
<!-- =================================== Status Model section End ======================== -->
<script src="<?php echo base_url('assets/js/admin/employee.js') ?>"></script>
<script>
    var donationListMan = '';            
     $(document).ready(function() {
     let searchObj = {};
     var targetAction = $('#donatePay').attr('data-id');
     donationListMan = {
     printTable: function(search_data) {
     getpaginate(search_data, '#donatePay', targetAction, 'Only For Tnx id, Month.');
     }
     };
     donationListMan.printTable(searchObj);           
     });
</script>


