<?php

 // Connect to Database
  $link = mysqli_connect("host_address", "database_name", "password");

  if (mysqli_connect_error()) {
    die ("There was an error connecting to the database");
  }

  //1. --------------READ----------------------------- QUERY 

  // what is between "" is SQL - tables in database
  // Select (* everything) from users 
  // capatilize key words 
  $query = "SELECT * FROM `users`";

  //                      (DB connection & query) 
  if ($result = mysqli_query($link, $query)) {
     $row = mysqli_fetch_array($result); // row in database 
     print($row);

     // Accessing properties in Arrays
     echo "Your email is ".$row['email']." and your password is ".$row['password'];
  }



  //2. --------------CREATE----------------------------- QUERY
  
  // ------------------ table ---- fields = inserting values in - `` back ticks 
  $query = "INSERT INTO `users` (`email`, `password`) VALUES('email@email.com', 'password1234')";

  mysqli_query($link, $query);



  //3. --------------UPDATE----------------------------- QUERY
  // ------------- table ---- property to change ---------------- table id --- LIMIT will only allow (x)amount updates to occur 
  $query = "UPDATE `users` SET email = 'newemail@email.com' WHERE id = 1 LIMIT 1";
  // ---------------------------------------------------------------- Strings needs qoutes, Int not 
  $query = "UPDATE `users` SET email = 'newemail@email.com' WHERE email = 'email@email.com' LIMIT 1";


?>