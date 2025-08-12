
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
          <!-- ============================================ Banner section start ================================== -->
          <form id="create_event" data-id="<?php echo $targetItem;?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
   
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"> 
                
            <!-- Upload Area -->               
            <div id="uploadArea" class="upload-area">
            <!-- Header -->
            <div class="upload-area__header">
            <h1 class="upload-area__title">Upload your file</h1>
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
            <p class="drop-zoon__paragraph text-success"><img src="<?php echo base_url($event_data->e_images);?>" style="height:4rem;" alt=""></p>
            <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
            <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
            <input type="file" id="fileInput" name="previewImage" class="drop-zoon__file-input" accept="image/*">
            </div>
            <!-- End Drop Zoon -->
             
            <span id="updateMessage">&nbsp;&nbsp;</span>

            <div class="row mt-2">
            <div class="col-md-12">
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-link text-color"></i> </span>
            <input type="text" class="form-control border-left-end" name="slider_heading" id="slider_heading" value="<?php echo $event_data->e_heading?$event_data->e_heading:'';?>" placeholder="Enter Heading.." required="">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            </div>

            <div class="row mt-2">
            <div class="col-md-12">
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-link text-color"></i> </span>  
            <textarea class="form-control" maxlength="400" rows="4" id="slider_text" name="slider_text" spellcheck="false" required=""><?php echo $event_data->e_text?$event_data->e_text:'';?></textarea>
            <input type="hidden" class="form-control border-left-end" name="id" id="id" value="<?php echo $event_data->id;?>">
            <div class="invalid-feedback">Please Enter Your text.
            </div>
            </div>
            </div>
            </div>
            </div>

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
            <!-- End File Details -->   
           
            <button type="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
            
            </div>         
            <!-- End Upload Area -->
            </div>
            <div class="col-md-2"></div>
            </div>
            </form>
    <!-- ============================================== Banner section end ================================== -->
 
      </div>
      </div>
      </div>
      </div>
      </div>      
      </div> 


      <!-- ======================================= Model Sectioin Start =================================  -->
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
<!-- ========================================== Model Section End  rk-spin ==============================  -->



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
         .text-color{color:#006f75;}
         </style>

<script src="<?php echo base_url('assets/js/employee/front_cms/event.js') ?>"></script>

