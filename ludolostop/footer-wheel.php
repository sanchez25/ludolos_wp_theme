<?php wp_footer(); ?>
<script type='text/javascript' src="<?php echo get_template_directory_uri() ?>/js/main.min.js"></script>
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

    });
</script>
</body>
</html>
