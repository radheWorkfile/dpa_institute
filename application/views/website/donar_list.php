<!doctype html>
<!--    style="line-height:2;"     -->
<html lang="en,hi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="DynamicLayers">
    <title>Donar List || NGO</title>
    <?php include("includes/css.php"); ?>
    <style>
        .custome-size {
            height: 24rem;
            width: 100%;
            margin-left: 1.5rem;
        }
    </style>
</head>

<body>
    <?php include("includes/navbar.php"); ?>

    <div class="container-fluid p-0 position-relative">
        <img src="<?php echo base_url(); ?>website_assets/Hero-section/donor_hero.png" class="w-100 mobile-height-set" alt="">
        <div class="all-common-banner-text">
            <h3 class="fw-bolder">Donor List</h3>
            <div class="d-flex link-part-hero gap-3"><a href="<?php echo base_url() ?>site">Home</a>/ <p class="mb-0">Donor List</p>
            </div>
        </div>
    </div>

    <div class="container-fluid my-3 my-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bolder text-center animated-text">Donor List</h1>
                    <p class="text-center" data-aos="fade-in"
                        data-aos-duration="3000">
                        We extend our heartfelt gratitude to our generous donors whose unwavering support fuels our
                        mission to create lasting change. Your contributions help us provide education, healthcare,
                        food, and shelter to those in need, making a real difference in countless lives.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- media section start -->
    <div class="container-fluid my-2 my-lg-4">
        <div class="container">
            <div class="row">
                <?php if (!empty($doListMan)): ?>
                    <?php if (count($doListMan) <= 4): ?>
                        <?php foreach ($doListMan as $amoList): ?>
                            <div class="col-md-4">
                                <div class="item">
                                    <div class="mobile-ngo-flex">
                                        <div>
                                            <img src="<?php echo base_url($amoList['image']); ?>" class="hover-donor custome-size"
                                                alt="Testimonial" style="margin-left:1.5rem;">
                                            <div class="text-center d-flex justify-content-center">
                                                <div id="donor-price-section">
                                                    <h6 class=" mb-0 fw-bolder text-white"><span class="">Name:-</span> <?php echo $amoList['name']; ?>
                                                    </h6>
                                                    <p class=" mb-0  text-white"><span>Amount -</span>₹ <?php echo $amoList['amount']; ?>.00</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="owl-carousel carousel-thirrrd">
                            <?php foreach ($doListMan as $amoList): ?>
                                <div class="item">
                                    <div class="mobile-ngo-flex">
                                        <div>
                                            <img src="<?php echo base_url($amoList['image']); ?>" class="hover-donor"
                                                alt="Testimonial 1">
                                            <div class="text-center d-flex justify-content-center">
                                                <div id="donor-price-section">
                                                    <h6 class=" mb-0 fw-bolder text-white"><span class="">Name:-</span> Ajay Raj
                                                    </h6>
                                                    <p class=" mb-0  text-white"><span>Amount:-</span>15,000</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="owl-carousel carousel-thirrrd">
                        <div class="item">
                            <div class="mobile-ngo-flex">
                                <div>
                                    <img src="<?php echo base_url() ?>website_assets/user-dummy.png" class="hover-donor"
                                        alt="Testimonial 1">
                                    <div class="text-center d-flex justify-content-center">
                                        <div id="donor-price-section">
                                            <h6 class=" mb-0 fw-bolder text-white"><span class="">Name:-</span> Ajay Raj
                                            </h6>
                                            <p class=" mb-0  text-white"><span>Amount:-</span>15,000</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mobile-ngo-flex">
                                <div>
                                    <img src="<?php echo base_url() ?>website_assets/user-dummy.png" class="hover-donor"
                                        alt="Testimonial 2">
                                    <div class="text-center d-flex justify-content-center">
                                        <div id="donor-price-section">
                                            <h6 class=" mb-0  text-white"><span class="">Name:-</span> Tannnu Priya</h6>
                                            <p class=" mb-0  text-white"><span>Amount:-</span>15,000</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mobile-ngo-flex">
                                <div>
                                    <img src="<?php echo base_url() ?>website_assets/user-dummy.png" class="hover-donor"
                                        alt="Testimonial 3">
                                    <div class="text-center d-flex justify-content-center">
                                        <div id="donor-price-section">
                                            <h6 class=" mb-0  text-white"><span class="">Name:-</span> Raushan Raj</h6>
                                            <p class=" mb-0  text-white"><span>Amount:-</span>15,000</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mobile-ngo-flex">
                                <div>
                                    <img src="<?php echo base_url() ?>website_assets/user-dummy.png" class="hover-donor"
                                        alt="Testimonial 4">
                                    <div class="text-center d-flex justify-content-center">
                                        <div id="donor-price-section">
                                            <h6 class=" mb-0  text-white"><span class="">Name:-</span> Nikhil Raj</h6>
                                            <p class=" mb-0  text-white"><span>Amount:-</span>15,000</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="mobile-ngo-flex">
                                <div>
                                    <img src="<?php echo base_url() ?>website_assets/user-dummy.png" class="hover-donor"
                                        alt="Testimonial 5">
                                    <div class="text-center d-flex justify-content-center align-items-center">
                                        <div id="donor-price-section">
                                            <h6 class=" mb-0  text-white"><span class="">Name:-</span> Sunny Raj</h6>
                                            <p class=" mb-0  text-white"><span>Amount:-</span>15,000</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>



    <!-- media section end -->
     <!-- Best DPA computer institute in Bihar Sharif  -->



    <?php include("includes/footer.php"); ?>
    <?php include("includes/script.php"); ?>

</body>

</html>