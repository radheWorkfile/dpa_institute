      <div class="content-body">
      <div class="container-fluid">
      <div class="row">
      <div class="col-xl-12 col-lg-12">
      <div class="card">
      <div class="card-header">
      <h4 class="card-title"><?php echo $title;?></h4>
      </div>
      <div class="card-body">
      <div class="basic-form">
      <form id="createMember" method="post" accept-charset="utf-8" data-id="<?php echo $createItem;?>" enctype="multipart/form-data">
      <input type="hidden" id="arvActionTrgt" value="<?php echo $arvActionTrgt;?>">
      <input type="hidden" id="actnOper" value="<?php echo $actnOper;?>" name="actnOper">
      <input type="hidden" id="getId" name="getId" value="<?php if($isMember){echo ($isMember->id?$isMember->id:"");}?>">
      <div class="row mb-2">

      <div class="col-md-6">
      <p class="text-man text-color-g">&nbsp;Enter Name</p>
      <div class="input-group m-t-1">
      <div class="input-group">
      <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
      <input type="text" class="form-control" placeholder="First Name" name="frstName" id="frstName" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')" value="<?php if($isMember){echo ($isMember->name?$isMember->name:"");}?>">
      <div class="invalid-feedback">Please Enter Heading.
      </div>
      </div>
      </div>
      </div>


      <div class="col-md-6">
      <p class="text-man text-color-g">&nbsp;Father Name</p>
      <div class="input-group m-t-1">
      <div class="input-group">
      <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
      <input type="text" class="form-control" placeholder="Father Name" name="father_name" id="father_name" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')" value="<?php if($isMember){echo ($isMember->name?$isMember->name:"");}?>">
      <div class="invalid-feedback">Please Enter Heading.
      </div>
      </div>
      </div>
      </div>


      <div class="col-md-6 mt-3">
      <p class="text-man text-color-g">&nbsp;Mobile Number</p>
      <div class="input-group m-t-1">
      <div class="input-group">
      <span class="input-group-text"> <i class="fa fa-phone text-color-g"></i> </span>
      <input type="text" class="form-control" name="mobileNu" id="mobileNu" placeholder="Mobile Number" oninput="this.value=this.value.replace(/[^0-9]/g,'').replace(/(\ *?)\ */g,'$1')" value="<?php if($isMember){echo ($isMember->mobile_number?$isMember->mobile_number:"");}?>" maxlength="10">
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
      <input type="email" class="form-control keyUpAction" id="email_id" name="email_id" placeholder="Email Address" value="<?php if($isMember){echo ($isMember->email_id?$isMember->email_id:"");}?>">
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
      <option value="Male" <?php if($isMember){echo (($isMember->gender=='Male')?'selected="selected"':"");}?> >Male</option>
      <option value="Female" <?php if($isMember){echo (($isMember->gender=='Female')?'selected="selected"':"");}?>>Female</option>
      <option value="Transgender" <?php if($isMember){echo (($isMember->gender=='Transgender')?'selected="selected"':"");}?>>Transgender</option>
      <option value="Rather Not Say" <?php if($isMember){echo (($isMember->gender=='Rather Not Say')?'selected="selected"':"");}?>>Rather Not Say</option>
      </select>
      </div>
      </div>
      </div>
      </div>


      <div class="col-md-6 mt-3">
      <p class="text-man text-color-g">&nbsp;Password</p>
      <div class="input-group m-t-1">
      <div class="input-group">
      <span class="input-group-text"> <i class="fa fa-key text-color-g"></i> </span>
      <input type="password" id="empPassword" name="empPassword" class="form-control" placeholder="Password" value="<?php if($isMember){echo ($isMember->show_password?$isMember->show_password:"");}?>">
      <div class="invalid-feedback">Please Enter Heading.
      </div>
      </div>
      </div>
      </div>

 
      <div class="row">


      <div class="col-md-6 mt-3">
      <p class="text-man text-color-g">&nbsp;Enter District</p>
      <div class="input-group m-t-1">
      <div class="input-group">
      <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
      <input type="type" class="form-control keyUpAction" id="district_id" name="district_id" placeholder="Enter District">
      <div class="invalid-feedback">Please Enter Heading.
      </div>
      </div>
      </div>
      </div>


      <div class="col-md-6 mt-3">
      <p class="text-man text-color-g">&nbsp;Enter State</p>
      <div class="input-group m-t-1">
      <div class="input-group">
      <span class="input-group-text"> <i class="fa fa-link text-color-g"></i> </span>
      <input type="type" class="form-control keyUpAction" id="state_id" name="state_id" placeholder="Enter State">
      <div class="invalid-feedback">Please Enter Heading.
      </div>
      </div>
      </div>
      </div>


      </div>


      
      <div class="col-md-12 mt-4">
      <p class="text-man text-color-g">&nbsp;Address</p>
      <div class="mb-3 m-t-1">
      <div class="input-group"> <span class="input-group-text text-color-g"> <i class="fa fa-address-card"></i> </span>
      <textarea class="form-control" placeholder="Enter Address" rows="4" id="membrAddr" name="membrAddr"><?php if($isMember){echo ($isMember->address?$isMember->address:"");}?></textarea>
      <div class="invalid-feedback">Please Enter Your text. </div>
      </div>
      </div>
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
      .filter-option-inner-inner{ color:#464545 !important;}
      .text-color{color:#006f75;}
      </style>
      <script src="<?php echo base_url('assets/js/employee/member.js') ?>"></script>

      <script>
          $('#createMember').submit(function(e) {
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
               beforeSend: function() { $('#saveDetails').html('<i class="fa fa-sun bx-spin"></i> Please Wait'); },
               complete: function() { $('#saveDetails').html('<i class="fa fa-save"></i> Submit'); },
               success: function(htmlAmi) {
               toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
               if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.href = htmlAmi.returnLoc; }, 2000); }
               }
               });
          });
      </script>

