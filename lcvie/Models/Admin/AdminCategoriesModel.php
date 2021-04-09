<?php

class AdminCategoriesModel extends Driver{

    public function getCategorie(){

        $sql = "SELECT * FROM categories
                ORDER BY id_cat DESC";
        $result = $this->getRequest($sql);
        
        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabCat = [];

        foreach($rows as $row){
            $art = new Categories();
            $art->setIdCat($row->id_cat);
            $art->setNameCat($row->name_cat);
            
            
            array_push($tabCat, $art);

        }
        return $tabCat; 


    } 

    public function deleteCat($id){

        $sql = "DELETE FROM categories
                WHERE id_cat = :id";
        $result = $this->getRequest($sql, ["id" => $id]);

        $nb = $result->rowCount();
        return $nb;


    }
       
    Public function addCat($categorie){

        $sql = "INSERT INTO categories (name_cat)
                VALUES (:name)";
        $settings = ['name'=>$categorie->getNameCat()]; 
        $result = $this->getRequest($sql, $settings);

        return $result;
    }
}

?>