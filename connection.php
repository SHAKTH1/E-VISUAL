<?php

$dbhost = "sql203.epizy.com";
$dbuser = "epiz_33483613";
$dbpass = "boLxD4xhCkj76fF";
$dbname = "epiz_33483613_eviusal";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
