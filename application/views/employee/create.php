      <div class="content-body">
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-xl-12 col-lg-12">
                              <div class="card">
                                    <div class="card-header">
                                          <h4 class="card-title"><?php echo $title; ?></h4>
                                    </div>

                                    <div class="card-body">
                                          <div class="basic-form">
                                                <form id="create_employee" method="post" accept-charset="utf-8" data-id="<?php echo $createAction; ?>" enctype="multipart/form-data">
                                                      <input type="hidden" id="arvActionTrgt" value="<?php echo $arvActionTrgt; ?>">
                                                      <input type="hidden" id="actnOper" value="<?php echo $actnOper; ?>" name="actnOper">
                                                      <div class="row">
                                                            <div class="mb-3 col-md-4">
                                                                  <label>Gender</label>
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

                                                            <div class="mb-3 col-md-4">
                                                                  <label>First Name</label>
                                                                  <input type="text" class="form-control" placeholder="Aarav" name="frstName" id="frstName" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')" value="<?php if ($isMember) {
                                                                                                                                                                                                                                                            echo ($isMember->first_name ? $isMember->first_name : "");
                                                                                                                                                                                                                                                      } ?>">
                                                            </div>
                                                            <div class="mb-3 col-md-4">
                                                                  <label>Last Name</label>
                                                                  <input type="text" class="form-control" placeholder="Singh" name="lastName" id="lastName" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')" value="<?php if ($isMember) {
                                                                                                                                                                                                                                                            echo ($isMember->last_name ? $isMember->last_name : "");
                                                                                                                                                                                                                                                      } ?>">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                  <label>Email</label>
                                                                  <input type="email" class="form-control keyUpAction" id="email_id" name="email_id" placeholder="Email Address" value="<?php if ($isMember) {
                                                                                                                                                                                                echo ($isMember->email_id ? $isMember->email_id : "");
                                                                                                                                                                                          } ?>">
                                                            </div>
                                                            <div class="mb-3 col-md-6"><label>Mobile Number</label>
                                                                  <input type="text" class="form-control" name="mobileNu" id="mobileNu" placeholder="Mobile Number" oninput="this.value=this.value.replace(/[^0-9]/g,'').replace(/(\ *?)\ */g,'$1')" value="<?php if ($isMember) {
                                                                                                                                                                                                                                                                  echo ($isMember->mobile_number ? $isMember->mobile_number : "");
                                                                                                                                                                                                                                                            } ?>" maxlength="10">
                                                            </div>

                                                            <div class="mb-3 col-md-12"><label>Address</label><textarea class="form-control" rows="4" id="membrAddr" name="membrAddr"><?php if ($isMember) {
                                                                                                                                                                                                echo ($isMember->address ? $isMember->address : "");
                                                                                                                                                                                          } ?></textarea></div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="mb-3 col-md-12">
                                                                  <div style="border-bottom:1px solid #eeeded;margin:10px 0px 15px 0px;padding:0px 0px 10px 0px;color:#0087ff;text-transform:uppercase;font-weight:700;">
                                                                        Working Role
                                                                  </div>
                                                            </div>
                                                            <div class="mb-3 <?php if ($isMember) {
                                                                                    if ($isMember->user_role == '1' || $isMember->user_role == '3' || $isMember->user_role == '4') {
                                                                                          echo 'col-md-6';
                                                                                    } else {
                                                                                          echo 'col-md-4';
                                                                                    }
                                                                              } else {
                                                                                    echo 'col-md-6';
                                                                              } ?>" id="empRoleID">
                                                                  <label>Employee Role</label>
                                                                  <div class="dropdown bootstrap-select form-control">
                                                                        <select id="empRole" name="empRole" class="form-control" data-id="<?php echo base_url('employee/employee/designation'); ?>">
                                                                              <option selected="">Choose Role</option>
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
                                                                                                } ?>>Panchayat Co-oridinator</option>
                                                                              <option value="5" <?php if ($isMember) {
                                                                                                      echo (($isMember->user_role == '5') ? 'selected="selected"' : "");
                                                                                                } ?>>Village/Town Co-ordinatior</option>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="mb-3 <?php if ($isMember) {
                                                                                    if ($isMember->user_role == '1' || $isMember->user_role == '3' || $isMember->user_role == '4') {
                                                                                          echo 'col-md-6';
                                                                                    } else {
                                                                                          echo 'col-md-4';
                                                                                    }
                                                                              } else {
                                                                                    echo 'col-md-6';
                                                                              } ?>" id="stateID">
                                                                  <label>State</label>
                                                                  <div class="dropdown bootstrap-select form-control">
                                                                        <select id="inputState" name="inputState" class="form-control arvManage" data-id="inputDistrict">
                                                                              <option value="" selected="">Choose State</option>
                                                                              <?php if ($stateList) {
                                                                                    foreach ($stateList as $state) { ?>
                                                                                          <option value="<?php echo $state->id; ?>" <?php if ($isMember) {
                                                                                                                                          echo (($isMember->state_id == $state->id) ? 'selected="selected"' : "");
                                                                                                                                    } ?>><?php echo $state->state_cities; ?></option>
                                                                              <?php }
                                                                              } else {
                                                                                    echo '<option>Not Available</option>';
                                                                              } ?>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="mb-3 <?php if ($isMember) {
                                                                                    if ($isMember->user_role == '1' || $isMember->user_role == '3') {
                                                                                          echo 'col-md-6';
                                                                                    } else {
                                                                                          echo 'col-md-4';
                                                                                    }
                                                                              } else {
                                                                                    echo 'col-md-6';
                                                                              } ?>" id="distctID" <?php if ($isMember) {
                                                                                                                                                                                                                                                      if ($isMember->user_role == '1') {
                                                                                                                                                                                                                                                            echo 'style="display:none;"';
                                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                      echo 'style="display:none;"';
                                                                                                                                                                                                                                                } ?>>
                                                                  <label>District</label>
                                                                  <div class="dropdown bootstrap-select form-control">
                                                                        <select id="inputDistrict" name="inputDistrict" class="form-control arvManage" data-id="inputBlock">
                                                                              <option value="" selected="">Choose District</option>
                                                                              <?php if ($district) {
                                                                                    foreach ($district as $dist) { ?>
                                                                                          <option value="<?php echo $dist->id; ?>" <?php if ($isMember) {
                                                                                                                                          echo (($isMember->district_id == $dist->id) ? 'selected="selected"' : "");
                                                                                                                                    } ?>><?php echo $dist->state_cities; ?></option>
                                                                              <?php }
                                                                              } ?>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="mb-3 <?php if ($isMember) {
                                                                                    if ($isMember->user_role == '1' || $isMember->user_role == '3') {
                                                                                          echo 'col-md-6';
                                                                                    } else {
                                                                                          echo 'col-md-4';
                                                                                    }
                                                                              } else {
                                                                                    echo 'col-md-6';
                                                                              } ?>" id="blockID" <?php if ($isMember) {
                                                                                                                                                                                                                                                      if ($isMember->user_role == '1' || $isMember->user_role == '2') {
                                                                                                                                                                                                                                                            echo 'style="display:none;"';
                                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                      echo 'style="display:none;"';
                                                                                                                                                                                                                                                } ?>>
                                                                  <label>Block</label>
                                                                  <div class="dropdown bootstrap-select form-control">
                                                                        <select id="inputBlock" name="inputBlock" class="form-control arvManage" data-id="inputPanchayat">
                                                                              <option value="" selected="">Choose Block</option>
                                                                              <?php if ($blockWise) {
                                                                                    foreach ($blockWise as $block) { ?>
                                                                                          <option value="<?php echo $block->id; ?>" <?php if ($isMember) {
                                                                                                                                          echo (($isMember->block_id == $block->id) ? 'selected="selected"' : "");
                                                                                                                                    } ?>><?php echo $block->block_name; ?></option>
                                                                              <?php }
                                                                              } ?>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="mb-3 col-md-4" id="pnchaytID" <?php if ($isMember) {
                                                                                                            if ($isMember->user_role == '1' || $isMember->user_role == '2' || $isMember->user_role == '3') {
                                                                                                                  echo 'style="display:none;"';
                                                                                                            }
                                                                                                      } else {
                                                                                                            echo 'style="display:none;"';
                                                                                                      } ?>>
                                                                  <label>Panchayat</label>
                                                                  <div class="dropdown bootstrap-select form-control">
                                                                        <select id="inputPanchayat" name="inputPanchayat" class="form-control arvManage" data-id="inputVillage">
                                                                              <option value="" selected="">Choose Panchayat</option>
                                                                              <?php if ($panchayat) {
                                                                                    foreach ($panchayat as $panch) { ?>
                                                                                          <option value="<?php echo $panch->id; ?>" <?php if ($isMember) {
                                                                                                                                          echo (($isMember->panchayat_id == $panch->id) ? 'selected="selected"' : "");
                                                                                                                                    } ?>><?php echo $panch->panchayat_name; ?></option>
                                                                              <?php }
                                                                              } ?>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="mb-3 col-md-4" id="vilgeID" <?php if ($isMember) {
                                                                                                            if ($isMember->user_role == '1' || $isMember->user_role == '2' || $isMember->user_role == '3' || $isMember->user_role == '4') {
                                                                                                                  echo 'style="display:none;"';
                                                                                                            }
                                                                                                      } else {
                                                                                                            echo 'style="display:none;"';
                                                                                                      } ?>>
                                                                  <label>Village</label>
                                                                  <div class="dropdown bootstrap-select form-control">
                                                                        <select id="inputVillage" name="inputVillage" class="form-control">
                                                                              <option value="" selected="">Choose Village</option>
                                                                              <?php if ($villageWise) {
                                                                                    foreach ($villageWise as $vill) { ?>
                                                                                          <option value="<?php echo $vill->id; ?>" <?php if ($isMember) {
                                                                                                                                          echo (($isMember->village_id == $vill->id) ? 'selected="selected"' : "");
                                                                                                                                    } ?>><?php echo $vill->village_name; ?></option>
                                                                              <?php }
                                                                              } ?>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="mb-3 col-md-6"><label>Username</label>
                                                                  <input type="text" class="form-control" placeholder="Username" id="username" name="username" readonly="readonly" value="<?php if ($isMember) {
                                                                                                                                                                                                echo ($isMember->email_id ? $isMember->email_id : "");
                                                                                                                                                                                          } ?>">
                                                            </div>
                                                            <div class="mb-3 col-md-6"><label>Password</label>
                                                                  <input type="password" id="empPassword" name="empPassword" class="form-control" placeholder="Password" value="<?php if ($isMember) {
                                                                                                                                                                                          echo ($isMember->show_password ? $isMember->show_password : "");
                                                                                                                                                                                    } ?>">
                                                            </div>
                                                      </div>
                                                      <button type="submit" class="btn btn-primary" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
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
      <script src="<?php echo base_url('assets/js/employee/employee.js') ?>"></script>