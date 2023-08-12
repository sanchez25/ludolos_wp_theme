<?php

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
remove_filter( 'comment_text', 'wpautop' );

add_action( 'after_setup_theme', 'mainMenu' );
add_theme_support( 'post-thumbnails' );

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

function mayak_category_description($container = ''){
	$content = is_object($container) && isset($container->description) ? html_entity_decode($container->description) : '';
	$editor_id = 'tag_description';
	$settings = 'description';		
?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="description">Описание</label></th>
		<td>
			<?php wp_editor($content, $editor_id, array(
					'textarea_name' => $settings,
					'editor_css' => '<style> .html-active .wp-editor-area{border:0;}</style>',
			)); ?><br />
			<span class="description">Описание по умолчанию не отображается, однако некоторые темы могут его показывать.</span>
		</td>
    </tr>
<?php	
}
add_filter('edit_category_form_fields', 'mayak_category_description');
add_filter('edit_tag_form_fields', 'mayak_category_description');

function mayak_remove_category_description(){
    if ( $mk_description->id == 'edit-category' or 'edit-tag' ){
    ?>
        <script type="text/javascript">
        jQuery(function($) {
        	$('textarea#description').closest('tr.form-field').remove();
        });
        </script>
    <?php
    }
}
add_action('admin_head', 'mayak_remove_category_description');

use PHPMailer\PHPMailer\PHPMailer;
 
function mihdan_send_smtp_email( PHPMailer $phpmailer ) {
  $phpmailer->isSMTP();
  $phpmailer->Host       = SMTP_HOST;
  $phpmailer->SMTPAuth   = SMTP_AUTH;
  $phpmailer->Port       = SMTP_PORT;
  $phpmailer->Username   = SMTP_USER;
  $phpmailer->Password   = SMTP_PASS;
  $phpmailer->SMTPSecure = SMTP_SECURE;
  $phpmailer->From       = SMTP_FROM;
  $phpmailer->FromName   = SMTP_NAME;
}
add_action( 'phpmailer_init', 'mihdan_send_smtp_email' );

