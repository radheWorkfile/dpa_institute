<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>website_assets/js/navbar.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="<?php echo base_url() ?>website_assets/js/common.js"></script>



<!-- faq section start -->
<script>
    $(document).ready(function() {
        // Toggle visibility of the form when clicking on the question
        $("#faq1").click(function() {
            $("#faqAns1").slideToggle();
            $("#faqAns2").slideUp(); // Close the other form
            $("#faqAns3").slideUp(); // Close the other form
            $("#faqAns4").slideUp(); // Close the other form
            $("#faqAns5").slideUp(); // Close the other form
        });
        $("#faq2").click(function() {
            $("#faqAns2").slideToggle();
            $("#faqAns1").slideUp(); // Close the other form
            $("#faqAns3").slideUp(); // Close the other form
            $("#faqAns4").slideUp(); // Close the other form
            $("#faqAns5").slideUp(); // Close the other form
        });
        $("#faq3").click(function() {
            $("#faqAns3").slideToggle();
            $("#faqAns1").slideUp(); // Close the other form
            $("#faqAns2").slideUp(); // Close the other form
            $("#faqAns4").slideUp(); // Close the other form
            $("#faqAns5").slideUp(); // Close the other form
        });
        $("#faq4").click(function() {
            $("#faqAns4").slideToggle();
            $("#faqAns1").slideUp(); // Close the other form
            $("#faqAns2").slideUp(); // Close the other form
            $("#faqAns3").slideUp(); // Close the other form
            $("#faqAns5").slideUp(); // Close the other form
        });
        $("#faq5").click(function() {
            $("#faqAns5").slideToggle();
            $("#faqAns1").slideUp(); // Close the other form
            $("#faqAns2").slideUp(); // Close the other form
            $("#faqAns3").slideUp(); // Close the other form
            $("#faqAns4").slideUp(); // Close the other form
        });
    });
</script>

<script>
    AOS.init();
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        gsap.registerPlugin(ScrollTrigger);

        // Select all animated text elements
        document.querySelectorAll(".animated-text").forEach(textElement => {
            // Split text into individual characters
            let text = new SplitType(textElement, {
                types: "chars"
            });

            // Apply GSAP animation on scroll
            gsap.from(text.chars, {
                opacity: 0,
                y: 50,
                rotateX: 90,
                stagger: 0.05,
                duration: 1.2,
                ease: "power3.out",
                scrollTrigger: {
                    trigger: textElement,
                    start: "top 80%", // Start animation when 80% of section is visible
                    toggleActions: "play none none none", // Only play once
                }
            });
        });
    });
</script>

<script>
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
            var paymentImg = $('#payment_img').val();

            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA0-9]{2,6}$/;
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

            if (!paymentImg) {
                showError('#payment_img_error', 'Please upload a payment image.', '#payment_img');
            }

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