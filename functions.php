<?php


function neve_theme_enqueue_styles()
{
   // wp_dequeue_script('jquery-core' );
   // wp_dequeue_script('jquery-migrate' );
   // wp_dequeue_script('jquery-ui-core' );
   // wp_enqueue_script('jquery-core' );
   // wp_enqueue_script('jquery-migrate' );
   // wp_enqueue_script('jquery-ui-core' );
   wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');
   wp_enqueue_style( 'owl-style', get_stylesheet_directory_uri() . '/css/owl.carousel.css');
   wp_enqueue_style( 'fancybox-style', get_stylesheet_directory_uri() . '/css/jquery.fancybox.css');
   wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/css/custom.css');
   wp_enqueue_style( 'responsive-style', get_stylesheet_directory_uri() . '/css/responsive.css');
   wp_enqueue_script( 'carousel-js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array('jquery'));
   wp_enqueue_script( 'fancybox-js', get_stylesheet_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'));
  
   wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js');
   

  
   
}

add_action('wp_enqueue_scripts', 'neve_theme_enqueue_styles',500);

