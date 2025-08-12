<?php
$isLoggedID = $this->session->userdata['mem_id'];
$isLoggedName = $this->session->userdata['photo'];
$custom_setting = $this->db->select('*')->get('setting')->row();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guest || NGO</title>
    <link rel="shortcut icon" href="<?php echo base_url($custom_setting->favicon ? $custom_setting->favicon : 'NGO'); ?>" type="image/x-icon">
    <?php $this->load->view('member_include/link'); ?>
    <style>
        #border-guest-part {
            border: 1px solid #ffffff4a;
            padding: 45px 25px;
            position: relative;
            border-radius: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #border-guest-part::before {
            content: "";
            height: 90%;
            width: 30px;
            border-radius: 50px;
            background-color: white;
            position: absolute;
            left: -14px;
            top: 16px;
        }

        #border-guest-part::after {
            content: "";
            height: 90%;
            width: 30px;
            border-radius: 50px;
            background-color: white;
            position: absolute;
            right: -14px;
            top: 16px;
        }
    </style>
</head>

<body>
    <?php $this->load->view('member_include/header'); ?>
    <div class="container-fluid px-0" id="top-nav-fixed-part">
        <div class="d-flex align-items-center topblur justify-content-between px-5 py-2">
            <div>
                <?php if ($custom_setting): ?>
                    <img src="<?php echo base_url($custom_setting->logo ? $custom_setting->logo : ''); ?>" class="text-white"
                        width="150px" alt="logo">
                <?php else: ?>
                    <img src="http://test.camwel.org/ngo/uploads/setting/logo2.png" width="150px" alt="logo">
                <?php endif; ?>
            </div>
            <div>
                <ul class="d-flex align-items-center text-white mb-0 ">
                    <div href="" class="text-white px-3">
                        <li class="position-relative" id="hovering">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="<?php echo base_url() ?>media/team1.jpg" width="50px" height="50px"
                                    alt="@dued" class="rounded-pill user-member-profiles">
                            </div>
                            <?php if ($guest == "Yes"): ?>
                                <ul class="border py-2 px-4" id="profile-right-part">
                                    <a href="<?php echo base_url('site/logout'); ?>" id="logout">
                                        <li>Logout</li>
                                    </a>

                                </ul>
                            <? else: ?>
                                <ul class="border p-3" id="profile-right-part">
                                    <a href="" data-target="profile-members" id="top-bottom-padding "
                                        class="download18 isActived">
                                        <li>Profile</li>
                                    </a>
                                    <a href="" data-target="change-passwords" id="top-bottom-padding "
                                        class="download28 isActived">
                                        <li>Change Password</li>
                                    </a>
                                    <a href="<?php echo base_url('site/logout'); ?>" id="logout">
                                        <li>Logout</li>
                                    </a>

                                </ul>
                            <?php endif; ?>
                        </li>
                    </div>
                    <li class="text-white px-3" id="Menushow">
                        <i class="bi bi-list text-white menu-size"></i>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php if (!empty($layout) && trim($layout) !== "") {
        require_once($layout);
    } else if ($MemberDet['m_type'] == "") { ?>


        <section class="container-fluid" id="bg-black-part">
            <div class="container ">
             
                <div class="row">
                    <div class="col-12 col-lg-7" style="border:1px solid red;" id="border-guest-part">
                        <h2 class="text-center text-color-1 text-white">Welcome</h2>
                        <p class="text-center text-secondary "><b>Welcome</b> to be a part of our journey to bring about
                            positive change, inspire growth, and uplift communities. Together, we can make a lasting impact,
                            fostering a better future for all. Your involvement can help create meaningful transformation in
                            the world.</p>
                        <p class="text-justify mt-2 text-secondary text-center"><i class="fa fa-cog bt-spin"
                                aria-hidden="true"></i>
                            <span>Hello <b class="text-success"><?php echo $MemberDet['name'] ?></b></span>&nbsp;You will
                            get confirmation shortly.
                        </p>
                    </div>
                    <div class="col-12 d-flex justify-content-center col-lg-5">
                        <div>
                            <img src="<?php echo base_url(); ?>media/guest-login.png ?>" class="w-guest-image-section" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php } else { ?>

        <!-- Sidebar -->
        <div class="sidebar">
            <h4 class="d-md-flex d-none justify-content-center">Dashboard</h4>
            <a href="" data-target="dashboard" class="curved-icon download1 isActived" id="top-bottom-padding"><i
                    class="bi bi-house-door"></i>
                <span>Home</span></a>
            <a href="" data-target="download-card" class="curved-icon download1 isActived" id="top-bottom-padding"><i
                    class="bi bi-download"></i>
                <span>Download</span></a>
            <a href="" data-target="donate-content" class="download2 isActived sunny" id="top-bottom-padding"><i
                    class="bi bi-card-list"></i>
                <span>Donate Now</span></a>
            <a href="" data-target="donation-content" id="top-bottom-padding " class="download3 isActived"><i
                    class="bi bi-gear"></i> <span>Donation
                    List</span></a>
            <a href="" data-target="recent-content" id="top-bottom-padding" class="download4 isActived"><i
                    class="bi bi-calendar-event-fill"></i>
                <span>Recent Event</span></a>
            <a href="#" data-target="project-content" id="top-bottom-padding" class="download5 isActived"><i
                    class="bi bi-kanban-fill"></i> <span>Our
                    Projects</span></a>
            <a href="#" data-target="annual-content" id="top-bottom-padding " class="download6 isActived"><i
                    class="bi bi-flag-fill"></i> <span>Annual
                    Reports</span></a>
            <a href="#" data-target="feedbacks-content" id="top-bottom-padding " class="download7 isActived"><i
                    class="bi bi-rss-fill"></i>
                <span>Feedbacks</span></a>
            <a href="#" data-target="tickets-content" id="top-bottom-padding " class="download8 isActived"><i
                    class="bi bi-ticket-fill"></i>
                <span>Tickets</span></a>
            <a href="#" data-target="programs-content" id="top-bottom-padding " class="download9 isActived"><i
                    class="bi bi-box-arrow-right"></i> <span>Our
                    Programs</span></a>
            <a href="#" data-target="volunteer-content" id="top-bottom-padding " class="download10 isActived"><i
                    class="bi bi-people"></i> <span>Become a
                    Volunteer</span></a>
            <a href="#" data-target="request-member" id="top-bottom-padding " class="download11 isActived"><i
                    class="bi bi-box-arrow-right"></i>
                <span>Request For Member</span></a>
            <a href="#" data-target="refreed-member" id="top-bottom-padding " class="download12 isActived"><i
                    class="bi bi-box-arrow-right"></i>
                <span>Referer Member</span></a>
        </div>
        <!-- Content Area -->
        <div class="content">







            <div class="row content-div" id="dashboard">
                <div>
                    <div class="col-12 my-2">

                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success text-center py-4 fade-message" id="success-message">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger text-center py-4 fade-message" id="error-message">
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3"></div>
                        </div>

                        <h2>Dashboard Overview </h2>
                    </div>

                    <div class="col-12 d-md-flex align-items-center  justify-content-between p-3" id="grd">
                        <div class="pe-0 pe-md-4">

                            <h3 class="fw-bolder">Welcome ( <span class="text-info"><?php echo $MemberDet['name']?$MemberDet['name']:'';?></span> )</h3>
                            <p class="text-justify">Welcome to the NGO Organization! We’re thrilled to have you as a
                                verified member. Together,we’ll create impactful change, foster growth, and work towards a
                                brighter, sustainablefuture.</p>
                        </div>
                        <div>
                            <img src="<?php echo base_url() ?>media/team1.jpg" class="member-image-top" alt="">
                        </div>
                    </div>

                </div>
                <!-- card section start -->


                <div class="row">


                    <div class="col-12 col-md-4 my-3">
                        <div class="card-home">
                            <h5 class="text-center">Total Member </h5>
                            <h6 class="text-center">
                                <?php echo $memberCount ? count($memberCount) : 'N/A'; ?></h6>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 my-3">
                        <div class="card-home">
                            <h5 class="text-center">Total Active Member</h5>
                            <h6 class="text-center">
                                <?php echo $actMemberCount ? count($actMemberCount) : 'N/A'; ?></h6>
                        </div>
                    </div>


                    <div class="col-12 col-md-4 my-3">
                        <div class="card-home">
                            <h5 class="text-center">Total Guest </h5>
                            <h6 class="text-center"><?php echo count($totalGuest) ? count($totalGuest) : 'N/A'; ?></h6>
                        </div>
                    </div>



                    <div class="col-12 col-md-4 my-3">
                        <div class="card-home">
                            <h5 class="text-center">Total Donation Amount</h5>
                            <h6 class="text-center">
                                <?php echo $totalDoAmo['amount'] ? '₹ ' . $totalDoAmo['amount'] . '.00' : '₹ 0.00'; ?></h6>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 my-3">
                        <div class="card-home">
                            <h5 class="text-center">Today Donation Amount </h5>
                            <h6 class="text-center">
                                <?php echo $todayDonAmo['amount'] ? '₹ ' . $todayDonAmo['amount'] . '.00' : '₹ 0.00'; ?></h6>
                        </div>
                    </div>


                    <div class="col-12 col-md-4 my-3">
                        <div class="card-home">
                            <h5 class="text-center">Total Project </h5>
                            <h6 class="text-center"><?php echo count($project) ? count($project) : '1 +'; ?></h6>
                        </div>
                    </div>


                    <div class="col-12 col-md-4 my-3">
                        <div class="card-home">
                            <h5 class="text-center">Referer Member </h5>
                            <h6 class="text-center"><?php echo count($project) ? count($project) : '1 +'; ?></h6>
                        </div>
                    </div>



                </div>

                <!-- card section end -->


                <!-- carousel section start -->
                <div class="row  my-2 my-lg-5" id="">
                    <!-- NGO Image Dashboard Carousel -->
                    <div class="owl-carousels-images owl-carousel">

                        <div class="item">
                            <div class="ngo-image-dashboard">
                                <img src="<?php echo base_url() ?>media/1.jpg" class="dashboard-movables" alt="">
                            </div>
                        </div>

                        <div class="item">
                            <div class="ngo-image-dashboard">
                                <img src="<?php echo base_url() ?>media/2.jpg" class="dashboard-movables" alt="">
                            </div>
                        </div>

                        <div class="item">
                            <div class="ngo-image-dashboard">
                                <img src="<?php echo base_url() ?>media/3.jpg" class="dashboard-movables" alt="">
                            </div>
                        </div>

                        <div class="item">
                            <div class="ngo-image-dashboard">
                                <img src="<?php echo base_url() ?>media/4.jpg" class="dashboard-movables" alt="">
                            </div>
                        </div>

                        <div class="item">
                            <div class="ngo-image-dashboard">
                                <img src="<?php echo base_url() ?>media/5.jpg" class="dashboard-movables" alt="">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- carousel section end -->
            </div>



            <!-- download card start -->
            <div class="row content-div my-4 my-lg-5" id="download-card">
                <div class="d-lg-flex justify-content-evenly" id="ggss">
                    <div class="col-12 col-lg-6 my-5">
                        <a href="javascript:void(0);" class="ActnCmdByAmi text-white" id="idCard"
                            data-id="<?php echo base_url('member/profile/idCard/' . $isLoggedID); ?>">
                            <div class="card-section ">
                                <div class="d-flex justify-content-center" id="absolute-download">
                                    <div class="tannu-box d-flex justify-content-center align-items-center">
                                        <i class="bi bi-cloud-download  cloudy-tannu"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-center">Id Card Download</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-lg-6 my-5">
                        <a href="javascript:void(0);" class="ActnCmdByAmi text-white" id="certificate"
                            data-id="<?php echo base_url('member/profile/certificate/' . $isLoggedID); ?>">
                            <div class="card-section ">
                                <div class="d-flex justify-content-center" id="absolute-download">
                                    <div class="tannu-box d-flex justify-content-center align-items-center">
                                        <i class="bi bi-cloud-download  cloudy-tannu"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-center">Certificate Download</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- download card end -->



            <!-- profile start -->

            <div class="row content-div my-4 my-lg-5" id="profile-members">
                <div class="col-12 mb-3">
                    <div>
                        <h2 class="fw-bolder">Our Profile</h2>

                    </div>
                </div>
                <div class="d-lg-flex justify-content-evenly" id="ggss">
                    <div class="col-12  border border-secondary rounded-2 p-2">
                        <div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="rounded-pill border border-secondary p-2">
                                    <img src="<?php echo base_url() ?>media/team1.jpg" class="rounded-pill" width="150px"
                                        height="150px" alt="">
                                </div>
                            </div>
                            <div>
                                <form method="post" action="<?php echo $manProfile; ?>" enctype="multipart/form-data"
                                    class="p-4">

                                    <div class="py-2">
                                        <div class="d-md-flex justify-content-between gap-3">
                                            <div class="w-100">
                                                <input type="hidden" name="usId" id="usId"
                                                    value="<?php echo $MemberDet['id'] ? $MemberDet['id'] : ''; ?>">
                                                <input type="text" name="name" id="name"
                                                    oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')"
                                                    required=""
                                                    value="<?php echo $MemberDet['name'] ? $MemberDet['name'] : ''; ?>"
                                                    placeholder="Enter Name Here" class="w-100 bbbottom-1">
                                            </div>
                                            <div class="w-100 my-2 my-lg-0">
                                                <input type="text" name="mobile_no" id="mobile_no"
                                                    oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')"
                                                    required="" maxlength="10" placeholder="Enter Mobile No."
                                                    class="w-100 bbbottom-1"
                                                    value="<?php echo $MemberDet['mobile_number'] ? $MemberDet['mobile_number'] : ''; ?>">
                                            </div>
                                        </div>

                                        <div class="d-md-flex justify-content-between gap-3 my-lg-2">

                                            <div class="w-100">
                                                <input type="text" readonly name="emailId" id="emailId" required=""
                                                    placeholder="Enter Email Id" class="w-100 bbbottom-1"
                                                    value="<?php echo $MemberDet['email_id'] ? $MemberDet['email_id'] : ''; ?>">
                                            </div>

                                            <div class="w-100">
                                                <input type="text" readonly name="memPassword" id="memPassword" required=""
                                                    placeholder="Enter password" class="w-100 bbbottom-1"
                                                    value="<?php echo $MemberDet['show_password'] ? $MemberDet['show_password'] : ''; ?>">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mb-1">

                                        <div class="col-12">
                                            <div class="w-100">
                                                <button class="text-center text-white w-100 bgk-primary mt-3 px-3 py-1"
                                                    type="submit">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- profile end -->





            <!-- change password section start from here.  -->

            <div class="row content-div my-4 my-lg-5" id="change-passwords">
                <div class="col-12 mb-3">
                    <div>
                        <h2 class="fw-bolder">Change Password</h2>

                    </div>
                </div>
                <div class="d-lg-flex justify-content-evenly" id="ggss">
                    <div class="col-12  border border-secondary rounded-2 p-2">
                        <div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="rounded-pill border border-secondary p-2">
                                    <img src="<?php echo base_url() ?>media/team1.jpg" class="rounded-pill" width="150px"
                                        height="150px" alt="">
                                </div>
                            </div>
                            <div>

                                <div class="row" id="errorSection">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <!-- Error Message Section -->
                                        <div id="errorMessageSection" class="bg-danger py-2"
                                            style="border-radius:3rem; display:none;">
                                            <span id="errorMessage" class="text-white"
                                                style="display:block; text-align:center;">Incorrect password or
                                                email.</span>
                                        </div>
                                        <!-- Success Message Section -->
                                        <div id="successMessageSection" class="bg-success py-2"
                                            style="border-radius:3rem; display:none;">
                                            <span id="successMessage" class="text-white"
                                                style="display:block; text-align:center;">Password and email match! You can
                                                proceed.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>


                                <form method="post" action="<?php echo $changePassword; ?>" enctype="multipart/form-data"
                                    class="p-4">

                                    <div class="py-2">
                                        <div class="d-md-flex justify-content-between gap-3">
                                            <div class="w-100">
                                                <input type="hidden" name="userPass" id="userPass"
                                                    value="<?php echo $MemberDet['show_password'] ? $MemberDet['show_password'] : ''; ?>">
                                                <input type="hidden" name="userEmail" id="userEmail"
                                                    value="<?php echo $MemberDet['email_id'] ? $MemberDet['email_id'] : ''; ?>">
                                                <input type="hidden" name="mem_id" id="mem_id"
                                                    value="<?php echo $MemberDet['id'] ? $MemberDet['id'] : ''; ?>">
                                                <input type="email" name="email" id="email" required placeholder="Email Id "
                                                    class="w-100 bbbottom-1">
                                            </div>
                                            <div class="w-100 my-2 my-lg-0">
                                                <input type="text" name="oldPassword" id="oldPassword" require
                                                    placeholder="Old Password " class="w-100 bbbottom-1">
                                            </div>
                                        </div>

                                        <div class="d-md-flex justify-content-between gap-3 my-lg-2">

                                            <div class="w-100">
                                                <input type="text" name="newPassword" id="newPassword" required=""
                                                    placeholder="New Password" class="w-100 bbbottom-1">
                                            </div>

                                            <div class="w-100 my-2 my-lg-0">
                                                <input type="text" name="confPass" id="confPass" required maxlength="10"
                                                    placeholder="Re-type New Password" class="w-100 bbbottom-1">
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row mb-1">

                                        <div class="col-12">
                                            <div class="w-100">
                                                <button class="text-center text-white w-100 bgk-primary mt-3 px-3 py-1"
                                                    type="submit">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- change password section end here.  -->



            <!-- Donate now section start -->

            <div class="row content-div mb-3" id="donate-content">

                <div class="d-md-flex">
                    <div class="col-12 col-lg-7 box-shadow mt-lg-5 mt-0">
                        <form action="<?php echo $donateNow; ?>" id="LogedMemDonation_2" method="post"
                            enctype="multipart/form-data" class="p-4">

                            <div class="">
                                <div class="mb-0 pt-4 py-3">
                                    <h2 class="fw-bolder">Let's Donate</h2>
                                    <p class="donate-colorsss mb-0"> Support us today by donating through our Donation page.
                                        We’re here to assist with any questions and guide you through the process. </p>
                                </div>
                            </div>




                            <div class="py-2">
                                <div class="d-md-flex justify-content-between gap-3">
                                    <div class="w-100">
                                        <input type="hidden" name="logMemId" id="logMemId" value="6">
                                        <input type="text" name="name_donate" id="name_donate"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')"
                                            placeholder="Enter Name Here" class="w-100 bbbottom-1">
                                    </div>
                                    <div class="w-100 my-2 my-lg-0">
                                        <input type="text" name="fname_donate" id="fname_donate"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')"
                                            maxlength="10" placeholder="Enter Father Name."
                                            class="w-100 bbbottom-1">  
                                    </div>
                                </div>

                                <div class="d-md-flex justify-content-between gap-3 my-lg-2">
                                    <div class="w-100">
                                        <input type="text" name="emailId_donate" id="emailId_donate" placeholder="Enter Email Id"
                                            class="w-100 bbbottom-1">
                                    </div>
                                    <div class="w-100 my-2 my-lg-0">
                                        <input type="text" name="mobile_no_donate" id="mobile_no_donate"
                                            oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')"
                                            maxlength="10" placeholder="Enter Mobile No."
                                            class="w-100 bbbottom-1">
                                    </div>
                                </div>

                                <div class="d-md-flex justify-content-between gap-3 my-lg-2">
                                    <div class="w-100">
                                        <input type="text" name="address_donate" id="address_donate" placeholder="Enter Address"
                                            class="w-100 bbbottom-1">
                                    </div>
                                    <div class="w-100 my-2 my-lg-0">
                                        <input type="text" name="donAmount" id="donAmount"
                                            oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')"
                                            maxlength="10" placeholder="Enter Amount" class="w-100 bbbottom-1">
                                    </div>
                                </div>

                            </div>
                            <div class="w-100">
                                <textarea name="message_donate" id="message_donate"
                                   oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')"
                                    placeholder="Enter Message Here " class="w-100 messagetxttt" cols="10"
                                    rows="3"></textarea>
                            </div>


                            <div class="row" id="donate-payment">
                                <div class="row mt-2">
                                    <p class="text-center text-white">"Your small donation can make a big difference,
                                        providing food, shelter, education, and hope to poor people in need. Act now to
                                        help!" </p>
                                    <div class="col-md-12 border-solid"
                                        style="border:1px solid #e0e0e0;padding:1rem 2rem 0rem 2rem;border-radius:1rem;">
                                        <div class="row">
                                            <p class="text-center text-white">Account Details</p>
                                            <div class="col-md-12" style="display:flex;justify-content:space-between">
                                                <p class="text-white">Account No &nbsp;-
                                                <p>
                                                <p class="text-white"> 69234156784325345</p>
                                            </div>
                                            <div class="col-md-12" style="display:flex;justify-content:space-between">
                                                <p class="text-white">IFSC-CODE &nbsp;-
                                                <p>
                                                <p class="text-white"> hdfc10001</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <img src="<?php echo base_url('front/qr-code.png'); ?>" alt="" class="pt-1 pl-5"
                                            style="height:7rem;">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="upload-container"
                                            onClick="document.getElementById('payment_img').click();">
                                            <p id="upload-message">Click anywhere here to upload an image</p>
                                            <input type="file" id="payment_img" name="payment_img" style="display: none;"
                                                accept="image/*" req onChange="previewImage();">
                                            <!-- Image preview will appear here -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <img id="image-preview" src="" alt="Image Preview"
                                                        style="max-width: 100%; display: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>

                            </div>

                            <div class="row mb-1">
                                <div class="col-12">
                                    <div class="w-100">
                                        <button class="text-center text-white w-100 bgk-primary mt-3 px-3 py-1" id="diabled-add" onclick="return isformValidate()"
                                            type="submit">Donate Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="col-12 col-lg-5 my-2 d-flex align-items-center">
                        <div>
                            <img src="<?php echo base_url() ?>media/donate-member.png" class="w-100" alt="@dued">
                        </div>
                    </div>
                </div>

            </div>

            <!-- Donate now section end -->



            <!-- donar list section start form here. -->
            <div class="row content-div" id="donation-content">
                <div class="col-12">
                    <div>
                        <h4 class="fw-bolder">Donar List</h4>
                        <p class="text-justify">
                            “ Reach out to us anytime via our Contact Us page. We’re here to assist with your questions and
                            needs. ”
                        </p>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-hover text-nowrap">
                        <thead class="bg-primary">
                            <tr>
                                <th>SI.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($doListMan)): ?>
                                <?php foreach ($doListMan as $i => $dPayAmo): ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo htmlspecialchars($dPayAmo['name']); ?></td>
                                        <td><?php echo htmlspecialchars($dPayAmo['mobile_no']); ?></td>
                                        <td><?php echo htmlspecialchars($dPayAmo['email']); ?></td>
                                        <td class="num">₹ <?php echo number_format($dPayAmo['amount'], 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">No donations found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- doner list section end here. -->

            <!-- Event Section start from here.  -->
            <div class="row content-div " id="recent-content">
                <div class="col-12">
                    <h3 class="fw-bolder">Our Event</h3>
                    <p class="text-justify">
                        Support our NGO's ongoing project to bring positive change. Your generous donations will help us
                        complete this mission and
                        impact lives. Donate today!
                    </p>
                </div>
                <!-- Testimonials Carousel -->
                <?php if (!empty($eventList)): ?>
                    <div class="owl-carousel testimonials">
                        <?php foreach ($eventList as $event): ?>
                            <div class="item">
                                <div class="p-2 border border-secondary">
                                    <img src="<?php echo base_url($event['e_images']); ?>"
                                        class="object-fit-cover set-images-position-top" width="100%" height="350px" alt="">
                                </div>
                                <div class="py-4">
                                    <h3><?php echo $event['e_heading']; ?></h3>
                                    <p><?php echo $event['e_heading']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="owl-carousel testimonials">
                        <div class="item">
                            <div class="p-2 border border-secondary">

                                <img src="<?php echo base_url() ?>media/1.jpg" class="object-fit-cover set-images-position-top"
                                    width="100%" height="350px" alt="">
                            </div>
                            <div class="py-4">
                                <h3>Today Event</h3>
                                <p>An NGO software event focuses on showcasing technological solutions tailored for non-profit organizations. These events offer a platform for NGOs to explore software tools that streamline operations, enhance fundraising efforts, manage volunteers, and improve data tracking. Through workshops, live demos, and presentations, attendees learn how to optimize their use of software for greater efficiency and impact. Networking opportunities also allow NGOs to connect with tech providers, fellow organizations, and industry experts. By attending, non-profits can discover innovative ways to advance their missions, stay organized, and better serve their communities with the help of technology.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="p-2 border border-secondary">
                                <img src="<?php echo base_url() ?>media/2.jpg" class="object-fit-cover set-images-position-top"
                                    width="100%" height="350px" alt="">
                            </div>
                            <div class="py-4">
                                <h3>Today Event</h3>
                                <p>An NGO software event highlights digital solutions designed specifically for non-profit organizations. These events provide a space for NGOs to explore various software tools that improve operational efficiency, support fundraising activities, facilitate volunteer management, and streamline data analysis. Participants benefit from hands-on workshops, interactive demos, and insightful presentations that show how these tools can optimize their efforts and maximize impact. Additionally, networking sessions offer NGOs the chance to engage with technology providers, other organizations, and industry professionals. By attending, non-profits can uncover new strategies to enhance their missions, stay organized, and make a greater difference with technology.</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Event Section End here.  -->
            <!-- our project section start -->
            <div class="row content-div " id="project-content">
                <div class="col-12">
                    <h3 class="fw-bolder">Our Project</h3>
                    <p class="text-justify">
                        Support our NGO's ongoing project to bring positive change. Your generous donations will help us
                        complete this mission and
                        impact lives. Donate today!
                    </p>
                </div>
                <!-- Testimonials Carousel -->
                <?php if (!empty($project)): ?>
                    <div class="owl-carousel testimonials">
                        <?php foreach ($project as $proj): ?>
                            <div class="item">
                                <div class="p-2 border border-secondary">
                                    <img src="<?php echo base_url($proj['project_img']); ?>"
                                        class="object-fit-cover set-images-position-top" width="100%" height="350px" alt="">
                                </div>
                                <div class="py-4">
                                    <h3><?php echo $proj['project_name']; ?></h3>
                                    <p><?php echo $proj['description']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="owl-carousel projects">
                        <div class="item">
                            <div class="border p-2 border-secondary">
                                <img src="<?php echo base_url() ?>media/1.jpg" class="object-fit-cover set-images-position-top"
                                    width="100%" height="350px" alt="">
                            </div>
                            <div class="py-4">
                                <h3>Hospital</h3>
                                <p>Hospital management software for NGOs is a powerful tool designed to enhance the operational efficiency of healthcare services in non-profit organizations. It streamlines patient records, appointment scheduling, and billing processes, ensuring smooth operations while reducing administrative burdens. Additionally, it aids in resource management, tracking medical supplies, and staff scheduling, which is vital for non-profit hospitals operating on limited budgets. The software also helps in managing donations, grants, and funding allocations, improving transparency and accountability. By leveraging hospital management software, NGOs can provide better care, optimize resources, and ensure that their healthcare services are impactful and efficient for the communities they serve.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="border p-2 border-secondary">
                                <img src="<?php echo base_url() ?>media/2.jpg" class="object-fit-cover set-images-position-top"
                                    width="100%" height="350px" alt="">
                            </div>
                            <div class="py-4">
                                <h3>School</h3>
                                <p>NGO software for schools is designed to enhance the management and operation of educational programs within non-profit organizations. It helps streamline tasks such as student enrollment, attendance tracking, grading, and communication between teachers, students, and parents. The software can also manage financial aspects like donations, tuition fees, and budget allocation, ensuring transparency and accountability. Additionally, it supports resource management, helping NGOs effectively allocate educational materials and staff. By using this software, NGOs can improve administrative efficiency, enhance educational outcomes, and ensure that their resources are used effectively to provide quality education to underserved communities.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="border p-2 border-secondary">
                                <img src="<?php echo base_url() ?>media/2.jpg" class="object-fit-cover set-images-position-top"
                                    width="100%" height="350px" alt="">
                            </div>
                            <div class="py-4">
                                <h3>Child Care</h3>
                                <p>NGO software for child care centers is essential for streamlining operations and ensuring the well-being of children in non-profit care. It helps manage daily activities such as attendance, health tracking, and staff coordination, improving the overall efficiency of child care services. The software also assists with scheduling, communication between parents and caregivers, and maintaining records on children's development. By integrating donation and funding management features, NGOs can track resources effectively. This technology enables non-profits to provide better care, enhance transparency, and improve resource allocation, ensuring children receive the attention and support they need.</p>
                            </div>
                        </div>

                    </div>
                <?php endif; ?>
            </div>
            <!-- our project section end -->

            <!-- Annual reports start -->
            <div class="row content-div" id="annual-content">
                <div class="col-12">
                    <h3 class="fw-bolder">
                        Annual reports
                    </h3>
                </div>
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="border p-5" id="annual-tannu">
                        <p class="fw-bolder my-0 text-secondary">
                            Annual Reports ..........
                        </p>
                    </div>
                </div>
            </div>
            <!-- Annual reports end -->

            <!-- feedbacks start -->
            <div class="row content-div my-2 my-lg-5" id="feedbacks-content">
                <div class="d-md-flex">
                    <div class="col-md-5 border p-2 rounded">
                        <form class="auth-form" method="post" action="<?php echo $feedbacjSub; ?>">
                            <h2 class="text-center">Your Feedback</h2>
                            <p class="text-center mb-3">Let Us Know Your Thoughts
                            </p>
                            <div class="input-container">

                                <input class="input-field w-100" required type="text" placeholder="Username" id="user_name"
                                    name="user_name" require="">
                                <input type="hidden" name="feedMemId" id="feedMemId" require>
                            </div>
                            <div class="input-container my-2">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field w-100" required type="text" maxlength="10" id="user_mob"
                                    placeholder="Mobile No" name="user_mob" require>
                            </div>
                            <div class="input-container">

                                <input class="input-field w-100" required type="text" id="user_feedback" name="user_feedback"
                                    placeholder="Subject" require>
                            </div>
                            <div class="input-container my-2">

                                <input class="input-field w-100" required type="text" id="user_suggestion" name="user_suggestion"
                                    placeholder="Suggestion for Improvement" require>
                            </div>
                            <div class="w-100">
                                <button type="submit" name="submit" id="submit"
                                    class="btn btn-primary w-100"><b>Submit</b></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo base_url() ?>media/feedbacks.png" class="w-feedbacks" alt="@dued">
                        </div>
                    </div>
                </div>
            </div>
            <!-- feedbacks end -->






            <!-- ticket blur part -->
            <div class="add-blur-bg">
            </div>
            <!--  ticket blur end -->

            <!-- Ticketing Recommendations and Tips start -->
            <div class="row content-div " id="tickets-content">

                <div class="col-12">
                    <h1 class=" fw-bolder my-3">Ticketing Recommendations and Tips</h1>
                </div>
                <div class="d-lg-flex" id="ggss">
                    <div class="col-12 col-lg-5 border p-3 my-2">
                        <div>
                            <div class="">
                                <h2 class="">Ticket Suggestion Box</h2>
                                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores nesciunt
                                    soluta doloribus a vitae iste dolorem!</p>
                                <form action="<?php echo $ticketSugg; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="pt-3">
                                        <div class="d-md-flex justify-content-between gap-3">
                                            <div class="w-100">
                                                <input type="hidden" name="ticMemId" id="ticMemId">
                                                <input type="text" name="subject" id="subject"
                                                    oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')"
                                                    required="" placeholder="Enter Name Here"
                                                    class="w-100 bbbottom-1 px-3 py-1">
                                            </div>
                                        </div>
                                      
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="w-100 mt-4">
                                                    <textarea name="askedQuestion" id="askedQuestion"
                                                        oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')"
                                                        required="" placeholder="Enter Message Here "
                                                        class="w-100 messagetxttt px-3 py-1" cols="10" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="w-100">
                                                    <button
                                                        class="text-center text-white w-100 bgk-primary messagetxttt mt-3 px-3 py-1"
                                                        type="submit">Submit</button>
                                                </div>
                                            </div>
                                          
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 my-2">
                        <div class="table-responsive ">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Operations</thscope=>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php foreach ($ticketListing as $i => $ticList): ?>
                                        <tr>
                                            <th scope="row"><?php echo $i + 1; ?></th>
                                            <td><?php echo $ticList['ticket_id']; ?></td>
                                            <td><?php echo $ticList['subject']; ?></td>
                                            <td class="d-flex" id="ggss">

                                                <?php if ($ticList['status'] == 2): ?>
                                                    <div class="edit-table pop-whatsapp" data-id='<?php echo $ticList['id']; ?>'
                                                        data-path="<?php echo base_url('member/dashboard/ticketAnswer/'); ?>">
                                                        <!-- <a href="<?php echo base_url('member/dashboard/ticketAnswer/' . $ticList['id']); ?>"> -->

                                                        <i class="bi bi-pencil text-black"></i>
                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="edit-table pop-whatsapp" data-id='<?php echo $ticList['id']; ?>'
                                                        data-path="<?php echo base_url('member/dashboard/ticketAnswer/'); ?>">
                                                        <!-- <a href="<?php echo base_url('member/dashboard/ticketAnswer/' . $ticList['id']); ?>"> -->

                                                        <i class="bi bi-pencil text-black"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ($ticList['status'] == 1): ?>
                                                    <div class="close-table">
                                                        <a
                                                            href="<?php echo base_url('member/dashboard/ticClose/' . $ticList['id']); ?>">
                                                            <i class="bi bi-x-lg text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="close-table bg-warning">
                                                        <a href="javaScript:void(0);">
                                                            <i class="bi bi-x-lg text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="click-visible ">

                    <div class="w-100">
                        <div class="d-flex border-bottom align-items-center border-secondary">
                            <div class="border-rounded-pill border-white p-2">
                                <img src="<?php echo base_url() ?>media/group.png" width="25px" height="25px" />
                            </div>
                            <h6 class="text-secondary py-2 w-100 ps-1 mb-0">Angeldeep Technical
                                Support</h6>
                        </div>
                        <div class="d-flex flex-column align-content-between p-3" id="overflow-part">
                            <!-- ----------------------------------------------------------  -->

                            <p id="chat"></p>
                            <!-- ----------------------------------------------------------  -->

                            <div class="d-flex border-test  mt-1">
                                <form method="post" class="d-flex w-100" action="<?php echo $memChating; ?>">
                                    <div class="w-90">
                                        <input type="text" placeholder="Type a message" name="mem_message" id="mem_message"
                                            class="bg-transparent border-0 p-2 w-90 text-secondary outline-none" require>
                                        <input type="hidden" name="tickec_id" id="tickec_id">
                                    </div>
                                    <button type="submit" class="bg-transparent display-non">
                                        <h5 class="text-secondary py-2 ps-1 mb-0 "><i class="bi bi-send text-info"></i></h5>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ticketing Recommendations and Tips end -->




            <!-- Our Program start -->
            <div class="row content-div " id="programs-content">
                <div class="col-12">
                    <h3 class="fw-bolder">
                        Our Program
                    </h3>
                    <p class="text-justify">Support our NGO's ongoing project to bring positive change. Your generous
                        donations will help us
                        complete this mission and
                        impact lives. Donate today!</p>
                </div>
                <!-- NGO Image Dashboard Carousel -->
                <?php if (!empty($program)): ?>
                    <div class="owl-carousels-images owl-carousel">
                        <?php foreach ($program as $prog): ?>
                            <div class="item">
                                <div class="ngo-image-dashboard">
                                    <img src="<?php echo base_url($prog['program_img']); ?>" class="dashboard-movables" alt="">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="owl-carousels-images owl-carousel">
                        <div class="item">
                            <div class="ngo-image-dashboard">
                                <img src="<?php echo base_url() ?>media/1.jpg" class="dashboard-movables" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="ngo-image-dashboard">
                                <img src="<?php echo base_url() ?>media/2.jpg" class="dashboard-movables" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="ngo-image-dashboard">
                                <img src="<?php echo base_url() ?>media/3.jpg" class="dashboard-movables" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="ngo-image-dashboard">
                                <img src="<?php echo base_url() ?>media/4.jpg" class="dashboard-movables" alt="">
                            </div>
                        </div>
                        <div class="item">
                            <div class="ngo-image-dashboard">
                                <img src="<?php echo base_url() ?>media/5.jpg" class="dashboard-movables" alt="">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- Our Program end -->






            <!--    Become a Volunteer Today start -->
            <div class="row content-div" id="volunteer-content">
                <div class="col-12">
                    <h3 class="fw-bolder">
                        Become a Volunteer Today
                    </h3>
                    <p class="text-justify"> Become a volunteer and join us to make a meaningful impact. Support our NGO’s
                        mission to bring hope, inspire change, and uplift communities. Together, we thrive!</p>

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <form action="<?php echo base_url(); ?>website/volunteer/becomeAvolunteer" method="post">
                                <input type="hidden" name="id" value="<?php echo $MemberDet['id']; ?>">
                                <input type="hidden" name="name" value="<?php echo $MemberDet['name']; ?>">
                                <input type="hidden" name="email_id" value="<?php echo $MemberDet['email_id']; ?>">
                                <input type="hidden" name="mobile_number" value="<?php echo $MemberDet['mobile_number']; ?>">
                                <div><button class="btn btn-danger text-white">Volunteer
                                        Request...</button><span>&nbsp;&nbsp; Click here to become a volunteer.</span></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--    Become a Volunteer Today end -->

            <!-- Request For Member start -->
            <div class="row content-div my-2 my-lg-5" id="request-member">

                <div class="d-md-flex align-items-center">
                    <div class="col-12 col-lg-6 my-2">
                        <div class="">
                            <h3 class="fw-bolder">
                                Request For Member
                            </h3>
                        </div>
                        <div class="auth-main">
                            <form class="auth-form" method="post" action="<?php echo $newMemberReq; ?>">

                                <div class="form-group">
                                    <input type="hidden" require name="oldLogMemId" id="oldLogMemId"
                                        value="<?php echo $MemberDet['id']; ?>">
                                    <input type="text" class="form-control bbbottom-12 request-inputs" id="newName"
                                        name="newName" placeholder="Enter Name *" required="">
                                </div>
                                <div class="form-group my-2">

                                    <input type="email" class="form-control bbbottom-12 request-inputs" id="newEmail"
                                        name="newEmail" placeholder="Email Id" require>
                                </div>
                                <div class="form-group">

                                    <input type="text" class="form-control bbbottom-12 request-inputs" id="newMobile"
                                        name="newMobile" maxlength="10" placeholder="Enter Mobile No"
                                        oninput="this.value=this.value.replace(/[^0-9]/g,'').replace(/(\ *?)\ */g,'$1')"
                                        value="" maxlength="10" require>
                                </div>
                                <div class="form-group mt-1">

                                    <input type="text" class="form-control bbbottom-12 request-inputs" id="password"
                                        name="password" placeholder="Enter Password" required="">
                                </div>
                                <div class="form-group my-2">

                                    <input type="text" class="form-control bbbottom-12 request-inputs" id="description"
                                        name="description" maxlength="10" placeholder="Enter Message" required="">
                                </div>

                                <button type="submit" name="submit" class="btn btn-success w-100 submit-btn" id="submit">
                                    <span>Submit</span>

                                </button>


                                <!-- <div class="d-flex justify-content-center text-success my-2 switch-form">Don't have an
                                account? &nbsp;
                                <a href="" class="text-secondary"> &nbsp;Sign in</a>
                            </div> -->

                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 my-2">
                        <div>
                            <img src="<?php echo base_url() ?>media/request.png" class="w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Request For Member end -->




            <!-- refreed-member start -->
            <div class="row content-div my-2 my-lg-5" id="refreed-member">
                <div class="col-12">
                    <div>
                        <h4 class="fw-bolder">Referer Member</h4>

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-hover text-nowrap">
                        <thead class="bg-primary">
                            <tr>
                                <th>SI.No</th>
                                <th>Member Id</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($requested_member)): ?>
                                <?php foreach ($requested_member as $i => $mem): ?>
                                    <tr> 
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo 'MEMID'.$mem['member_id']; ?></td>
                                        <td><?php echo $mem['name']; ?></td>
                                        <td><?php echo $mem['father_name']; ?></td>
                                        <td><?php echo $mem['email_id']; ?></td>
                                        <td><?php echo $mem['mobile_number']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">No Member Found.</td>
                                    <td></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- refreed-member end -->


        </div>

    <?php } ?>

    <?php $this->load->view('member_include/footer'); ?>
    <?php $this->load->view('member_include/script'); ?>
    <script>
        $(document).ready(function() {
            $('#success-message, #error-message').fadeIn(500).delay(1500).fadeOut(500);
        });

        $(document).ready(function() {
            $("#emailId_donate").keyup(function() {
                var emailId_donate = $(this).val();
                var emailRegex = /^[a-zA-Z0-9._-]+@[a-zAZ0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (emailRegex.test(emailId_donate)) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() ?>site/test_3',
                        data: {
                            email: emailId_donate
                        },
                        dataType: 'json',
                        success: function(response) {     
                            if (response.name) {
                                $('#name_donate').val(response.name);
                            }
                            if (response.father_name) {
                                $('#fname_donate').val(response.father_name);
                            }
                            if (response.mobile_number) {
                                $('#mobile_no_donate').val(response.mobile_number);
                            }
                            if (response.address) {
                                $('#address_donate').val(response.address);
                            }
                        },

                    });
                }
            });
        });

    </script>

</body>

</html>