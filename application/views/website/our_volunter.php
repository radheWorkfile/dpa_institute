<!doctype html>
<!--    style="line-height:2;"     -->
<html lang="en,hi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="DynamicLayers">
    <title>Our Volunteer || NGO</title>
    <?php include("includes/css.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container-fluid p-0">
        <img src="<?php echo base_url(); ?>front/event/hero.jpeg" class="w-100 ComminHero" alt="">
    </div>
    <div class="container-fluid my-3 my-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bolder text-center animated-text">Making a Difference Together</h1>
                    <p class="text-center" data-aos="fade-in"
                        data-aos-duration="3000">
                        Our incredible volunteer embodies compassion and dedication, tirelessly working to uplift
                        communities and bring positive change. Their selfless efforts inspire hope, transform lives, and
                        contribute immensely to achieving our NGO’s mission and vision.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- media section start -->
    <div class="container-fluid my-2 my-lg-4">
        <div class="container">
            <div class="row">

                <?php if (!empty($volunteer)): ?>
                    <?php if (count($volunteer) <= 4): ?>
                        <?php foreach ($volunteer as $vol): ?>
                            <div class="col-md-3">
                                <div class="item">
                                    <img src="<?php echo base_url($vol['image']); ?>" class="hover-volu w-100 custome-height-1"
                                        alt="Testimonial 5">
                                    <div class="text-center">
                                        <h6 class="p-3 fw-bolder"><?php echo $vol['name']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php foreach ($volunteer as $vol): ?>
                            <div class="col-md-3">
                                <div class="item">
                                    <img src="<?php echo base_url($vol['image']); ?>" class="hover-volu w-100 custome-height-1"
                                        alt="Testimonial 5">
                                    <div class="text-center">
                                        <h6 class="p-3 fw-bolder"><?php echo $vol['name']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php else: ?>

                    <div class="owl-carousel carousel-thirrrd">
                        <div class="item">
                            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="hover-volu"
                                alt="Testimonial 1">
                            <div class="text-center">
                                <h6 class="p-3 fw-bolder">Sunny Raj</h6>

                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="hover-volu"
                                alt="Testimonial 2">
                            <div class="text-center">
                                <h6 class="p-3 fw-bolder">Sunny Raj</h6>

                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="hover-volu"
                                alt="Testimonial 3">
                            <div class="text-center">
                                <h6 class="p-3 fw-bolder">Sunny Raj</h6>

                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="hover-volu"
                                alt="Testimonial 4">
                            <div class="text-center">
                                <h6 class="p-3 fw-bolder">Radhe Raj</h6>

                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="hover-volu"
                                alt="Testimonial 5">
                            <div class="text-center">
                                <h6 class="p-3 fw-bolder">Ajay Raj</h6>

                            </div>
                        </div>
                    </div>

                <?php endif; ?>



            </div>
        </div>
    </div>
    <!-- media section end -->
    <?php include("includes/footer.php"); ?>
    <?php include("includes/script.php"); ?>

</body>

</html>