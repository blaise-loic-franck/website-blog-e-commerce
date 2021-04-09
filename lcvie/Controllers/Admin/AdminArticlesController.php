<?php


class AdminArticlesController{

    private $adam;


    public function __construct(){
    
            $this->adam = new AdminArticlesModel;
    }

    public function ViewList(){

        AuthController::isLogged();
        

        $allList = $this->adam->getArticle();
        require_once('./Views/Admin/Article/List.php');
        return $allList;
    }
    public function removeArt(){

        AuthController::isLogged();

        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
            $id = trim($_GET['id']);
            
            $nbLine= $this->adam->deleteArt($id);

            if($nbLine > 0){
                        header('location:index.php?action=list_art');
                    }
        }
        
    }

    Public function editArt(){
       
        AuthController::isLogged();
        

        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
            
            $id = trim($_GET['id']);
            $article = $this->adam->selectArt($id);


            if(isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content'])){

                $title_art = trim(htmlentities(addslashes($_POST['title'])));
                $content_art = trim(htmlentities(($_POST['content'])));
                $image = $_FILES['image']['name'];
                    
                    $article->setTitleArt($title_art);
                    $article->setContentArt($content_art);
                    $article->setImage($image);

                    $destination = "./Assets/Images/";
                    move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);

                    $ok = $this->adam->updateArticle($article); 

               
                    header('location:index.php?action=list_art');
                

            }
            require_once('./Views/Admin/Article/Edit.php');
        }
    }

    public function addArt(){

        AuthController::isLogged();

        
        if(isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['content'])){
            $article = new Articles();

            $title_art = trim(htmlentities(addslashes($_POST['title'])));
            $image = $_FILES['image']['name'];
            $content_art = trim(htmlentities(addslashes($_POST["content"])));
            
            
            $article->setTitleArt($title_art);
            $article->setImage($image);
            $article->setContentArt($content_art);

            $destination = "./Assets/Images/";
            move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);
            
            $ok = $this->adam->addArticle($article);

            if($ok){
                header('location:index.php?action=list_art');
            }

        }
        require_once('./Views/Admin/Article/Add.php');
    }

   
}



?>