<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="preload" href="<?php echo get_template_directory_uri() ?>/fonts/Broadway.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri() ?>/fonts/Inverkrug.otf" as="font" type="font/otf" crossorigin>
    <?php wp_head(); ?>
    <title><?php wp_title(); ?></title>
</head>
<body style="background-image: url(<?php echo get_template_directory_uri() ?>/img/background.svg)">
    <header>
        <div class="header-block">
            <div class="header-logo">
                <a href="/" aria-label="Logo">
                    <div class="header-logo-img" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/ludolostop-logo.svg)"></div>
                </a>
            </div>
            <div class="header-menu">
                <?php wp_nav_menu(); ?>
                <div class="menu-border"></div>
            </div>
            <div class="menu-mobile-button">
                <div class="mobile-button-ikon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="header-links">
                <a href="https://t.me/ludolostop" aria-label="Telegram" target="_blank" rel="noreferrer" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/telegram.svg)" class="header-links-item"></a>
                <a href="https://twitter.com/LudoLosTop" aria-label="Twitter" target="_blank" rel="noreferrer" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/twitter.svg)" class="header-links-item"></a>
                <a href="https://www.youtube.com/channel/UCHD_Dx5tet1ZHHsn1kLYcZQ" aria-label="Youtube" target="_blank" rel="noreferrer" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/youtube.svg)" class="header-links-item"></a>
                <a href="https://www.donationalerts.com/r/ludolostop" aria-label="Donationalerts" target="_blank" rel="noreferrer" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/like.svg)" class="header-links-item"></a>
            </div>
        </div>
        <div class="mobile-menu">
            <div class="mobile-menu-content">
                <div class="menu-content-head">
                    <div class="close-block-button" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/close.svg)"></div>
                </div>
                <div class="mobile-menu-logo">
                <a href="/" class="menu-content-logo" aria-label="Logo">
                    <div class="header-logo-img" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/ludolostop-logo.svg)"></div>
                </a>
                </div>
                <div class="menu-content-items">
                    <?php wp_nav_menu(); ?>
                </div>
                <div class="header-links">
                    <a href="https://t.me/ludolostop" aria-label="Telegram" target="_blank" rel="noreferrer" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/telegram.svg)" class="header-links-item"></a>
                    <a href="https://twitter.com/LudoLosTop" aria-label="Twitter" target="_blank" rel="noreferrer" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/twitter.svg)" class="header-links-item"></a>
                    <a href="https://www.youtube.com/channel/UCHD_Dx5tet1ZHHsn1kLYcZQ" aria-label="Youtube" target="_blank" rel="noreferrer" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/youtube.svg)" class="header-links-item"></a>
                    <a href="https://www.donationalerts.com/r/ludolostop" aria-label="Donationalerts" target="_blank" rel="noreferrer" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/like.svg)" class="header-links-item"></a>
                </div>
            </div>
      </div>
    </header>
