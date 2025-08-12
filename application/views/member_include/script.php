<script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    function isformValidate() {


        var name = document.getElementById('name_donate').value;
        var email = document.getElementById("emailId_donate").value;
        var number = document.getElementById("mobile_no_donate").value;
        var message = document.getElementById("message_donate").value;
        var Amount = document.getElementById("donAmount").value;
        var Images = document.getElementById("payment_img").value;
        const btn = document.getElementById("diabled-add");


        var emailRegex = /^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var phoneRegex = /^\d{10}$/;
        var namePattern = /^[A-Za-z\s\-]+$/;
        var regexMessage = /^[a-zA-Z0-9., ]*$/;

        if (!name) {
            alert("Enter Name");
            return false;
        } else if (!namePattern.test(name)) {
            alert("Enter Valid Name");
            return false;
        } else if (!number) {
            alert("Enter Mobile Number");
            return false;
        } else if (!phoneRegex.test(number)) {
            alert("Enter Valid Mobile Number");
            return false;
        } else if (!email) {
            alert("Enter Email id");
            return false;
        } else if (!emailRegex.test(email)) {
            alert("Enter Valid Email");
            return false;
        } else if (!Amount) {
            alert("Enter Amount");
            return false;
        }
        else if (!message) {
            alert("Enter Message");
            return false;
        } else if (!regexMessage.test(message)) {
            alert("Enter Valid Message");
            return false;
        } else if (!Images) {
            alert("Please Upload an image");
            return false;
        } else {

            return true;
        }

    }
</script>

<script>
    $(document).ready(function () {
        // Initialize NGO Image Carousel
        $(".owl-carousels-images").owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

        // Initialize Testimonials Carousel
        $(".testimonials").owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 4000,
            items: 1,
            /* Ensure proper display */
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });


        // Initialize projects Carousel
        $(".projects").owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 4000,
            items: 1,
            /* Ensure proper display */
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $(".isActived").click(function (e) {
            e.preventDefault();


            let deviceType = getDeviceType();
            if (deviceType == "Mobile") {
                $('.sidebar').toggleClass("active-aside");
            }

            //alert(deviceType);
            console.log("Device Type: " + deviceType);



            // Remove "active" class from all menu items
            $(".isActived").removeClass("active-all");

            // Add "active" class to clicked item
            $(this).addClass("active-all");

            // Get target content div ID
            var targetDiv = $(this).attr("data-target");

            // Hide all content divs
            $(".content-div").hide();

            // Show the clicked content div
            $("#" + targetDiv).fadeIn();
        });
    });



    function getDeviceType() {
        var userAgent = navigator.userAgent.toLowerCase();
        if (/mobile/i.test(userAgent)) {
            return "Mobile";
        } else if (/tablet/i.test(userAgent)) {
            return "Tablet";
        } else if (/desktop/i.test(userAgent) || !/mobile/i.test(userAgent)) {
            return "Desktop";
        } else {
            return "Unknown";
        }
    }

</script>

<script>
    $(document).ready(function () {
        $("#Menushow").click(function (e) {

            e.stopPropagation();
            $(".sidebar").toggleClass("active-aside");
        });


        $(document).click(function () {
            $(".sidebar").removeClass("active-aside");
        });

        $(".sidebar").click(function (e) {
            e.stopPropagation();
        });
    });
</script>

