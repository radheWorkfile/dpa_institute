<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content="">
    <title>Donate Us || NGO</title>
    <?php include("includes/css.php"); ?>

</head>
<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container-fluid p-0">
        <img src="<?php echo base_url(); ?>website_assets/Hero-section/donate-us.png" class="w-100" alt="">
    </div>


    <section class="py-5 mt-5 container-fluid py-2 py-lg-5 contactB-g messDonationForm"style="display:none;">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">
        <img src="<?php echo base_url(); ?>front/ngo_img/banner/donationCom.JPG" class="w-100 ComminHero" style="border-radius:1rem;box-shadow:1px 1px 11px grey;" alt="">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5 mt-5">
        <p id="messageDisplay">&nbsp;&nbsp;</p>
        </div>
        <div class="col-md-1"></div>
      </div>
    </section>




    <div class="container-fluid my-2 my-lg-5 donationForm">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div>
                        <img src="<?php echo base_url() ?>website_assets/all/donote-left.png" class="w-100" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-8 d-flex align-items-center">
                    <div class=" p-2 p-md-3 p-lg-4 ">
                        <form id="donateNow" method="POST" enctype="multipart/form-data" class="">
                            <div>
                                <div id="errorMessage" style="color: red; margin-bottom: 10px;"></div>
                                <h3 class="fw-bolder animated-text">Let's Donate</h3>
                                <p>“ Support us today by donating through our Donation page. We’re here to assist with any questions and guide you through the process. ”</p>
                                <div class="col-12 d-md-flex gap-2 ">
                                    <div class="col-12 col-md-6 my-2">
                                        <div>
                                            <input placeholder="Your Name" name="name" id="name"
                                                oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')"
                                                type="text" class="p-2 hovering-doner-none w-100"  >
                                        <div id="name_error" style="color: red;"></div>

                                        </div>


                                        <div class="my-2"> 
                                            <input placeholder="Enter Father Name" name="f_name" id="f_name" type="text"
                                                class="p-2 w-100 hovering-doner-none"  oninput="this.value=this.value.replace(/[^a-zA-Z\s]/g,'').replace(/\s+/g,' ')" require > 
                                                <div id="f_name_error" style="color: red;"></div> 
                                        </div>



                                        <div class="my-2"> 
                                    <input placeholder="Your Address Here" name="address" id="address" 
                                        class=" hovering-doner-none p-2 w-100" type="text" require  oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9,. ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());">
                                        <div id="address_error" style="color: red;"></div>
                                </div>    
                                       
                                    </div>
                                    <div class="col-12 col-md-6 ml-0 ml-lg-1 my-2">
                                        <div>
                                            <input placeholder="Your Email Address" id="email" name="email"
                                                class=" p-2 w-100 hovering-doner-none" type="text" >
                                                <div id="email_error" style="color: red;"></div> 
                                        </div>
                                        
                                        <div class="my-2">
                                            <input placeholder="Enter Phone Number" name="mobile" id="mobile" type="text"
                                                class="p-2 w-100 hovering-doner-none" require  oninput="this.value=this.value.replace(/[^0-9]/g,'').replace(/(\ *?)\ */g,'$1')" value="" maxlength="10">
                                                <div id="mobile_error" style="color: red;"></div> 
                                        </div>
                                        <div>
                                            <input placeholder="Your Amount Here" id="amount" name="amount"
                                                class="hovering-doner-none p-2 w-100"  type="text" require oninput="this.value=this.value.replace(/[^0-9 .]/g,'').replace(/(\ *?)\ */g,'$1')" value="" maxlength="33">
                                                <div id="amount_error" style="color: red;"></div>
                                        </div>
                                    </div>
                                </div>   

                               

                                <div>
                                    <textarea placeholder="Type your Message Here...."
                                        class="w-100 p-2 hovering-doner-none" rows="4" name="message" id="message" require
                                        oninput="this.value = this.value.toLowerCase().replace(/[^a-z0-9,. ]/g, '').replace(/\s+/g, ' ').replace(/\b\w/g, char => char.toUpperCase());"
                                        ></textarea>
                                        <div id="message_error" style="color: red;"></div>
                                </div>


                                <div class="row" id="donate-payment">
                                <!-- payment method section start form here  -->
                                <div class="row">
                                <p class="text-center py-3 px-5">"Your small donation can make a big difference, providing food, shelter, education, and hope to poor people in need. Act now to help!" </p>
                                 <div class="col-md-1"></div>
                                <div class="col-md-3">
                                <p><img src="<?php echo base_url();?>front/qr-code.png" alt="" class="qr-img-man"></p>
                                </div>
                                <div class="col-md-6">
                                <div class="row"style="border:1px dashed #aaa3a3;padding:0.8rem 0.5rem 1rem 0.5rem;">
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

                                 <div class="row mb-4">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                    <div class="upload-container" onClick="document.getElementById('payment_img').click();">
                                    <p id="upload-message">Click anywhere here to upload an image</p>
                                    <input type="file" require id="payment_img" name="payment_img" style="display: none;" accept="image/*" onChange="previewImage();">
                                    <!-- Image preview will appear here -->
                                     <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-5">
                                        <img id="image-preview" src="" alt="Image Preview">
                                        </div>
                                        <div class="col-md-3"></div>
                                     </div>
                                    </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                 </div>
                                    <!-- payment method section start form here  -->
                                  </div>

                                <div>
                                    <button class="btn donAmo btn-success w-100 messagetxttt" type="submit" id="donate_submit">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include("includes/footer.php"); ?>
    <?php include("includes/script.php"); ?>

    <script>

