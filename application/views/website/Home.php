<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <?php include("includes/css.php"); ?>
</head>

<body>

  <?php include("includes/navbar.php"); ?>
  <!-- Slider main container -->
  <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <?php if (!empty($bannerList)): ?>
        <?php foreach ($bannerList as $banner): ?>
      <div class="swiper-slide">
        <div class="position-relative">
        <img src="<?php echo base_url($banner['banner']); ?>" class="swiperimg" alt="">
          <div class="position-absolute top-50 slider-text-value">
          <h2 class="text-white animated-text"><?php echo ($banner['heading']); ?></h2>
          <p class="text-white"><?php echo ($banner['content']); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
        <!-- dynamic section end here  -->
      <?php else: ?>
      <div class="swiper-slide">
        <div class="position-relative">
          <img src="<?php echo base_url(); ?>website_assets/new-slider3.jpg" class="swiperimg" alt="">
          <div class="position-absolute top-50 slider-text-value">
            <h2 class="text-white animated-text">Healthcare for Everyone</h2>
            <p class="text-white">
              We provide medical aid, free health camps, and awareness programs to ensure every individual has access to
              essential healthcare services.
            </p>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="position-relative">
          <img src="<?php echo base_url(); ?>website_assets/new-slider2.jpg" class="swiperimg" alt="">
          <div class="position-absolute top-50 slider-text-value">
            <h2 class="text-white animated-text">Fighting Hunger & Poverty</h2>
            <p class="text-white">
              Our food distribution and livelihood programs help vulnerable families overcome hunger and poverty. Your
              support can bring hope and nourishment to those in need.
            </p>
          </div>
        </div>
      </div>
      <?php endif; ?>
      ...
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination" id="bullet-hero"></div>



  </div>


  <!-- section 1 start -->
  <section class="container-fluid my-3 my-lg-5">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 order-2 order-lg-0">
          <p><img src="<?php echo base_url(); ?>website_assets/about.png" class="w-100" alt="">
          </p>
        </div>
        <div class="col-lg-8 d-flex align-items-center">
          <div>
            <div class="position-relative d-inline">
              <span class="subtitle-part">About Us</span>
            </div>
            <h2 class="text-color fw-bolder my-2 animated-text">A Future of Hope and Opportunity</h2>

            <p class="text-justify" data-aos="fade-left"
            data-aos-duration="3000">At our NGO, we are passionate about empowering individuals and
              communities through education, skills training, and support programs. Our focus
              is on creating sustainable solutions that uplift lives and foster self-reliance.We work closely
              with underserved communities, addressing their
              unique needs and providing resources that enable growth. Through mentorship,
              vocational training, and educational initiatives, we open doors to better
              opportunities and brighter futures.
            </p>
            <p class="text-justify" data-aos="fade-left"
            data-aos-duration="3000">Our mission is to create lasting change by providing individuals
              with the tools to transform their lives. Together, with the help of our
              volunteers and supporters, we are building a future full of hope and
              opportunity.</p>
            <div class="my-4">
              <a class="button-effect-part" href="<?php echo base_url() ?>site/about">Learn More</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- section 1 end -->


  <!-- Our Management Team section start -->
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <p class="col-12">
        <h2 class="text-center fw-bolder animated-text">Our Management Team</h2>
        <p class="text-center" data-aos="fade-up"
        data-aos-duration="3000">
          Our dedicated management team is the driving force behind our mission. With a deep commitment to social
          impact, they bring extensive experience, strategic vision, and compassionate leadership to ensure our
          initiatives create lasting change.
        </p>
        </p>
      </div>
    </div>
  </div>


  <div class="container-fluid mt-2 mt-lg-4">
    <div class="container">
      <div class="row">

       <?php if(!empty($teamMem)):?>
       <?php if(count($teamMem) <= 4):?>
       <?php foreach($teamMem as $team):?>    
       <div class="col-md-3">
       <div class="item">
            <img src="<?php echo base_url($team['image']);?>" class="w-100 custome-height" alt="Testimonial 1">
            <div class="text-center ">
              <div class="border my-2 team-name w-100">
                <h5 class="p-3 fw-bolder w-100"><?php echo $team['heading'];?></h5>
              </div>
            </div>
          </div>
       </div>
       <?php endforeach;?>
       <?php else:?>
        <div class="owl-carousel carousel-thirrrd">
          <?php foreach($teamMem as $team):?>
            <div class="item">
            <img src="<?php echo base_url($team['image']);?>" class="custome-height" alt="Testimonial 1">
            <div class="text-center ">
              <div class="border my-2 team-name">
                <h5 class="p-3 fw-bolder"><?php echo $team['heading'];?></h5>
              </div>
            </div>
          </div>
          <?php endforeach;?>
          </div>
       <?php endif;?>
       <?php else:?>
        <div class="owl-carousel carousel-thirrrd">
        <div class="item">
            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="" alt="Testimonial 1">
            <div class="text-center ">
              <div class="border my-2 team-name">
                <h5 class="p-3 fw-bolder">Sunny Raj</h5>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="" alt="Testimonial 2">
            <div class="text-center">
              <div class="border my-2 team-name">
                <h5 class="p-3 fw-bolder">Sunny Raj</h5>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="" alt="Testimonial 3">
            <div class="text-center">
              <div class="border my-2 team-name">
                <h5 class="p-3 fw-bolder">Ajay Raj</h5>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="" alt="Testimonial 4">
            <div class="text-center">
              <div class="border my-2 team-name">
                <h5 class="p-3 fw-bolder">Raushan Raj</h5>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="" alt="Testimonial 5">
            <div class="text-center">
              <div class="border my-2 team-name">
                <h5 class="p-3 fw-bolder">Amit Raj</h5>
              </div>
            </div>
          </div>
        </div>
       <?php endif;?>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex justify-content-md-end justify-content-center">
          <a class="" href="<?php echo base_url() ?>site/team" id="bgg-more-view">View More <i
              class="fa-solid fa-arrow-right arrow-more"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Our Management Team section end -->




  <!-- media section start -->
  <div class="container-fluid my-2 my-lg-4" id="Alice-blue-bg">
    <div class="container">
      <div class="row">
        <p class="col-12 my-3 my-lg-4">
        <h2 class="animated-text fw-bolder text-center">Our Events</h2>
        <p class="text-center py-2" data-aos="fade-up"
        data-aos-duration="3000">
          We organize impactful events throughout the year to support our mission and bring communities together. From
          fundraising campaigns and awareness drives to volunteer programs and educational workshops, every event plays
          a crucial role in creating positive change.
        </p>
        </p>
        <div class="owl-carousel carousel-two">
        <?php if (!empty($eventList)): ?>
          <?php foreach ($eventList as $event): ?>
          <div class="item border p-2 d-md-flex">
            <div class="w-event-left">
              <!-- <img src="<?php echo base_url($event['e_images']); ?>" alt="Product 1" style="height:340px;"> -->
              <img src="<?php echo base_url($event['e_images']);?>" alt="Product 1" style="height:340px;">
            </div>
            <div class="decription-right-event d-flex align-items-center">
              <div>
                <h2 class="fw-bolder"><?php echo $event['e_heading']?></h2>
                <p><?php echo $event['e_text']?></p>
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
                <p>Today’s Special Occasion generous supporters have played a vital role sion. Their
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
              <img src="<?php echo base_url()?>website_assets/event1.png" class="" alt="Product 1">
            </div>
            <div class="decription-right-event d-flex align-items-center">
              <div>
                <h2 class="fw-bolder">Today’s Special Occasion
                </h2>
                <p>Today’s Special Occasion generous supporters have played a vital role sion. Their
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


  <!-- our program section start -->
  <div class="container-fluid my-2 px-0 my-lg-4">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-center">
          <div class="">
            <h2 class="text-center animated-text" id="program-before">Our Programmes</h2>
            <p class="text-center" data-aos="fade-up"
            data-aos-duration="3000">
              Our NGO’s program focuses on empowering communities through education, healthcare, and
              sustainable
              development. We provide essential resources, skills training, and support systems to uplift
              underprivileged
              individuals, ensuring a brighter
              future and fostering self-reliance for long-term impact.
            </p>
          </div>
        </div>
        <div class="col-12 col-lg-4 my-4" >
          <div class="border-ngo position-relative" data-aos="fade-up"
          data-aos-duration="3000">
            <div>
              <img src="<?php echo base_url() ?>website_assets/all/education.png" class="w-25 width-hover-ngo" alt="">
            </div>
            <div>
              <h4 class="my-2 text-hover-effect">Education</h4>
              <p class="text-justify text-hover-effect">
                Our NGO's education program empowers underprivileged children with quality learning
                opportunities for a
                brighter future.
              </p>
            </div>
            <div class="d-flex align-items-center justify-content-center">
              <div class="number-program-ngo d-flex align-items-center justify-content-center">
                <h2 class="stoke-number">01</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4  my-4">
          <div class="border-ngo position-relative" data-aos="fade-up"
          data-aos-duration="3000">
            <div>
              <img src="<?php echo base_url() ?>website_assets/all/healthcare.png" class="w-25 width-hover-ngo" alt="">
            </div>
            <div>
              <h4 class="my-2 text-hover-effect">Health Care</h4>
              <p class="text-justify text-hover-effect">
                Our NGO's health program provides essential care, raising awareness and ensuring
                healthier lives for
                underserved communities.
              </p>
            </div>
            <div class="d-flex align-items-center justify-content-center">
              <div class="number-program-ngo d-flex align-items-center justify-content-center">
                <h2 class="stoke-number">02</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4  my-4">
          <div class="border-ngo position-relative" data-aos="fade-up"
          data-aos-duration="3000">
            <div>
              <img src="<?php echo base_url() ?>website_assets/all/woman.png" class="w-25 width-hover-ngo" alt="">
            </div>
            <div>
              <h4 class="my-2 text-hover-effect">Women Empowerment</h4>
              <p class="text-justify text-hover-effect">
                Our NGO's education program empowers underprivileged children with quality learning
                opportunities for a
                brighter future.
              </p>
            </div>
            <div class="d-flex align-items-center justify-content-center">
              <div class="number-program-ngo d-flex align-items-center justify-content-center">
                <h2 class="stoke-number">03</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="container-fluid my-2 px-0 my-lg-4">
    <div class="container">
      <div class="row">

        <div class="col-12 col-lg-4 my-4">
          <div class="border-ngo position-relative" data-aos="fade-up"
          data-aos-duration="3000">
            <div>
              <img src="<?php echo base_url() ?>website_assets/all/planting.png" class="w-25 width-hover-ngo" alt="">
            </div>
            <div>
              <h5 class="my-2 text-hover-effect">Environmental Programs</h5>
              <p class="text-justify text-hover-effect">
                Our NGO's environmental programs focus on sustainability, conservation, and raising
                awareness for future
                generations.
              </p>
            </div>
            <div class="d-flex align-items-center justify-content-center">
              <div class="number-program-ngo d-flex align-items-center justify-content-center">
                <h2 class="stoke-number">04</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4  my-4">
          <div class="border-ngo position-relative" data-aos="fade-up"
          data-aos-duration="3000">
            <div>
              <img src="<?php echo base_url() ?>website_assets/all/teamwork.png" class="w-25 width-hover-ngo" alt="">
            </div>
            <div>
              <h4 class="my-2 text-hover-effect">Community Development</h4>
              <p class="text-justify text-hover-effect">
                Our NGO's community development initiatives strengthen local capacities, fostering
                growth, empowerment,
                and sustainable social progress.
              </p>
            </div>
            <div class="d-flex align-items-center justify-content-center">
              <div class="number-program-ngo d-flex align-items-center justify-content-center">
                <h2 class="stoke-number">05</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4  my-4">
          <div class="border-ngo position-relative" data-aos="fade-up"
          data-aos-duration="3000">
            <div>
              <img src="<?php echo base_url() ?>website_assets/all/empowerment.png" class="w-25 width-hover-ngo" alt="">
            </div>
            <div>
              <h4 class="my-2 text-hover-effect">Empowering Grassroots</h4>
              <p class="text-justify text-hover-effect">
                Our NGO's Empowering Grassroots program uplifts marginalized communities, fostering
                self-reliance,
                leadership, and sustainable development opportunities.
              </p>
            </div>
            <div class="d-flex align-items-center justify-content-center">
              <div class="number-program-ngo d-flex align-items-center justify-content-center">
                <h2 class="stoke-number">06</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- our program section end -->


  <!-- counter section start -->
  <div class="container-fluid my-4 my-lg-5" id="counter-section-background">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-2 mb-lg-4">
          <h1 class="mb-2 text-white animated-text">Our Impact</h1>
          <p class="text-justify text-secondary" data-aos="fade-up"
          data-aos-duration="3000">
            Our impact is reflected in the lives transformed through education, healthcare, and empowerment. By
            collaborating with local leaders and volunteers, we help underserved communities build resilience, unlock
            potential,
            and create a brighter, sustainable future.
          </p>
        </div>
        <div class="col-12 col-md-6 col-xl-3 my-2 ">
          <div class="border bordetr-white p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-center">
                <img src="<?php echo base_url(); ?>website_assets/all/clients.png" class="counter-part-img" alt="">
              </div>
              <div class="">
                <h1 class="text-center text-white font-phi stoke-number-counter py-2">200+</h1>
                <h4 class="text-white text-center ">Happy Clients</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3 my-2 ">
          <div class="border bordetr-white p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-center">
                <img src="<?php echo base_url(); ?>website_assets/all/project.png" class="counter-part-img" alt="">
              </div>
              <div class="">
                <h1 class="text-center text-white font-phi stoke-number-counter py-2">250+</h1>
                <h4 class="text-white text-center ">Our Projects</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3 my-2 ">
          <div class="border bordetr-white p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-center">
                <img src="<?php echo base_url(); ?>website_assets/all/village.png" class="counter-part-img" alt="">
              </div>
              <div class="">
                <h1 class="text-center text-white font-phi stoke-number-counter py-2">50+</h1>
                <h4 class="text-white text-center ">Village</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3 my-2 ">
          <div class="border bordetr-white p-3">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex justify-content-center">
                <img src="<?php echo base_url(); ?>website_assets/all/city.png" class="counter-part-img" alt="">
              </div>
              <div class="">
                <h1 class="text-center text-white font-phi stoke-number-counter py-2">100+</h1>
                <h4 class="text-white text-center ">City</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- counter section end -->





  <!-- Frequently Asked question start -->
  <div class="container-fluid my-2 my-lg-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="font-phi animated-text">Frequently Asked Question(FAQ)</h1>
        </div>
        <div class="col-lg-7 wow ZoomIn aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
          <div class="faq-item my-2 my-lg-3">
            <p id="faq1" class="faq-title d-flex justify-content-between"><b>&nbsp;&nbsp;Catalyst for Change </b><span
                class="float-right"><i class="fa fa-plus"></i></span></p>
            <p id="faqAns1" class="faq-answer">At our NGO, we serve as a Catalyst for Change by empowering talented but
              underprivileged students to overcome financial barriers through scholarships. Beyond funding, we provide
              mentorship and skill development, nurturing well-rounded individuals. Together, we ignite potential,
              transform lives, and create a ripple effect of positive change for generations to come.</p>
          </div>

          <div class="faq-item wow my-2 my-lg-3 ZoomIn aos-init aos-animate" data-aos="zoom-in"
            data-aos-duration="2000">
            <p id="faq2" class="faq-title d-flex justify-content-between"><b>&nbsp;&nbsp;Empowering Beyond
                Education</b><span class="float-right"><i class="fa fa-plus"></i></span></p>
            <p id="faqAns2" class="faq-answer">We believe education is just the beginning. Our NGO goes further by
              equipping students with essential life skills, career training, and personalized mentorship. This holistic
              support empowers them to thrive in the real world, build confidence, and become future leaders. Together,
              we
              create opportunities that extend far beyond the classroom, shaping brighter futures.</p>
          </div>

          <div class="faq-item  my-2 my-lg-3 wow ZoomIn aos-init" data-aos="zoom-in" data-aos-duration="3000">
            <p id="faq3" class="faq-title d-flex justify-content-between"><b>Circle of Giving: Sustaining the
                Mission</b><span class="float-right"><i class="fa fa-plus"></i></span></p>
            <p id="faqAns3" class="faq-answer">Our Company fosters a Circle of Giving where empowered alumni give back
              by
              supporting future scholars. Each success story sparks another, creating a self-sustaining cycle of hope
              and
              opportunity. This ripple effect ensures that every contribution transforms lives, uplifts communities, and
              continues the mission of building a brighter, more equitable future for generations to come.</p>
          </div>

          <div class="faq-item  my-2 my-lg-3 wow ZoomIn aos-init" data-aos="zoom-in" data-aos-duration="3000">
            <p id="faq4" class="faq-title d-flex justify-content-between"><b>Healthcare</b> <span class="float-right"><i
                  class="fa fa-plus"></i></span>
            </p>
            <p id="faqAns4" class="faq-answer">We are committed to providing accessible, affordable, and high-quality
              healthcare for all. Through compassionate care, innovative solutions, and community support, we strive to
              improve well-being and ensure healthier futures for individuals and communities.</p>
          </div>
        </div>
        <div class="col-12 col-lg-5 my-2 d-flex justify-content-center">
          <div>
            <img src="<?php echo base_url(); ?>website_assets/all/faq.png" class="w-faq-ngo" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Frequently Asked question end -->




  <!-- Your contributions make a huge difference start -->
  <div class="container-fluid my-2 py-3 my-lg-5" id="Alice-blue-bg">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 my-2 px-0">
          <div>
            <img src="<?php echo base_url(); ?>website_assets/all/contribute.png" class="w-100 contribute-radius" alt="">
          </div>
        </div>
        <div class="col-12 pl-0 pt-4 pb-4 pr-4 col-lg-8 my-2 d-flex align-items-center">
          <div class="border-ll">
            <div class="position-relative">
              <h2 class="content-before font-phi animated-text">Your contributions make a huge difference</h2>
            </div>
            <p class="text-justify font-phi" data-aos="fade-up"
            data-aos-duration="3000">
              Your contributions make a huge difference in the lives of underserved communities. Through your generous
              support, we are able to provide essential services such as education, healthcare, and empowerment programs
              that uplift individuals and families. These initiatives create lasting positive change, helping to break
              the
              cycle of poverty and provide opportunities for a better future.
            </p>
            <p class="text-justify font-phi" data-aos="fade-up"
            data-aos-duration="3000">
              Your contributions make a huge difference in the lives of underserved communities. Through your generous
              support, we are able to provide essential services such as education, healthcare, and empowerment programs
              that uplift individuals and families. These initiatives create lasting positive change, helping to break
              the
              cycle of poverty and provide opportunities for a better future.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Your contributions make a huge difference end -->


  <!-- Get Involved start -->
  <div class="container-fluid my-2 my-lg-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="animated-text">Get Involved</h2>
          <p class="text-justify" data-aos="fade-up"
          data-aos-duration="3000">
            Make a difference by donating, volunteering, or partnering with us. Your support helps provide education,
            healthcare, and empowerment to underserved communities, driving sustainable change and creating brighter
            futures for all.
          </p>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-3">
          <div class="border p-2 rounded">
            <div class="effect-on-image">
              <img src="<?php echo base_url(); ?>website_assets/all/1.jpg" class="w-100 rounded effect-bllackky" alt="">
            </div>
            <div class="p-2">
              <h4>Be A Donor</h4>
              <p class="text-justify">
                Becoming a donor is a powerful way to create lasting change in the lives of those who need it most. Your
                support enables us to provide vital resources like education, healthcare, and empowerment to underserved
                communities.
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-3">
          <div class="border p-2 rounded">
            <div class="effect-on-image">
              <img src="<?php echo base_url(); ?>website_assets/all/2.jpg" class="w-100 rounded effect-bllackky" alt="">
            </div>
            <div class="p-2">
              <h4>Be A facilitator</h4>
              <p class="text-justify">
                Becoming a donor is a powerful way to create lasting change in the lives of those who need it most. Your
                support enables us to provide vital resources like education, healthcare, and empowerment to underserved
                communities.
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-3">
          <div class="border p-2 rounded">
            <div class="effect-on-image">
              <img src="<?php echo base_url(); ?>website_assets/all/3.jpg" class="w-100 rounded effect-bllackky" alt="">
            </div>
            <div class="p-2">
              <h4>Be A Member</h4>
              <p class="text-justify">
                Becoming a donor is a powerful way to create lasting change in the lives of those who need it most. Your
                support enables us to provide vital resources like education, healthcare, and empowerment to underserved
                communities.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Get Involved end -->


  <?php include("includes/footer.php"); ?>
  <?php include("includes/script.php"); ?>
</body>

</html>