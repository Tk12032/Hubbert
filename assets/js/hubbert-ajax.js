
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



