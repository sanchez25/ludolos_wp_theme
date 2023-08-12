<?php
/*Template Name: Guides*/
?>


<?php get_header()?>

<section class="guides-single-block">
    <div class="container">
        <div class="page-content">
            <div class="breadcrumbs-block">
                <?php true_breadcrumbs(); ?>
            </div>
            <div class="page-title">
                <h1 class="title-page-h1 guides"><?php the_title(); ?></h1>
            </div>
            <div class="guides-block">
                <div class="guides-block-title">
                    <a id="tab-one" href="#tab-one" class="guides-block-item click">Как не замазаться после крупного заноса?</a>
                    <a id="tab-two" href="#tab-two" class="guides-block-item">Как контролировать игровую зависимость?</a>
                    <a id="tab-three" href="#tab-three" class="guides-block-item">Как выбрать надежные казино?</a>
                    <a id="tab-four" href="#tab-four" class="guides-block-item">Зачем нужна верификация?</a>
                </div>
                <div class="guides-block-content">
                    <div class="guides-block-content-text">
                        <?php echo get_field( 'guide-one' ); ?>
                    </div>
                </div>
                <div class="guides-block-content-two">
                    <div class="guides-block-content-text">
                        <?php echo get_field( 'guide-two' ); ?>
                    </div>
                </div>
                <div class="guides-block-content-three">
                    <div class="guides-block-content-text">
                        <?php echo get_field( 'guide-three' ); ?>
                    </div>
                </div>
                <div class="guides-block-content-four">
                    <div class="guides-block-content-text">
                        <?php echo get_field( 'guide-four' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer()?>