<div class="content-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div id="user-activity" class="card">
          <div class="card-header border-0 pb-0 d-sm-flex d-block">
            <div>
              <h4 class="card-title headIcn" id="crdTitle"> <i class="la la-users"></i> <?php echo $breadcrums; ?> </h4>
            </div>
            <div class="card-action">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a href="<?php echo base_url('website/front_cms/news'); ?>"><span
                      class="badge badge-danger py-1 px-3" id="news_menu"><i
                        class="la la-plus text-white"></i>&nbsp;&nbsp;Back</a></span>

                </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <!-- ============================================== Create News Section start  ================================== -->

            <div class="card-body" id="newsCreate_sec">
              <div class="basic-form">
                <form id="updateNews" method="post" accept-charset="utf-8"
                  data-id="<?php echo base_url(); ?>website/front_cms/update_news" enctype="multipart/form-data">
                  <div class="row mt-2">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <p class="text-color">&nbsp;&nbsp;Enter Heading</p>
                        <div class="input-group mt_1">
                          <span class="input-group-text"> <i class="fa fa-link text-color"></i> </span>
                          <input type="text" class="form-control border-left-end" name="news_heading"
                            value="<?php echo $isMember->news_heading; ?>" id="news_heading"
                            placeholder="Enter Heading.." required="">
                          <div class="invalid-feedback">Please Enter Your text.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row mt-3">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <p class="text-color">&nbsp;&nbsp;Enter Message</p>
                        <div class="input-group mt_1">
                          <span class="input-group-text"> <i class="fa fa-link text-color"></i> </span>
                          <textarea class="form-control" rows="4" id="news" name="news"
                            spellcheck="false"><?php echo $isMember->news; ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-primary float-center mt-2 w-100" id="saveDetails"><i
                          class="fa fa-save"></i> Submit</button>
                    </div>
                    <div class="col-md-5"></div>
                  </div>

                  <!-- End Upload Area -->
                </form>

              </div>
            </div>

            <!-- ============================================== Create News Section End  ================================== -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  .headIcn {
    color: #3a7afe;
    margin-bottom: -8px !important;
  }

  .headIcn i {
    background-color: #3a7afe;
    padding: 5px;
    color: #fff;
    border-radius: 5px;
  }

  .frBsnsDetails,
  #crntJBLoc {
    display: none;
  }

  .sRvActive {
    padding: 4px 15px 4px 15px;
    background-color: #0AC89024;
    color: #009569;
    border-radius: 3px;
    cursor: pointer;
    font-size: .8rem;
  }

  .sRvDeactive {
    padding: 4px 8px 4px 8px;
    background-color: #EE4B5C4F;
    color: #EE4B5C;
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

  .text-color {
    color: #006f75;
  }

  .mt_1 {
    margin-top: -1rem;
  }
</style>
<script>
  $('#updateNews').submit(function (e) {
    let base_url = $(this).attr('data-id');
    e.preventDefault();
    $.ajax({
      url: base_url,
      type: 'POST',
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      dataType: 'json',
      beforeSend: function () { $('#saveDetails').html('<i class="fa fa-sun bx-spin"></i> Please Wait'); },
      complete: function () { $('#saveDetails').html('<i class="bx bx-save"></i> Submit'); },
      success: function (htmlAmi) {
        toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
        if (htmlAmi.addClas == 'tSuccess') { setTimeout(function () { window.location.href = htmlAmi.returnLoc; }, 2000); }
      }
    });
  });
</script>

<script src="<?php echo base_url('assets/js/admin/employee.js') ?>"></script>