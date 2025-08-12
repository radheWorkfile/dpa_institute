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
            <!-- --------------------------- News List Section Start ------------------- -->
            <form id="create" method="post" accept-charset="utf-8" enctype="multipart/form-data">              
            <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 mb-5"> 
                <style>
                    
                </style>

            <div class="row mt-4">
            <div class="col-md-6">
            <p class="text-color-g">Name</p>
            <div class="mb-3 m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="name" id="name" placeholder="Enter Name.." oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-6">
            <p class="text-color-g">Father Name</p>  
            <div class="mb-3 m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-user text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="f_name" id="f_name" placeholder="Enter Father Name.." oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            </div>

            <div class="row mt-1">
            <div class="col-md-6">
            <p class="text-color-g">Email Id</p> 
            <div class="mb-3 m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-envelope text-color-g"></i> </span>
            <input type="email" class="form-control border-left-end" name="email" id="email" placeholder="Enter Email.." oninput="validateEmail(this)">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-6">
            <p class="text-color-g">Mobile Number</p>
            <div class="mb-3 m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-mobile text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="mobile" id="mobile" placeholder="Enter Mobile No.." maxlength="10" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            </div>

            <div class="row mt-1">
            <div class="col-md-6">
            <p class="text-color-g">Address</p>
            <div class="mb-3 m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-map-marker text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="address" id="address" placeholder="Enter Address.." oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-6">
            <p class="text-color-g">Amount</p>
            <div class="mb-3 m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-inr text-color-g"></i> </span>
            <input type="text" class="form-control border-left-end" name="amount" id="amount" placeholder="Enter Amount.." maxlength="33" oninput="this.value = this.value.toUpperCase().replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')">
            <div class="invalid-feedback">Please Enter Heading.
            </div>
            </div>
            </div>
            </div>
            </div>

            <div class="row mt-1">
            <div class="col-md-12">
            <p class="text-color-g">Message</p>
            <div class="mb-3 m-t-1">
            <div class="input-group">
            <span class="input-group-text"> <i class="fa fa-address-card text-color-g"></i> </span>  
            <textarea class="form-control" maxlength="400" rows="4" id="text" name="text" placeholder="Enter Message" spellcheck="false" oninput="this.value = this.value.toLowerCase().replace(/[^a-z ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"></textarea>
            <!-- <input type="text" class="form-control border-left-end" maxlength="100" name="slider_text" id="slider_text" placeholder="Enter Your text.."> -->
            <div class="invalid-feedback">Please Enter Your text.
            </div>
            </div>
            </div>
            </div>
            </div>

            <div class="row mb-4"id="donate-payment">
            <p class="text-center text-danger">"Your small donation can make a big difference, providing food, shelter, education, and hope to poor people in need. Act now to help!" </p>
            <div class="col-md-2 mr-5 pt-4">
            <p class="custom-border-1"><img src="<?php echo base_url('website_assets/qr-code.png');?>" alt="" class="custom-height"></p>
            </div>
            <div class="col-md-5">
            <div class="row">
            <div class="row mt-2 cus-ml">
            <div class="col-md-12 border-solid"style="border:1px solid #e0e0e0;padding:1rem 2rem 3.5rem 2rem;border-radius:1rem;">
            <div class="row">
            <p class="text-center text-success">Account Details</p>
            <div class="col-md-12"style="display:flex;justify-content:space-between">
            <p class="text-dark">Account No &nbsp;- <p>
            <p class="text-dark"> 69234156784325345</p>
            </div>
            <div class="col-md-12"style="display:flex;justify-content:space-between">
            <p class="text-dark">IFSC-CODE &nbsp;- <p>
            <p class="text-dark"> hdfc10001</p>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>

            <div class="col-md-5">
                        <!-- Upload Area -->               
            <div id="uploadArea" class="upload-area">
            <!-- Header -->
            <div class="upload-area__header">
            <h5>Upload your file</h5>
            <p class="upload-area__paragraph text-danger"style="margin-top:-0.5rem;">File should be an image
            <strong class="upload-area__tooltip">Like
            <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
            </strong>
            </p>
            </div>
            <!-- End Header -->
            <!-- Drop Zoon -->
            <div id="dropZoon" class="upload-area__drop-zoon drop-zoon"style="height:4.25rem!important;margin-top:-0.5rem;">
            <span class="drop-zoon__icon">
            <i class='bx bxs-file-image'></i>
            </span>
            <p class="drop-zoon__paragraph text-success">Drop your file here or Click to browse</p>
            <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
            <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
            <input type="file" id="fileInput" name="previewImage" class="drop-zoon__file-input" accept="image/*">
            </div>
            <!-- End Drop Zoon -->
            <span id="updateMessage">&nbsp;&nbsp;</span>
            <!-- File Details -->
            <div id="fileDetails" class="upload-area__file-details file-details">
            <div id="uploadedFile" class="uploaded-file">
            <div class="uploaded-file__icon-container">
            <i class='bx bxs-file-blank uploaded-file__icon'></i>
            <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
            </div>          
            <div id="uploadedFileInfo" class="uploaded-file__info">
            <span class="uploaded-file__name">Proejct 1</span>
            <span class="uploaded-file__counter">0%</span>
            </div>
            </div>
            </div>
            </div>
     
            </div>
            </div>
           
            </div>
            <div class="col-md-1"></div>

            <div class="row mb-5">
            <div class="col-md-5"></div>
            <div class="col-md-7">
            <button type="submit" class="btn btn-primary float-center mt-2" id="saveDetails"><i class="fa fa-save"></i> &nbsp;&nbsp;Donate </button>
            </div>
            </div>

            </div>
            </form>
            <!-- --------------------------- News List Section End ------------------- -->
            </div>
            </div>
            </div>
            </div>          
            </div>          
            <script src="<?php echo base_url('assets/js/admin/employee.js') ?>"></script>

