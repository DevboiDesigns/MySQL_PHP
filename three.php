<?php

class Three {
  // can not override 'final' (if extended)
  final public function sayHello() {
    echo "Hello World Three";
  }
}

?>