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
              <form id="create_employee" method="post" accept-charset="utf-8" data-id="<?php echo $createAction; ?>"
                enctype="multipart/form-data">
                <input type="hidden" id="arvActionTrgt" value="<?php echo $arvActionTrgt; ?>">
                <input type="hidden" id="actnOper" value="<?php echo $actnOper; ?>" name="actnOper">
                <div class="row">

                  <div class="col-md-4">
                    <p class="text-man text-color-g">&nbsp;First Name</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-user text-black"></i> </span>
                        <input type="text" class="form-control" placeholder="First Name" name="frstName" id="frstName"
                          oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')"
                          value="<?php if ($isMember) {
                                    echo ($isMember->first_name ? $isMember->first_name : "");
                                  } ?>">
                        <div class="invalid-feedback">Please Enter Heading.
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <p class="text-man text-color-g">&nbsp;Father Name</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-user text-black"></i> </span>
                        <input type="text" class="form-control" placeholder="Father Name" name="fatherName"
                          id="fatherName" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')"
                          value="<?php if ($isMember) {
                                    echo ($isMember->last_name ? $isMember->last_name : "");
                                  } ?>">
                        <div class="invalid-feedback">Please Enter Heading.
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <p class="text-man text-color-g">&nbsp;Gender</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-user text-black"></i> </span>
                        <div class="dropdown bootstrap-select form-control">
                          <select id="gender" name="gender" class="form-control">
                            <option selected="">Choose Gender</option>
                            <option value="Male" <?php if ($isMember) {
                                                    echo (($isMember->gender == 'Male') ? 'selected="selected"' : "");
                                                  } ?>>Male</option>
                            <option value="Female" <?php if ($isMember) {
                                                      echo (($isMember->gender == 'Female') ? 'selected="selected"' : "");
                                                    } ?>>Female</option>
                            <option value="Transgender" <?php if ($isMember) {
                                                          echo (($isMember->gender == 'Transgender') ? 'selected="selected"' : "");
                                                        } ?>>Transgender</option>
                            <option value="Rather Not Say" <?php if ($isMember) {
                                                              echo (($isMember->gender == 'Rather Not Say') ? 'selected="selected"' : "");
                                                            } ?>>Rather Not Say</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-4 mt-3">
                    <p class="text-man text-color-g">&nbsp;Email</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-envelope text-black"></i> </span>
                        <input type="email" class="form-control keyUpAction" id="email_id" name="email_id"
                          placeholder="Email Address"
                          value="<?php if ($isMember) {
                                    echo ($isMember->email_id ? $isMember->email_id : "");
                                  } ?>">
                        <div class="invalid-feedback">Please Enter Heading.
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-4 mt-3">
                    <p class="text-man text-color-g">&nbsp;Mobile Number</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-phone text-black"></i> </span>
                        <input type="text" class="form-control" name="mobileNu" id="mobileNu"
                          placeholder="Mobile Number"
                          oninput="this.value=this.value.replace(/[^0-9]/g,'').replace(/(\ *?)\ */g,'$1')"
                          value="<?php if ($isMember) {
                                    echo ($isMember->mobile_number ? $isMember->mobile_number : "");
                                  } ?>"
                          maxlength="10">
                        <div class="invalid-feedback">Please Enter Heading.
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-4 mt-3">
                    <p class="text-man text-color-g">&nbsp;Date of Birth</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-calendar text-black"></i> </span>
                        <input type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth">
                        <div class="invalid-feedback">Please Enter Heading.
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12 mt-4">
                    <p class="text-man text-color-g">&nbsp;Address</p>
                    <div class="mb-3 m-t-1">
                      <div class="input-group"> <span class="input-group-text text-black"> <i
                            class="fa fa-address-card"></i> </span>
                        <textarea class="form-control" placeholder="Enter Address" rows="4" id="membrAddr"
                          name="membrAddr"><?php if ($isMember) {
                                              echo ($isMember->address ? $isMember->address : "");
                                            } ?></textarea>
                        <div class="invalid-feedback">Please Enter Your text. </div>
                      </div>
                    </div>
                  </div>



                </div>
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <div
                      style="border-bottom:1px solid #eeeded;margin:10px 0px 15px 0px;padding:0px 0px 10px 0px;color:#0087ff;text-transform:uppercase;font-weight:700;">
                      Working Role
                    </div>
                  </div>




                  <div
                    class="col-md-4 <?php if ($isMember) {
                                      if ($isMember->user_role == '1' || $isMember->user_role == '3' || $isMember->user_role == '4') {
                                        echo 'col-md-6';
                                      } else {
                                        echo 'col-md-4';
                                      }
                                    } else {
                                      echo 'col-md-6';
                                    } ?>"
                    id="empRoleID">
                    <p class="text-man text-color-g">&nbsp;Employee Role</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-user text-black"></i> </span>
                        <div class="dropdown bootstrap-select form-control">
                          <select id="empRole" name="empRole" class="form-control"
                            data-id="<?php echo base_url('administrator/employee/designation'); ?>">
                            <option value="1" <?php if ($isMember) {
                                                echo (($isMember->user_role == '1') ? 'selected="selected"' : "");
                                              } ?>>State Co-ordinator</option>
                            <option value="2" <?php if ($isMember) {
                                                echo (($isMember->user_role == '2') ? 'selected="selected"' : "");
                                              } ?>>District Co-oridinator</option>
                            <option value="3" <?php if ($isMember) {
                                                echo (($isMember->user_role == '3') ? 'selected="selected"' : "");
                                              } ?>>Block Co-ordinatior</option>
                            <option value="4" <?php if ($isMember) {
                                                echo (($isMember->user_role == '4') ? 'selected="selected"' : "");
                                              } ?>>Panchayat Co-oridinator
                            </option>
                            <option value="5" <?php if ($isMember) {
                                                echo (($isMember->user_role == '5') ? 'selected="selected"' : "");
                                              } ?>>Village/Town Co-ordinatior
                            </option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div
                    class="col-md-4 <?php if ($isMember) {
                                      if ($isMember->user_role == '1' || $isMember->user_role == '3' || $isMember->user_role == '4') {
                                        echo 'col-md-6';
                                      } else {
                                        echo 'col-md-4';
                                      }
                                    } else {
                                      echo 'col-md-6';
                                    } ?>"
                    id="stateID">
                    <p class="text-man text-color-g">&nbsp;State</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa-solid fa-list text-black"></i> </span>
                        <div class="dropdown bootstrap-select form-control">
                          <select id="inputState" name="inputState" class="form-control arvManage"
                            data-id="inputDistrict">
                            <option value="" selected="">Choose State</option>
                            <?php if ($stateList) {
                              foreach ($stateList as $state) { ?>
                                <option value="<?php echo $state->id; ?>" <?php if ($isMember) {
                                                                            echo (($isMember->state_id == $state->id) ? 'selected="selected"' : "");
                                                                          } ?>>
                                  <?php echo $state->state_cities; ?></option>
                            <?php }
                            } else {
                              echo '<option>Not Available</option>';
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div
                    class="col-md-4 <?php if ($isMember) {
                                      if ($isMember->user_role == '1' || $isMember->user_role == '3') {
                                        echo 'col-md-6';
                                      } else {
                                        echo 'col-md-4';
                                      }
                                    } else {
                                      echo 'col-md-6';
                                    } ?>"
                    id="distctID" <?php if ($isMember) {
                                    if ($isMember->user_role == '1') {
                                      echo 'style="display:none;"';
                                    }
                                  } else {
                                    echo 'style="display:none;"';
                                  } ?>>
                    <p class="text-man text-color-g">&nbsp;District</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-link text-black"></i> </span>
                        <div class="dropdown bootstrap-select form-control">
                          <select id="inputDistrict" name="inputDistrict" class="form-control arvManage"
                            data-id="inputBlock">
                            <option value="" selected="">Choose District</option>
                            <?php if ($district) {
                              foreach ($district as $dist) { ?>
                                <option value="<?php echo $dist->id; ?>" <?php if ($isMember) {
                                                                            echo (($isMember->district_id == $dist->id) ? 'selected="selected"' : "");
                                                                          } ?>>
                                  <?php echo $dist->state_cities; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div
                    class="col-md-4 <?php if ($isMember) {
                                      if ($isMember->user_role == '1' || $isMember->user_role == '3') {
                                        echo 'col-md-6';
                                      } else {
                                        echo 'col-md-4';
                                      }
                                    } else {
                                      echo 'col-md-6';
                                    } ?>"
                    id="blockID" <?php if ($isMember) {
                                    if ($isMember->user_role == '1' || $isMember->user_role == '2') {
                                      echo 'style="display:none;"';
                                    }
                                  } else {
                                    echo 'style="display:none;"';
                                  } ?>>
                    <p class="text-man text-color-g">&nbsp;Block</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-link text-black"></i> </span>
                        <div class="dropdown bootstrap-select form-control">
                          <select id="inputBlock" name="inputBlock" class="form-control arvManage"
                            data-id="inputPanchayat">
                            <option value="" selected="">Choose Block</option>
                            <?php if ($blockWise) {
                              foreach ($blockWise as $block) { ?>
                                <option value="<?php echo $block->id; ?>" <?php if ($isMember) {
                                                                            echo (($isMember->block_id == $block->id) ? 'selected="selected"' : "");
                                                                          } ?>>
                                  <?php echo $block->block_name; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div class="col-md-4" id="pnchaytID" <?php if ($isMember) {
                                                          if ($isMember->user_role == '1' || $isMember->user_role == '2' || $isMember->user_role == '3') {
                                                            echo 'style="display:none;"';
                                                          }
                                                        } else {
                                                          echo 'style="display:none;"';
                                                        } ?>>
                    <p class="text-man text-color-g">&nbsp;Panchayat</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-link text-black"></i> </span>
                        <div class="dropdown bootstrap-select form-control">
                          <select id="inputPanchayat" name="inputPanchayat" class="form-control arvManage"
                            data-id="inputVillage">
                            <option value="" selected="">Choose Panchayat</option>
                            <?php if ($panchayat) {
                              foreach ($panchayat as $panch) { ?>
                                <option value="<?php echo $panch->id; ?>" <?php if ($isMember) {
                                                                            echo (($isMember->panchayat_id == $panch->id) ? 'selected="selected"' : "");
                                                                          } ?>>
                                  <?php echo $panch->panchayat_name; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div class="col-md-4" id="vilgeID" <?php if ($isMember) {
                                                        if ($isMember->user_role == '1' || $isMember->user_role == '2' || $isMember->user_role == '3' || $isMember->user_role == '4') {
                                                          echo 'style="display:none;"';
                                                        }
                                                      } else {
                                                        echo 'style="display:none;"';
                                                      } ?>>
                    <p class="text-man text-color-g">&nbsp;Village</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
                        <div class="dropdown bootstrap-select form-control">
                          <select id="inputVillage" name="inputVillage" class="form-control">
                            <option value="" selected="">Choose Village</option>
                            <?php if ($villageWise) {
                              foreach ($villageWise as $vill) { ?>
                                <option value="<?php echo $vill->id; ?>" <?php if ($isMember) {
                                                                            echo (($isMember->village_id == $vill->id) ? 'selected="selected"' : "");
                                                                          } ?>>
                                  <?php echo $vill->village_name; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>



                  <div class="col-md-6 mt-3">
                    <p class="text-man text-color-g">&nbsp;Username</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
                        <input type="text" class="form-control" placeholder="Username" id="username" name="username"
                          readonly="readonly"
                          value="<?php if ($isMember) {
                                    echo ($isMember->email_id ? $isMember->email_id : "");
                                  } ?>">
                        <div class="invalid-feedback">Please Enter Heading.
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-6 mt-3 mb-4">
                    <p class="text-man text-color-g">&nbsp;Password</p>
                    <div class="input-group m-t-1">
                      <div class="input-group">
                        <span class="input-group-text"> <i class="fa fa-key text-color-g"></i> </span>
                        <input type="password" id="empPassword" name="empPassword" class="form-control"
                          placeholder="Password"
                          value="<?php if ($isMember) {
                                    echo ($isMember->show_password ? $isMember->show_password : "");
                                  } ?>">
                        <div class="invalid-feedback">Please Enter Heading.
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
                <button type="submit" class="btn btn-primary" id="saveDetails"><i class="fa fa-save"></i>
                  Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .filter-option-inner-inner {
    color: #464545 !important;
  }
</style>
<script src="<?php echo base_url('assets/js/admin/employee.js') ?>"></script>
<style>
  .text-color {
    color: #006f75;
  }
</style>
<script>
  $(document).ready(function() {
    $('#dob').datepicker({
      format: 'dd/mm/yyyyy'
    });
    $('#dob').click(function() {
      $(this).datepicker('show');
    });
  });
</script>