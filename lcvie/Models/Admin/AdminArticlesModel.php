<?php

class AdminArticlesModel extends Driver{

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

    public function deleteArt($id){

        $sql = "DELETE FROM articles
                WHERE id_Art = :id";
        $result = $this->getRequest($sql, ["id" => $id]);

        $nb = $result->rowCount();
        return $nb;


    }
    public function selectArt($id){

        $sql = "SELECT * FROM articles
                WHERE id_art = :id";
        $result = $this->getRequest($sql, ['id'=>$id]);
        
        $row = $result->fetch(PDO::FETCH_OBJ);

        $art = new Articles();
            $art->setIdArt($row->id_art);
            $art->setTitleArt($row->title_art);
            $art->setImage($row->image);
            $art->setContentArt($row->content_art);
            $art->setDateCreated($row->date_created);

        return $art;
         

    }
    

    public function updateArticle(Articles $article){
        if($article->getImage() === ""){
        $sql = "UPDATE articles 
                SET id_art = :id,
                    title_art = :title,

                    content_art = :content
                Where id_art = :id";

    $tabSet =[  "id"=>$article->getIdArt(),
                "title"=>$article->getTitleArt(),
                
                "content"=>$article->getcontentArt(),
                "id"=>$article->getIdArt()];
        }else{
            $sql = "UPDATE articles 
            SET id_art = :id,
                title_art = :title,
                image = :image,
                content_art = :content
            Where id_art = :id";

$tabSet = ["id"=>$article->getIdArt(),
            "title"=>$article->getTitleArt(),
            "image"=>$article->getImage(),
            "content"=>$article->getcontentArt(),
            "id"=>$article->getIdArt()];
        }
$result = $this->getRequest($sql,$tabSet);
     
    return $result;

    }


    
    Public function addArticle($article){

        $sql = "INSERT INTO articles (title_art, image, content_art)
                VALUES (:title, :image, :content)";
        $settings = ['title'=>$article->getTitleArt(),
                     'image'=>$article->getImage(),
                     'content'=>$article->getContentArt()]; 
        $result = $this->getRequest($sql, $settings);

        return $result;
    }
}

?>