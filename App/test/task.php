<?php

//class
class Task{
    //propriety with string hardcoded
   // public $description = 'Go to the store';

   public $description;

    //method - with __construct will fire out auto
    public function __construct($description)
    {
        //var_dump($description);

        //this means asign $des...to descr in this class 
        $this->description = $description;
    }

}


    //instance
$task = new Task('Learn OOP');
var_dump($task->description);

?>