

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
      <div class="basic-form">
<!-- ============================================ Expense section start ================================== -->

<form id="create" data-id="<?php echo $targetItem;?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 mb-5">
                  <div class="row mt-4">
                    <div class="col-md-6">
                      <p class="text-man text-dark text-color-g">&nbsp;Select One</p>
                      <div class="mb-3 mt_1">
                        <div class="input-group"> <span class="input-group-text text-color-g"> <i class="fa fa-link"></i> </span>
                          <select class="form-control form-control-lg icon-color" id="chooseWork" name="chooseWork">
                            <option value="Default">Select One</option>
                            <option value="1">Project</option>
                            <option value="2">Program</option>
                            <option value="3">Event</option>
                            <option value="4">other</option>
                          </select>
                          <div class="invalid-feedback">Please Enter Heading. </div>
                        </div>
                      </div>
                    </div> 
                    <div class="col-md-6" id="projectSection" style="display:none;">
                      <p class="text-man text-dark text-color-g">&nbsp;Project Name</p>
                      <div class="mb-3 mt_1">
                        <div class="input-group"> <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
                          <select class="form-control form-control-lg" id="projectName" name="projectName">
                            <option value="default">Select Project</option>
                            <?php foreach ($project as $project): ?>
                            <option value="<?php echo $project['id']; ?>"><?php echo $project['project_name']; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">Please Enter Heading. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" id="programSection" style="display:none;">
                      <p class="text-man text-c-g text-color-g">&nbsp; Select Program</p>
                      <div class="mb-3 mt_1">
                        <div class="input-group"> <span class="input-group-text icon-color"> <i class="fa fa-link text-color-g"></i> </span>
                          <select class="form-control form-control-lg" id="programName" name="programName">
                            <option value="">Select Program</option>
                            <?php foreach ($allProgram as $program): ?>
                            <option value="<?php echo $program['id']; ?>"><?php echo $program['program_name']; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">Please Enter Heading. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" id="eventSection" style="display:none;">
                      <div class="mb-3">
                        <p class="text-man text-dark text-color-g">Event Name</p>
                        <div class="input-group mt_1"> <span class="input-group-text icon-color"> <i class="fa fa-link text-color-g"></i> </span>
                          <input type="type" class="form-control border-left-end" name="eventManage" id="eventManage" placeholder="Event Name">
                          <div class="invalid-feedback">Please Enter Heading. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" id="otherSection" style="display:none;">
                      <p class="text-man text-dark text-color-g">&nbsp;Other Expense</p>
                      <div class="mb-3 mt_1">
                        <div class="input-group"> <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
                          <select class="form-control form-control-lg" id="expenseId" name="expenseId">
                            <option value="default">Select Project</option>
                            <?php foreach ($allExpense as $expense): ?>
                            <option value="<?php echo $expense['id']; ?>"><?php echo $expense['expense_name']; ?></option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">Please Enter Heading. </div>
                        </div>
                      </div>
                    </div>

                  

                    <div class="col-md-6">
                      <div class="mb-3">
                        <p class="text-man text-dark text-color-g">Expense Date</p>
                        <div class="input-group mt_1"> <span class="input-group-text icon-color"> <i class="fa fa-calendar text-color-g"></i> </span>
                        <input type="text" class="form-control border-left-end" name="s_date" id="s_date" placeholder="Select Start Date" value="<?php echo $expenseData->created_at?$expenseData->created_at:'';?>">
                          <div class="invalid-feedback">Please Enter Heading. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <p class="text-man text-dark text-color-g">&nbsp;Payment Method</p>
                      <div class="mb-3 mt_1">
                        <div class="input-group"> <span class="input-group-text icon-color"> <i class="fa fa-inr text-color-g"></i> </span>
                          <select class="form-control form-control-lg" id="paymentMethod" name="paymentMethod">
                            <option value="Default">Select Project</option>
                            <option value="1">Cheque </option>
                            <option value="2">UPI Number</option>
                            <option value="3">Cash</option>
                          </select>
                          <div class="invalid-feedback">Please Enter Heading. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" id="recSection" style="display:none;">
                      <div class="mb-3">
                        <p class="text-man text-dark text-color-g">Enter Receiver  Name</p>
                        <div class="input-group mt_1"> <span class="input-group-text icon-color"> <i class="fa fa-user text-color-g"></i> </span>
                          <input type="text" class="form-control border-left-end" name="rec_name" id="rec_name" placeholder="Receiver Name">
                          <input type="hidden" class="form-control border-left-end" name="id" id="id" value="<?php echo $expenseData->id?$expenseData->id:'';?>">
                          <div class="invalid-feedback">Please Enter Heading. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" id="recMobNumSec" style="display:none;">
                      <div class="mb-3">
                        <p class="text-man text-dark text-color-g">Receiver Mobile No</p>
                        <div class="input-group mt_1"> <span class="input-group-text icon-color"> <i class="fa fa-phone text-color-g"></i> </span>
                          <input type="text" class="form-control border-left-end" name="number" id="number" placeholder="Receiver Mobile Number">
                          <div class="invalid-feedback">Please Enter Heading. </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <p class="text-man text-dark text-color-g">Amount</p>
                      <div class="mb-3 mt_1">
                        <div class="input-group"> <span class="input-group-text icon-color"> <i class="fa fa-inr text-color-g"></i> </span>
                          <input type="text" class="form-control border-left-end" name="proAmount" id="proAmount" placeholder="Enter  Amount" value="<?php echo $expenseData->amount?$expenseData->amount:'';?>">
                          <div class="invalid-feedback">Please Enter Heading. </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mt-2">
                      <p class="text-man text-dark text-color-g">&nbsp;Enter Message</p>
                      <div class="mb-3 mt_1">
                        <div class="input-group"> <span class="input-group-text icon-color"> <i class="fa fa-link text-color-g"></i> </span>
                          <textarea class="form-control" maxlength="400" rows="9" id="message" name="message" spellcheck="false" placeholder="Enter Message" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"><?php echo $expenseData->message?$expenseData->message:'';?></textarea>
                          <!-- <input type="text" class="form-control border-left-end" maxlength="100" name="slider_text" id="slider_text" placeholder="Enter Your text.."> -->
                          <div class="invalid-feedback">Please Enter Your text. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <p class="text-man text-dark text-color-g">&nbsp;Upload Payment screenshot.</p>
                      <div id="uploadArea" class="upload-area"style="border-radius:0px!important;">
                        <!-- Header -->
                        <div class="upload-area__header">
                          <h5>Upload your file</h5>
                          <p class="upload-area__paragraph text-danger"style="margin-top:-0.5rem;">File should be an image <strong class="upload-area__tooltip">Like <span class="upload-area__tooltip-data"></span>
                            <!-- Data Will be Comes From Js -->
                            </strong> </p>
                        </div>
                        <!-- End Header -->
                        <!-- Drop Zoon -->
                        <div id="dropZoon" class="upload-area__drop-zoon drop-zoon"style="height:4.25rem!important;margin-top:-0.5rem;"> <span class="drop-zoon__icon"> <i class='bx bxs-file-image'></i> </span>
                          <p class="drop-zoon__paragraph text-success"> <img src="<?php echo $expenseData->expense_proof ? base_url($expenseData->expense_proof) : 'Drop your file here or Click to browse'; ?>" alt="Expense Proof"style="height:4rem;"></p>
                          <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span> <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
                          <input type="file" id="fileInput" name="previewImage" class="drop-zoon__file-input" accept="image/*">
                        </div>
                        <!-- End Drop Zoon -->
                        <span id="updateMessage">&nbsp;&nbsp;</span>
                        <!-- File Details -->
                        <div id="fileDetails" class="upload-area__file-details file-details">
                          <h3 class="file-details__title">Uploaded File</h3>
                          <div id="uploadedFile" class="uploaded-file">
                            <div class="uploaded-file__icon-container"> <i class='bx bxs-file-blank uploaded-file__icon'></i> <span class="uploaded-file__icon-text"></span>
                              <!-- Data Will be Comes From Js -->
                            </div>
                            <div id="uploadedFileInfo" class="uploaded-file__info"> <span class="uploaded-file__name">Proejct 1</span> <span class="uploaded-file__counter">0%</span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-5"></div>
                  <div class="col-md-7">
                    <button type="submit" name="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
                  </div>
                </div>
              </div>
            </form>
     
