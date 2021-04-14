(function($) {
    "use strict";

    // loader.
    $('.loader-wrapper').fadeOut('slow', function() {
        $(this).remove();
    });

    /*--------------------
        NiceSelect.
    ------------------- */
    $('.header-middle-info__categories > select').niceSelect();
    $('.select-option-shop > select').niceSelect();
    /* ---------------------
        Categories toggle.
    ------------------------*/
    $('.header-bottom-cate__title').on('click',function(){
        $('.header-bottom-cate-toggle').slideToggle('fast');
    });  

    // toggle cate by product-shop.
    $('#shop-title-cate > h3').on('click',function(){
        $('#show-cate-product').slideToggle('fast');
        $(this).toggleClass('active');
    }); 

    $('#shop-title-price > h3').on('click',function(){
        $('.form-search-price').slideToggle('fast');
        $(this).toggleClass('active');
    }); 

    $('#shop-title-brand > h3').on('click',function(){
        $('#data-brand').slideToggle('fast');
        $(this).toggleClass('active');
    });

    $('#shop-title-origin > h3').on('click',function(){
        $('#data-origin').slideToggle('fast');
        $(this).toggleClass('active');
    }); 

    /* -------------------------
        Categories More toggle.
    ---------------------------*/
    $('.header-bottom-cate-toggle li.hidden').hide(); // đầu tiên cần ẩn đi 1 số thành phần.
 	$('.header-bottom-cate-toggle a.more_btn').on('click',function(e){

 		e.preventDefault();
		$(".header-bottom-cate-toggle li.hidden").toggle('fast');
		var htmlAfter = '<i class="fa fa-minus" aria-hidden="true"></i> Thu gọn danh mục';
		var htmlBefore = '<i class="fa fa-plus" aria-hidden="true"></i> Mở rộng danh mục';

		if ($(this).html() == htmlBefore) {
			$(this).html(htmlAfter);
		} else {
			$(this).html(htmlBefore);
		}
     });

    /* -------------------------
        Widget sub categories.
    ---------------------------*/
    $(".sub-categories1 > a").on("click", function() {
        $(this).toggleClass('active');
        $('.dropdown-categories1').slideToggle('medium');
    }); 

    $(".sub-categories2 > a").on("click", function() {
        $(this).toggleClass('active');
        $('.dropdown-categories2').slideToggle('medium');
    }); 


    /* -------------------------
        Shop grid activation.
    ---------------------------*/
    $('.shop-toolbar-btn > button').on('click', function (e) {
        
        e.preventDefault();
        
        $('.shop-toolbar-btn > button').removeClass('active');
        $(this).addClass('active');
        
        var parentsDiv = $('.shop-wrapper');
        var viewMode = $(this).data('role');
        
        
        parentsDiv.removeClass('grid-3 grid-4 grid-5 grid-list').addClass(viewMode);

        if(viewMode == 'grid-3'){
            parentsDiv.children().addClass('col-lg-4 col-md-4 col-sm-6').removeClass('col-lg-3 col-cust-5 col-12');
            
        }

        if(viewMode == 'grid-4'){
            parentsDiv.children().addClass('col-lg-3 col-md-4 col-sm-6').removeClass('col-lg-4 col-cust-5 col-12');
        }
        
        if(viewMode == 'grid-list'){
            parentsDiv.children().addClass('col-12').removeClass('col-lg-3 col-lg-4 col-md-4 col-sm-6 col-cust-5');
        }
            
    });


    /* -------------------------
        Format number here.
    ---------------------------*/
    function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
    }
    /* -------------------------
        Slider-range here.
    ---------------------------*/
    $( "#slider-range" ).slider({
        animate: "fast",
        range: true,
        min: 0,
        step: 10000,
        max: 500000,
        values: [ 0, 500000 ],
        slide: function( event, ui ) {
        $( "#amount" ).val( formatNumber(ui.values[ 0 ]) + "đ" + " - " + formatNumber(ui.values[ 1 ]) + "đ");
       }
    });
    $( "#amount" ).val(formatNumber($("#slider-range" ).slider( "values", 0 )) + "đ" +
       " - " + formatNumber($( "#slider-range" ).slider( "values", 1 ) + "đ" ));


    /* -------------------------
        Load backgound Image.
    ---------------------------*/
    $(window).on('load',function(){
		dataBackgroundImage();
    }); 

     function dataBackgroundImage(){
        $('[data-bgimg]').each(function(){
            var bgImgUrl = $(this).data('bgimg');
            $(this).css({
                'background-image' : 'url(' + bgImgUrl + ')',
                'background-attachment' : 'scroll',
                'background-repeat' : 'no-repeat',
                'background-position' : 'center center',
                'background-size' : 'cover'
            });
        });
    }
    


    /* -----------------------------
        Zoom modal product.
    -------------------------------*/
    // $('.single-zoom').each(function () {
    //     var $this = $(this),
    //         $image = $this.data('bgimg');
    //     $this.zoom({
    //         url: $image
    //     });

    //     $this.css({
    //         cursor: 'crosshair',
    //     });
    // });


    /* -------------------------
        Slider Owl-carousel.
    ---------------------------*/
    var slider = $('.slider_area');
	if (slider.length > 0) {
		slider.owlCarousel({
			animateOut		: 'fadeOut',
            loop			: true,
            nav				: false,
            autoplay        : false,
            autoplayTimeout : 8000,
            items           : 1,
            dots            :true,

		});
    }
    
    /* -------------------------
        Partner Owl-carousel.
    ---------------------------*/
    var $partner = $('.partner-content');
    if($partner.length > 0){
        $('.partner-content').on('changed.owl.carousel initialized.owl.carousel', function (event) {
        $(event.target).find('.owl-item').removeClass('last').eq(event.item.index + event.page.size - 1).addClass('last')}).owlCarousel({
        loop: true,
        nav: false,
        autoplay: false,
        autoplayTimeout: 8000,
        items: 5,
        margin: 20,
        dots:false,
        responsiveClass:true,
        responsive:{
                0:{
                items:1,
            },
            300:{
                items:2,
                margin: 15,
            },
            480:{
                items:3,
            },
            768:{
                items:4,
            },
            992:{
                items:5,
            },

            }
        });
    }

    /* -------------------------
        ScrollUp Activation.
    ---------------------------*/
    $.scrollUp({
        scrollName: 'scrollUp',      // Element ID
        scrollDistance: 300,         // Distance from top/bottom before showing element (px)
        scrollSpeed: 500,            // Speed back to top (ms)
        animation: 'fade',           // Fade, slide, none
        scrollText: '<i class="fa fa-angle-double-up" aria-hidden="true"></i>', // Text for element, can contain HTML
    });

    /* -----------------------------
        Sticky Header Activation.
    -------------------------------*/
    $(window).on('scroll',function(){   

        var scroll = $(window).scrollTop();

        if($(window).width() > 991){
            if (scroll < 100) {
                $('.sticky-header').removeClass('sticky');
            } else {
                $('.sticky-header').addClass('sticky');
            }
        }
        
    });


    /*------------------------
        Off Canvas Menu.
    -------------------------*/
    var $offcanvasNav = $('.offcanvas_main_menu'),
        $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu');
    $offcanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="fa fa-angle-down"></i></span>');
    
    $offcanvasNavSubMenu.slideUp();
    
    $offcanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if ( ($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length){
                $this.siblings('ul').slideUp('medium');
            }else {
                $this.closest('li').siblings('li').find('ul:visible').slideUp('medium');
                $this.siblings('ul').slideDown('medium');
            }
        }
        if( $this.is('a') || $this.is('span') || $this.attr('clas').match(/\b(menu-expand)\b/) ){
            $this.parent().toggleClass('menu-open');
        }else if( $this.is('li') && $this.attr('class').match(/\b('menu-item-has-children')\b/) ){
            $this.toggleClass('menu-open');
        }
    });


    /*------------------------
        mini Cart activation.
    -------------------------*/
    $('.header-middle-info__item--cart > a').on('click', function(e){
        $('.header-minicart,.canvars__overlay').addClass('active');
        e.preventDefault();
    });
    
    $('.header-minicart-head__btn > a,.canvars__overlay').on('click', function(e){
        $('.header-minicart,.canvars__overlay').removeClass('active');
        e.preventDefault();
    });

    /*--------------------------
        canvas menu activation.
    ---------------------------*/
    $('.canvas-open,.canvars__overlay').on('click', function(){
        $('.canvas-wrapper,.canvars__overlay').addClass('active');
    });
    
    $('.canvas-close,.canvars__overlay').on('click', function(){
        $('.canvas-wrapper,.canvars__overlay').removeClass('active');
    });

    /* -----------------------------
        Modal product activation.
    -------------------------------*/
    function createSlick(){
        var $imgContent = $('.mdProduct-image-content');
        var $modal      = $('#quickViewModal');

        $modal.on('shown.bs.modal', function (e) { // modal ở trạng thái show => Carousel mới kích hoạt.

            $imgContent.not('.slick-initialized').slick({
                dots: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                nextArrow: '<button class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>'
            }); 
        })
    }
    // createSlick();
    //Now it will not throw error, even if called multiple times.
    // $(window).on( 'resize', createSlick);

    /* ----------------------------------------------------
        Product quantity. | Tăng giảm đại lượng trong js.
    ------------------------------------------------------*/

    $('.qty-btn').on('click', function () {

        var $this = $(this);
        var oldValue = $this.siblings('input').val();
        $('.qty-btn').removeClass('noAction'); // Bình thường sẽ không có class 'noAction'

        if ($this.hasClass('plus')) { // Trường hợp là dấu +
            // Don't allow incrementing above twenty | Không cho phép tăng trên 20 
            if (oldValue < 20) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                newVal = 20;
                $('.plus').addClass('noAction');
            }
        } else { // Trường hợp là dấu -
            // Don't allow decrementing below zero | không được phép giảm xuống 0
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
                $('.minus').addClass('noAction');
            }
        }
        $this.siblings('input').val(newVal);
    });


    /* ----------------------------------------
        Shipping method. Input(Radio) (*)
    -----------------------------------------*/

    $('input[type="radio"]').click(function(){
        var radioShip = $('input[name="ship"]:checked').val();
        if (radioShip == 'shiptwo') {
           $('.payl-address').slideDown('medium');

        } else {
            $('.payl-address').slideUp('medium');
        }
    });


    /* ---------------------------------
        Payment method. Input(Radio)
    ----------------------------------*/
    $('input[type="radio"]').click(function(){
        var radioBank = $('input[name="payl"]:checked').val();
        if (radioBank == 'payltwo') {
           $('.payl-sent').slideDown('medium');
           $('.payl-home').slideUp('medium');
        } else {
            $('.payl-home').slideDown('medium');
            $('.payl-sent').slideUp('medium');
        }
    });

  
    /*-------------------------------
        Type password toggle here.
    --------------------------------*/
    $(document).on('click','.error-passw', function(){

        var passw   = $('.input-pass');
        var toggle  = $('.error-passw > i');

        if (passw.attr('type') === "password") {
            passw.attr('type', 'text');
            toggle.removeClass('fa-eye-slash');
            toggle.addClass('fa-eye');

        } else {
            passw.attr('type', 'password');
            toggle.removeClass('fa-eye');
            toggle.addClass('fa-eye-slash');
        }
    });

    $(document).on('click','.error-repassw', function(){

        var passw   = $('.inp-repassw');
        var toggle  = $('.error-repassw > i');

        if (passw.attr('type') === "password") {
            passw.attr('type', 'text');
            toggle.removeClass('fa-eye-slash');
            toggle.addClass('fa-eye');

        } else {
            passw.attr('type', 'password');
            toggle.removeClass('fa-eye');
            toggle.addClass('fa-eye-slash');
        }
    });

    $(document).on('click','.error-old-passw', function(){

        var passw   = $('.passw-old');
        var toggle  = $('.error-old-passw > i');

        if (passw.attr('type') === "password") {
            passw.attr('type', 'text');
            toggle.removeClass('fa-eye-slash');
            toggle.addClass('fa-eye');

        } else {
            passw.attr('type', 'password');
            toggle.removeClass('fa-eye');
            toggle.addClass('fa-eye-slash');
        }
    });

    /*-------------------------------
        noti Validate here.
    --------------------------------*/
    $("input#input-pass").focus(function(){
      $("ul.noti-validate").css("display", "block");
    });


    /*--------------------------------------------------------------------------------------
    (onKeyup) tab paylSent. |  tự điền thông tin chuyển khoản khi người dùng nhập liệu
    -----------------------------------------------------------------------------------------*/
                        /*---Name--*/
    $('input[type="text"].payl-input-not-count').on('keyup',function(){

        var val = $(this).val();
        $('span.sent-human').html(val);
    });
                        /*---Phone--*/
    $('input[type="text"].payl-input-not-count-numb').on('keyup',function(){

        var val = $(this).val();
        $('span.sent-phone').html(val);
    });

    /*----------------------fix overlay register.----------------------*/
    $('.register__overlay').click(function() {
        $(this).removeClass('active');
        window.location = 'index.php?page=login';
    });

    

    // Khi nhập liệu search vào trang bài viết.
    $(document).on('keyup', '.inp-search-blog', function() {
        var key      = $(this).val();
        var close    = $('.widget_search .icon-x');

        if (key != "") {
            close.addClass('active');
        } else {
            close.removeClass('active');
        }
    });

    // lại cho ô input search trang bài viết.
    $('.widget_search .icon-x').click(function() {
        $('.inp-search-blog').val("");
        $('.inp-search-blog').focus();
        var close    = $('.widget_search .icon-x');

        if ($('.inp-search-blog').val("")) {
            close.removeClass('active');
        }
    });


    // Tạo nhanh mật khẩu.
    $('input[type="checkbox"]').click(function(){
        
        var str = 'Flowers@123*';
        var fastReg = $('input[name="fast-reg"]:checked').val();
        var passw   = $('#input-pass');

        if (fastReg == "active") {
            passw.val(str);
        } else {
            passw.val("");
        }
    });


    
    //  loại bỏ thông báo áp dụng mã giảm giá.
    $('.payl-alert a > button, .Rating-success a > button').click(function(e) {

        $('.payl__overlay').removeClass('active');
        $('.payl-alert').slideUp('fast');
        $('.Rating-success').slideUp('fast');
        e.preventDefault();
    });
    
    // bấm vào lớp overlay để hủy thông báo.
    $('.payl__overlay').click(function() {
        $('.payl-alert').slideUp('fast');
        $('.Rating-error').slideUp('fast');
        $('.Rating-success').slideUp('fast');
        $('.footer-success').slideUp('fast');
        // reset ô input ở cuối trang chủ.
        var inp = $('.footer-top__form > form > input[type="email"]');
        inp.val("");
    });

    // Yêu cầu nhận thông báo ở cuối trang chủ.
    $('.footer-top__form > form > button').click(function(e) {
        var inp = $('.footer-top__form > form > input[type="email"]').val();
        if (inp !== "") {
            $('.footer-success').slideDown();
            $('.FooterSuc__overlay').addClass('active');
        }
        e.preventDefault();
        
    });

    // Bấm nút oke để hủy thông báo..
    $('.footer-success button').click(function(e) {
        // reset ô input ở cuối trang chủ.
        var inp = $('.footer-top__form > form > input[type="email"]');
        inp.val("");
        $('.footer-success').slideUp('fast');
        $('.FooterSuc__overlay').removeClass('active');
        e.preventDefault();
    });

    // bỏ thông báo alert.
    $('.alert').delay(3000).slideUp('fast');


})(jQuery);
