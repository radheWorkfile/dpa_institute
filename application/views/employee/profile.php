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


                                                      <div class="col-md-6">
                                                            <p class="text-man text-color-g">&nbsp;First Name</p>
                                                            <div class="input-group m-t-1">
                                                                  <div class="input-group">
                                                                        <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
                                                                        <input type="text" class="form-control" placeholder="First Name" name="frstName" value="<?php echo $isMember->first_name; ?>" id="frstName" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')" value="<?php if ($isMember) {
                                                                                                                                                                                                                                                                                                                  echo ($isMember->name ? $isMember->name : "");
                                                                                                                                                                                                                                                                                                            } ?>">
                                                                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $isMember->id; ?>">
                                                                        <div class="invalid-feedback">Please Enter Heading.
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>


                                                      <div class="col-md-6">
                                                            <p class="text-man text-color-g">&nbsp;Mobile Number</p>
                                                            <div class="input-group m-t-1">
                                                                  <div class="input-group">
                                                                        <span class="input-group-text"> <i class="fa fa-phone text-color-g"></i> </span>
                                                                        <input type="text" class="form-control" name="mobileNu" id="mobileNu" placeholder="Mobile Number" oninput="this.value=this.value.replace(/[^0-9]/g,'').replace(/(\ *?)\ */g,'$1')" value="<?php if ($isMember) {
                                                                                                                                                                                                                                                                        echo ($isMember->mobile_number ? $isMember->mobile_number : "");
                                                                                                                                                                                                                                                                  } ?>" maxlength="10">
                                                                        <div class="invalid-feedback">Please Enter Heading.
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>


                                                      <div class="col-md-6 mt-3">
                                                            <p class="text-man text-color-g">&nbsp;Email</p>
                                                            <div class="input-group m-t-1">
                                                                  <div class="input-group">
                                                                        <span class="input-group-text"> <i class="fa fa-envelope text-color-g"></i> </span>
                                                                        <input type="email" class="form-control keyUpAction" id="email_id" name="email_id" placeholder="Email Address" value="<?php if ($isMember) {
                                                                                                                                                                                                      echo ($isMember->email_id ? $isMember->email_id : "");
                                                                                                                                                                                                } ?>">
                                                                        <div class="invalid-feedback">Please Enter Heading.
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>


                                                      <div class="col-md-6 mt-3">
                                                            <p class="text-man text-color-g">&nbsp;Gender</p>
                                                            <div class="input-group m-t-1">
                                                                  <div class="input-group">
                                                                        <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
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


                                                      <div class="col-md-12 mt-4">
                                                            <p class="text-man text-color-g">&nbsp;Address</p>
                                                            <div class="mb-3 m-t-1">
                                                                  <div class="input-group"> <span class="input-group-text text-color-g"> <i class="fa fa-address-card"></i> </span>
                                                                        <textarea class="form-control" rows="4" id="membrAddr" name="membrAddr"><?php if ($isMember) {
                                                                                                                                                      echo ($isMember->address ? $isMember->address : "");
                                                                                                                                                } ?></textarea>
                                                                        <div class="invalid-feedback">Please Enter Your text. </div>
                                                                  </div>
                                                            </div>
                                                      </div>


                                                </div>



                                                <div class="row">


                                                      <div class="col-md-6">
                                                            <p class="text-man text-color-g">&nbsp;Username</p>
                                                            <div class="input-group m-t-1">
                                                                  <div class="input-group">
                                                                        <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
                                                                        <input type="text" class="form-control" placeholder="Username" id="username" name="username" readonly="readonly" value="<?php if ($isMember) {
                                                                                                                                                                                                      echo ($isMember->email_id ? $isMember->email_id : "");
                                                                                                                                                                                                } ?>">
                                                                        <div class="invalid-feedback">Please Enter Heading.
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>


                                                      <div class="col-md-6">
                                                            <p class="text-man text-color-g">&nbsp;Password</p>
                                                            <div class="input-group m-t-1">
                                                                  <div class="input-group">
                                                                        <span class="input-group-text"> <i class="fa fa-key text-color-g"></i> </span>
                                                                        <input type="password" id="password" value="<?php if ($isMember) {
                                                                                                                              echo ($isMember->show_password ? $isMember->show_password : "");
                                                                                                                        } ?>" name="password" class="form-control" placeholder="Password">
                                                                        <div class="invalid-feedback">Please Enter Heading.
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>

                                                      <div class="row mt-5">
                                                            <div class="col-md-5"></div>
                                                            <div class="col-md-2">
                                                                  <button type="submit" class="btn btn-primary" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
                                                            </div>
                                                            <div class="col-md-5"></div>
                                                      </div>
                                                </div>

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