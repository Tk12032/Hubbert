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
add_action('wp_ajax_newuser','createuser');

function createuser(){
	$nom = $_POST["name"];//
	$prenom = $_POST["prenom"];//
	$mail = $_POST['mail'];//
	$mdp = $_POST['mdp'];//
	$userid = $_POST['ID'];//
	$idpost = $_POST['IDpost'];
	$description = $_POST['description'];
	$localite=$_POST['localite'];
	$imgid = $_POST['imgid'];
	$age = $_POST['age'];


 $arguser = array(
	'ID'=> $userid,
	'user_login' => $mail,
	'display_name' => $nom.' '.$prenom,
	'user_pass' =>$mdp,
	'user_email' => $mail,
 );
 $newuserid = wp_insert_user($arguser);//on ajoute un user coté wordpress. Mnt pour le display d'une page de profil on va combiné un user et un posttype

 $argposttype = array(
	'ID'=> $idpost,
	'post_content'=> $description,
	'post_author' =>$newuserid,
	'post_title' => $nom.' '.$prenom,
	'post_type' => 'profil',
	'post_status' => 'publish',

 );
$post_id = wp_insert_post($argposttype);


	update_field('IDUSER',$newuserid, $post_id );// on garde l'id de l'user dans le post pour pouvoir appelé certain contenu de l'user avec le post. 
	
	if ($_POST['localite']!=''){
		update_field('localite', $localite, $post_id );
	}
	if ($_POST['age']>17){
		update_field('age', $age, $post_id );
	}
	
	update_field('localite',$localite, $post_id );
	if ($_POST['imgid']!=0){
		update_field('profilepicture', $imgid, $post_id );
	}
	wp_logout();
	
	wp_signon(array(
		'user_login' => $mail,
		'user_password' => $mdp,

	));
		echo get_permalink($post_id);	
  
}
function majuser(){
	$nom = $_POST["name"];
	$age = $_POST['age'];
	$description = $_POST['description'];
	$localite=$_POST['localite'];
	$post_id = $_POST['postID'];
	$postype = $_POST['postType'];
	$currentuser = $_POST['userid'];

	if($_POST['imgid']!=0){
		$imgid = $_POST['imgid'];
	}
if($postype!='page'){
	$argposttype = array(
		'ID'=> $post_id,
		'post_content'=> $description,
		'post_title' => $nom,
		'post_type' => 'profil',
		'post_status' => 'publish',
	
	 );
	}
	else {
		$post_id= new wp_Query([
	
		
			'post_type' => 'profil', 
			'post_status' => 'publish', 
			'meta_query'    => array(
			  array(
				'key'       => 'iduser',
				'value'     => $currentuser,
				'type'      => 'NUMERIC',
				'compare'   => '='
			  ),
			)]);
	}
	$post_id = wp_insert_post($argposttype);


	if ($_POST['localite']!=''){
		update_field('localite', $localite, $post_id );
	}
	if ($_POST['age']>17){
		update_field('age', $age, $post_id );
	}
	
	update_field('localite',$localite, $post_id );
	

	if ($_POST['imgid']!=0){
		update_field('image_dillustration', $imgid, $post_id );
	}

	echo get_permalink($post_id);

	die();
}

add_action('wp_ajax_majuser','majuser');

function login(){

	$mail = $_POST['mail'];//
	$mdp = $_POST['mdp'];//



	wp_logout();
	
	wp_signon(array(
		'user_login' => $mail,
		'user_password' => $mdp,
	));
	echo 'http://localhost/test-wordpress/';
	
}

add_action('wp_ajax_login','login');

function messagecreate(){
	$author = $_POST['author'];
	$client = $_POST['userdata'];
	$title = $_POST['title'];



	$argposttype = array(
		'ID'=>0,
		'post_title' => $title.' '.$client,
		'post_type' => 'message',
		'post_status' => 'publish',
	
	 );
	$post_id = wp_insert_post($argposttype);
	update_field('idauthor', $author, $post_id );
	update_field('idclient', $client, $post_id );

	wp_insert_comment(array(
		'user_id'=> $client,
		'comment_content' => "Bonjour, je suis intéressé par votre annonce de". $title . "."
	));
	echo 'yes';

}



add_action('wp_ajax_message','messagecreate');


do_action('wp_ajax_'.$_POST['action']);
do_action('wp_ajax_'.$_GET['action']);
?>