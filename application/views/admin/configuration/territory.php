<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
         	<div class="default-tab">
				 <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#state_details" aria-selected="true" role="tab"><i class="la la-home me-2"></i> State</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#district_details" aria-selected="false" role="tab" tabindex="-1"><i class="la la-pie-chart me-2"></i> District</a>
                        </li>
                         <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#block_office" aria-selected="false" role="tab" tabindex="-1"><i class="la la-map-pin me-2"></i> Block</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#panchayat_details" aria-selected="false" role="tab" tabindex="-1"><i class="la la-headset me-2"></i> Panchayat</a>
                        </li>
                       
                        
                         <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#villageTown" aria-selected="false" role="tab" tabindex="-1"><i class="la la-route me-2"></i>Village/Town</a>
                        </li>
                         
                        
                        
                    </ul>



      
<div class="createNewBtn">
    <i class="la la-folder-plus me-1"></i>Create New
</div>
                 <div class="card-body">
                    
                    <div class="tab-content">
                    <div class="tab-pane fade active show" id="state_details" role="tabpanel">
                        <div class="pt-2">
                           <table id="tblReportState" data-id="<?php echo $stateAction;?>" class="table table-hover table-responsive-sm mb-0">
                           	  <thead class="thead-arvDef"><tr><th>S.No</th><th>State Name</th><th>Status</th><th><div class="text-center">Action</div></th></tr></thead>
                              <tbody></tbody>
                           </table>            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="district_details" role="tabpanel">
                        <div class="pt-2">
                           <table id="tblReportDistrict"  data-id="<?php echo $districtAction;?>" class="table table-hover table-responsive-sm mb-0">
                           		<thead class="thead-arvDef"><tr><th>S.No</th><th>District Name</th><th>State Name</th><th>Status</th><th>Action</th></tr></thead>
                                <tbody></tbody>
                           </table>  
                        </div>
                    </div>
                     <div class="tab-pane fade" id="block_office" role="tabpanel">
                        <div class="pt-2">
                           <table id="tblReportBlock"  data-id="<?php echo $blockAction;?>"  class="table table-hover table-responsive-sm mb-0"><thead class="thead-arvDef"><tr><th>S.No</th><th>Block Name</th><th>District</th><th>Status</th><th>Action</th></tr></thead><tbody></tbody></table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="panchayat_details" role="tabpanel">
                         <div class="pt-2">
                           <table id="tblReportPanchayat"  data-id="<?php echo $panchayatAction;?>"  class="table table-hover table-responsive-sm mb-0">
                           		<thead class="thead-arvDef"><tr><th>S.No</th><th>Panchayat Name</th><th>Block Name</th><th>Status</th><th>Action</th></tr></thead>
                                <tbody></tbody>
                           </table>
                        </div>
                    </div>
                   
                    <div class="tab-pane fade" id="villageTown" role="tabpanel">
                        <div class="pt-2">
                           <table id="tblReportVillageTown" data-id="<?php echo $twnVillageAction;?>"  class="table table-hover table-responsive-sm mb-0">
                           		<thead class="thead-arvDef"><tr><th>S.No</th><th>Village/Town Name</th><th>Panchayat Name</th><th>Status</th><th><div class="text-center">Action</div></th></tr></thead>
                                <tbody></tbody>
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
</div>
<style>
.default-tab .nav-link{padding:20px;}	
.default-tab .nav-link.active{border-radius:0px !important;/*border:3px solid #006f75;*/background-color: #006f75;color: #fff;}
.default-tab .nav-link.active i{color:#fff !important;}
.nav-link:focus,.nav-link:hover{border-radius:0px !important;border-top:0px solid #006f75 !important;}	
/*.createNewBtn{ float:right;color:#fff;padding:23px 20px 23px 20px;cursor:pointer;margin:-67px 0px 0px 0px;background-color:#006f75;border-top-right-radius: 5px;}*/
.createNewBtn{ float:right;color:#006f75;padding:10px;cursor:pointer;margin:-52px 10px 0px 0px;/*background-color:#006f75;*/font-weight: 500;}
.createNewBtn:hover{ color:#4a85ff;}
#tblReportDistrict,#tblReportState,#tblReportBlock,#tblReportPanchayat,#tblReportVillageTown{ width:100% !important;}
</style>

<script src="<?php echo base_url('assets/js/admin/territory.js') ?>"></script>
