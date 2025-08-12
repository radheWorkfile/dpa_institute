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
                <li class="nav-item py-1"> <span class="btn btn-outline-primary" id="news_menu"><i
                      class="la la-plus text-primary"></i>&nbsp;&nbsp;Create Recent Activity</span>

                </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <!-- ============================================== Create News Section start  ================================== -->

            <div class="card-body" id="newsCreate_sec">
              <div class="basic-form">

                <form id="manageNews" method="post" accept-charset="utf-8" data-id="<?php echo $createAction; ?>"
                  enctype="multipart/form-data">
                  <div class="row mt-2">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <div class="input-group">
                          <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                          <input type="text" class="form-control border-left-end" name="news_heading" id="news_heading"
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
                        <div class="input-group">
                          <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                          <textarea class="form-control" maxlength="300" rows="4" id="news" name="news"
                            spellcheck="false">Patna Bihar</textarea>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-2">
                      <button type="submit" name="submit" id="submit" class="btn btn-primary float-center mt-2 w-100"><i
                          class="fa fa-save"></i> Submit</button>
                    </div>
                    <div class="col-md-5"></div>
                  </div>

                  <!-- End Upload Area -->
                </form>

              </div>
            </div>

            <!-- ============================================== Create News Section End  ================================== -->


            <!-- --------------------------- News List Section Start -------------------  -->
            <div class="tab-content" id="news_list">
              <div class="tab-pane fade active show" id="allMembers" role="tabpanel">
                <div class="table-responsive">
                  <table id="target" data-id="<?php echo $targetList; ?>"
                    class="table table-hover table-responsive-sm mb-0">
                    <thead class="thead-arvDef">
                      <tr>
                        <th><strong>S.No</strong></th>
                        <th><strong>Date</strong></th>
                        <th><strong>Heading</strong></th>
                        <th><strong>Recent Activity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></th>
                        <th><strong>Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></th>
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
</style>
<script>



  // ======================================================================== 

  $(document).ready(function () {
    $("#newsCreate_sec").hide();
    $("#news_menu").on("click", function () {
      $("#newsCreate_sec").toggle();
      $("#news_list").toggle();
    });
  });

  var reportNewsList = '';
  $(document).ready(function () {
    let searchObj = {};
    var targetAction = $('#target').attr('data-id');
    reportNewsList = {
      printTable: function (search_data) {
        getpaginate(search_data, '#target', targetAction, 'Only For Tnx id, Month.');
      }
    };
    reportNewsList.printTable(searchObj);
  });


  $('#manageNews').submit(function (e) {
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
        if (htmlAmi.addClas == 'tSuccess') { setTimeout(function () { window.location.reload(1); }, 2000); }
      }
    });
  });

  $(function () {
    $(document).on("click", '.getAction', function () {
      let actNbtn = $(this).attr('data-id');
      let getData = actNbtn.split('===');
      if (getData[0] == 'miStatusView') {
        let target = $('#base_url').val() + getData[1];
        $.post(target, { oprType: getData[0], id: getData[2] }, function (htmlAmi) {
          $('.actnData').html(htmlAmi.msg);
          $('#cnfChanges').attr('data-id', htmlAmi.action);
        }, 'json');
      } else if (getData[0] == 'miStatusChange') {
        let target = $('#base_url').val() + getData[1];
        $('#cnfChanges').html('<i class="fe fe-settings bx-spin"></i> Please Wait').removeClass('btn-outline-secondary').addClass('btn-outline-primary');
        $.post(target, { oprType: getData[0], id: getData[2] }, function (htmlAmi) {
          $('#cnfChanges').html('Confirm <i class="si si-check"></i>').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
          $("#arvs--" + getData[2]).addClass(htmlAmi.btnAdCls).removeClass(htmlAmi.btnRmvCls).html(htmlAmi.btnTxt);
          $('.actnData').html(htmlAmi.msg);
          $('#statusChange').delay(3000).modal('hide');
        }, 'json');

      }
    });
  });

</script>
<script src="<?php echo base_url('assets/js/admin/employee.js') ?>"></script>