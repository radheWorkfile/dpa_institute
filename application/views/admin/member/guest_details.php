<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header"><h4 class="card-title text-white">Guest Member Details</h4></div>
          <div class="card-body">
            <div class="basic-form">
            	<?php //print_r($guestDetails);?>
              <form id="create_member" method="post" accept-charset="utf-8" data-id="<?php echo $createAction;?>" enctype="multipart/form-data">
              		<input type="hidden" id="arvActionTrgt" value="<?php echo $arvActionTrgt;?>">
                    <input type="hidden" id="actnOper" value="<?php echo $guestDetails->id;?>" name="actnOper">
                <div class="row">


                <div class="col-md-4">
                <p class="text-man text-color-g">&nbsp;Guest Name</p>
                <div class="input-group m-t-1">
                <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
                <input type="text" class="form-control" placeholder="Aarav Singh" name="membrName" id="membrName" value="<?php echo $guestDetails->name?$guestDetails->name:"";?>" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
                <div class="invalid-feedback">Please Enter Heading.
                </div>
                </div>
                </div>
                </div>


                <div class="col-md-4">
                <p class="text-man text-color-g">&nbsp;Father's Name</p>
                <div class="input-group m-t-1">
                <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
                <input type="text" class="form-control"  value="<?php echo $guestDetails->father_name?$guestDetails->father_name:"";?>" placeholder="Chintu Singh" name="ftherName" id="ftherName" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')">
                <div class="invalid-feedback">Please Enter Heading.
                </div>
                </div>
                </div>
                </div>


                <div class="col-md-4">
                <p class="text-man text-color-g">&nbsp;Gender</p>
                <div class="input-group m-t-1">
                <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
                <div class="dropdown bootstrap-select form-control">
                <select id="gender" name="gender" class="form-control">
                <option selected="" value="">Choose Gender</option>
                <option value="1" <?php echo (($guestDetails->gender=='1')?'selected="selected"':"");?> >Male</option>
                <option value="2" <?php echo (($guestDetails->gender=='2')?'selected="selected"':"");?>>Female</option>
                <option value="3" <?php echo (($guestDetails->gender=='3')?'selected="selected"':"");?>>Transgender</option>
                </select>
                </div>
                </div>
                </div>
                </div>


                <div class="col-md-4 mt-3">
                <p class="text-man text-color-g">&nbsp;Date of Birth</p>
                <div class="input-group m-t-1">
                <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-calendar text-color-g"></i> </span>
                <input type="text" class="form-control arvDate" id="date_of_birth" name="date_of_birth" placeholder="DD-MM-YYYY"  value="<?php echo $guestDetails->date_of_birth?date('d-m-Y',strtotime($guestDetails->date_of_birth)):"";?>"  >
                <div class="invalid-feedback">Please Enter Heading.
                </div>
                </div>
                </div>
                </div>


                <div class="col-md-4 mt-3">
                <p class="text-man text-color-g">&nbsp;Email</p>
                <div class="input-group m-t-1">
                <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-envelope  text-color-g"></i> </span>
                <input type="text" class="form-control keyUpAction" id="email_id" name="email_id" value="<?php echo $guestDetails->email_id?$guestDetails->email_id:"";?>" placeholder="Email Id" >
                <div class="invalid-feedback">Please Enter Heading.
                </div>
                </div>
                </div>
                </div>


                <div class="col-md-4 mt-3">
                <p class="text-man text-color-g">&nbsp;Mobile Number</p>
                <div class="input-group m-t-1">
                <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-phone text-color-g"></i> </span>
                <input type="text" class="form-control" name="mobileNu" id="mobileNu" value="<?php echo $guestDetails->mobile_number?$guestDetails->mobile_number:"";?>" placeholder="Mobile Number" oninput="this.value=this.value.replace(/[^0-9]/g,'').replace(/(\ *?)\ */g,'$1')">
                <div class="invalid-feedback">Please Enter Heading.
                </div>
                </div>
                </div>
                </div>

                 
                </div>


                <div class="row mb-5">
                  <div class="mb-3 col-md-6 frBsnsDetails" style=" <?php echo ($guestDetails->job_section=='7')?'display:block;':'';?>"><label>Business Name</label><input type="text" class="form-control" placeholder="Enput Business Name" value="<?php echo $guestDetails->busi_profile_name?$guestDetails->busi_profile_name:"";?>" id="businessNm" name="businessNm"></div>


                  <div class="col-md-12 mt-4">
                  <p class="text-man text-color-g">&nbsp;Address</p>
                  <div class="mb-3 m-t-1">
                  <div class="input-group"> <span class="input-group-text text-color-g"> <i class="fa fa-address-card"></i> </span>
                  <textarea class="form-control" placeholder="Enter Address" rows="4" id="membrAddr" name="membrAddr"><?php echo $guestDetails->address?$guestDetails->address:"";?></textarea>
                  <div class="invalid-feedback">Please Enter Your text. </div>
                  </div>
                  </div>
                  </div>



                  <div class="col-md-4 mt-3">
                  <p class="text-man text-color-g">&nbsp;Choose State</p>
                  <div class="input-group m-t-1">
                  <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
                  <div class="dropdown bootstrap-select form-control">
                  <select id="inputState" name="inputState"  class="form-control" data-id="inputDistrict">
                        <option value="" selected="">Choose State</option>
                        <?php if($stateList)
							  {
							  	foreach($stateList as $state)
								{?>
                       	 		<option value="<?php echo $state->id;?>" <?php echo (($guestDetails->state_id==$state->id)?'selected="selected"':"");?> ><?php echo $state->state_cities;?></option>
                        <?php }}else{echo '<option>Not Available</option>';}?>
                      </select>
                  </div>
                  </div>
                  </div>
                  </div>



                  <div class="col-md-4 mt-3">
                  <p class="text-man text-color-g">&nbsp;District</p>
                  <div class="input-group m-t-1">
                  <div class="input-group">
                  <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
                  <div class="dropdown bootstrap-select form-control">
                  <select id="inputDistrict" name="inputDistrict" class="form-control"  data-id="inputBlock">
                        <option value="" selected="">Choose District</option>
                        <?php if($districtList)
							  {
							  	foreach($districtList as $dist)
								{?>
                       	 		<option value="<?php echo $dist->id;?>" <?php echo (($guestDetails->district_id==$dist->id)?'selected="selected"':"");?> ><?php echo $dist->state_cities;?></option>
                        <?php }}else{echo '<option>Not Available</option>';}?>
                      </select>
                  </div>
                  </div>
                  </div>
                  </div>



                <div class="col-md-4 mt-3">
                <p class="text-man text-color-g">&nbsp;Zipcode</p>
                <div class="input-group m-t-1">
                <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
                <input type="text" class="form-control" placeholder="XXXXXX" id="zipcode" value="<?php echo $guestDetails->zipcode?$guestDetails->zipcode:"";?>" name="zipcode" maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'').replace(/(\ *?)\ */g,'$1')">
                <div class="invalid-feedback">Please Enter Heading.
                </div>
                </div>
                </div>
                </div>



                <div class="col-md-4 mt-3">
                <p class="text-man text-color-g">&nbsp;Username</p>
                <div class="input-group m-t-1">
                <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
                <input type="text" class="form-control" placeholder="Username" id="username" name="username"  value="<?php echo $guestDetails->email_id?$guestDetails->email_id:"";?>" readonly="readonly">
                <div class="invalid-feedback">Please Enter Heading.
                </div>
                </div>
                </div>
                </div>



                <div class="col-md-4 mt-3">
                <p class="text-man text-color-g">&nbsp;Registration Date</p>
                <div class="input-group m-t-1">
                <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-calendar text-color-g"></i> </span>
                <input type="text" class="form-control"  value="<?php echo $guestDetails->create_date?date('d-M-Y',strtotime($guestDetails->create_date)):"";?>" >
                <div class="invalid-feedback">Please Enter Heading.
                </div>
                </div>
                </div>
                </div>



                <div class="col-md-4 mt-3">
                <p class="text-man text-color-g">&nbsp;Registeration Type</p>
                <div class="input-group m-t-1">
                <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
                <div class="dropdown bootstrap-select form-control">
                <select id="approval_status" name="approval_status" class="form-control">
                <option selected="" value="">Choose One</option>
                <!-- <option value="1">Founder</option> -->
                <!-- <option value="2">Mentor</option> -->
                <option value="3">Member</option>
                </select>
                </div>
                </div>
                </div>
                </div>


                
                </div>
                 <button type="submit" class="btn btn-primary" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
                 <a href="<?php echo base_url('administrator/member/guest');?>" class="btn light btn-dark pull-right"><i class="fa fa-arrow-left"></i> Back</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
	.frBsnsDetails,#crntJBLoc{ display:none;}
	.pull-right,#saveDetails{ float:right !important;}
	.pull-right{ margin-right:10px;}
	.filter-option-inner-inner{ color:#464545 !important;}
</style>

<script src="<?php echo base_url('assets/js/admin/member.js') ?>"></script>
