let slideshowNode = document.getElementById("slideshow");
let linkshowNode = document.getElementById("linkshow");
let startNode = document.getElementById("start");
let stopNode = document.getElementById("stop");
let prevNode = document.getElementById("prev");
let nextNode = document.getElementById("next");

let arrayGambar = [
  "./wisata1.jpg",
  "./wisata2.jpg",
  "./wisata3.jpg",
  "./wisata4.jpg",
];

let arrayLink = [
  "http://www.google.com",
  "http://www.twitter.com",
  "http://www.facebook.com",
  "http://www.bing.com",
];

let counter = 0;
let intervalID = 0;

// Button Next
const nextSlideshow = () => {
  counter++;
  if (counter === arrayGambar.length) {
    counter = 0;
  }
  slideshowNode.src = arrayGambar[counter];
  linkshowNode.href = arrayLink[counter];
};

//Button Prev
const prevSlideshow = () => {
  counter--;
  if (counter === -1) {
    counter = 4;
  }
  slideshowNode.src = arrayGambar[counter];
  linkshowNode.href = arrayLink[counter];
};

// Button Start
const startSlideshow = () => {
  if (intervalID === 0) {
    intervalID = setInterval(nextSlideshow, 2000);
  }
};

// Button Stop
const stopSlideshow = () => {
  clearInterval(intervalID);
  intervalID = 0;
};

nextNode.addEventListener("click", nextSlideshow);
prevNode.addEventListener("click", prevSlideshow);
startNode.addEventListener("click", startSlideshow);
stopNode.addEventListener("click", stopSlideshow);
