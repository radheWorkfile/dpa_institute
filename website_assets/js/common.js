
// preloader start
window.addEventListener("load", function () {
    document.getElementById("preloader").style.display = "none";
});

$(window).on("load", function () {
    $("#preloader").fadeOut("slow");
});
// preloader end


// cursor effect start
const cursor = document.querySelector(".cursor");

let mouseX = 0, mouseY = 0;
let cursorX = 0, cursorY = 0;

document.addEventListener("mousemove", (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
});

function animateCursor() {
    cursorX += (mouseX - cursorX) * 0.1;
    cursorY += (mouseY - cursorY) * 0.1;
    cursor.style.left = `${cursorX}px`;
    cursor.style.top = `${cursorY}px`;
    requestAnimationFrame(animateCursor);
}

animateCursor();
// cursor effect end


// Hero section slider start

const swiper = new Swiper('.swiper', {

    direction: 'horizontal',
    // loop: true,


    pagination: {
        el: '.swiper-pagination',
    },

    autoplay: {
        delay: 3000,
        // disableOnInteraction: false, 
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // scrollbar: {
    //     el: '.swiper-scrollbar',
    // },
});

// Hero section slider end


// owl carousel project section start
$(document).ready(function () {
    $(".carousel-first").owlCarousel({
        loop: true,               // Infinite loop
        margin: 10,               // Space between items
        // Show navigation arrows
        dots: true,               // Show pagination dots
        autoplay: true,           // Enable auto sliding
        autoplayTimeout: 3000,    // Time between slides (in ms)
        autoplayHoverPause: true, // Pause on hover
        responsive: {
            0: { items: 1 },      // 1 item in mobile
            800: { items: 2 },    // 2 items in tablets
            1000: { items: 1 }    // 3 items in desktops
        }
    });

});

$(document).ready(function () {
    // Second Carousel (Products)
    $(".carousel-two").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplay: true,
        responsive: {
            0: { items: 1 },
            768: { items: 1 },
            1024: { items: 1 }
        }
    });
})



$(document).ready(function () {
    $(".carousel-thirrrd").owlCarousel({
        loop: true,                // Infinite loop
        margin: 10,                // Space between items
        dots: true,                // Show pagination dots
        autoplay: true,            // Auto-slide enabled
        autoplayTimeout: 2000,     // Time between slides (in ms)
        autoplayHoverPause: true,  // Pause on hover
        responsive: {
            0: { items: 1 },       // 1 item for mobile screens
            600: { items: 2 },     // 2 items for medium screens (tablets)
            1000: { items: 4 }     // 3 items for large screens (desktops)
        }
    });
});


$(document).ready(function () {
    $(".owl-carousel-project").owlCarousel({
        loop: true,                // Infinite loop
        margin: 10,                // Space between items
        dots: true,                // Show pagination dots
        autoplay: true,            // Auto-slide enabled
        autoplayTimeout: 2000,     // Time between slides (in ms)
        autoplayHoverPause: true,  // Pause on hover
        responsive: {
            0: { items: 1 },       // 1 item for mobile screens
            600: { items: 1 },     // 2 items for medium screens (tablets)
            1000: { items: 1 }     // 3 items for large screens (desktops)
        }
    });
});
$(document).ready(function () {
    $(".owl-carousel-aboutTeam").owlCarousel({
        loop: true,                // Infinite loop
        margin: 10,                // Space between items
        dots: true,                // Show pagination dots
        autoplay: true,            // Auto-slide enabled
        autoplayTimeout: 2000,     // Time between slides (in ms)
        autoplayHoverPause: true,  // Pause on hover
        responsive: {
            0: { items: 1 },       // 1 item for mobile screens
            600: { items: 2 },     // 2 items for medium screens (tablets)
            1000: { items: 3 }     // 3 items for large screens (desktops)
        }
    });
});


// owl carousel project section end







