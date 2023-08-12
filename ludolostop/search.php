
<?php get_header(); ?>

	<section class="casinos-block">
		<div class="archive-block">
			<div class="container">
				<div class="page-content-casinos">
					<div class="breadcrumbs-block">
						<?php 
						true_breadcrumbs(); ?>
					</div>
					<div class="page-title">
						<h1 class="title-page-h1 casinos"><?php the_title(); ?></h1>
					</div>
					<div class="taxonomy-bonus" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/main-banner.svg)">
						<?php
							$term = get_queried_object();
							$promo = get_field('promo', $term);
							$linkbonus = get_field('link-bonus', $term);
						?>
						<div class="code-copy-bonus">
							<p>Введите промокод при регистрации</p>
							<button id="copy" class="copy-btn-bonus">
								<span id="promocode-casino"><?php echo $promo; ?></span>
							</button>
							<div class="hover-block bonus" id="hover-block">
								<div class="copy-icon" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/copy.svg);"></div>
								<span>Скопировать код</span>
							</div>
						</div>
						<a href="<?php echo $linkbonus; ?>" class="bonus-item-right-btn play bonus">
							<span>Получить бонус</span>
						</a>
					</div>
					<div class="casinos-single">
						<div class="single-casinos-bonuses-title">
							<h2>Список казино с данным бонусом</h2>
						</div>
						<?php
							$args = array(
								'post_type' => 'post',
								'bonuses' => $term->slug
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
				</div>
			</div>
		</div>
	</section>

<?php get_footer();
