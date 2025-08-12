<!doctype html>
<!--    style="line-height:2;"     -->
<html lang="en,hi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="DynamicLayers">
    <title>Our Team || NGO</title>
    <?php include("includes/css.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>

    <div class="container-fluid p-0 position-relative">
        <img src="<?php echo base_url(); ?>website_assets/Hero-section/event_hero.png" class="w-100  mobile-height-set" alt="">
        <div class="all-common-banner-text">
            <h3 class="fw-bolder">Event</h3>
            <div class="d-flex link-part-hero gap-3"><a href="<?php echo base_url() ?>site/">Home</a>/ <p class="mb-0">Event</p>
            </div>
        </div>
    </div>

    <div class="container-fluid my-3 my-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bolder text-center animated-text">Upcoming Event</h1>
                    <p class="text-center" data-aos="fade-in"
                        data-aos-duration="3000">
                        Join us for an exciting upcoming event filled with inspiration, networking, and unforgettable
                        experiences. Mark your calendar and stay tuned for more details—don’t miss the opportunity to be
                        part of it!
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- media section start -->
    <div class="container-fluid my-2 my-lg-4">
        <div class="container">
            <div class="row">
                <div class="owl-carousel carousel-two">
                    <?php if (!empty($eventList)): ?>
                        <?php foreach ($eventList as $event): ?>
                            <div class="item border p-2 d-md-flex">
                                <div class="w-event-left">
                                    <img src="<?php echo base_url($event['e_images']) ?>" alt="Product 1">
                                </div>
                                <div class="decription-right-event d-flex align-items-center">
                                    <div>
                                        <h2 class="fw-bolder"><?php echo $event['e_heading']; ?></h2>
                                        <p class="text-justify"><?php echo $event['e_text']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="item border p-2 d-md-flex">
                            <div class="w-event-left">
                                <img src="<?php echo base_url() ?>website_assets/event1.png" alt="Product 1">
                            </div>
                            <div class="decription-right-event d-flex align-items-center">
                                <div>
                                    <h2 class="fw-bolder">Today’s Special Occasion
                                    </h2>
                                    <p class="text-justify" data-aos="fade-in"
                                        data-aos-duration="3000">Today’s Special Occasion generous supporters have played a vital role sion. Their
                                        unwavering commitment has enabled us to make a lasting impact, creating
                                        opportunities for growth and success. With their support, we continue to drive
                                        positive change and deliver on our promise to those we serve. We deeply appreciate
                                        their generosity, which fuels our efforts to reach new heights and transform lives
                                        for the better."</p>
                                </div>
                            </div>
                        </div>
                        <div class="item border p-2 d-md-flex">
                            <div class="w-event-left">
                                <img src="<?php echo base_url() ?>website_assets/event1.png" class="" alt="Product 1">
                            </div>
                            <div class="decription-right-event d-flex align-items-center">
                                <div>
                                    <h2 class="fw-bolder">Today’s Special Occasion
                                    </h2>
                                    <p class="text-justify">Today’s Special Occasion generous supporters have played a vital role sion. Their
                                        unwavering commitment has enabled us to make a lasting impact, creating
                                        opportunities for growth and success. With their support, we continue to drive
                                        positive change and deliver on our promise to those we serve. We deeply appreciate
                                        their generosity, which fuels our efforts to reach new heights and transform lives
                                        for the better."</p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- media section end -->


    <!-- marquee images section start -->
    <div class="container-fluid my-2 my-lg-5">
        <div class="container">
            <div class="row border p-3">
                <marquee behavior="" direction="" onmouseover="this.stop()" onmouseout="this.start()">
                    <div class="d-flex gap-6 ">
                        <div>
                            <img src="<?php echo base_url() ?>website_assets/all/event1.png" width="250px" alt="11">
                        </div>
                        <div>
                            <img src="<?php echo base_url() ?>website_assets/all/event2.png" width="250px" alt="11">
                        </div>
                        <div>
                            <img src="<?php echo base_url() ?>website_assets/all/event1.png" width="250px" alt="11">
                        </div>
                        <div>
                            <img src="<?php echo base_url() ?>website_assets/all/event2.png" width="250px" alt="11">
                        </div>
                    </div>
                </marquee>
            </div>
        </div>
    </div>
    <!-- marquee images section end -->


    <?php include("includes/footer.php"); ?>
    <?php include("includes/script.php"); ?>

</body>

</html>