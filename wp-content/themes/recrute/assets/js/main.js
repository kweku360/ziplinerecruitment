; (function ($) {
  "use strict";
  $(document).ready(function () {

    // Handle breadcrumb background images
    $('.common-hero[data-background]').each(function() {
      var bgImage = $(this).attr('data-background');
      if (bgImage && bgImage !== '') {
        $(this).css('background-image', 'url(' + bgImage + ')');
      }
    });

    if ($('.main-menu-content').length && $('.mobile-menu-content').length) {
      let navContent = document.querySelector(".main-menu-content").outerHTML;
      let mobileNavContainer = document.querySelector(".mobile-menu-content");
      mobileNavContainer.innerHTML = navContent;

      let arrow = $(".mobile-menu-content .has-dropdown > a");
	
      arrow.each(function () {
        let self = $(this);
        let arrowBtn = document.createElement("BUTTON");
        arrowBtn.classList.add("dropdown-toggle-btn");
        arrowBtn.innerHTML = "<i class='fal fa-angle-right'></i>";
    
        self.append(function () {
          return arrowBtn;
        });
    
        self.find("button").on("click", function (e) {
          e.preventDefault();
          let self = $(this);
          self.toggleClass("dropdown-opened");
          self.parent().toggleClass("expanded");
          self.parent().parent().addClass("dropdown-opened").siblings().removeClass("dropdown-opened");
          self.parent().parent().children(".vl-submenu").slideToggle();
        });
    
      });

    }
    
    $('.main-menu-ex > nav > ul > li').slice(-2).addClass('menu-last');

    // sticky header active
    if ($('.header-area').length > 0) {
      $(window).on('scroll', function (event) {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
          $('.header-area').removeClass('sticky');
        } else {
          $('.header-area').addClass('sticky');
        }
      });
    }




    $(".header-search-btn").on("click", function (e) {
      e.preventDefault();
      $(".header-search-form-wrapper").addClass("open");
      $('.header-search-form-wrapper input[type="search"]').focus();
      $('.body-overlay').addClass('active');
    });
    $(".tx-search-close").on("click", function (e) {
      e.preventDefault();
      $(".header-search-form-wrapper").removeClass("open");
      $("body").removeClass("active");
      $('.body-overlay').removeClass('active');
    });



    var blog_gallery_slider = $('.blog_gallery_slider');

    blog_gallery_slider.owlCarousel({
      loop: true,
      nav: true,
      navText:['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
      items: 1,
      dots: false,
      autoplay: true,
      autoplaySpeed:1000
      
    });


    //service 7
    $(".case7-slider").slick({
      autoplay: true,
      autoplaySpeed: 1500,
      margin: "30",
      slidesToShow: 3,
      arrows: true,
      centerMode: false,
      loop: true,
      centerMode: false,
      prevArrow: $(".case7-prev-arrow1"),
      nextArrow: $(".case7-next-arrow1"),
      draggable: true,
      centerPadding: "40px",
      dots: false,
      scroll: true,
      responsive: [
        {
          breakpoint: 769,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: "40px",
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: "40px",
            slidesToShow: 1,
          },
        },
      ],
    });

    //service 7

    $(".service7-slider").slick({
      autoplay: true,
      autoplaySpeed: 1500,
      margin: "30",
      slidesToShow: 3,
      arrows: true,
      centerMode: false,
      loop: true,
      centerMode: false,
      prevArrow: $(".service7-prev-arrow1"),
      nextArrow: $(".service7-next-arrow1"),
      draggable: true,
      centerPadding: "40px",
      dots: false,
      scroll: true,
      responsive: [
        {
          breakpoint: 769,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: "40px",
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: "40px",
            slidesToShow: 1,
          },
        },
      ],
    });

    /*--------------------------------------------------------------
     17. Hover To Active
   --------------------------------------------------------------*/
    $('.cs_hover_active').hover(function () {
      $(this).addClass('active').siblings().removeClass('active');
    });

    //Aos animation active

    AOS.init({
      offset: 100,
      duration: 400,
      easing: "ease-in-out",
      anchorPlacement: "top-bottom",
      disable: "mobile",
      once: false,
    });


    //Video poppup
    if ($(".play-btn").length > 0) {
      $(".play-btn").magnificPopup({
        type: "iframe",
      });
    };


    // page-progress
    var progressPath = document.querySelector(".progress-wrap path");
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      "none";
    progressPath.style.strokeDasharray = pathLength + " " + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      "stroke-dashoffset 10ms linear";
    var updateProgress = function () {
      var scroll = $(window).scrollTop();
      var height = $(document).height() - $(window).height();
      var progress = pathLength - (scroll * pathLength) / height;
      progressPath.style.strokeDashoffset = progress;
    };
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 50;
    var duration = 550;
    jQuery(window).on("scroll", function () {
      if (jQuery(this).scrollTop() > offset) {
        jQuery(".progress-wrap").addClass("active-progress");
      } else {
        jQuery(".progress-wrap").removeClass("active-progress");
      }
    });
    jQuery(".progress-wrap").on("click", function (event) {
      event.preventDefault();
      jQuery("html, body").animate({ scrollTop: 0 }, duration);
      return false;
    });




    //product colors
    const colors = $(".accordion1 .accordion-item");

    colors.on("click", function () {
      $(".accordion1 .accordion-item").removeClass("active");
      $(this).addClass("active");
    });


  });


  //preloader
  $(window).on("load", function (event) {
    setTimeout(function () {
      $(".preloader").fadeToggle();
    }, 500);
  });


  /* Text Effect Animation */
  if ($('.text-anime-style-1').length) {
    let staggerAmount = 0.05,
      translateXValue = 0,
      delayValue = 0.5,
      animatedTextElements = document.querySelectorAll('.text-anime-style-1');

    animatedTextElements.forEach((element) => {
      let animationSplitText = new SplitText(element, { type: "chars, words" });
      gsap.from(animationSplitText.words, {
        duration: 1,
        delay: delayValue,
        x: 20,
        autoAlpha: 0,
        stagger: staggerAmount,
        scrollTrigger: { trigger: element, start: "top 85%" },
      });
    });
  }

  if ($('.text-anime-style-2').length) {
    let staggerAmount = 0.05,
      translateXValue = 20,
      delayValue = 0.5,
      easeType = "power2.out",
      animatedTextElements = document.querySelectorAll('.text-anime-style-2');

    animatedTextElements.forEach((element) => {
      let animationSplitText = new SplitText(element, { type: "chars, words" });
      gsap.from(animationSplitText.chars, {
        duration: 1,
        delay: delayValue,
        x: translateXValue,
        autoAlpha: 0,
        stagger: staggerAmount,
        ease: easeType,
        scrollTrigger: { trigger: element, start: "top 85%" },
      });
    });
  }

  if ($('.text-anime-style-3').length) {
    let animatedTextElements = document.querySelectorAll('.text-anime-style-3');

    animatedTextElements.forEach((element) => {
      //Reset if needed
      if (element.animation) {
        element.animation.progress(1).kill();
        element.split.revert();
      }

      element.split = new SplitText(element, {
        type: "lines,words,chars",
        linesClass: "split-line",
      });
      gsap.set(element, { perspective: 400 });

      gsap.set(element.split.chars, {
        opacity: 0,
        x: "50",
      });

      element.animation = gsap.to(element.split.chars, {
        scrollTrigger: { trigger: element, start: "top 95%" },
        x: "0",
        y: "0",
        rotateX: "0",
        opacity: 1,
        duration: 1,
        ease: Back.easeOut,
        stagger: 0.02,
      });
    });
  }

  let progress = $('#progress1').LineProgressbar({
    percentage: 100
  });

  let progress2 = $('#progress2').LineProgressbar({
    percentage: 98
  });

  let progress3 = $('#progress3').LineProgressbar({
    percentage: 97
  });


  if ($('.reveal').length) { gsap.registerPlugin(ScrollTrigger); let revealContainers = document.querySelectorAll(".reveal"); revealContainers.forEach((container) => { let image = container.querySelector("img"); let tl = gsap.timeline({ scrollTrigger: { trigger: container, toggleActions: "play none none none" } }); tl.set(container, { autoAlpha: 1 }); tl.from(container, 1.5, { xPercent: -100, ease: Power2.out }); tl.from(image, 1.5, { xPercent: 100, scale: 1.3, delay: -1.5, ease: Power2.out }); }); }





})(jQuery);


const rippleBtns = document.getElementsByClassName("ripple");

function createRipple(event) {
  // Create the ripple span element
  let ripples = document.createElement("span");

  // Calculate the position relative to the button element
  let x = event.clientX - event.target.getBoundingClientRect().left;
  let y = event.clientY - event.target.getBoundingClientRect().top;

  // Set the position of the ripple within the button element
  ripples.style.left = x + "px";
  ripples.style.top = y + "px";

  // Append the ripple to the button
  event.target.appendChild(ripples);

  // Set a timeout to remove the ripple after 1000 milliseconds
  let clearTimeoutHandle = setTimeout(() => {
    ripples.remove();
  }, 1000);

  // Remove the ripple immediately if the mouse leaves the button
  event.target.addEventListener("mouseout", function () {
    clearTimeout(clearTimeoutHandle);
    ripples.remove();
  });
}

// Attach the createRipple function to each button
for (let i = 0; i < rippleBtns.length; i++) {
  const rippleBtn = rippleBtns[i];
  rippleBtn.addEventListener("mouseover", createRipple);
}