<!-- ============================================== Expense section end ================================== -->
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
        .text-color-g{color:rgb(0, 111, 117) !important;}
        .mt_1{margin-top:-1rem;}
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

         #picture__input {
  display: none;
}

.picture {
  width: 100%;
  height:4rem;
  aspect-ratio: 16/9;
  background: rgba(173, 240, 236, 0.4);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #aaa;
  border: 2px dashed currentcolor;
  cursor: pointer;
  font-family: sans-serif;
  transition: color 300ms ease-in-out, background 300ms ease-in-out;
  outline: none;
  overflow: hidden;
}

.picture:hover {
  color: #777;
  background: rgba(173, 240, 236, 0.6);;
}

    .picture:active {
      border-color: turquoise;
      color: turquoise;
      background: #eee;
    }

    .picture:focus {
      color: #777;
      background: #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .picture__img {
      max-width: 100%;
    }

         
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
        $("#create").on("submit", function (e) {
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
              if(htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.href = htmlAmi.returnLoc ; }, 2000); }
             }
            }); });});




            $(document).ready(function() {
    $("#chooseWork").change(function() {
        var value = $(this).val();
        if (value == "1") {
            $("#projectSection").show();
            $("#programSection, #eventSection, #otherSection").hide();
        } else if (value == "2") {
            $("#programSection").show();
            $("#projectSection, #eventSection, #otherSection").hide();
        } else if (value == "3") {
            $("#eventSection").show();
            $("#projectSection, #programSection, #otherSection").hide();
        } else if (value == "4") {
            $("#otherSection").show();
            $("#projectSection, #programSection, #eventSection").hide();
        }
    });
});


$(document).ready(function() {
    $("#paymentMethod").change(function() {
        var value = $(this).val();
        if (value == "3") {
            $("#recSection, #recMobNumSec").show();
        } else if (value == "2") {
            $("#recMobNumSec").show();
        }
    });
});


     var targetExpenseItem = '';            
     $(document).ready(function() {
     let searchObj = {};
     var targetAction = $('#expenseList').attr('data-id');
     targetExpenseItem = {
     printTable: function(search_data) {
     getpaginate(search_data, '#expenseList', targetAction, 'Only For Tnx id, Month.');
     }
     };
     targetExpenseItem.printTable(searchObj);           
     });


const inputFile = document.querySelector("#picture__input");
const pictureImage = document.querySelector(".picture__image");
const pictureImageTxt = "Choose an Program image";
pictureImage.innerHTML = pictureImageTxt;

inputFile.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;

      const img = document.createElement("img");
      img.src = readerTarget.result;
      img.classList.add("picture__img");

      pictureImage.innerHTML = "";
      pictureImage.appendChild(img);
    });

    reader.readAsDataURL(file);
  } else {
    pictureImage.innerHTML = pictureImageTxt;
  }
});



    </script>


<script>
$(document).ready(function() {
    $('#s_date').datepicker({
        dateFormat: 'mm/dd/yy' 
    });
    $('#s_date').click(function() {
        $(this).datepicker('show');
    });
});
</script>



