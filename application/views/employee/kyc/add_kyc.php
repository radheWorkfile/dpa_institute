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
                <?php if($kyc->status == 1):?>
                <h5 class="blinking-success">Your KYC verification is completed.</h5>
                <?php elseif($kyc->status == 2):?>
                <h5 class="blinking-text">You will approve very soon.</h5>
                <?php else:?>
                <h5 style="color:#6A1818;">Fill details to complete your KYC. </h5>
                <?php endif;?>
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
                                            <input type="text" name="user_name" id="user_name" value="<?php echo $emp_det->first_name?$emp_det->first_name:'';?>" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')" require placeholder="UserName"/>
                                            <input type="hidden" name="emp_id" id="emp_id" value="<?php echo $emp_det->id?$emp_det->id:'';?>" />
                                        </div> 
                                        <div class="col-12">
                                            <label class="pay">Mobile Number <span class="text-danger"> *</span></label>
                                            <input type="text" name="mobile" id="mobile" value="<?php echo $emp_det->mobile_number?'+91 '.$emp_det->mobile_number:'';?>" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" required maxlength="10" require placeholder="Mobile Number"/>
                                        </div>
                                        <div class="col-12">  
                                            <label class="pay">Email-Id <span class="text-danger"> *</span></label>
                                            <input type="email" name="email" id="email" value="<?php echo $emp_det->email_id?$emp_det->email_id:'';?>" require placeholder="Email Id"/>
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
                                            <input type="text" name="bank_name" id="bank_name" value="<?php echo $kyc->bank_name?$kyc->bank_name:'';?>" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')" require/>
                                        </div>
                                        <div class="col-12">  
                                            <label class="pay">Account Holder Name <span class="text-danger"> *</span></label>
                                            <input type="text" name="holder_name" value="<?php echo $kyc->holder_name?$kyc->holder_name:'';?>"  oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')" id="holder_name" require/>
                                        </div>  
                                        
                                        <div class="col-12">
                                            <label class="pay">Account Number <span class="text-danger"> *</span></label>
                                            <input type="text" name="acc_no" id="acc_no" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" required maxlength="18" value="<?php echo $kyc->acc_no?$kyc->acc_no:'';?>" require/>
                                        </div>
                                        <div class="col-12">
                                            <label class="pay">IFSC Code <span class="text-danger"> *</span></label>
                                            <input type="text" name="ifsc_code" id="ifsc_code" oninput="validateIFSC(this)"  value="<?php echo $kyc->ifsc_code?$kyc->ifsc_code:'';?>" require/>
                                        </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" id="AccInfo" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Document Information</h2>
                                    <div class="radio-group">
                                        <div class='radio' data-value="credit"><img src="<?php echo base_url($kyc->aadhaar_image?$kyc->aadhaar_image:'website_assets/kyc/aadhar_card.png');?>" width="200px" height="100px"></div>
                                        <div class='radio' data-value="paypal"><img src="<?php echo base_url($kyc->pan_image?$kyc->pan_image:'website_assets/kyc/pan-card.jpg');?>" width="200px" height="100px"></div>
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <label class="pay">Aadhaar Number <span class="text-danger"> *</span></label>
                                        <input type="text" name="aadhaar_no" value="<?php echo $kyc->aadhaar_no?$kyc->aadhaar_no:'';?>" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" required maxlength="12" require/>
                                    </div>
                                    <div class="col-12">
                                        <label class="pay">Pan Number <span class="text-danger"> *</span></label>
                                        <input type="text" name="pan_no" oninput="validatePAN(this)" value="<?php echo $kyc->pan_no?$kyc->pan_no:'';?>" require/>
                                    </div>
                                    
                                        
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="make_payment" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h3 class="fs-title text-center">Upload Document !</h3>
                                    <div class="radio-group">
                                    <div class='radio' data-value="credit"><img src="<?php echo base_url($kyc->aadhaar_image?$kyc->aadhaar_image:'website_assets/kyc/aadhar_card.png');?>" width="150px" height="100px"></div>
                                    <div class='radio' data-value="paypal"><img src="<?php echo base_url($kyc->pan_image?$kyc->pan_image:'website_assets/kyc/pan-card.jpg');?>" width="150px" height="100px"></div>
                                        <div class='radio' data-value="paypal"><img src="<?php echo base_url($kyc->passbook_image?$kyc->passbook_image:'website_assets/kyc/passbook-img.jpeg');?>" width="150px" height="100px"></div>
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
                                    <?php if($kyc->status == 1):?>
                                    <p style="text-align:center;"><span style="padding:0.5rem 2rem;background-color:#006f75;color:white;">Completed...</span></p>
                                    <?php else:?>
                                        <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                           <button type="submit" name="submit" class="submitBtn">Submit</button>
                                        </div>
                                    </div>
                                    <?php endif;?>
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
            
            
            
    <style>
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        .blinking-text {
            color: red;
            animation: blink 1s infinite;
        }
        .blinking-success {
            color: green;
            animation: blink 1s infinite;
        }
    </style>
           
    <script src="<?php echo base_url('assets/js/employee/kyc/kyc_verified.js') ?>"></script>

<script>
function validatePAN(input) {
let value = input.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
let formattedValue = '';let lettersPart = value.slice(0, 5).replace(/[^A-Z]/g, '');
formattedValue += lettersPart;let digitsPart = value.slice(lettersPart.length, lettersPart.length + 4).replace(/[^0-9]/g, '');formattedValue += digitsPart;
if (formattedValue.length == 9) {let lastLetterPart = value.slice(lettersPart.length + digitsPart.length, lettersPart.length + digitsPart.length + 1).replace(/[^A-Z]/g, '');formattedValue += lastLetterPart; }input.value = formattedValue;
} function validateIFSC(input) {let value = input.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
let formattedValue = '';let lettersPart = value.slice(0, 4).replace(/[^A-Z]/g, '');
formattedValue += lettersPart;let digitsPart = value.slice(lettersPart.length, lettersPart.length + 7).replace(/[^0-9]/g, '');formattedValue += digitsPart;input.value = formattedValue;}
function validateEmail(input) {input.value = input.value.toUpperCase().replace(/[^a-zA-Z@.]/g, '');const emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;const errorMessage = document.getElementById('error-message');if (!emailPattern.test(input.value)) {errorMessage.textContent = "Invalid email address.";} else {errorMessage.textContent = "";}}
</script>









