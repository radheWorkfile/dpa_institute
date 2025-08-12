<!-- previewImage -->

<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title text-white"><?php echo $title; ?></h4>
          </div>
          <div class="card-body">
            <div class="basic-form">
              <!-- ============================================ Project section start ================================== -->
              <form id="create" data-id="<?php echo $targetItem; ?>" method="post" accept-charset="utf-8"
                enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10 mb-5">
                    <div class="row mt-4">
                      <div class="col-md-6">
                        <p class="text-man text-dark text-color-g">&nbsp;Select One</p>
                        <div class="mb-3">
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-link"></i> </span>
                            <select class="form-control form-control-lg" id="chooseWork" name="chooseWork">
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
                        <p class="text-man text-dark text-color-g">&nbsp;Enter Project Name</p>
                        <div class="mb-3">
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-link"></i> </span>
                            <select class="form-control form-control-lg" id="projectName" name="projectName">
                              <option value="default">Select Project</option>
                              <?php foreach ($project as $project): ?>
                                <option value="<?php echo $project['id']; ?>"><?php echo $project['project_name']; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Please Enter Heading. </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6" id="programSection" style="display:none;">
                        <p class="text-man text-c-g">&nbsp; Select Program</p>
                        <div class="mb-3">
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-link"></i> </span>
                            <select class="form-control form-control-lg" id="programName" name="programName">
                              <option value="">Select Program</option>
                              <?php foreach ($allProgram as $program): ?>
                                <option value="<?php echo $program['id']; ?>"><?php echo $program['program_name']; ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Please Enter Heading. </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6" id="eventSection" style="display:none;">
                        <div class="mb-3">
                          <p class="text-man text-dark text-color-g">Enter Event Name</p>
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-link"></i> </span>
                            <input type="type" class="form-control border-left-end" name="eventManage" id="eventManage"
                              placeholder="Event Name">
                            <div class="invalid-feedback">Please Enter Heading. </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6" id="otherSection" style="display:none;">
                        <div class="mb-3">
                          <p class="text-man text-dark text-color-g">Enter Work Name</p>
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-link"></i> </span>
                            <input type="text" class="form-control border-left-end" name="otherWork" id="otherWork"
                              placeholder="Enter Wrok Name">
                            <div class="invalid-feedback">Please Enter Heading. </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <p class="text-man text-dark text-color-g">&nbsp;Select Employee</p>
                        <div class="mb-3">
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-user"></i> </span>
                            <select class="form-control form-control-lg" id="employee_id" name="employee_id">
                              <option value="default">Select One</option>
                              <?php foreach ($allEmpLIst as $empList): ?>
                                <option value="<?php echo $empList['id']; ?>" <?php echo $empList['id'] == $workDetails->emp_id ? 'selected' : ''; ?>>
                                  <?php echo $empList['first_name'] . ' ' . $empList['last_name']; ?></option>
                              <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">Please Enter Heading. </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <p class="text-man text-dark text-color-g">Date</p>
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-envelope"></i> </span>
                            <input type="date" class="form-control border-left-end" name="s_date" id="s_date"
                              value="<?php echo $workDetails->start_date; ?>">
                            <input type="hidden" class="form-control border-left-end" name="id" id="id"
                              value="<?php echo $workDetails->id; ?>">
                            <div class="invalid-feedback">Please Enter Heading. </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <p class="text-man text-dark text-color-g">&nbsp;Payment Method</p>
                        <div class="mb-3">
                          <div class="input-group"> <span class="input-group-text icon-color"> <i class="fa fa-inr"></i>
                            </span>
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
                          <p class="text-man text-dark text-color-g">Enter Receiver Name</p>
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-user"></i> </span>
                            <input type="text" class="form-control border-left-end" name="rec_name" id="rec_name"
                              placeholder="Receiver Name">
                            <div class="invalid-feedback">Please Enter Heading. </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6" id="recMobNumSec" style="display:none;">
                        <div class="mb-3">
                          <p class="text-man text-dark text-color-g">Receiver Mobile No</p>
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-phone"></i> </span>
                            <input type="text" class="form-control border-left-end" name="number" id="number"
                              placeholder="Receiver Mobile Number">
                            <div class="invalid-feedback">Please Enter Heading. </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <p class="text-man text-dark text-color-g">Enter Location</p>
                        <div class="mb-3">
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-address-card"></i> </span>
                            <input type="text" class="form-control border-left-end" name="location" id="location"
                              value="<?php echo $workDetails->location ? $workDetails->location : ''; ?>"
                              placeholder="Enter Location.."
                              oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
                            <div class="invalid-feedback">Please Enter Heading. </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <p class="text-man text-dark text-color-g">Project Amount</p>
                        <div class="mb-3">
                          <div class="input-group"> <span class="input-group-text icon-color"> <i class="fa fa-inr"></i>
                            </span>
                            <input type="text" class="form-control border-left-end" name="proAmount" id="proAmount"
                              placeholder="Enter  Amount"
                              value="<?php echo $workDetails->amount ? '₹ ' . $workDetails->amount . '.00' : ''; ?>">
                            <div class="invalid-feedback">Please Enter Heading. </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 mt-2">
                        <p class="text-man text-dark text-color-g">&nbsp;Enter Message</p>
                        <div class="mb-3">
                          <div class="input-group"> <span class="input-group-text icon-color"> <i
                                class="fa fa-link"></i> </span>
                            <textarea class="form-control" maxlength="400" rows="9" id="message" name="message"
                              spellcheck="false" placeholder="Enter Message"
                              oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"><?php echo $workDetails->message ? $workDetails->message : ''; ?></textarea>
                            <!-- <input type="text" class="form-control border-left-end" maxlength="100" name="slider_text" id="slider_text" placeholder="Enter Your text.."> -->
                            <div class="invalid-feedback">Please Enter Your text. </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <p class="text-man text-dark text-color-g">&nbsp;Upload Payment screenshot.</p>
                        <div id="uploadArea" class="upload-area" style="border-radius:0px!important;">
                          <!-- Header -->
                          <div class="upload-area__header">
                            <h5>Upload your file</h5>
                            <p class="upload-area__paragraph text-danger" style="margin-top:-0.5rem;">File should be an
                              image <strong class="upload-area__tooltip">Like <span
                                  class="upload-area__tooltip-data"></span>
                                <!-- Data Will be Comes From Js -->
                              </strong> </p>
                          </div>
                          <!-- End Header -->
                          <!-- Drop Zoon -->
                          <div id="dropZoon" class="upload-area__drop-zoon drop-zoon"
                            style="height:4.25rem!important;margin-top:-0.5rem;"> <span class="drop-zoon__icon"> <i
                                class='bx bxs-file-image'></i> </span>
                            <p class="drop-zoon__paragraph text-success">Drop your file here or Click to browse</p>
                            <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span> <img src=""
                              alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
                            <input type="file" id="fileInput" name="previewImage" class="drop-zoon__file-input"
                              accept="image/*">
                          </div>
                          <!-- End Drop Zoon -->
                          <span id="updateMessage">&nbsp;&nbsp;</span>
                          <!-- File Details -->
                          <div id="fileDetails" class="upload-area__file-details file-details">
                            <h3 class="file-details__title">Uploaded File</h3>
                            <div id="uploadedFile" class="uploaded-file">
                              <div class="uploaded-file__icon-container"> <i
                                  class='bx bxs-file-blank uploaded-file__icon'></i> <span
                                  class="uploaded-file__icon-text"></span>
                                <!-- Data Will be Comes From Js -->
                              </div>
                              <div id="uploadedFileInfo" class="uploaded-file__info"> <span
                                  class="uploaded-file__name">Proejct 1</span> <span
                                  class="uploaded-file__counter">0%</span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col-md-5"></div>
                    <div class="col-md-7">
                      <button type="submit" name="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i
                          class="fa fa-save"></i> Update</button>
                    </div>
                  </div>
                </div>
              </form>
              <!-- ============================================== Project section end ================================== -->
            </div>
            <!-- --------------------------- News List Section Start -------------------  -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- =================================== Status Model section End ======================== -->
  <div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel"
    style=" padding-left: 0px;" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i
              class="si si-close"></i></button>
          <div class="delMsg"><i class="fe fe-sliders"></i><span><i class="fas fa-gear fa-spin"
                style="font-size:14px;color:#6a4343;"></i></span><span style="color:#6a4343;"> Manage Status</span>
          </div>
          <div class="actnData py-2"> Are you sure want to activate of Shift ID #F33333</div>
          <div id="mdlFtrBtn">
            <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction"
              id="cnfChangesStatus" data-id="@misingh143"> Confirm <i class="si si-check"></i> </button>
            <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal"
              style="margin-right:10px;"> <i class="fa fa-arrow-left"></i> Back </button>
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

    .text-man {
      margin-bottom: -0.1rem;
    }

    .icon-color {
      color: #006f75;
    }

    .text-color-g {
      color: #006f75;
    }
  </style>
  <!-- <script src="<?php echo base_url('assets/js/admin/manage_work.js') ?>"></script> -->
  <!-- chooseWork   -->
  <!-- projectName  programName   event  otherWork -->
  <script>

    $(document).ready(function () {
      $("#create").submit(function (e) {
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
          dataType: 'json',
          success: function (htmlAmi) {
            toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
            if (htmlAmi.addClas == 'tSuccess') { setTimeout(function () { window.location.href = htmlAmi.returnLoc; }, 2000); }
          }
        });
      });
    });


    $(document).ready(function () {
      $("#chooseWork").change(function () {
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


    $(document).ready(function () {
      $("#paymentMethod").change(function () {
        var value = $(this).val();
        if (value == "3") { $("#recSection, #recMobNumSec").show() }
      });
    });


    $(document).ready(function () {
      $("#bannerCreate_sec").hide();
      $("#banner_section").on("click", function () {
        $("#bannerCreate_sec").toggle();
        $("#banner_list").toggle();
      });
    });

    var targeteventList_item = '';
    $(document).ready(function () {
      let searchObj = {};
      var targetAction = $('#targetSection').attr('data-id');
      targeteventList_item = {
        printTable: function (search_data) {
          getpaginate(search_data, '#targetSection', targetAction, 'Only For Tnx id, Month.');
        }
      };
      targeteventList_item.printTable(searchObj);
    });

  </script>