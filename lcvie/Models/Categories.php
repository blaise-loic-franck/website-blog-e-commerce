<?php 

 class Categories {

    private $id_cat;
    private $name_cat;

   


    
    public function getNameCat()
    {
        return $this->name_cat;
    }
    public function getIdCat()
    {
        return $this->id_cat;
    }
  



    public function setNameCat($name_cat) 
    {
        $this->name_cat = $name_cat;

        return $this;
    }
    public function setIdCat($id_cat)
    {
        $this->id_cat = $id_cat;

        return $this;
    }
}


?>