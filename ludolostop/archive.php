<?php get_header(); ?>

<section class="slots-single-block">
    <div class="slots-single-block-top">
        <div class="container">
            <div class="page-content-slots">
                <div class="breadcrumbs-block slots">
                    <?php true_breadcrumbs(); ?>
                </div>
                <div class="page-title">
                    <h1 class="title-page-h1 slots"><?php single_cat_title(); ?></h1>
                </div>
                <div class="archive-page">
                    <div class="page-cards-slots">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'providers' => $term->slug
                        );
                        $query = new WP_Query( $args );
                            if ( have_posts() ) :
                                while ( have_posts() ) : the_post();
                                    echo '<div class="main-slots-item page">';
                                        echo '<a class="main-slots-item-link" href="'.get_permalink().'">';
                                            echo '<div class="main-slots-block-image page-slots">';
                                                echo the_post_thumbnail();
                                                echo '<div class="main-slots-block-back">';
                                                    $rate = get_field('rate-slots');
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
                                            echo '<span class="title-main-slots-span">'.get_the_title().' </span>';
                                            echo '<span>от</span>';
                                            echo the_terms( $item->ID, 'providers' , ' ' );
                                        echo '</div>';
                                                    
                                    echo '</div>';
                                endwhile;
                            else :
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slots-single-block-bottom">
        <div class="container">
            <div class="stream-block-text">
                <div class="stream-block-text-content">
                    <?php $str=category_description(); 
					    if(!empty($str)){echo apply_filters("the_content", $str);}
                    ?> 
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

