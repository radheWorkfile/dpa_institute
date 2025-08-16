<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DPA Computer Institute | Best Computer Institute in Bihar Sharif | Home Page</title>
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
          <h5 class="text-white text-shadow text-bold animated-text fw-bold"><span class="bg-danger py-1 px-4 rounded-pill"><?php echo ($banner['heading']); ?></span></h2></br>
          <p class="text-shadow text-white text-justify fw-normal"style="font-size:14px;"><?php echo ($banner['content']); ?></p><br>
          <button class="btn btn-outline-info rounded-pill py-1 px-3 fw-bold"style="border-top:4px solid #0dcaed;">Contact Us</button>
          <button class="btn btn-outline-info rounded-pill py-1 px-3 fw-bold"style="border-top:4px solid #0dcaed;">Read More</button>
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
            <h2 class="text-white animated-text">Web & Software Development</h2>
            <p class="text-white">
             DPA Computer Institute empowers students with essential skills through hands-on training in web and software development, using modern languages, frameworks, and Git. Expert instructors and real-world projects help students build strong foundations. Learn, code, and succeed with DPA!
            </p>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="position-relative">
          <img src="<?php echo base_url(); ?>website_assets/new-slider2.jpg" class="swiperimg" alt="">
          <div class="position-absolute top-50 slider-text-value">
            <h2 class="text-white animated-text">Welcome in DPA Computer Institute</h2>
            <p class="text-white">
             DPA Computer Institute empowers students with essential skills through hands-on training in web and software development, using modern languages, frameworks, and Git. Expert instructors and real-world projects help students build strong foundations. Learn, code, and succeed with DPA!
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
            <h2 class="text-color fw-bolder my-2 animated-text"><span style="color:#144558;">Driven by Vision,</span> Powered by Opportunity</h2>

            <p class="text-justify" data-aos="fade-left"
            data-aos-duration="3000">
           <b>DPA Computer Institute</b> is dedicated to empowering the next generation of developers and technology professionals by equipping them with the practical skills needed to succeed in the digital world. Our curriculum emphasizes hands-on training in <b>web and software development</b>, helping students understand the fundamentals through real-world application. We believe in learning by doing, which is why our programs are designed to simulate industry environments and challenges, preparing students for actual job roles from day one.
            </p>
            <p class="text-justify" data-aos="fade-left"
            data-aos-duration="3000">
            <b>Guided by expert instructors</b>, learners also master tools like <b>Git for version control</b> and engage in real-world projects that simulate professional environments. Whether you're a beginner or looking to upgrade your skills, <b>DPA</b> helps you build a solid foundation in <b>web and software development. Learn, code, and succeed — with DPA by your side</b>.
            </p>
            <div class="my-4">
              <a class="button-effect-part" href="<?php echo base_url() ?>site/about">Learn More</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- section 1 end -->


    <!-- our courses section start -->
  <div class="container-fluid my-2 my-lg-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="animated-text cm fw-bold">Popular Course</h2>
          <p class="text-justify" data-aos="fade-up"
          data-aos-duration="3000">
            Our courses in Web Development and Software Development provide hands-on training in coding, design, and industry-standard frameworks—preparing students for real-world projects and in-demand tech careers.
          </p>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-3">
          <div class="border p-2 rounded">
            <div class="effect-on-image">
              <img src="<?php echo base_url(); ?>website_assets/all/html.jpg" class="w-100 rounded effect-bllackky" alt="">
            </div>
            <div class="p-2">
              <h4 class="fw-bold cm mt-2"><span class="bgm py-1 px-3 rounded-pill text-white">HTML</span></h4>
              <p><b class="cmh fw-bold">HyperText Markup Language.</b></p>
              <p class="text-justify mtu">
                HyperText Markup Language (HTML) is the standard language for creating web pages, structuring content, and linking documents on the internet using tags and elements..
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-3">
          <div class="border p-2 rounded">
            <div class="effect-on-image">
              <img src="<?php echo base_url(); ?>website_assets/all/css.jpg" class="w-100 rounded effect-bllackky" alt="">
            </div>
            <div class="p-2">
            <h4 class="fw-bold cm mt-2"><span class="bgm py-1 px-3 rounded-pill text-white">CSS</span></h4>
            <p><b class="cmh fw-bold">Cascading Style Sheets.</b></p>
            <p class="text-justify mtu">
            Cascading Style Sheets (CSS) is the standard language for styling web pages, controlling layout, colors, fonts, and enhancing the visual appearance of HTML content.
            </p>
            </div>

          </div>
        </div>


        <div class="col-12 col-md-6 col-lg-4 my-3">
          <div class="border p-2 rounded">
            <div class="effect-on-image">
              <img src="<?php echo base_url(); ?>website_assets/all/java_script.jpg" class="w-100 rounded effect-bllackky" alt="">
            </div>
          <div class="p-2">
          <h4 class="fw-bold cm mt-2"><span class="bgm py-1 px-3 rounded-pill text-white">JavaScript</span></h4>
          <p><b class="cmh fw-bold">JavaScript Programming Language.</b></p>
          <p class="text-justify mtu">
          JavaScript is a popular programming language used to create dynamic, interactive effects within web browsers, enhancing user experience and enabling client-side scripting.
          </p>
          </div>
          </div>
        </div>

         <div class="col-12 col-md-6 col-lg-4 my-3">
          <div class="border p-2 rounded">
            <div class="effect-on-image">
              <img src="<?php echo base_url(); ?>website_assets/all/java.jpg" class="w-100 rounded effect-bllackky" alt="">
            </div>
            <div class="p-2">
            <h4 class="fw-bold cm mt-2"><span class="bgm py-1 px-3 rounded-pill text-white">Java</span></h4>
            <p><b class="cmh fw-bold">Java Programming Language.</b></p>
            <p class="text-justify mtu">
            Java is a versatile, object-oriented programming language widely used for building cross-platform applications, from web and mobile to enterprise software and embedded systems.
            </p>
            </div>
          </div>
        </div>

         <div class="col-12 col-md-6 col-lg-4 my-3">
          <div class="border p-2 rounded">
            <div class="effect-on-image">
              <img src="<?php echo base_url(); ?>website_assets/all/php.jpg" class="w-100 rounded effect-bllackky" alt="">
            </div>
            <div class="p-2">
            <h4 class="fw-bold cm mt-2"><span class="bgm py-1 px-3 rounded-pill text-white">PHP</span></h4>
            <p><b class="cmh fw-bold">PHP Programming Language.</b></p>
            <p class="text-justify mtu">
            PHP is a popular server-side scripting language used to develop dynamic and interactive websites, enabling seamless database integration and backend web development.
            </p>
            </div>
          </div>
        </div>

         <div class="col-12 col-md-6 col-lg-4 my-3">
          <div class="border p-2 rounded">
            <div class="effect-on-image">
              <img src="<?php echo base_url(); ?>website_assets/all/Python.jpg" class="w-100 rounded effect-bllackky" alt="">
            </div>
            <div class="p-2">
            <h4 class="fw-bold cm mt-2"><span class="bgm py-1 px-3 rounded-pill text-white">Python</span></h4>
            <p><b class="cmh fw-bold">Python Programming Language.</b></p>
            <p class="text-justify mtu">
            Python is a versatile, high-level programming language known for its simplicity and readability, widely used in web development, data science, automation, and artificial intelligence.
            </p>
            </div>
            </div>
        </div>


      </div>
    </div>
  </div>
  <!-- our courses section end -->


  <!-- Our Management Team section start -->
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <p class="col-12">
        <h2 class="text-center fw-bolder animated-text"><span class="rounded-pill bgm text-white px-5 py-1">Our Management Team</span></h2>
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
                <h5 class="p-3 fw-bolder">Manish kumar</h5>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="" alt="Testimonial 2">
            <div class="text-center">
              <div class="border my-2 team-name">
                <h5 class="p-3 fw-bolder">Radhe kumar</h5>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="" alt="Testimonial 3">
            <div class="text-center">
              <div class="border my-2 team-name">
                <h5 class="p-3 fw-bolder">Kunda Raj</h5>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="" alt="Testimonial 4">
            <div class="text-center">
              <div class="border my-2 team-name">
                <h5 class="p-3 fw-bolder">Aaditya Raj</h5>
              </div>
            </div>
          </div>
          <div class="item">
            <img src="<?php echo base_url() ?>website_assets/team1.jpg" class="" alt="Testimonial 5">
            <div class="text-center">
              <div class="border my-2 team-name">
                <h5 class="p-3 fw-bolder">Aaryan Raj</h5>
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
        <h2 class="animated-text fw-bolder text-center">Our Placed Students</h2>
        <p class="text-center py-2" data-aos="fade-up"
        data-aos-duration="3000">
          Our placed students are proof of success—trained at DPA Institute, they mastered in-demand skills, gained industry exposure, <br>and secured top jobs through our dedicated, skill-focused training programs.
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
                <h2 class="fw-bolder">Aaryan kumar
                </h2>
                <p>Aaryan Kumar, a dedicated student of DPA Institute, secured a placement with a 3 LPA package in Delhi. He works as a PHP Developer, skilled in Laravel and CodeIgniter, excelling in both web development and design. His journey reflects strong technical expertise and practical project experience gained during training.</p>
              </div>
            </div>
          </div>
          <div class="item border p-2 d-md-flex">
            <div class="w-event-left">
              <img src="<?php echo base_url()?>website_assets/event1.png" class="" alt="Product 1">
            </div>
            <div class="decription-right-event d-flex align-items-center">
              <div>
                <h2 class="fw-bolder">Aaditya Raj
                </h2>
                <p>Aaditya Kumar, a skilled student from DPA Institute, secured a 3 LPA job in Delhi as a PHP Developer. With strong command over PHP frameworks like Laravel and CodeIgniter, he now works on full-cycle web development and design projects. His success reflects the practical skills and hands-on training he gained during his time at the institute.</p>
              </div>
            </div>
          </div>
          <?php endif; ?>


        </div>
      </div>
    </div>
  </div>
  <!-- media section end -->





  <!-- counter section start -->
  <div class="container-fluid my-4 my-lg-5" id="counter-section-background">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-2 mb-lg-4">
          <h1 class="mb-2 text-white animated-text">Our Impact</h1>
          <p class="text-justify text-secondary" data-aos="fade-up"
          data-aos-duration="3000">
            Our impact shines through the lives transformed by education, healthcare, and empowerment. Working alongside local leaders and volunteers, we support underserved communities in building resilience, unlocking potential, and shaping a brighter, sustainable future.
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
                <h4 class="text-white text-center ">Happy Student</h4>
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
                <h1 class="text-center text-white font-phi stoke-number-counter py-2">160+</h1>
                <h4 class="text-white text-center ">Student placement</h4>
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
                <h4 class="text-white text-center ">Work From Home</h4>
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
                <h4 class="text-white text-center ">Out of <br>City</h4>
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
            <p id="faq1" class="faq-title d-flex justify-content-between"><b>&nbsp;&nbsp;Introduce Your Self</b><span
                class="float-right"><i class="fa fa-plus"></i></span></p>
            <p id="faqAns1" class="faq-answer">
            Hello Sir,<br><br>
            My name is [Your Name].<br><br>
            I am from [Your City/State].<br><br>
            I have completed my Bachelor's degree in [Your Stream] from [Your College/University Name].<br><br>
            If I Talk about my technical skills, My technical Skills are [List Your Technical Skills, e.g., Java, Python, HTML, CSS, etc.].<br><br>
            I have worked on one project with the help of my team, titled [Project Name or Brief Description].<br><br>
            My short-term goal is to work in a startup company to enhance my codeing skills.<br><br>
            My long-term goal is, I want to work in MNC Company.<br><br>
            My hobbies are playing cricket and listening to music.<br><br>
            That’s all. Thank you!
            </p>
          </div>

          <div class="faq-item wow my-2 my-lg-3 ZoomIn aos-init aos-animate" data-aos="zoom-in"
            data-aos-duration="2000">
            <p id="faq2" class="faq-title d-flex justify-content-between"><b>&nbsp;&nbsp;What is HTML</b><span class="float-right"><i class="fa fa-plus"></i></span></p>
            <p id="faqAns2" class="faq-answer">HTML (HyperText Markup Language) is the standard language used to create and structure content on the web. It organizes text, images, links, and multimedia elements into webpages. We use HTML to build the foundation of websites, allowing browsers to display content properly for users across different devices and platforms.</p>
          </div>

          <div class="faq-item  my-2 my-lg-3 wow ZoomIn aos-init" data-aos="zoom-in" data-aos-duration="3000">
            <p id="faq3" class="faq-title d-flex justify-content-between"><b>What is Web Development</b><span class="float-right"><i class="fa fa-plus"></i></span></p>
            <p id="faqAns3" class="faq-answer">Web development is the process of creating and maintaining websites. It includes designing, coding, and building web pages using languages like HTML, CSS, and JavaScript to ensure functionality, responsiveness, and a smooth user experience across all devices.</p>
          </div>

          <div class="faq-item  my-2 my-lg-3 wow ZoomIn aos-init" data-aos="zoom-in" data-aos-duration="3000">
            <p id="faq4" class="faq-title d-flex justify-content-between"><b>What is programming</b> <span class="float-right"><i
                  class="fa fa-plus"></i></span>
            </p>
            <p id="faqAns4" class="faq-answer">Programming is writing code using languages like Python or Java to make computers perform tasks, solve problems, or run applications.
           </p>
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
              <h2 class="content-before font-phi animated-text fw-bold"> <span class="cm">Our Vision and Mission </span></h2>
            </div>
            <p class="text-justify font-phi" data-aos="fade-up"
            data-aos-duration="3000">
              At DPA Computer Institute, our vision is to empower individuals through quality computer education, equipping them with the digital skills needed to thrive in a rapidly evolving technological world. We strive to become a leading institution known for innovation, inclusivity, and excellence in IT training, enabling students from all backgrounds to unlock their full potential and contribute meaningfully to society.
            </p>
            <p class="text-justify font-phi" data-aos="fade-up"
            data-aos-duration="3000">
              Our mission is to provide accessible, industry-relevant computer education that combines practical training with a strong theoretical foundation. We are committed to fostering a learning environment that promotes curiosity, creativity, and continuous improvement. Through dedicated faculty, up-to-date curriculum, and hands-on experience, DPA Computer Institute aims to prepare students for success in both professional careers and personal growth in the digital age.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Your contributions make a huge difference end -->





  <?php include("includes/footer.php"); ?>
  <?php include("includes/script.php"); ?>
</body>

</html>