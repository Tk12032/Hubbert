$(function(){

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


});