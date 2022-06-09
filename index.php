<?php

// TAKEN FROM - The Complete Web Developer Course 2.0 - Udemy

 // Connect to Database
  $link = mysqli_connect("host_address", "database_name", "password");

  if (mysqli_connect_error()) {
    die ("There was an error connecting to the database");
  }

  //1. --------------READ----------------------------- QUERY 

  // what is between "" is SQL - tables in database
  // Select (* everything) from users 
  // capatilize key words
  // -------------------------------------------- LIKE % will return all matching values of property
  $query = "SELECT * FROM `users` WHERE email LIKE '%gmail.com'";

  $name = "ROB O'GRADY";
  // ------------------------------------------------- will include ' in entire string and not escape = safer to ensure no code is injected
  $query = "SELECT 'email' FROM `users` WHERE name = '".mysqli_real_escape_string($link, $name)."'"; // catonate string syntax 

  //                      (DB connection & query) 
  if ($result = mysqli_query($link, $query)) {
    // will loop through all rows 
      while ($row = mysqli_fetch_array($result)) {
        // row in database
        print($row);
      };  
     

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



  if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) {

    // will print all that was sent in POST 
    print_r($_POST);

    if ($_POST['email'] == '') {
      echo "<p>Email address is required</p>";
    } else if ($_POST['password'] == '') {
      echo "<p>Password is required</p>";
    } else {
      $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";

      $result = mysqli_query($link, $query);

      if (mysqli_num_rows($result) > 0) {
        echo "That email address is already in use.";
      } else {
        $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."' '".mysqli_real_escape_string($link, $_POST['password'])."')";

        // run the query
        if (mysqli_query($link, $query)) {
          echo "You have been signed up";
        } else {
          echo "There was an issue";
        }
      }
    }

  };


?>


<form method="POST">
  <input name="email" type="text" placeholder="Email address">
  <input name="password" type="password" placeholder="Password">
  <input type="submit" value="Sign Up">
</form>