<script>
    $(document).ready(function () {
        $(".pop-whatsapp").click(function (e) {
            e.stopPropagation();
            var linkHref = $(this).find('a').attr('href');
            var id = $(this).data('id');
            var path = $(this).data('path');
            $('#tickec_id').val(id);
            $('#chat').html("");
            $.ajax({
                type: "POST", url: path,
                data: { 'id': id },

                success: function (response) {
                    var data = JSON.parse(response);
                    console.log(data);

                    if (data.status === 'success') {
                        data.data.forEach(function (row) {
                            var message = '';
                            if (row.mem_id == 1001) {
                                message = ' <div class="mt-3">' + '<div class="left-chat px-2" id="admin">' + row.discription + '</div>' + '</div>';
                                $('#chat').append(message).css('color', 'white');
                            } else {
                                message = '<div class="d-flex justify-content-end mt-3">' + '<div class="right-chat px-2" id="member">' + row.discription + '</div>' + '</div>';
                                $('#chat').append(message).css('color', 'white');
                            }
                        });
                    }
                },
            });

            $(".click-visible").fadeIn(300).css("display", "flex");
            $(".add-blur-bg").css({
                "display": "block",
                "background": "#000000c4",
                "top": "0px",
                "position": "absolute",
                "left": "0px",
                "right": "0px",
                "bottom": "0px",
                "width": "100%",
                "padding": "0px !important",
                "opacity": "1",
                "z-index": "100",
                "backdrop-filter": "blur(4px)"
            });
        });

        $(document).click(function () {
            $(".click-visible").fadeOut(300);
            $(".add-blur-bg").css({
                "display": "none",
                "background": "none",
                "padding": "0px !important",
                "backdrop-filter": "blur(0px)"
            });
        });

        $(".click-visible").click(function (e) {
            e.stopPropagation();

        });
    });
</script>

<script>
    function scrollToBottom() {
        var chatBox = $("#chat");
        chatBox.animate({
            scrollTop: chatBox[0].scrollHeight
        }, 500);
    }
</script>






<script>
    function previewImage() {
        const file = document.getElementById('payment_img').files[0];
        const preview = document.getElementById('image-preview');
        const uploadMessage = document.getElementById('upload-message');
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = "block";
                uploadMessage.style.opacity = "0";
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = "none";
            uploadMessage.style.opacity = "1";
        }
    }

    $(document).ready(function () {
        $("#LogedMemDonation").on("submit", function (e) {
            alert("Hello sir");
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>member/dashboard/LogedMemDonation',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log("success");
                    window.location.reload(true);
                },
            });
        });
    });


    $(document).ready(function () {
        $("#donate-payment").hide();
        $("#donAmount").keyup(function () {
            if (!$("#donAmount").val().trim()) {
                $("#donate-payment").hide();
            } else {
                $("#donate-payment").show();
            }
        });
    });
</script>



<script>
    // MobMenuManForAn  mEnU
    $(document).ready(function () {
        $("#MobMenuManForAn").on("click", function () {
            $("#mEnU").css("background-color", "#057c05");
        });
        $("#MobMenuManForAn").click(function () {
            $("#mEnU").toggle();
        });
    });



    $(function () {
        $(document).unbind("click", '.ActnCmdByAmi').on("click", '.ActnCmdByAmi', function () {
            let actNbtn = $(this).attr('id');
            let uriActn = $(this).attr('data-id');
            $.post(uriActn, {
                endDt: 'confirm'
            },
                function (htmlAmi) {
                    var frame1 = $('<iframe />');
                    frame1[0].name = "frame1";
                    $("body").append(frame1);
                    var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                    frameDoc.document.open();
                    frameDoc.document.write(htmlAmi);
                    frameDoc.document.close();
                    setTimeout(function () {
                        window.frames["frame1"].focus();
                        window.frames["frame1"].print();
                        frame1.remove();
                    }, 500);
                });
        });
    });


    $(document).ready(function () {
        $("#newPassword").hide();
        $("#confPass").hide();
        $("#errorMessageSection").hide();
        $("#successMessageSection").hide();

        var userPass = $('#userPass').val();
        var userEmail = $('#userEmail').val();
        $('#oldPassword, #userEmail').on('keyup', function () {
            var oldPassword = $('#oldPassword').val();
            var email = $('#userEmail').val();
            if (oldPassword === userPass && email === userEmail) {
                $("#newPassword").show();
                $("#confPass").show();
                $("#errorMessageSection").hide();
                $("#successMessageSection").fadeIn().delay(1000).fadeOut();
            } else {
                $("#newPassword").hide();
                $("#confPass").hide();
                $("#successMessageSection").hide();
                $("#errorMessageSection").fadeIn().delay(1000).fadeOut();
            }
        });
    });
</script>