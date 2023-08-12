<footer>
    <div class="footer-block">
        <div class="footer-top">
            <div class="footer-menu">
                <?php wp_nav_menu([ 'menu' => 'Футер' ]); ?>
            </div>
        </div>
        <div class="footer-bottom">
            <span>LUDO ЛОСЬ TOP? © 2021</span>
        </div>
    </div>
</footer>
<div id="button-up" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/up.svg)"></div>
<div class="over-block">
    <div class="modal">
        <div class="modal-wrapper">
            <div class="modal-wrapper-back"></div>
            <div class="modal-window">
                <div class="modal-window-content">
                    <div class="modal-window-content-main">
                        <div class="modal-window-head">
                            <div class="icon-modal" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/close.svg)"></div>
                        </div>
                        <div class="modal-window-description">
                            <span>По вопросам коллабораций и сотрудничества оставляйте заявку ниже.</span>
                        </div>
                        <?php echo do_shortcode('[ninja_form id=3]') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="button-up" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/up.svg)"></div>
<div class="contact-btn">Cотрудничество с LudoЛосем</div>
<div id="cookie-block">
    <p>Для улучшения работы сайта и его взаимодействия с пользователями мы используем файлы cookie. Продолжая работу с сайтом, Вы разрешаете использование cookie-файлов. Вы всегда можете отключить файлы cookie в настройках Вашего браузера.</p>
    <button class="cookie-block-button">
       <span>Принять</span>
    </button>
</div>

<div class="overlay-block"></div>

<?php wp_footer(); ?>
<script type='text/javascript' src="<?php echo get_template_directory_uri() ?>/js/main.min.js"></script>
<script type='text/javascript' src="<?php echo get_template_directory_uri() ?>/js/copy.js"></script>
<script>
    jQuery(document).ready(function ($) {

        jQuery.event.special.touchstart = {
            setup: function( _, ns, handle ) {
                this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
            }
        };
        jQuery.event.special.touchmove = {
            setup: function( _, ns, handle ) {
                this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
            }
        };
        jQuery.event.special.wheel = {
            setup: function( _, ns, handle ){
                this.addEventListener("wheel", handle, { passive: true });
            }
        };
        jQuery.event.special.mousewheel = {
            setup: function( _, ns, handle ){
                this.addEventListener("mousewheel", handle, { passive: true });
            }
        };

        $('.menu-mobile-button').on('click', function() {
  			$('.mobile-menu').addClass('active');
            $('.overlay-block').addClass('active');
            $('.scroll').addClass('active');
		});

        $('.close-block-button').on('click', function() {
            $('.mobile-menu').removeClass('active');
            $('.overlay-block').removeClass('active');
            $('.scroll').removeClass('active');
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#button-up').fadeIn();
            } else {
                $('#button-up').fadeOut();
            }
        });
    
        $('#button-up').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
            return false;
        });

        $('.contact-btn').click(function() {
            $('.modal').fadeIn();
            return false;
	    });	
	
        $('.icon-modal').click(function() {
            $(this).parents('.modal').fadeOut();
            return false;
        });		
    
        $(document).keydown(function(e) {
            if (e.keyCode === 27) {
                e.stopPropagation();
                $('.modal').fadeOut();
            }
        });


        function checkCookies() {
            let cookieDate = localStorage.getItem('cookieDate');
            let cookieNotification = document.getElementById('cookie-block');
            let cookieBtn = cookieNotification.querySelector('.cookie-block-button');

            // Если записи про кукисы нет или она просрочена на 1 год, то показываем информацию про кукисы
            if( !cookieDate || (+cookieDate + 31536000000) < Date.now() ){
                cookieNotification.classList.add('show');
            }

            // При клике на кнопку, в локальное хранилище записывается текущая дата в системе UNIX
            cookieBtn.addEventListener('click', function(){
                localStorage.setItem( 'cookieDate', Date.now() );
                cookieNotification.classList.remove('show');
            })
        }
        checkCookies();

        $('.landing-slots-header-demo-play').on('click', function() {
			$('.landing-slots-header-demo-back').removeClass('play');
			$('.landing-slots-header-demo-block').addClass('play');
			$('.landing-slots-header-demo-full').addClass('play');
		});

        document.querySelector('.full-screen-buton').addEventListener('click', function(){
			if(document.documentElement.webkitRequestFullscreen) {
				document.querySelector('.demo-iframe').webkitRequestFullscreen();
			}
			else{
				document.documentElement.mozRequestFullScreen();
			}
		});

    });
</script>
</body>
</html>
