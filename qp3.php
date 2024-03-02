

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Voice Controlled Examination</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shoelace-css/1.0.0-beta16/shoelace.css"> 
   <link rel ="stylesheet" href="../css/styles.css">
    

</head>
<body id="a" style="background-color:#DAD8D8;">
    <div class="container">
        
        <h1><b>VOICE CONTROLLED EXAMINATION 2020</b></h1>
        <br><br>
        <h2>BIOLOGY MIDTERM EXAMINATION</h2>
        <br>
        <button class="btn" onclick="speak();">TEXT TO SPEECH</button>
        <div class="container"> 
            <br>
            <?php

$conn = mysqli_connect("sql203.epizy.com", "epiz_33483613", "boLxD4xhCkj76fF", "epiz_33483613_eviusal");

$sql = "SELECT question3 FROM questions WHERE id = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<textarea id="myText">question3:
  <?php   echo $row['question3'] ?></textarea>
<?php
  mysqli_close($conn);
?>
            
            
            <div class="input-single">
                <form action ="qp3put.php" method="post">
                <textarea id="note-textarea" placeholder="Press the spacebar to start recording." rows="5" name="ans" value="">Answer: </textarea>
                <button id="savenote" name="save_note" onclick="save();">SAVE NOTE</button>
            </div>
</form>   
     <button onclick="next();">NEXT</button>
     <?php
    // Connect to the database
    $conn = mysqli_connect("sql203.epizy.com", "epiz_33483613", "boLxD4xhCkj76fF", "epiz_33483613_eviusal");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the button was clicked
  $query = "select * from note3";
  $result = mysqli_query($conn,$query); 
 
  if($column = mysqli_fetch_assoc($result))
          {
            ?>
           
            <button onclick= "listen()";>LISTEN NOTE</button> 
            <textarea id="savednote" rows="3">Saved answers : 
           <?php echo $column['answer3']; ?></textarea>
          </form>
           <?php
          }
        ?>

        <?php
 $connection = mysqli_connect("sql203.epizy.com", "epiz_33483613", "boLxD4xhCkj76fF");
        $db = mysqli_select_db($connection,'epiz_33483613_eviusal');
        if(isset($_POST['delete']))
        {
          $query = "DELETE from note3 where id=1";
          $query_run = mysqli_query($connection,$query);
        }
      
?>
<form action="" method="POST">
<button id= "deletebtn" name="delete" onclick="deletes();">DELETE</button>
        </form>
<br>
        </div>

    </div>
       <p id="instruction" onkeyup="inst();"> EXAM INSTRUCTIONS<br>PRESS ENTER TO GO TO THE NEXT QUESTION.<br>PRESS LEFT ARROW MARK TO LISTEN TO THE QUESTION.<br>PRESS SPACEBAR TO RECORD YOUR ANSWER.<br>PRESS S TO SAVE YOUR ANSWER.<br>PRESS D TO DELETE YOUR ANSWER.<br>PRESS L TO LISTEN TO YOUR SAVED ANSWER.<br>
                   PRESS ENTER KEY T0 CONTINUE</p>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/qp3.js"></script>


</body>
</html>
