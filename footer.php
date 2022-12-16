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
            <p>
            <?php 
            wp_nav_menu([
            'theme_location' => 'footer',
            'container' => false,
            'menu_class' => 'navbar-nav me-auto'
            ]); ?>

            </p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script>
<script src="<?php get_template_directory_uri(); ?>/assets/js/script.js"></script>
<script>

    //code qui sert à changer l'image du picto qd c'est en hover, en vrai si on passe part des svg ça pourrait accéléer, ou meme simplement mettre les deux images at the same place and while hovering set the opacity of the first at 0
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script>
    <script>
    
/*--------------------
Vars
--------------------*/
const $menu = document.querySelector('.carroussel')
const $items = document.querySelectorAll('.carroussel--item')
const $images = document.querySelectorAll('.carroussel--item img')
const $body=document.querySelector('body');
let menuWidth = $menu.clientWidth
let itemWidth = $items[0].clientWidth
let wrapWidth = $items.length * itemWidth

let scrollSpeed = 0
let oldScrollY = 0
let scrollY = 0
let y = 0

/*scroll page*/

$($menu).mouseenter(function(){

  $body.classList.add('no-scroll');
})
$($menu).mouseleave(function(){
  $body.classList.remove('no-scroll');
})

/*--------------------
Lerp
--------------------*/
const lerp = (v0, v1, t) => {
  return v0 * ( 1 - t ) + v1 * t
}


/*--------------------
Dispose
--------------------*/
const dispose = (scroll) => {
  gsap.set($items, {
    x: (i) => {
      return i * itemWidth + scroll
    },
    modifiers: {
      x: (x, target) => {
        const s = gsap.utils.wrap(-itemWidth, wrapWidth - itemWidth, parseInt(x))
        return `${s}px`
      }
    }
  })
} 
dispose(0)


/*--------------------
Wheel
--------------------*/
const handleMouseWheel = (e) => {
  scrollY -= e.deltaY * 0.8
}


/*--------------------
Touch
--------------------*/
let touchStart = 0
let touchX = 0
let isDragging = false
const handleTouchStart = (e) => {
  touchStart = e.clientX || e.touches[0].clientX
  isDragging = true
  $menu.classList.add('is-dragging')
}
const handleTouchMove = (e) => {
  if (!isDragging) return
  touchX = e.clientX || e.touches[0].clientX
  scrollY += (touchX - touchStart) * 2.5
  touchStart = touchX
}
const handleTouchEnd = () => {
  isDragging = false
  $menu.classList.remove('is-dragging')
}


/*--------------------
Listeners
--------------------*/
$menu.addEventListener('mousewheel', handleMouseWheel)

$menu.addEventListener('touchstart', handleTouchStart)
$menu.addEventListener('touchmove', handleTouchMove)
$menu.addEventListener('touchend', handleTouchEnd)

$menu.addEventListener('mousedown', handleTouchStart)
$menu.addEventListener('mousemove', handleTouchMove)
$menu.addEventListener('mouseleave', handleTouchEnd)
$menu.addEventListener('mouseup', handleTouchEnd)

$menu.addEventListener('selectstart', () => { return false })


/*--------------------
Resize
--------------------*/
window.addEventListener('resize', () => {
  menuWidth = $menu.clientWidth
  itemWidth = $items[0].clientWidth
  wrapWidth = $items.length * itemWidth
})


/*--------------------
Render
--------------------*/
const render = () => {
  requestAnimationFrame(render)
  y = lerp(y, scrollY, .1)
  dispose(y)
  
  scrollSpeed = y - oldScrollY
  oldScrollY = y
  
  gsap.to($items, {
    skewX: -scrollSpeed * .2,
    rotate: scrollSpeed * .01,
    scale: 1- Math.min(100, Math.abs(scrollSpeed)) * 0.003
  })
}
render()

</script>
</body>
</html>

