
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
    <!-- ============================================ Project section start ================================== -->


    <form id="updateData" data-id="<?php echo $targetItem?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">              
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 mb-5"> 

            <div class="row mt-4">
            <div class="col-md-6">
            <p class="text-man text-dark">&nbsp;Select Program</p>
            <div class="mb-3">
            <div class="input-group">  
            <span class="input-group-text icon-color"> <i class="fa fa-users"></i> </span>
            <select class="form-control form-control-lg" id="program_name" name="program_name">
            <option value="default">Select Program</option>
            <?php foreach ($getProgram as $program): ?>
            <option value="<?php echo $program['id']; ?>" <?php echo $program['id'] == $programDetails->program_name ? 'Selected' : ''; ?>><?php echo $program['program_name']; ?></option>
            <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-6">
            <p class="text-man text-dark">&nbsp;Select Employee</p>
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-users"></i> </span>
            <select class="form-control form-control-lg" id="employee_id" name="employee_id">
            <option value="default">Select Project</option>
            <?php foreach ($allEmpLIst as $empList): ?>
            <option value="<?php echo $empList['id']; ?>" <?php echo $empList['id'] == $programDetails->emp_id ? 'Selected' : ''; ?>> <?php echo $empList['first_name'].'  '.$empList['last_name']; ?> </option>
            <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-6">
            <div class="mb-3">
            <p class="text-man text-dark"> Start date</p>
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-envelope"></i> </span>
            <input type="date" class="form-control border-left-end" name="s_date" id="s_date" value="<?php echo $programDetails->start_date;?>" required="">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-6">
            <div class="mb-3">
            <p class="text-man text-dark"> End date</p>
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-mobile"></i> </span>
            <input type="date" class="form-control border-left-end" name="end_date" value="<?php echo $programDetails->end_date;?>" id="end_date">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-6">
            <p class="text-man text-dark">&nbsp;Enter Location</p>
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-users"></i> </span>
            <input type="text" class="form-control border-left-end" name="location" id="location" value="<?php echo $programDetails->location;?>" placeholder="Enter Location.." oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <input type="hidden" class="form-control border-left-end" name="id" id="id"; value="<?php echo $programDetails->id;?>">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-6">
            <p class="text-man text-dark">&nbsp;Enter Amount</p>
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-users"></i> </span>
            <input type="text" class="form-control border-left-end" name="amount" id="amount" value="<?php echo $programDetails->amount;?>" placeholder="Enter Amount..">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
           
            </div>

            <div class="row">
            <div class="col-md-6 mt-2">
            <div class="mb-3">
            <p class="text-man text-dark">&nbsp; Enter Message</p>
            <div class="input-group">
            <span class="input-group-text icon-color"> <i class="fa fa-address-card"></i> </span>  
            <textarea class="form-control" maxlength="400" rows="9" id="text" name="text" spellcheck="false"  value="<?php echo $programDetails->message;?>"  oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">Enter Your text..</textarea>
            <!-- <input type="text" class="form-control border-left-end" maxlength="100" name="slider_text" id="slider_text" placeholder="Enter Your text.." required=""> -->
            <div class="invalid-feedback">Please Enter Your text.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-6">
            <p class="text-man text-dark">&nbsp;Upload the project screenshot.</p>
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
            <p class="drop-zoon__paragraph text-success"><img src="<?php echo base_url() . $programDetails->images; ?>" alt="" style="height:4rem;">
            </p>
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

            <!-- =================================== Status Model section End ======================== -->
    <div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
         <div class="modal-body">
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
         <div class="delMsg"><i class="fe fe-sliders"></i><span><i class="fas fa-gear fa-spin" style="font-size:14px;color:#6a4343;"></i></span><span style="color:#6a4343;"> Manage Status</span></div>
         <div class="actnData py-2"> Are you sure want to activate of Shift ID #F33333</div>
         <div id="mdlFtrBtn">
         <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfChangesStatus" data-id="@misingh143">
         Confirm <i class="si si-check"></i>
         </button>
         <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal" style="margin-right:10px;">
         <i class="fa fa-arrow-left"></i> Back 
         </button>   
         </div>	
         </div>
         </div>
         </div>
    </div>
<!-- =================================== Status Model section End ======================== -->



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


     var targeteventList_item = '';            
     $(document).ready(function() {
     let searchObj = {};
     var targetAction = $('#targetSection').attr('data-id');
     targeteventList_item = {
     printTable: function(search_data) {
     getpaginate(search_data, '#targetSection', targetAction, 'Only For Tnx id, Month.');
     }
     };
     targeteventList_item.printTable(searchObj);           
     });

    </script>
