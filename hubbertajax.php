<?php 

require_once '../../../wp-load.php';//rajoute l'environnement wordpress (sinon les fonctions wp ne fonctionne pas)



function create_post(){
//sortir le contenu de la requete
	$title = $_POST["title"];//
	$content = $_POST["descrip"];//
	$localite = $_POST['lieu'];//
	
	if($_POST['imgid']!=0){
		$imgid = $_POST['imgid'];
	}
	
	if($_POST['outil']=='true'){//
		$type='outil';
	}else{
		$type='service';
	}
	$prix = $_POST['prix'];//
	$postype = $_POST['postType']; // sert à savoir si le post est à modifier ou non (si posttype = annonce, il est modifier, si posttype='page' c'est que l'user est sur la page création d'annonce et donc on doit créer un nouveau post)
	$jstart = $_POST['jourstart'];
	$jend = $_POST['jourend'];
	$hstart = $_POST['heurestart'];//
	$hend = $_POST['heureend'];//
	$currentuser = $_POST['userid'];//

	$ID = $_POST['postID']; // sert à savoir l'id du post si c'est un post qui est mis à jour

	//creation post 
if($postype == 'page'){// dans les deux cas le code appliquer est presque le memme juste l'ID change, car soit il est update soit il est nouveaiu
	$post_id = wp_insert_post(
		array(
			'ID' => 0,
			'post_author' => $currentuser,
			'post_title' => $title,
			'post_status' => 'publish',
			'post_type' => 'annonce'
		)
	);  
}
	else { // si le post est mis à jour
		$post_id = wp_insert_post(
			array(
				'ID' => $ID,
				'post_author' => $currentuser,
				'post_title' => $title,
				'post_status' => 'publish',
				'post_type' => 'annonce'
			)
		);
	}


	if ( $post_id != 0 ) {//on change les fields acf du post
		update_field('type_dannonce',$type, $post_id );
		update_field('heure_de_debut',$hstart, $post_id );
		update_field('heure-de-fin', $hend, $post_id );
		update_field('prix', $prix, $post_id );
		update_field('localite', $localite, $post_id );
		update_field('description', $content, $post_id );
		update_field('jourstart', $jstart, $post_id );
		update_field('jend', $jend, $post_id );
	  }
	if ($_POST['imgid']!=0){
		update_field('image_dillustration', $imgid, $post_id );
	}
	echo get_permalink($post_id);
	die();
}
add_action('wp_ajax_postannonc', 'create_post');

function filter(){
	
	if($_GET['outil']=='true'){
		$outil='outil';
	}else{$outil='';}
	if($_GET['service']=='true'){
		$service='service';
	}else{$service='';}
	$annoncefiltrées = new WP_Query([
		
		
		'post_type' => 'annonce', 
		'post_status' => 'publish', 
		'limit' => 10,
		'orderby' => 'date',
		'date' => true,
		'meta_query'    => array(
			'relation'      => 'AND',
			array(
				'key'       => 'prix',
				'value'     => $_GET['prixmax'],
				'type'      => 'NUMERIC',
				'compare'   => '<'
			),
			array(
					'key'       => 'type_dannonce',
					'value'     =>	array($outil, $service),
					'compare'   => 'IN'
			),
		),
	  ]); 

	if($annoncefiltrées->have_posts()){
		$i=0;
		$tableaureponse;
		while($annoncefiltrées->have_posts()){
			$annoncefiltrées->the_post();


			$image = get_field('image_dillustration');
			$a_id=$post->post_author;
			$auteur = get_the_author_meta( 'user_nicename', $a_id );
			if($auteur===''){
				$authorname = 'Anonyme';
				}
				else{
					$authorname = $auteur;
			}

			$tableaureponse[$i] = array(
				"type" => get_field('type_dannonce'),
				"urlimage" => $image['url'],
				"title" => get_the_title(),
				"content" => get_field('description'),
				"urlavatar" => get_avatar_url($auteur),
				"authorname" => $authorname,
				"prix" => get_field('prix'),
				"lienarticle" => get_the_permalink(),
			  );
			  $i++;
			}
			
			$json = json_encode($tableaureponse);

			echo $json;

	}
	else echo 'none';
	
	
	
	die();
}

add_action('wp_ajax_filter','filter');


do_action('wp_ajax_'.$_POST['action']);
do_action('wp_ajax_'.$_GET['action']);
?>