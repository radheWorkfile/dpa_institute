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
        <div class="card-header border-0 pb-0 d-sm-flex d-block">
            <div> <h4 class="card-title headIcn" id="crdTitle"> <i class="la la-users"></i> <?php echo $breadcrums;?> </h4></div>
          <?php if($getMethod!='guest'){?>
            <div class="card-action">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                    	<a class="nav-link miOjArvAction" data-bs-toggle="tab"  data-bs-target="#allMembers" href="javascript:void(0)" role="tab" aria-selected="false" data-id="<?php echo $getCurentList;?>"  id="deactive_member" ><i class="fa fa-ban"></i> Deactive </a> </li>
                    <li class="nav-item">
                    	<a class="nav-link miOjArvAction" data-bs-toggle="tab" data-bs-target="#activeMembers" href="javascript:void(0)" role="tab" aria-selected="false"  data-id="<?php echo $getCurentList;?>" id="active_member"><i class="fa-regular fa-circle-check"></i> Active</a> </li>
                    <li class="nav-item"> 
                    	<a class="nav-link miOjArvAction" data-bs-toggle="tab" data-bs-target="#deactiveMembers" href="javascript:void(0)" role="tab" aria-selected="false"  data-id="<?php echo $getCurentList;?>" id="all_member" >
                        	<i class="fa fa-list"></i> All List</a>
                    </li>
                </ul>
            </div>
           <?php }?> 
        </div>
        <div class="card-body">
        	<div class="tab-content">
            	<div class="tab-pane fade active show" id="allMembers" role="tabpanel">
                    <div class="table-responsive">
                        <table id="tblDeactiveReport" data-id="<?php echo $tblDeactive;?>" class="table table-hover table-responsive-sm mb-0">
                            <thead class="thead-arvDef">
                                <tr>
                                    <th><strong>S.No</strong></th>
                                    <th><strong>Registration ID</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Mobile Number</strong></th>
                                    <th><strong>Email Id</strong></th>
                                    <th><strong>Registration Date</strong></th>
                                    <?php if($getMethod!='guest'){?><th><strong>Status</strong></th><?php }?>
                                    <th style="width:85px;"><strong>Actions</strong></th>
                                </tr>
                            </thead>
                        </table>                    
                      </div>
                </div>
              <?php if($getMethod!='guest'){?> 
                <div class="tab-pane fade" id="deactiveMembers" role="tabpanel"> 
                      <div class="table-responsive">    
                        <table id="tblReportDetails" data-id="<?php echo $targetAction;?>" class="table table-hover table-responsive-sm mb-0">
                            <thead class="thead-arvDef">
                                <tr>
                                    <th><strong>S.No</strong></th>
                                    <th><strong>Registration ID</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Mobile Number</strong></th>
                                    <th><strong>Email Id</strong></th>
                                    <th><strong>Registration Date</strong></th>
                                    <?php if($getMethod!='guest'){?><th><strong>Status</strong></th><?php }?>
                                    <th style="width:85px;"><strong>Actions</strong></th>
                                </tr>
                            </thead>
                        </table>                    
                    </div>
                    </div>
                <div class="tab-pane fade" id="activeMembers" role="tabpanel">
                    <div class="table-responsive">     
                        <table id="tblActiveReport" data-id="<?php echo $tblActiveMember;?>" class="table table-hover table-responsive-sm mb-0">
                            <thead class="thead-arvDef">
                                <tr>
                                    <th><strong>S.No</strong></th>
                                    <th><strong>Registration ID</strong></th>
                                    <th><strong>Name</strong></th>
                                    <th><strong>Mobile Number</strong></th>
                                    <th><strong>Email Id</strong></th>
                                    <th><strong>Registration Date</strong></th>
                                    <?php if($getMethod!='guest'){?><th><strong>Status</strong></th><?php }?>
                                    <th style="width:85px;"><strong>Actions</strong></th>
                                </tr>
                            </thead>
                        </table>                    
                      </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>    
   </div>
  </div>
</div>
<style>
.headIcn{color:#3a7afe;margin-bottom:-8px !important;}
.headIcn i{ background-color:#3a7afe;padding: 5px; color:#fff;border-radius: 5px;}
.frBsnsDetails,#crntJBLoc{ display:none;}
.sRvActive{padding: 4px 15px 4px 15px;background-color: #0AC89024;color: #009569;border-radius: 3px; cursor:pointer;font-size: .8rem;}
.sRvDeactive{padding: 4px 8px 4px 8px;background-color:#EE4B5C4F;color: #EE4B5C;border-radius: 3px; cursor:pointer;font-size: .8rem;}
.sRvSuspnd{padding: 4px 8px 4px 8px;background-color:#FF9F003D;color: #9D6200;border-radius: 3px; cursor:pointer;font-size: .8rem;}			
</style>
<script>
var reportAppearance = '';
var reportDeactiveAppearance = '';
var reportActiveAppearance = '';
$(document).ready(function()
{
    let searchObj = {};
    var targetAction = $('#tblReportDetails').attr('data-id');
    reportAppearance={printTable:function(search_data){getpaginate(search_data,'#tblReportDetails',targetAction,'Only For Tnx id, Month.');}}
    reportAppearance.printTable(searchObj);	
	reportDeactiveAppearance={printTable:function(search_data){getpaginate(search_data,'#tblDeactiveReport',$('#tblDeactiveReport').attr('data-id'),'Only For Tnx id, Month.');}}
    reportDeactiveAppearance.printTable(searchObj);
	reportActiveAppearance={printTable:function(search_data){getpaginate(search_data,'#tblActiveReport',$('#tblActiveReport').attr('data-id'),'Only For Tnx id, Month.');}}
    reportActiveAppearance.printTable(searchObj);	
	$(".miOjArvAction").click(function(){let getID=$(this).attr("id");let getContent=$(this).attr("data-id");if(getID=='all_member'){$('#crdTitle').html('<i class="la la-users"></i> All '+getContent);}else if(getID=='active_member'){$('#crdTitle').html('<i class="la la-users"></i> Active '+getContent);}else if(getID=='deactive_member'){$('#crdTitle').html('<i class="la la-users"></i> Deactive '+getContent);}}); 
	
});
$(function()
{
     $(document).unbind("click",'.ActnCmdByAmi').on("click",'.ActnCmdByAmi',function()
	{
		 let actNbtn=$(this).attr('id');
		 let uriActn=$(this).attr('data-id');
		 let spltStr=uriActn.split("===");
		 let targetUrl=$("#base_url").val()+spltStr[1];
		 let txtNms=(spltStr[0]=="certift")?'<i class="las la-certificate"></i>':'<i class="las la-id-card"></i>';
		 $('#'+actNbtn).html('<i class="fa fa-sun bx-spin"></i>');
		 	$.post(targetUrl,{endDt:'confirm'},
		 function(htmlAmi)
		 {
			
			$('#'+actNbtn).html(txtNms);
			var frame1 = $('<iframe />');
				frame1[0].name = "frame1";
				$("body").append(frame1);
		var frameDoc=frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
				frameDoc.document.open();
				frameDoc.document.write(htmlAmi);
				frameDoc.document.close();
				setTimeout(function(){ window.frames["frame1"].focus();window.frames["frame1"].print();frame1.remove();},500);
			});
	});
});


</script>



<!--<script src="<?php //echo base_url('assets/js/admin/member.js') ?>"></script>-->
