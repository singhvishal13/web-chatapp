<?php
  $hostname = "localhost";
  $username = "postgres";
  $password = "admin";
  $dbname = "chatapp";

  $conn = pg_connect("host=$hostname user=$username password=$password dbname=$dbname")
          or die("Could not connect");
  if(!$conn){
    echo "Database connection error";
  }
?>
