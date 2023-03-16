//Script Javascript for portofolioKu HTML
//Top Navigation Bar
const topMenuToggle = document.querySelector(".topnav input");
const menu = document.querySelector("nav ul");

topMenuToggle.addEventListener("click", function () {
  menu.classList.toggle("activeSlide");
});

// On Scroll Header
window.onscroll = function () {
  scrollFunction();
};

const header = document.querySelector("nav");
const sticky = header.offsetTop;

function scrollFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("navScroll");
  } else {
    header.classList.remove("navScroll");
  }
}

//Slider
let slideIndex = 1;
showSlide(slideIndex);
autoPlay();

function addSlide(n) {
  showSlide((slideIndex += n));
}

function backSlide(n) {
  showSlide((slideIndex = n));
}

function showSlide(n) {
  let i;
  let slides = document.getElementsByClassName("slider");
  // let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  // for (i = 0; i < dots.length; i++) {
  //   dots[i].className = dots[i].className.replace(" active", "");
  // }
  slides[slideIndex - 1].style.display = "block";
  // dots[slideIndex - 1].className += " active";
}

function autoPlay() {
  var i;
  var slides = document.getElementsByClassName("slider");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  t = setTimeout("autoPlay()", 8000);
}
