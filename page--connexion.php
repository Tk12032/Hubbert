<?php 
/* Template Name: PageConnexion */
get_header(); ?>

<div class="configconnexion connect container">
    <section class="inscript">
    <h1 class='texte-connect h1'> Connecte toi à Hubbert </h1>
    <p class='texte-connect p'> C'est parti pour l'aventure Hubbert !</p>
    <form>

    <label for="nom"> Nom <input type=textarea id="name" name="nom"></label>
    <label  for="prenom"> Prénom <input type=textarea id="prenom" name="prenom"></label>

    <label  for="mail"> Mail<input type=textarea id="mail" name="mail"></label>

    <label  for="mdp1"> Mot de passe <input type=password id="mdp1" name="mdp1"></label>

    <label  for="mdp2"> Confirmer le mot de passe <input type=password id="mdp2" name="mdp2"></label>

    </form>

    <button class="orange bouton" onclick="newuser()"> Je m'inscris</button>

</section>

<section class="configlogin">
    
    <p class='texte-connect'>Si tu as déja un compte tu peux simplement :</p>
    <form>

    <label  for="mail"> Mail<input type=textarea id="mail2" name="mail"></label>

    <label  for="mdp1"> Mot de passe <input type=password id="mdp12" name="mdp1"></label>
    
    </form>

    <button class="orange bouton" onclick="login()"> Je me connecte</button>


</section>


</div>

<?php get_footer(); ?>
