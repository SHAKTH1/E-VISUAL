 var sound = document.getElementById('player');

document.body.onkeypress = function(e){
    if(e.keyCode == 13){
        window.location.replace("thirdpage.html");
    }
}
 
document.body.onkeyup = function(e){
    if(e.keyCode == 32){
          sound.play();
        };
    } 
    window.onload=function(){
        sound.play();
    };