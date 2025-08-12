<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="DexignLab">
  <meta name="robots" content="">
  <meta name="keywords" content="<?php echo config_item('company_name') ?>">
  <meta name="description" content="<?php echo config_item('company_name') ?>">
  <meta property="og:title" content="<?php echo config_item('company_name') ?>">
  <meta property="og:description" content="<?php echo config_item('company_name') ?>">
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="<?php echo config_item('company_name') ?>">
  <!-- TITLE -->
  <title> <?php echo $title ?> | <?php echo config_item('company_name') ?> </title>
  <!-- FAVICON -->
  <link rel="icon" href="<?php echo base_url('assets/images/fbicon.ico'); ?>">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script type="module">
    /*import {Login} from "./assets/js/login.js";
    //$("#tiTleFrm").html(message());
    
    $(function() 
    {
      loginPanel.forgot();
      $(document).on("click", '.perFrmActn', function()
      {
          let actNbtn = $(this).attr('id');
          if(actNbtn=='forgotPass')
          {
            loginPanel.forgot();
            }
            else if(actNbtn=='cnfrmSignIn')
              {
               LoginPanel.isExist();
               }
      });
    });*/
  </script>
  <style>
    .errMsg {
      float: right;
      color: #ac0606;
      margin-bottom: -10px;
    }







    .light-sky {
      background-color: #43b17e;
      padding: 25px;
    }







    .quote {
      font-style: italic;
      margin: 10px 0;
    }

    .author {
      margin: 5px 0 0;
      font-weight: bold;
    }

    .position {
      margin: 5px 0 20px;
      font-size: 0.9em;
    }

    .cta {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .learn-more,
    .apply-btn {
      background-color: #ffffff;
      color: #00b894;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .learn-more:hover,
    .apply-btn:hover {
      background-color: #d2d2d2;
    }

    .help-text {
      font-weight: bold;
    }

    .experience {
      margin: 10px 0;
    }

    .people-icon {
      font-size: 1.5em;
    }

    .image-login-part-new {
      height: 250px;
      width: 250px !important;
    }

    .designleft-login {
      border-radius: 8px 0px 0px 8px;
      padding: 20px 24px 10px 10px
    }

    .rounded-plus {
      height: 50px;
      width: 50px;
      border-radius: 50px;
      background-color: #43b17e;
      position: absolute;
      right: -9px;
      top: -8px;
    }

    .admin-login-part {
      position: absolute;
      right: 10px;
      top: 45px
    }

    .ww-clients {
      width: 100px !important;
    }

    @media (min-width:0px) and (max-width:768px) {
      .card {
        background: #43b17e;
        color: white;
        padding: 20px 20px 0px 20px;
        border-radius: 8px 0px 0px 8px;
        width: 100%;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      }

      #login-full {
        background-color: #275a57;
        padding: 0px;
      }

      #loginAdmin {
        background: radial-gradient(circle, #43b17e08 2%, #000000 70%);
        border-radius: 0px;
      }
    }

    @media (min-width:768px) {
      .card {
        background: #43b17e;
        color: white;
        padding: 20px 20px 20px 20px;
        border-radius: 8px 0px 0px 8px;
        width: 417px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      }

      #login-full {
        background-color: #275a57;
        padding: 55px 0px;
      }

      #loginAdmin {
        background: radial-gradient(circle, #43b17e08 2%, #000000 70%);
        border-radius: 10px;
      }
    }
  </style>
</head>

