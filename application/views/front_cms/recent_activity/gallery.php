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
      <li class="nav-item py-1"> <span class="btn btn-outline-primary" id="banner_section"><i class="la la-plus text-primary"></i>&nbsp;&nbsp;Create Media / Gallery </span>      
      </li>
      </ul>
      </div>
      </div>
      <div class="card-body">
      <div class="basic-form" id="bannerCreate_sec">
          <!-- ============================================ Banner section start ================================== -->
          <form id="create_gallery" data-id="<?php echo $galleryItem;?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
   
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
            <p class="drop-zoon__paragraph text-success">Drop your file here or Click to browse</p>
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
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            <input type="text" class="form-control border-left-end" name="user_name" id="user_name" placeholder="Enter User Name" required="">
            <div class="invalid-feedback">Please Enter Heading.
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

                 
            <!-- --------------------------- News List Section Start -------------------  -->
            <div class="tab-content" id="banner_list">
              <div class="tab-pane fade active show" id="allMembers" role="tabpanel">
                <div class="table-responsive">
                  <table id="galleryList" data-id="<?php echo $targetList;?>" class="table table-hover table-responsive-sm mb-0">
                    <thead class="thead-arvDef">
                      <tr>
                        <th><strong>S.No</strong></th>
                        <th><strong>Date</strong></th>
                        <th><strong>Heading</strong></th>
                        <th><strong>Banner Image</strong></th>
                        <th style="width:85px;"><strong>Actions</strong></th>
                      </tr>
                    </thead>  
                  </table>
                </div>
              </div>
              <!-- --------------------------- News List Section End -------------------  -->

      </div>
      </div>
      </div>
      </div>
      </div>      
      </div> 

      <script src="<?php echo base_url('assets/js/admin/employee.js') ?>"></script>

        <script>
        $(document).ready(function() {
        $("#bannerCreate_sec").hide();
        $("#banner_section").on("click", function() {
        $("#bannerCreate_sec").toggle();
        $("#banner_list").toggle();
        });
        });
        $(document).ready(function () {
        $("#create_gallery").on("submit", function (e) {
        let base_url = $(this).attr('data-id');
        e.preventDefault(); 
        $.ajax({type: "POST",url: base_url,data: new FormData(this),processData: false,
        contentType: false,cache: false,dataType:'json',success: function (htmlAmi) {
        toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
        if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.reload(1); }, 2000); }
        }, }); });});
        var galleryListData = '';$(document).ready(function() {
        let searchObj = {};var targetAction = $('#galleryList').attr('data-id');
        galleryListData = {printTable: function(search_data) {
        getpaginate(search_data, '#galleryList', targetAction, 'Only For Tnx id, Month.');
        }};galleryListData.printTable(searchObj);});

    </script>
