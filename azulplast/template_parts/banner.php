<section class="webdoor" style="background-image:url(
  <?php 
    if(!is_single()){
      if(get_queried_object()){
        if(get_field('thumbnail', get_queried_object())){
          echo get_field('thumbnail', get_queried_object());
        } else {
          echo wp_get_attachment_url(get_post_thumbnail_id(get_page_by_path( 'noticias' )), 'full');  
        }
      } else {
        echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); 
      }  
    } else {
      if(wp_get_attachment_url(get_post_thumbnail_id(get_the_id()), 'full')){
        echo wp_get_attachment_url(get_post_thumbnail_id(get_the_id()), 'full');
      } elseif(get_field('thumbnail', wp_get_object_terms( get_the_id(), get_post_type().'_categories' )[0])) {
        echo get_field('thumbnail', wp_get_object_terms( get_the_id(), get_post_type().'_categories' )[0]);
      }
    }
  ?>
  )">
  <div class="container">

    <h2 class="title">
          <?php
            if(get_queried_object()->name){
              echo get_queried_object()->name;
            } else {
              echo get_the_title();
            }
          ?>
    </h2>

    <ul class="breadcrumbs">

      <li>

        <a href="<?php echo site_url(); ?>">Home</a>

      </li>

      <?php 

        if(is_archive() || is_category()){

          if(get_queried_object()->taxonomy == 'category'){

            echo '<li><a href="'.site_url('noticias').'">Notícias</a></li>';

          } else {

            echo '<li><a href="'.site_url('servicos').'">Serviços</a></li>';

          }

        } else if(get_post_type() == 'post'){

          echo '<li><a href="'.site_url('noticias').'">Notícias</a></li>';

          echo '<li><a href="'.get_term_link(get_the_category()[0]->slug, 'category').'" title="'.get_the_category()[0]->name.'">'.get_the_category()[0]->name.'</a></li>';

        }

      ?>

      <?php if(is_single()) : ?>
        <?php 
          foreach (wp_get_object_terms( get_the_id(), get_post_type().'_categories' ) as $cat) {
            echo '<li><a href="'.get_term_link( $cat->term_id, get_post_type().'_categories' ).'" title="'.$cat->name.'">'.$cat->name.'</a></li>';
          }
        ?>
      <?php endif; ?>
      <li>

        <a href="javascript:void(0)">

          <?php 
            if(is_archive() || is_category()){
              echo get_queried_object()->name;
            } else {
              echo get_the_title();
            }
          ?>

        </a>

      </li>

    </ul>

  </div>

</section>