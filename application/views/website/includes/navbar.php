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
                    <a href="" class="blibking_news-top_nav">NEWS</a>
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
                    <a href="<?php echo base_url() ?>site/donate" class="text-white px-3">Donate Us</a>
                    <a href="<?php echo base_url() ?>site/login" class="text-white ">Sign In</a>
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
                    <img src="<?php echo base_url($custom_setting->logo); ?>" class="logo-nav-bar" alt="logo" />
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
                <li><a href="<?php echo base_url() ?>site">Home</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)">Our Supporters</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url() ?>site/about" class="text-black"><span>About Us</span></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>site/annual_report" class="text-black"><span>Annual Reports</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>site/People_Behind" class="text-black"><span>People Behind</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>site/presense" class="text-black"><span>Reach & Presence</span></a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="">What We do</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?php echo base_url() ?>site/health" class="text-black"><span>Health</span></a>
                        </li>

                        <li>
                            <a href="<?php echo base_url() ?>site/education" class="text-black"><span>Education</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>site/environment" class="text-black"><span>Environment</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>site/Women" class="text-black"><span>Women Empowerment</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>site/child" class="text-black"><span>Privilged Child</span></a>
                        </li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:void(0)">Project</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url() ?>site/projectComplete" class="text-black"><span>Complete Project</span></a>
                        </li>
                        <!-- <li><a href="<?php echo base_url() ?>site/impact" class="text-black"><span>Impact Stories 2</span></a></li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)">Media Center</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url() ?>site/media" class="text-black"><span>Media</span></a></li>
                        <li><a href="<?php echo base_url() ?>site/team" class="text-black"><span>Our Team</span></a></li>
                        <li><a href="<?php echo base_url() ?>site/event" class="text-black"><span>Workshop & Event</span></a></li>
                        <li><a href="<?php echo base_url() ?>site/our_volunteer" class="text-black"><span>Our volunteer </span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)">Get Involved</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li><a href="<?php echo base_url() ?>site/get_opportunity" class="text-black"><span>Job Oppurtunity</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascirpt:void(0)">Download</a>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="sub-menu">
                        <li><a href="javascript:void(0);" class="text-black"><span>Id card</span></a></li>
                        <li><a href="javascript:void(0);" class="text-black"><span>Membership Certificate</span></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url() ?>site/donarList">List Of Donor</a></li>
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