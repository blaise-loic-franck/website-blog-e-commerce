<?php


 class Grades {

    private $id_g;
    private $name_g;
    

  
    public function getIdG()
    {
        return $this->id_g;
    }
    public function getNameG()
    {
        return $this->name_g;
    }


    
   
    public function setIdG($id_g){
        $this->id_g = $id_g;

        return $this;
    }
    public function setNameG($name_g) 
    {
        $this->name_g = $name_g;

        return $this;
    }
}


?>