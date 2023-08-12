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
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
</head>
<body style="background-image: url(<?php echo get_template_directory_uri() ?>/img/bg.jpg)">
  
    
