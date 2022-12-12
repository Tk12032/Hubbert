<footer>
    <div>
        <span class="border-bot">
            <h5>SUIVEZ NOUS</h5>
        <!--ligne-->
        
            <a>HubbertBook</a>
            <a>HubbertGram</a>
            <a>HubbertTok</a>
            <a>S'abonner à la newsletter</a>
        </span>
        <!--ligne-->
        <img class="logo-footer" src="<?php echo get_template_directory_uri(); ?>/assets/img/hubbert_noir.png" alt="logo_Hubbert">
    </div>
    <div class="text-center">
        <span>
            <h5>CONTACTEZ NOUS</h5>
            <!--ligne-->
            <p>hubbert.support@gmail.com</p>
        </span>
        
        <span>
            <h5>MENTIONS LEGALES</h5>
        <!--ligne-->
            <a>Conditions générales d'utilisation</a>
            <a>Conditions générales de ventes</a>
        </span>
        <span>
            <h5>BESOINS D'AIDES ?</h5>
            <!--ligne-->
            <a>FAQ</a>
        </span>
        
    </div>
    <div>
        <span>
            <h5>A PROPOS DE NOUS</h5>
            <!--ligne-->
            <p class="text-justify">Hubbert est une initiative étudiante qui a la volonté de diminuer l’emprunte carbone de chacun. C’est pourquoi nous vous proposons une plateforme qui vous permet de louer des outils de jardinage et rendre des services aux personnes qui en ont besoin dans leur jardin. </p>
        </span>
        
    </div>


</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php get_template_directory_uri(); ?>/assets/js/script.js"></script>
<script>
      // Use the '.pictobouton' selector to select all buttons with the 'pictobouton' class
      $('.pictobouton').hover(function() {
        // When the mouse enters any of the buttons, use the 'this' keyword to
        // select the button that was entered, and then use the 'find' method
        // to select the image inside the button
        $(this).find('img').attr('src', function(i, oldSrc) {
          return oldSrc.replace('inact', 'actif');
        });
      }, function() {
        // When the mouse leaves any of the buttons, use the 'this' keyword to
        // select the button that was left, and then use the 'find' method
        // to select the image inside the button
        $(this).find('img').attr('src', function(i, oldSrc) {
          return oldSrc.replace('actif', 'inact');
        });
      });


    </script>
</body>
</html>

