<!DOCTYPE html>
<html <?php language_attributes(); $lang = explode("lang=",get_language_attributes()); ?>>
  <head>
    <title><?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title')); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta name="language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:locale" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo (is_single() ? get_bloginfo('title')." - ".get_the_title() : get_bloginfo('title')); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true">
    <?php wp_meta(); ?>
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php 
      wp_head(); 
      global $post;
      $curr_page = get_the_title();
      function to_permalink($str)
      {
          if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
              $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
          $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
          $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\\1', $str);
          $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
          $str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
          $str = strtolower( trim($str, '-') );
          return $str;
      }
    ?>
  </head>
  <body   
  <?php
    if (is_front_page()) {
      echo 'class="pg-home"';
    } else if(is_author()){
      echo 'class="pg-author pg-profile pg-interna"';
    } else if(is_archive()){
      echo 'class="pg-archive pg-interna"';
    } else if(is_category()){
      echo 'class="pg-category pg-interna"';
    } else if(is_search()){
      echo 'class="pg-search pg-interna"';
    } else if(is_single()){
      echo 'class="pg-single pg-interna"';
    } else if(is_404()){
      echo 'class="pg-404 pg-interna"';
    } else {
      echo 'class="pg-interna pg-'.( (str_replace(' ','-',strToLower(get_the_title())) == 'contato' || 'trabalne-conosco') ? 'trabalhe-conosco' : str_replace(' ','-',strToLower(get_the_title())) ).' page_id_'.$post->ID.'"';
    }
    ?>>  
    <div id="wrap">
      <header>
        <nav class="mobile_navigation">
          <ul>
            <?php wp_nav_menu( array( 'container' => false, 'menu' => 'header', 'items_wrap' => '%3$s', 'container_class'=>'' ) ); ?>      
          </ul>
        </nav>
        <div class="topbar">
          <div class="container">
            <?php if(get_theme_mod('telefone')) : ?>
            <p>
              <span><?php echo get_theme_mod('telefone'); ?></span>
            </p>
            <?php endif; ?>
            <?php if(!is_user_logged_in()) : ?>
            <a href="<?php echo wp_login_url(); ?>" class="area-do-cliente">
              <i class="fas fa-lock"></i>
              <span>Área do cliente</span>
            </a>    
            <?php endif; ?>        
            <?php get_template_part( 'template_parts/social_networks' ); ?>
          </div>
        </div>
        <div class="translate">
          <div class="container">
            <ul class="social-networks">
              <li>
                <a href="">
                  <i class="flag-icon flag-icon-br"></i>
                </a>
              </li>
<!--               <li>
                <a href="">
                  <i class="flag-icon flag-icon-es"></i>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="flag-icon flag-icon-us"></i>
                </a>
              </li> -->
            </ul>
          </div>
        </div>
        <div class="header">
          <div class="container">
            <h1 class="logo">
              <a href="<?php echo site_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
                  <?php if(get_theme_mod('logo')) : ?>
                      <img height="120" src="<?php echo get_theme_mod('logo'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
                  <?php else : ?>
                      <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
                  <?php endif; ?>
              </a> 
            </h1>
            <nav class="navigation">
              <ul>
                <?php
                    foreach (wp_get_nav_menu_items('header') as $key => $value) {
                      echo '<li class="'.( (to_permalink($value->title) == to_permalink($curr_page)) ? 'current' : '' ).'"><a href="'.$value->url.'" title="'.$value->title.'">'.$value->title.'</a>';
                          // if($value->title == 'Serviços' && $submenus){
                          //   $terms = get_terms( array( 
                          //       'taxonomy' => to_permalink($value->title).'_categories',
                          //       'hide_empty' => 0,
                          //       'parent'   => 0
                          //   ) ); 
                          //   if($terms){
                          //     echo '<ul>';
                          //       foreach ($terms as $term) {
                          //         echo '<li>';
                          //         $url_0 = get_term_link($term->term_id, to_permalink($value->title).'_categories');
                          //         echo '<a href="'; 
                          //         print_r($url_0);
                          //         echo '" title="'.$term->name.'">- '.$term->name.'</a>';

                          //           $children = get_terms( array( 
                          //               'taxonomy' => to_permalink($value->title).'_categories',
                          //               'hide_empty' => 0,
                          //               'parent'   => $term->term_id
                          //           ) ); 
                          //           if($children){
                          //             echo '<ul>';
                          //             foreach ($children as $child) {
                          //               $url = get_term_link($child->term_id, to_permalink($value->title).'_categories');
                          //               echo '<li><a href="';
                          //               print_r($url);
                          //               echo '" title="'.$child->name.'">- '.$child->name.'</a></li>';
                          //             }
                          //             echo '</ul>';
                          //           }

                          //         echo '</li>';
                          //       }
                          //     echo '</ul>';
                          //   }
                          // }
                          // echo '</li>';
                    }
                  ?>       
                <li>
                  <button onclick="mobileNavigation(this)" class="hamburger hamburger--collapse" type="button">
                    <span class="hamburger-box">
                      <span class="hamburger-inner"></span>
                    </span>
                  </button> 
                </li>        
              </ul>
            </nav>
          </div>
        </div>
      </header>
      <main>