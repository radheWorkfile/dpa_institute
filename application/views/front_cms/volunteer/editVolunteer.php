
<!-- previewImage -->
<div class="content-body">
      <div class="container-fluid">
      <div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card">
      <div class="card-header">
      <h4 class="card-title text-white"><?php echo $title;?></h4>
      </div>
      <div class="card-body">
      <div class="basic-form" id="bannerCreate_sec"> 
      
<!-- ============================================ Volunteer section start ================================== -->
<form id="updateVolunteer" data-id="<?php echo $targetItem;?>"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
<div class="row">
            <div class="col-md-12"> 

            <div class="row mt-2">
            <div class="col-md-4">
            <div class="mb-3">
            <p class="text-man text-color-g">&nbsp;Enter Name</p>
            <div class="input-group m-t-1">
            <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
            <input type="hidden" class="form-control border-left-end" name="id" id="id" value="<?php echo $getVolunData->id?$getVolunData->id:'';?>">
            <input type="text" class="form-control border-left-end" name="name" id="name" value="<?php echo $getVolunData->name?$getVolunData->name:'';?>" placeholder="Enter Name.." required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <p class="text-man text-color-g">&nbsp;Enter Email</p>
            <div class="input-group m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-envelope text-color-g"></i> </span>
            <input type="email" class="form-control border-left-end" name="email" id="email" value="<?php echo $getVolunData->email?$getVolunData->email:'';?>" placeholder="Enter Email-Id.." required="">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <p class="text-man text-color-g">&nbsp;Enter Mobile No</p>
            <div class="input-group m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-phone text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="mobile" id="mobile" value="<?php echo $getVolunData->mobile?$getVolunData->mobile:'';?>" placeholder="Enter Mobile.." required="" maxlength="10" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <p class="text-man text-color-g">&nbsp;Enter Address</p>
            <div class="input-group m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-marker text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="address" id="address" value="<?php echo $getVolunData->address?$getVolunData->address:'';?>" placeholder="Enter Address.." required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <p class="text-man text-color-g">&nbsp;Joining Date</p>
            <div class="input-group m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-calendar text-color-g"></i> </span>
            <input type="date" class="form-control border-left-end" name="joining_date" id="joining_date" value="<?php echo $getVolunData->date?$getVolunData->date:'';?>" placeholder="Enter Heading.." required="">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>


            <div class="col-md-4 ">
            <p class="text-man text-color-g">&nbsp;Select One</p>
            <div class="input-group">
            <div class="input-group">
            <span class="input-group-text m-t-1"> <i class="fa fa-link text-color-g"></i> </span>
            <div class="dropdown bootstrap-select form-control">
            <select id="gender" name="gender" class="form-control m-t-1" tabindex="null">
            <option selected="">Choose Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Transgender">Transgender</option>
            <option value="Rather Not Say">Rather Not Say</option>
            </select>
            </div>
            </div>
            </div>
            </div>


            <div class="col-md-6 mt-2">
            <p class="text-man text-color-g">&nbsp;Enter Message</p>
            <div class="col-md-12 m-t-1">
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>  
            <textarea class="form-control" maxlength="400" rows="8" id="message" name="message" spellcheck="false" placeholder="Enter Message" required=""oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"><?php echo $getVolunData->address?$getVolunData->address:'';?></textarea>
            <!-- <input type="text" class="form-control border-left-end" maxlength="100" name="slider_text" id="slider_text" placeholder="Enter Your text.." required=""> -->
            <div class="invalid-feedback">Please Enter Your text.
            </div>
            </div>
            </div>
            </div>
             </div>

            <div class="col-md-6 mt-4">
              <div id="uploadArea" class="upload-area" style="padding:0rem 0.6rem!important;border-radius:0px;">
            <!-- Header -->
            <div class="upload-area__header"style="padding:0.1rem 0rem;">
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
            <p class="drop-zoon__paragraph text-success"> <?php echo $getVolunData->image ? '<img src="' . base_url($getVolunData->image) . '" alt="" style="height:4rem;">' : 'Drop your file here or Click to browse'; ?></p>
            <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
            <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
            <input type="file" id="fileInput" name="previewImage" class="drop-zoon__file-input" accept="image/*">
            </div>
            <!-- End Drop Zoon -->
            <span id="updateMessage">&nbsp;&nbsp;</span>
            <!-- File Details -->
            <div id="fileDetails" class="upload-area__file-details file-details">
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
            <!-- End File Details -->   
            </div> 
            </div>
<!-- -------------------------------  -->
            </div>

            <div class="row mt-4">
            <div class="col-md-5"></div>
            <div class="col-md-2">
            <button type="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
            </div>
            <div class="col-md-5"></div>
            </div>

            <!-- End Upload Area -->
            </div>
            </div>
</form>
<!-- ============================================== Volunteer section end ================================== -->
</div>

                 
<!-- --------------------------- News List Section Start -------------------  -->
</div>
</div>
</div>
</div>      
</div> 

      <style>
           .sRvDeactive {
           padding: 4px 8px 4px 8px;
           background-color: #EE4B5C4F;
           color: #EE4B5C;
           border-radius: 3px;
           cursor: pointer;
           font-size: .8rem;
         }
         .sRvActive {
           padding: 4px 15px 4px 15px;
           background-color: #0AC89024;
           color: #009569;
           border-radius: 3px;
           cursor: pointer;
           font-size: .8rem;
         }
         .sRvSuspnd {
           padding: 4px 8px 4px 8px;
           background-color: #FF9F003D;
           color: #9D6200;
           border-radius: 3px;
           cursor: pointer;
           font-size: .8rem;
         }
         </style>


      <script src="<?php echo base_url('assets/js/admin/employee.js') ?>"></script>

        <script>
        $(document).ready(function () {
        $("#updateVolunteer").on("submit", function (e) {
        let base_url = $(this).attr('data-id');
        e.preventDefault(); 
        $.ajax({
            type: "POST",
            url: base_url,
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            dataType:'json',
            success: function (htmlAmi) 
            {
              toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
              if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.href = htmlAmi.returnLoc ; }, 2000); }
             }
            }); });});


    </script>
