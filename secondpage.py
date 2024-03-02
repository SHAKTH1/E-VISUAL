from gtts import gTTS 
  
# import Os module to start the audio file
import os 
  
mytext = 'YOUR EXAM WILL CONTAIN 5 QUESTIONS IN TOTAL .PLEASE SPECIFY THE QUESTION NUMBER WHEN YOU ANSWER.ONCE THE QUESTION IS READ YOU CAN START TELLING YOUR ANSWER.PRESS ENTER TO GO TO THE NEXT QUESTION.PRESS LEFT ARROW TO LISTEN TO THE QUESTION.PLEASE PRESS ENTER TO CONTINUE'
               
# Language we want to use 
language = 'en'
  

myobj = gTTS(text=mytext, lang=language, slow=False) 
  

myobj.save("output.mp3") 
  
# Play the converted file 
os.system("start output.mp3") 