<div class="h-100">
  <div class="container-fluid" id="login-full">
    <div class="container" id="loginAdmin">
      <div class="login-account">
        <div class="row ">

          <div class="col-lg-6 col-md-7 col-sm-12 mx-auto align-self-center">
            <div class="login-form">
              <div class="login-head">
                <h3 class="title text-white">Welcome Back</h3>

                <p>Login page allows users to enter login credentials for authentication and access to secure content.
                </p>
              </div>
              <h6 class="login-title"><span id="tiTleFrm" class="text-white">Login</span></h6>
              <?php
              if ($_REQUEST['msg'] == 'invalid') {
                echo '<div class="alert alert-danger" style="font-size:11.7px;">
                                               <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
											    Invalid Login Details!! Please Check Username, Password
                                            </div>';
              } else if ($_REQUEST['msg'] == 'impassable') {
                echo '<div class="alert alert-warning" style="font-size:11.7px;">
                                               <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
											   Contact to super admin it seems account is blocked
                                        </div>';
              } elseif ($this->uri->segment(2) == 'logout') {
                echo '<div class="alert alert-success">
                                                😎 Log Out Successfully ! 😎.
                                            </div>';
              }
              ?>
              <form action="<?php echo base_url('login/auth'); ?>" method="post">
                <div class="mb-4">
                  <label class="mb-1 text-white">Email</label><span
                    class="errMsg"><?php echo form_error('email_id'); ?></span>
                  <input type="email" id="email_id" name="email_id" class="form-control form-control-lg"
                    placeholder="hello@example.com">
                </div>
                <div class="mb-4 position-relative">
                  <label class="mb-1 text-white">Password</label><span
                    class="errMsg"><?php echo form_error('password'); ?></span>
                  <input type="password" class="form-control form-control-lg" name="password" id="password"
                    placeholder="********">
                  <i class="fa-solid fa-eye-slash  size-show admin-login-part" id="togglePassword"></i>
                </div>
                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                  <div class="mb-4">
                    <div class="form-check custom-checkbox mb-3">
                      <input type="checkbox" class="form-check-input" id="customCheckBox1">
                      <label class="form-check-label" for="customCheckBox1">Remember my preference</label>
                    </div>
                  </div>
                  <div class="mb-4"> <a href="javascript:void(0);" id="forgotPass"
                      class="perFrmActn btn-link text-primary">Forgot Password?</a> </div>
                </div>
                <div class="text-center mb-4">
                  <button type="submit" class="btn btn-primary btn-block perFrmActn" id="cnfrmSignIn">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 col-md-7 col-sm-12 d-flex justify-content-center">
            <div class="card">
              <h2 class="text-white text-center fw-bolder mt-3">Login Now</h2>
              <div>
                <div class="owl-carousel projects">
                  <div class="item">
                    <div class=" p-2 d-flex justify-content-center align-items-center">
                      <img src="<?php echo base_url() ?>media/lo1.png"
                        class="object-fit-cover image-login-part-new set-images-position-top" width="100%" alt="@dued">
                    </div>
                    <div class="py-2 text-center position-relative">
                      <div class="d-flex align-items-center justify-content-center rounded-plus">
                        <h2 class="text-white my-0">+</h2>
                      </div>
                      <div class="bg-white designleft-login">
                        <p class="text-black">
                          Access your account, manage preferences, track progress, and enjoy a seamless experience.
                        </p>
                        <div class="d-flex justify-content-center">
                          <img src="<?php echo base_url() ?>media/author-img.png" class="ww-clients" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class=" p-2 d-flex justify-content-center align-items-center">
                      <img src="<?php echo base_url() ?>media/lo2.png"
                        class="object-fit-cover image-login-part-new set-images-position-top" width="100%" alt="@dued">
                    </div>
                    <div class="py-2 text-center position-relative">
                      <div class="d-flex align-items-center justify-content-center rounded-plus">
                        <h2 class="text-white my-0">+</h2>
                      </div>
                      <div class="bg-white designleft-login">
                        <p class="text-black">
                          Access your account to volunteer, donate, and engage with a community creating positive
                          change.
                        </p>
                        <div class="d-flex justify-content-center">
                          <img src="<?php echo base_url() ?>media/author-img.png" class="ww-clients" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class=" p-2  d-flex justify-content-center align-items-center">
                      <img src="<?php echo base_url() ?>media/lo3.png"
                        class="object-fit-cover image-login-part-new set-images-position-top" width="100%" alt="@dued">
                    </div>
                    <div class="py-2 text-center position-relative">
                      <div class="d-flex align-items-center justify-content-center rounded-plus">
                        <h2 class="text-white my-0">+</h2>
                      </div>
                      <div class="bg-white designleft-login">
                        <p class="text-black">
                          Log in to explore opportunities, manage your activities, and be a part of something
                          meaningful.
                        </p>
                        <div class="d-flex justify-content-center">
                          <img src="<?php echo base_url() ?>media/author-img.png" class="ww-clients" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class=" p-2  d-flex justify-content-center align-items-center">
                      <img src="<?php echo base_url() ?>media/lo4.png"
                        class="object-fit-cover image-login-part-new set-images-position-top" width="100%" alt="@dued">
                    </div>
                    <div class="py-2 text-center position-relative">
                      <div class="d-flex align-items-center justify-content-center rounded-plus">
                        <h2 class="text-white my-0">+</h2>
                      </div>
                      <div class="bg-white designleft-login">
                        <p class="text-black">
                          Log in to support important causes, track your positive impact, engage with the community, and
                          stay involved in our mission.
                        </p>
                        <div class="d-flex justify-content-center">
                          <img src="<?php echo base_url() ?>media/author-img.png" class="ww-clients" alt="">
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url('assets/vendor/global/global.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js'); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="<?php echo base_url('assets/js/custom.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/deznav-init.js'); ?>"></script>
  <script>
    $(".projects").owlCarousel({
      loop: true,
      margin: 20,
      autoplay: true,
      autoplayTimeout: 4000,
      items: 1,

      /* Ensure proper display */
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    });
  </script>

  <script>
    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("password");
    togglePassword.addEventListener("click", function() {
      const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
      passwordField.setAttribute("type", type);
      // Toggle icon class
      this.classList.toggle("fa-eye-slash");
      this.classList.toggle("fa-eye");
    })
  </script>

</div>

</html>