<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>&nbsp;</title>
	<style>
.body {font-family: Arial, sans-serif; }
	@media print 
	{
		
		@page {size: A4; background-color:#999999}
		/*transform: rotate(90deg);*/
		.page{margin-left:10px !important; margin-top:70px; margin-right:30px;}
		.page img{ height: 1450px !important; width: 1024px !important;margin-top:-50px; } 
		
	}	
	#memName{color: #000;

  font-family: 'Brush Script MT',cursive;
  font-size: 5rem;
  position:relative;margin-top:-38rem !important;
  z-index:10;transform: rotate(90deg);
   
  color:#0548A4; width:900px; height:130px;
  text-transform:capitalize;
  }
  #regis{color: #0E0A07;text-align: center;font-size: 2.25rem;font-style: oblique;font-weight: bold;position:relative;z-index:1;transform: rotate(90deg); color:#0548A4;  width:200px; margin-left:31rem; margin-top:250px;
}
#cheifExecute{ position:relative;z-index:1;transform: rotate(90deg);color:#0548A4;width:300px;font-size:2.25rem;font-style:oblique;font-weight:bold;margin-top:-62rem; margin-left:-20px;}
#spnsor{ position:relative;z-index:1;transform: rotate(90deg);color:#0548A4;width:300px;font-size:2.25rem;font-style:oblique;font-weight:bold;margin-top:47rem; text-align:center;
margin-left:-10px;}
</style>
</head>

<body>
  <div class="body">
        <div class="page">
          <img src="<?php echo base_url('uploads/certificate.png');?>">
         </div>
         <div id="memName"><?php if($getIDCardDetails){echo $getIDCardDetails->name;}?></div> 
         <div id="regis">
            <?php if($getIDCardDetails){if($getIDCardDetails->member_id!='0'){echo $getIDCardDetails->member_id;}else{echo 'N/A';}}?>
        </div> 
        <div id="cheifExecute"> Arvind Prasad </div>  
         <div id="spnsor">&nbsp;<?php //if($getIDCardDetails){if($getIDCardDetails->sponsor!='0'){echo $getIDCardDetails->sponsor;}else{echo 'N/A';}}?>
        </div>    
    </div>
</body>
</html>