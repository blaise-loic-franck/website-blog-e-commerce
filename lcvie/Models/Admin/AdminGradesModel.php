<?php

class AdminGradesModel extends Driver{

    public function getGrade(){

        $sql = "SELECT * FROM grades";
        $result = $this->getRequest($sql);
        
        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabGrade= [];

        foreach($rows as $row){
            $art = new Grades();
            $art->setIdG($row->id_g);
            $art->setNameG($row->name_g);
            
            
            array_push($tabGrade, $art);

        }
        return $tabGrade; 


    } 

    public function deleteG(Users $user){

        $sql = "UPDATE SET users state = :state
                WHERE id_u = :id";
        $result = $this->getRequest($sql, ["id" => $user->getIdU(), "state" => $user->getState()]);

        $nb = $result->rowCount();
        return $nb;


    }
       
    Public function addG($grade){

        $sql = "INSERT INTO grades (name_g)
                VALUES (:name)";
        $settings = ['name'=>$grade->getNameG()]; 
        $result = $this->getRequest($sql, $settings);

        return $result;
    }
}

?>