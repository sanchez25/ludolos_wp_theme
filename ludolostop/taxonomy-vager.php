
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
                    <h1 class="title-page-h1 casinos"><?php echo $term->name; ?></h1>
                </div>
                <div class="casinos-single">
                    <div class="single-casinos-bonuses-title">
                        <h2>Список казино с данным бонусом</h2>
                    </div>
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'vager' => $term->slug
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {
                            echo '<div class="casino-list">';
                                while ( $query->have_posts() ) : $query->the_post() ;
                                    $link = get_field('link');
                                    echo '<div class="casino-card">';
                                        echo '<div class="casino-card-item one">';
                                            echo '<a class="casino-card-link" aria-label="Casino card" href="'.get_permalink($item->ID).'">';
                                                echo '<div class="casino-card-image">';
                                                    echo get_the_post_thumbnail($item->ID);
                                                echo '</div>';
                                            echo '</a>';
                                            echo '<div class="casino-card-middle title">';
                                                echo '<span class="casino-card-title">Бонус на депозит</span>';
                                                $cur_terms = get_the_terms( $item->ID, 'bonuses' );
                                                if( is_array( $cur_terms ) ) {
                                                    foreach ( $cur_terms as $cur_term ) {
                                                        echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                            echo '<span class="casino-card-bonus page">'.$cur_term->name.'</span>';
                                                        echo '</a>';
                                                    }
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="casino-card-item two">';
                                            echo '<div class="casino-card-middle">';
                                                echo '<span class="casino-card-title">Вагер на бонус</span>';
                                                $cur_terms = get_the_terms( $item->ID, 'vager' );
                                                if( is_array( $cur_terms ) ) {
                                                    foreach ( $cur_terms as $cur_term ) {
                                                        echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                            echo '<span class="casino-card-bonus page">'.$cur_term->name.'</span>';
                                                        echo '</a>';
                                                    }
                                                }
                                            echo '</div>';
                                            echo '<div class="casino-card-middle type">';
                                                $cur_terms = get_the_terms( $item->ID, 'type' );
                                                if( is_array( $cur_terms ) ) {
                                                    foreach ( $cur_terms as $cur_term ) {
                                                        $tax_image = z_taxonomy_image_url($cur_term->term_id, 'pay_cards');
                                                        echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                            if ($tax_image) {
                                                                echo '<img id="patch" class="type-bonus-img" src="'.z_taxonomy_image_url($cur_term->term_id, 'pay_cards').'" />';
                                                                echo '<div class="hover-block-patch">';
                                                                    echo '<p>Липкий бонус</p>';
                                                                echo '</div>';
                                                            } else {
                                                                echo '<img id="no-patch" class="type-bonus-img" src="'.get_template_directory_uri().'/img/no-patch.svg">';
                                                                echo '<div class="hover-block-patch">';
                                                                    echo '<p>Нелипкий бонус</p>';
                                                                echo '</div>';
                                                            }
                                                        echo '</a>';
                                                    }
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="casino-card-item three">';
                                            echo '<div class="casino-card-middle">';
                                                $cur_terms = get_the_terms( $item->ID, 'spin' );
                                                if( is_array( $cur_terms ) ) {
                                                    foreach ( $cur_terms as $cur_term ) {
                                                        echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                            echo '<span class="casino-card-bonus page">'.$cur_term->name.'</span>';
                                                        echo '</a>';
                                                        if ( $cur_term->description ) {
                                                            echo '<span id="promocode-casino-'.$item->ID.'" class="promocode-casino">'.$cur_term->description.'</span>';
                                                            echo '<button id="copy-'.$item->ID.'" class="btn-code-copy-card">Скопировать</button>';
                                                            echo '<div class="hover-block casino" id="hover-block-'.$item->ID.'">';
                                                                echo '<div class="copy-icon" style="background-image: url('.get_template_directory_uri().'/img/copy.svg);"></div>';
                                                                echo '<span>Скопировать код</span>';
                                                            echo '</div>';
                                                        } else {
                                                            echo '<span class="no-promo">без ПРОМО</span>';
                                                        }
                                                    }
                                                } else {
                                                    echo '<span class="no-promo">Бесплатных спинов НЕТ</span>';
                                                }
                                            echo '</div>';
                                            echo '<div class="casino-card-middle">';
                                                $cur_terms = get_the_terms( $item->ID, 'dep' );
                                                if( is_array( $cur_terms ) ) {
                                                    foreach ( $cur_terms as $cur_term ) {
                                                        echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                            echo '<span class="casino-card-bonus page">'.$cur_term->name.'</span>';
                                                        echo '</a>';
                                                        echo '<a class="link-dep" href="https://www.youtube.com/channel/UCHD_Dx5tet1ZHHsn1kLYcZQ" target="_blank" rel="noreferrer">Перейти на канал</a>';
                                                    }
                                                } else {
                                                    echo '<span class="no-promo dep">Бездепозитных бонусов НЕТ</span>';
                                                }
                                            echo '</div>';
                                        echo '</div>';
                                        echo '<div class="casino-card-item four">';
                                            echo '<div class="casino-card-last">';
                                                echo '<a class="casino-card-submit" href="'.$link.'" rel="noreferrer">';  
                                                    echo '<span>Регистрация</span>';
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
