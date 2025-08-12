<!-- previewImage -->

<div class="content-body">
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $title;?></h4>
        </div>
        <div class="card-body">
          <div class="tab-content" id="banner_list">
            <div class="tab-pane fade active show" id="allMembers" role="tabpanel">
              <div class="table-responsive">
                <table id="targetSection" data-id="<?php echo $targetList; ?>" class="table table-hover table-responsive-sm mb-0">
                  <thead class="thead-arvDef">
                    <tr>
                      <th><strong>S.No</strong></th>
                      <th><strong>Work Id</strong></th>
                      <th><strong>Emp Id</strong></th>
                      <th><strong>Emp Name</strong></th>
                      <th><strong>Project Name</strong></th>
                      <th><strong>Location</strong></th>
                      <th><strong>Amount</strong></th>
                      <th><strong>Date</strong></th>
                      <th><strong>Status</strong></th>
                      <!-- <th style="width:85px;"><strong>Actions</strong></th> -->
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
<!-- =================================== Status Model section End ======================== -->
<div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
        <div class="delMsg"><i class="fe fe-sliders"></i><span><i class="fas fa-gear fa-spin" style="font-size:14px;color:#6a4343;"></i></span><span style="color:#6a4343;"> Manage Status</span></div>
        <div class="actnData py-2"> Are you sure want to activate of Shift ID #F33333</div>
        <div id="mdlFtrBtn">
          <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfChangesStatus" data-id="@misingh143"> Confirm <i class="si si-check"></i> </button>
          <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal" style="margin-right:10px;"> <i class="fa fa-arrow-left"></i> Back </button>
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
         .text-man{margin-bottom:-0.1rem;}
         .icon-color{color:#006f75;}
         .text-color-g{color:#006f75;}

         </style>
<!-- <script src="<?php echo base_url('assets/js/admin/manage_work.js') ?>"></script> -->
<!-- chooseWork   -->
<!-- projectName  programName   event  otherWork -->
<script>

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
        if (value == "3") { $("#recSection, #recMobNumSec").show() }
    });
});
$(document).ready(function() {
    $("#bannerCreate_sec").hide();
    $("#banner_section").on("click", function() {
        $("#bannerCreate_sec").toggle();
        $("#banner_list").toggle();
    });
});
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
