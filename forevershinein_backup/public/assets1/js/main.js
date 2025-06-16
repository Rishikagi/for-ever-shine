(function($) {
    "use strict";
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 120) {
            $('.header-area').addClass("is-sticky");
        } else {
            $('.header-area').removeClass("is-sticky");
        }
    });
    $('.home-slider').owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        autoplayHoverPause: true,
        autoplay: true,
        autoHeight: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        items: 1,
        smartSpeed: 1500,
    });
    jQuery(window).on('load', function() {
        $(".preloader").delay(1600).fadeOut("slow");
    });
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 768px)").matches) {
            $dropdown.hover(function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            }, function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            });
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    var submitIcon = $('.search-btn i');
    var inputBox = $('.searchbox-input');
    var searchBox = $('.searchbox');
    var isOpen = false;
    submitIcon.click(function() {
        if (isOpen == false) {
            searchBox.addClass('searchbox-open');
            submitIcon.attr('class', 'fa fa-search');
            inputBox.focus();
            isOpen = true;
        } else {
            searchBox.removeClass('searchbox-open');
            submitIcon.attr('class', 'fa fa-search');
            inputBox.focusout();
            isOpen = false;
        }
    });
    submitIcon.mouseup(function() {
        return false;
    });
    searchBox.mouseup(function() {
        return false;
    });
    $(document).mouseup(function() {
        if (isOpen == true) {
            $('.searchbox-icon').css('display', 'block');
            submitIcon.click();
        }
    });

    function makeTimer() {
        var endTime = new Date("29 April 2021 9:56:00 GMT+01:00");
        endTime = (Date.parse(endTime) / 1000);
        var now = new Date();
        now = (Date.parse(now) / 1000);
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        if (hours < "10") {
            hours = "0" + hours;
        }
        if (minutes < "10") {
            minutes = "0" + minutes;
        }
        if (seconds < "10") {
            seconds = "0" + seconds;
        }
        $("#days").html(days + "<span>Days</span>");
        $("#hours").html(hours + "<span>Hours</span>");
        $("#minutes").html(minutes + "<span>Minutes</span>");
        $("#seconds").html(seconds + "<span>Seconds</span>");
    }
    setInterval(function() {
        makeTimer();
    }, 1000);
    $('.quantity').on('click', '.plus', function(e) {
        let $input = $(this).prev('input.qty');
        let val = parseInt($input.val());
        $input.val(val + 1).change();
    });
    $('.quantity').on('click', '.minus', function(e) {
        let $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        if (val > 0) {
            $input.val(val - 1).change();
        }
    });

    $('.related-product-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        smartSpeed: 700,
        navText: ["<i class='fa fa-angle-left' ></i>", "<i class='fa fa-angle-right' ></i>"],
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            1000: {
                items: 5
            }
        }
    });

    $('.logo-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        smartSpeed: 300,
        autoplay:true,
        navText: ["<i class='fa fa-angle-left' ></i>", "<i class='fa fa-angle-right' ></i>"],
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 5
            },
            1000: {
                items: 7
            }
        }
    });

    $('.youtube-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        smartSpeed: 300,
        navText: ["<i class='fa fa-angle-left' ></i>", "<i class='fa fa-angle-right' ></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });

    $('.testimonial-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        smartSpeed: 700,
        navText: ["<i class='fa fa-angle-left' ></i>", "<i class='fa fa-angle-right' ></i>"],
        items: 1,
    });

    function getVals() {
        let parent = this.parentNode;
        let slides = parent.getElementsByTagName("input");
        let slide1 = parseFloat(slides[0].value);
        let slide2 = parseFloat(slides[1].value);
        if (slide1 > slide2) {
            let tmp = slide2;
            slide2 = slide1;
            slide1 = tmp;
        }
        let displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
    }
    window.onload = function() {
        let sliderSections = document.getElementsByClassName("range-slider");
        for (let x = 0; x < sliderSections.length; x++) {
            let sliders = sliderSections[x].getElementsByTagName("input");
            for (let y = 0; y < sliders.length; y++) {
                if (sliders[y].type === "range") {
                    sliders[y].oninput = getVals;
                    sliders[y].oninput();
                }
            }
        }
    }
    $(window).on('scroll', function() {
        var scrolled = $(window).scrollTop();
        if (scrolled > 500) $('.top-bottom-scroll').addClass('fixed');
        if (scrolled < 500) $('.top-bottom-scroll').removeClass('fixed');
    });
    $(".top-bottom-scroll i").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });
}(jQuery));