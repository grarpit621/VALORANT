function fadeout(){
    var load=document.querySelector('#loader');
    var site=document.querySelector('.notLoaded');
    load.remove();
}
  window.setTimeout('fadeout();', 2000);
  