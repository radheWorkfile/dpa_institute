

<!-- previewImage -->
<div class="content-body">
      <div class="container-fluid">
      <div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card">
      <div class="card-header">
      <h4 class="card-title text-white"><?php echo $title;?></h4>
      <div class="card-action">
      <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item py-1"> <span class="btn btn-outline-primary" id="projectSection"><b><i class="la la-plus text-danger"></i></b>&nbsp;&nbsp;Create Income Sources</span>      
      </li>
      </ul>
      </div>
      </div>

      
      <div class="card-body">
      <div class="basic-form" id="createProSec">
 <!-- ============================================ Project section start ================================== -->

      <form id="create" method="post" data-id="<?php echo $createProject?>" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="row">
            <div class="col-md-12">   
            <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-md-6"style="box-shadow:1px 1px 11px #80808029;padding:5rem 2rem 3rem 2rem;">
            <div class="row">
            <div class="col-md-12">
            <div class="mb-3">
            <label for="" class="text-color-g">&nbsp;&nbsp;Source Name <span class="text-danger">&nbsp;*</span></label>
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="income" id="income" placeholder="Enter Income Source Name .." oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>

            

            <div class="col-md-12 mt-2">
            <div class="col-md-12">
            <label for="" class="text-color-g">&nbsp;&nbsp;Enter Description</label>
            <div class="mb-3">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>  
            <textarea class="form-control" maxlength="400" rows="3" placeholder="Enter Your Message" id="message" name="message" spellcheck="false" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"></textarea>
            <div class="invalid-feedback">Please Enter Your text.
            </div>
            </div>
            </div>
            </div>
             </div>

         
            <div class="row mt-4">
            <div class="col-md-5"></div>
            <div class="col-md-4">
            <button type="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i class="fa fa-save"></i> Submit</button>
            </div>
            <div class="col-md-3"></div>
            </div>


            </div>
            </div>
            <div class="col-md-3"></div>
            </div>
            </div>
    </div>
    </form>
 <!-- ============================================ Project section start ================================== -->
         
 
      </div>

                 
        <!-- --------------------------- News List Section Start -------------------  -->
        <div class="tab-content" id="projectList">
       <div class="tab-pane fade active show" id="allMembers" role="tabpanel">
        <div class="table-responsive">
        <table id="targetItem" data-id="<?php echo $targetListItem; ?>" class="table table-hover table-responsive-sm mb-0">
        <thead class="thead-arvDef">
        <tr>
			<th class="text-center"><strong>S.No</strong></th>
			<th class="text-center"><strong>Source Name</strong></th>
			<th class="text-center"><strong>Description</strong></th>
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

<!-- =================================== Status Model section End ======================== -->
    <div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
         <div class="modal-body">
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
         <div class="delMsg"><i class="fe fe-sliders"></i><span><i class="fas fa-gear fa-spin" style="font-size:14px;color:#6a4343;"></i></span><span style="color:#6a4343;"> Manage Status</span></div>
         <div class="actnData py-2"> Are you sure want to activate of Shift ID #F33333</div>
         <div id="mdlFtrBtn">
         <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right getAction" id="cnfChangesStatus" data-id="@misingh143">
         Confirm <i class="si si-check"></i>
         </button>
         <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal" style="margin-right:10px;">
         <i class="fa fa-arrow-left"></i> Back 
         </button>   
         </div>	
         </div>
         </div>
         </div>
    </div>
<!-- =================================== Status Model section End ======================== -->


      <style>
.imageView {transition: transform 0.3s ease-in-out; }
.imageView:hover {transform: scale(5.5);}
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

         #picture__input {
  display: none;
}


         </style>

      <!-- <script src="<?//php echo base_url('assets/js/admin/employee.js') ?>"></script> -->
      

        <script>
		
		
	 var projectListItem = '';            
     $(document).ready(function()
    {
     let searchObj = {};
     var targetAction = $('#targetItem').attr('data-id');
     projectListItem={printTable:function(search_data) {getpaginate(search_data, '#targetItem', targetAction, 'Only For Tnx id, Month.');}};
     projectListItem.printTable(searchObj);           
     });	
		
		
		
        $(document).ready(function() {
        $("#createProSec").hide();
        $("#projectSection").on("click", function() {
        $("#createProSec").toggle();
        $("#projectList").toggle();
        });
        });

        $(document).ready(function () {
        $("#create").on("submit", function (e) {
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
            dataType:'json',
            success: function (htmlAmi) 
            {
              toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
              if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.href = htmlAmi.returnLoc; }, 1000); }
             }
            }); });});

    </script>
