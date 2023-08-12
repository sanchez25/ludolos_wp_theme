<?php
/*Template Name: Casinos*/
?>


<?php get_header()?>

<section class="casinos-block">
    <div class="page-casinos-block">
        <div class="container">
            <div class="page-content-casinos">
                <div class="breadcrumbs-block">
                    <?php 
                    true_breadcrumbs(); ?>
                </div>
                <div class="page-title">
                    <h1 class="title-page-h1 casinos"><?php the_title(); ?></h1>
                </div>
                <?php
                    $style = array(
                        'taxonomy'=>'bonuses',
                        'child_of'=> 0,
                        'parent'=> 0,
                        'orderby'=> 'name',
                        'show_count'=> 0,
                        'pad_counts'=> 0,
                        'hierarchical' => 0,
                        'title_li'=> '',
                        'hide_empty'=> 0
                    );
                    $styles = get_categories( $style );
                ?>
                <?php foreach($styles as $br){ ?>
                <span>
                    <input name="<?php echo $br->term_id; ?>" type="checkbox"><?php echo $br->cat_name; ?>
                </span>
                <?php } ?>



                
                <div class="casino-list first">
                    <?php 
                        if ($items = get_posts(array('numberposts' => 3, 'post_type' => 'post', 'category' => 33))) {
                            foreach($items as $item) {
                                $link = get_field('link', $item->ID);
                                $bonus = get_field('bonus', $item->ID);
                                $rate = get_field('rate', $item->ID);
                                $promocasino = get_field('promo-casino', $item->ID);
                                $slots = get_field('main-slots', $item->ID);
                                $top = get_field('top', $item->ID);
                                echo '<div class="casino-card">';
                                if($top == '1') {
                                    echo '<div class="casino-card-medal" style="background-image: url('.get_template_directory_uri().'/img/gold.svg);"></div>';
                                } elseif($top == '2') {
                                    echo '<div class="casino-card-medal" style="background-image: url('.get_template_directory_uri().'/img/silver.svg);"></div>';
                                } elseif($top == '3') {
                                    echo '<div class="casino-card-medal" style="background-image: url('.get_template_directory_uri().'/img/bronze.svg);"></div>';
                                }
                                    echo '<div class="casino-card-item one">';
                                        echo '<a class="casino-card-link" aria-label="Casino card" href="'.get_permalink($item->ID).'">';
                                            echo '<div class="casino-card-image">';
                                                echo get_the_post_thumbnail($item->ID);
                                            echo '</div>';
                                        echo '</a>';
                                        echo '<div class="casino-card-middle title">';
                                            echo '<span class="casino-card-title">'.$item->post_title.'</span>';
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
                                                    echo '<span id="promocode-casino-'.$item->ID.'" class="promocode-casino">'.$promocasino.'</span>';
                                                    echo '<button id="copy-'.$item->ID.'" class="btn-code-copy-card">Скопировать</button>';
                                                    echo '<div class="hover-block casino" id="hover-block-'.$item->ID.'">';
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
                            }
                        }
                    ?>
                </div>
                <div class="casino-list">
                    <?php
                        if ($items = get_posts(array('numberposts' => 50, 'post_type' => 'post', 'category' => -33))) {
                            foreach($items as $item) {
                                $link = get_field('link', $item->ID);
                                $bonus = get_field('bonus', $item->ID);
                                $rate = get_field('rate', $item->ID);
                                $promocasino = get_field('promo-casino', $item->ID);
                                $slots = get_field('main-slots', $item->ID);
                                echo '<div class="casino-card">';
                                    echo '<div class="casino-card-item one">';
                                        echo '<a class="casino-card-link" aria-label="Casino card" href="'.get_permalink($item->ID).'">';
                                            echo '<div class="casino-card-image">';
                                                echo get_the_post_thumbnail($item->ID);
                                            echo '</div>';
                                        echo '</a>';
                                        echo '<div class="casino-card-middle title">';
                                            echo '<span class="casino-card-title">'.$item->post_title.'</span>';
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
                                                    echo '<span id="promocode-casino-'.$item->ID.'" class="promocode-casino">'.$promocasino.'</span>';
                                                    echo '<button id="copy-'.$item->ID.'" class="btn-code-copy-card">Скопировать</button>';
                                                    echo '<div class="hover-block casino" id="hover-block-'.$item->ID.'">';
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
                            } 
                        }
                    ?>
                </div>
                <div class="stream-block-text">
                    <div class="stream-block-text-content">
                        <?php echo the_content(); ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="slots-block-page">
        <div class="container">
            <div class="slots-block-title">
                <h2>Играть в слоты бесплатно</h2>
            </div>
            <div class="slots-block-content">
                <?php
                    if ($items = get_posts(array('numberposts' => 4, 'post_type' => 'Slots'))) {
                        foreach($items as $item) {
                            $rate = get_field('rate-slots', $item->ID);
                            echo '<div class="main-slots-item">';
                                echo '<a class="main-slots-item-link" href="'.get_permalink($item->ID).'">';
                                    echo '<div class="main-slots-block-image">';
                                        echo get_the_post_thumbnail($item->ID);
                                        echo '<div class="main-slots-block-back">';
                                            if ($rate) {
                                                echo '<div class="casino-card-rate slots">'.$rate.'</div>';
                                            }
                                            echo '<span class="play-btn">';
                                                echo '<div class="ikon-play-btn" style="background-image: url('.get_template_directory_uri().'/img/play.svg)"></div>';
                                            echo '</span>';
                                            echo '<div class="play-text">Играть бесплатно</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</a>';
                                echo '<div class="main-slots-block-title">';
                                    echo '<span class="title-main-slots-span">'.$item->post_title.' </span>';
                                    echo '<span>от</span>';
                                    echo the_terms( $item->ID, 'providers' , ' ' );
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>-->
</section>

<?php get_footer()?>