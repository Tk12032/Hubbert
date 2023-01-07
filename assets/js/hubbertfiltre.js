

function doublslider(){
    var doubleslider = document.getElementById('fromSlider')
    var outputStartDay = document.getElementById('startday')
    var doubleslider2 = document.getElementById('toSlider')
    var outputStartDay2 = document.getElementById('endday')
    var testvalue = doubleslider.value
    var testvalue2 = doubleslider2.value

  if(testvalue==0){
    outputStartDay.value='Lundi'
  }else if(testvalue==1){
    outputStartDay.value='Mardi'
  }else if(testvalue==2){
    outputStartDay.value='Mercredi'
  }else if(testvalue==3){
    outputStartDay.value='Jeudi'
  }else if(testvalue==4){
    outputStartDay.value='Vendredi'
  }else if(testvalue==5){
    outputStartDay.value='Samedi'
  }else outputStartDay.value='Dimanche';

  if(testvalue2==0){
    outputStartDay2.value='Lundi'
  }else if(testvalue2==1){
    outputStartDay2.value='Mardi'
  }else if(testvalue2==2){
    outputStartDay2.value='Mercredi'
  }else if(testvalue2==3){
    outputStartDay2.value='Jeudi'
  }else if(testvalue2==4){
    outputStartDay2.value='Vendredi'
  }else if(testvalue2==5){
    outputStartDay2.value='Samedi'
  }else outputStartDay2.value='Dimanche'
}


function doublslider2(){
  var doubleslider = document.getElementById('fromSlider2')
  var outputStarthour = document.getElementById('starthour')
  var doubleslider2 = document.getElementById('toSlider2')
  var outputendhour = document.getElementById('endhour')

  outputStarthour.value=doubleslider.value + 'h'
  outputendhour.value=doubleslider2.value + 'h'
}