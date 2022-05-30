//variables to get the classes that i want to toggle visiibilty on

const navToggle = document.querySelector('.nav-toggle');
const links = document.querySelector('.links');


//event listener and function to toggle the links on the hamburger menu
navToggle.addEventListener('click', function () {
    links.classList.toggle('show-links');
});
