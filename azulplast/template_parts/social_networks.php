<?php if ( get_theme_mod('facebook') || get_theme_mod('twitter') || get_theme_mod('rss')) : ?>
		<ul class="social-networks">
			<?php if ( get_theme_mod('instagram') ) : ?>
			<li>
					<a href="<?php echo get_theme_mod('instagram');  ?>" title="Instagram" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/ign.png" alt="Instagram"></a>
			</li>
			<?php endif; ?>
			<?php if ( get_theme_mod('facebook') ) : ?>
			<li>
					<a href="<?php echo get_theme_mod('facebook');  ?>" title="Facebook" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/fb.png" alt="Facebook"></a>
			</li>
			<?php endif; ?>
		</ul>
 <?php endif; ?>	