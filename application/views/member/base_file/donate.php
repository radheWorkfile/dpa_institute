<div class="row mb-5">
            <div class="col-md-3"></div>
            <div class="col-md-6 box-shadow mt-5">

            <form id="LogedMemDonation" method="POST" enctype="multipart/form-data" class="p-4">
            <div class=" border-bottom">
            <div class="py-3 mb-0 pt-4">
            <h2 class="text-center">Let's Donate</h2>
            <p class="mb-0 text-success text-center">&#x201C; Reach out to us anytime via our Contact Us page. We’re here to assist with your questions and needs. &#x201D;</p>
            </div>
            </div>
            <div class="py-4">
            <div class="d-md-flex gap-3 justify-content-between">
            <div class="w-100">
            <input type="hidden" name="logMemId" id="logMemId" value="<?php echo $MemberDet['id'];?>">
            <input type="text" name="name" id="name" oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')" required placeholder="Enter Name Here"
            class="bbbottom-1 py-1 px-3 w-100">
            </div>
            <div class="w-100">
            <input type="text" name="mobile_no" id="mobile_no"   oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" required maxlength="10" placeholder="Enter Mobile No."
            class="bbbottom-1 py-1 px-3 w-100">
            </div>
            </div>

            <div class="d-md-flex gap-3 justify-content-between  my-lg-4">     

            <div class="w-100">
            <input type="text" name="emailId" id="emailId" required placeholder="Enter Email Id" class="bbbottom-1 w-100 py-1 px-3 w-100">
            </div>

            <div class="w-100">
            <input type="text" name="donAmount" id="donAmount"  oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" required maxlength="10" placeholder="Enter Amount" class="bbbottom-1 w-100 py-1 px-3 w-100">
            </div>

            </div>
                                                     
            </div>
            <div class="w-100">
            <textarea name="message" id="message" oninput="this.value = this.value.replace(/[^a-zA-Z,.\s]/g, '')" required id="" placeholder="Enter Message Here "class="messagetxttt py-1 px-3 w-100" cols="10" rows="3"></textarea>
            </div>
    
            <div class="row" id="donate-payment">
            <div class="row mt-2">
            <p class="text-center text-danger">"Your small donation can make a big difference, providing food, shelter, education, and hope to poor people in need. Act now to help!" </p>
            <div class="col-md-12 border-solid"style="border:1px solid #e0e0e0;padding:1rem 2rem 1rem 2rem;border-radius:1rem;">
            <div class="row">
            <p class="text-center text-success">Account Details</p>
            <div class="col-md-12"style="display:flex;justify-content:space-between">
            <p class="text-dark">Account No &nbsp;- <p>
            <p class="text-dark"> 69234156784325345</p>
            </div>
            <div class="col-md-12"style="display:flex;justify-content:space-between">
            <p class="text-dark">IFSC-CODE &nbsp;- <p>
            <p class="text-dark"> hdfc10001</p>
            </div>
            </div>
            </div>  
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="d-md-flex gap-1 justify-content-between">                                              
            <div class="container mt-3">
            <div class="file-upload-wrapper">
            <label class="file-upload-box mb-0">
            <input type="file" class="file-upload-input" multiple name="reciept_Img" id="reciept_Img">
            <div class="upload-content">
            <i class="fas fa-cloud-upload-alt upload-icon"></i>
            <h5 class="mb-2">Payment Reciept Upload:</h5>
            <p class="text-muted mb-0"> click to browse</p>
            </div>
            </label>
            <div class="file-list">
            <!-- Files will be listed here -->
            </div>
            </div>
            </div>                       
            </div>
            </div>
            </div>

            </div>

            <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-md-6 w-100" id="message" style="background-color:#74e974; border-radius: 2rem;display:none;">
            <h2 class="text-center text success w-100">Success</h2>
            </div>
            <div class="col-md-3"></div>
            </div>
            <div class="row mb-1">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <div class="w-100">
            <button class="bgk-primary py-1 px-3 messagetxttt mt-3 text-white w-100 text-center" type="submit">Submit</button>
            </div>
            </div>
            <div class="col-md-4"></div>
            </div>
            </form>
            </div>
            <div class="col-md-3"></div>
            </div>