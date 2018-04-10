<?php

$con = new mysqli("localhost","root","","koperasi");
if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
?>