          <ul class="contato">
            <?php if ( get_theme_mod('endereco') ) : ?>
            <li>
              <i class="fal fa-map-marker-alt"></i>
              <span><?php echo get_theme_mod('endereco'); ?></span>
            </li>
            <?php endif; ?> 
            <?php if ( get_theme_mod('telefone') ) : ?>
            <li>
              <i class="fal fa-phone"></i>
              <span>Telefone: <?php echo get_theme_mod('telefone'); ?></span>
            </li>
            <?php endif; ?> 
            <?php if ( get_theme_mod('email') ) : ?>
            <li>
              <i class="fal fa-envelope"></i>
              <span><a href="mailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a></span>
            </li>
            <?php endif; ?> 
          </ul>