<?php
/**
 * artilleryMuseum functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package artilleryMuseum
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function artillerymuseum_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on artilleryMuseum, use a find and replace
		* to change 'artillerymuseum2' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'artillerymuseum2', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'artillerymuseum2' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'artillerymuseum_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'artillerymuseum_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function artillerymuseum_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'artillerymuseum_content_width', 640 );
}
add_action( 'after_setup_theme', 'artillerymuseum_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function artillerymuseum_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'artillerymuseum2' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'artillerymuseum2' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'artillerymuseum_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function artillerymuseum_scripts() {
	wp_enqueue_style( 'artillerymuseum2-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'artillerymuseum2-style', 'rtl', 'replace' );

	wp_enqueue_script( 'artillerymuseum2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'artillerymuseum_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
  Container::make( 'theme_options', __( 'Наполнение' ) )
    ->add_tab( __( 'Информация о сайте' ), array(
      Field::make( 'image', 'main_logo', __( 'Логотип' ) ),
      Field::make( 'text', 'main_heading', __( 'Главный заголовок' ) ),

      Field::make( 'text', 'main_address', __( 'Адрес' ) ),
      Field::make( 'text', 'main_phone', __( 'Телефон' ) ),
      Field::make( 'text', 'main_email', __( 'Эл. почта' ) ),
      Field::make( 'text', 'main_fax', __( 'Факс' ) ),

      Field::make( 'complex', 'social_networks',  __( 'Соц. сети' ) )
        ->add_fields( array(
          Field::make( 'text', 'social_network_link', __( 'Сылка' ) ),
          Field::make( 'image', 'social_network_icon', __( 'Иконка' ) )
        ) )
        ->set_layout( 'tabbed-vertical' )
        ->set_header_template( '<%= social_network_link %>' ),

      Field::make( 'complex', 'timetable',  __( 'Расписание' ) )
        ->add_fields( array(
          Field::make( 'select', 'timetable_day', __( 'День' ))
            ->add_options( array(
              'Понедельник' => 'Понедельник',
              'Вторник' => 'Вторник',
              'Среда' => 'Среда',
              'Четверг' => 'Четверг',
              'Пятница' => 'Пятница',
              'Суббота' => 'Суббота',
              'Воскресенье' => 'Воскресенье'
            ) ),

          Field::make( 'select', 'weakened', __( 'Статус' ))
            ->add_options( array(
              'true'  => 'Выходной',
              'false' => 'Робочий день',
            ) ),

          Field::make( 'time', 'timetable_time_begin_museum', __( 'Время открытия музея' ) )
            ->set_conditional_logic( array(
              array(
                'field'    => 'weakened',
                'value'    => 'false',
                'operator' => '==',
              ),
            ) )
            ->set_storage_format('H:i'),

          Field::make( 'select', 'lunch', __( 'Обед' ))
            ->add_options( array(
              'false'   => 'Без обеда',
              'true'    => 'Выберать время',
            ) )
            ->set_conditional_logic( array(
              array(
                'field'    => 'weakened',
                'value'    => 'false',
                'operator' => '==',
              ),
            ) ),

          Field::make( 'time', 'timetable_lunch_start', __( 'Начало обеда' ) )
            ->set_conditional_logic(array(
              array(
                'field'    => 'lunch',
                'value'    => 'true',
                'operator' => '==',
              ),
              array(
                'field'    => 'weakened',
                'value'    => 'false',
                'operator' => '==',
              ),
            ))
            ->set_storage_format('H:i'),
          Field::make( 'time', 'timetable_lunch_end', __( 'Конец обеда' ) )
            ->set_conditional_logic(array(
              array(
                'field'    => 'lunch',
                'value'    => 'true',
                'operator' => '==',
              ),
              array(
                'field'    => 'weakened',
                'value'    => 'false',
                'operator' => '==',
              ),
            ))
            ->set_storage_format('H:i'),

          Field::make( 'time', 'timetable_time_end_cash', __( 'Время закрытия кассы' ) )
            ->set_conditional_logic( array(
              array(
                'field'    => 'weakened',
                'value'    => 'false',
                'operator' => '==',
              ),
            ) )
            ->set_storage_format('H:i'),
          Field::make( 'time', 'timetable_time_end_museum', __( 'Время закрытия музея' ) )
            ->set_conditional_logic( array(
              array(
                'field'    => 'weakened',
                'value'    => 'false',
                'operator' => '==',
              ),
            ) )
            ->set_storage_format('H:i'),
        ) )
        ->set_layout( 'tabbed-vertical' ),

      Field::make( 'text', 'main_map', __( 'Ссылка на яндекс координаты' ) ),
      Field::make( 'text', 'contacts_link', __( 'Ссылка на страницу "Контакты"' ) )
    ) )
    ->add_tab( __( 'Новости' ), array(
      Field::make( 'complex', 'news',  __( 'Новости' ) )
        ->add_fields( array(
          Field::make( 'text', 'news_title', __( 'Заголовок' ) ),
          Field::make( 'image', 'news_main_image', __( 'Новостная обложка' ) ),
          Field::make( 'date', 'news_date', __( 'Дата' ) )
        ))
        ->set_layout( 'tabbed-vertical' )
        ->set_header_template( '<%= news_title %>' )
    ) );
//    ->add_tab( __( 'О компании' ), array(
//      Field::make( 'rich_text', 'about_description_one', __( 'Первый блок с текстом' ) ),
//      Field::make( 'rich_text', 'about_description_two', __( 'Второй блок с текстом' ) ),
//    ) )
//    ->add_tab( __( 'Услуги' ), array(
//      Field::make( 'rich_text', 'specializations_page_description', __( 'Описание страницы "Услуги"' ) ),
//      Field::make( 'text', 'specializations_page_link', __( 'Ссылка на страницу "Услуги"' ) ),
//    ) )
//    ->add_fields( array(
//      Field::make( 'text', 'crb_text', 'Text Field' ),
//    ) );
}
