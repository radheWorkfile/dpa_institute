<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="">
    <title>Forgot Password || NGO</title>
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
                        <h2>Forgot Your Password ?</h2>
                        <p class="text-justify">
                            No worries! If you’ve forgotten your password, you can easily reset it. Simply enter your
                            registered email address, and we’ll send you a link to create a new password.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="p-2 p-md-3 p-lg-4 border border-white">
                        <form method=" post" class="d-flex justify-content-center" id="loginDet"
                            data-id="<?php echo $targetLogin; ?>">
                            <div>
                                <h2 class="py-2 text-center animated-text">Forgot Password </h2>
                                <p class=" text-center">
                                    No worries! If you’ve forgotten your password, you can easily reset it.
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
                                        <div class="w-100 d-flex align-items-center " id="signinRound">
                                            <i class="fa-solid fa-user pe-2 "></i>
                                            <input type="text" class="border-none-login" name="login_id" id="login_id"
                                                placeholder="Enter Email Id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="w-100">

                                        <div class="w-100  d-flex align-items-center" id="signinRound">
                                            <i class="fa-solid fa-key pe-2 "></i>

                                            <input type="password" class="border-none-login" name="loginPassword"
                                                id="newPassword" placeholder=" Password">
                                            <i class="fa-solid fa-eye-slash toggle-eye" id="toggleNewPassword"></i>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="w-100">

                                        <div class="w-100  d-flex align-items-center" id="signinRound">
                                            <i class="fa-solid fa-key pe-2 "></i>

                                            <input type="password" class="border-none-login" name="loginPassword"
                                                id="confirmPassword" placeholder="Confirm Password">
                                            <i class="fa-solid fa-eye-slash toggle-eye" id="toggleConfirmPassword"></i>
                                        </div>

                                    </div>
                                </div>

                                <div class=" w-100">
                                    <button type="submit" class=" w-100 btn-login-color" id="saveProcess">
                                        <i class="fa-regular fa-floppy-disk"></i> Submit
                                    </button>
                                </div>
                                <div class="mt-2 " id="">
                                    <div class="d-flex justify-content-between" id="sm-increase">
                                        <li class="pointer text-center fs-5 w-100"><a href="<?php echo base_url(); ?>site/login">login
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
        const toggleNewPassword = document.getElementById("toggleNewPassword");
        const newPassword = document.getElementById("newPassword");

        const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
        const confirmPassword = document.getElementById("confirmPassword");

        toggleNewPassword.addEventListener("click", function() {
            const type = newPassword.getAttribute("type") === "password" ? "text" : "password";
            newPassword.setAttribute("type", type);
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });

        toggleConfirmPassword.addEventListener("click", function() {
            const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
            confirmPassword.setAttribute("type", type);
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    </script>


</body>

</html>