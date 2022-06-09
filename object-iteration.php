<?php


class People {
  public $person1 = 'Mike';
  public $person2 = 'Shelly';
  public $person3 = 'Jeff';


  // Iteration from outside of class can not acces these 
  protected $person4 = 'John';
  private $person5 = 'Jen';

  // function iterateObject() {
  //   foreach($this as $key => $value) {
  //     print "$key => $value\n"; // \n line break
  //   }
  // }
}


$people = new People;
// $people->iterateObject(); PRINTS = person1 => Mike person2 => Shelly person3 => Jeff person4 => John person5 => Jen


foreach($people as $key => $value) {
  print "$key => $value\n"; // person1 => Mike person2 => Shelly person3 => Jeff
}

?>