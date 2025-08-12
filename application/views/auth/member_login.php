<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
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
        <title> <?php echo $title ?> | <?php echo config_item('company_name') ?>  </title>
        <!-- FAVICON -->
        <link rel="icon" href="<?php echo base_url('assets/images/fbicon.ico');?>">
        
        <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
       <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script> 
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
	   	.errMsg{ float:right;color: #ac0606;margin-bottom: -10px;}
	   </style>
    </head>
    <body class="h-100">
        <div class="login-account">
          <div class="row h-100">
            <div class="col-lg-6 align-self-start">
              <div class="account-info-area" style="background-image: url(<?php echo base_url('assets/images/rainbow.gif');?>)">
                <div class="login-content">
                  <p class="sub-title">Log in to your admin dashboard with your credentials</p>
                  <h1 class="title"><?php echo config_item('company_name') ?> <span>NGO</span></h1>
                  <p class="text">Life is not accumulation  it is about contribution.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12 mx-auto align-self-center">
              <div class="login-form">
                <div class="login-head">
                  <h3 class="title">Welcome Back</h3>
                  <p>Login page allows users to enter login credentials for authentication and access to secure content.</p>
                </div>
                <h6 class="login-title"><span id="tiTleFrm">Login</span></h6>
                <?php
                                    if ($_REQUEST['msg'] == 'invalid') {
                                        echo '<div class="alert alert-danger" style="font-size:11.7px;">
                                               <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
											    Invalid Login Details!! Please Check Username, Password
                                            </div>';
                                    }
									else if ($_REQUEST['msg'] == 'impassable') {
                                        echo '<div class="alert alert-warning" style="font-size:11.7px;">
                                               <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
											   Contact to super admin it seems account is blocked
                                            </div>';
                                    }
									
									
									elseif($this->uri->segment(2) == 'logout'){
                                        echo '<div class="alert alert-success">
                                                😎 Log Out Successfully ! 😎.
                                            </div>';
                                    }
                                    ?>
                <form action="<?php echo base_url('login/auth');?>" method="post">
                  <div class="mb-4">
                    <label class="mb-1 text-dark">Email</label><span class="errMsg"><?php echo form_error('email_id'); ?></span>
                    <input type="email" id="email_id" name="email_id" class="form-control form-control-lg" placeholder="hello@example.com">
                  </div>
                  <div class="mb-4">
                    <label class="mb-1 text-dark">Password</label><span class="errMsg"><?php echo form_error('password'); ?></span>
                    <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="********">
                  </div>
                  <div class="form-row d-flex justify-content-between mt-4 mb-2">
                    <div class="mb-4">
                      <div class="form-check custom-checkbox mb-3">
                        <input type="checkbox" class="form-check-input" id="customCheckBox1" >
                        <label class="form-check-label" for="customCheckBox1">Remember my preference</label>
                      </div>
                    </div>
                    <div class="mb-4"> <a href="javascript:void(0);" id="forgotPass" class="perFrmActn btn-link text-primary">Forgot Password?</a> </div>
                  </div>
                  <div class="text-center mb-4">
                    <button type="submit" class="btn btn-primary btn-block perFrmActn" id="cnfrmSignIn">Login</button>
                  </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
    <script src="<?php echo base_url('assets/vendor/global/global.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/custom.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/deznav-init.js');?>"></script>
    </body>
</html>
