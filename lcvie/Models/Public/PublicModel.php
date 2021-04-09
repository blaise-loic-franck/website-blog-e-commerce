<?php


class PublicModel extends Driver{

    public function getArticle(){

        $sql = "SELECT * FROM articles
                ORDER BY id_art DESC";
        $result = $this->getRequest($sql);
        
        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabArt = [];

        foreach($rows as $row){
            $art = new Articles();
            $art->setIdArt($row->id_art);
            $art->setTitleArt($row->title_art);
            $art->setImage($row->image);
            $art->setContentArt($row->content_art);
            $art->setDateCreated($row->date_created);
            
            array_push($tabArt, $art);

        }
        return $tabArt; 


    } 

    public function getProduct($search = null){

        if(!empty($search)){

            $sql = "SELECT * FROM products p
                    INNER JOIN categories c
                    ON p.id_cat = c.id_cat 
                    WHERE name_p LIKE :name_p
                    OR name_cat LIKE :name_cat
                    ORDER BY id_p ASC";

            $setting= ["name_p" => "$search%", "name_cat" => "$search%"];        
            $result = $this->getRequest($sql, $setting);

        }else{

            $sql = "SELECT * FROM products p
                    INNER JOIN categories c
                    ON p.id_cat = c.id_cat  
                    ORDER BY id_p ASC";
            $result = $this->getRequest($sql);

        }
        $rows = $result->fetchAll(PDO::FETCH_OBJ);

        $tabPro = [];

        foreach($rows as $row){
            $pro = new Products();
            $pro->setIdP($row->id_p);
            $pro->setNameP($row->name_p);
            $pro->setImageP($row->image_p);
            $pro->setPrix($row->prix);
            $pro->setQuantite($row->quantite);
            $pro->setDescription($row->description);
            $pro->getCategory()->setIdCat($row->id_cat);
            $pro->getCategory()->setNameCat($row->name_cat);
            
            array_push($tabPro, $pro);

        }
        if($result->rowCount() > 0){
            return $tabPro; 
        }else{
            return "No record ...";
        }
        


    } 

    public function updateStock(Products $product){
        $sql = "UPDATE products SET quantite = :quantite WHERE id_p = :id";
        $result = $this->getRequest($sql, ['quantite'=>$product->getQuantite(), 'id'=>$product->getIdP()]);
        return $result->rowCount();
    }
}


?>