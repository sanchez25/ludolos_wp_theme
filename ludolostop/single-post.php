<?php
/* Template Post Type: post */
?>

<?php get_header(); ?>

<section class="casinos-block">
    <div class="page-casinos-block">
        <div class="container casinos">
            <div class="page-content">
                <div class="breadcrumbs-block">
                    <?php true_breadcrumbs(); ?>
                </div>
                <div class="casinos-single">
                    <div class="single-casino-card">
                        <div class="casino-card-item one">
                            <div class="casino-card-image">
                                <?php echo get_the_post_thumbnail($item->ID); ?>
                            </div>
                            <div class="casino-card-middle title">
                                <span class="casino-card-title"><?php the_title($item->ID); ?></span>
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
                                        <span id="promocode-casino" class="promocode-casino"><?php echo $promocasino; ?></span>
                                        <button id="copy" class="btn-code-copy-card">Скопировать</button>
                                        <div class="hover-block casino" id="hover-block">
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
                            </div>
                        </div>
                    </div>
                    <div class="card-slot-rating">
                        <div class="card-slot-rating-left-casinos">
                            <div class="rate-param-item">
                                <div class="rate-param-title">
                                    <?php if((get_field('rate-one') == '1') || (get_field('rate-one') == '2')): ?>
                                        <span>Доход группы казино (за последние 4 года): <span style="color:#ff0000">Очень низкий</span></span>
                                    <?php elseif( (get_field('rate-one') == '3') || (get_field('rate-one') == '4') ): ?>
                                        <span>Доход группы казино (за последние 4 года): <span style="color:#ED7600">Низкий</span></span>
                                    <?php elseif((get_field('rate-one') == '5') || (get_field('rate-one') == '6')): ?>
                                        <span>Доход группы казино (за последние 4 года): <span style="color:#F3C408">Средний</span></span>
                                    <?php elseif((get_field('rate-one') == '7') || (get_field('rate-one') == '8')): ?>
                                        <span>Доход группы казино (за последние 4 года): <span style="color:#B5CA00">Хороший</span></span>
                                    <?php elseif((get_field('rate-one') == '9') || (get_field('rate-one') == '10')): ?>
                                        <span>Доход группы казино (за последние 4 года): <span style="color:#43C529">Высокий</span></span>
                                    <?php endif; ?>
                                </div>
                                <span class="rate-param-bar">
                                    <?php if( get_field('rate-one') == '1' ): ?>
                                        <span style="background-color:#ff0000;width: 10%"></span>
                                    <?php elseif( get_field('rate-one') == '2' ): ?>
                                        <span style="background-color:#ff0000;width: 20%"></span>
                                    <?php elseif( get_field('rate-one') == '3' ): ?>
                                        <span style="background-color:#ED7600;width: 30%"></span>
                                    <?php elseif( get_field('rate-one') == '4' ): ?>
                                        <span style="background-color:#ED7600;width: 40%"></span>
                                    <?php elseif( get_field('rate-one') == '5' ): ?>
                                        <span style="background-color:#F3C408;width: 50%"></span>
                                    <?php elseif( get_field('rate-one') == '6' ): ?>
                                        <span style="background-color:#F3C408;width: 60%"></span>
                                    <?php elseif( get_field('rate-one') == '7' ): ?>
                                        <span style="background-color:#B5CA00;width: 70%"></span>
                                    <?php elseif( get_field('rate-one') == '8' ): ?>
                                        <span style="background-color:#B5CA00;width: 80%"></span>
                                    <?php elseif( get_field('rate-one') == '9' ): ?>
                                        <span style="background-color:#43C529;width: 90%"></span>
                                    <?php elseif( get_field('rate-one') == '10' ): ?>
                                        <span style="background-color:#43C529;width: 100%"></span>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="rate-param-item">
                                <div class="rate-param-title">
                                    <?php if((get_field('rate-two') == '1') || (get_field('rate-two') == '2')): ?>
                                        <span>Условия и положения: <span style="color:#ff0000">Очень низкие</span></span>
                                    <?php elseif((get_field('rate-two') == '3') || (get_field('rate-two') == '4')): ?>
                                        <span>Условия и положения: <span style="color:#ED7600">Низкие</span></span>
                                    <?php elseif((get_field('rate-two') == '5') || (get_field('rate-two') == '6')): ?>
                                        <span>Условия и положения: <span style="color:#F3C408">Средние</span></span>
                                    <?php elseif((get_field('rate-two') == '7') || (get_field('rate-two') == '8')): ?>
                                        <span>Условия и положения: <span style="color:#B5CA00">Хорошие</span></span>
                                    <?php elseif((get_field('rate-two') == '9') || (get_field('rate-two') == '10')): ?>
                                        <span>Условия и положения: <span style="color:#43C529">Высокие</span></span>
                                    <?php endif; ?>
                                </div>
                                <span class="rate-param-bar">
                                    <?php if( get_field('rate-two') == '1' ): ?>
                                        <span style="background-color:#ff0000;width: 10%"></span>
                                    <?php elseif( get_field('rate-two') == '2' ): ?>
                                        <span style="background-color:#ff0000;width: 20%"></span>
                                    <?php elseif( get_field('rate-two') == '3' ): ?>
                                        <span style="background-color:#ED7600;width: 30%"></span>
                                    <?php elseif( get_field('rate-two') == '4' ): ?>
                                        <span style="background-color:#ED7600;width: 40%"></span>
                                    <?php elseif( get_field('rate-two') == '5' ): ?>
                                        <span style="background-color:#F3C408;width: 50%"></span>
                                    <?php elseif( get_field('rate-two') == '6' ): ?>
                                        <span style="background-color:#F3C408;width: 60%"></span>
                                    <?php elseif( get_field('rate-two') == '7' ): ?>
                                        <span style="background-color:#B5CA00;width: 70%"></span>
                                    <?php elseif( get_field('rate-two') == '8' ): ?>
                                        <span style="background-color:#B5CA00;width: 80%"></span>
                                    <?php elseif( get_field('rate-two') == '9' ): ?>
                                        <span style="background-color:#43C529;width: 90%"></span>
                                    <?php elseif( get_field('rate-two') == '10' ): ?>
                                        <span style="background-color:#43C529;width: 100%"></span>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="rate-param-item">
                                <div class="rate-param-title">
                                    <?php if((get_field('rate-three') == '1') || (get_field('rate-three') == '2')): ?>
                                        <span>Черные списки: <span style="color:#ff0000">Очень много</span></span>
                                    <?php elseif((get_field('rate-three') == '3') || (get_field('rate-three') == '4')): ?>
                                        <span>Черные списки: <span style="color:#ED7600">Много</span></span>
                                    <?php elseif((get_field('rate-three') == '5') || (get_field('rate-three') == '6')): ?>
                                        <span>Черные списки: <span style="color:#F3C408">Немного</span></span>
                                    <?php elseif((get_field('rate-three') == '7') || (get_field('rate-three') == '8')): ?>
                                        <span>Черные списки: <span style="color:#B5CA00">Мало</span></span>
                                    <?php elseif((get_field('rate-three') == '9') || (get_field('rate-three') == '10')): ?>
                                        <span>Черные списки: <span style="color:#43C529">Нет</span></span>
                                    <?php endif; ?>
                                </div>
                                <span class="rate-param-bar">
                                    <?php if( get_field('rate-three') == '1' ): ?>
                                        <span style="background-color:#ff0000;width: 10%"></span>
                                    <?php elseif( get_field('rate-three') == '2' ): ?>
                                        <span style="background-color:#ff0000;width: 20%"></span>
                                    <?php elseif( get_field('rate-three') == '3' ): ?>
                                        <span style="background-color:#ED7600;width: 30%"></span>
                                    <?php elseif( get_field('rate-three') == '4' ): ?>
                                        <span style="background-color:#ED7600;width: 40%"></span>
                                    <?php elseif( get_field('rate-three') == '5' ): ?>
                                        <span style="background-color:#F3C408;width: 50%"></span>
                                    <?php elseif( get_field('rate-three') == '6' ): ?>
                                        <span style="background-color:#F3C408;width: 60%"></span>
                                    <?php elseif( get_field('rate-three') == '7' ): ?>
                                        <span style="background-color:#B5CA00;width: 70%"></span>
                                    <?php elseif( get_field('rate-three') == '8' ): ?>
                                        <span style="background-color:#B5CA00;width: 80%"></span>
                                    <?php elseif( get_field('rate-three') == '9' ): ?>
                                        <span style="background-color:#43C529;width: 90%"></span>
                                    <?php elseif( get_field('rate-three') == '10' ): ?>
                                        <span style="background-color:#43C529;width: 100%"></span>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="rate-param-item">
                                <div class="rate-param-title">
                                    <?php if((get_field('rate-four') == '1') || (get_field('rate-four') == '2')): ?>
                                        <span>Соотношение размера к жалобам: <span style="color:#ff0000">Очень низкое</span></span>
                                    <?php elseif((get_field('rate-four') == '3') || (get_field('rate-four') == '4')): ?>
                                        <span>Соотношение размера к жалобам: <span style="color:#ED7600">Низкое</span></span>
                                    <?php elseif((get_field('rate-four') == '5') || (get_field('rate-four') == '6')): ?>
                                        <span>Соотношение размера к жалобам: <span style="color:#F3C408">Нормальное</span></span>
                                    <?php elseif((get_field('rate-four') == '7') || (get_field('rate-four') == '8')): ?>
                                        <span>Соотношение размера к жалобам: <span style="color:#B5CA00">Хорошее</span></span>
                                    <?php elseif((get_field('rate-four') == '9') || (get_field('rate-four') == '10')): ?>
                                        <span>Соотношение размера к жалобам: <span style="color:#43C529">Очень хорошее</span></span>
                                    <?php endif; ?>
                                </div>
                                <span class="rate-param-bar">
                                    <?php if( get_field('rate-four') == '1' ): ?>
                                        <span style="background-color:#ff0000;width: 10%"></span>
                                    <?php elseif( get_field('rate-four') == '2' ): ?>
                                        <span style="background-color:#ff0000;width: 20%"></span>
                                    <?php elseif( get_field('rate-four') == '3' ): ?>
                                        <span style="background-color:#ED7600;width: 30%"></span>
                                    <?php elseif( get_field('rate-four') == '4' ): ?>
                                        <span style="background-color:#ED7600;width: 40%"></span>
                                    <?php elseif( get_field('rate-four') == '5' ): ?>
                                        <span style="background-color:#F3C408;width: 50%"></span>
                                    <?php elseif( get_field('rate-four') == '6' ): ?>
                                        <span style="background-color:#F3C408;width: 60%"></span>
                                    <?php elseif( get_field('rate-four') == '7' ): ?>
                                        <span style="background-color:#B5CA00;width: 70%"></span>
                                    <?php elseif( get_field('rate-four') == '8' ): ?>
                                        <span style="background-color:#B5CA00;width: 80%"></span>
                                    <?php elseif( get_field('rate-four') == '9' ): ?>
                                        <span style="background-color:#43C529;width: 90%"></span>
                                    <?php elseif( get_field('rate-four') == '10' ): ?>
                                        <span style="background-color:#43C529;width: 100%"></span>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="rate-param-item">
                                <div class="rate-param-title">
                                    <?php if((get_field('rate-five') == '1') || (get_field('rate-five') == '2')): ?>
                                        <span>Другие факторы: <span style="color:#ff0000">Плохо</span></span>
                                    <?php elseif((get_field('rate-five') == '3') || (get_field('rate-five') == '4')): ?>
                                        <span>Другие факторы: <span style="color:#ED7600">Низко</span></span>
                                    <?php elseif((get_field('rate-five') == '5') || (get_field('rate-five') == '6')): ?>
                                        <span>Другие факторы: <span style="color:#F3C408">Удовлетворительно</span></span>
                                    <?php elseif((get_field('rate-five') == '7') || (get_field('rate-five') == '8')): ?>
                                        <span>Другие факторы: <span style="color:#B5CA00">Нейтрально</span></span>
                                    <?php elseif((get_field('rate-five') == '9') || (get_field('rate-five') == '10')): ?>
                                        <span>Другие факторы: <span style="color:#43C529">Отлично</span></span>
                                    <?php endif; ?>
                                </div>
                                <span class="rate-param-bar">
                                    <?php if( get_field('rate-five') == '1' ): ?>
                                        <span style="background-color:#ff0000;width: 10%"></span>
                                    <?php elseif( get_field('rate-five') == '2' ): ?>
                                        <span style="background-color:#ff0000;width: 20%"></span>
                                    <?php elseif( get_field('rate-five') == '3' ): ?>
                                        <span style="background-color:#ED7600;width: 30%"></span>
                                    <?php elseif( get_field('rate-five') == '4' ): ?>
                                        <span style="background-color:#ED7600;width: 40%"></span>
                                    <?php elseif( get_field('rate-five') == '5' ): ?>
                                        <span style="background-color:#F3C408;width: 50%"></span>
                                    <?php elseif( get_field('rate-five') == '6' ): ?>
                                        <span style="background-color:#F3C408;width: 60%"></span>
                                    <?php elseif( get_field('rate-five') == '7' ): ?>
                                        <span style="background-color:#B5CA00;width: 70%"></span>
                                    <?php elseif( get_field('rate-five') == '8' ): ?>
                                        <span style="background-color:#B5CA00;width: 80%"></span>
                                    <?php elseif( get_field('rate-five') == '9' ): ?>
                                        <span style="background-color:#43C529;width: 90%"></span>
                                    <?php elseif( get_field('rate-five') == '10' ): ?>
                                        <span style="background-color:#43C529;width: 100%"></span>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-slot-rating-right">
                            <div class="card-slot-rating-number">
                                <?php echo $rate; ?>
                            </div>
                            <span class="card-slot-rating-num-title">Общая оценка от Лудолося</span>
                        </div>
                    </div>
                    <div class="single-casinos-bonuses">
                        <?php
                            $bonus_posts = get_posts(array('post_type'=>'bonuses', 'post_parent'=>$post->ID, 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC'));
                            if($bonus_posts) {
                                echo '<div class="single-casinos-bonuses-title">';
                                    echo '<h2>Бонусы</h2>';
                                echo '</div>';
                                echo '<div class="bonuses-list">';
                                    foreach ($bonus_posts as $post) {
                                        $bonus = get_field('bonus', $post->ID);
                                        $promo = get_field('promo', $post->ID);
                                        $link = get_field('link', $post->ID);
                                        $linkbonus = get_field('link-bonus', $post->ID);
                                        $namecasino = get_field('name-casino', $post->ID);
                                        echo '<div class="bonus-item">';
                                            echo '<a aria-label="Casino img" class="bonus-item-link" href="'.$linkbonus.'" rel="nofollow">';
                                                echo '<div class="bonus-item-right-img">';
                                                    echo get_the_post_thumbnail($item->ID);
                                                echo '</div>';
                                            echo '</a>';
                                            echo '<a class="bonus-item-link" href="'.$linkbonus.'" rel="nofollow">';
                                                echo '<span class="bonus-item-title">'.$item->post_title.'</span>';
                                            echo '</a>';
                                            /*echo '<span class="bonus-item-subtitle">';
                                                echo '<span class="bonus-item-subtitle-icon" style="background-image: url('.get_template_directory_uri().'/img/present.svg);"></span>';
                                                echo '<span class="bonus-item-subtitle-text">'.$bonus.' <a href="'.$link.'" class="bonus-item-title-right" rel="nofollow">от '.$namecasino.'</a></span>';
                                            echo '</span>';*/
                                            echo '<a href="'.$link.'" class="bonus-item-right-btn">';
                                                echo '<div class="bonus-item-right-icon" style="background-image: url('.get_template_directory_uri().'/img/eye.svg);"></div>';
                                                echo '<span>Просмотреть обзор</span>';
                                            echo '</a>';
                                            if($promo) {
                                                echo '<div class="code-copy">';
                                                    echo '<p>Введите промокод при регистрации</p>';
                                                    echo '<button id="copy-'.$post->ID.'" class="copy-btn">';
                                                        echo '<span id="promocode-'.$post->ID.'">'.$promo.'</span>';
                                                    echo '</button>';
                                                    echo '<div class="hover-block" id="hover-block-'.$post->ID.'">';
                                                        echo '<div class="copy-icon" style="background-image: url('.get_template_directory_uri().'/img/copy.svg);"></div>';
                                                        echo '<span>Скопировать код</span>';
                                                    echo '</div>';
                                                echo '</div>';
                                            }
                                            echo '<a href="'.$linkbonus.'" class="bonus-item-right-btn play">';
                                                echo '<div class="bonus-item-right-icon" style="background-image: url('.get_template_directory_uri().'/img/play-bonus.svg);"></div>';
                                                echo '<span>Получить</span>';
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                    wp_reset_postdata();
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slots-block-page">
        <div class="container">
            <div class="slots-providers-block-title">
                <h2>Топ слотов казино <?php the_title(); ?></h2>
            </div>
            <div class="slots-block-content">
                <div class="page-cards-slots">
                    <?php
                        $connected = new WP_Query( array(
                            'connected_type' => 'review_to_slots',
                            'connected_items' => get_queried_object(),
                            'nopaging' => true,
                            'posts_per_page' => 2,
                        ) );

                        if ( $connected->have_posts() ) : ?>
                            <div class="page-cards-slots">
                                <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                                    <div class="main-slots-item page">
                                        <a class="main-slots-item-link" href="<?php echo get_permalink() ?>">
                                            <div class="main-slots-block-image page">
                                                <?php echo get_the_post_thumbnail($item->ID); ?>
                                                <div class="main-slots-block-back">
                                                    <div class="casino-card-rate slots"><?php echo get_field('rate-slots') ?></div>
                                                    <span class="play-btn">
                                                        <div class="ikon-play-btn" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/play.svg)"></div>
                                                    </span>
                                                    <div class="play-text">Играть бесплатно</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="main-slots-block-title top">
                                            <span class="title-main-slots-span"><?php the_title(); ?></span>
                                            <span>от</span>
                                            <?php echo the_terms( $item->ID, 'providers' , ' ' ); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                    <?php
                        wp_reset_postdata();
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="page-casinos-block">
        <div class="container casinos">
            <div class="page-content">
                <div class="single-casinos-text">
                    <div class="single-casinos-text-block">
                        <?php echo the_content(); ?>
                    </div>
                    <div class="more-details open-btn">
                        <div class="details-btn">
                            <div class="details-btn-icon" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/down.svg);"></div>
                            <span>Читать далее</span>
                        </div>
                    </div>
                    <div class="more-details close-btn">
                        <div class="details-btn">
                            <div class="details-btn-icon close" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/down.svg);"></div>
                            <span>Скрыть</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>



<?php get_footer(); ?>

