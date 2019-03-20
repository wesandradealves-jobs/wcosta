<?php get_header(); ?>
	<?php get_template_part('template_parts/banner'); ?>
    <section>
      <div class="container">
      	<?php 

        $ptype = explode('_', get_queried_object()->taxonomy)[0];

        print_r(get_queried_object());

      	if(get_queried_object() && $ptype == 'produtos' || $ptype == 'segmentos'){
      		if(get_queried_object()->parent){
				$args = array( 
					'post_type' => $ptype, 
					'posts_per_page' => -1,
	                'tax_query' => array(
	                    array(
	                        'taxonomy' => get_queried_object()->taxonomy,
	                        'terms' => get_queried_object()->slug,
	                        'field' => 'slug',
	                        'include_children' => true,
	                        'operator' => 'IN'
	                    )
	                )					
				);
				$loop = new WP_Query( $args );
				echo '<ul class="grid produto-grid">';
				while ( $loop->have_posts() ) : 
					$loop->the_post();
					echo '
		              <li>
		                <a href="'.get_permalink().'" style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full').')">
		                  <span class="caption">'.get_the_title().'</span>
		                </a>
		              </li>
					';
				endwhile;
				echo '</ul>';
      		} else {
	            $terms = get_terms( array( 
	                'taxonomy' => $ptype.'_categories',
	                'hide_empty' => 0,
	                'parent'   => get_queried_object()->term_id
	            ) ); 
	            if($terms){
	              echo '<ul class="grid produto-grid">';
	                foreach ($terms as $term) {
						echo '
			              <li>
			                <a href="'; 
	                  		print_r(get_term_link($term->term_id, $ptype.'_categories'));
			                echo '"'; 
			                echo 'style="background-image:url('.get_field('thumbnail', $term ).')">
			                  <span class="caption">'.$term->name.'</span>
			                </a>
			              </li>
						';
	                }
	              echo '</ul>';
	            } 
      		} 
      	} else {
            $loop = new WP_Query( array(
                'post_type'              => array( 'post' ),
                'posts_per_page' => -1,  
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'terms' => get_queried_object()->slug,
                        'field' => 'slug',
                        'include_children' => true,
                        'operator' => 'IN'
                    )
                ),
            ) );  
			echo '<ul class="blog">';
			while ( $loop->have_posts() ) : $loop->the_post();
				echo '
	              <li>
	                <div style="background-image:url('.wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full').')"></div>
	                <div>
	                  <h2 class="title">';
	                  	if(get_the_category( $post->ID )) :
		                    echo '
		                    <a href="'.get_term_link(get_the_category( $post->ID )[0]->term_id, 'category').'" >
								<strong class="category btn btn-1">
									'.get_the_category( $post->ID )[0]->name.'
								</strong>
		                    </a>';
		                endif;
	                    echo '
	                    <span>'.get_the_title().'</span>
	                    <small>
	                      By <b>'.get_the_author().'</b> | '.get_the_date().'
	                    </small>
	                  </h2>
	                  <p>
	                    <a href="'.get_the_permalink().'">'.substr(get_the_content(), 0, 300).'...</a>
	                  </p>
	                </div>
	              </li>
				';
			endwhile;      			
	        echo '</ul>';
      	}
      	?>
      </div>
    </section>
<?php get_footer(); ?>