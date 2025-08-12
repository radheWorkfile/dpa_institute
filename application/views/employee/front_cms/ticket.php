
<!-- previewImage -->
<div class="content-body">
      <div class="container-fluid">
      <div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card">
      <div class="card-header">
      <h4 class="card-title"><?php echo $title;?></h4>
      <div class="card-action">
      <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item py-1"> <span class="btn btn-outline-primary" id="banner_section"><i class="la la-plus text-primary"></i>&nbsp;&nbsp;Create Ticket</span>      
      </li>
      </ul>
      </div>
      </div>
      <div class="card-body">
      <div class="basic-form" id="bannerCreate_sec">
          <!-- ============================================ Banner section start ================================== -->
          <form id="create_ticket" data-id="<?php echo $createTicket;?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
         <div class="row">
         <div class="row mt-4">


               <div class="col-md-3"></div>
               <div class="col-md-6 py-5 px-5"style="border:1px solid #eeeded;boarder-radius:2rem!important;">


        <h3 class="text-center">Manage Tickets</h3>


               <div class="col-md-12">
         <p class="text-man text-color-g">&nbsp;Enter Subject</p>
         <div class="input-group m-t-1">
         <div class="input-group">
         <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
         <input type="text" class="form-control border-left-end" name="subject" id="subject" placeholder="Enter Subject.." oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
         <div class="invalid-feedback">Please Enter Heading.
         </div>
         </div>
         </div>
         </div>


         <div class="col-md-6"style="display:none;">
         <p class="text-man text-color-g">&nbsp;Upoload File ( png, jpg, jpeg )</p>
         <div class="input-group m-t-1">
         <div class="input-group">
         <span class="input-group-text"> <i class="fa fa-cloud-upload text-color-g"></i> </span>
         <input class="form-control" type="file" id="file" name="file">
         <div class="invalid-feedback">Please Enter Heading.
         </div>
         </div>
         </div>
         </div>



         <div class="col-md-12 mt-3">
          <p class="text-man text-color-g">&nbsp;Message</p>
          <div class="input-group m-t-1">
          <div class="input-group">
          <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
          <textarea class="form-control" maxlength="400" rows="4" id="text" name="text" placeholder="Enter Message" spellcheck="false" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"></textarea>
          <div class="invalid-feedback">Please Enter Heading.
          </div>
          </div>
          </div>
          </div>


          <div class="row mt-3">
          <div class="col-md-5"></div>
          <div class="col-md-7">
          <button type="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
          </div>
          </div>



               </div>
               <div class="col-md-3"></div>

         </div>

         </div>

          


            </form>
    <!-- ============================================== Banner section end ================================== -->
 
      </div>
                 
            <!-- --------------------------- News List Section Start -------------------  -->
            <div class="tab-content" id="banner_list">
              <div class="tab-pane fade active show" id="allMembers" role="tabpanel">
                <div class="table-responsive">
                  <table id="targetSection" data-id="<?php echo $targetList; ?>" class="table table-hover table-responsive-sm mb-0">
                    <thead class="thead-arvDef">
                      <tr>
                        <th class="text-center"><strong>S.No</strong></th>
                        <th class="text-center"><strong>Ticket Id</strong></th>
                        <th class="text-center"><strong>Subject</strong></th>
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
         </style>


      <!-- <script src="<?//php echo base_url('assets/js/admin/employee.js') ?>"></script> -->
      <script src="<?php echo base_url('assets/js/employee/front_cms/ticket.js') ?>"></script>

