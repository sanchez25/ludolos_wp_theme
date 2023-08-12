<?php
/*Template Name: Bonuses*/
?>

<?php get_header()?>

<section class="casinos-block">
    <div class="page-providers-block">
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
                    /*if ($items = get_posts(array('numberposts' => 50, 'post_type' => 'bonuses'))) {
                        echo '<div class="bonuses-list">';
                            foreach ($items as $item) { 
                                $bonus = get_field('bonus', $item->ID);
                                $promo = get_field('promo', $item->ID);
                                $link = get_field('link', $item->ID);
                                $linkbonus = get_field('link-bonus', $item->ID);
                                $namecasino = get_field('name-casino', $item->ID);
                                echo '<div class="bonus-item">';
                                    echo '<a aria-label="Casino img" class="bonus-item-link" href="'.$linkbonus.'" rel="nofollow">';
                                        echo '<div class="bonus-item-right-img">';
                                            echo get_the_post_thumbnail($item->ID);
                                        echo '</div>';
                                    echo '</a>';
                                    echo '<a class="bonus-item-link" href="'.$linkbonus.'" rel="nofollow">';
                                        echo '<span class="bonus-item-title">'.$item->post_title.'</span>';
                                    echo '</a>';
                                    echo '<a href="'.$link.'" class="bonus-item-right-btn">';
                                        echo '<div class="bonus-item-right-icon" style="background-image: url('.get_template_directory_uri().'/img/eye.svg);"></div>';
                                        echo '<span>Просмотреть обзор</span>';
                                    echo '</a>';
                                    if($promo) {
                                        echo '<div class="code-copy">';
                                            echo '<p>Введите промокод при регистрации</p>';
                                            echo '<button id="copy-'.$item->ID.'" class="copy-btn">';
                                                echo '<span id="promocode-'.$item->ID.'">'.$promo.'</span>';
                                            echo '</button>';
                                            echo '<div class="hover-block" id="hover-block-'.$item->ID.'">';
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
                        echo '</div>';
                    }*/
                    $args = array(
                        'parent' => 0,
                        'hide_empty' => 0,
                        'exclude' => '', 
                        'number' => '200',
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'pad_counts' => true
                    );
                    $catlist = get_terms('bonuses',$args);
                    echo '<div class="bonuses-list">';
                        foreach ($catlist as $cat) {
                            $promo = get_field('promo', $cat->term_id);
                            $linkbonus = get_field('link-bonus', $cat->term_id);
                            echo '<div class="bonus-item">';
                                echo '<a aria-label="Casino img" class="bonus-item-link" href="'.get_term_link($cat->slug, 'bonuses').'">';
                                    echo '<div class="bonus-item-right-img">';
                                        echo '<img src="'.z_taxonomy_image_url($cat->term_id, 'pay_cards').'" />';
                                    echo '</div>';
                                echo '</a>';
                                echo '<a class="bonus-item-link" href="'.get_term_link($cat->slug, 'bonuses').'" rel="nofollow">';
                                    echo '<span class="bonus-item-title">'.$cat->name.'</span>';
                                echo '</a>';
                                echo '<a href="'.get_term_link($cat->slug, 'bonuses').'" class="bonus-item-right-btn">';
                                    echo '<div class="bonus-item-right-icon" style="background-image: url('.get_template_directory_uri().'/img/eye.svg);"></div>';
                                    echo '<span>Просмотреть обзор</span>';
                                echo '</a>';
                            echo '</div>';
                        }
                    echo '</div>';
                ?>
                <div class="stream-block-text providers">
                    <div class="stream-block-text-content">
                        <?php echo the_content(); ?>    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<?php get_footer()?>