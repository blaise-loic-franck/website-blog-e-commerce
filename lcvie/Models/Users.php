<?php

class Users {

    private $id_u;
    private $lastname;
    private $firstname;
    private $pass;
    private $email;
    private $image_u;
    private $grades;
    private $state;
    
    public function __construct(){

        $this->grades = new Grades();
    }



    public function getGrade()
    {
        return $this->grades;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function getIdU()
    {
        return $this->id_u;
    }
    public function getImageU()
    {
        return $this->image_u;
    }
    public function getState()
    {
        return $this->state;
    }

    
    public function setGrade($grades)
    {
        $this->grades = $grades;

        return $this;
    }
    public function setEmail($email) 
    {
        $this->email = $email;

        return $this;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }
    public function setIdU($id_u) 
    {
        $this->id_u = $id_u;

        return $this;
    }
    public function setImageU($image_u) 
    {
        $this->image_u = $image_u;

        return $this;
    }
    public function setState($state) 
    {
        $this->state = $state;

        return $this;
    }

    
    
}



?>