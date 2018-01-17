<?php 

 
class Task {


    public $description;
    public $title;
    public $mdate;

    
    public function simple($title){
        
                $this->title = $title;
               
            }

    public function detail($title, $description, $mdate){
        
                $this->title = $title;
                $this->description = $description;
                $this->mdate = $mdate;
            }

}



$simple = new Task();
$detail = new Task();

$simple->simple('Python step by step');
$detail->detail('Python step by step', 'book to Study python', 'dsds');

var_dump($detail);

?>
