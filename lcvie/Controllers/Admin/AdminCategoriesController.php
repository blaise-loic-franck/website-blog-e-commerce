<?php



class AdminCategoriesController{

    private $adcm;


    public function __construct(){
    
            $this->adcm = new AdminCategoriesModel;
    }

    public function ViewList(){
        AuthController::isLogged();
        

        $allList = $this->adcm->getCategorie();
        require_once('./Views/Admin/Categories/List.php');
        return $allList;
    }
    public function removeCat(){

        AuthController::isLogged();
        AuthController::accessUser();


        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
            $id = trim($_GET['id']);
            
            $nbLine= $this->adcm->deleteCat($id);

            if($nbLine > 0){
                        header('location:index.php?action=list_cat');
                    }
        }
        
    }

    

    public function addCat(){

        AuthController::isLogged();
        
        if(isset($_POST['submit']) && !empty($_POST['name'])){
            $Categorie = new Categories();

            $name_cat = trim(htmlentities(addslashes($_POST['name'])));
            
            
            $Categorie->setNameCat($name_cat);
            
        
            $ok = $this->adcm->addCat($Categorie);

            if($ok){
                header('location:index.php?action=list_cat');
            }

        }
        require_once('./Views/Admin/Categories/Add.php');
    }


}



?>