<?php

 class Articles{

    private $id_art;
    private $title_art;
    private $image;
    private $content_art;
    private $date_created;



    public function getIdArt()
    {
        return $this->id_art;
    }
    public function getTitleArt()
    {
        return $this->title_art;
    }
    public function getContentArt()
    {
        return $this->content_art;
    }
    public function getDateCreated()
    {
        return $this->date_created;
    }
    public function getImage()
    {
        return $this->image;
    }


    

    public function setDateCreated($date_created) 
    {
        $this->date_created = $date_created;

        return $this;
    }
    public function setContentArt($content_art) 
    {
        $this->content_art = $content_art;

        return $this;
    }
    public function setTitleArt($title_art) 
    {
        $this->title_art = $title_art;

        return $this;
    }
    public function setIdArt($id_art) 
    {
        $this->id_art = $id_art;

        return $this;
    }
    public function setImage($image) 
    {
        $this->image = $image;

        return $this;
    }
 
}








?>