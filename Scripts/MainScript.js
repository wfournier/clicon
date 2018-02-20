$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function setLanguage(cname, lang){
	var now = new Date();
	document.cookie = cname +"=" +lang +";expires=" +now.getTime()+31536000 +";path=/";
	window.location.replace(window.location.href);
}