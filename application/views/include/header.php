<?php 
 $isLoggedID=$this->session->userdata['mem_id'];
 $isLoggedName=$this->session->userdata['photo'];

	$name=$this->session->userdata('name');
	$loggedPic=$this->session->userdata('photo');
	$usrCat=$this->session->userdata('user_cate');
	if($usrCat=='3'){$asPosition='Admin';}else if($usrCat=='2'){$asPosition='Super Admin';}else if($usrCat=='1'){$asPosition='Developer';}else{$asPosition='Employee';}
?>


<div class="header">
  <div class="header-content">
    <nav class="navbar navbar-expand">
      <div class="collapse navbar-collapse justify-content-between">
        <div class="header-left">
          <div class="search_bar dropdown"> <span class="search_icon p-3 c-pointer" data-bs-toggle="dropdown"> <i class="mdi mdi-magnify"></i> </span>
            <div class="dropdown-menu p-0 m-0">
              <form>
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
              </form>
            </div>
          </div>
        </div>
        <ul class="navbar-nav header-right">
          <li class="nav-item dropdown notification_dropdown"> <a class="nav-link bell dz-theme-mode" href="javascript:void(0);"> <i id="icon-light" class="fas fa-sun"></i> <i id="icon-dark" class="fas fa-moon"></i> </a> </li>
          <li class="nav-item dropdown notification_dropdown"> <a class="nav-link bell dz-fullscreen" href="#">
            <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
              <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
            </svg>
            <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize">
              <path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path>
            </svg>
            </a> </li>


          <!-- <li class="nav-item dropdown notification_dropdown"> <a class="nav-link bell ai-icon" href="#" role="button" data-bs-toggle="dropdown">
            <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
              <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <div class="pulse-css"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px;">
                <ul class="timeline">
                  <li>
                    <div class="timeline-panel">
                      <div class="media me-2"> <img alt="image" width="50" src="<?php echo base_url('assets/images/avatar/1.jpg');?>"> </div>
                      <div class="media-body">
                        <h6 class="mb-1">Dr sultads Send you Photo</h6>
                        <small class="d-block">29 July 2023 - 02:26 PM</small> </div>
                    </div>
                  </li>
                  <li>
                    <div class="timeline-panel">
                      <div class="media me-2 media-primary"> <i class="fa fa-home"></i> </div>
                      <div class="media-body">
                        <h6 class="mb-1">Reminder : Treatment Time!</h6>
                        <small class="d-block">29 July 2023 - 02:26 PM</small> </div>
                    </div>
                  </li>
                </ul>
              </div>
              <a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a> </div>
          </li> -->


          <li class="nav-item dropdown header-profile"> <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown"> <img src="<?php echo base_url('front/assets/sonu1.png');?>" width="20" alt="">
            <div class="header-info"> <span>Hey, <strong><?php echo $name;?></strong></span> <small><?php echo $asPosition;?></small> </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right"> <a href="<?php echo base_url();?>administrator/dashboard/profile" class="dropdown-item ai-icon">
              <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
              <span class="ml-2">Profile </span> </a> 
               <a href="<?php echo base_url('logout/user');?>" class="dropdown-item ai-icon">
              <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="16 17 21 12 16 7"></polyline>
                <line x1="21" y1="12" x2="9" y2="12"></line>
              </svg>
              <span class="ml-2">Logout </span> </a> </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>
