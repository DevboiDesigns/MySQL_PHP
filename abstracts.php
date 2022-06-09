<?php


class User {
  public $username; 
  # static = properties that will always be the same (good example)
  public static $minPassLength = 5;
  # static method = 
  public static function validatePassword($password) {
    if (strlen($password) >= self::$minPassLength) {
      return true;
    } else {
      return false;
    }
  }
}

/*

$password = 'pass';

// access static method with 'scope operate' (::) 
if (User::validatePassword($password)) {
  echo 'Password is valid';
} else {
  echo 'Password not valid';
}

*/


echo User::$minPassLength; // acces directly 



// ----------------------------------- Abstracts -- can not instantiate - intended to be inherited from 'extends'
abstract class Animal {
  public $name;
  public $color;

  public function describe() {
    return $this->name. ' is ' .$this->color;
  }

  abstract function makeSound();
}


class Duck extends Animal {

  public function describe()
   {
    return parent::describe();
  }

  public function  makeSound()
  {
    return 'Quack';
  }
}

class Dog extends Animal {

  public function describe()
   {
    return parent::describe();
  }

  public function  makeSound()
  {
    return 'Bark';
  }
}

$animal = new Duck();
$animal->name = 'Ben';
$animal->color = 'Yellow';
echo $animal->describe();



?>