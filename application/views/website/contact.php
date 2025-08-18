<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="">
    <title>Contact Us || NGO</title>
    <?php include("includes/css.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container-fluid p-0 position-relative">
        <img src="<?php echo base_url(); ?>website_assets/Hero-section/contact_us.png" class="w-100 mobile-height-set" alt="">
        <div class="all-common-banner-text">
            <h3 class="fw-bolder">Contact Us</h3>
            <div class="d-flex link-part-hero gap-3"><a href="<?php echo base_url() ?>site">Home</a>/ <p class="mb-0">Contact Us</p>
            </div>
        </div>
    </div>


    <div class="container-fluid my-2 my-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div>
                        <div class="border my-2 p-3 shadow-contact-box">
                            <div class="contact_left_item d-flex gap-3">
                                <div>
                                    <div class="contact_left_icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                </div>
                                <div class="contact_left_text">
                                    <h3>Address:</h3>
                                    <p><?php echo $custom_setting->address ? $custom_setting->address : config_item('address'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="border my-2 p-3 shadow-contact-box">
                            <div class="conact_left_item d-flex gap-3">
                                <div>
                                    <div class="contact_left_icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="contact_left_text">
                                    <h3>Mail Now:</h3>
                                    <p><a class="contact-anchor"
                                            href="mailto:<?php echo $custom_setting->email ? $custom_setting->email : config_item('email'); ?>"><?php echo $custom_setting->email ? $custom_setting->email : config_item('email'); ?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="border my-2 p-3 shadow-contact-box">
                            <div class="contact_left_item d-flex gap-3">
                                <div>
                                    <div class="contact_left_icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                </div>
                                <div class="contact_left_text">
                                    <h3>Call Now:</h3>
                                    <p><a class="contact-anchor" href="tel:91<?php echo $custom_setting->mobile ? $custom_setting->mobile : config_item('mobile_number_1'); ?>"><?php echo $custom_setting->mobile ? '+91 '. $custom_setting->mobile : config_item('mobile_number_1'); ?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="border-left-contact p-2 p-md-3 p-lg-4">
                        <form id="contact" action="<?php echo base_url() ?>site/formhandler" method="post" class="">
                            <h3 class="fw-bolder animated-text">Quick Contact</h3>
                            <h5>Contact us today, and get reply with in 24 hours!</h5>
                            <div class="col-12 d-md-flex ">
                                <div class="col-12 col-md-6 my-2">
                                    <div>
                                        <input placeholder="Your name" name="name" id="name"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')"
                                            type="text" class=" contact-input-ngo" required>
                                    </div>
                                    <div class="my-3">
                                        <input placeholder="Your Phone Number" id="mobile" name="mobile" maxlength="10"
                                            oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')"
                                            type="tel" class=" contact-input-ngo" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 ml-0 ml-lg-1 my-2">
                                    <div>
                                        <input placeholder="Your Email Address" id="email" name="email" class=" contact-input-ngo" type="email"
                                            required>
                                    </div>
                                    <!-- <div class="my-3">
                                        <input placeholder="Enter Subject Here" name="subject"
                                            oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')"
                                            id="subject" type="text" class="contact-input-ngo" required>
                                    </div> -->


                                    <div class="my-3">
                                    <select name="course" id="course" class="contact-input-ngo w-82">
                                    <option value="" selected>Select One</option>
                                    <option value="web-development">Web Development</option>
                                    <option value="full-stack-development">Full Stack Development</option>
                                    <option value="digital-marketing">Digital Marketing</option>
                                    <option value="graphic-designing">Graphic Designing</option>
                                    <option value="c++">C++</option>
                                    <option value="java">Java</option>
                                    <option value="python">Python</option>
                                    <option value="html">HTML</option>
                                    <option value="css">CSS</option>
                                    <option value="javascript">JavaScript</option>
                                    <option value="sql-mysql">SQL / MySQL</option>
                                    </select>
                                    </div>



                                </div>
                            </div>

                            <div>
                                <textarea placeholder="Type your Message Here...." class="width-contact-80 contact-input-ngo" rows="4" name="message" id="message"
                                    oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9,. ]/g, '').replace(/\s+/g, ' ');"
                                    required></textarea>
                            </div>

                            <div>
                                <button name="submit" class="btn-organe-common btn-contact-colors width-contact-80" id="submit" type="submit" id="contact-submit"
                                    data-submit="...Sending">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include("includes/footer.php"); ?>
    <?php include("includes/script.php"); ?>
</body>
</html>
<!-- Best DPA computer institute in Bihar Sharif  -->