<script>
    
    var donationListMan = '';            
     $(document).ready(function() {
     let searchObj = {};
     var targetAction = $('#donatePay').attr('data-id');
     donationListMan = {
     printTable: function(search_data) {
     getpaginate(search_data, '#donatePay', targetAction, 'Only For Tnx id, Month.');
     }
     };
     donationListMan.printTable(searchObj);           
     });

     function validateEmail(input) {
    input.value = input.value.toLowerCase().replace(/[^a-z0-9@.]/g, '');
    const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
    const errorMessage = document.getElementById('error-message');
    if (!emailPattern.test(input.value)) {
        errorMessage.textContent = "Invalid email address.";
    } else {
        errorMessage.textContent = "";
    }
}

$(document).ready(function() {
            $("#email").keyup(function() {
                var email = $(this).val();
                var emailRegex = /^[a-zA-Z0-9._-]+@[a-zAZ0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (emailRegex.test(email)) {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url() ?>site/test_3',
                        data: {
                            email: email
                        },
                        dataType: 'json', 
                        success: function(response) {  
                            if (response.name) {
                                $('#name').val(response.name);
                            }
                            if (response.father_name) {
                                $('#f_name').val(response.father_name);
                            }
                            if (response.mobile_number) {
                                $('#mobile').val(response.mobile_number);
                            }
                            if (response.address) {
                                $('#address').val(response.address);
                            }
                        },

                    });
                }
            });
        });

     $(document).ready(function () { 
    $("#donate-payment").hide(); 
    $("#amount").keyup(function () {
        if (!$("#amount").val().trim()) {
            $("#donate-payment").hide();
        } else {
            $("#donate-payment").show();
        }
    });
});
$('#imageInput').on('change', function() {
	$input = $(this);
	if($input.val().length > 0) {
		fileReader = new FileReader();
		fileReader.onload = function (data) {
		$('.image-preview').attr('src', data.target.result);
		}
		fileReader.readAsDataURL($input.prop('files')[0]);
		$('.image-button').css('display', 'none');
		$('.image-preview').css('display', 'block');
		$('.change-image').css('display', 'block');
	}
});
						
$('.change-image').on('click', function() {
	$control = $(this);			
	$('#imageInput').val('');	
	$preview = $('.image-preview');
	$preview.attr('src', '');
	$preview.css('display', 'none');
	$control.css('display', 'none');
	$('.image-button').css('display', 'block');
});

$(document).ready(function () {
        $("#create").on("submit", function (e) {
        e.preventDefault(); 
        $.ajax({
            type: "POST",
            url: '<?= base_url() ?>donation/pay/index/donate_now',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            dataType:'json',
            success: function (htmlAmi) 
            {
              $('#saveDetails').prop('disabled', true).text('Submitting...');
              toastMultiShow(htmlAmi.addClas, htmlAmi.msg, htmlAmi.icon);
              if (htmlAmi.addClas == 'tSuccess') { setTimeout(function() { window.location.href = htmlAmi.returnLoc ; }, 2000); }
             }
            }); });});

</script>

    <style>
    /* donation manage css start form here */
    .custom-height{height:9rem;}.custom-border-1{border:1px  solid #e3e3e3;}
    .cus-ml{margin-left:0.4rem;}
    /* donation manage css end here */
     .file-upload-wrapper {
            position: relative;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .file-upload-box {
            position: relative;
            padding: 2rem;
            text-align: center;
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
            cursor: pointer;
            width: 100%;
        }

        .file-upload-box:hover {
            background-color: #e9ecef;
            border-color: #adb5bd;
        }

        .file-upload-input {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            z-index: 1;
        }

        .upload-content {
            position: relative;
            z-index: 0;
        }

        .upload-icon {
            font-size: 2.5rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .file-list {
            margin-top: 1.5rem;
        }

        .file-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            margin-bottom: 0.5rem;
            transition: all 0.2s ease;
        }

        .file-item:hover {
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .file-icon {
            color: #6c757d;
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }

        .file-name {
            flex-grow: 1;
            color: #495057;
            text-decoration: none;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-right: 1rem;
        }

        .file-name:hover {
            color: #007bff;
            text-decoration: none;
        }

        .remove-file {
            color: #dc3545;
            cursor: pointer;
            padding: 0.25rem 0.5rem;
            font-size: 1.25rem;
            transition: color 0.2s ease;
            flex-shrink: 0;
        }

        .remove-file:hover {
            color: #c82333;
        }

        .drag-over {
            background-color: #e9ecef;
            border-color: #007bff;
        }

        /* Add loading animation */
        @keyframes upload-progress {
            0% { width: 0%; }
            100% { width: 100%; }
        }

        .upload-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background-color: #007bff;
            animation: upload-progress 1s ease-in-out;
        }
        .qr-img-man{height: 9rem;margin-top: 2rem;border:1px solid #d2d2d2;border-radius:0.5rem;}
</style>


