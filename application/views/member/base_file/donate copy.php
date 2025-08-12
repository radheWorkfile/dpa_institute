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
            <!-- ---------------------------------------  -->
              <!-- Upload Area -->               
              <div id="uploadArea" class="upload-area">
            <!-- Header -->
            <div class="upload-area__header">
            <h5>Upload your file</h5>
            <p class="upload-area__paragraph text-danger">File should be an image
            <strong class="upload-area__tooltip">Like
            <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
            </strong>
            </p>
            </div>
            <!-- End Header -->
            <!-- Drop Zoon -->
            <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
            <span class="drop-zoon__icon">
            <i class='bx bxs-file-image'></i>
            </span>
            <p class="drop-zoon__paragraph text-success">Drop your file here or Click to browse</p>
            <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
            <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
            <input type="file" id="fileInput" name="previewImage" class="drop-zoon__file-input" accept="image/*">
            </div>
            <!-- End Drop Zoon -->
            <span id="updateMessage">&nbsp;&nbsp;</span>
            <!-- End Drop Zoon -->
            <div class="row mt-1">
            <div class="col-md-12">
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            <input type="text" class="form-control border-left-end" name="slider_heading" id="slider_heading" placeholder="Enter Heading.." required="">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            </div>
            <!-- -------------------------------------  -->
            <!-- File Details -->
            <div id="fileDetails" class="upload-area__file-details file-details">
            <h3 class="file-details__title">Uploaded File</h3>          
            <div id="uploadedFile" class="uploaded-file">
            <div class="uploaded-file__icon-container">
            <i class='bx bxs-file-blank uploaded-file__icon'></i>
            <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
            </div>          
            <div id="uploadedFileInfo" class="uploaded-file__info">
            <span class="uploaded-file__name">Proejct 1</span>
            <span class="uploaded-file__counter">0%</span>
            </div>
            </div>
            </div>
            </div>  
            <!-- ---------------------------------------  -->
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

