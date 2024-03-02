
<?php
$host = "sql203.epizy.com";
$username = "epiz_33483613";
$password = "boLxD4xhCkj76fF";

try 
{
    $conn = new PDO("mysql:host=$host;dbname=epiz_33483613_eviusal", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
if(isset($_POST['save_note']))
{
  
    $sql = "INSERT INTO note4(answer4) VALUES('".($_POST['ans'])."')";
   
    $conn->query($sql);
  }
header("location:qp4.php");
?>