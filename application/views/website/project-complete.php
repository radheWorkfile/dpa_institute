<!doctype html>
<html lang="en,hi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="DynamicLayers">
    <title>Our Project || NGO</title>
    <?php include("includes/css.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container-fluid p-0 position-relative">
        <img src="<?php echo base_url(); ?>website_assets/Hero-section/project_hero.png" class="w-100  mobile-height-set" alt="">
        <div class="all-common-banner-text">
            <h3 class="fw-bolder">Our Project</h3>
            <div class="d-flex link-part-hero gap-3"><a href="<?php echo base_url() ?>site/">Home</a>/ <p class="mb-0">Our Project</p>
            </div>
        </div>
    </div>




    <!-- Our Ongoing Projects start -->
    <div class="container-fluid my-3 my-lg-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <h1 class="animated-text fw-bolder">Our Ongoing Projects</h1>
                    <p class="text-justify" data-aos="zoom-in"
                        data-aos-duration="3000">
                        We are actively implementing a wide range of grassroots projects focused on education, healthcare, women empowerment, livelihood development, and environmental sustainability. Our team works closely with local communities to identify real needs and co-create solutions that are culturally relevant and sustainable.
                    </p>
                    <p class="text-justify" data-aos="zoom-in"
                        data-aos-duration="3000">
                        Whether it's building schools in underserved areas, organizing health camps in remote villages, training women in vocational skills, or initiating climate-resilient farming practices — each project is a step toward long-term social transformation.
                    </p>
                </div>
                <div class="col-12 col-lg-3">
                    <img src="<?php echo base_url(); ?>website_assets/all/pp.png" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Our Ongoing Projects end -->







    <!-- ============================== Our Project Section Start ==============================  -->
    <div class="container-fluid mt-3 mt-lg-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="animated-text fw-bolder">Our Project</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="container">
            <div class="slider-container border-light-section p-3">
                <div class="owl-carousel owl-carousel-project owl-theme">


                    <?php if (!empty($projectData)): ?>
                        <?php foreach ($projectData as $pro): ?>
                            <div class="item" id="project-section-gallery" data-aos="zoom-in"
                                data-aos-duration="3000">
                                <img src="<?php echo base_url($pro['project_img']); ?>">
                                <div class="width-right-project">
                                    <h2 class="py-1 text-center"><?php echo $pro['project_name']; ?></h2>
                                    <p class="text-justify"><?php echo $pro['description']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="item" id="project-section-gallery" data-aos="zoom-in"
                            data-aos-duration="3000">
                            <img src="<?php echo base_url('website_assets/health_img.jpeg'); ?>"
                                class="" alt="Image 1">
                            <div class="width-right-project">
                                <h2 class="py-1 text-center">Health Empowerment</h2>
                                <p class="text-justify">Healing Hands is an essential healthcare project initiated by [NGO Name] to provide accessible and affordable medical services to underserved communities. The project aims to establish community-based healthcare centers and mobile clinics, ensuring that individuals in rural and economically disadvantaged areas receive the medical attention they need. By offering primary care, emergency treatment, maternal and child health services, and health education, Healing Hands works to reduce health disparities and improve overall well-being. Our mission is to create a sustainable healthcare model that not only addresses immediate health concerns but also empowers communities with knowledge about preventative care, hygiene, and healthy living practices. Through collaboration with medical professionals, volunteers, and local organizations, Healing Hands strives to promote long-term health and wellness, ensuring that no one is left behind when it comes to their right to quality healthcare.</p>
                            </div>
                        </div>
                        <div class="item" id="project-section-gallery">
                            <img src="<?php echo base_url('website_assets/school-img.jpg'); ?>"
                                class="" alt="Image 2">
                            <div class="width-right-project">
                                <h2 class="py-1 text-center">School Initiative</h2>
                                <p class="text-justify">Bridges of Hope is a groundbreaking educational project by [NGO Name] aimed at providing quality education to children in underserved communities. The school, established as part of this initiative, is a beacon of opportunity for children who otherwise would not have access to formal education. Through this school, we offer a safe and inclusive environment where children can learn, grow, and reach their full potential. The curriculum focuses on not only academic excellence but also on building character, critical thinking, and life skills. In addition to regular schooling, the project integrates extracurricular activities, health and wellness programs, and emotional support services, ensuring that the students' overall well-being is prioritized. The Bridges of Hope school provides free education, textbooks, uniforms, and meals, ensuring that no child is held back by financial constraints. With a commitment to creating sustainable impact, the school works to empower the next generation with the skills and knowledge needed to break the cycle of poverty and create a brighter future for themselves and their communities.</p>
                            </div>
                        </div>
                        <div class="item" id="project-section-gallery">
                            <img src="https://media.istockphoto.com/id/535555239/photo/happy-indian-school-children.jpg?s=612x612&w=0&k=20&c=fcpTUHiHJuaeRS-xHJy4oOflwKpBooiPecyewzohvhk="
                                class="" alt="Image 3">
                            <div class="width-right-project">
                                <h2 class="py-1 text-center">Health Empowerment</h2>
                                <p class="text-justify">Healing Hands is an essential healthcare project initiated by [NGO Name] to provide accessible and affordable medical services to underserved communities. The project aims to establish community-based healthcare centers and mobile clinics, ensuring that individuals in rural and economically disadvantaged areas receive the medical attention they need. By offering primary care, emergency treatment, maternal and child health services, and health education, Healing Hands works to reduce health disparities and improve overall well-being. Our mission is to create a sustainable healthcare model that not only addresses immediate health concerns but also empowers communities with knowledge about preventative care, hygiene, and healthy living practices. Through collaboration with medical professionals, volunteers, and local organizations, Healing Hands strives to promote long-term health and wellness, ensuring that no one is left behind when it comes to their right to quality healthcare.</p>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================== Our Project Section End ==============================  -->




    <?php include("includes/footer.php"); ?>
    <?php include("includes/script.php"); ?>


</body>

</html>