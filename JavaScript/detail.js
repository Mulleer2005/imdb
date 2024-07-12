import { tns } from "./../node_modules/tiny-slider/src/tiny-slider"
import "./../node_modules/lightgallery.js/dist/js/lightgallery"
console.log(document.querySelector('.slider-header'))

var slider = tns({
    container: '.slider-header',
    items: 1,
    autoplay: true,
    autoplayButtonOutput: false,
    nav: false,
    controlsContainer: '.controls-header'
});

console.log(document.querySelector('.slider-footer'))

var slider = tns({
  container: '.slider-footer',
  items: 2.5,
  autoplay: true,
  autoplayButtonOutput: false,
  nav: false,
  controlsContainer: '.controls-footer'
});

lightGallery(document.getElementById('lightgallery'), {
});