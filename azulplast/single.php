<?php get_header(); ?>
<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
<?php get_template_part('template_parts/banner'); ?>
<section>
	<div class="container">
		<?php 
		    the_content();
            if(get_field('galeria', get_the_id())){
            echo '<ul class="grid produto-grid">';
      		foreach (get_field('galeria_single', get_the_id()) as $key => $value) {
      			?>
                  <li>
                    <a href="<?php echo $value['imagem']; ?>" data-title="<?php echo $value['titulo']; ?>" data-lightbox="produtos" style="background-image:url(<?php echo $value['imagem']; ?>)">
                      <span class="caption"><?php echo $value['titulo']; ?></span>
                    </a>
                  </li>
      			<?php
      		    }
                echo '</ul>';
          }
		?>
	</div>
</section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>