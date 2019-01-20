<?php
// Skeleton TRDC
// functions

function skeletontrdc_enq_scripts() {
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
    wp_enqueue_style( 'skeleton', get_template_directory_uri() . '/css/skeleton.css' );
    wp_enqueue_style( 'skeleton-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'Raleway-font', '//fonts.googleapis.com/css?family=Raleway:400,300,600' );
    wp_enqueue_style( 'mmmburgers', get_template_directory_uri() . '/css/hamburgers.min.css' );
    wp_enqueue_script('my-custom-script', get_template_directory_uri() .'/js/burgermenu.js', array('jquery'), null, true);
};
add_action( 'wp_enqueue_scripts', 'skeletontrdc_enq_scripts' );

// sidebar

add_action( 'widgets_init', 'skeletontrdc_widgets_init' );
function skeletontrdc_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'skeletontrdc' ),
        'id' => 'sidebar-1',
        'description' => __( 'Sidebar widgets.', 'skeletontrdc' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
      	'after_widget'  => '</div>',
      	'before_title'  => '<h4 class="widgettitle">',
      	'after_title'   => '</h4>',
    ) );
}

// customizer

function skeletontrdc_customize_reg( $wp_customize ) {
  $wp_customize->add_setting( 'skeletontrdc_footertext' , array(
    'default'   => 'Footer Text Here',
    'transport' => 'refresh',
    ) );
  $wp_customize->add_section( 'skeletontrdc_customize_bits' , array(
       'title'      => __( 'Skeleton Settings', 'skeletontrdc' ),
       'priority'   => 30,
   ) );
  $wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'skeletontrdc_footertext',
        array(
            'label'          => __( 'Footer Text', 'skeletontrdc' ),
            'section'        => 'skeletontrdc_customize_bits',
            'settings'       => 'skeletontrdc_footertext',
            'type'           => 'text'
        )
    )
); 
}
add_action( 'customize_register', 'skeletontrdc_customize_reg' );

// nav menu

add_action( 'after_setup_theme', 'skeletontrdc_reg_nav' );
function skeletontrdc_reg_nav() {
  register_nav_menu( 'topmenu', __( 'Top Menu', 'skeletontrdc' ) );
}

// register 960 image

add_image_size( 'skeleton-full-width', 960, 960, FALSE );
function add_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'skeleton-full-width' => __( 'Skeleton Full Width' )
    ) );
}
add_filter( 'image_size_names_choose', 'add_custom_sizes' );

// adds u-full-width and strips height from all old images

function make_old_images_respond($content) {
   global $post;
   //$pattern ="/<img(.*?)class=\"(.*?)\"(.*?)height=\"(.*?)\"(.*?)>/i";
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 u-full-width "$3>';
   $content = preg_replace($pattern, $replacement, $content);
   $pattern ="/<img(.*?)height=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1 $3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'make_old_images_respond');

?>