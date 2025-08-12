
<!-- previewImage -->
<div class="content-body">
      <div class="container-fluid">
      <div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card">
      <div class="card-header">
      <h4 class="card-title text-white"><?php echo $title;?></h4>
      <div class="card-action">
      </div>
      </div>
      <div class="card-body">
            <!-- --------------------------- News List Section Start -------------------  -->
            <div class="tab-content" id="banner_list">
              <div class="tab-pane fade active show" id="allMembers" role="tabpanel">
                <div class="table-responsive">
                  <table id="targetSection" data-id="<?php echo $targetList; ?>" class="table table-hover table-responsive-sm mb-0">
                    <thead class="thead-arvDef">
                      <tr>
                        <th class="text-center"><strong>S.No</strong></th>
                        <th class="text-center"><strong>Name</strong></th>
                        <th class="text-center"><strong>Mobile No</strong></th>
                        <th class="text-center"><strong>Subject</strong></th>
                        <th class="text-center"><strong>Discription </strong></th>
                        <th class="text-center"><strong>Date</strong></th>
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
            $("#create_program").on("submit", function (e) {
            alert("Hello radhe");
            e.preventDefault(); 
            $.ajax({
            type: "POST",
            url: '<?= base_url() ?>website/Project/manage_program/create_program',         
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
