<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
<?php if(get_field('webdoor')) : ?>
<section class="webdoor">
  <div class="owl-carousel owl-theme">
  	<?php 
  		foreach (get_field('webdoor') as $key => $value) {
  			?>
			    <div class="item">
			      <div class="item-inner" style="background-image:url(<?php echo $value['imagem']; ?>)">
			        <div>
			          <h2 class="title">
			              <?php echo $value['titulo']; ?>
			              <?php 
			                if($value['texto']){
			                    echo "<small>".$value['texto']."</small>";
			                }
			              ?>
			          </h2>
			       	  <?php if($value['url']) : ?>
			          	<a href="<?php echo $value['url']; ?>" class="btn btn-1">Saiba +</a>
			          <?php endif; ?>
			        </div>
			      </div>
			    </div> 
  			<?php
  		}
  	?>
  </div>
</section>
<?php endif; ?>
<?php if(get_field('destaques')) : ?>
<section class="destaques">
  <div class="container">
    <h2 class="title"><span>INTEGRATED - MANAGEMENT - CONCEPT</span></h2>
    <ul>
      <?php 
        foreach (get_field('destaques') as $key => $value) {
          ?>
          <li>
            <div>
              <div class="info">
                <h3 class="title"><?php echo $value['titulo']; ?></h3>
                <?php if($value['url']) : ?>
                  <a href="<?php echo $value['url']; ?>" class="btn btn-1">Saiba +</a>
                <?php endif; ?>
              </div>
              <div class="zoom" style="background-image:url(<?php echo $value['imagem']; ?>)"></div>
              <div class="zoom bg" style="background-image:url(<?php echo $value['imagem']; ?>)"></div>
            </div>
          </li>
          <?php
        }
      ?>
    </ul>
  </div>
</section>
<?php endif; ?>
<?php 
  $page = get_page_by_path( 'servicos' );
  if($page) :
?>
<section class="servicos">
  <div class="container">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/servicos.png" alt="<?php echo get_the_title( $page ); ?>">
    <div>
      <h2 class="title"><span><?php echo get_the_title( $page ); ?></span></h2>
      <p>
        <?php echo get_the_excerpt( $page ); ?>
      </p>
      <a href="<?php echo get_the_permalink( $page ); ?>" class="btn btn-1">Saiba  +</a>
    </div>
  </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>