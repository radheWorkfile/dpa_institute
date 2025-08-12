
<!-- previewImage -->
<div class="content-body">
      <div class="container-fluid">
      <div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card">
      <div class="card-header">
      <h4 class="card-title text-white"><?php echo $title;?></h4>
      <div class="card-action">
      <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item py-1"> <span class="btn btn-outline-primary" id="banner_section"><i class="la la-plus text-primary"></i>&nbsp;&nbsp;Create Project</span>      
      </li>
      </ul>
      </div>
      </div>
      <div class="card-body">
      <div class="basic-form" id="bannerCreate_sec">
    <!-- ============================================ Project section start ================================== -->


    <form id="updateData"  data-id="<?php echo $tergetItem;?>"  method="post" accept-charset="utf-8" enctype="multipart/form-data">              
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 mb-5"> 

            <div class="row mt-4">
            <div class="col-md-6">
            <div class="mb-3">
            <p class="text-man color-t-g">&nbsp;Enter Project Name</p>
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-users"></i> </span>
            <select class="form-control form-control-lg" id="projectName" name="projectName">
            <option value="default">Select Project</option>
            <?php foreach($getProject as $project): ?>
            <option value="<?php echo $project['id']; ?>"<?php echo $project['id'] == $protDet->project_name ? 'Selected' : ''; ?>>
            <?php echo $project['project_name']; ?>
            </option>
            <?php endforeach; ?>
            </select>

            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>


            <div class="col-md-6">
            <p class="text-man color-t-g">&nbsp;Select Employee</p>
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-users"></i> </span>
            <select class="form-control form-control-lg" id="employee_id" name="employee_id">
            <option value="default">Select One</option>
            <?php foreach ($allEmpLIst as $empList): ?>
            <option value="<?php echo $empList['id']; ?>" <?php echo $empList['id'] == $protDet->emp_id ? 'Selected' : ''; ?>><?php echo $empList['first_name'].'  '.$empList['last_name']; ?></option>
            <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-6">
            <div class="mb-3">
            <p class="text-man color-t-g">Choose Start date</p>
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-envelope"></i> </span>
            <input type="date" class="form-control border-left-end" value="<?php echo $protDet->start_date;?>" name="s_date" id="s_date" required="">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-6">
            <div class="mb-3">
            <p class="text-man color-t-g">Choose End date</p>
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-mobile"></i> </span>
            <input type="date" class="form-control border-left-end" value="<?php echo $protDet->end_date;?>" name="end_date" id="end_date">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            
            <div class="col-md-6">
            <div class="mb-3">
            <p class="text-man color-t-g">Enter Location</p>
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-users"></i> </span>
            <input type="hidden" class="form-control border-left-end" name="projId" id="projId" value="<?php echo $protDet->id;?>">
            <input type="text" class="form-control border-left-end" name="location" value="<?php echo $protDet->location;?>" id="location" placeholder="Enter Location.." oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-6">
            <p class="text-man color-t-g">Project Amount</p>
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-users"></i> </span>
            <input type="text" class="form-control border-left-end" value="<?php echo $protDet->amount;?>" name="proAmount" id="proAmount" placeholder="Enter Project Amount">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <div class="row">

            <div class="col-md-6 mt-2">
            <div class="mb-3">
            <p class="text-man color-t-g">&nbsp;Enter Message</p>
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-address-card"></i> </span>  
            <textarea class="form-control" maxlength="400" rows="9" id="text" name="text" spellcheck="false" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"><?php echo $protDet->message;?></textarea>
            <!-- <input type="text" class="form-control border-left-end" maxlength="100" name="slider_text" id="slider_text" placeholder="Enter Your text.." required=""> -->
            <div class="invalid-feedback">Please Enter Your text.
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-6">
            <p class="text-man color-t-g">&nbsp;Upload the project screenshot.</p>
            <div id="uploadArea" class="upload-area"style="border-radius:0px!important;">
            <!-- Header -->
            <div class="upload-area__header">
            <h5>Upload your file</h5>
            <p class="upload-area__paragraph text-danger"style="margin-top:-0.5rem;">File should be an image
            <strong class="upload-area__tooltip">Like
            <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
            </strong>
            </p>
            </div>
            <!-- End Header -->
            <!-- Drop Zoon -->
            <div id="dropZoon" class="upload-area__drop-zoon drop-zoon"style="height:4.25rem!important;margin-top:-0.5rem;">
            <span class="drop-zoon__icon">
            <i class='bx bxs-file-image'></i>
            </span>
            <p class="drop-zoon__paragraph text-success"><img src="<?php echo base_url() . $protDet->images; ?>" style="height:4rem;"></p>
            <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
            <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
            <input type="file" id="fileInput" name="previewImage" class="drop-zoon__file-input" accept="image/*">
            </div>
            <!-- End Drop Zoon -->
            <span id="updateMessage">&nbsp;&nbsp;</span>
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
            </div>

            </div>

            </div>
            <div class="row mb-5">
            <div class="col-md-5"></div>
            <div class="col-md-7">
            <button type="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
            </div>
            </div>

            </div>
            </form>

    <!-- ============================================== Project section end ================================== -->
      </div>
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
         .text-man{margin-bottom:-0.1rem;}
         .icon-color{color:#006f75;}
         .color-t-g{color:#006f75;}

         </style>


      <script src="<?php echo base_url('assets/js/admin/employee.js') ?>"></script>

        <script>
         $(document).ready(function () {
        $("#updateData").on("submit", function (e) {
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
               if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.reload(1); }, 2000); }
             }
            }); });});

    </script>
