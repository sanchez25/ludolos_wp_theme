<?php
/*Template Name: Wheel New*/
?>

<?php get_header('new')?>

<div class="wrapper">
    <div class="header-block-wheel">
        <a href="/" aria-label="Logo">
            <div class="wheel-head" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/ludolostop-logo.svg)"></div>
        </a>
    </div>
    <div class="wheel-block" style="background: url(<?php echo get_template_directory_uri() ?>/img/wheel-shadow.png) 50% 50% no-repeat">
        <div class="wheel wheel-animate">
            <div class="wheel-content-new">
                <img src="<?php echo get_template_directory_uri() ?>/img/whl.png" class="wheel-spinner" style="transform: rotate(0); transform-origin: 50% 50%;">
                <div class="wheel-vin-block" style="background: url(<?php echo get_template_directory_uri() ?>/img/vin-block.png) 50% 0 no-repeat"></div>
            </div>
            <div class="wheel-lamps" style="background: url(<?php echo get_template_directory_uri() ?>/img/wheel-lamps.png) 50% 50% no-repeat"></div>
            <div class="money-one" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/money-one.png)"></div>
            <div class="money-two" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/money-two.png)"></div>
        </div>
        <div class="wheel-title">
            <div class="wheel-title-top" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/title-top.png)"></div>
            <div class="wheel-title-bottom" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/title-bottom.png)"></div>
        </div>
    </div>
    <div class="wheel-vin-button-new">
        <button class="wheel-vin-button-check spin-trigger" style="background: url(<?php echo get_template_directory_uri() ?>/img/btn-back.png) 50% 0 no-repeat">
            <span>Чпоньк!</span>
        </button>
    </div>
    <div class="deer-block-new" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/deer.png)"></div>
</div>
<div class="celebrate-block" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/celebrate-back.png)"></div>

<?php get_footer('new')?>
