
<!-- previewImage -->
<div class="content-body">
      <div class="container-fluid">
      <div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card">
      <div class="card-header">
      <h4 class="card-title"><?php echo $title;?></h4>
      </div>
      <div class="card-body">
      <div class="basic-form"> 
      
          <!-- ============================================ Volunteer section start ================================== -->

          <form id="create_volunteer" data-id="<?php echo $targetItem; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
   
            <div class="row">
            <div class="col-md-12"> 
            <div class="row mt-2">
            <div class="col-md-4">
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user text-color"></i> </span>
            <input type="text" class="form-control border-left-end" name="name" id="name" placeholder="Enter Name.." value="<?php echo $emp_detials->name?$emp_detials->name:'';?>" required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user text-color"></i> </span>
            <input type="email" class="form-control border-left-end" name="email" id="email" value="<?php echo $emp_detials->email?$emp_detials->email:'';?>" placeholder="Enter Email-Id.." required="">
            <input type="hidden" class="form-control border-left-end" name="id" id="id" value="<?php echo $emp_detials->id?$emp_detials->id:'';?>">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            <input type="text" class="form-control border-left-end" name="mobile" id="mobile" value="<?php echo $emp_detials->mobile?$emp_detials->mobile:'';?>" placeholder="Enter Mobile.." required="" maxlength="10" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            <input type="text" class="form-control border-left-end" name="address" id="address" value="<?php echo $emp_detials->address?$emp_detials->address:'';?>" placeholder="Enter Address.." required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            <input type="date" class="form-control border-left-end" name="joining_date" id="joining_date" value="<?php echo $emp_detials->date?$emp_detials->date:'';?>" placeholder="Enter Heading.." required="">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-4">
            <select id="gender" name="gender" class="form-control" tabindex="null">
            <option selected="">Choose Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Transgender">Transgender</option>
            <option value="Rather Not Say">Rather Not Say</option>
            </select>
            </div>


            <div class="col-md-6 mt-2">
            <div class="col-md-12">
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>  
            <textarea class="form-control" maxlength="400" rows="8" id="description" name="description" spellcheck="false" required=""oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"><?php echo $emp_detials->description?$emp_detials->description:'';?></textarea>
            <!-- <input type="text" class="form-control border-left-end" maxlength="100" name="slider_text" id="slider_text" placeholder="Enter Your text.." required=""> -->
            <div class="invalid-feedback">Please Enter Your text.
            </div>
            </div>
            </div>
            </div>
             </div>

            <div class="col-md-6">
            <!-- Upload Area -->               
            <div id="uploadArea" class="upload-area"style="padding:0rem 0.6rem!important;border-radius:0px;">
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
            <!-- <img src="<?php echo base_url($emp_details->image);?>" alt="" style="height:4rem;"> -->
            <p class="drop-zoon__paragraph text-success">Drop your file here or Click to browse</p>
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
    <!-- ============================================== Banner section end ================================== -->
      </div>
      </div>
      </div>
      </div>
      </div>      
      </div> 



      <style>
        .delMsg{margin-top:2rem;}
        .rk-spin{animation:rk-spin 2s infinite linear}@keyframes rk-spin{0%{transform:rotate(0deg)}100%{transform:rotate(359deg)}}
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
         .text-color{color:#006f75;}
         </style>  
     <script src="<?php echo base_url('assets/js/employee/front_cms/volenteer.js') ?>"></script>
    
