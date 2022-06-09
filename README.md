# PHP Syntax

- **Variable** `$myVar1 = 'Hello World!';` --- variables start with $ - letter or underscore
- **Array** `$numbers = array(12, 45, 22, 65);`

## Setup & Enviorment

- [AAMPS](https://ampps.com)
- [MAMP](https://www.mamp.info/en/mac/)

### MAMP setup

- open app (starts immediatley)
- server folder: Applications -> MAMP -> htdocs (files that are read live here, place project here)

## Asociative Array

```php
$ages = array(
    "John" => 35,
    "Mary" => 27,
    "Bob" => 33
);

echo $ages['Mary']
```

## String catanet

```php
$myVar1 = 'Hello';

$myVar2 = "World";

echo $myVar1 . ' ' . $myVar2;
echo $myVar1 . 'Bahaha';
```

## For

```php
// (set variable) - (conditional logic) - (increment by)
for ($i = 0; $i < 5; $i++) {
    echo $i;
};
```

## While

```php
$i = 0;
while ($i <= 10) {
    echo 'Number ' . $i . '<br />';
    $i++;
}
```

## ForEach

```php
$number = array(12, 45, 22, 65);

foreach ($number as $number) {
    echo 'This is number ' . $nmuber . '<br />';
}
```

```php
$ages = array(
    "John" => 35,
    "Mary" => 27,
    "Bob" => 33
);

//---------------- Key  -  Value
foreach ($ages as $name => $age) {
    echo $name . ' is ' . $age . '<br />';
}
```

## Helpful Code

- `print_r($numbers)` - prints to browser
- `echo` - sends to browser
- `count(($ages))`
- `array_pop($ages)`; - removes last value
- `array_shift($ages)`; - removes first value
- `var_dump(isset($post->name));`

# Functions

- `strtoupper($name . ' ' . $greetting);` - uppercase

```php
function greet() {
    echo 'Hello World';
}

greet();
```

```php
function greet($name)
{
    echo 'Hello ' . $name;
}

greet('Brad');
```

```php
function greet($name, $greetting)
{
    echo 'Hello ' . $name . ' ' . $greetting;
}

greet('Brad', 'How are you?');
```

```php
function greet($name, $greetting = 'How are you?')
{
    echo 'Hello ' . $name . ' ' . $greetting;
}

greet("John");
```

# If Statements

- `== != < >`
- `|| &&`

```php
$num = 10;
if ($num == 10) {
    echo "Correct";
}
```

```php
$num1 = 101;
$num2 = 500;
if ($num1 == $num2) {
    echo "Correct";
} else {
    echo "Wrong";
}
```

```php
$num1 = 101;
$num2 = 500;
if ($num1 == $num2) {
    echo "Correct";
} elseif ($num1 == 500) {
    echo "Correct";
} else {
    echo "Wrong";
}
```

# OOP

- `public` - accesible outside of class
- `protected` - accesible in class and any extended classes
- `private` - accesible ONLY in owner class
  _can be attached to both properties and methods_
  _defaults to `public` if not defined_

```php
class User
{
    public function register()
    {
        echo 'User Registered';
    }
};

$User = new User;
$User->register()
```

```php
class User
{

    public function __construct()
    {
        echo 'Constructor Called';
        // Initalizer
    }

    public function __destruct()
    {
        echo 'Destructor Called';
        // Deinitializer
    }
};
```

```php
class User
{
    public $username;
    public $password;


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

};

$User = new User('Chris', '1234');
```

**extensions**

```php
Class ChildClass extends ParentClass {

}
```

```php
class First
{
    private $id = 23; // will extension - private
    public $name = 'John Doe';

    public function saySomething()
    {
        echo 'Something...';
    }
}

class Second extends First
{
}

$second = new Second;
echo $second->name
```

- call a method from within in a method

```php
  public function register()
    {
        echo 'User Registered';
    }

    public function login($username, $password)
    {
        $this->register();
    }
```

```php
class User
{

    public $id;
    public $username;
    public $email;
    public $password;

    public function login($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->auth_user();
    }

    public function auth_user()
    {
        echo $this->username . ' is authenticated.';
    }

};

$User = new User;
$User->login('Chris', '1234');
```

- Access properties in object

```php
$User->username;
```

## Static types

```php
class User {
  public $username;
  # static = properties that will always be the same (good example)
  public static $minPassLength = 5;
  # static method =
  public static function validatePassword($password) {
    // static properties use self::
    if (strlen($password) >= self::$minPassLength) {
      return true;
    } else {
      return false;
    }
  }
}



$password = 'pass';

// access static method with 'scope operate' (::)
if (User::validatePassword($password)) {
  echo 'Password is valid';
} else {
  echo 'Password not valid';
}



echo User::$minPassLength // acces directly
```

## Abstract Class

- [Files](./abstracts.php)

* base
* can _NOT_ be instantiated and used directly
* must be extended by another class
* if a property or method is `abstract` then the class also _must_ be `abstract`

# MySQL & PHP

- table for each object
- column for each property on the object (can be changed)
- all tables should have id property - Int - PRIMARY Key
- A_I = will increament one every time a new object is made in table

# Access DB

```php
// Connect to Database
  mysqli_connect("host_address", "database_name", "password")
```

# Running a Query

```php
// what is between "" is SQL - tables in database
  // Select (* everything) from users
  // capatilize key words
  $query = "SELECT * FROM users"
```

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
   $query = "SELECT * FROM `users` WHERE id = 1";
     // ------------------------------------- LIKE % will return all matching values of property
     // ----------------------------e.g. id >= 2
  $query = "SELECT * FROM `users` WHERE email LIKE '%gmail.com'";

  $query = "SELECT 'email' FROM `users` WHERE id >= 2 AND email LIKE '%T%'";

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
