<style>
            .border-radius-2{border-radius:2rem;}
            .bg-g{background-image: linear-gradient(to bottom right, #b3662b, #a30909);}
            .font-size-2{font-size:2rem;}
            .shadow-hover:hover{box-shadow:5px 5px 22px grey;}
            </style>

<div class="row mb-5 mt-5">
            <div class="col-md-2"></div>
            <div class="col-md-4 mt-5">
            <a href="javascript:void(0);" class="ActnCmdByAmi" id="idCard" data-id="<?php echo base_url('member/profile/idCard/'.$isLoggedID);?>">
            <div class="box-shadow p-5 bg-g shadow-hover">
            <p class="text-center font-size-2"><span class="p-3 text-white border-radius-2"><i class="fa fa-download" aria-hidden="true"></i></span></p>
            <p class="text-center text-white">Id Card Download</p>
            </div>
            </a>
            </div>
            <div class="col-md-4 mt-5">
            <a href="javascript:void(0);" class="ActnCmdByAmi" id="certificate" data-id="<?php echo base_url('member/profile/certificate/'.$isLoggedID);?>">
            <div class="box-shadow p-5 bg-g shadow-hover">
            <p class="text-center font-size-2"><span class="p-3 text-white border-radius-2"><i class="fa fa-certificate" aria-hidden="true"></i></span></p>
            <p class="text-center text-white">Certificate Download</p>
            </div>
            </a>
            </div>          
            <div class="col-md-2"></div>
            </div>