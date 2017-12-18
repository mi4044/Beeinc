



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
        }, 'easeInOutExpo');
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


