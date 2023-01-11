<?php 
/* Template Name: PageAnnoncespec */
get_header(); ?>
<?php 
$current_user = get_currentuserinfo();
$idcurrent = $current_user->ID;
global $post;
$a_id=$post->post_author;
$idauthor = get_the_author_meta( 'ID', $a_id );
$type = get_post_type();
echo '<p style="display:none" id="posttype">'. get_post_type() . '</p>';
$postid = get_the_ID();
echo '<p style="display:none" id="postid">'. $postid . '</p>';
echo '<p style="display:none" id="currentuserid">'. $idcurrent . '</p>';
echo '<p style="display:none" id="author">'. $idauthor . '</p>';

if(($idauthor===$idcurrent)||($type=='page'))://si l'user actuel est l'auteur OU qu'on arrive sur la page via le bouton proposer un service / outil?>

<div class="container configannonce" style="display:flex; flex-direction:column;height:fit-content; width:63%">

<div>
    <h1>Configure ton annonces avant de la poster !</h1>
    <p>Complete le plus possible ton annonces pour aider la recherche des autres utilisateurs</p>
</div>

<div class= "configannonceform">
    <section style="width:460px;margin-right:5%;">
        <div>
                
                <?php $image = get_field('image_dillustration');
                if($image != ''){
                        echo '<img class="imgillu" style="width:460px; height:330px" src="'.$image['url'].'" alt="'.get_the_title().'">';  
                }
                else {
                        echo '<div style="width:460px; height: 330px; display:flex; align-items:center; justify-content:center"><img style="width:150px; height: 130px" src="'.get_template_directory_uri().'/assets/img/picto_noimage_inact.svg" alt="Très joli pictogramme signifiant que tu'."'".'as pas encore posté d'."'".'image"></div>';
                }
        ?>
                <form id="image-form" style="display:flex; align-items:flex-end" enctype="multipart/form-data">
                <input type="file" name="image" id="image-input">
                <button  class="vert imgupload" type="submit" id="submit-button">Envoyer</button>
                </form>


        </div>
        <div style="display:flex">
                <p class="description" ><textarea id="description"><?php $description = get_field('description');
                if($description!=''){
                        echo $description;
                }
                else{
                        echo 'Complète la description de ton annonce';
                }
                ?></textarea></div>
        
    </section>

    <section class = "annonceform">
        <div class = "configpart1">
                <div class ="filtre-check-box" style="flex-direction:row">
                        <div class="check">  
                                <input class="checkbox-effect" id="checkoutils" type="checkbox" name="checkoutils" onchange="checkedboxoutil()" <?php $outil = get_field('type_dannonce'); if(($outil=='outil')||($type=='page')){echo 'checked';}?>>
                                <label for="checkoutils">Outils</label>
                        </div>
                        <div class="check">
                                <input class="checkbox-effect" id="checkservices" type="checkbox" name="checkservices" onchange="checkedboxservice()" <?php $service = get_field('type_dannonce'); if($service=='service'){echo 'checked';} ?>>
                                <label for="checkservices">Services</label>
                        </div>
                </div>

                <h5 style="font-family:'Poppins';text-transform: uppercase;font-weight:600;font-size:24px"><textarea id="titre"><?php 
                $title = get_the_title();
                if($type!=='page'){
                        the_title(); 
                }
                else {
                        echo 'Titre';
                }
                ?></textarea></h5>
                
                <h5 style="font-family:'Poppins';text-transform: uppercase;font-weight:600;font-size:24px">
                <input id="prix" style="width:65px; background-color:transparent; border-radius:5px;" type="number" id="tentacles" name="prix" min="1" max="100" value="<?php 
                $prix = get_field('prix');
                if($prix!=''){
                        echo $prix; 
                }
                else {
                        echo 10;
                }
                ?>">€/jour</h5>
                <h5><textarea id="localite"><?php if(get_field('localite')==''){
                        echo get_field('localite');
                        echo 'Localité';}
                        else{
                        echo get_field('localite');}?></textarea></h5> 
        </div>

        <div class="range_container" style="width:170px">
            <div><label>Jours</label></div>
                <div class="sliders_control">
                    <input id="fromSlider" type="range" value="<?php echo get_field('jourstart') ?>" min="0" max="6" oninput="doublslider()">
                    
                    <input id="toSlider" type="range" value="<?php echo get_field('jend') ?>" min="0" max="6" oninput="doublslider()">   
                </div>
            <div style="display:flex;justify-content:space-between;margin-top:10px"><output id="startday">Lundi</output><output id="endday">Dimanche</output></div>
        </div>


        <div class="range_container" style="width:170px">
            <div><label>Heures</label></div>
                <div class="sliders_control">
                    <input id="fromSlider2" type="range" value="<?php echo get_field('heure_de_debut') ?>" min="7" max="20" oninput="doublslider2()">
                    
                    <input id="toSlider2" type="range" value="<?php echo get_field('heure-de-fin') ?>" min="7" max="20" oninput="doublslider2()">   
                </div>
            <div style="display:flex;justify-content:space-between;margin-top:10px"><output id="starthour">7h</output><output id="endhour">20h</output></div>
        </div>


        <button class="vert bouton" style="align-self:flex-end" onclick="postMajAnnonc()">Sauver / Poster</button>
    </section>
</div>

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
        <?php carroussel_annonce() ?>
        </div>
<?php endif; ?>
<?php get_footer(); ?>
