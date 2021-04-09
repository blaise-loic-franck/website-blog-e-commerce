<?php

 class Products {
    
    private $id_p;
    private $name_p;
    private $image_p;
    private $prix;
    private $description;
    private $quantite;
    private $category;

    public function __construct(){

        $this->category = new Categories();
    }


    public function getCategory()
    {
        return $this->category;
    }
    public function getQuantite()
    {
        return $this->quantite;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function getNameP()
    {
        return $this->name_p;
    }
    public function getImageP()
    {
        return $this->image_p;
    }
    public function getIdP()
    {
        return $this->id_p;
    }




    public function setCategory($category) 
    {
        $this->category = $category;

        return $this;
    }
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
    public function setImageP($image_p)
    {
        $this->image_p = $image_p;

        return $this;
    }
    public function setNameP($name_p)
    {
        $this->name_p = $name_p;

        return $this;
    }
    public function setIdP($id_p)
    {
        $this->id_p = $id_p;

        return $this;
    }
}


?>