<!--  Best DPA computer institute in Bihar Sharif  -->
<?php $custom_setting = $this->db->select('*')->get('setting')->row(); ?>
<?php if (!empty($custom_setting)): ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url($custom_setting->favicon); ?>">
<?php else: ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>website_assets/favicon.jpeg">
<?php endif; ?>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
<!-- Material Icons CDN -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/navbar.css">
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/style.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://unpkg.com/split-type"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
  .h1-m { font-size: 2rem; } 
  .h4-m { font-size: 2rem; }   
  .h5-m { font-size: 2rem; } 
  .h6-m { font-size: 1.8rem; }  
</style>
<style>
    .qr-img-man {
        height: 10rem;
        border: 1px solid #d2d2d2;
        border-radius: 0.5rem;
    }
</style>
<style>
    .upload-container {
        border: 2px solid #d9cfcf;
        width: 92%;
        height: 4rem;
        padding: 20px;
        text-align: center;
        cursor: pointer;
    }

    #image-preview {
        margin-top: -1rem;
        max-width: 100%;
        height: 3rem;
        display: none;
    }

    #upload-message {
        display: block;
    }

    .custome-height {
        height: 15rem;
    }

    .custome-height-1 {
        height: 20rem;
    }
</style>