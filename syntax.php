
<?php

/*
$myVar1 = 'Hello';

$myVar2 = "World";

echo $myVar1 . ' ' . $myVar2;

$numbers = array(12, 45, 22, 65);


echo $numbers[0];

$ages = array(
    "John" => 35,
    "Mary" => 27,
    "Bob" => 33
);

echo $ages['Mary'];

array_pop($ages);
array_shift($ages);

echo count(($ages));



(set variable) - (conditional logic) - (increment by) 
for ($i = 0; $i < 5; $i++) {
    echo $i;
};

$i = 0;
while ($i <= 10) {
    echo 'Number ' . $i . '<br />';
    $i++;
}

$number = array(12, 45, 22, 65);

$ages = array(
    "John" => 35,
    "Mary" => 27,
    "Bob" => 33
);

// Key   - Value 
foreach ($ages as $name => $age) {
    echo $name . ' is ' . $age . '<br />';
}

function greet($name, $greetting = 'How are you?')
{
    echo strtoupper($name . ' ' . $greetting);
}

greet("John");


$num1 = 101;
$num2 = 500;
if ($num1 == $num2) {
    echo "Correct";
} elseif ($num1 == 500) {
    echo "Correct";
} else {
    echo "Wrong";
}


class User
{

    public $id;
    public $username;
    public $email;
    public $password;


    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }


    public function register()
    {
        echo 'User Registered';
    }

    public function login()
    {
        $this->auth_user();
    }

    public function auth_user()
    {
        echo $this->username . ' is authenticated.';
    }

    public function __destruct()
    {
        //  echo 'Destructor Called';
    }
};

$User = new User('Chris', '1234');
$User->login();



class Post
{
    private $name;

    public function __set($name, $value)
    {
        echo 'Setting ' . $name . ' to <strong>' . $value . '</strong><br />';
        $this->name = $value;
    }

    public function __get($name)
    {
        echo 'Getting ' . $name . ' <strong>' . $this->name . '</strong><br />';
    }

    public function __isset($name)
    {
        echo 'Is ' . $name . ' set?<br />';
        return isset($this->name);
    }
}

$post = new Post;
$post->name = 'Testing';
echo $post->name;
var_dump(isset($post->name));

*/



class First
{
    public $id = 23;
    protected $name = 'John Doe';

    public function saySomething()
    {
        echo 'Something...';
    }
}

class Second extends First
{
    public function getName()
    {
        echo $this->name;
    }
}

$second = new Second;
echo $second->getName();


?>
