<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you || Ngo </title>
    <?php include('include/'); ?>
    <?php include("includes/css.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container-fluid p-0">
        <img src="<?php echo base_url(); ?>front/ngo_img/banner/thanku_banner.png" class="w-100 ComminHero mt-5" alt="@dued">
    </div>


    <section style="padding:8rem">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php echo $response; ?>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>front/ngo_img/banner/thankImg.JPG" class="w-100 ComminHero" style="border-radius:1rem;box-shadow:1px 1px 11px grey;" alt="">
                </div>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php"); ?>
    <?php include("includes/script.php"); ?>
</body>

</html>