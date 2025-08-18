<!-- Best DPA computer institute in Bihar Sharif  -->
<?php $data['newsList'] = $this->db->select('*')->where(array('id' => '1', 'status' => 1))->order_by('id', 'ASC')->get('cms_news')->row_array(); ?>
<?php $custom_setting = $this->db->select('*')->get('setting')->row(); ?>

<section class="widget-section py-3 px-0 py-lg-5">
    <div class="container">
        <div class="widget-wrap row">
            <div class="col-md-4 xs-padding mt-4">
                <div class="">
                    <?php if(!empty($custom_setting)):?>
                    <a href="<?php echo base_url()?>site"> 
                    <img src="<?php echo base_url(!empty($custom_setting->logo)?$custom_setting->logo:'website_assets/logo.png');?>" class="logo-start-section-footer"alt="">
                    </a>
                    <?php else:?>
                    <a href="<?php echo base_url()?>site">
                    <img src="<?php echo base_url() ?>website_assets/logo.png" class="logo-start-section-footer"
                    alt="">
                    </a>
                    <?php endif;?>
                    <div>
                        <?php if ($custom_setting): ?>
                            <p class="text-white py-3 mb-0 text-justify"><?php echo 'DPA '.$custom_setting->about_company.'!'; ?></p>
                        <?php else: ?>
                            <p class="text-white py-3 mb-0">
                               DPA Computer Institute empowers students with essential coding skills, offering hands-on training in HTML, CSS, PHP, JavaScript, and popular frameworks. With expert instructors and real-world projects, students also master Git for version control. Join DPA to build a strong foundation in web development and boost your career with industry-relevant tech skills. Learn, code, and succeed!
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($custom_setting)): ?>
                        <div class="footer-social-links d-flex gap-3">
                            <a href="<?php echo $custom_setting->facebook ? $custom_setting->facebook : 'https://www.facebook.com'; ?>" class="social-icon-outer d-flex justify-content-center align-items-center">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="<?php echo $custom_setting->instagram ? $custom_setting->instagram : 'https://www.instagram.com'; ?>" class="social-icon-outer d-flex justify-content-center align-items-center">
                                <i class="fa-brands fa-instagram text-danger"></i>
                            </a>
                            <a href="<?php echo $custom_setting->twitter ? $custom_setting->twitter : 'https://www.twitter.com'; ?>" class="social-icon-outer d-flex justify-content-center align-items-center">
                                <i class="fa-brands fa-twitter text-black"></i>
                            </a>
                            <a href="<?php echo $custom_setting->linkedin ? $custom_setting->linkedin : 'https://www.linkedin.com'; ?>" class="social-icon-outer d-flex justify-content-center align-items-center">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4 xs-padding mt-4 d-md-flex justify-content-center">
                <div class="widget-content ">
                    <div>
                        <h3 class="mb-4 text-white">Quick Link</h3>
                        <ul class="link-left-footer">
                            <li class=""><a href="<?php echo base_url(); ?>Site/index"
                                    class="text-slate-900 footer-before-hover mb-2">- Home</a>
                            </li>
                            <li class=" py-md-2"><a href="<?php echo base_url(); ?>Site/about"
                                    class="text-slate-900 mb-2 footer-before-hover">- About Us</a></li>
                            <li class="py-md-1"><a href="<?php echo base_url(); ?>site/login"class="text-slate-900 mb-2 footer-before-hover">- Web development</a></li>
                            <li class="py-md-1"><a href="<?php echo base_url(); ?>site/login"class="text-slate-900 mb-2 footer-before-hover">- Software development</a></li>
                            <li class="py-md-1"><a href="<?php echo base_url(); ?>site/login"class="text-slate-900 mb-2 footer-before-hover">- Full stack development</a></li>
                            <li class="py-md-1"><a href="<?php echo base_url(); ?>site/login"class="text-slate-900 mb-2 footer-before-hover">- Application development</a></li>
                            <li class="py-md-1"><a href="<?php echo base_url(); ?>site/login"class="text-slate-900 mb-2 footer-before-hover">- Digital marketing</a></li>
                            <li class="py-md-1"><a href="<?php echo base_url(); ?>site/login"class="text-slate-900 mb-2 footer-before-hover">- Graphic design</a></li>
                            <li class=" py-md-1"><a href="<?php echo base_url(); ?>Site/contact"
                                    class="text-slate-900 mb-2 footer-before-hover">- Contact Us</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-lg-4 xs-padding d-md-flex flex-column align-items-center">
                <div class="widget-content ">
                    <h3 class="mb-4 text-white">Contact Us</h3>
                    <ul class="address p-0">
                        <li class="mbb">
                            <i class="fa-solid fa-envelope text-white pe-2"></i>
                            <a href="mailto:ngo@gmail.com" class="text-slate-900 ">
                                <?php echo $custom_setting->email ? $custom_setting->email : 'dpacomputerinstitute@gmail.com'; ?>
                            </a>
                        </li>
                        <li class="mbb my-2">
                            <i class="fa-solid fa-phone text-white pe-2"></i>
                            <a href="tel: +91 9028388889"
                                class="text-slate-900 ">+91&nbsp;<?php echo $custom_setting->mobile ? $custom_setting->mobile : '8434113233'; ?>
                            </a>
                        </li>
                        <li class="my-2 d-flex ">
                            <i class="fa-solid fa-location-dot text-white pe-2"></i>
                            <p class="text-slate-900 ">
                                <?php echo $custom_setting->address ? $custom_setting->address : 'Shivaji Nagar, Khandak Par, Bihar Sharif, Nalanda - 803101'; ?>

                            </p>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>




<section class="container-fluid border-t-1"style="background-color:rgb(3 11 40);">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <p class="p-3 text-center text-white mb-0"><b><a href="<?php echo base_url('site');?>" class="text-white text-shadow"><?php echo $custom_setting->reservedText?'@ '.$custom_setting->reservedText:'NGO';?></a></b>
    </a></p>
            </div>
        </div>
    </div>
</section>