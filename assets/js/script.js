
const $menu = document.querySelector('.carrousel')
const $items = document.querySelectorAll('.carrousel--item')
const $images = document.querySelectorAll('.carrousel--item img')
const $body = document.querySelector('body')
let menuWidth = $menu.clientWidth
console.log($items)
let itemWidth = $items[0].clientWidth
let wrapWidth = $items.length * itemWidth

let scrollSpeed = 0
let oldScrollY = 0
let scrollY = 0
let y = 0


/*$($menu).mouseenter(function(){
  const $body = document.querySelector('body')
$body.classList.add('no-scroll');
})*/
$menu.addEventListener('mouseenter', () => {
    const $body = document.querySelector('body')
    $body.classList.add('no-scroll');
});
/*$($menu).mouseleave(function(){
$body.classList.remove('no-scroll');
})*/ 
$menu.addEventListener('mouseleave', () => {
    $body.classList.remove('no-scroll');
});

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
  scrollY -= e.deltaY * 0.9
}


/*--------------------
Touch
--------------------*/
let touchStart = 0
let touchX = 0
let isDragging = false
const handleTouchStart = (e) => {//dit si l'user est entrain de faire bouger le carroussel
  touchStart = e.clientX || e.touches[0].clientX
  isDragging = true
  $menu.classList.add('is-dragging')
}
const handleTouchMove = (e) => {//renvoie la valeur qui sert a deplacer le carroussel
  if (!isDragging) return
  touchX = e.clientX || e.touches[0].clientX
  scrollY += (touchX - touchStart) * 2.5
  touchStart = touchX
}
const handleTouchEnd = () => {//dit si l'user arrete de déplacer le carroussel
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
    scale: 1 - Math.min(100, Math.abs(scrollSpeed)) * 0.003
  })
}
render()
// 2eme carrou

const $menu2 = document.querySelector('.carouselprofil')
const $items2 = document.querySelectorAll('.carouselprofil--item')
const $images2 = document.querySelectorAll('.carouselprofil--item img')
let menuWidth2 = $menu2.clientWidth
console.log($items)
let itemWidth2 = $items2[0].clientWidth
let wrapWidth2 = $items2.length * itemWidth2

let scrollSpeed2 = 0
let oldScrollY2 = 0
let scrollY2 = 0
let y2 = 0


/*$($menu).mouseenter(function(){
  const $body = document.querySelector('body')
$body.classList.add('no-scroll');
})*/
$menu2.addEventListener('mouseenter', () => {
    $body.classList.add('no-scroll');
});
/*$($menu).mouseleave(function(){
$body.classList.remove('no-scroll');
})*/ 
$menu2.addEventListener('mouseleave', () => {
    $body.classList.remove('no-scroll');
});

/*--------------------
Lerp
--------------------*/
const lerp2 = (v0, v1, t) => {
  return v0 * ( 1 - t ) + v1 * t
}


/*--------------------
Dispose
--------------------*/
const dispose2 = (scroll2) => {
  gsap.set($items2, {
    x: (i) => {
      return i * itemWidth2 + scroll2
    },
    modifiers: {
      x: (x, target) => {
        const s = gsap.utils.wrap(-itemWidth2, wrapWidth2 - itemWidth2, parseInt(x))
        return `${s}px`
      }
    }
  })
} 
dispose2(0)


/*--------------------
Wheel
--------------------*/
const handleMouseWheel2 = (e2) => {
  scrollY2 -= e2.deltaY * 0.9
}


/*--------------------
Touch
--------------------*/
let touchStart2 = 0
let touchX2 = 0
let isDragging2 = false
const handleTouchStart2 = (e) => {//dit si l'user est entrain de faire bouger le carroussel
  touchStart2 = e2.clientX || e.touches[0].clientX
  isDragging2 = true
  $menu2.classList.add('is-dragging')
}
const handleTouchMove2 = (e2) => {//renvoie la valeur qui sert a deplacer le carroussel
  if (!isDragging2) return
  touchX2 = e.clientX || e.touches[0].clientX
  scrollY2 += (touchX2 - touchStart2) * 2.5
  touchStart2 = touchX2
}
const handleTouchEnd2 = () => {//dit si l'user arrete de déplacer le carroussel
  isDragging2 = false
  $menu2.classList.remove('is-dragging')
}


/*--------------------
Listeners
--------------------*/
$menu2.addEventListener('mousewheel', handleMouseWheel2)

$menu2.addEventListener('touchstart', handleTouchStart2)
$menu2.addEventListener('touchmove', handleTouchMove2)
$menu2.addEventListener('touchend', handleTouchEnd2)

$menu2.addEventListener('mousedown', handleTouchStart2)
$menu2.addEventListener('mousemove', handleTouchMove2)
$menu2.addEventListener('mouseleave', handleTouchEnd2)
$menu2.addEventListener('mouseup', handleTouchEnd2)

$menu2.addEventListener('selectstart', () => { return false })


/*--------------------
Resize
--------------------*/
window.addEventListener('resize', () => {
  menuWidth2 = $menu2.clientWidth
  itemWidth2 = $items2[0].clientWidth
  wrapWidth2 = $items2.length * itemWidth2
})


/*--------------------
Render
--------------------*/
const render2 = () => {
  requestAnimationFrame(render2)
  y2 = lerp2(y2, scrollY2, .1)
  dispose2(y2)
  
  scrollSpeed2 = y2 - oldScrollY2
  oldScrollY2 = y2
  
  gsap.to($items2, {
    skewX: -scrollSpeed2 * .2,
    rotate: scrollSpeed2 * .01,
    scale: 1 - Math.min(100, Math.abs(scrollSpeed2)) * 0.003
  })
}
render2()



//config annonce

function checkedboxoutil() {
  const outil = document.getElementById('checkoutils');
  const service = document.getElementById('checkservices');
  if (outil.checked) {
    service.checked = false;
  } else {
    service.checked = true;
  }
} 

function checkedboxservice() {
  const service = document.getElementById('checkservices');
  const outil = document.getElementById('checkoutils');

  if (service.checked) {
    outil.checked = false;
  } else {
    outil.checked = true;
  }
}


function messagerieonoff(){
 
  const messagerie = document.getElementById('messagerie')

  if(messagerie.classList.contains('messagerieon')){
    messagerie.classList.remove("messagerieon");
    messagerie.classList.add("off");
    return 0;
  }
  messagerie.classList.remove("off");
  messagerie.classList.add("messagerieon");
}


