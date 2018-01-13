## PHP OOP  ##
==============

---------------------------
 # Constructor and destructor
---------------------------

<?php

 class Persone {
  
    $id;
    
    public function __construct($persion_id){
       $this->id = $persion_id
    }
  
    public function __destruct(){
       unset($this->id);
    }
  
    public function setId($id){
      $this->id = $id
    }
    
 }

 $new_person_obj = new Person(1);
 $new_person_obj->setId(2);

?>

