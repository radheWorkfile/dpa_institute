<!-- previewImage -->
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title text-white"><?php echo $title; ?></h4>
            <div class="card-action">
              <ul class="nav nav-tabs" role="tablist">
                </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="basic-form" id="bannerCreate_sec">
              <!-- ============================================ Banner section start ================================== -->

              <style>
                .submit-btn {
                  border-radius: 0px;
                  color: white;
                  margin-left: -1rem;
                  border: 2px solid #006f75;
                  background-color: #006f75;
                }

                .submit-btn:hover {
                  border-radius: 0px;
                  color: white;
                  margin-left: -1rem;
                  border: 2px solid #006f75;
                  background-color: #006f75;
                }

                .color-green {
                  color: #006f75;
                }

                .width-100 {
                  width: 100%;
                }

                .height-5rem {
                  height: 5rem;
                }

                input {
                  width: 100%;
                }

                .box-shadow {
                  box-shadow: 1px 1px 5px grey;
                }

                .border-solid-1px {
                  border: 1px solid #d2d2d2
                }

                .p-1rem {
                  padding: 1rem;
                }
              </style>
              <section>
                <div class="container">
                  <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                      <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" id="success-message" style="text-align:center;">
                          <?php echo $this->session->flashdata('success'); ?>
                        </div>
                      <?php endif; ?>
                      <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger" id="error-message" style="text-align:center;">
                          <?php echo $this->session->flashdata('error'); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-3"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 p-3">
                      <div class="box-shadow border-solid-1px p-1rem">
                        <h3 class="text-center text-success">Logo Update</h3>
                        <span style="font-size:14px;"><b>File must be under 50KB.</b></span>
                        <form action="<?php echo base_url(); ?>administrator/setting/update_data" method="POST"
                          enctype="multipart/form-data">
                          <div class="input-group mb-3 input-info py-3">
                            <input class="form-control" type="file" name="logo" id="logo">
                            <hr>
                            <span><button name="submit" type="submit" class="btn submit-btn">Upload</button></span>
                          </div>
                          <hr>
                        </form>
                        <p><img src="<?php echo base_url() . $all_data->logo; ?>" alt="Logo" class="w-100 height-5rem">
                        </p>
                      </div>
                      <div class="box-shadow border-solid-1px p-1rem mt-4">
                        <h3 class="text-center text-success">Favicon Update</h3>
                        <span style="font-size:14px;"><b>File must be under 50KB.</b></span>
                        <form action="<?php echo base_url(); ?>administrator/setting/update_favicon" method="POST"
                          enctype="multipart/form-data">
                          <div class="input-group mb-3 input-info py-3">
                            <input class="form-control" type="file" id="favicon" name="favicon">
                            <hr>
                            <span><button type="submit" name="submit" class="btn submit-btn">Upload</button></span>
                          </div>
                        </form>
                        <hr>
                        <p><img src="<?php echo base_url() . $all_data->favicon; ?>" alt="" class="w-100 height-5rem">
                        </p>
                      </div>
                    </div>



                    <div class="col-xl-8 col-lg-8 mt-3">
                      <div class="card border-solid-1px p-3">
                        <div class="card-header">
                          <h4 class="card-title text-white">Update Data <h4>
                        </div>
                        <div class="card-body">
                          <div class="basic-form">

                            <form action="<?php echo base_url(); ?>administrator/setting/update_content" method="POST"
                              enctype="multipart/form-data">





                              <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label text-white">Company Name</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
                                    <input type="text" name="company_name" id="company_name" class="form-control"
                                      oninput="this.value = this.value.replace(/[^a-zA-Z]/g, ' ').replace(/(\  *?)\  */g, '$1')"
                                      placeholder="Company Name"
                                      value="<?php echo $all_data->company_name ? $all_data->company_name : ''; ?>">
                                    <div class="invalid-feedback">Please Enter Heading.
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label text-white">Mobile No</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-phone text-color-g"></i> </span>
                                    <input type="text" name="mobile"
                                      value="<?php echo $all_data->mobile ? $all_data->mobile : ''; ?>" maxlength="10"
                                      oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')"
                                      id="mobile" class="form-control" placeholder="Mobile No">
                                    <div class="invalid-feedback">Please Enter Heading.
                                    </div>
                                  </div>
                                </div>
                              </div>



                              <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label text-white">Email-Id</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-envelope text-color-g"></i> </span>
                                    <input type="email" name="email" id="email"
                                      value="<?php echo $all_data->email ? $all_data->email : ''; ?>" class="form-control"
                                      placeholder="Email-Id">
                                    <div class="invalid-feedback">Please Enter Heading.
                                    </div>
                                  </div>
                                </div>
                              </div>



                              <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label text-white">Address</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-address-card text-color-g"></i>
                                    </span>
                                    <input type="text" name="address" id="address"
                                      oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase().replace(/[^a-z0-9,. ]/g, '').replace(/\s+/g, ' ');"
                                      value="<?php echo $all_data->address ? $all_data->address : ''; ?>"
                                      class="form-control" placeholder="Address">
                                    <div class="invalid-feedback">Please Enter Heading.
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label text-white">&copy; All Rights Reserved</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-address-card text-color-g"></i>
                                    </span>
                                    <input type="text" name="reservedText" id="reservedText"
                                      oninput="this.value = this.value.replace(/[^a-zA-Z0-9,. ]/g, '').replace(/\s+/g, ' ');"
                                      value="<?php echo $all_data->reservedText ? $all_data->reservedText : ''; ?>"
                                      class="form-control" placeholder="Address">
                                    <div class="invalid-feedback">Please Enter Heading.
                                    </div>
                                  </div>
                                </div>
                              </div>






                              <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label text-white">About Company</label>
                                <div class="col-sm-9">
                                  <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-address-card text-color-g"></i>
                                    </span>
                                    <textarea class="form-control" name="about_company" id="about_company"
                                      oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1).toLowerCase().replace(/[^a-z0-9,. ]/g, '').replace(/\s+/g, ' ');"
                                      rows="3" name="footer_text"
                                      id="footer_text"><?php echo $all_data->about_company ? $all_data->about_company : ''; ?></textarea>
                                    <div class="invalid-feedback">Please Enter Heading.
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="mb-3 row mt-4">
                                <div class="col-md-5"></div>
                                <div class="col-md-3">
                                  <button type="submit " name="submit" class="btn btn-primary w-100">Upload</button>
                                </div>
                                <div class="col-md-4"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="row py-5 border-solid-1px">
                    <div class="col-md-6">
                      <form action="<?php echo base_url(); ?>administrator/setting/facebookLink" method="POST"
                        enctype="multipart/form-data">
                        <span style="color:#006f75;">&nbsp;&nbsp;Facebook Id</span>
                        <div class="input-group mb-3">
                          <input type="text" name="facebookLink" id="facebookLink"
                            value="<?php echo $all_data->facebook ? $all_data->facebook : ''; ?>" class="form-control"
                            placeholder="Enter Facebook Link">
                          <button class="btn btn-primary" name="submit" type="submit">Upload</button>
                        </div>
                      </form>
                    </div>

                    <div class="col-md-6">
                      <form action="<?php echo base_url(); ?>administrator/setting/youtubeLink" method="POST"
                        enctype="multipart/form-data">
                        <span style="color:#006f75;">&nbsp;&nbsp;Youtube Link</span>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="youtubeLink" id="youtubeLink"
                            value="<?php echo $all_data->youtube ? $all_data->youtube : ''; ?>"
                            placeholder="Enter Youtube Link">
                          <button class="btn btn-primary" name="submit" type="submit">Upload</button>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-6 mt-3">
                      <form action="<?php echo base_url(); ?>administrator/setting/instagramLink" method="POST"
                        enctype="multipart/form-data">
                        <span style="color:#006f75;">&nbsp;&nbsp;Instagram Id</span>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="instagramLink" id="instagramLink"
                            value="<?php echo $all_data->instagram ? $all_data->instagram : ''; ?>"
                            placeholder="Enter Instagram Link">
                          <button class="btn btn-primary" name="submit" type="submit">Upload</button>
                        </div>
                      </form>
                    </div>

                    <div class="col-md-6 mt-3">
                      <form action="<?php echo base_url(); ?>administrator/setting/teligramLink" method="POST"
                        enctype="multipart/form-data">
                        <span style="color:#006f75;">&nbsp;&nbsp;Teligram Id</span>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="teligramLink" id="teligramLink"
                            value="<?php echo $all_data->telegram ? $all_data->telegram : ''; ?>"
                            placeholder="Enter Teligram Link">
                          <button class="btn btn-primary" name="submit" type="submit">Upload</button>
                        </div>
                      </form>
                    </div>

                  </div>
                </div>
              </section>
              <!-- ============================================== Banner section end ================================== -->
            </div>
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
</style>


<script type="text/javascript">
  setTimeout(function () {
    var messageIds = ['success-message', 'error-message', 'another-message-id'];
    messageIds.forEach(function (id) {
      var message = document.getElementById(id);
      if (message) {
        message.style.display = "none";
      }
    });
  }, 3000); 
</script>