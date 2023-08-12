<?php
/*Template Name: Slots*/
?>

<?php get_header()?>

<section class="slots-single-block">
    <div class="slots-single-block-top">
        <div class="container">
            <div class="page-content-slots">
                <div class="breadcrumbs-block slots">
                    <?php true_breadcrumbs(); ?>
                </div>
                <div class="page-title">
                    <h1 class="title-page-h1">Топ 4 слотов от Лудолося</h1>
                </div>
                <div class="slots-block-content">
                    <?php
                        if ($items = get_posts(array('numberposts' => 4, 'post_type' => 'Slots', 'category' => 32))) {
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
                                    echo '<div class="main-slots-block-title top">';
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
        </div>
    </div>
    <div class="slots-single-block-bottom">
        <div class="container">
            <div class="stream-block-text slots">
                <div class="stream-block-text-content">
                    <?php echo the_content(); ?>    
                </div>
            </div>
            <div class="container-page">
                <div class="page-cards-slots">
                    <?php
                        if ($items = get_posts(array('numberposts' => 50, 'post_type' => 'Slots'))) {
                            foreach($items as $item) {
                                $rate = get_field('rate-slots', $item->ID);
                                echo '<div class="main-slots-item page">';
                                    echo '<a class="main-slots-item-link" href="'.get_permalink($item->ID).'">';
                                        echo '<div class="main-slots-block-image page-slots">';
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
        </div>
    </div>
</section>

<?php get_footer()?>