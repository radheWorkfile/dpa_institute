<?php $getClass=$this->router->fetch_class();?>
<!--**********************************Nav header start***********************************-->
    <div class="nav-header">
        <a href="javaScript:void(0);" class="brand-logo">
            <img class="logo-abbr" src="<?php echo base_url('front/logo/software-logo.png');?>" alt="">
            <img class="logo-compact" src="<?php echo base_url('front/logo/fabicon.png');?>" alt="">
            <img class="brand-title" src="<?php echo base_url('front/logo/fabicon.png');?>" alt="">
        </a>
    
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
<!--**********************************Nav header end ***********************************-->
<!--**********************************Sidebar Fixed***********************************-->
		<div class="fixed-content-box">
			<div class="head-name">
				<?php echo config_item("logo_nm");?>
				<span class="close-fixed-content fa-left d-lg-none">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
				</span>
			</div>


			<div class="fixed-content-body dz-scroll" id="DZ_W_Fixed_Contant">
				<div class="tab-content" id="menu">
					<div class="tab-pane chart-sidebar fade <?php if($getClass=='territory'){ echo 'active show';}?>" id="dashboard-area" role="tabpanel"></div>
					

					<div class="tab-pane fade <?php if($getClass=='employee/member'){ echo 'active show';}?>" id="memberItem">
						<ul class="metismenu tab-nav-menu">
							<li class="mm-active">
                                <a class="has-arrow" href="javascript:void()" aria-expanded="true">
								<svg id="icon-apps" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="9" cy="7" r="4"></circle>
                                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
										Membership
							    </a>
								<ul aria-expanded="false"  class="mm-collapse mm-show">
									<li><a href="<?php echo base_url('employee/member/create');?>">Create Member</a></li>
                                    <li><a href="<?php echo base_url('employee/member/manage');?>">Manage Member</a></li>
                                    <li><a href="<?php echo base_url('employee/kyc_verified ');?>">KYC Procedure</a></li>
                                    <!-- <li><a href="<?php echo base_url('employee/kyc_verified/approve_kyc');?>">KYC Update</a></li> -->
                               </ul>     
							</li>
						</ul>
					</div>


				

					<div class="tab-pane fade <?php if($getClass=='employee/member/front_cms'){ echo 'active show';}?>" id="front_cms">
					<ul class="metismenu tab-nav-menu">
					<li class="mm-active">
					<a class="has-arrow" href="javascript:void()" aria-expanded="true">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><polygon fill="#000000" opacity="0.3" points="5 7 5 15 19 15 19 7"></polygon>       <path d="M11,19 L11,16 C11,15.4477153 11.4477153,15 12,15 C12.5522847,15 13,15.4477153 13,16 L13,19 L14.5,19 C14.7761424,19 15,19.2238576 15,19.5 C15,19.7761424 14.7761424,20 14.5,20 L9.5,20 C9.22385763,20 9,19.7761424 9,19.5 C9,19.2238576 9.22385763,19 9.5,19 L11,19 Z" fill="#000000" opacity="0.3"></path><path d="M5,7 L5,15 L19,15 L19,7 L5,7 Z M5.25,5 L18.75,5 C19.9926407,5 21,5.8954305 21,7 L21,15 C21,16.1045695 19.9926407,17 18.75,17 L5.25,17 C4.00735931,17 3,16.1045695 3,15 L3,7 C3,5.8954305 4.00735931,5 5.25,5 Z" fill="#000000" fill-rule="nonzero"></path></g></svg>
					Front CMS
					</a>
					<ul aria-expanded="false"  class="mm-collapse mm-show">
					<li><a href="<?php echo base_url('employee/front_cms/volunteer'); ?>">Volunteer</a></li>
					<li><a href="<?php echo base_url('employee/front_cms/event'); ?>">Event</a></li>
					<li><a href="<?php echo base_url('employee/front_cms/ticket'); ?>">Ticket</a></li>
					<li><a href="<?php echo base_url('employee/front_cms/feedback'); ?>">Feedback</a></li>
					</ul>     
					</li>
					</ul>
					</div>


					<div class="tab-pane fade <?php if($getClass=='employee/Donation'){ echo 'active show';}?>" id="donation">
						<ul class="metismenu tab-nav-menu">
							<li class="mm-active">
                                <a class="has-arrow" href="javascript:void()" aria-expanded="true">
								<svg id="icon-apps" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="9" cy="7" r="4"></circle>
                                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
								        Donation
							    </a>
								<ul aria-expanded="false"  class="mm-collapse mm-show">
								    <li><a href="<?php echo base_url('employee/donation');?>">Add Donation</a></li>
								    <li><a href="<?php echo base_url('employee/donation/index/manage');?>">Manage Donation</a></li>
                               </ul>     
							</li>
						</ul>
					</div>


					<div class="tab-pane fade <?php if($getClass=='employee/work_assign'){ echo 'active show';}?>" id="workManagement">
						<ul class="metismenu tab-nav-menu">
							<li class="mm-active">
                                <a class="has-arrow" href="javascript:void()" aria-expanded="true">
								<svg id="icon-apps" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="9" cy="7" r="4"></circle>
                                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
								        Wrok Management
							    </a>
								<ul aria-expanded="false"  class="mm-collapse mm-show">
								    <li><a href="<?php echo base_url('employee/work_assign');?>">Assign work</a></li>
								    <li><a href="<?php echo base_url('employee/work_assign/running_work');?>">Running work</a></li>
								    <li><a href="<?php echo base_url('employee/work_assign/closed_work');?>">Closed work</a></li>
                               </ul>     
							</li>
						</ul>
					</div>



					<div class="tab-pane fade <?php if($getClass=='employee/member/Account'){ echo 'active show';}?>" id="account">
						<ul class="metismenu tab-nav-menu">
							<li class="mm-active">
                                <a class="has-arrow" href="javascript:void()" aria-expanded="true">
								<svg id="icon-apps" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                  <circle cx="9" cy="7" r="4"></circle>
                                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
								        Accounting
							    </a>
								<ul aria-expanded="false"  class="mm-collapse mm-show">
								    <li><a href="javaScript:void(0);">Add Expense</a></li>
								    <li><a href="javaScript:void(0);">P & L Account</a></li>
								    <li><a href="javaScript:void(0);">Balance Account</a></li>
                               </ul>     
							</li>
						</ul>
					</div> 




				</div>
				<div class="tab-pane chart-sidebar fade show active" role="tabpanel">
					<div class="card">
						<div class="card-header align-items-start">
							<div>
								<h4>Welcome</h4>
								<h6>Our Project Status </h6>
								<p>Welcome! Thrilled to achieve greatness together.</p>
							</div>
							<span class="btn btn-primary light sharp ms-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/><rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/><path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/><rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/></g></svg>
							</span>
						</div>
						<div class="card-body">
							<canvas id="daily-sales-chart" height="85" style="height:85px;"></canvas>
						</div>
					</div>
					<div class="card bg-warning-light">
						<div class="card-header align-items-start mb-3">
							<div>
								<h6>Profit Share</h6>
								<p>Check out each colum for more details</p>
							</div>
							<span class="btn btn-warning light sharp ms-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/><path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/></g></svg>
							</span>
						</div>
						<div class="card-body">
							<div class="chart-point">
								<div class="check-point-area">
									<canvas id="ShareProfit"></canvas>
								</div>
								<ul class="chart-point-list">
									<li><i class="fa fa-circle text-primary me-1"></i> 40% Tickets</li>
									<li><i class="fa fa-circle text-success me-1"></i> 35% Events</li>
									<li><i class="fa fa-circle text-warning me-1"></i> 25% Other</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="card bg-info-light">
						<div class="card-header align-items-start mb-3">
							<div>
								<h6>Working Project</h6>
								<p>Check out each colum for more details.</p>
							</div>
							<span class="btn btn-info light sharp ms-2">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z" fill="#000000"/><rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"/></g></svg>
							</span>
						</div>
						<div class="card-body">
							<p class="mb-2 d-flex"><img width="22" height="22" src="<?php echo base_url('assets/images/browser/icon1.png');?>" class="me-2" alt="">Photoshop
								<span class="pull-right text-warning ms-auto">85%</span>
							</p>
							<div class="progress mb-3" style="height:4px">
								<div class="progress-bar bg-warning progress-animated" style="width:85%; height:4px;" role="progressbar">
									<span class="sr-only">60% Complete</span>
								</div>
							</div>
							<p class="mb-2 d-flex"><img width="22" height="22" src="<?php echo base_url('assets/images/browser/icon2.png');?>" class="me-2" alt="">Code editor
								<span class="pull-right text-success ms-auto">90%</span>
							</p>
							<div class="progress mb-3" style="height:4px">
								<div class="progress-bar bg-success progress-animated" style="width:90%; height:4px;" role="progressbar">
									<span class="sr-only">60% Complete</span>
								</div>
							</div>
							<p class="mb-2 d-flex"><img width="22" height="22" src="<?php echo base_url('assets/images/browser/icon1.png');?>" class="me-2" alt="">Illustrator
								<span class="pull-right text-danger ms-auto">65%</span>
							</p>
							<div class="progress" style="height:4px">
								<div class="progress-bar bg-danger progress-animated" style="width:65%; height:4px;" role="progressbar">
									<span class="sr-only">60% Complete</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--**********************************Sidebar End***********************************-->
