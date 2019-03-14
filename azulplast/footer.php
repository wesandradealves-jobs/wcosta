    <footer>
      <div class="footer" <?php if(get_theme_mod('footer_bg')) : ?> style="background-image: url(<?php echo get_theme_mod('footer_bg'); ?>)" <?php endif; ?>>
        <div class="container">
          <h2 class="title">
            Consultores Online
            <small>Dúvidas relacionadas aos serviços?</small>
          </h2>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/imgs/consultores.png" alt="Dúvidas relacionadas aos serviços?">
        </div>
      </div>
      <div class="contato">
        <div class="container">
          <p>
            <strong>LOCALIZAÇÃO</strong><br/>
            <?php echo get_theme_mod('endereco'); ?>
            <?php echo get_theme_mod('telefone').' - '; ?><a href="mailto: <?php echo get_theme_mod('email'); ?>"> <?php echo get_theme_mod('email'); ?></a>
          </p>
          <form style="width:100%" action="<?php echo site_url('/phpmailer/send.php'); ?>" method="POST">
            <div>
              <span>
                <input placeholder="Nome" required="required" name="nome" type="text">
              </span>
              <span>
                <input placeholder="E-mail" required="required" name="email" type="email">
              </span>
              <span>
                <input placeholder="Assunto" type="text" name="assunto">
              </span>
            </div>
            <div>
              <span>
                <textarea placeholder="Mensagem" required="required" name="mensagem"></textarea>
              </span>
            </div>
            <div>
              <button class="btn btn-1">Entrar em contato</button>
            </div>
          </form>
        </div>
      </div>
      <div class="copyright">
        <div class="container">
          <p><?php echo "&#x24B8; Copyright ".date('Y')." - ".get_bloginfo('name')." - Todos os direitos reservados."; ?>
          <p>
            <a href="http://www.system-dreams.com.br" target="_blank" title="System Dreams - Criação e Otimização de Sites">Developed by SD</a>
            <a href="javascript:void(0)" title="W3C | HTML5">W3C | HTML5</a>
          </p>
          <?php get_template_part( 'template_parts/social_networks' ); ?>
        </div>
      </div>
    </footer>
    <?php if ( get_theme_mod('maps') ) : ?>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC5QMfSnVnSCcmkFag0ygrXzj2QJ9usEG4'></script>
    <noscript>Seu Navegador pode não aceitar javascript.</noscript> 
    <script>
      var mapProp = {
          zoom: 18,
          center: new google.maps.LatLng(<?php echo get_theme_mod('maps'); ?>), 
          disableDefaultUI: true,
          mapTypeId: google.maps.MapTypeId.TERRAIN
      };  

      var pos = {lat: <?php echo explode(",", get_theme_mod('maps'))[0]; ?>, lng: <?php echo explode(",", get_theme_mod('maps'))[1]; ?>};

      var map = new google.maps.Map(document.querySelector(".map"),mapProp);
      
      var marker = new google.maps.Marker({position: pos, map: map, title: "<?php echo get_bloginfo('title'); ?>"});

      <?php if($post->post_name == 'contato') : ?>
      var map2 = new google.maps.Map(document.querySelector(".map_2"),mapProp);
      var marker2 = new google.maps.Marker({position: pos, map: map2, title: "<?php echo get_bloginfo('title'); ?>"});
      <?php endif; ?>

      google.maps.event.addDomListener(window, "load", init_map);
    </script>
    <noscript>Seu Navegador pode não aceitar javascript.</noscript> 
    <?php endif; ?>  
    <?php wp_footer(); ?>
    <style>
        footer .contato .container::after{
          background: url(http://system-dreams.com.br/wcosta/wp-content/uploads/2019/03/19aa.png) center center / contain no-repeat;
          display: block;
          position: absolute;
          right: -160px;
          top: calc(50% - 60px/2);
          content: '';
          height: 120px;
          width: 120px;
        }
    </style>
  </body>
</html>