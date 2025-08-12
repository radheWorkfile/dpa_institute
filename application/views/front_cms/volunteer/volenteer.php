
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
      <li class="nav-item py-1"> <span class="btn btn-outline-primary" id="banner_section"><i class="la la-plus text-primary"></i>&nbsp;&nbsp;Create Volunteer</span>      
      </li>
      </ul>
      </div>
      </div>
      <div class="card-body">
      <div class="basic-form" id="bannerCreate_sec"> 
      
<!-- ============================================ Volunteer section start ================================== -->
<form id="create_volunteer" data-id="<?php echo $targetItem;?>"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
<div class="row">
            <div class="col-md-12"> 

            <div class="row mt-2">
            <div class="col-md-4">
            <div class="mb-3">
            <p class="text-man text-color-g">&nbsp;Enter Name</p>
            <div class="input-group m-t-1">
            <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="name" id="name" placeholder="Enter Name.." required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
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
            <input type="email" class="form-control border-left-end" name="email" id="email" placeholder="Enter Email-Id.." required="">
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
            <input type="text" class="form-control border-left-end" name="mobile" id="mobile" placeholder="Enter Mobile.." required="" maxlength="10" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')">
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
            <input type="text" class="form-control border-left-end" name="address" id="address" placeholder="Enter Address.." required="" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
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
            <input type="date" class="form-control border-left-end" name="joining_date" id="joining_date" placeholder="Enter Heading.." required="">
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
            <textarea class="form-control" maxlength="400" rows="8" id="message" name="message" spellcheck="false" placeholder="Enter Message" required=""oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"></textarea>
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
<!-- ============================================== Volunteer section end ================================== -->
</div>

                 
<!-- --------------------------- News List Section Start -------------------  -->
<div class="tab-content" id="banner_list">
  <div class="tab-pane fade active show" id="allMembers" role="tabpanel">
    <div class="table-responsive">
      <table id="targetSection" data-id="<?php echo $targetList; ?>" class="table table-hover table-responsive-sm mb-0">
        <thead class="thead-arvDef">
          <tr>
            <th class="text-center"><strong>S.No</strong></th>
            <th class="text-center"><strong>Volunteer ID</strong></th>
            <th class="text-center"><strong>Name</strong></th>
            <th class="text-center"><strong>MObile</strong></th>
            <th class="text-center"><strong>email</strong></th>
            <th class="text-center"><strong>Address</strong></th>
            <th class="text-center"><strong>Status</strong></th>
            <th class="text-center"><strong>Actions</strong></th> 
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


<!-- ======================================= Model Sectioin Start =================================  -->
<div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
            <div class="delMsg text-success"><i class="fas fa-gear fa-spin"></i> Volunteer Status</div>
                <div class="actnData"><i class="si si-power"></i>  Are you sure want to activate of Shift ID #F33333</div>
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
<!-- ========================================== Model Section End ==============================  -->

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
         .text-color-g{color:green;}
         .m-t-1{margin-top:-1rem;}
         </style>


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
        $("#create_volunteer").on("submit", function (e) {
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
