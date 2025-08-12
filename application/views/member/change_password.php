        <div class="row my-5">
        <div class="col-md-2"></div>
        <div class="col-md-4 mt-5 col-sm-12">
        <img src="<?php echo base_url();?>assets/images/change_password.png" alt="" style="width:60%;">
        </div>
        <div class="col-md-5">
        <div class="mainDiv">
        <div class="cardStyle">
        <form id="get_mem_id" method="post">              
        <h2 class="formTitle title-heading-border">Change Password </h2>
        <div class="inputDiv">
        <label class="inputLabel" for="password">Enter Old Password <span class="text-denger">*</span></label>
        <input type="password" class="mt-2" id="old_password" name="old_password" required>
        <input type="hidden" name="mem_id" id="mem_id" value="<?php echo $getIDCardDetails->id;?>">
        <input type="hidden" name="mem_password" id="mem_password" value="<?php echo $getIDCardDetails->show_password;?>">
        </div>
        <div class="inputDiv">
        <label class="inputLabel" for="password">New Password <span class="text-denger">*</span></label>
        <input type="password" class="mt-2" id="new_password" name="new_password" required>
        </div>            
        <div class="inputDiv">
        <label class="inputLabel" for="confirmPassword">Confirm Password <span class="text-denger">*</span></label>
        <input type="password"  class="mt-2" id="confirm_password" name="confirm_password">
        </div>          
        <div class="buttonWrapper">
        <button type="submit" id="submit" name="submit"  class="submitButton pure-button pure-button-primary text-center">
        <span>Continue</span>
        </button>
        <h4 id="message"style="text-align:center;margin-top:1rem;">&nbsp;</h4>
        </div>            
        </form>
        </div>      
        </div>      
        </div>
        <div class="col-md-1"></div>
        </div>
        </div>
        <style>
.mainDiv {display: flex;min-height: 100%;align-items: center;justify-content: center;background-color: #f9f9f9;font-family: 'Open Sans', sans-serif;}
.cardStyle {width: 500px;border-color: white;background: #fff;padding: 36px 0;border-radius: 4px;margin: 30px 0;box-shadow: 0px 0 2px 0 rgba(0,0,0,0.25);}          
#signupLogo {max-height: 100px;margin: auto;display: flex;flex-direction: column;}        
.formTitle{font-weight: 600;margin-top: 20px;color: #2F2D3B;text-align: center;    }       
.inputLabel {font-size: 12px;color: #555;margin-bottom: 6px;margin-top: 24px; }
.inputDiv {width: 70%;display: flex;flex-direction: column;margin: auto;}
input {height: 40px;font-size: 16px;border-radius: 4px;border: none;border: solid 1px #ccc;padding: 0 11px;}
input:disabled {cursor: not-allowed;border: solid 1px #eee;}
.buttonWrapper {margin-top: 40px;}
.submitButton {width: 70%;height: 40px;margin: auto;display: block;color: #fff;background-color: #065492;border-color: #065492;text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);border-radius: 4px;font-size: 14px;cursor: pointer;}
.submitButton:disabled,
button[disabled] {border: 1px solid #cccccc;background-color: #cccccc;color: #666666;}
.bg-dark{ background-color: #065492;}
.text-denger{color:red;}@keyframes spin {0% { transform: rotate(0deg); }100% { transform: rotate(360deg); }}
.mt-2{margin-top:2rem;}
.my-6{margin:6rem 0rem;}
.title-heading-border{border-bottom:1px solid #e1e1e1;padding-bottom:1.5rem;}
.mt-5{margin-top:5.5rem;}.w-100{width:100%;}
</style>
<script>
$("#get_mem_id").on("submit", function (e) {
e.preventDefault(); 
$.ajax({type: "POST",url: '<?= base_url() ?>member/Profile/reset_password',
data: new FormData(this),processData: false,contentType: false, cache: false,
async: true,success: function (response) {const data = JSON.parse(response); 
if (data.status === 'success') {
$("#message").html('<span style="color: green;">' + data.message + '</span>');setTimeout(function () {window.location.reload(); }, 2000);
} else { $("#message").html('<span style="color: red;">' + data.message + '</span>').fadeIn().delay(3000).fadeOut();
}
},});});
</script>