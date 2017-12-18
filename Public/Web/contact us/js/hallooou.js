// jQuery to collapse the navbar on scroll
function resetScroll() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $(".scroll-top").fadeIn('2000', "easeInOutExpo");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".scroll-top").fadeOut('2000', "easeInOutExpo");
    }
}
$(window).scroll(function () {
    resetScroll();
});
$(function () {
    resetScroll();
});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
    $('.overlay-menu ul li a,.scroll-top a,.navbar-nav a,footer .link a').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});



// jQuery Parallax. More info here-> https://github.com/IanLunn/jQuery-Parallax
$(function () {
    // apply parallax effect only when body has the ".parallax-page" class
    if ($('body').hasClass('parallax-page')) {
        //.parallax(xPosition, speedFactor, outerHeight) options:
        //xPosition - Horizontal position of the element
        //inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
        //outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport

        $('#parallax-slide').parallax("50%", 0.1);
        $('#products').parallax("50%", 0.1);
        $('#portfolio').parallax("50%", 0.1);
        $('#page-aboutus').parallax("50%", 0.1);
    }
});


// Closes the Responsive Menu on Menu Item Click
$('.overlay-menu ul li a').click(function () {
    $('.button_container:visible').click();
});


// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
    $('a.page-scroll').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});


// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function () {
    $('.navbar-toggle:visible').click();
});

// Navigation show/hide
$('.toggle').click(function () {
    if ($('#overlay.open')) {
        $(this).toggleClass('active');
        $('#overlay').toggleClass('open');
    }
});
