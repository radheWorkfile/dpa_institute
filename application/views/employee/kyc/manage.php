<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $title; ?></h4>
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
                                            <th><strong>Donation Id</strong></th>
                                            <th><strong>Name</strong></th>
                                            <th><strong>Mobile No</strong></th>
                                            <th><strong>Image</strong></th>
                                            <th><strong>Amount</strong></th>
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

<script src="<?php echo base_url('assets/js/employee/donation/add_donation.js') ?>"></script>






