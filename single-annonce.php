<?php 
/* Template Name: PageAnnoncespec */
get_header(); ?>
<?php 
$current_user = get_currentuserinfo();
$idcurrent = $current_user->ID;
global $post;
$a_id=$post->post_author;
$idauthor = get_the_author_meta( 'ID', $a_id );
$modif = '<button class="modif vert"><img style ="width:34px;height:34px" src="'.get_template_directory_uri().'/assets/img/picto_crayon_inact.svg"></button>';
if($idauthor===$idcurrent):?>

<div class="container" style="display:flex; flex-direction:column;height:fit-content">

<div>
    <h1 style="font-family: 'Josefin Sans';
font-style: normal;
font-weight: 700;
font-size: 32px;
line-height: 32px;">Configure ton annonces avant de la poster !</h1>
    <p style="font-family: 'Josefin Sans';
font-style: normal;
font-weight: 300;
font-size: 20px;
line-height: 20px;">Complete le plus possible ton annonces pour aider la recherche des autres utilisateurs</p>
</div>

<div class="configannonc" style="display:flex">
    <section style="width:460px;margin:10px">
        <div>
                <?php $image = get_field('image_dillustration');
                if($image != ''){
                        echo '<img class="imgillu" style="width:460px; height:330px" src="'.$image['url'].'" alt="'.get_the_title().'">';  
                }
                else {
                        echo '<img class="imgillu" style="width:460px; height: 330px" src="'.get_template_directory_uri().'/assets/img/picto_noimage_inact.svg" alt="Très joli pictogramme signifiant que tu'."'".'as pas encore posté d'."'".'image">';
                }
        ?>
        </div>
        <div style="display:flex">
                <p class="description" ><?php $description = get_field('description');
                if($description!=''){
                        echo $description;
                }
                else{
                        echo 'Complète la description de ton annonce';
                }
                ?></p>
        <?php echo $modif?></div>
        
    </section>

    <section style="margin:10px; height:300px; display:flex; flex-direction:column; justify-content:space-between">

    <div class ="filtre-check-box" style="flex-direction:row">
            <div class="check" style="margin-right:60px">  
            <input class="checkbox-effect" id="checkoutils" type="checkbox" name="checkoutils" checked>
                <label for="checkoutils">Outils</label>
            </div>
            <div class="check">
                <input class="checkbox-effect" id="checkservices" type="checkbox" name="checkservices" checked>
                <label for="checkservices">Services</label>
            </div>
        </div>

        <h5 style="font-family:'Poppins';text-transform: uppercase;font-weight:600;font-size:24px"><?php 
        $title = get_the_title();
        if($title!=''){
                the_title(); 
        }
        else {
                echo 'Titre';
        }
        echo $modif?></h5>
        
        <h5 style="font-family:'Poppins';text-transform: uppercase;font-weight:600;font-size:24px"><?php 
        $prix = get_field('prix');
        if($prix!=''){
                echo $prix.'€/jour'; 
        }
        else {
                echo 'Prix €/jour';
        }
        echo $modif?></h5>
        <h5><?php if(get_field('localite')==''){
                echo 'Localité';}
                else{
                echo get_field('localite');} echo $modif?></h5> 

    </section>
</div>

<button style="font-family: 'Poppins';
align-self:flex-end;
font-style: normal;
font-weight: 700;
font-size: 20px;
line-height: 30px;
color: #504136;
text-align: center;" class="vert">Sauver / Poster</button>

</div>
<?php
else:
?>
    <div class="container">
        <div class="infoannonce">
        <?php $image = get_field('image_dillustration');
        echo '<img style="width:700px; height:500px" src="'.$image['url'].'" alt="'.get_the_title().'">'; ?>
        <div class="infodroite">
                <h5 style="font-family:'Poppins';text-transform: uppercase;font-weight:600;font-size:24px"><?php the_title() ?></h5>
                <?php 
                
                $auteur = get_the_author_meta( 'user_nicename', $a_id );
                echo '<div class="vert versprofil">';
        echo get_avatar($auteur);?>
        <h5>
                <?php if($auteur===''){
                        echo 'Anonyme';
                }
                else{
                        echo $auteur;
                }?>
        </h5>
        <?php
        echo '</div>'; ?>
        <h5><?php echo get_field('prix') ?>€/j</h5>
        <h5><?php if(get_field('localite')==''){
                echo 'Trou perdu';}
                else{
                echo get_field('localite');} ?></h5>
        <p class="description"><?php echo get_field('description'); ?> </p>
                <button style="border:none">                
        <?php echo '<div style="width:fit-content" class="vert versprofil">';?>   
        <h5 class="bouton">Contacter</h5><!-- à ranger en théorie actionner ce bouton devrait ouvrir une conversation dans la messagerie de l'utilisateur-->
        </button>
        </div>

        </div>     
</div>
<div class="carrousel" style="margin-bottom:100px; margin-top:200px">
<h3 style="margin-left:50px">Annonces qui pourraient aussi vous intéresser</h3>
        <?php carroussel_couleur('annonce','10') ?>
        </div>
<?php endif; ?>
<?php get_footer(); ?>
