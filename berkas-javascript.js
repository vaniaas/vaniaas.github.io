var slides = document.querySelectorAll('.slide');
var btns = document.querySelectorAll('.btn');
let currentSlide = 1

//AUTOPLAY
var repeat = function(activeClass){
  let active = document.getElementsByClassName('active');
  let i = 1;
  var repeater = () => {
    setTimeout(function(){
      [...active].forEach((activeSlide) => {
        activeSlide.classList.remove('active');
      });
    slides[i].classList.add('active');
    btns[i].classList.add('active');
    i++;
    if(slides.length == i){
      i = 0;
    }
    if(i >= slides.length){
      return;
    }
    repeater();
  }, 10000);
  }
  repeater();
}
repeat();