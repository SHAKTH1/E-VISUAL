document.body.onkeydown = function(e) {
    if (e.keyCode == 32) {
        speak();
    }
    if (e.keyCode == 76) {
        back();
    }
     if (e.keyCode == 13) {
        next();
    }
}

var myText = document.getElementById('myText');
function speak() { 
    var msg = new SpeechSynthesisUtterance();
    msg.text = myText.innerHTML;
    window.speechSynthesis.speak(msg);
};

window.onload=function(){
      speak();
    }
function back(){
    window.location.replace("login.php");
}
function next(){
    window.location.replace("secondpage.html");
}