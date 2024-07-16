import { tns } from "./../node_modules/tiny-slider/src/tiny-slider"
import "./../node_modules/lightgallery.js/dist/js/lightgallery"


var slider = tns({
    container: '.slider-header',
    items: 1,
    autoplay: true,
    autoplayButtonOutput: false,
    nav: false,
    controlsContainer: '.controls-header'
});


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


const url = window.location.search;


const urlParams = new URLSearchParams(url);

var movieId = urlParams.get(movieId);

document.getElementById('ButtonQR').addEventListener('click', function() {
    var popupDiv = document.getElementById('popupDiv');
    var popupImage = document.getElementById('popupImage');

    if (popupDiv.classList.contains('inactive')) {
        popupDiv.classList.remove('inactive');
        popupDiv.classList.add('active');
    }

    fetch('http://imdb.test/movies/detailqr?movieId=' + movieId)
        .then(response => response.text())
        .then(data => {
            document.querySelector('#popupImage').src=data
        })
        .catch(error => {
            console.error('Error al obtener la imagen:', error);
        });
});

document.getElementById('popupDiv').addEventListener('click', function(ev) {
    var popupDiv = document.getElementById('popupDiv');

    if (popupDiv.classList.contains('active') && ev.target.id != 'popupImage') {
        popupDiv.classList.remove('active');
        popupDiv.classList.add('inactive');
  }

});

