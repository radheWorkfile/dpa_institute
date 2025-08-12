<div class="row m-2"> 
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-3" style="box-shadow:1px 1px 11px grey;padding:4rem 1rem;">
        <form class="auth-form" method="post" action="<?php echo base_url('member/dashboard/create_feedback');?>">
        <h2 class="text-center">Your Feedback</h2>
        <p class="text-center mb-3"style="border-bottom:1px solid #d2d2d2;">Let Us Know Your Thoughts</p>
        <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" placeholder="Username" id="user_name" name="user_name">
        <input type="hidden" name="feedMemId" id="feedMemId" value="<?php echo $MemberDet['id'];?>">
        </div>      
        <div class="input-container">
        <i class="fa fa-envelope icon"></i>
        <input class="input-field" type="text" maxlength="10" id="user_mob" placeholder="Mobile No" name="user_mob" require>
        </div>
        <div class="input-container">
        <i class="fa fa-users icon"></i>
        <input class="input-field" type="text" id="user_feedback" name="user_feedback" placeholder="Subject" name="psw">
        </div>
        <div class="input-container">
        <i class="fa fa-users icon"></i>
        <input class="input-field" type="text" id="user_suggestion" name="user_suggestion" placeholder="Suggestion for Improvement" name="psw">
        </div>      
        <button type="submit" name="submit" id="submit" class="btn"><b>Submit</b></button>
        </form>
        </div>
        <div class="col-md-3"></div>        
        </div>