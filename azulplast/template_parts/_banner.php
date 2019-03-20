<section class="webdoor" style="background-image:url(
  <?php 
    echo wp_get_attachment_url(get_post_thumbnail_id( ((get_queried_object()->taxonomy == 'servicos_categories') ? get_page_by_path( 'servicos' ) : $post->ID) ), 'full'); 
  ?>
  )">
  <div class="container">
    <h2 class="title">
          <?php 
            if(get_queried_object()->taxonomy != 'servicos_categories'){
              echo get_the_title();
            } else {
              print_r(get_queried_object()->name);
            }
          ?>
    </h2>
    <ul class="breadcrumbs">
      <li>
        <a href="<?php echo site_url(); ?>">Home</a>
      </li>
      <?php 
        if(is_archive() || is_category()){
          if(get_queried_object()->taxonomy == 'servicos_categories'){
            echo '<li><a href="'.site_url('noticias').'">Notícias</a></li>';
          } else {
            echo '<li><a href="'.site_url('produtos').'">Produtos</a></li>';
          }
        } else if(get_post_type() == 'post'){
          echo '<li><a href="'.site_url('noticias').'">Notícias</a></li>';
          echo '<li><a href="'.get_term_link(get_the_category()[0]->slug, 'servicos_categories').'" title="'.get_the_category()[0]->name.'">'.get_the_category()[0]->name.'</a></li>';
        }
      ?>
      <li>
        <a href="javascript:void(0)">
          <?php 
            if(get_queried_object()->taxonomy != 'servicos_categories'){
              echo get_the_title();
            } else {
              print_r(get_queried_object()->name);
            }
          ?>
        </a>
      </li>
    </ul>
  </div>
</section>