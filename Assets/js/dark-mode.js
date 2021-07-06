var darkmode = document.querySelector('#dark');


var configUser =  window.matchMedia('(prefers-color-scheme: dark)'); //configuracion de window

darkmode.addEventListener('click', function(){
    console.log(configUser);
})