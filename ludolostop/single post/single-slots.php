<?php
/* Template Name: Post slots */
/* Template Post Type: Slots */
?>

<?php get_header()?>

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
                        <div class="casino-card-rate-slots">Оценка: <?php echo get_field('rate-slots'); ?></div>
                        <div class="single-slot-provider"><span>от</span> <?php echo the_terms( $item->ID, 'providers' , ' ' ); ?></div>
                    </div>
                </div>
                <div class="card-slot-rating">
					<div class="card-slot-rating-left">
						<h2 class="card-slot-rating-title">Краткое описание оценки</h2>
						<p class="card-slot-rating-text"><?php echo get_field('rate-desc'); ?></p>
					</div>
					<div class="card-slot-rating-right">
						<div class="card-slot-rating-number">
                            <?php echo get_field('rate-slots'); ?>
                        </div>
						<span class="card-slot-rating-num-title">Общая оценка от Лудолося</span>
					</div>
				</div>
            </div>
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
                        <span class="full-screen-buton">
                            <div class="ikon-full" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/full-screen.svg)"></div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="single-slots-title">
                <h2>Список казино со слотом <?php the_title(); ?></h2>
            </div>
            <div class="casino-list main">
                <?php
                    $connected = new WP_Query( array(
                    'connected_type' => 'review_to_slots',
                    'connected_items' => get_queried_object(),
                    'nopaging' => true,
                    ) );

                    if ( $connected->have_posts() ) : ?>
                        <div class="casino-list">
                            <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                                <div class="casino-card">
                                    <div class="casino-card-item one">
                                        <div class="casino-card-image">
                                            <?php echo get_the_post_thumbnail($item->ID); ?>
                                        </div>
                                        <div class="casino-card-middle title">
                                            <span class="casino-card-title"><?php the_title(); ?></span>
                                            <?php
                                                $rate = get_field('rate');
                                                $bonus = get_field('bonus');
                                            ?>
                                            <?php if($rate) { ?>
                                                <div class="casino-card-rate">Оценка: <?php echo $rate; ?></div>
                                            <?php } ?>
                                            <?php if($bonus) { ?>
                                                <span class="casino-card-bonus page"><?php echo $bonus; ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="casino-card-item two">
                                        <div class="casino-card-middle">
                                            <?php 
                                                $cur_terms = get_the_terms( $item->ID, 'providers' );
                                                if( is_array( $cur_terms ) ) {
                                                    echo '<div class="casino-card-title-block">';
                                                        echo '<span class="casino-card-middle-title">Провайдеры</span>';
                                                    echo '</div>';
                                                    echo '<div class="casino-card-providers-list">';
                                                        $keys = array_keys( $cur_terms );
                                                        foreach ($cur_terms as $key => $cur_term) {
                                                            if ($keys[0] === $key) {
                                                                echo '<a class="casino-card-providers-item" href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                                    echo '<img src="'.z_taxonomy_image_url($cur_term->term_id, 'pay_cards').'" />';
                                                                echo '</a>';
                                                            } elseif ($keys[1] === $key) {
                                                                echo '<a class="casino-card-providers-item" href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                                    echo '<img src="'.z_taxonomy_image_url($cur_term->term_id, 'pay_cards').'" />';
                                                                echo '</a>';
                                                            }  elseif ($keys[2] === $key) {
                                                                echo '<a class="casino-card-providers-item" href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                                    echo '<img src="'.z_taxonomy_image_url($cur_term->term_id, 'pay_cards').'" />';
                                                                echo '</a>';
                                                            }  elseif ($keys[3] === $key) {
                                                                echo '<a class="casino-card-providers-item" href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                                    echo '<img src="'.z_taxonomy_image_url($cur_term->term_id, 'pay_cards').'" />';
                                                                echo '</a>';
                                                            }  elseif ($keys[4] === $key) {
                                                                echo '<a class="casino-card-providers-item" href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                                    echo '<img src="'.z_taxonomy_image_url($cur_term->term_id, 'pay_cards').'" />';
                                                                echo '</a>';
                                                            }  elseif ($keys[5] === $key) {
                                                                echo '<a class="casino-card-providers-item" href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                                    echo '<img src="'.z_taxonomy_image_url($cur_term->term_id, 'pay_cards').'" />';
                                                                echo '</a>';
                                                            }
                                                        } 
                                                    echo '</div>';
                                                    echo '<a href="/providers/" class="all-providers">Показать все</a>';
                                                }
                                            ?>
                                        </div>
                                        <div class="casino-card-middle">
                                            <?php
                                                $slots = get_field('main-slots');
                                            ?>
                                            <?php if($slots) { ?>
                                                <div class="casino-card-title-block">
                                                    <span class="casino-card-middle-title">Слоты</span>
                                                </div>
                                                <?php echo $slots; ?>
                                                <a href="/slots/" class="all-providers">Показать все</a> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="casino-card-item three">
                                        <div class="casino-card-middle">
                                            <?php
                                                $promocasino = get_field('promo-casino');
                                            ?>
                                            <?php if($promocasino) { ?>
                                                <div class="code-copy-card">
                                                    <p>Промокод</p>
                                                    <span id="promocode-casino-<?php echo the_ID(); ?>" class="promocode-casino"><?php echo $promocasino; ?></span>
                                                    <button id="copy-<?php echo the_ID(); ?>" class="btn-code-copy-card">Скопировать</button>
                                                    <div class="hover-block casino" id="hover-block-<?php echo the_ID(); ?>">
                                                        <div class="copy-icon" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/copy.svg);"></div>
                                                        <span>Скопировать код</span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="casino-card-last">
                                            <a class="casino-card-submit" href="<?php echo get_field('link'); ?>" rel="noreferrer"> 
                                                <span>Перейти</span>
                                            </a>
                                            <a class="casino-card-overview" href="<?php echo get_permalink(); ?>">
                                                <div class="casino-card-overview-icon" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/magnifier.svg)"></div>
                                                <span>Обзор</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php
                    wp_reset_postdata();
                    endif;
                    ?>
            </div>
            <div class="single-slots-content">
                <?php echo the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer('slots')?>