$(document).ready(function () {
    $("#LogedMemDonation").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '<?= base_url() ?>member/dashboard/LogedMemDonation',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (response) {
                $('.messagetxttt').prop('disabled', true).text('Submitting...');
                setTimeout(function() {
                    window.location.reload(true);
                }, 1000);
            },
        });
    });
});


$(document).ready(function () { 
    $("#donate-payment").hide(); 
    $("#amount").keyup(function () {
        if (!$("#amount").val().trim()) {
            $("#donate-payment").hide();
        }else {
            $("#donate-payment").show();
        }
    });
});



$(document).ready(function () {
    $("#email").keyup(function () {
        var email = $(this).val();  
        var emailRegex = /^[a-zA-Z0-9._-]+@[a-zAZ0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (emailRegex.test(email)) {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url() ?>site/test_3', 
                data: { email: email }, 
                dataType: 'json',
                success: function(response) {   
                    if (response.name) { $('#name').val(response.name);  } 
                    if (response.father_name) { $('#f_name').val(response.father_name);  } 
                    if (response.address) { $('#address').val(response.address);  } 
                    if (response.mobile_number) { $('#mobile').val(response.mobile_number);  }        
                },
                
            });
        }
    });
});




    function previewImage() {
        const file = document.getElementById('payment_img').files[0];
        const reader = new FileReader();
        reader.onloadend = function () {
            const imagePreview = document.getElementById('image-preview');
            const uploadMessage = document.getElementById('upload-message');
            if (file) {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block'; 
                uploadMessage.style.display = 'none'; 
            }
        };
        if (file) {
            reader.readAsDataURL(file);
        }
    }


    $(document).ready(function () {
    $("#donateNow").submit(function(e) {
        e.preventDefault();
       
        $.ajax({
            type: "POST",
            url: '<?= base_url() ?>site/donation',
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType:'json',
            success: function(response) 
			{
				if(response.status=="success"){
                	$(".donationForm").hide();
                	$(".messDonationForm").show();
                	$("#messageDisplay").html(response.data); 
                }else{
                    $('#email_error').html(response.msg.email).focus().fadeIn().delay(1000).fadeOut();
					}
           		  }
                });
    });});




    $(document).ready(function() {
    $("#donateNow").on("submit", function(e) {
        e.preventDefault(); 

        $('.error').text('').fadeOut();
        $('#errorMessage').text('').fadeOut();

        var userName = $('#name').val();
        var fName = $('#f_name').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var amount = $('#amount').val();
        var message = $('#message').val();
        var address = $('#address').val();

        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        var mobilePattern = /^[0-9]{10}$/;

        var valid = true;

        if (!userName) showError('#name_error', 'Name is required!', '#name');
        if (!fName) showError('#f_name_error', 'Father Name is required!', '#f_name');
        if (!email) {
            showError('#email_error', 'Email is required!', '#email');
        } else if (!emailPattern.test(email)) {
            showError('#email_error', 'Please enter a valid email address.', '#email');
        }
        if (!mobile) {
            showError('#mobile_error', 'Mobile number is required!', '#mobile');
        } else if (!mobilePattern.test(mobile)) {
            showError('#mobile_error', 'Please enter a valid mobile number (10 digits).', '#mobile');
        }
        if (!amount || amount <= 0) showError('#amount_error', 'Amount must be greater than zero.', '#amount');
        if (!message) showError('#message_error', 'Message is required!', '#message');
        if (!address) showError('#address_error', 'Address is required!', '#address');

        if (!valid) {
            $('#errorMessage').text('Please fill out all required fields correctly!').fadeIn();
            $('#donate_submit').prop('disabled', true).text('Please fix the errors first.');

            setTimeout(function() {
                $('#errorMessage').fadeOut();
                $('.error').fadeOut();
                $('#donate_submit').prop('disabled', false).text('Submit');
            }, 3000);
            return false;
        }

        $('#donate_submit').prop('disabled', true).text('Submitting...');
    });

    function showError(errorSelector, message, focusSelector) {
        $(errorSelector).text(message).fadeIn();
        if (!valid) $(focusSelector).focus();
        valid = false;
    }

    $('input, textarea').on('input', function() {
        var inputId = $(this).attr('id');
        var errorSelector = '#' + inputId + '_error';

        if ($(this).val()) {
            $(errorSelector).fadeOut();
        }
    });
});





    



</script>

</body>

</html>