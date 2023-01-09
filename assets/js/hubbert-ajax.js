
/*function testPost(){

  $.ajax({
    url: '/test-wordpress/wp-content/themes/Hubbert/hubbertajax.php', //on va devoir probablement changer l'url quand on sera sur serveur
    type: 'POST',// GET ou PUT également
    data: {//tableau en Json
      action : "create_post",
      title : "TestTestTEst",
      content : "This is the content of my new post."

    },
    success: function(response) {
      console.log(response)
    },
    error : function(){
        console.log("ça n'a pas marché, vous avez tout cassé")
    }
  });  
}
testPost();*/

const hubajaxurl = '/test-wordpress/wp-content/themes/Hubbert/hubbertajax.php'


function filter(){
  // Récupérez un élément parent dans lequel vous voulez ajouter les éléments article
var parent = document.getElementById('parent');

// Effacez le contenu de l'élément parent
parent.innerHTML = '';

  const outil = document.getElementById('checkoutils').checked
  const services = document.getElementById('checkservices').checked
  const prix = document.getElementById('prix').value
  const distance = document.getElementById('distance').value
  const jstart = document.getElementById('fromSlider').value
  const jend = document.getElementById('toSlider').value
  const hstart = document.getElementById('fromSlider2').value
  const hend = document.getElementById('toSlider2').value

  $.ajax({
    url: hubajaxurl,
    type: 'GET',
    data: {//tableau en Json
      'action' : "filter",
      outil : outil,
      service : services,
      prixmax : prix,
      distancemax : distance,
      jourstart : jstart,
      jourend : jend,
      heurestart : hstart,
      heureend : hend
    },
    success: function(response) {
      console.log(response)
      // Créez une variable qui contient tous les éléments HTML nécessaires
      if(response != 'none'){
       // Utilisez la fonction JSON.parse pour convertir la chaîne de caractères JSON en un objet JavaScript
      var obj = JSON.parse(response);

      // Récupérez un élément parent dans lequel vous voulez ajouter les éléments article
      var parent = document.getElementById('parent');

      // Utilisez une boucle for pour parcourir le tableau et générer du code HTML pour chaque élément
      for (var i = 0; i < obj.length; i++) {
        // Récupérez les valeurs du tableau
        var type = obj[i].type;
        var urlimage = obj[i].urlimage;
        var title = obj[i].title;
        var content = obj[i].content;
        var urlavatar = obj[i].urlavatar;
        var authorname = obj[i].authorname;
        var prix = obj[i].prix;
        var lienarticle = obj[i].lienarticle;
            
         // Générez du code HTML pour l'élément article
        var article = document.createElement('article');
        article.className = 'service';
        article.innerHTML =
    '<div class="card flex-row">' +
    '  <img class="card-img-left example-card-img-responsive" style="min-width:460px; height:330px" src="' + urlimage + '">' +
    '  <div class="card-body">' +
    '    <div>' +
    '      <h4 class="card-title h5 h4-sm" style="font-family:\'Poppins\';text-transform: uppercase;font-weight:600;font-size:24px">' + title + '</h4>' +
    '      <p class="card-text">' + content + '</p>' +
    '    </div>' +
    '    <div class="bot-card-body">' +
    '      <div class="vert versprofil"><img alt="" src="' + urlavatar + '" class="avatar avatar-96 photo" height="96" width="96" loading="lazy" decoding="async">' +
    '        <h5>' + authorname + '</h5>' +
    '      </div>' +
    '      <h5>' + prix + '€ par jour</h5>' +
    '      <a href="' + lienarticle + '" class="vert boutonplus">+</a>' +
    '    </div>' +
    '  </div>' +
    '</div>';

  // Ajoutez l'élément article à l'élément parent
  parent.appendChild(article);
        }
      }
      else {
        var parent = document.getElementById('parent');

  // Si le tableau est vide, ajoutez un élément h5 à l'élément parent
  var h5 = document.createElement('h5');
  h5.innerHTML = "Il n'y a pas d'article correspondant à votre recherche";
  parent.appendChild(h5);
      }
    },
    error : function(){
        console.log("ça n'a pas marché, vous avez tout cassé")
    }
  }); 
}

var currentUrl = window.location.href;

// Vérifiez si l'URL de la page actuelle correspond à l'URL de la page souhaitée
if (currentUrl == 'http://localhost/test-wordpress/demander-un-service-outil/') {
  // Si l'URL correspond, exécutez la fonction
  filter();
}

let attachementId = 0;//permettre de modifier l'id d'une image upload

$(document).ready(function() {
  $('#image-form').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
    url: '/test-wordpress/wp-content/themes/Hubbert/uploadimg.php',
    type: 'POST',
    data: formData,
    success: function(data) {
    console.log(data)
    attachementId = data;
    },
    cache: false,
    contentType: false,
    processData: false
    });
  });
});


function postMajAnnonc(){
 console.log(attachementId)
  const postype = document.getElementById('posttype').innerText
  const postid = document.getElementById('postid').innerText
  const userid = document.getElementById('currentuserid').innerText
    const description = document.getElementById('description').value
    const titre = document.getElementById('titre').value
    const prix = document.getElementById('prix').value
    const localite = document.getElementById('localite').value
    const outil = document.getElementById('checkoutils').checked
    const services = document.getElementById('checkservices').checked
    const jstart = document.getElementById('fromSlider').value
    const jend = document.getElementById('toSlider').value
    const hstart = document.getElementById('fromSlider2').value
    const hend = document.getElementById('toSlider2').value

      

    $.ajax({
      url: hubajaxurl,
      type: 'POST',
      data: {//tableau en Json
        action : 'postannonc',
        postType : postype,
        postID : postid,
        descrip : description,
        title : titre,
        lieu : localite,
        outil : outil,
        service : services,
        prix : prix,
        jourstart : jstart,
        jourend : jend,
        heurestart : hstart,
        heureend : hend,
        userid : userid,
        imgid : attachementId
      },
      success: function(response) {
        console.log(response)
        window.location.href = response;
      },
      error : function(){
          console.log("ça n'a pas marché, vous avez tout cassé")
      }
    }); 
}





