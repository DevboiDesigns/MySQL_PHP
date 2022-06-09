# MySQL & PHP

- table for each object
- column for each property on the object (can be changed)
- all tables should have id property - Int - PRIMARY Key
- A_I = will increament one every time a new object is made in table

```php
// Connect to Database
  mysqli_connect("host_address", "database_name", "password")
```

# Access DB

```php
// what is between "" is SQL - tables in database
  // Select (* everything) from users
  // capatilize key words
  $query = "SELECT * FROM users"
```

# Running a Query

```php
//                      (DB connection & query)
  if ($result = mysqli_query($link, $query)) {
    echo "Query was succesful";
  }
```

# CRUD

## READ

```php
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
```

## CREATE

```php
  // ------------------ table ---- fields = inserting values in - `` back ticks
  $query = "INSERT INTO `users` (`email`, `password`) VALUES('email@email.com', 'password1234')";

  mysqli_query($link, $query);
```

## UPDATE

```php
  // ------------- table ---- property to change ---------------- table id --- LIMIT will only allow (x)amount updates to occur
  $query = "UPDATE `users` SET email = 'newemail@email.com' WHERE id = 1 LIMIT 1";
  // ---------------------------------------------------------------- Strings needs qoutes, Int not
  $query = "UPDATE `users` SET email = 'newemail@email.com' WHERE email = 'email@email.com' LIMIT 1";
```

## DELETE
