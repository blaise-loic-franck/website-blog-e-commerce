<?php



class AdminGradesController{

    private $adgm;


    public function __construct(){
    
            $this->adgm = new AdminGradesModel;
    }

    public function ViewList(){

        AuthController::isLogged();
        AuthController::accessUser();


        $allList = $this->adgm->getGrade();
        require_once('./Views/Admin/Grade/List.php');
        return $allList;
    }
    public function removeG(){
        AuthController::isLogged();
        AuthController::accessUser();

        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
            $id = trim($_GET['id']);
            
            $nbLine= $this->adgm->deleteG($id);

            if($nbLine > 0){
                        header('location:index.php?action=list_g');
                    }
        }
        
    }

    

    public function addG(){

        AuthController::isLogged();
        AuthController::accessUser();
        
        if(isset($_POST['submit']) && !empty($_POST['name'])){
            $grade = new Grades();

            $name_g = trim(htmlentities(addslashes($_POST['name'])));
            
            
            $grade->setNameG($name_g);
            
        
            $ok = $this->adgm->addG($grade);

            if($ok){
                header('location:index.php?action=list_g');
            }

        }
        require_once('./Views/Admin/Grade/Add.php');
    }


}



?>