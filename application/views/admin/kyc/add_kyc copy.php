            <div class="content-body">
            <div class="container-fluid">
            <div class="row">
            <div class="col-xl-12 col-lg-12">
            <div class="card">
            <div class="card-header">
            <h4 class="card-title"><?php echo $title; ?></h4>
            <div class="card-action">
            <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item py-1">
            </li>
            </ul>
            </div>
            </div>
    <!-- ---------------------------------------------------  -->

    <!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3 custom-border-1">
                <h2><strong>KYC procedure</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" data-id="<?php echo $targetItem;?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Personal Info</strong></li>
                                <li id="personal"><strong>Account Info</strong></li>
                                <li id="payment"><strong>KYC Details</strong></li>
                                <li id="confirm"><strong>KYC Document</strong></li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title mb-5">Persional Information</h2>
                                        <div class="col-12">
                                            <label class="pay">User Name <span class="text-danger"> *</span></label>
                                            <input type="text" name="user_name" id="user_name" value="<?php echo $emp_det->name?$emp_det->name:'';?>" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')" require placeholder="UserName"/>
                                            <input type="hidden" name="id" id="id" value="<?php echo $emp_det->id?$emp_det->id:'';?>" />
                                        </div> 
                                        <div class="col-12">
                                            <label class="pay">Mobile Number <span class="text-danger"> *</span></label>
                                            <input type="text" name="mobile" id="mobile" value="<?php echo $emp_det->mobile?'+91 '.$emp_det->mobile:'';?>" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" required maxlength="10" require placeholder="Mobile Number"/>
                                        </div>
                                        <div class="col-12">  
                                            <label class="pay">Email-Id <span class="text-danger"> *</span></label>
                                            <input type="email" name="email" id="email" value="<?php echo $emp_det->email?$emp_det->email:'';?>" require placeholder="Email Id"/>
                                        </div>
                                        <div class="col-12">
                                            <label class="pay">Address <span class="text-danger"> *</span></label>
                                            <input type="text" name="address" id="address" value="<?php echo $emp_det->address?$emp_det->address:'';?>"  require placeholder="Address"/>
                                        </div>
                                    
                                </div>
                                <input type="button" name="next" class="next action-button" id="PerInfo" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Account Information</h2>
                                        <div class="col-12">
                                            <label class="pay">Bank Name <span class="text-danger"> *</span></label>
                                            <input type="text" name="bank_name" id="bank_name" value="<?php echo $emp_det->bank_name?$emp_det->bank_name:'';?>" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')" require/>
                                        </div>
                                        <div class="col-12">  
                                            <label class="pay">Account Holder Name <span class="text-danger"> *</span></label>
                                            <input type="text" name="holder_name" value="<?php echo $emp_det->holder_name?$emp_det->holder_name:'';?>"  oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')" id="holder_name" require/>
                                        </div>  
                                        
                                        <div class="col-12">
                                            <label class="pay">Account Number <span class="text-danger"> *</span></label>
                                            <input type="text" name="acc_no" id="acc_no" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" required maxlength="18" value="<?php echo $emp_det->acc_no?$emp_det->acc_no:'';?>" require/>
                                        </div>
                                        <div class="col-12">
                                            <label class="pay">IFSC Code <span class="text-danger"> *</span></label>
                                            <input type="text" name="ifsc_code" id="ifsc_code" value="<?php echo $emp_det->ifsc_code?$emp_det->ifsc_code:'';?>" require/>
                                        </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" id="AccInfo" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Document Information</h2> 
                                    <div class="radio-group">
                                        <div class='radio' data-value="credit"><img src="<?php echo base_url($emp_det->aadhaar_image?$emp_det->aadhaar_image:'front/ngo_img/kyc-image/aadhar_card.jpeg');?>" width="200px" height="100px"></div>
                                        <div class='radio' data-value="paypal"><img src="<?php echo base_url($emp_det->pan_image?$emp_det->pan_image:'front/ngo_img/kyc-image/pan-card.jpeg');?>" width="200px" height="100px"></div>
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <label class="pay">Aadhaar Number <span class="text-danger"> *</span></label>
                                        <input type="text" name="aadhaar_no" value="<?php echo $emp_det->aadhaar_no?$emp_det->aadhaar_no:'';?>" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" required maxlength="12" require/>
                                    </div>
                                    <div class="col-12">
                                        <label class="pay">Pan Number <span class="text-danger"> *</span></label>
                                        <input type="text" name="pan_no" value="<?php echo $emp_det->pan_no?$emp_det->pan_no:'';?>" require/>
                                    </div>
                                    
                                        
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="make_payment" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h3 class="fs-title text-center">Upload Document !</h3>
                                    <div class="radio-group">
                                        <div class='radio' data-value="credit"><img src="<?php echo base_url($emp_det->aadhaar_image?$emp_det->aadhaar_image:'front/ngo_img/kyc-image/aadhar_card.jpeg');?>" width="150" height="75px"></div>
                                        <div class='radio' data-value="paypal"><img src="<?php echo base_url($emp_det->pan_image?$emp_det->pan_image:'front/ngo_img/kyc-image/pan-card.jpeg');?>" width="150" height="75px"></div>
                                        <div class='radio' data-value="paypal"><img src="<?php echo base_url($emp_det->passbook_image?$emp_det->passbook_image:'front/ngo_img/kyc-image/passbook.jpeg');?>" width="150" height="75px"></div>
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <label class="pay">Upload Aadhaar card <span class="text-danger"> *</span></label>
                                        <input type="file" name="aadhaar_img"  require/>
                                    </div>
                                    <div class="col-12">  
                                        <label class="pay">Upload Pan card <span class="text-danger"> *</span></label>
                                        <input type="file" name="pan_img"  require/>
                                    </div>
                                    <div class="col-12">
                                        <label class="pay">Upload Bank Passbook <span class="text-danger"> *</span></label>
                                        <input type="file" name="passbook_img"  require/>
                                    </div>
                                     <br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                           <button type="submit" name="submit" class="submitBtn">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
            
    <!-- ---------------------------------------------------  -->
            </div>
            </div>
            </div>
            </div>          
            </div>          
           
    <script src="<?php echo base_url('assets/js/admin/kyc/kyc_verified.js') ?>"></script>









