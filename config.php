<?php

  define("HOSTNAME","localhost");
  define("USERNAME","root");
  define("PASSWORD","");
  define("DBNAME","stu_info");

  $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("Can't connect to the Database.");
  if($con) echo("You are connected to Database.");

?>
