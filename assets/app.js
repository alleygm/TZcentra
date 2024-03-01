import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.scss'

const $ = require('jquery');
global.$ = global.jQuery = $;

window.getLocation =function() {
  // Если геолокация поддерживается браузером
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    document.getElementById("location").innerHTML = "Геолокация не поддерживается.";
  }
}
function showPosition(position) 
{
  var lat = position.coords.latitude;
  var lon = position.coords.longitude;
  document.getElementById("location").innerHTML = "Широта: " + lat + "<br>Долгота: " + lon;
}

