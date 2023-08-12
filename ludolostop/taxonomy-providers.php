
<?php get_header(); ?>
<?php $term = get_queried_object(); ?>

<section class="casinos-block">
    <div class="archive-block">
        <div class="container">
            <div class="page-content-casinos">
                <div class="breadcrumbs-block">
                    <?php 
                    true_breadcrumbs(); ?>
                </div>
                <div class="page-title">
                    <h1 class="title-page-h1 casinos">Лучшие онлайн-казино <?php echo $term->name; ?></h1>
                </div>
                <div class="casinos-single">
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'providers' => $term->slug
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {
                            echo '<div class="casino-list">';
                                while ( $query->have_posts() ) : $query->the_post() ;
                                    $link = get_field('link');
                                    $bonus = get_field('bonus');
                                    $rate = get_field('rate');
                                    $promocasino = get_field('promo-casino');
                                    $slots = get_field('main-slots');
                                    echo '<div class="casino-card">';
                                        echo '<div class="casino-card-item one">';
                                            echo '<a class="casino-card-link" aria-label="Casino card" href="'.get_permalink($item->ID).'">';
                                                echo '<div class="casino-card-image">';
                                                    echo get_the_post_thumbnail($item->ID);
                                                echo '</div>';
                                            echo '</a>';
                                            echo '<div class="casino-card-middle title">';
                                                echo '<span class="casino-card-title">'.get_the_title().'</span>';
                                                if($rate) {
                                                    echo '<div class="casino-card-rate">Оценка: '.$rate.'</div>';
                                                }
                                                if($bonus) {
                                                    echo '<span class="casino-card-bonus page">'.$bonus.'</span>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="casino-card-item two">';
                                            echo '<div class="casino-card-middle">';
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
                                            echo '</div>';
                                            echo '<div class="casino-card-middle">';
                                                if($slots) {
                                                    echo '<div class="casino-card-title-block">';
                                                        echo '<span class="casino-card-middle-title">Слоты</span>';
                                                    echo '</div>';
                                                    echo $slots;
                                                    echo '<a href="/slots/" class="all-providers">Показать все</a>';   
                                                }   
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="casino-card-item three">';
                                            echo '<div class="casino-card-middle">';
                                                if($promocasino) {
                                                    echo '<div class="code-copy-card">';
                                                        echo '<p>Промокод</p>';
                                                        echo '<span id="promocode-casino" class="promocode-casino">'.$promocasino.'</span>';
                                                        echo '<button id="copy" class="btn-code-copy-card">Скопировать</button>';
                                                        echo '<div class="hover-block casino" id="hover-block">';
                                                            echo '<div class="copy-icon" style="background-image: url('.get_template_directory_uri().'/img/copy.svg);"></div>';
                                                            echo '<span>Скопировать код</span>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                }
                                            echo '</div>';
                                            echo '<div class="casino-card-last">';
                                                echo '<a class="casino-card-submit" href="'.$link.'" rel="noreferrer">';  
                                                    echo '<span>Перейти</span>';
                                                echo '</a>';
                                                echo '<a class="casino-card-overview" href="'.get_permalink($item->ID).'">';
                                                    echo '<div class="casino-card-overview-icon" style="background-image: url('.get_template_directory_uri().'/img/magnifier.svg)"></div>';
                                                    echo '<span>Обзор</span>';
                                                echo '</a>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                endwhile;
                            echo '</div>';
                        }
                        wp_reset_postdata();
                    ?>
                </div>
                <?php
                    $term = get_queried_object();
                    $rprov = get_field('rate-providers', $term);
                    $descprov = get_field('rate-prov-desc', $term);
                ?>
                <div class="card-slot-rating">
                    <div class="card-slot-rating-left">
                        <h2 class="card-slot-rating-title">Краткое описание оценки</h2>
                        <p class="card-slot-rating-text"><?php echo $descprov; ?></p>
                    </div>
                    <div class="card-slot-rating-right">
                        <div class="card-slot-rating-number">
                            <?php echo $rprov; ?>
                        </div>
                        <span class="card-slot-rating-num-title">Общая оценка от Лудолося</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slots-block-page">
        <div class="container">
            <div class="slots-providers-block-title">
                <h2>Лучшие слоты <?php echo $term->name; ?></h2>
            </div>
            <div class="slots-block-content">
                <?php
                    $args = array(
                        'post_type' => 'slots',
                        'providers' => $term->slug
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                        echo '<div class="page-cards-slots provider">';
                            while ( $query->have_posts() ) : $query->the_post() ;
                                echo '<div class="main-slots-item page">';
                                    echo '<a class="main-slots-item-link" href="'.get_permalink().'">';
                                        echo '<div class="main-slots-block-image page">';
                                            echo the_post_thumbnail();
                                            echo '<div class="main-slots-block-back">';
                                                echo '<div class="casino-card-rate slots">'.get_field('rate-slots').'</div>';
                                                echo '<span class="play-btn">';
                                                    echo '<div class="ikon-play-btn" style="background-image: url('.get_template_directory_uri().'/img/play.svg)"></div>';
                                                echo '</span>';
                                                echo '<div class="play-text">Играть бесплатно</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</a>';
                                    echo '<div class="main-slots-block-title top">';
                                        echo '<span class="title-main-slots-span">'.get_the_title().' </span>';
                                        echo '<span>от</span>';
                                        echo the_terms( $item->ID, 'providers' , ' ' );
                                    echo '</div>';
                                echo '</div>';
                            endwhile;
                        echo '</div>';
                    }
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <div class="archive-block">
        <div class="container">
            <div class="page-content-casinos">
                <div class="stream-block-text">
                    <div class="stream-block-text-content">
                        <?php 
                            $str=category_description(); 
                            if (!empty($str)) {
                                echo apply_filters("the_content", $str);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
