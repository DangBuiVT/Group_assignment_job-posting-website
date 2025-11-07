<?php 
    // connect to database
   $db = mysqli_connect("localhost", "dang", "dangsdb123", "maiko_job_site");

   if (!$db){
    echo 'connection error: ' . mysqli_connect_error();
    // die("". mysqli_connect_error());
   }

   // print_r($db);