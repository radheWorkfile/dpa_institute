<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content>
  <meta name="author" content="">
  <title>Sign In || <?php echo config_item('company_name'); ?> </title>
  <?php include("includes/css.php"); ?>
</head>

<body>
  <?php include("includes/navbar.php"); ?>
  <div class="container-fluid py-2 py-lg-5" id="sign-in-bg">
    <div class="container border">
      <div class="row">
        <div class="col-12 col-lg-7 order-2 order-lg-0 " id="login-left-n">
          <div class="text-white">
            <h1>Hello</h1>
            <h2>Login Here</h2>
            <p class="text-justify">
              Access your personalized dashboard and stay connected with our mission. Whether you’re a
              donor, volunteer, or beneficiary, logging in allows you to track your contributions, manage
              your profile, and stay updated on our latest initiatives.
            </p>
          </div>
        </div>
        <div class="col-12 col-lg-5">
          <div class="p-2 p-md-3 p-lg-4 border border-white">
            <form method=" post" class="d-flex justify-content-center" id="loginDet" data-id="<?php echo $targetLogin; ?>">
              <div>
                <h2 class="py-2 text-center ">Sign In</h2>
                <p class=" text-center">
                  Secure, quick, and seamless access to your personalized account today!
                </p>
                <?php
                if ($_REQUEST['msg'] == 'invalid') {
                  echo ' <div class="col-md-12 mt-2" id="locLogMsgBy"><div class="alert alert-danger" style="padding:18px;">
							   <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
								Invalid Login Details!! 
							</div></div>';
                } else if ($_REQUEST['msg'] == 'impassable') {
                  echo ' <div class="col-md-12 mt-2" id="locLogMsgBy"><div class="alert alert-warning" style="padding:18px;">
							   <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
							   Contact to super admin it seems account is blocked
							</div></div>';
                } elseif ($this->uri->segment(2) == 'logout') {
                  echo ' <div class="col-md-12 mt-2" id="locLogMsgBy"><div class="alert alert-success" style="padding:18px;">
								😎 Log Out Successfully ! 😎.
							</div></div>';
                }
                ?>
                <div class="col-md-12 ">
                  <div class="w-100 ">
                    <!-- <label for="exampleInputEmail1" class="form-label pb-2">Enter Email Id<span>*</span></label> -->
                    <div class="w-100 d-flex align-items-center " id="signinRound">
                      <i class="fa-solid fa-envelope pe-2 "></i>
                      <input type="text" class="border-none-login"
                        name="login_id" id="login_id" placeholder="Enter Email Id">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 ">
                  <div class="w-100">
                    <!-- <label for="exampleInputEmail1" class="form-label pb-2">Enter Password<span>*</span></label> -->
                    <div class="w-100  d-flex align-items-center" id="signinRound">
                      <i class="fa-solid fa-key pe-2 "></i>
                      <input type="password" class="border-none-login"
                        name="loginPassword" id="loginPassword" placeholder="Enter password">
                      <i class="fa-solid fa-eye-slash  size-show" id="togglePassword"></i>
                    </div>
                  </div>
                </div>

                <div class=" w-100">
                  <button type="submit" class=" w-100 btn-login-color" id="saveProcess">
                    <i class="fa-regular fa-floppy-disk"></i> Sign in
                  </button>
                </div>
                <div class="mt-4 " id="">
                  <div class="d-flex justify-content-between" id="sm-increase">
                    <li><a href="<?php echo base_url() ?>site/forget">Forgot Password</a></li>
                    <li class="pointer"><a href="<?php echo base_url(); ?>site/sign_up">Sign Up
                      </a>
                    </li>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include("includes/footer.php"); ?>
  <?php include("includes/script.php"); ?>

  <script>
    /*Charitify Theme Scripts */
    (function($) {
      "use strict";
      $(window).on('load', function() {
        $('body').addClass('loaded');
      });
      /*========================================================================= Sticky Header =========================================================================*/
      $(function() {
        var header = $("#header"),
          height = header.height(),
          yOffset = 0,
          triggerPoint = 100;
        $('.header-height').css('height', height + 'px');
        $(window).on('scroll', function() {
          yOffset = $(window).scrollTop();
          if (yOffset >= triggerPoint) {
            header.removeClass("animated cssanimation fadeIn");
            header.addClass("navbar-fixed-top  cssanimation animated fadeInTop");
          } else {
            header.removeClass("navbar-fixed-top cssanimation  animated fadeInTop");
            header.addClass("animated cssanimation fadeIn");
          }
        });
      });
      /*=========================================================================  Mobile Menu =========================================================================*/
      $(function() {
        $('#mainmenu').slicknav({
          prependTo: '.site-branding',
          label: '',
          allowParentLinks: true
        });
      });
      /*========================================================================= Scroll To Top =========================================================================*/
      $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
          $('#scroll-to-top').fadeIn();
        } else {
          $('#scroll-to-top').fadeOut();
        }
      });

    })(jQuery);
    $("#loginDet").on("submit", function(e) {
      e.preventDefault();
      $('#locLogMsgBy').hide();
      $.ajax({
        url: $(this).attr('data-id'),
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function() {
          $('#saveProcess').html('<div class="loader"></div> Please Wait');
        },
        complete: function() {
          $('#saveProcess').html('<i class="fa-regular fa-floppy-disk"></i> Submit');
        },
        success: function(data) {
          if (data.adClass != 'softArena') {
            toastMultiShow(data.adClass, data.msg, data.icon); /*if(data.adClass=='tSuccess'){setTimeout(function(){window.location.reload(1);},2000);}*/
          } else {
            window.open(data.targetLog, "_self")
          }

        }
      });
    });

    function toastMultiShow(adCls, msg, icon) {
      let valid = '';
      let myClass = "tSuccess tWarning tDanger";
      let restCls = myClass.replace(adCls, " ");
      let addonMsg = '';
      $.each(msg, function(i, item) {
        if (item != "") {
          valid += '<div class="tChild ' + adCls + '" id="mrk-' + i + '">' + icon + item.replace(/(<([^>]+)>)/ig, "") + '<i class="fa-solid fa-xmark mClose" id="icn-' + i + '"></i></div>';
          setTimeout(function() {
            $('#mrk-' + i).fadeOut('slow');
          }, 3000);
        }
      });
      $('.arvToast').css('visibility', 'visible').html(valid);
    }
  </script>

  <script>
    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("loginPassword");
    togglePassword.addEventListener("click", function() {
      const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
      passwordField.setAttribute("type", type);
      // Toggle icon class
      this.classList.toggle("fa-eye-slash");
      this.classList.toggle("fa-eye");
    })
  </script>
  <!-- Best DPA computer institute in Bihar Sharif  -->

</body>

</html>