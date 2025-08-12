<div class="row mb-5">  
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="row" id="signUpSecMan">
        <div class="auth-main"style="margin:auto;box-shadow:1px 1px 11px grey;">
        <form class="auth-form" method="post" id="registerDet" data-id="<?php echo $newRegisteration; ?>">
        <div class="form-header">
        <h2 style="color:#170e44;">Request For Member</h2>
        </div> 
        <div class="divider">or</div>
        <div class="form-group">
        <i class="fas fa-solid fa-user input-icon"></i> 
        <input type="hidden" name="oldLogMemId" id="oldLogMemId" value="<?php echo $MemberDet['id'];?>">
        <input type="text" class="form-control" id="newName" name="newNname" placeholder="Enter Name *" required>
        </div>
        <div class="form-group">
        <i class="fas fa-envelope input-icon"></i>
        <input type="email" class="form-control" id="newEmail" name="newEmail" placeholder="Email Id" required>
        </div>
        <div class="form-group">
        <i class="fas fa fa-phone input-icon"></i>
        <input type="text" class="form-control" id="newMobile" name="newMobile" maxlength="10" placeholder="Enter Mobile No" required>
        </div>
        <div class="form-group">
        <i class="fas fa fa-users input-icon"></i>
        <input type="text" class="form-control" id="description" name="description" maxlength="10" placeholder="Enter Message" required>
        </div>
          
        <div class="checkbox-container mt-3">
        <div class="custom-checkbox" id="rememberMe">
        <i class="fas fa-check"></i>
        </div>
        <label>Remember me</label>
        </div>    
        <button type="submit" name="submit" class="submit-btn" id="submit" style="background-color:#110b30;text-align:center;">
        <span>Sign In</span>
        <div class="loader">
        <i class="fas fa-spinner fa-spin"></i>
        </div>
        </button>

        <div class="error-message" id="errorMessage"></div>
        <div class="success-message" id="successMessage"></div>   
        <div class="otp-container" id="otpContainer">
        <p>Enter the verification code sent to your email</p>
        <div class="otp-inputs">
        <input type="text" maxlength="1" class="otp-input" data-index="1">
        <input type="text" maxlength="1" class="otp-input" data-index="2">
        <input type="text" maxlength="1" class="otp-input" data-index="3">
        <input type="text" maxlength="1" class="otp-input" data-index="4">
        </div>
        <p>Didn't receive the code? <a href="#" onclick="resendOTP()">Resend</a></p>
        </div>    
        <div class="switch-form text-success">Don't have an account? <a href="<?php echo base_url();?>site/login" class="text-dark">Sign in</a>
        </div>
        </form>
        </div>
        </div>
        </div>
        <div class="col-md-2">
        </div>
        </div>         
        </div>