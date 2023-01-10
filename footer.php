<footer class="footer">
    <div>
        <div class="border-bot">

        
            <h5>SUIVEZ NOUS</h5>
        <!--ligne-->
        
            <a>HubbertBook</a>
            <a>HubbertGram</a>
            <a>HubbertTok</a>
            <a>S'abonner à la newsletter</a>
        </div>
        <!--ligne-->
        <img class="logo-footer" alt="logohubbert" src="<?php echo get_template_directory_uri(); ?>/assets/img/hubbert beige.png" alt="logo_Hubbert">
    </div>
    <div class="text-center">

            <h5>CONTACTEZ NOUS</h5>
            <!--ligne-->
            <p>hubbert.support@gmail.com</p>

        

            <h5>MENTIONS LEGALES</h5>
        <!--ligne-->
            <a>Conditions générales d'utilisation</a>
            <a>Conditions générales de ventes</a>
  

            <h5>BESOINS D'AIDES ?</h5>
            <!--ligne-->
            <p>
            <?php 
            wp_nav_menu([
            'theme_location' => 'footer',
            'container' => false,
            'menu_class' => 'navbar-nav me-auto'
            ]); ?>

            </p>

        
        


    </div>
    <div>

          <h5>A PROPOS DE NOUS</h5>
            <!--ligne-->
            <p class="text-justify">Hubbert est une initiative étudiante qui a la volonté de diminuer l’emprunte carbone de chacun. C’est pourquoi nous vous proposons une plateforme qui vous permet de louer des outils de jardinage et rendre des services aux personnes qui en ont besoin dans leur jardin. </p>
            
            <!--ligne-->
            <img class="logo-footer2" alt="logohubbert" src="<?php echo get_template_directory_uri(); ?>/assets/img/hubbert beige.png" alt="logo_Hubbert">
    </div>


</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script>
<?php wp_footer(); ?>


