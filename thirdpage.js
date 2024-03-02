const startingMinutes = 0.4;
let time  = startingMinutes * 60;


const countdownEl = document.getElementById('countdown');

myTimer = setInterval(updateCountdown, 1000);

function updateCountdown() {
    const minutes = Math.floor(time / 60);
    let seconds = time % 60;

    seconds = seconds < 20 ? '0' + seconds:seconds;
    countdownEl.innerHTML = `${minutes}:${seconds}`;

    time--;

    if (time == 0) {
        clearInterval(myTimer);
        window.location.replace("qp1.php");
    }
}
document.body.onkeyup = function(e){
    if(e.keyCode == 32){
        
            var sound = document.getElementById('player');
            sound.play();
        };
    }

