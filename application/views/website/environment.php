<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Environment || NGO </title>
    <?php include("includes/css.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container-fluid p-0 position-relative">
        <img src="<?php echo base_url(); ?>website_assets/Hero-section/environment.jpg" class="w-100  mobile-height-set" alt="">
        <div class="all-common-banner-text">
            <h3 class="fw-bolder">Environment</h3>
            <div class="d-flex link-part-hero gap-3"><a href="<?php echo base_url() ?>">Home</a>/ <p class="mb-0">Environment</p>
            </div>
        </div>
    </div>
    <!-- Our Mission for the Environment end -->
    <section class="container-fluid my-3 my-lg-4">
        <div class="container">
            <div class="row ">
                <div class="col-12 col-lg-7 my-2 d-flex align-items-end">
                    <div>
                        <h1 class="fw-bolder animated-text">Our Mission for the Environment</h1>
                        <p class="text-justify" data-aos="fade-in"
                            data-aos-duration="3000">
                            At [NGO Name], we believe that a healthy planet is the foundation for a thriving future.
                            Our mission is to protect, preserve, and restore the natural world through community action, education, and sustainable practices.
                        </p>
                        <p class="text-justify" data-aos="fade-in"
                            data-aos-duration="3000">
                            We are committed to fighting climate change, conserving biodiversity, promoting green energy, and empowering communities to build a more sustainable tomorrow.
                            Through strategic projects — from massive tree-planting campaigns to waste management drives — we aim to reduce environmental degradation and create resilient ecosystems.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 mt-2 d-flex justify-content-center">
                    <div>
                        <img src="<?php echo base_url(); ?>website_assets/all/plant.jpg" class="w-health-part rounded-part" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about people behind this end -->




    <!-- How We Work start -->
    <section class="container-fluid my-2 my-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="fw-bolder animated-text">How We Work</h2>
                    <p class="text-justify mb-0" data-aos="fade-up"
                    data-aos-duration="3000">
                        At [NGO Name], we believe that lasting environmental change begins with action, collaboration, and education.
                        Our work is built on a community-centered, science-driven, and sustainability-focused approach.</p>
                </div>
                <div class="col-12" data-aos="fade-up"
                data-aos-duration="3000">
                    <div class="border-bottom">
                        <b>1. Research & Planning</b>
                        <p class="text-justify">
                            We start with thorough research to understand the environmental challenges of each region — whether it's deforestation, pollution, or loss of biodiversity.
                        </p>
                    </div>
                </div>
                <div class="col-12 my-2" data-aos="fade-up"
                data-aos-duration="3000">
                    <div class="border-bottom">
                        <b>2. Community Engagement</b>
                        <p class="text-justify">
                            We actively involve local communities, volunteers, students, and organizations in our environmental initiatives.
                            We believe change is most powerful when people feel ownership of it.
                        </p>
                    </div>
                </div>
                <div class="col-12 " data-aos="fade-up"
                data-aos-duration="3000">
                    <div class="border-bottom">
                        <b>3. On-Ground Action</b>
                        <p class="text-justify">
                            From planting trees to restoring water bodies, from waste management programs to awareness campaigns — we bring practical projects to life.
                            Our teams work directly in the field to create real, measurable impact.
                        </p>
                    </div>
                </div>
                <div class="col-12 " data-aos="fade-up"
                data-aos-duration="3000">
                    <div class="border-bottom">
                        <b>4. Advocacy & Education</b>
                        <p class="text-justify">
                            We raise awareness through campaigns, workshops, and events that promote eco-friendly practices and environmental responsibility.
                            By educating future generations, we are investing in long-term environmental stewardship.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How We Work end -->




    <!-- our team start -->
    <div class="container-fluid my-2 my-lg-4">
        <div class="container">
            <div class="row">
                <?php if (!empty($teamMem)): ?>
                    <?php foreach ($teamMem as $team): ?>
                        <div class="col-12 col-lg-4 col-md-6 my-2">
                            <div class="team-01" data-aos="zoom-in"
                            data-aos-duration="3000">
                                <div class="images-before grayscale">
                                    <img src="<?php echo base_url($team['image']); ?>" class="custome-height" alt="">
                                </div>
                                <div class="name-Box">
                                    <h4 class="text-white pt-2 mb-0"><?php echo $team['heading']; ?></h4>
                                    <p class="my-0 py-1 text-secondary"><?php echo $team['content']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 col-lg-4 col-md-6 my-2" data-aos="zoom-in"
                    data-aos-duration="3000">
                        <div class="team-01">
                            <div class="images-before grayscale">
                                <img src="<?php echo base_url() ?>website_assets/all/event1.png" alt="">
                            </div>
                            <div class="name-Box">
                                <h4 class="text-white pt-2 mb-0">Sunny Raj</h4>
                                <p class="my-0 py-1 text-secondary">Website developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6 my-2" data-aos="zoom-in"
                    data-aos-duration="3000">
                        <div class="team-01">
                            <div class="images-before grayscale">
                                <img src="<?php echo base_url() ?>website_assets/all/event2.png" alt="">
                            </div>
                            <div class="name-Box">
                                <h4 class="text-white pt-2 mb-0">Sunny Raj</h4>
                                <p class="my-0 py-1 text-secondary">Website developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-md-6 my-2" data-aos="zoom-in"
                    data-aos-duration="3000">
                        <div class="team-01">
                            <div class="images-before grayscale">
                                <img src="<?php echo base_url() ?>website_assets/all/event1.png" alt="">
                            </div>
                            <div class="name-Box ">
                                <h4 class="text-white pt-2 mb-0">Sunny Raj</h4>
                                <p class="my-0 py-1 text-secondary">Website developer</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- our team end -->
     <!-- Best DPA computer institute in Bihar Sharif  -->




    <?php include("includes/footer.php"); ?>
    <?php include("includes/script.php"); ?>

</body>

</html>