<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-white"><?php echo $title; ?></h4>
                        <div class="card-action">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item py-1">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- ---------------------------------------------------  -->

                    <!-- MultiStep Form -->
                    <div class="container-fluid" id="grad1">
                        <div class="row justify-content-center mt-0">

                            <div class="col-xl-11">
                                <div class="card h-auto">
                                    <div class="card-body">
                                        <div class="profile-tab">
                                            <div class="custom-tab-1">

                                                <div class="tab-content">

                                                    <div id="about-me" class="tab-pane fade active show" role="tabpanel"
                                                        style="margin-top:-3rem;">
                                                        <div class="profile-about-me">
                                                            <div class="pt-4 border-bottom-1 pb-3">
                                                                <h4 class="color-man">KYC Details</h4>
                                                                <p class="mb-2">KYC (Know Your Customer) details are
                                                                    essential for verifying the identity of employees.
                                                                    These details are thoroughly checked and verified by
                                                                    the admin to ensure compliance with legal and
                                                                    regulatory requirements. The process helps enhance
                                                                    security, prevent fraud, and maintain accurate
                                                                    records for all employees within the organization.
                                                                </p>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <div class="profile-personal-info">
                                                                    <h4 class="mb-4 font-size-2 color-man">Personal
                                                                        Information</h4>
                                                                    <div class="row mb-2">
                                                                        <div class="col-3">
                                                                            <h5 class="f-w-500 font-size-1">Employee ID
                                                                                <span class="pull-right">:</span>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-9 font-size-1">
                                                                            <span><?php echo $emp_det->user_id ? $emp_det->user_id : 'N/A'; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-3">
                                                                            <h5 class="f-w-500 font-size-1">Employee
                                                                                Name <span class="pull-right">:</span>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-9 font-size-1">
                                                                            <span><?php echo $emp_det->name ? $emp_det->name : 'N/A'; ?></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-2">
                                                                        <div class="col-3">
                                                                            <h5 class="f-w-500 font-size-1">Mobile
                                                                                Number <span class="pull-right">:</span>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-9 font-size-1">
                                                                            <span><?php echo $emp_det->mobile ? $emp_det->mobile : ''; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-3">
                                                                            <h5 class="f-w-500 font-size-1">Email <span
                                                                                    class="pull-right">:</span>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-9 font-size-1">
                                                                            <span><?php echo $emp_det->email ? $emp_det->email : 'N/A'; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-3">
                                                                            <h5 class="f-w-500 font-size-1">Address
                                                                                <span class="pull-right">:</span>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-9 font-size-1">
                                                                            <span><?php echo $emp_det->address ? $emp_det->address : ''; ?></span>
                                                                        </div>
                                                                    </div>


                                                                </div>



                                                                <div class="profile-personal-info mt-5">
                                                                    <h4 class="mb-4 font-size-2 color-man">Account
                                                                        Information</h4>
                                                                    <div class="row mb-2">
                                                                        <div class="col-3">
                                                                            <h5 class="f-w-500 font-size-1">Bank
                                                                                Name<span class="pull-right">:</span>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-9 font-size-1">
                                                                            <span><?php echo $emp_det->bank_name ? $emp_det->bank_name : ''; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-3">
                                                                            <h5 class="f-w-500 font-size-1">Holder Name
                                                                                <span class="pull-right">:</span>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-9 font-size-1">
                                                                            <span><?php echo $emp_det->holder_name ? $emp_det->holder_name : ''; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-3">
                                                                            <h5 class="f-w-500 font-size-1">Account
                                                                                Number <span class="pull-right">:</span>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-9 font-size-1">
                                                                            <span><?php echo $emp_det->acc_no ? $emp_det->acc_no : ''; ?></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-3">
                                                                            <h5 class="f-w-500 font-size-1">IFSC Code
                                                                                <span class="pull-right">:</span>
                                                                            </h5>
                                                                        </div>
                                                                        <div class="col-9 font-size-1">
                                                                            <span><?php echo $emp_det->ifsc_code ? $emp_det->ifsc_code : ''; ?></span>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-4"
                                                                style="border-right:5px solid #006f75;;border-radius:1rem;">

                                                                <div class="">
                                                                    <p class="font-size-1 color-man">Aadhaar Number : (
                                                                        <?php echo $emp_det->aadhaar_no ? $emp_det->aadhaar_no : ''; ?>
                                                                        )
                                                                    </p>
                                                                    <p><img src="<?php echo base_url($emp_det->aadhaar_image ? $emp_det->aadhaar_image : 'front/ngo_img/kyc-image/aadhar_card.jpeg'); ?>"
                                                                            width="180" height="85px"
                                                                            class="custom-img-man"></p>
                                                                </div>

                                                                <div class="">
                                                                    <p class="font-size-1 color-man">Pan Number : (
                                                                        <?php echo $emp_det->pan_no ? $emp_det->pan_no : ''; ?>
                                                                        )
                                                                    </p>
                                                                    <p><img src="<?php echo base_url($emp_det->pan_image ? $emp_det->pan_image : 'front/ngo_img/kyc-image/aadhar_card.jpeg'); ?>"
                                                                            width="180" height="85px"
                                                                            class="custom-img-man"></p>
                                                                </div>

                                                                <div class="">
                                                                    <p class="font-size-1 color-man">Bank Passbook :
                                                                    </p>
                                                                    <p><img src="<?php echo base_url($emp_det->passbook_image ? $emp_det->passbook_image : 'front/ngo_img/kyc-image/aadhar_card.jpeg'); ?>"
                                                                            width="180" height="85px"
                                                                            class="custom-img-man"></p>
                                                                </div>


                                                            </div>
                                                        </div>




                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>




                        </div>
                    </div>


                    <!-- ---------------------------------------------------  -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/admin/kyc/kyc_verified.js') ?>"></script>
<style>
    .custom-img-man {
        border: 1px solid #d3d3d3;
        box-shadow: 1px 1px 11px grey;
    }

    .font-size-1 {
        font-size: 0.8rem;
    }

    .font-size-2 {
        font-size: 1rem
    }

    .color-man {
        color: #006f75;
    }

    .custom-img-man {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .custom-img-man:hover {
        transform: scale(1.4);
        opacity: 0.8;
    }
</style>