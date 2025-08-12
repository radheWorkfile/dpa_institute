<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $getIDCardDetails->username;?></title>
<link rel="shortcut icon" href="<?php echo base_url('media/images/logo-sm.png');?>">
	<style>
	.body {font-family: Arial, sans-serif; }

	@media print 
	{
		body {-webkit-print-color-adjust: exact;}
		@page {size: A4;margin: 0;}/*.page {height:350px; width:700px;margin:15px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}*/
		.page{ margin:60px;}
		#frntCdDet,#bckCdDet{ border: 1.5px dashed #A2A2A2; height:92mm; width:60mm; padding:1mm;}
		#frntCdDet img,#bckCdDet img{  background-color:#CCCCCC; width:100%; height:100%;}
		.idCrd{margin-top: -15.5rem;text-align: center;}
		#idCImg{height: 70px !important;width: 60px !important;border: 1px solid #c3a23a;padding:1.5px;border-bottom-right-radius: 15px;border-top-left-radius: 15px;}
		#meName{color:#090808;font-size:1.25rem;margin-top:0.75rem;font-weight: bold; color:#0548A4;}
		#meDesign{color:#bf2806;font-size: 0.85rem;margin-top: .1rem;}
		.allDet{ margin:0.6rem 0.7rem 10px 0.5rem;
				  font-size:0.65rem;color: #282222; background-color:#99CC00;}
				.allDet ul{ list-style:none; text-align:left;}
				.allDet ul li{ font-weight: bold; line-height: 1.6;}
		#bckCdDet
		{
			margin-top:-94mm; margin-left:70mm;
			}		
	}	
	
</style>
</head>
	<body>
		<!--------------------------------------------------------------------------------->	
            <div class="body">
                <div class="page">
                    <div id="frntCdDet">
                        <img src="<?php echo base_url('uploads/frntCrd.png');?>">  
                  		<div class="idCrd">
                        <img src="<?php echo base_url($getIDCardDetails->profile_image);?>" id="idCImg" >
                        <div id="meName"><?php if($getIDCardDetails){echo $getIDCardDetails->name;}?></div>
                        <div id="meDesign"><?php if($getIDCardDetails){echo (($getIDCardDetails->m_type=="3")?"Member":(($getIDCardDetails->m_type=="2")?"Mentor":"Founder"));}?></div>
                        <div class="allDet">
                            <ul>
                                <li>ID No 
                                          <span style="margin:0px .25rem 0px 1.75rem">:</span>
                                          <span style="color:#0729ac;"> <?php if($getIDCardDetails){echo $getIDCardDetails->member_id;}?></span>
                                </li>
                                <li>Name 
                                        <span style="margin:0px .25rem 0px 1.7rem">:</span> 
                                        <span style="color:#0729ac;"><?php if($getIDCardDetails){echo $getIDCardDetails->name;}?></span>
                                </li>
                                <li>DOB 
                                        <span style="margin:0px .25rem 0px 2rem">:</span>
                                        <span style="color:#0729ac;">
                                            <?php if($getIDCardDetails){echo date('d/m/Y',strtotime($getIDCardDetails->date_of_birth));}?>
                                        </span>
                                </li>
                                <li>Mobile No.
                                         <span style="margin:0px .25rem 0px .2rem">:</span> 
                                         <span style="color:#0729ac;"><?php if($getIDCardDetails){echo $getIDCardDetails->mobile_number;}?></span>
                                </li>   
                            </ul>
                        </div>
                    </div>
                    </div>
                    <div id="bckCdDet">
                        <img src="<?php echo base_url('uploads/bcID.png');?>">  
                    </div>    
                </div>
            </div>
		<!--------------------------------------------------------------------------------->
	</body>
</html>