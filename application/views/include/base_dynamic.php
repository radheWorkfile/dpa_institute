<!-- -------------------------  Banner section start ---------------  -->
<div id="main-slider" class="nivoSlider mdNovoslider">
              <img src="<?php echo base_url(); ?>front/banner/slider1.jpg" class="setBanner" alt="" title="#slider-caption-1">
              <img src="<?php echo base_url(); ?>front/banner/slider2.jpg" class="setBanner" alt title="#slider-caption-2">
              <img src="<?php echo base_url(); ?>front/banner/slider3.jpg" class="setBanner" alt title="#slider-caption-3">
            </div>
		<?php foreach ($bannerList as $banner): ?>
            <img src="<?php echo base_url() .$banner['banner']; ?>" class="setBanner w-100" alt="" title="#slider-caption-1">
          <?php endforeach; ?>
<!-- -------------------------  Banner section end ---------------  -->
