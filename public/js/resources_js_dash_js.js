(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_dash_js"],{

/***/ "./resources/js/dash.js":
/*!******************************!*\
  !*** ./resources/js/dash.js ***!
  \******************************/
/***/ (() => {

/*Agregando clases '.hovered' al pasar hover un item menu dashborad*/
var list = document.querySelectorAll('.navigation ul li');

function activeLink() {
  list.forEach(function (item) {
    return item.classList.remove('hovered');
  });
  this.classList.add('hovered');
}

list.forEach(function (item) {
  return item.addEventListener('mouseover', activeLink);
});
/*MenuTogle - agregar una clase para poder esconder los texto y solo ver el icono con el sanguchito*/

var toggle = document.querySelector('.toggle');
var navigation = document.querySelector('.navigation');
var main = document.querySelector('.main');

toggle.onclick = function () {
  navigation.classList.toggle('active');
  main.classList.toggle('active');
};

/***/ })

}]);