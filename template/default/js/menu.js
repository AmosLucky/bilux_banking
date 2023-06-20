document.addEventListener('DOMContentLoaded', function(){
	let menuBtn = document.querySelector('.navigation-mobile__icon');
	let menu = document.querySelector('.navigation-mobile');
	menuBtn.addEventListener('click', () => menu.classList.toggle('navigation-mobile_show'))
});