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
					<div class="tab-pane chart-sidebar fade <?php if($getClass=='administrator/setting'){ echo 'active show';}?>" id="dashboard-area" role="tabpanel"></div>
					 <div class="tab-pane fade" id="cms-area" role="tabpanel">
						<ul class="metismenu tab-nav-menu">
							<li class="mm-active">
								<a class="has-arrow" href="javascript:void()" aria-expanded="true">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"/>
											<path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
											<path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
										</g>
									</svg>

									Configuration
                                </a>
								<ul aria-expanded="false" class="mm-collapse mm-show">
								<li><a href="<?php echo base_url('administrator/setting');?>">System Confi.... </a></li>
																	
								</ul>
							</li>
						</ul>
					</div>


                        
					<div class="tab-pane fade <?php if($getClass=='administrator/employee'){ echo 'active show';}?>" id="apps">
					<ul class="metismenu tab-nav-menu">
					<li class="mm-active">
					<a class="has-arrow" href="javascript:void()" aria-expanded="true">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><polygon fill="#000000" opacity="0.3" points="5 7 5 15 19 15 19 7"/>       <path d="M11,19 L11,16 C11,15.4477153 11.4477153,15 12,15 C12.5522847,15 13,15.4477153 13,16 L13,19 L14.5,19 C14.7761424,19 15,19.2238576 15,19.5 C15,19.7761424 14.7761424,20 14.5,20 L9.5,20 C9.22385763,20 9,19.7761424 9,19.5 C9,19.2238576 9.22385763,19 9.5,19 L11,19 Z" fill="#000000" opacity="0.3"/><path d="M5,7 L5,15 L19,15 L19,7 L5,7 Z M5.25,5 L18.75,5 C19.9926407,5 21,5.8954305 21,7 L21,15 C21,16.1045695 19.9926407,17 18.75,17 L5.25,17 C4.00735931,17 3,16.1045695 3,15 L3,7 C3,5.8954305 4.00735931,5 5.25,5 Z" fill="#000000" fill-rule="nonzero"/></g></svg>
					<span class="nav-text">Employees</span>
					</a>
					<ul aria-expanded="false" class="mm-collapse mm-show">
					<li><a href="<?php echo base_url('administrator/employee/create');?>">Create New Employee</a></li>
					<li><a href="<?php echo base_url('administrator/employee/statewise');?>">View State Wise</a></li>
					<li><a href="<?php echo base_url('administrator/employee/districtwise');?>">View District Wise</a></li>
					<li><a href="<?php echo base_url('administrator/employee/blockwise');?>">View Block Wise</a></li>
					<li><a href="<?php echo base_url('administrator/employee/panchayatwise');?>">View Panchayat Wise</a></li>
					<li><a href="<?php echo base_url('administrator/employee/villagewise');?>">View Village/Town Wise</a></li>
					</ul>
					</li>
					</ul>

					<ul class="metismenu tab-nav-menu">
					<li class="mm-active">
					<a class="has-arrow" href="javascript:void()" aria-expanded="true">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><polygon fill="#000000" opacity="0.3" points="5 7 5 15 19 15 19 7"/>       <path d="M11,19 L11,16 C11,15.4477153 11.4477153,15 12,15 C12.5522847,15 13,15.4477153 13,16 L13,19 L14.5,19 C14.7761424,19 15,19.2238576 15,19.5 C15,19.7761424 14.7761424,20 14.5,20 L9.5,20 C9.22385763,20 9,19.7761424 9,19.5 C9,19.2238576 9.22385763,19 9.5,19 L11,19 Z" fill="#000000" opacity="0.3"/><path d="M5,7 L5,15 L19,15 L19,7 L5,7 Z M5.25,5 L18.75,5 C19.9926407,5 21,5.8954305 21,7 L21,15 C21,16.1045695 19.9926407,17 18.75,17 L5.25,17 C4.00735931,17 3,16.1045695 3,15 L3,7 C3,5.8954305 4.00735931,5 5.25,5 Z" fill="#000000" fill-rule="nonzero"/></g></svg>
					<span class="nav-text">KYC Approval</span>
					</a>
					<ul aria-expanded="false" class="mm-collapse mm-show">
					<li><a href="<?php echo base_url('administrator/kyc_verified');?>">KYC Verified</a></li>
					</ul>
					</li>
					</ul>

					</div>


					<div class="tab-pane fade <?php if($getClass=='member'){ echo 'active show';}?>" id="membershipPnl">
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
									<li><a href="<?php echo base_url('administrator/member/create');?>">Create Member</a></li>
									<li><a href="<?php echo base_url('administrator/member/guest');?>">Guest Members</a></li>
                                    <!-- <li><a href="<?//php echo base_url('administrator/member/founder');?>">Founder Manage</a></li> -->
                                    <!-- <li><a href="<?//php echo base_url('administrator/member/mentor');?>">Mentor Manage</a></li> -->
                                    <li><a href="<?php echo base_url('administrator/member/manage');?>">Member Manage</a></li>
                               </ul>     
							</li>
						</ul>
					</div>


					
					<div class="tab-pane fade <?php if($getClass=='administrator/categorie'){ echo 'active show';}?>" id="category">
					<ul class="metismenu tab-nav-menu">
					<li class="mm-active">
					<a class="has-arrow" href="javascript:void()" aria-expanded="true">
					<svg id="icon-apps" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
					<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
					<circle cx="9" cy="7" r="4"></circle>
					<path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
					<path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
					Category
					</a>
					<ul aria-expanded="false"  class="mm-collapse mm-show">
					<!-- <li><a href="<?php echo base_url('administrator/territory');?>">Territory </a></li> -->
					<li><a href="<?php echo base_url('administrator/categorie/project');?>">Create Project </a></li>
					<li><a href="<?php echo base_url('administrator/categorie/program');?>">Create Program </a></li>
					<li><a href="<?php echo base_url('administrator/categorie/income');?>">Create Income </a></li>
					<li><a href="<?php echo base_url('administrator/categorie/expense');?>">Create Expense </a></li>
					</ul>     
					</li>
					</ul>
					</div>


					<div class="tab-pane fade <?php if($getClass=='front_cms'){ echo 'active show';}?>" id="front-cms">
						<ul class="metismenu tab-nav-menu">
							<li class="mm-active">
                                <a class="has-arrow" href="javascript:void()" aria-expanded="true">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"></path><path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"></path></g></svg>
										Front-cms
							    </a>
								<ul aria-expanded="false"  class="mm-collapse mm-show">
									<li><a href="<?php echo base_url('website/front_cms/news');?>">News Notification</a></li>
								    <li><a href="<?php echo base_url('website/front_cms');?>">Banner</a></li>
									<li><a href="<?php echo base_url('website/front_cms/events');?>">Events</a></li>
									<li><a href="<?php echo base_url('website/front_cms/team_member');?>">Our Team</a></li>
                                    <li><a href="<?php echo base_url('website/front_cms/gallery');?>">Media / Galary</a></li>
									<!-- <li><a href="<?//php echo base_url('website/front_cms/scrolling_text');?>">Scrolling Text</a></li> -->
                                    <!-- <li><a href="<?//php echo base_url('website/front_cms/content_area');?>">Content Area</a></li> -->
                                    <!-- <li><a href="<?//php echo base_url('website/front_cms/client_message');?>">Client Message</a></li> -->
                                    <!-- <li><a href="<?//php echo base_url('website/front_cms/about_company');?>">About Company</a></li> -->
                                    <!-- <li><a href="<?//php echo base_url('website/front_cms/other_message');?>">President Message</a></li> -->
                               </ul>     
							</li>
						</ul>


						 <!-- <ul class="metismenu tab-nav-menu">
							<li class="mm-active">
                                <a class="has-arrow" href="javascript:void()" aria-expanded="true">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"></path><path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"></path></g></svg>
										Recent Activity
							    </a>
								<ul aria-expanded="false"  class="mm-collapse mm-show">
								    <li><a href="<?//php echo base_url('website/recent_activity/new_event');?>">New Event</a></li>
                                    <li><a href="<?//php echo base_url('website/recent_activity/activity');?>">Recent Activity</a></li>
                                    <li><a href="<?//php echo base_url('website/recent_activity/media');?>">Media / Gallery</a></li>
									<li><a href="<?//php echo base_url('website/recent_activity/notification');?>">News Notification</a></li>
									<li><a href="javaScript:void(0);">News Notification</a></li>
								</ul>     
							</li>
						</ul> -->


						<ul class="metismenu tab-nav-menu">
							<li class="mm-active">
                                <a class="has-arrow" href="javascript:void()" aria-expanded="true">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000"></path><path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3"></path></g></svg>
								Custom Settings
							    </a>
								<ul aria-expanded="false"  class="mm-collapse mm-show">
								    <li><a href="<?php echo base_url('website/volunteer');?>">Volunteer</a></li>
									<!-- <li><a href="<?php echo base_url('website/Project');?>">Project</a></li> -->
									<!-- <li><a href="<?php echo base_url('website/Project/manage_program');?>">Program</a></li> -->
									<li><a href="<?php echo base_url('website/feedback');?>">Feadback</a></li>
									<li><a href="<?php echo base_url('website/ticketing');?>">Ticket</a></li>
                               </ul>     
							</li>
						</ul>
					</div>


					<div class="tab-pane fade <?php if(($getClass=='pay')||($getClass=='donatePay')){ echo 'active show';}?>" id="donationMan">
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
								    <li><a href="<?php echo base_url('donation/pay');?>">Add Donation</a></li>
								    <li><a href="<?php echo base_url('donation/donatePay');?>">Manage Donation</a></li>
                               </ul>     
							</li>
						</ul>
					</div>

					

					<div class="tab-pane fade <?php if($getClass=='administrator/work_assign'){ echo 'active show';}?>" id="workManagement">
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
								    <li><a href="<?php echo base_url('administrator/work_assign');?>">Assign work</a></li>
								    <li><a href="<?php echo base_url('administrator/work_assign/running_work');?>">Running work</a></li>
								    <li><a href="<?php echo base_url('administrator/work_assign/closed_work');?>">Closed work</a></li>
                               </ul>     
							</li>
						</ul>
					</div>



					<div class="tab-pane fade <?php if($getClass=='administrator/accounting'){ echo 'active show';}?>" id="account">
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
									<li><a href="<?php echo base_url('administrator/accounting/income');?>">Create Income </a></li>
									<li><a href="<?php echo base_url('administrator/accounting/expense');?>">Create Expense </a></li>
								    <!-- <li><a href="javaScript:void(0);">P & L Account</a></li>
								    <li><a href="javaScript:void(0);">Balance Account</a></li> -->
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
								<h6>Our Project Status</h6>
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
								<h6>Our Project</h6>
								<p>Check out each colum for more details.</p>
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
									<li><i class="fa fa-circle text-primary me-1"></i> 40% Ticket</li>
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
							<p class="mb-2 d-flex"><img width="22" height="22" src="<?php echo base_url('assets/images/browser/icon1.png');?>" class="me-2" alt="">Hospital Project
								<span class="pull-right text-warning ms-auto">85%</span>
							</p>
							<div class="progress mb-3" style="height:4px">
								<div class="progress-bar bg-warning progress-animated" style="width:85%; height:4px;" role="progressbar">
									<span class="sr-only">60% Complete</span>
								</div>
							</div>
							<p class="mb-2 d-flex"><img width="22" height="22" src="<?php echo base_url('assets/images/browser/icon2.png');?>" class="me-2" alt="">School Project
								<span class="pull-right text-success ms-auto">90%</span>
							</p>
							<div class="progress mb-3" style="height:4px">
								<div class="progress-bar bg-success progress-animated" style="width:90%; height:4px;" role="progressbar">
									<span class="sr-only">60% Complete</span>
								</div>
							</div>
							<p class="mb-2 d-flex"><img width="22" height="22" src="<?php echo base_url('assets/images/browser/icon3.png');?>" class="me-2" alt="">Child Care Project
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
