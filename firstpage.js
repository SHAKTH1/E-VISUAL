document.body.onkeydown = function(e) {
    if (e.keyCode == 32) {
        speak();
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

let popup = document.getElementById("popup");
function openpopup(){
    popup.classList.add("open-popup");
}
function closepopup(){
    popup.classList.remove("open-popup");
}
function go(){
    window.location.replace("signup.php");
}
function next(){
    window.location.replace("admin.php");
}