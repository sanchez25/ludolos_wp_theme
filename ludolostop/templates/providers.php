<?php
/*Template Name: Providers*/
?>

<?php get_header()?>

<section class="casinos-block">
    <div class="slots-block-page">
        <div class="container">
            <div class="page-content-casinos">
                <div class="breadcrumbs-block slots">
                    <?php 
                    true_breadcrumbs(); ?>
                </div>
                <div class="page-title">
                    <h1 class="title-page-h1">Топ провайдеров</h1>
                </div>
                <div class="providers-list top">
                    <?php
                        $args = array(
                            'parent' => 0,
                            'hide_empty' => 0,
                            'exclude' => '', 
                            'number' => '4  ',
                            'orderby' => 'count',
                            'order' => 'ASC',
                            'pad_counts' => true
                        );
                        $catlist = get_terms('providers',$args);
                        foreach ($catlist as $cat) {
                            echo '<div class="providers-item">';
                                echo '<a class="providers-item-link" href="'.get_term_link($cat->slug, 'providers').'">';
                                    echo '<img src="'.z_taxonomy_image_url($cat->term_id, 'pay_cards').'" />';
                                echo '</a>';
                                echo '<div class="providers-item-bottom">';
                                    echo '<span class="providers-item-title">'.$cat->name.'</span>';
                                    echo '<a class="providers-item-btn" href="'.get_term_link($cat->slug, 'providers').'">Подробнее</a>';
                                echo '</div>'; 
                            echo '</div>';
                        }
                    ?>
                </div>
                
                
            </div>
        </div>
    </div>
    <div class="page-providers-block">
        <div class="container">
            <div class="top-block-providers">
                <div class="stream-block-text providers">
                    <div class="stream-block-text-content">
                        <?php echo the_content(); ?>    
                    </div>
                </div>
                <div class="container-page">
                    <div class="providers-list">
                        <?php
                            $args = array(
                                'parent' => 0,
                                'hide_empty' => 0,
                                'exclude' => '', 
                                'number' => '200',
                                'orderby' => 'count',
                                'order' => 'DESC',
                                'pad_counts' => true
                            );
                            $catlist = get_terms('providers',$args);
                            foreach ($catlist as $cat) {
                                echo '<div class="providers-item">';
                                    echo '<a class="providers-item-link" href="'.get_term_link($cat->slug, 'providers').'">';
                                        echo '<img src="'.z_taxonomy_image_url($cat->term_id, 'pay_cards').'" />';
                                    echo '</a>';
                                    echo '<div class="providers-item-bottom">';
                                        echo '<span class="providers-item-title">'.$cat->name.'</span>';
                                        echo '<a class="providers-item-btn" href="'.get_term_link($cat->slug, 'providers').'">Подробнее</a>';
                                    echo '</div>'; 
                                echo '</div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer()?>