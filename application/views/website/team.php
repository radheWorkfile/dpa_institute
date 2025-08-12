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
    <style>.custome-height{height:22rem;width:100%;}</style>

</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container-fluid p-0 position-relative">
        <img src="<?php echo base_url(); ?>website_assets/Hero-section/team_hero.png" class="w-100  mobile-height-set" alt="">
        <div class="all-common-banner-text">
            <h3 class="fw-bolder">Team</h3>
            <div class="d-flex link-part-hero gap-3"><a href="<?php echo base_url()?>site/">Home</a>/ <p class="mb-0">Team</p>
            </div>
        </div>
    </div>

    <div class="container-fluid my-3 my-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bolder text-center animated-text">Our Team</h1>
                    <p class="text-center" data-aos="fade-in"
                    data-aos-duration="3000">
                        Our gallery beautifully captures our efforts to uplift underprivileged communities by providing access to education, healthcare, nutrition, and shelter. Each image reflects our dedication to fostering self-reliance and sustainable development.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- media section start -->
    <div class="container-fluid my-2 my-lg-4">
        <div class="container">
            <div class="row">
               <?php if(!empty($teamMem)):?>
                <?php foreach($teamMem as $team):?>
                    <div class="col-12 col-lg-4 col-md-6 my-2">
                    <div class="team-01">
                        <div class="images-before grayscale">
                            <img src="<?php echo base_url($team['image']);?>" class="custome-height" alt="">
                        </div>
                        <div class="name-Box">
                              <h4 class="text-white pt-2 mb-0"><?php echo $team['heading'];?></h4>
                              <p class="my-0 py-1 text-secondary"><?php echo $team['content'];?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <?php else:?>
                <div class="col-12 col-lg-4 col-md-6 my-2">
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
                <div class="col-12 col-lg-4 col-md-6 my-2">
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
                <div class="col-12 col-lg-4 col-md-6 my-2">
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
                <?php endif;?>
            </div>
        </div>
    </div>
    <!-- media section end -->



    <?php include("includes/footer.php"); ?>
    <?php include("includes/script.php"); ?>

</body>

</html>