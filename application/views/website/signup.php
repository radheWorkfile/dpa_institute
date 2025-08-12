<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="">
    <title>Sign Up || NGO</title>
    <?php include("includes/css.php"); ?>
    <style>
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .bx-spin {
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite
        }

        .bx-spin-hover:hover {
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite
        }

        .arvToast {
            z-index: 111;
            position: fixed;
            right: 20px;
            top: 80px;
            min-width: 420px;
            visibility: hidden;
        }

        .tChild {
            background-color: #fff;
            padding: 15px 20px 15px 15px;
            border-bottom: 3px solid #e3e3e3;
            box-shadow: 0rem 0.3125rem 0.3125rem 0rem rgba(82, 63, 105, 0.05);
            margin-bottom: 10px;
        }

        .mClose {
            float: right;
            font-size: 16px;
            cursor: pointer;
            margin: 0px -5px 2px 10px;
        }

        .tSuccess {
            background-color: #0D9299;
            border-bottom: 3px solid #006F75;
            ;
            color: white;
        }

        .tDanger {
            background-color: #d73300;
            border-bottom: 3px solid #c12e00;
            color: white;
        }

        .tWarning {
            background-color: #f0d22e;
            border-bottom: 3px solid #d0b103;
            color: #8e5d00;
        }

        .tDefault {
            background-color: #d5d5d5;
            border-bottom: 3px solid #b9b9b9;
            color: #5b5b5b;
        }

        .tPrimary {
            background-color: #5351F4;
            border-bottom: 3px solid #3736AF;
            color: #fff;
        }

        .table .thead-arvDef th {
            background-color: #0c5edd;
            color: #fff;
        }

        .pull-right {
            float: right;
        }

        .rvClose {
            float: right;
            margin: -10px -10px 0px 0px;
            font-size: 12px;
        }

        .delsMsg {
            color: #716d6c;
            text-align: center;
            font-size: 20px;
            margin: 30px 0px 10px 0px;
        }

        .actnData {
            text-align: center;
            margin: 0px 0px 20px 0px;
            color: #db3704;
            font-size: .8rem;
        }

        .border-radius-2 {
            border-radius: 2rem;
        }

        .bg-g {
            background-image: linear-gradient(to bottom right, #12c1ca, #13999f);
        }

        .font-size-2 {
            font-size: 2rem;
        }

        .shadow-hover:hover {
            box-shadow: 5px 5px 22px grey;
        }

        .mt--1 {
            margin-top: -0.6rem;
        }

        .mt--2 {
            margin-top: -1.5rem;
        }

        .border-1 {
            border: 1px solid #128388;
        }

        .border-radius-1 {
            border-radius: 1rem;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .imageView {
            transition: transform 0.3s ease-in-out;
        }

        .imageView:hover {
            transform: scale(5.5);
        }

        .miLvs {
            padding-left: 13px;
            padding-right: 13px;
            border-radius: none;
        }

        .text-center {
            text-align: center;
        }

        .table>thead>tr>th:last-child.sorting {
            background-image: none !important;
        }

        table>thead>tr>th:last-child.sorting_asc {
            background-image: none !important;
        }

        table>thead>tr>th:last-child.sorting_desc {
            background-image: none !important;
        }
    </style>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container-fluid p-0">
        <img src="<?php echo base_url(); ?>front/About/hero.jpeg" class="w-100 ComminHero" alt="">
    </div>
    <!------------------------------------------------------------------------------------------------------------->
    <div class="arvToast" style="visibility:hidden;"></div>
    <!-------------------------------------------------------------------------------------------------------------->


    <section class="container-fluid my-3 my-lg-5">
        <div class="container border">
            <div class="row">


                <div class="col-12 col-lg-7 my-2">
                    <div class="auth-main bg-black">
                        <form class="auth-form" method="post" id="registerDet" data-id="<?php echo $newRegisteration; ?>">
                            <div class="form-header">
                                <h1 class="text-center text-white animated-text">Sign Up</h1>
                                <p class="text-center text-white">Continue with your preferred method</p>
                            </div>
                            <div class="social-buttons">
                                <button type="button" class="social-button" onClick="socialSignIn('google')">
                                    <i class="fab fa-google"></i>
                                </button>
                                <button type="button" class="social-button mx-4" onClick="socialSignIn('facebook')">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button type="button" class="social-button">
                                    <i class="fab fa fa-instagram"></i>
                                </button>
                            </div>

                            <div class="w-100 my-3">

                                <div class="w-100 d-flex align-items-center " id="signupRound">
                                    <i class="fa-solid fa-user pe-2 "></i>
                                    <input type="text" class="border-none-login" name="name" id="name"
                                        placeholder="Enter Name Here">
                                </div>
                            </div>
                            <div class="w-100 ">

                                <div class="w-100 d-flex align-items-center " id="signupRound">

                                    <i class="fa-solid fa-envelope pe-2"></i>
                                    <input type="email" name="email" id="email" class="border-none-login" placeholder="Enter Email Id">
                                </div>
                            </div>
                            <div class="w-100 my-3">

                                <div class="w-100 d-flex align-items-center " id="signupRound">
                                    <i class="fa-solid fa-phone-volume pe-2"></i>
                                    <input type="text" class="border-none-login" maxlength="10" name="phone" id="phone"
                                        placeholder="Enter Mobile Number">
                                </div>
                            </div>
                            <div class="w-100 ">
                                <div class=" d-flex position-relative align-items-center" id="signupRound">
                                    <i class="fa-solid fa-lock pe-2"></i>
                                    <input type="password" class="border-none-login" name="password" id="password" placeholder="Enter Password Here">
                                    <i class="fa-solid fa-eye-slash text-white size-show" id="togglePassword"></i>
                                </div>
                            </div>
                            <div class="my-3">
                                <button type="submit" name="submit" class=" w-100 btn-register-color messagetxttt" id="saveProcess">
                                    <span>Sign Up</span>
                                </button>
                            </div>

                            <div class="switch-form text-secondary d-flex justify-content-evenly"><a href="<?php echo base_url(); ?>site/login" class="text-white">Already have an account? </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-5 my-2">
                    <div class="auth-container">
                        <div class="auth-sidebar">
                            <div>
                                <h2 class="text-center text-white animated-text">Welcome</h2>
                                <p class="animated-text">Welcome to [NGO Name]! Thank you for joining our mission to create a positive impact.
                                    Together, we can make a difference. Let’s build a better future for those in need!
                                </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <img src="<?php echo base_url(); ?>website_assets/signupp.png" class="signUp-images-right" alt="">
                            </div>
                            <div>
                                <p>Protected by advanced encryption and multi-factor authentication.</p>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>

    <?php include("includes/footer.php"); ?>
    <?php include("includes/script.php"); ?>


    <script>
        $(document).ready(function() {
            $('.arvDate').datepicker({
                format: 'dd-mm-yyyy'
            });
        });
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

        $(document).ready(function() {
            $(".arvChange").unbind('change').change(function() {
                var actNbtn = $(this).attr('id');
                let getID = $(this).val();
                if (actNbtn == 'state') {
                    finDetails($(this).attr('data-id'), '#district', getID, actNbtn);
                } else if (actNbtn == 'sector') {
                    if (getID == '7') {
                        $('#current_city').hide();
                        $('#business_type_section,#buss_nameSec').show();
                    } else {
                        $('#current_city').show();
                        $('#business_type_section,#buss_nameSec').hide();
                    }
                    finDetails($(this).attr('data-id'), '#industries', getID, actNbtn);
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

        function finDetails(resource, trgtID, getID, actNbtn) {
            $(trgtID).html('<option>Please Wait.....</option>');
            $(trgtID).css('color', '#AA6203');
            $.post(resource, {
                id: getID,
                actionBase: actNbtn
            }, function(htmlAmi) {
                $(trgtID).html(htmlAmi);
                $(trgtID).css('color', 'rgb(19,20,20)')
            });
        }
  $("#registerDet").on("submit", function (e) {
      e.preventDefault();
      $.ajax({
      url: $(this).attr('data-id'), type: "POST", data: $(this).serialize(), dataType: 'json',
      beforeSend: function () { $('#saveProcess').html('<div class="loader"></div> Please Wait'); },
      complete: function () { $('#saveProcess').html('<i class="fa-regular fa-floppy-disk"></i> Submit'); },
      success: function (data) {
      //$('.messagetxttt').prop('disabled', true).text('Submitting...');
      toastMultiShow(data.adClass, data.msg, data.icon); 
     if(data.adClass=='tSuccess'){ setTimeout(function () { window.location.reload(1); }, 2000); }
     }
      });
      });
    </script>

    <script>
        const togglePassword = document.getElementById("togglePassword");
        const passwordField = document.getElementById("password");
        togglePassword.addEventListener("click", function() {
            const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
            // Toggle icon class
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        })
    </script>


</body>

</html>