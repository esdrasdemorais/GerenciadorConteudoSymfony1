// jQuery
$(document).ready(function() {
	$('.product2').hide();
	$(".fancybox").fancybox();
    // Navigation Menu
    $('#simple-menu').sidr();
    $('.nav-menu li ul').slideUp();
    $('.menu-main-link').click(function(){
        $('ul', $(this).parent()).slideToggle();
    });
    $(window).touchwipe({
        wipeLeft: function() {
          $.sidr('close', 'sidr');
        },
        wipeRight: function() {
          $.sidr('open', 'sidr');
        },
        preventDefaultEvents: false
    });
    $(document).click(function() {
        $.sidr('close', 'sidr');   
    });
    $(".sidr").click(function(e) {
        e.stopPropagation();            
    });
    // Color variations & customize menu
    $('.customize-trigger').toggle(function() {
      $('.customize').animate({'left':'0px'},300);
    }, function() {
      $('.customize').animate({'left':'-210px'},300);
    });
    $('.varcolors').click(function(){
        var bgcol = $(this).css('background-color');
        $('.maincolor').css({
            "background-color": bgcol,
            "border-color": bgcol
        });
        return false;
    });
	// Layerslider Configuration
	$('#layerslider').layerSlider({
		skinsPath : 'css/skins/',
		skin : 'fullwidth',
		touchNav : true,
		responsive : true,
		navButtons              : false,
		navStartStop            : false,
		pauseOnHover            : false,
		slideDelay              : 4000,
	    durationIn              : 1000,
	    durationOut             : 1000,
	    easingIn                : 'easeInOutQuint',
	    easingOut               : 'easeInOutQuint',
	});
	// Switchy
	$(function() {
	  $('#switch-me').switchy();

	  $('#switch-me').on('change', function(){

	    // Animate Switchy Bar background color
	    var bgColor = '#6CC7BE';

	    if ($(this).val() == 'product1'){
	      bgColor = '#6CC7BE';
	      $('.product2').hide();
	      $('.product1').fadeIn();
	    } else if ($(this).val() == 'product2'){
	      bgColor = '#EB7575';
	      $('.product1').hide();
	      $('.product2').fadeIn();
	    }

	    $('.switchy-bar').animate({
	      backgroundColor: bgColor
	    });
	  });
	});
	//Flexslider
    $('.flexslider-main').flexslider({
        animation: "slide",
        directionNav: true,
        controlNav: false,
        slideshow: true,
        touch: true,
        slideshowSpeed: 3000,
        animationSpeed: 600,
    });
	$('.flexslider-products').flexslider({
        animation: "slide",
		directionNav: true,
		controlNav: false,
		slideshow: true,
		touch: true,
		slideshowSpeed: 4000,
		animationSpeed: 600,
    });
    $('.flexslider-testimonial').flexslider({
        animation: "slide",
		directionNav: false,
		controlNav: true,
		slideshow: false,
		touch: true,
		slideshowSpeed: 4000,
		animationSpeed: 600,
    });
    $('.flexslider-recent-blog').flexslider({
        animation: "slide",
		directionNav: false,
		controlNav: true,
		slideshow: false,
		touch: true,
		slideshowSpeed: 4000,
		animationSpeed: 600,
    });
    $('.flexslider-blog').flexslider({
        animation: "slide",
		directionNav: true,
		controlNav: false,
		slideshow: true,
		touch: true,
		slideshowSpeed: 4000,
		animationSpeed: 600,
    });
    // Owl Carousel
    $("#owl-example").owlCarousel({
    	items : 5,
        autoPlay : true,
        goToFirst : true,
        slideSpeed : 400,
    	navigation : false,
    	responsive : true,
    	pagination : true,
    	itemsTablet : 4,
    	itemsMobile : 2,
    	navigationText : ["<",">"],
        itemsMobile : [600,2],
        stopOnHover : true,
    });
    // Portfolio-Gallery Plugin (Quicksand)
	var filterType = $('#filterOptions li.active a').attr('class');
	var holder = $('ul.portfolioholder');
	var data = holder.clone();

	$('#filterOptions li a').click(function(e) {
		$('#filterOptions li').removeClass('active');
		var filterType = $(this).attr('class');
		$(this).parent().addClass('active');
		if (filterType == 'all') {
			var filteredData = data.find('li');
		} 
		else {
			var filteredData = data.find('li[data-type=' + filterType + ']');
		}

		holder.quicksand(filteredData, {
			duration: 800,
			easing: 'easeInOutQuad'
		},function() {
		    $(".fancybox").fancybox();
		});
		return false;
	});

	//Contact-Page
	$('#contact-trigger').click( function(){
		if ( $('.contact-container').is(':visible') ) {
			$('.contact-container').fadeOut(500);
			$(this).text('Show Contact Form');
		}
		else if( $('.contact-container').is(':hidden') ){
			$('.contact-container').fadeIn(500);
			$(this).text('Hide Contact Form');
		}
		return false;
	});
	// Ajax-Actions
	$("input[type='text'], textarea").keypress(function() {
	  $(this).css({"background-color":"#fff"});
	});
	$(function () {
        $(".send-btn").click(function () {
        	var has_error = 0 ;
            var name = $("#name").val();
            var subject = $("#subject").val();
            var message = $("#message").val();
            var email = $("#email").val();
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
            var dataString = '&name=' + name + '&email=' + email + '&subject=' + subject + '&message=' + message;

            $('input[type=text]').focus(function () {
                $(this).css({
                    "background-color": "#fff"
                });
            });
            $('textarea').focus(function () {
                $(this).css({
                    "background-color": "#fff"
                });
            });

            if ($("#name").val().length == 0) {
           		has_error = 1 ;
                $('#name').css({
                    "background-color": "#FFA1A1"
                });
            }
            if($("#email").val().length == 0) {
            has_error = 1 ;
                $('#email').css({
                    "background-color": "#FFA1A1"
                });
            }
            if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
            has_error = 1 ;
                $('#email').css({
                    "background-color": "#FFA1A1"
                });
            }
            if($("#subject").val().length == 0) {
            has_error = 1 ;
                $('#subject').css({
                    "background-color": "#FFA1A1"
                });
            }
            if($("#message").val().length == 0) {
            has_error = 1 ;
                $('#message').css({
                    "background-color": "#FFA1A1"
                });
            } 
            if(has_error == 0 ) {
               $.ajax({
                   type: "POST",
                    url: "contact.php",
                    data: dataString,
                    success: function () {
                        $('.success').css({
                            "display": "inline-block"
                        });
                        $('input[type=text],textarea').val('');
                    }
                });
            }
            return false;
        });
    });
	// Comment-Form Validation
	$(function () {
        $(".submit-btn").click(function () {
        	var has_error = 0 ;
            var name = $("#name-comment").val();
            var message = $("#txt-comment").val();
            var email = $("#email-comment").val();
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");
            var dataString = '&name=' + name + '&email=' + email + '&message=' + message;

            $('input[type=text]').focus(function () {
                $(this).css({
                    "background-color": "#fff"
                });
            });
            $('textarea').focus(function () {
                $(this).css({
                    "background-color": "#fff"
                });
            });

            if ($("#name-comment").val().length == 0) {
           		has_error = 1 ;
                $('#name-comment').css({
                    "background-color": "#FFA1A1"
                });
            }
            if($("#email-comment").val().length == 0) {
            has_error = 1 ;
                $('#email-comment').css({
                    "background-color": "#FFA1A1"
                });
            }
            if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
            has_error = 1 ;
                $('#email-comment').css({
                    "background-color": "#FFA1A1"
                });
            }
            if($("#txt-comment").val().length == 0) {
            has_error = 1 ;
                $('#txt-comment').css({
                    "background-color": "#FFA1A1"
                });
            } 
            if(has_error == 0 ) {
               $.ajax({
                   type: "POST",
                    url: "contact.php",
                    data: dataString,
                    success: function () {
                        $('.success').css({
                            "display": "inline-block"
                        });
                        $('input[type=text],textarea').val('');
                    }
                });
            }
            return false;
        });
    });
    // Coming Soon
    $(function () {
        var austDay = new Date(2014, 5, 25, 12, 50, 20);
        $('#defaultCountdown').countdown({until: austDay});
    });
    $(".subscribe-input").keypress(function() {
      $(".subscribe-input").css({"background-color":"#fafafa"});
    });
    $(".subscribe-input").blur(function() {
      $(".subscribe-input").css({"background-color":"#FAFAFA"});
    });
    $(".subscribe-input").focus(function() {
      $(".subscribe-input").css({"background-color":"#fafafa"});
      $(".subscribe-input").css({"color":"#333"});
      $('.subscribe-input').val("");
    });
    $(function() {
            $(".subscribe-btn").click(function() {
            var x=$(".subscribe-input").val();
            var atpos=x.indexOf("@");
            var dotpos=x.lastIndexOf(".");
            var subscribeEmail = $(".subscribe-input").val();
            var dataString = 'subscribeEmail='+ subscribeEmail;
            
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
            {
            $(".subscribe-input").css({"background-color":"rgba(216, 70, 55, 0.64)"});
            }
            else
            {
            $.ajax({
            type: "POST",
            url: "mail.php",
            data: dataString,
                success: function(){
                    $('.subscribe-input').val("Done! You will get latest news about NextApp.");
                    $(".subscribe-input").css({"background-color":"rgba(12, 162, 42, 1)"});
                    $(".subscribe-input").css({"color":"#fafafa"});
                }
            });
            }
            return false;
            });
    });
    // Tabbed Content
    $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    })
});