<div class="row mt-5 mb-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <h2 class="text-center pt-3 text-color-1">&nbsp;&nbsp; Become a Volunteer Today </h2>
        <p class="text-center"><b class="text-success becoemAvol pointer">Become a volunteer </b> and <b class=" signUpSec text-success pointer">join</b> us to make a meaningful impact. Support our NGO’s mission to bring hope, inspire change, and uplift communities. Together, we thrive!</p>
         <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-3">
            <form action="<?php echo base_url();?>website/volunteer/becomeAvolunteer" method="post">
            <input type="hidden" name="id" value="<?php echo $MemberDet['id'];?>">
            <input type="hidden" name="name" value="<?php echo $MemberDet['name'];?>">
            <input type="hidden" name="email_id" value="<?php echo $MemberDet['email_id'];?>">
            <input type="hidden" name="mobile_number" value="<?php echo $MemberDet['mobile_number'];?>">
        <button class="bgk-primary py-1 px-3 messagetxttt mt-3 text-white w-100 text-center" type="submit">Volunteer Request...</button>
        </form>
            </div>
            <div class="col-md-4"></div>
         </div>
        </div>
        <div class="col-md-2"></div>
        </div>