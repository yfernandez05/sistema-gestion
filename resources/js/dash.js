/*Agregando clases '.hovered' al pasar hover un item menu dashborad*/
let list =  document.querySelectorAll('.navigation ul li');
function activeLink(){
    list.forEach((item) => 
    item.classList.remove('hovered'));
    this.classList.add('hovered');   
}
list.forEach((item) => 
item.addEventListener('mouseover',activeLink));

/*MenuTogle - agregar una clase para poder esconder los texto y solo ver el icono con el sanguchito*/
let toggle =  document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function(){
    navigation.classList.toggle('active');
    main.classList.toggle('active');
} 