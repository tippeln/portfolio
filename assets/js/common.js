        $(function() {
            var nav = $('.nav');
            $('li', nav)
                .mouseover(function(e) {
                    $('ul', this).stop().slideDown('fast');
                })
                .mouseout(function(e) {
                    $('ul', this).stop().slideUp('fast');
                });
        });

        // hero以降カラー切替
        $(function() {
            var _window = $(window),
                _gnav = $('.gnav'),
                _logo = $('.gnav-logo'),
                _bar = $('.bar'),
                _btn = $('.menu-btn'),
                _text = $('.menu-btn__text'),
                heroBottom;
            _window.on('scroll', function() {
                heroBottom = $('#mv').height();
                if (_window.scrollTop() > heroBottom) {
                    _gnav.addClass('transform');
                    _logo.addClass('transform');
                    _bar.addClass('transform');
                    _btn.addClass('transform');
                    _text.addClass('transform');
                } else {
                    _gnav.removeClass('transform');
                    _logo.removeClass('transform');
                    _bar.removeClass('transform');
                    _btn.removeClass('transform');
                    _text.removeClass('transform');
                }
            });
            _window.trigger('scroll');
        });



        $(window).scroll(function() {
            $('.fadein-top').each(function() {
                var elemPos = $(this).offset().top,
                    scroll = $(window).scrollTop(),
                    windowHeight = $(window).height();
                if (scroll > elemPos - windowHeight + 200) {
                    $(this).addClass('scrollin');
                }
            });
            $('.fadein-bottom').each(function() {
                var elemPos = $(this).offset().top,
                    scroll = $(window).scrollTop(),
                    windowHeight = $(window).height();
                if (scroll > elemPos - windowHeight + 200) {
                    $(this).addClass('scrollin');
                }
            });
            $('.fadein-left').each(function() {
                var elemPos = $(this).offset().top,
                    scroll = $(window).scrollTop(),
                    windowHeight = $(window).height();
                if (scroll > elemPos - windowHeight + 100) {
                    $(this).addClass('scrollin');
                }
            });
            $('.fadein-right').each(function() {
                var elemPos = $(this).offset().top,
                    scroll = $(window).scrollTop(),
                    windowHeight = $(window).height();
                if (scroll > elemPos - windowHeight + 100) {
                    $(this).addClass('scrollin');
                }
            });
        });


        function slideSwitch() {
            var $active = $('#imageSlide IMG.active');

            if ($active.length == 0) $active = $('#imageSlide IMG:last');

            var $next = $active.next().length ? $active.next() :
                $('#imageSlide IMG:first');

            $active.addClass('last-active');

            $next.css({ opacity: 0.0 })
                .addClass('active')
                .animate({ opacity: 1.0 }, 1000, function() {
                    $active.removeClass('active last-active');
                });
        }

        $(function() {
            setInterval("slideSwitch()", 2000);
        });

    $(function() {
        $.each($('.bxslider').bxSlider({
            ticker: true,
            slideWidth: 300,
            slideMargin: 3,
            speed: 35000,
            captions: true,
            minSlides: 1,
            maxSlides: 4,
            infiniteLoop: true,
            useCSS: false,
            moveSlides: 1
        }));
    });

        $(function() {

        $('#masonry').masonry({
            itemSelector: '.grid',
            // isFitWidth: true,
            isAnimated: true
        });
    });

jQuery(function() {
    var pagetop = $('#page_top');
    pagetop.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {  //100pxスクロールしたら表示
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
    });
    pagetop.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500); //0.5秒かけてトップへ移動
        return false;
    });
});