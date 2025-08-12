<?php $gender=($getProDetails->gender=='1')?'Male':(($getProDetails->gender=='2')?'Female':(($getProDetails->gender=='3')?'Transgender':'Rather not say'));?>
<style>.border-man{border: 2px solid #ffe5d1;border-radius: 1rem;}</style>
  <section>
    <div class="container">
    <div class="row">
    <!-----------------------------Start Section ------------------------------------>  
      <div class="col-12 col-lg-12 my-5 border-man  p-1">	
       <div class="ojArvSection">
            <div class="memberProHead">
                <span class="mscPn"><span>Personal</span> details</span>    
            </div>
          <form method="post" id="profileUpgrade" data-id="<?php echo $profileUpgrade;?>">  
            <div class="mbrBorder">            	
              <div class="row">
                <div class="col-md-6 mt-2">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pb-2">
                        Name 
                        <span class="proHint">
                            <i class="fa fa-question-circle"></i>
                             <span>Please contact to admin for changing</span>
                        </span>
                     </label>
                    <span class="form-control arvFnt">
                       <?php echo $getProDetails->name;?>
                    </span>
                   </div>
                </div>
                <div class="col-md-6 mt-2">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pb-2"> Gender <span class="proHint"><i class="fa fa-question-circle"></i><span>Please contact to admin for changing</span></span> </label>
                    <span class="form-control arvFnt"><?php echo $gender;?></span>
                   </div>
                </div>
                <div class="col-md-6 mt-2">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pb-2 fmField">Father Name <span>*</span></label>
                    <input type="text" class="form-control arvBdr" name="father_name" id="father_name" placeholder="Enter Father Name" aria-describedby="emailHelp" oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')" value="<?php echo $getProDetails->father_name?$getProDetails->father_name:'';?>">
                  </div>
                </div>
                <div class="col-md-6 mt-2">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pb-2 fmField">Date Of Birth <span>*</span></label>
                    <input type="text" class="form-control arvDate" name="dob" id="dob" placeholder="DD-MM-YYYY" readonly="" value="<?php echo $getProDetails->date_of_birth?date('d-m-Y',strtotime($getProDetails->date_of_birth)):'';?>" aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="col-md-6 mt-2">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pb-2 fmField">Mobile Number <span>*</span></label>
                    <input type="text" class="form-control arvBdr" name="mobile" id="mobile" placeholder="Enter Mobile Number"  value="<?php echo $getProDetails->mobile_number?$getProDetails->mobile_number:'';?>" aria-describedby="emailHelp" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')">
                  </div>
                </div>
                <div class="col-md-6 mt-2">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pb-2 fmField">Email Id <span>*</span></label>
                    <input type="text" class="form-control arvBdr" id="email" name="email" placeholder="Enter Email Id" value="<?php echo $getProDetails->email_id?$getProDetails->email_id:'';?>" aria-describedby="emailHelp">
                  </div>
                </div>               
              </div>  
            </div>
             <div class="memberProHead">
                    <span class="mscPn"><span>Occupation</span> details </span>    
                </div>             
			 <div class="mbrBorder">
               <div class="row">
                <div class="col-md-6 mt-2">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pb-2 fmField">Sector <span>*</span></label>
                    <select class="form-select arvChange arvBdr" name="sector" id="sector"  data-id="<?php echo $findDetails;?>">
                        <option selected="" value="">Select One</option>
                        <?php foreach ($job_sector as $sec) { ?>
                        <option value="<?php echo $sec->id; ?>" <?php if($sec->id==$getProDetails->job_section){echo 'selected="selected"';}?> ><?php echo $sec->sector_name;?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 mt-2">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pb-2 fmField">Industries <span>*</span></label>
                     <select  class="form-select arvChange arvBdr" name="industries" id="industries"  data-id="<?php echo $findDetails;?>">
                         <option value="">Select One</option>
                          <?php if($industries){foreach($industries as $indstry) { ?>
                          	<option value="<?php echo $indstry->id; ?>" <?php if($indstry->id==$getProDetails->industries){echo 'selected="selected"';}?> ><?php echo $indstry->industry_name; ?></option>
                          <?php }} ?>
                     </select>
                  </div>
                </div>
                <div class="col-md-6 mt-2" id="business_type_section" style=" <?php echo ($getProDetails->job_section=='7')?'display:block;':'display:none;';?> ">
              <div class="mb-3">
                <label for="exampleInputEmail1"  class="form-label pb-2">Type of Business </label>
                <select class="form-select arvBdr"  name="business_type" id="business_type">
                  <option value="">Select One</option>
                  <?php foreach ($getBusiness as $bus) { ?>
                  	  <option value="<?php echo $bus->id; ?>" <?php if($bus->id==$getProDetails->business_type){echo 'selected="selected"';}?> ><?php echo $bus->business_type; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
                <div class="col-md-6 mt-2"  id="buss_nameSec" style=" <?php echo ($getProDetails->job_section=='7')?'display:block;':'display:none;';?> ">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label pb-2">Business Name </label>
                    <input type="text" class="form-control arvBdr" name="buss_name" id="buss_name" placeholder="Enter Business Name"  value="<?php echo $getProDetails->busi_profile_name?$getProDetails->busi_profile_name:'';?>"  aria-describedby="emailHelp">
                  </div>
                </div>
                <div class="col-md-12 mt-2" id="current_city" style=" <?php echo ($getProDetails->job_section!='7')?'display:block;':'display:none;';?> ">
                    <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label pb-2">Current City</label>
                          <input type="text" class="form-control arvBdr" name="city" id="city" placeholder="Enter Current City"  value="<?php echo $getProDetails->current_working_city?$getProDetails->current_working_city:'';?>"  aria-describedby="emailHelp">
                    </div>
                </div>
               </div>
             </div> 
             <div class="memberProHead">
                <span class="mscPn"><span>Communication</span> details</span>    
             </div>             
			 <div class="mbrBorder">
               <div class="row">
                    <div class="col-md-12 mt-2">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pb-2">Address <span>*</span></label>
                        <textarea cols="30" rows="2"  class="form-control arvBdr" id="registration_address" name="registration_address" placeholder="Enter Full Address *"><?php echo $getProDetails->address?$getProDetails->address:'';?></textarea>
                      </div>
                    </div>
                  <div class="col-md-4 mt-2">
                      <div class="mb-3">
                        <label for="disabledSelect" class="form-label pb-2">State <span>*</span></label>
                        <select class="form-select arvChange arvBdr" name="state"  id="state" data-id="<?php echo $findDetails;?>">
                          <option value="">Select One</option>
                          <?php foreach ($state as $stt) : ?>
                          <option value="<?php echo $stt->id; ?>" <?php if($stt->id==$getProDetails->state_id){echo 'selected="selected"';}?> ><?php echo $stt->state_cities; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div> 
                  <div class="col-md-4 mt-2">
                      <div class="mb-3">
                        <label for="disabledSelect" class="form-label pb-2">District <span>*</span></label>
                        <select class="form-select arvBdr" name="district"  id="district">
                          <option value="">Select One</option>
                           <?php if($district){foreach($district as $dist) { ?>
                          		<option value="<?php echo $dist->id; ?>" <?php if($dist->id==$getProDetails->district_id){echo 'selected="selected"';}?>><?php echo $dist->state_cities; ?></option>
                          <?php }} ?>
                        </select>
                      </div>
                    </div>
                  <div class="col-md-4 mt-2">
                        <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label pb-2">Zipcode <span>*</span></label>
                            <input type="text" class="form-control arvBdr" name="zipcode" id="zipcode" placeholder="Zipcode"  value="<?php echo $getProDetails->zipcode?$getProDetails->zipcode:'';?>"  aria-describedby="emailHelp"  maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')" >
                        </div>
                    </div>
                  <div class="col-md-6 mt-2">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pb-2">Password <span>*</span></label>
                        <input type="password" class="form-control arvBdr" id="password" name="password" placeholder="Enter Password" aria-describedby="emailHelp">
                      </div>
                    </div>
                  <div class="col-md-6 mt-2">
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label pb-2">Confirm Password <span>*</span></label>
                        <input type="password" class="form-control arvBdr" id="con_password" name="con_password" placeholder="Enter Confirm Password" aria-describedby="emailHelp">
                      </div>
                    </div>

                <div class="col-md-12 mt-2">
                  <div class="mb-3">
                    <div class="trmCndtn"> <input type="checkbox" id="trmCndtn" name="trmCndtn"> I agree to the <span class="prVcy">Privacy Ploicy</span> and <span class="prVcy"> T&C </span> </div>	                       
                        <div class="row">
                          <div class="col-md-5"></div>
                          <div class="col-md-2 mt-5">
                          <button type="submit" class="btn btn-outline-success float-end arvBdr subButMan" id="saveProcess"><i class="fa-regular fa-floppy-disk"></i> Submit</button>
                          </div>
                          <div class="col-md-5"></div>
                        </div>
                  </div>
                </div>
                
               </div>
             </div>  
          </form>   	
      </div>
      </div>
    <!-----------------------------End Section ------------------------------------>  
</div>
    </div>
  </section>
<style>
	.proHint{ font-size:12px;color: #979797;}
	.proHint i:hover{color: #0A8400; cursor:pointer;}
	.arvFnt{border: 0px solid #000;padding-left: 0px;color: #0154bf;}
	.memberProHead{padding:15px 0px 15px 0px;border-bottom: 2px solid #7b7b7b26;}
	.mscPn{border-bottom:3px solid #C86200;text-transform: capitalize;font-size:1.35rem;}
	.mscPn span{ color:#FC7B00;}
	.mbrBorder{ margin:25px 10px 25px 0px;}
	
.proHint span{visibility:hidden;width:200px;background-color:#4d4b48;color:#fff;text-align:center;border-radius:2px;padding:12px 5px;position:absolute;z-index:1;top:-6px;margin-left: 8px;}
.proHint span::after{content:"";position:absolute;top:50%;right:100%;margin-top:-5px;border-width:5px;border-style:solid;border-color:transparent #4d4b48 transparent transparent;}
.proHint:hover span{visibility:visible;}.fmField span{color:#b91100;}.form-control:disabled,.form-control[readonly]{background-color:#fff !important;}	
	

.trmCndtn .prVcy{ color:#008cd0;}	
#saveProcess{ margin-top:-25px;}
.advertise_section img{ height:90%;}
.mbrAdvrBorder {margin: 22px 10px 25px 0px;}
.ojArvSection2{padding: 1.0rem 1.25rem 0rem 1.25rem;background-color: #fbfbfbd6;}
</style>


<script>
$("#profileUpgrade").on("submit",function(e)
{
	e.preventDefault();
	$.ajax({url:$(this).attr('data-id'),type:"POST",data:$(this).serialize(),dataType:'json',
            beforeSend:function(){$('#saveProcess').html('<div class="loader"></div> Please Wait'); },
            complete:function(){$('#saveProcess').html('<i class="fa-regular fa-floppy-disk"></i> Submit'); },
			success:function(data)
			{
				toastMultiShow(data.adClass,data.msg,data.icon);if(data.adClass=='tSuccess'){setTimeout(function(){window.location.reload(1);},2000);}
			}});
			});	
</script>