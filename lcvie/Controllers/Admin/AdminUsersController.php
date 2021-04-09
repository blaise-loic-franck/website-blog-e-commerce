<?php



class AdminUsersController{

    private $adum;
    private $adgm;


    public function __construct(){
    
            $this->adum = new AdminUsersModel;
            $this->adgm = new AdminGradesModel;
    }

    public function ViewList(){
        AuthController::isLogged();

        if(isset($_GET['id']) && isset($_GET['state']) && !empty($_GET['id'])){
            $id= trim($_GET['id']);
            $state = $_GET['state'];
            $user = new Users();

            if($state == 1){
                $state = 0;
            }else{
                $state = 1;
            }

            $user->setIdU($id);
            $user->setState($state);

            $this->adum->updateState($user);
        }

        
        $allUser = $this->adum->getUser();
        require_once('./Views/Admin/User/List.php');
        return $allUser;
    }
    public function removeUser(){
        AuthController::isLogged();
        AuthController::accessUser();

        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
            $id = trim($_GET['id']);
            
            $nbLine= $this->adum->deleteUser($id);

            if($nbLine > 0){
                        header('location:index.php?action=list_user');
                    }
        }
        
    }

    Public function editUser(){
        AuthController::isLogged();
        AuthController::accessUser();
       
        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
            
            $id = trim($_GET['id']);
            $user = $this->adum->selectUser($id);


            if(isset($_POST['submit']) && !empty($_POST['email']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){

                $email = trim(htmlentities(addslashes($_POST['email'])));
                $id_g = trim(htmlentities(($_POST['id_g'])));
                $image_u = $_FILES['image']['name'];
                    
                    $user->setEmail($email);
                    $user->getGrade()->setIdG($id_g);
                    $user->setImageU($image_u);

                    $destination = "./Assets/Images/";
                    move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image_u);

                    $ok = $this->adum->updateUser($user); 

               
                    header('location:index.php?action=list_user');
                

            }
            $tabG = $this->adgm->getGrade();
            require_once('./Views/Admin/User/Edit.php');
        }
    }

    public function addUser(){
        AuthController::isLogged();
        AuthController::accessUser();

        
        if(isset($_POST['submit']) && !empty($_POST['lastname']) && !empty($_POST['email']) && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $user = new Users();

            $lastname = trim(htmlentities(addslashes($_POST['lastname'])));
            $firstname = trim(htmlentities(addslashes($_POST["firstname"])));
            $pass = md5(trim(htmlentities(addslashes($_POST["pass"]))));
            $email = trim(htmlentities(addslashes($_POST["email"])));
            $image_u = $_FILES['image']['name'];
            $id_g = trim(htmlentities(addslashes($_POST["id_g"])));
            
            
            $user->setLastname($lastname);
            $user->setFirstname($firstname);
            $user->setPass($pass);
            $user->setEmail($email);
            $user->setState(1);
            $user->setImageU($image_u);
            $user->getGrade()->setIdG($id_g);
            
            

            $destination = "./Assets/Images/";
            move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image_u);
            
            $ok = $this->adum->addUser($user);

            if($ok){
                header('location:index.php?action=list_user');
            }

        }
        $tabG = $this->adgm->getGrade();
        require_once('./Views/Admin/User/Add.php');
    }

    public function login(){
       

        if(isset($_POST['submit'])){
            if(!empty($_POST['email']) && strlen($_POST['pass']) >= 4 ){

                $email = trim(htmlentities(addslashes($_POST['email'])));
                $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
                $data_u = $this->adum->signIn($email, $pass);
                if(!empty($data_u)){
                    if($data_u->state > 0){
                        session_start();
                        $_SESSION['auth'] = $data_u;
                        header('location:index.php?action=list_art');
                    }else{
                        $error = "Erreur de connexion";
                    }
                }else{
                    $error="Votre login/email  et/ou mot de passe ne correspond pas";
                }
            }else{
                $error = "Veuillez écrire dans tous les champs et entrer un mot de passe avec au mois 4 caractère";
            }
        }

        require_once('./Views/Admin/User/Login.php');
    }

}



?>