wp_localize_script( 'truescript', 'true_obj', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

function mainMenu() {
	register_nav_menu( 'main', 'Основное меню' );
	register_nav_menu( 'footer', 'Меню в футере' );
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );
function my_scripts(){
    wp_enqueue_script( 'jquery' );
}

add_action( 'wp_enqueue_scripts', 'style_theme' );

function style_theme() {
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_image_size('image_play', 1280, 700, true );
add_image_size('image-slot', 1900, 1070, true );

add_action( 'init', 'register_post_types' );
function register_post_types() {

    register_post_type( 'Slots', [
		'label'  => null,
		'labels' => [
			'name'               => 'Слоты', 
			'singular_name'      => 'Слот', 
			'add_new'            => 'Добавить слот', 
			'add_new_item'       => 'Добавление слотов', 
			'edit_item'          => 'Редактирование слота', 
			'new_item'           => 'Новый слот', 
			'view_item'          => 'Смотреть слоты', 
			'search_items'       => 'Искать слоты', 
			'not_found'          => 'Не найдено', 
			'not_found_in_trash' => 'Не найдено в корзине', 
			'parent_item_colon'  => '', 
			'menu_name'          => 'Слоты',
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => null, 
		'show_in_rest'        => null, 
		'rest_base'           => null, 
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'custom-fields', 'comments' ], 
		'taxonomies'          => [ 'category' ],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}

add_action( 'init', 'create_taxonomy' );
function create_taxonomy() {

	register_taxonomy( 'providers', [ 'post', 'slots' ], [ 
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Провайдеры',
			'singular_name'     => 'Провайдер',
			'search_items'      => 'Поиск провайдеров',
			'all_items'         => 'Все провайдеры',
			'view_item '        => 'Просмотреть провайдеров',
			'parent_item'       => 'Родительские провайдеры',
			'parent_item_colon' => 'Родительские провайдеры',
			'edit_item'         => 'Редактировать провайдера',
			'update_item'       => 'Обновить провайдеров',
			'add_new_item'      => 'Добавить нового провайдера',
			'new_item_name'     => 'Новое название провайдера',
			'menu_name'         => 'Провайдеры',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	] );

	register_taxonomy( 'bonuses', [ 'post' ], [ 
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Бонус на депозит',
			'singular_name'     => 'Бонус на депозит',
			'search_items'      => 'Поиск бонусов',
			'all_items'         => 'Все бонусы',
			'view_item '        => 'Просмотреть бонусы',
			'parent_item'       => 'Родительские бонусы',
			'parent_item_colon' => 'Родительские бонусы',
			'edit_item'         => 'Редактировать бонус',
			'update_item'       => 'Обновить бонусы',
			'add_new_item'      => 'Добавить новый бонус',
			'new_item_name'     => 'Новое название бонуса',
			'menu_name'         => 'Бонус на депозит',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	] );

	register_taxonomy( 'vager', [ 'post' ], [ 
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Вагер на бонус',
			'singular_name'     => 'Вагер на бонус',
			'search_items'      => 'Поиск вагеров',
			'all_items'         => 'Все вагеры',
			'view_item '        => 'Просмотреть вагеры',
			'parent_item'       => 'Родительские вагеры',
			'parent_item_colon' => 'Родительские вагеры',
			'edit_item'         => 'Редактировать вагер',
			'update_item'       => 'Обновить вагеры',
			'add_new_item'      => 'Добавить новый вагер',
			'new_item_name'     => 'Новое название вагера',
			'menu_name'         => 'Вагер на бонус',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	] );

	register_taxonomy( 'type', [ 'post' ], [ 
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Тип бонуса',
			'singular_name'     => 'Тип бонуса',
			'search_items'      => 'Поиск бонусов',
			'all_items'         => 'Все типы бонусов',
			'view_item '        => 'Просмотреть типы бонусов',
			'parent_item'       => 'Родительские типы бонусов',
			'parent_item_colon' => 'Родительские типы бонусов',
			'edit_item'         => 'Редактировать тип бонуса',
			'update_item'       => 'Обновить типы бонусов',
			'add_new_item'      => 'Добавить тип бонуса',
			'new_item_name'     => 'Новый тип бонуса',
			'menu_name'         => 'Тип бонуса',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	] );

	register_taxonomy( 'spin', [ 'post' ], [ 
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Бесплатные спины',
			'singular_name'     => 'Бесплатные спины',
			'search_items'      => 'Поиск бесплатных спинов',
			'all_items'         => 'Все бесплатные спины',
			'view_item '        => 'Просмотреть бесплатные спины',
			'parent_item'       => 'Родительские бесплатные спины',
			'parent_item_colon' => 'Родительские бесплатные спины',
			'edit_item'         => 'Редактировать спин',
			'update_item'       => 'Обновить спины',
			'add_new_item'      => 'Добавить бесплатный спин',
			'new_item_name'     => 'Новый бесплатный спин',
			'menu_name'         => 'Бесплатные спины',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	] );

	register_taxonomy( 'dep', [ 'post' ], [ 
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Бездепозитные бонусы',
			'singular_name'     => 'Бездепозитный бонус',
			'search_items'      => 'Поиск бездепозитных бонусов',
			'all_items'         => 'Все бездепозитные бонусы',
			'view_item '        => 'Просмотреть бездепозитные бонусы',
			'parent_item'       => 'Родительские бездепозитные бонусы',
			'parent_item_colon' => 'Родительские бездепозитные бонусы',
			'edit_item'         => 'Редактировать бездепозитный бонус',
			'update_item'       => 'Обновить бездепозитные бонусы',
			'add_new_item'      => 'Добавить бездепозитный бонус',
			'new_item_name'     => 'Новый бездепозитный бонус',
			'menu_name'         => 'Бездепозитные бонусы',
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false, 
		'show_in_rest'          => null, 
		'rest_base'             => null, 
	] );

}

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
        'name' => 'New Sidebar',
        'before_widget' => '<div class="newsidebar">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title">',
        'after_title' => '</div>',
    ));
}

if (function_exists("_p2p_load")) {
	function vp_post_to_post() {
		p2p_register_connection_type(array(
			'name' => 'review_to_slots',
			'from' => 'post',
			'to' => 'slots'
		));
	}
	add_action('p2p_init', 'vp_post_to_post');
}

add_action('add_meta_boxes', function () {
	add_meta_box( 'post_review', 'Обзоры', 'post_review_metabox', 'bonuses', 'side', 'low'  );
}, 1);

function post_review_metabox( $post ) {
	$reviews = get_posts(array( 'post_type'=>'post', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

	if( $reviews ){
		echo '
		<div style="max-height:200px; overflow-y:auto;">
			<ul>
		';	

		foreach( $reviews as $review ){
			echo '
			<li><label>
				<input type="radio" name="post_parent" value="'. $review->ID .'" '. checked($review->ID, $post->post_parent, 0) .'> '. esc_html($review->post_title) .'
			</label></li>
			';
		}
		echo '</ul>
		</div>';
	}
	else
		echo 'Обзоры не найдены...';
}

function true_breadcrumbs(){
 
	// получаем номер текущей страницы
	$page_num = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
 
	$separator = ' / '; //  разделяем обычным слэшем, но можете чем угодно другим
 
	// если главная страница сайта
	if( is_front_page() ){
 
		if( $page_num > 1 ) {
			echo '<a href="' . site_url() . '">Главная</a>' . $separator . $page_num . '-я страница';
		} else {
			echo 'Вы находитесь на главной странице';
		}
 
	} else { // не главная
 
		echo '<a href="' . site_url() . '">Главная</a>' . $separator;
 
		if( is_singular( $post_type_name ) ) {
			the_title();
		} elseif ( is_page() ){ // страницы WordPress 

			global $post;
		// если у текущей страницы существует родительская
		if ( $post->post_parent ) {
		
			$parent_id  = $post->post_parent; // присвоим в переменную
			$breadcrumbs = array(); 
		
			while ( $parent_id ) {
				$page = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id = $page->post_parent;
			}
		
			echo join( $separator, array_reverse( $breadcrumbs ) ) . $separator;
		
		}
 
			the_title();
 
		} elseif ( is_category() ) {
 
			single_cat_title();
 
		} elseif( is_tag() ) {
 
			single_tag_title();
 
		} elseif ( is_day() ) { // архивы (по дням)
 
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $separator;
			echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a>' . $separator;
			echo get_the_time('d');
 
		} elseif ( is_month() ) { // архивы (по месяцам)
 
			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $separator;
			echo get_the_time('F');
 
		} elseif ( is_year() ) { // архивы (по годам)
 
			echo get_the_time( 'Y' );
 
		} elseif ( is_author() ) { // архивы по авторам
 
			global $author;
			$userdata = get_userdata( $author );
			echo 'Опубликовал(а) ' . $userdata->display_name;
 
		} elseif ( is_404() ) { // если страницы не существует
 
			echo 'Ошибка 404';
 
		}
 
		if ( $page_num > 1 ) { // номер текущей страницы
			echo ' (' . $page_num . '-я страница)';
		}
 
	}

	if( is_tax( $taxonomy_name ) ) {
		$current_term = get_queried_object();
		// если родительский элемент таксономии существует
		if( $current_term->parent ) {
			echo get_term_parents_list( $current_term->parent, $taxonomy_name, array( 'separator' => $separator ) ) . $separator;
		}
		single_term_title();
	}
 
}

/*add_action( 'wp_ajax_myfilter', 'true_filter_function' ); 
add_action( 'wp_ajax_nopriv_myfilter', 'true_filter_function' );
 
function true_filter_function() {
 
	$args = array(
		'orderby' => 'date', 
		'order'	=> $_POST[ 'date' ]
	);
 
	
	if( isset( $_POST[ 'post' ] )) {
		$args[ 'tax_query' ] = array(
			array(
				'taxonomy' => 'bonuses',
				'field' => 'id',
				'terms' => $_POST[ 'post' ]
			)
		);
	}
 
	query_posts( $args );
 
	if ( have_posts() ) {
      		while ( have_posts() ) : the_post();
			// тут вывод шаблона поста, например через get_template_part()
          		echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
		endwhile;
	} else {
		echo 'Ничего не найдено';
	}
 
	die();
}*/



