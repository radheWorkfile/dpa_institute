<?php 
	$getMethod=$this->router->fetch_method();
	$getMembers=array('statewise'=>'State Wise','districtwise'=>'District Wise','blockwise'=>'Block Wise','panchayatwise'=>'Panchayat Wise','villagewise'=>'Village Wise','mentor'=>'Mentors','founder'=>'Founders','guest'=>'Guest','manage'=>'Members');
	$getCurentList=$getMembers[$getMethod]?$getMembers[$getMethod]:'Members';
?>
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
<div class="col-xl-12 col-lg-12">    
    <div id="user-activity" class="card">
        <div class="card-body">
        	<div class="tab-content">
            	<div class="tab-pane fade active show" id="allMembers" role="tabpanel">
                    <div class="table-responsive">
                        <table id="memberList" data-id="<?php echo $memListItem;?>" class="table table-hover table-responsive-sm mb-0">
                            <thead class="thead-arvDef">
                                <tr>
                                    <th class="text-center"><strong>S.No</strong></th>
                                    <th class="text-center"><strong>Registration ID</strong></th>
                                    <th class="text-center"><strong>Name</strong></th>
                                    <th class="text-center"><strong>Mobile Number</strong></th>
                                    <th class="text-center"><strong>Email Id</strong></th>
                                    <th class="text-center"><strong>Registration Date</strong></th>
                                    <?php if($getMethod!='guest'){?><th class="text-center"><strong>Status</strong></th><?php }?>
                                    <th class="text-center"><strong>Actions</strong></th>
                                </tr>
                            </thead>
                        </table>                    
                      </div>
                </div>
           
            </div>
        </div>
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
    <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfChangesStatus" data-id="@misingh143">Confirm <i class="si si-check"></i>
    </button>
    <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal" style="margin-right:10px;">
    <i class="fa fa-arrow-left"></i> Back 
    </button>   
    </div>	
    </div>
    </div>
    </div>
    </div>  <!-- =================================== Status Model section End ======================== -->
<style>






.headIcn{color:#3a7afe;margin-bottom:-8px !important;}
.headIcn i{ background-color:#3a7afe;padding: 5px; color:#fff;border-radius: 5px;}
	.frBsnsDetails,#crntJBLoc{ display:none;}
	.sRvActive{padding: 4px 15px 4px 15px;background-color: #0AC89024;color: #009569;border-radius: 3px; cursor:pointer;font-size: .8rem;}
	.sRvDeactive{padding: 4px 8px 4px 8px;background-color:#EE4B5C4F;color: #EE4B5C;border-radius: 3px; cursor:pointer;font-size: .8rem;}
	.sRvSuspnd{padding: 4px 8px 4px 8px;background-color:#FF9F003D;color: #9D6200;border-radius: 3px; cursor:pointer;font-size: .8rem;}
</style>
<script src="<?php echo base_url('assets/js/employee/member.js') ?>"></script>

