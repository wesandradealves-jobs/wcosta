<?php get_header(); ?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
	<?php get_template_part('template_parts/banner'); ?>	
    <section>
      <div class="container">
      	<?php 
      		switch ($post->post_name) {
      			case 'clientes':
      			case 'parceiros':
      				the_content();
      				if(get_field('galeria')){
      					?>
							<ul class="galeria">
      					<?php
      					foreach (get_field('galeria') as $key => $value) {
      						?>
								<li><a title="<?php echo $value['titulo']; ?>" href="<?php echo $value['url']; ?>"><img src="<?php echo $value['imagem']; ?>" alt="<?php echo $value['titulo']; ?>"></a></li>
      						<?php
      					}
      					?>
							<ul>
							<style>
								.galeria{
									background-color: #fafafa;
									align-items: center;
									display: flex;
									flex-flow: row wrap;
									justify-content: space-between;
									margin: 35px -15px;
								}
								.galeria li{
									flex: 0 0 auto;
									width: 16.3333%;
								}
								.galeria img{
									display: block;
									margin: 0 auto;
									max-width: 100%;
									opacity: .3;
								}
								.galeria img:hover{
									opacity: 1;
								}
								.webdoor + section .container{
									max-width: 100%;
								}
								.webdoor + section .container > *:not(.galeria){
									max-width: 990px;
									margin: 0 auto;
								}
							</style>
      					<?php 
      				}
      			break;
      			default:
      				the_content();
      				break;
      		}
      	?>
      </div>
    </section>
	<?php endwhile;
	endif; ?>
<?php get_footer(); ?>