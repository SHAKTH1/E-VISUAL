
try {
    var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    var recognition = new SpeechRecognition();
} catch (e) {
    console.error(e);
    $('.no-browser-support').show();
    $('.app').hide();
}


var noteTextarea = $('#note-textarea');
var instructions = $('#recording-instructions');
var notesList = $('ul#notes');
var noteContent = "";


// Get all notes from previous sessions and display them.
var notes = getAllNotes();
renderNotes(notes);



/*-----------------------------
      Voice Recognition 
------------------------------*/

// If false, the recording will stop after a few seconds of silence.
// When true, the silence period is longer (about 15 seconds),
// allowing us to keep recording even when the user pauses. 
recognition.continuous = true;
// This block is called every time the Speech APi captures a line. 
recognition.onresult = function(event) {

    // event is a SpeechRecognitionEvent object.
    // It holds all the lines we have captured so far. 
    // We only need the current one.
    var current = event.resultIndex;

    // Get a transcript of what was said.
    var transcript = event.results[current][0].transcript;

    // Add the current transcript to the contents of our Note.
    // There is a weird bug on mobile, where everything is repeated twice.
    // There is no official solution so far so we have to handle an edge case.
    var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);

    if (!mobileRepeatBug) {
        noteContent += transcript;
        noteTextarea.val(noteContent);
    }
};

recognition.onstart = function() {
    instructions.text('Voice recognition activated. Try speaking into the microphone.');
}

recognition.onspeechend = function() {
    instructions.text('You were quiet for a while so voice recognition turned itself off.');
}

recognition.onerror = function(event) {
    if (event.error == 'no-speech') {
        instructions.text('No speech was detected. Try again.');
    };
}




/*-----------------------------
      App buttons and input 
------------------------------*/
document.body.onkeypress = function(e) {
    if (e.keyCode == 17) {
        reread();
    }
    if(e.keyCode == 13){
        window.location.replace("qp2.php");
    }
    if(e.keyCode == 50) {
            window.location.replace("qp2.php");
        }   
     
    if(e.keyCode == 51){
        window.location.replace("qp3.php");

    } 
    if(e.keyCode == 52){
        window.location.replace("qp4.php");

    } 
    if(e.keyCode == 53){
        window.location.replace("qp5.php");

    }
}



document.body.onkeydown = function(e) {
    if (e.keyCode == 32) {
        if (noteContent.length) {
            noteContent += ' ';
        }
        recognition.start();

    }
 
}

document.body.onkeyup = function(e){
    if(e.keyCode == 37){
        speak();
    }
    if (e.keyCode == 76){

        listen();
    }
    if(e.keyCode == 83){        
        save();
    } 
    if(e.keyCode == 68){
       
        deletes();
    }
    if(e.keyCode == 73){
        inst();
    }     
    }
 
document.addEventListener('keydown', function(e) {
    // This would be triggered by pressing CTRL + A
    if (e.keyCode == 77) {
        instructions.text('Voice recognition paused.');
        recognition.stop();
        reread();

    }
}, false);


// Sync the text inside the text area with the noteContent variable.
noteTextarea.on('input', function() {
    noteContent = $(this).val();
})

 

/*-----------------------------
      Speech Synthesis 
------------------------------*/

function readOutLoud(message) {
    var speech = new SpeechSynthesisUtterance();

    // Set the text and voice attributes.
    speech.text = message;
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;

    window.speechSynthesis.speak(speech);
}



/*-----------------------------
      Helper Functions 
------------------------------*/

function renderNotes(notes) {
    var html = '';
    if (notes.length) {
        notes.forEach(function(note) {
            html += `<class="note">
        <p class="header">
        <p id="content">${note.content}</p>
        </p>`;
        });
    };
}




function getAllNotes() {
    var notes = [];
    var key;
    for (var i = 0; i < localStorage.length; i++) {
        key = localStorage.key(i);

        if (key.substring(0, 5) == 'note-') {
            notes.push({
                date: key.replace('note-', ''),
                content: localStorage.getItem(localStorage.key(i))
            });
        }
    }
    return notes;
}


function checkCompatibility () {
    if(!('speechSynthesis' in window))
    {
        alert('Your browser is not compatible');
    }
};



var myText = document.getElementById('myText');
var ans = document.getElementById('note-textarea');
var content = document.getElementById('savednote');
var ins = document.getElementById('instruction');

var voiceMap = [];
function loadVoices(){
    var voices = speechSynthesis.getVoices;
    for(var i = 0; i < voices.length;i++)
    {
        var voice = voices[i];
        var option = document.createElement('option');
        option.value = voice.name;
        option.innerHTML = voice.name;
        voiceOptions.appendChild(option);
        voiceMap[voice.name]= voice;
    };
};
window.speechSynthesis.onvoiceschanged = function(e){
    loadVoices();
};
function speak () {
    var msg = new SpeechSynthesisUtterance();
    msg.text = myText.value;
    window.speechSynthesis.speak(msg);
};

function reread(){
	var txtmsg= new SpeechSynthesisUtterance();
	txtmsg.text = ans.value;
	window.speechSynthesis.speak(txtmsg);
}
function listen(){
	var txtmsg= new SpeechSynthesisUtterance();
	txtmsg.text = content.value;
	window.speechSynthesis.speak(txtmsg);
}
function next(){
    window.location.replace("qp2.php");
}
function save(){
    var note = document.getElementById('savenote');
    note.click();   
}
function deletes(){
    var del = document.getElementById('deletebtn');
    del.click();
}
function inst(){
    var txtmsg= new SpeechSynthesisUtterance();
	txtmsg.text = ins.innerHTML;
	window.speechSynthesis.speak(txtmsg);
}