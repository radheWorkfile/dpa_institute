		  <!-- volunteer   project    services   accounting -->
		<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
		<?php $custom_setting = $this->db->select('*')->get('setting')->row();?>

		<!DOCTYPE html>	<html lang="en">	
		<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="author" content="DexignLab">
		<meta name="robots" content="">
		<meta name="keywords" content="<?php echo config_item('company_name'); ?>">
		<meta name="description" content="<?php echo config_item('company_name'); ?>">
		<meta property="og:title" content="<?php echo config_item('company_name'); ?>">
		<meta property="og:description" content="<?php echo config_item('company_name'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $custom_setting->company_name ? $custom_setting->company_name : config_item('company_name'); ?>| Employee </title>
		<link rel="icon" href="<?php echo base_url($custom_setting->favicon?$custom_setting->favicon:'NGO');?>">
		<link href="<?php echo base_url('assets/vendor/jqvmap/css/jqvmap.min.css');?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/chartist/css/chartist.min.css');?>">'
    	<link href="<?php echo base_url('assets/vendor/datatables/css/jquery.dataTables.min.css');?>" rel="stylesheet">
    	<link href="<?php echo base_url('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/2.0/LineIcons.css');?>" rel="stylesheet">
    	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/toastr/css/toastr.min.css');?>">
    	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-datepicker.min.css');?>"> 
   
		<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
		<script>var miUrl='<?php echo base_url();?>';
		</script>
		<style>
		@-webkit-keyframes spin{0%{-webkit-transform: rotate(0deg);}100%{-webkit-transform:rotate(360deg);}}@keyframes spin{0%{transform:rotate(0deg);}100%{transform:rotate(360deg);}}
		.bx-spin{-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite}.bx-spin-hover:hover{-webkit-animation:spin 2s linear infinite;animation:spin 2s linear infinite}		
		.arvToast{ z-index: 111;position: fixed;right: 20px;top: 80px;min-width: 420px; visibility: hidden;}.tChild{background-color:#fff;padding:15px 20px 15px 15px;border-bottom:3px solid #e3e3e3;box-shadow: 0rem 0.3125rem 0.3125rem 0rem rgba(82, 63, 105, 0.05);margin-bottom: 10px;}.mClose{ float: right;font-size: 16px;cursor: pointer;margin: 0px -5px 2px 10px;}.tSuccess{ background-color: #0D9299;border-bottom:3px solid #006F75;;color: white;}.tDanger{ background-color: #d73300;border-bottom: 3px solid #c12e00;color: white;}.tWarning{ background-color: #f0d22e;border-bottom: 3px solid #d0b103;color: #8e5d00;}.tDefault{background-color: #d5d5d5;border-bottom: 3px solid #b9b9b9;color: #5b5b5b;}.tPrimary{ background-color: #5351F4;border-bottom: 3px solid #3736AF;color: #fff;}	
		.table .thead-arvDef th {background-color:#0c5edd;color:#fff;}
		.pull-right{ float:right;}
		.rvClose{ float:right;margin:-10px -10px 0px 0px;font-size:12px;}
		.delsMsg {color: #716d6c;text-align: center;font-size: 20px;margin: 30px 0px 10px 0px;}
		.actnData {text-align: center;margin: 0px 0px 20px 0px;color: #db3704;font-size: .8rem;}
		.border-radius-2{border-radius:2rem;}
		.bg-g{background-image: linear-gradient(to bottom right, #12c1ca, #13999f);}
		.font-size-2{font-size:2rem;margin-bottom:-0.5rem;}
		.shadow-hover:hover{box-shadow:5px 5px 22px grey;}
		.miLvs{ padding-left:13px;padding-right:13px;border-radius:none;}
		.border-1{border:1px solid #128388;}
		.border-radius-1{border-radius:1rem;}
		.cursor-pointer{cursor: pointer;}
		.text-center{text-align:center;}
		@keyframes blinkRed {0% {border-radius:1rem; color: white;}50% { color: transparent; }100% { color: #106468; }}
		.blink-red {animation: blinkRed 2s infinite; padding:0.2rem 0rem;}

		.table >thead >tr >th:last-child.sorting{background-image: none!important;}
		 table >thead >tr >th:last-child.sorting_asc{background-image: none!important;}
		 table >thead >tr >th:last-child.sorting_desc{background-image: none!important;}


		</style>
		</head>
		<body>
		<input type="hidden" value="<?php echo base_url();?>" id="base_url"/>
		<!--*******************
		Preloader start
		********************-->
		<div id="preloader">
		<div class="sk-three-bounce">
		<div class="sk-child sk-bounce1"></div>
		<div class="sk-child sk-bounce2"></div>
		<div class="sk-child sk-bounce3"></div>
		</div>
		</div>
		<!--*******************
		Preloader end
		********************-->		
		<!--**********************************
		Main wrapper start
		***********************************-->
		<div id="main-wrapper">
		<div class="arvToast" style="visibility:hidden;"></div>		            
		<div class="modal fade" id="deletePanel" style="display: none;" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-body">
		<button type="button" class="btn-close rvClose" data-bs-dismiss="modal" aria-label="Close"></button>
		<div class="delsMsg"><i class="fa fa-trash"></i> Delete Details</div>
		<div class="actnData"><i class="fa fa-exclamation-triangle"></i> Do you wish to delete request details ?</div>
		<div id="mdlFtrBtn">
		<button type="button" class="btn btn-outline-danger pull-right getTargetAction" id="cnfChanges" data-id="@misingh">Confirm Delete  <i class="fa-solid fa-trash-can"></i></button>
		<button type="button" class="btn btn-outline-dark pull-right miIcn" data-bs-dismiss="modal" style="margin-right:10px;"> <i class="fa fa-arrow-left"></i> Back </button>   
		</div>                
		</div>
		</div>
		</div>
		</div>
            
		<?php  $this->load->view('employee/include/top_navbar');
		$this->load->view('employee/include/header');
		$this->load->view('employee/include/side_bar');
    
		if (!empty($layout) && trim($layout)!==""){require_once($layout);}
		else 
		{
		?>
		<!--**********************************
		Content body start
		***********************************-->
		<div class="content-body">
		<!-- row -->
		<div class="container-fluid">
		<div class="row">
		<div class="col-xl-9 col-xxl-12">
		<div class="row">

<!-- ************************ Dashboard section start form here ********************  -->

		<div class="row">	
		<?php if($kyc_update->kyc_status == 1):?>
		<div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">
		<div class="box-shadow p-3 bg-g shadow-hover">
		<p class="text-center font-size-2">
		<span class="text-white border-radius-2"><i class="fa fa-user blink-red" aria-hidden="true"></i></span>
		</p>
		<h3 class="text-center text-white py-2"> <a href="<?php echo base_url('employee/kyc_verified');?>" class="blink-red">Complete Your KYC</a></h3>
		</div>
		</div>
		<?php else:?>
		<div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">	
		<div class="box-shadow p-1 bg-g shadow-hover">
		<p class="text-center font-size-2"><span class="p-3 text-white border-radius-2"><i class="fa fa-inr" aria-hidden="true"></i></span></p>
		<p class="text-center text-white">Donation Amount<span>&nbsp;( ₹ <?php echo $donation_amount->amount?$donation_amount->amount.'.00':'<span class="text-canger">N/A</span>';?> )</span></p>
		<p class="text-center mt--1"><a href="<?php echo base_url();?>employee/donation/index/manage" class="text-white"><span class="px-3 cursor-pointer border-1 border-radius-1">View More</span></a></p>
		</div>
		</div>
		<?php endif;?>
		


		<div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">	
		<div class="box-shadow p-1 bg-g shadow-hover">
		<p class="text-center font-size-2"><span class="p-3 text-white border-radius-2"><i class="fa fa-user" aria-hidden="true"></i></span></p>
		<p class="text-center text-white">Today Expense <span>&nbsp;( <?php echo $total_member?$total_member:'<span class="text-canger">1.00</span>';?> )</span></p>
		<p class="text-center mt--1"><a href="<?php echo base_url();?>donation/donatePay" class="text-white"><span class="px-3 cursor-pointer border-1 border-radius-1">View More</span></a></p>
		</div>
		</div>
		
		<div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">	
		<div class="box-shadow p-1 bg-g shadow-hover">
		<p class="text-center font-size-2"><span class="p-3 text-white border-radius-2"><i class="fa fa-inr" aria-hidden="true"></i></span></p>
		<p class="text-center text-white">Total Expense <span>&nbsp;( ₹ <?php echo $today_donation_amo['amount']?$today_donation_amo['amount']:'<span class="text-canger">1.00</span>';?> )</span></p>
		<p class="text-center mt--1"><a href="<?php echo base_url();?>donation/donatePay" class="text-white"><span class="px-3 cursor-pointer border-1 border-radius-1">View More</span></a></p>
		</div>
		</div>

		

		</div>


		<div class="row mt-3">		
		<div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">	 
		<div class="box-shadow p-1 bg-g shadow-hover">
		<p class="text-center font-size-2"><span class="p-3 text-white border-radius-2"><i class="fa fa-users" aria-hidden="true"></i></span></p>
		<p class="text-center text-white">Total Volunteer<span>&nbsp;( <?php echo $countVolunteer?$countVolunteer:'<span class="text-canger"> N/A </span>';?> )</span></p>
		<p class="text-center mt--1"><a href="<?php echo base_url();?>employee/front_cms/volunteer" class="text-white"><span class="px-3 cursor-pointer border-1 border-radius-1">View More</span></a></p>
		</div>		
	    </div>	
		
        <div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">	
		<div class="box-shadow p-1 bg-g shadow-hover">
		<p class="text-center font-size-2"><span class="p-3 text-white border-radius-2"><i class="fa fa-user-plus" aria-hidden="true"></i></span></p>
		<p class="text-center text-white">Today Event<span>&nbsp;( <?php echo $countEvent?$countEvent:'<span class="text-canger"> N/A </span>';?> )</span></p>
		<p class="text-center mt--1"><a href="<?php echo base_url();?>employee/front_cms/event" class="text-white"><span class="px-3 cursor-pointer border-1 border-radius-1">View More</span></a></p>
		</div>		
	    </div>	
		
		
		<div class="col-xl-4 col-xxl-4 col-lg-4 col-sm-6">	
		<div class="box-shadow p-1 bg-g shadow-hover">
		<p class="text-center font-size-2"><span class="p-3 text-white border-radius-2"><i class="fa fa-tasks" aria-hidden="true"></i></span></p>
		<p class="text-center text-white">Running Project<span>&nbsp;( <?php echo $countAssignPro?$countAssignPro:'<span class="text-canger"> N/A </span>';?> )</span></p>
		<p class="text-center mt--1"><a href="<?php echo base_url();?>employee/work_assign/running_work" class="text-white"><span class="px-3 cursor-pointer border-1 border-radius-1">View More</span></a></p>
		</div>
		</div>




	    </div>

		<div class="row">
		<div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 mt-4">
		<div class="card overflow-hidden">
		<div class="card-body px-4 py-4">
		<h5 class="mb-3">1700 / <small class="text-primary">Our Project Status</small></h5>
		<div class="chart-point">
		<div class="check-point-area">
		<canvas id="ShareProfit2" width="100" height="100" style="display: block; box-sizing: border-box; height: 100px; width: 100px;"></canvas>
		</div>
		<ul class="chart-point-list">
		<li><i class="fa fa-circle text-primary me-1"></i>  40% Hospital</li>
		<li><i class="fa fa-circle text-success me-1"></i>  35% School</li>
		<li><i class="fa fa-circle text-warning me-1"></i>  25% Child Care</li>
		</ul>
		</div>
		</div>
		</div>
		</div>
		</div>
		

<!-- ************************ Dashboard section start form here ********************  -->

		<div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12 mt-\">
		<div class="card active_users">
		<div class="card-header bg-success border-0 pb-0">
		<h4 class="card-title text-white">Active Users</h4>
		</div>
		<div class="bg-success">
		<canvas id="activeUser" height="200"></canvas>
		</div>

		<div class="card-body pt-0">
		<div class="list-group-flush mt-4">
		<div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1 font-weight-semi-bold border-top-0 border-0 border-bottom" style="border-color: rgba(255, 255, 255, 0.15)">
		<p class="mb-0">Top Active Pages</p>
		<p class="mb-0">Active Users</p>
		</div>
		<div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1 border-0 border-bottom" style="border-color: rgba(255, 255, 255, 0.05)">
		<p class="mb-0">Total Volunteer 12 + </p>
		<p class="mb-0">3</p>
		</div>
		<div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1 border-0 border-bottom" style="border-color: rgba(255, 255, 255, 0.05)">
		<p class="mb-0">Today Event +</p>
		<p class="mb-0">2</p>
		</div>
		<div class="list-group-item bg-transparent d-xxl-flex justify-content-between px-0 py-1 d-none" style="border-color: rgba(255, 255, 255, 0.05)">
		<p class="mb-0">/</p>
		<p class="mb-0">2</p>
		</div>
		<div class="list-group-item bg-transparent d-xxl-flex justify-content-between px-0 py-1 d-none" style="border-color: rgba(255, 255, 255, 0.05)">
		<p class="mb-0">/preview/falcon/dashboard/</p>
		<p class="mb-0">2</p>
		</div>
		<div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1 border-0 border-bottom" style="border-color: rgba(255, 255, 255, 0.05)">
		<p class="mb-0">Our Team Member 13 +</p>
		<p class="mb-0">1</p>
		</div>
		</div>
		</div>
		</div>
		</div>

<!-- ************************ Dashboard section start form here ********************  -->
      	<div class="col-xl-8 col-xxl-8 col-lg-8 col-md-8">
		<div id="user-activity" class="card">
		<div class="card-header border-0 pb-0 d-sm-flex d-block">
		<div>
		<h4 class="card-title">Our Project Status 2024 - 2025</h4>
		<p class="mb-1">Lorem Ipsum is simply dummy text of the printing</p>
		</div>
		<div class="card-action">
		<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
		<a class="nav-link active" data-bs-toggle="tab"  data-bs-target="#month" href="#user" role="tab"  aria-selected="true"> Month
		</a>
		</li>

		<li class="nav-item">
		<a class="nav-link" data-bs-toggle="tab" data-bs-target="#week"  href="#bounce" role="tab" aria-selected="false">Weekly</a>
		</li>
		<li class="nav-item">
		<a class="nav-link" data-bs-toggle="tab" data-bs-target="#today" href="#session-duration" role="tab"  aria-selected="false">Today</a>
		</li>
		</ul>		
		</div>
		</div>
		<div class="card-body">
		<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="user" role="tabpanel">
		<canvas id="activity" class="chartjs"></canvas>
		</div>
		</div>
		</div>
		</div>
		</div>
						
		</div>
		</div>

		<div class="col-xl-3 col-xxl-4 col-lg-12 col-md-12">
		<div class="card bg-primary text-white">
		<div class="card-header pb-0 border-0">
		<h4 class="card-title text-white">Employee List...</h4>
		</div>
		<div class="card-body"> 
		<div class="widget-media">
		<ul class="timeline">
        <?php if(!empty($fiveEmployee)):?>
		<?php foreach($fiveEmployee as $emp):?>
			<li>
			<div class="timeline-panel">
			<div class="media me-2 media-info" style="font-size:1rem;"><i class="fa fa-home"></i>
			</div>
			<div class="media-body">
			<h5 class="mb-1 text-white"><?php echo $emp['first_name'];?></h5>
			<small class="d-block"><?php echo $emp['created_date'];?></small>
			</div>
			<div class="dropdown">
			<button type="button" class="btn btn-info light sharp" data-bs-toggle="dropdown">
			<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
			</button>
			<div class="dropdown-menu">
			<a class="dropdown-item" href="#">Edit</a>
			</div>
			</div>
			</div>
			</li>
		<?php endforeach;?>
		<?php else:?>
		<li>
		<div class="timeline-panel">
		<div class="media me-2 media-info">KG
		</div>
		<div class="media-body">
		<h5 class="mb-1 text-white">Ajay kumar</h5>
		<small class="d-block">29 July 2023 - 02:26 PM</small>
		</div>
		<div class="dropdown">
		<button type="button" class="btn btn-info light sharp" data-bs-toggle="dropdown">
		<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item" href="#">Edit</a>
		<a class="dropdown-item" href="#">Delete</a>
		</div>
		</div>
		</div>
		</li>
		<li>
		<div class="timeline-panel">
		<div class="media me-2 media-success">
		<i class="fa fa-home"></i>
		</div>
		<div class="media-body">
		<h5 class="mb-1 text-white">Radhe kumar</h5>
		<small class="d-block">29 July 2023 - 02:26 PM</small>
		</div>
		<div class="dropdown">
		<button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
		<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item" href="#">Edit</a>
		<a class="dropdown-item" href="#">Delete</a>
		</div>
		</div>
		</div>
		</li>
		<?php endif;?>
		</ul>
		</div>		
		</div>								 							
		</div>
		</div>												
		</div>
		</div>
		</div>
		<!--********************************** Content body end ***********************************-->
		<!-- =================================== Model section start ======================== -->
			<div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">			<div class="modal-dialog" role="document">
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
			</div>			</div>			</div>
        <!-- =================================== Model section End ======================== -->
		
		<!--********************************** Content body end ***********************************-->
 		<?php } $this->load->view('employee/include/footer'); ?>
 