<?php $newsList = $this->db->select('*')->where(array('id' => '1', 'status' => 1))->order_by('id', 'ASC')->get('cms_news')->row(); ?>
<?php $custom_setting = $this->db->select('*')->get('setting')->row(); ?>

<div id="preloader">
    <div class="terminal-loader">
        <div class="terminal-header">
            <div class="terminal-title">Status</div>
            <div class="terminal-controls">
                <div class="control close"></div>
                <div class="control minimize"></div>
                <div class="control maximize"></div>
            </div>
        </div>
        <div class="text">Loading...</div>
    </div>
</div>
<div class="cursor"></div>

<div class="container-fluid bg-logo-width px-lg-5  py-2">
    <div class="">
        <div class="row" id="ngo-navflex">
            <div class="col-12 col-lg-2 col-xl-1">
                <div>
                    <a href="" class="blibking_news-top_nav rounded-pill py-1 px-3 text-shadow">NEWS</a>
                </div>
            </div>
            <div class="col-12  col-md-6 col-lg-8 col-xl-9">
                <?php if (!empty($newsList)): ?>
                    <marquee behavior="" direction="">
                        <p class="text-white font-marquee-slide mb-0 font-phi"><?php echo $newsList->news_heading . ' - ' . $newsList->news; ?></p>
                    </marquee>
                <?php else: ?>
                    <marquee behavior="" direction="">
                        <p class="text-white font-marquee-slide mb-0 font-phi">At our NGO, we are passionate about
                            empowering individuals and communities through education, skills training, and support programs.
                            Our focus is on creating sustainable solutions that uplift lives and foster self-reliance.
                        </p>
                    </marquee>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-6 col-lg-2 col-xl-2 d-flex justify-content-center d-md-inline">
                <div class="text-end top-link-right ">
                    <a href="" class="mobile-show-this text-white">News</a>
                    <!-- <a href="<?// php echo base_url() ?>site/donate" class="text-white px-3">Donate Us</a> -->
                    <a href="<?php echo base_url() ?>site/login" class="text-white py-1 px-3 rounded-pill fw-bold bg-danger text-shadow"style="border-top:4px solid #ad3939;">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header responsive-padding-nav sticky-top">
    <div class="containerr">
        <div class="logo">
            <?php if (!empty($custom_setting)): ?>
                <a href="<?php echo base_url(); ?>site">
                    <img src="<?php echo base_url($custom_setting->logo); ?>" class="logo-nav-bar" alt="logo" style="height:3rem;width:140px;" />
                </a>
            <?php else: ?>
                <a href="<?php echo base_url() ?>site">
                    <img src="<?php echo base_url() ?>website_assets/logo.png" class="logo-nav-bar" alt="logo" />
                </a>
            <?php endif; ?>

        </div>
        <nav class="menu">
            <div class="head">
                <div class="logo">

                    <?php if (!empty($custom_setting)): ?>
                        <a href="<?php echo base_url(); ?>site">
                            <img src="<?php echo base_url($custom_setting->logo); ?>" class="logo-nav-bar" alt="logo" />
                        </a>
                    <?php else: ?>
                        <a href="<?php echo base_url() ?>site/">
                            <img src="<?php echo base_url() ?>website_assets/logo.png" class="logo-nav-bar" alt="logo" />
                        </a>
                    <?php endif; ?>

                </div>
                <button type="button" class="close-menu-btn"></button>
            </div>
            <ul>
                <li><a href="<?php echo base_url() ?>site"> Home</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)">Our Supporters</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url() ?>site/about"><span>About Us</span></a></li>
                        <li><a href="<?php echo base_url() ?>site/People_Behind"><span>People Behind</span></a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="">What We do</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url('site/web_development');?>"><span>Web Development</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('site/software_development');?>" ><span>Software Development</span></a>
                        </li>
                         <li>
                            <a href="<?php echo base_url('site/full_stack_development');?>" ><span>Full Stack Development</span></a>
                        </li>
                        <li>
                            <!-- <a href="<?php echo base_url('site/app_development');?>" ><span>App Development</span></a> -->
                            <a href="javaScript:void(0);" ><span>App Development</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('site/digital_marketing');?>" ><span>Digital Marketing</span></a>
                        </li>

                    </ul>
                </li>

                 <li class="dropdown">
                    <a href="">Our Courses</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url('site/c');?>"><span>C</span></a></li>
                        <li><a href="<?php echo base_url('site/c_plus');?>" ><span>C++</span></a></li>
                        <li><a href="<?php echo base_url('site/java');?>" ><span>Java</span></a></li>
                        <li><a href="<?php echo base_url('site/python');?>" ><span>Python</span></a></li>
                        <li><a href="<?php echo base_url('site/course_html');?>" ><span>HTML</span></a></li>
                        <li><a href="<?php echo base_url('site/css');?>" ><span>CSS</span></a></li>
                        <li><a href="<?php echo base_url('site/javascript');?>" ><span>Java Script</span></a></li>
                        <li><a href="<?php echo base_url('site/sql');?>" ><span>SQL / My SQL</span></a></li>

                    </ul>
                </li>

                <!-- <li class="dropdown"> -->
                    <!-- <a href="javascript:void(0)">Our Product</a> -->
                    <!-- <i class="fa-solid fa-angle-down"></i> -->
                    <!-- <ul class="sub-menu"> -->
                        <!-- <li><a href="javascript:void(0)" ><span>Core Banking Software</span></a></li> -->
                        <!-- <li><a href="javascript:void(0)" ><span>DSA Loan Management Software</span></a></li> -->
                        <!-- <li><a href="javascript:void(0)" ><span>Microfinance Software</span></a></li> -->
                        <!-- <li><a href="javascript:void(0)" ><span>NGO Software</span></a></li> -->
                        <!-- <li><a href="javascript:void(0)" ><span>MLM Software</span></a></li> -->
                        <!-- <li><a href="<?php echo base_url() ?>site/impact" ><span>Impact Stories 2</span></a></li> -->
                    <!-- </ul> -->
                <!-- </li> -->

                
                <li class="dropdown">
                    <a href="javascript:void(0)">Media Center</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                         <li><a href="<?php echo base_url() ?>site/media" ><span>Media</span></a></li>
                        <li><a href="<?php echo base_url() ?>site/team" ><span>Our Team</span></a></li>
                        <!-- <li><a href="<?php echo base_url() ?>site/our_volunteer" ><span>Our volunteer </span></a></li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)">Get Involved</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url('site/get_opportunity');?>" ><span>Job Oppurtunity</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascirpt:void(0)">Download</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li><a href="javascript:void(0);" ><span>Id card</span></a></li>
                        <li><a href="javascript:void(0);" ><span>Certificate</span></a></li>
                    </ul>
                </li>
                <!-- <li><a href="<?php echo base_url() ?>site/donarList">List Of Donor</a></li> -->
                <li><a href="<?php echo base_url() ?>site/contact">Contact</a></li>
            </ul>
        </nav>
        <div class="header-right">

            <button type="button" class="open-menu-btn">
                <span class="line line-1"></span>
                <span class="line line-2"></span>
                <span class="line line-3"></span>
            </button>
        </div>
    </div>
</header>