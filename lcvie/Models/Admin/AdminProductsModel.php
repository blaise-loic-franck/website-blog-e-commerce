<?php

class AdminProductsModel extends Driver{

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

    public function deletePro($id){

        $sql = "DELETE FROM products
                WHERE id_p = :id";
        $result = $this->getRequest($sql, ["id" => $id]);

        $nb = $result->rowCount();
        return $nb;


    }
    public function selectPro($id){

        $sql = "SELECT * FROM products p
                INNER JOIN categories c
                ON p.id_cat = c.id_cat
                WHERE id_p = :id";
        $result = $this->getRequest($sql, ['id'=>$id]);
        
        $row = $result->fetch(PDO::FETCH_OBJ);

        $pro = new Products();
            $pro->setIdP($row->id_p);
            $pro->setNameP($row->name_p);
            $pro->setImageP($row->image_p);
            $pro->setPrix($row->prix);
            $pro->setQuantite($row->quantite);
            $pro->setDescription($row->description);
            $pro->getCategory()->setIdCat($row->id_cat);
            $pro->getCategory()->setNameCat($row->name_cat);

        return $pro;
         

    }
    

    public function updateProd(Products $product){
        
        if($product->getImageP() === ""){

        $sql = "UPDATE `products` 
                SET `name_p`= :name_p,
                    `prix`=:prix,
                    `description`=:description,
                    `quantite`=:quantite,
                    `id_cat`= :id_cat
                Where id_p = :id_p";

                $tabSet= ["name_p"=>$product->getNameP(),
                        "prix"=>$product->getPrix(),
                        "description"=>$product->getDescription(),
                        "quantite"=>$product->getQuantite(),
                        "id_cat"=>$product->getCategory()->getIdCat(),
                        "id_p" => $product->getIdP()];
    }else{
        $sql = "UPDATE products     
                SET`name_p`= :name_p,
                    `image_p`=:image_p,
                    `prix`=:prix,
                    `description`=:description,
                    `quantite`=:quantite,
                    `id_cat`= :id_cat
                Where id_p = :id_p";
        
            $tabSet =["name_p"=>$product->getNameP(),
              "image_p"=>$product->getImageP(),
              "prix"=>$product->getPrix(),
              "description"=>$product->getDescription(),
              "quantite"=>$product->getQuantite(),
              "id_cat"=>$product->getCategory()->getIdCat(),
              "id_p" => $product->getIdP()];
        }
    $result = $this->getRequest($sql, $tabSet);
     
    return $result->rowCount();

    }


    
    Public function addProd($product){

        $sql = "INSERT INTO products (name_p, image_p, prix, description, quantite, id_cat)
                VALUES (:name_p, :image_p, :prix, :description, :quantite, :id_cat)";
        $settings = ["name_p"=>$product->getNameP(),
                    "image_p"=>$product->getImageP(),
                    "prix"=>$product->getPrix(),
                    "description"=>$product->getDescription(),
                    "quantite"=>$product->getQuantite(),
                    "id_cat"=>$product->getCategory()->getIdCat()
                    ]; 
        $result = $this->getRequest($sql, $settings);

        return $result;
    }
}

?>