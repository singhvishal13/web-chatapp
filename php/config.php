<?php
  
  $hostname = "ec2-107-21-211-154.compute-1.amazonaws.com";
  $username = "vzypvgtcwroumt";
  $password = "ab982df63cdc7de78a365153fc2ae1cd0f96d463d0da6bfcfef81ec6c6da554b";
  $dbname = "d5j3fu26r6bg04";

  $conn = pg_connect("host=$hostname user=$username password=$password dbname=$dbname")
          or die("Could not connect");
  if(!$conn){
    echo "Database connection error".pg_connect_error();
  }
?>
