<!doctype html>
<!--    style="line-height:2;"     -->
<html lang="en,hi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="DynamicLayers">
    <title>Media || NGO</title>
    <?php include("includes/css.php"); ?>
</head>
<body>
    <?php include("includes/navbar.php"); ?>

    <div class="container-fluid p-0 position-relative">
        <img src="<?php echo base_url(); ?>website_assets/Hero-section/media_hero.jpeg" class="w-100  mobile-height-set" alt="">
        <div class="all-common-banner-text">
            <h3 class="fw-bolder">Media</h3>
            <div class="d-flex link-part-hero gap-3"><a href="<?php echo base_url()?>site/">Home</a>/ <p class="mb-0">Media</p>
            </div>
        </div>
    </div>
  

    <div class="container-fluid my-3 my-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bolder text-center animated-text">Our Gallery</h1>
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



                <?php if(!empty($galleryItem)):?>
                <?php foreach($galleryItem as $media):?>
                <div class="col-12 col-lg-4 col-md-6 my-2">
                    <div class="team-01">
                        <div class="images-before grayscale">
                        <img src="<?php echo base_url($media['image'])?>" alt="">
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <?php else:?>
                    <div class="col-12 col-lg-4 col-md-6 my-2">
                    <div class="team-01">
                        <div class="images-before grayscale">
                            <img src="<?php echo base_url() ?>website_assets/all/image_1.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 my-2">
                    <div class="team-01">
                        <div class="images-before grayscale">
                            <img src="<?php echo base_url() ?>website_assets/all/image_2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 my-2">
                    <div class="team-01">
                        <div class="images-before grayscale">
                            <img src="<?php echo base_url() ?>website_assets/all/image_3.png" alt="">
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