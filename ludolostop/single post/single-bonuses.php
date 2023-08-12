<?php
/* Template Name: Post bonuses */
/* Template Post Type: Bonuses */
?>

<?php get_header()?>

<section class="landing-slots-header" style="background-image: url(<?php echo get_field('slot-back');?>);">
    <div class="landing-slots-header-demo">
        <div class="landing-slots-header-demo-back play">
            <div class="landing-slots-header-demo-cont">
				<div class="landing-slots-header-demo-image">
                    <img src="<?php echo get_field('image-play');?>" alt="<?php echo get_field('alt-iframe');?>">
				</div>
            </div>
            <span class="landing-slots-header-demo-play">
                <span class="play-btn slot">
                    <div class="ikon-play-btn slot" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/play.svg)"></div>
                </span>
				<span class="demo-play-ikon-text">Играть</span>
			</span>
        </div>
        <div class="landing-slots-header-demo-block">
			<div class="landing-slots-header-demo-cont">
				<?php echo get_field('iframe-demo');?>
			</div>
        </div>
        <div class="landing-slots-header-demo-full">
			<div class="header-demo-full-content">
				<div class="full-screen-block">
					<span class="full-screen-buton">
                        <div class="ikon-full" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/full-screen.svg)"></div>
						<span>Во весь экран</span>
					</span>
				</div>
			</div>
		</div>
    </div>
</section>
<section class="page-block">
    <div class="container">
        <div class="page-content">
            <div class="breadcrumbs-block">
                <?php true_breadcrumbs(); ?>
            </div>
            <div class="single-slots">
                <div class="single-slots-card" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/main-banner.svg)">
                    <div class="single-slots-card-image">
                        <?php echo get_the_post_thumbnail($item->ID); ?>
                    </div>
                    <div class="single-slots-card-text">
                        <h1 class="landing-slots-header-h1"><?php the_title(); ?></h1>
                        <span>RTP: <?php echo get_field('rtp'); ?></span>
                        <div class="single-slot-provider"><span>by</span> <?php echo get_field('provider'); ?></div>
                    </div>
                </div>
                <div class="single-slots-content">
                    <?php echo the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer()?>