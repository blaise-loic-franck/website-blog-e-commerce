<?php
 require_once('./app/autoload.php');

class Router{

    private $ctrart;
    private $ctrcat;
    private $ctrgra;
    private $ctrprod;


    public function __construct(){

        $this->ctrart = new AdminArticlesController();
        $this->ctrcat = new AdminCategoriesController();
        $this->ctrgra = new AdminGradesController();
        $this->ctrprod = new AdminProductsController();
        $this->ctruser = new AdminUsersController();
        $this->ctrpub = new PublicController();


    }
    
    public function getPath(){

        try{
        if(isset($_GET['action'])){

            switch($_GET['action']){
                case'list_art':
                    $this->ctrart->ViewList();
                break;
                case'delete_art':
                    $this->ctrart->removeArt();
                break;
                case'edit_art':
                    $this->ctrart->editArt();
                break;
                case'add_art':
                    $this->ctrart->addArt();
                break;
                case'list_cat':
                    $this->ctrcat->ViewList();
                break;
                case'delete_cat':
                    $this->ctrcat->removeCat();
                break;
                case'add_cat':
                    $this->ctrcat->addCat();
                break;
                case'list_g':
                    $this->ctrgra->ViewList();
                break;
                case'delete_g':
                    $this->ctrgra->removeG();
                break;
                case'add_g':
                    $this->ctrgra->addG();
                break;
                case'list_p':
                    $this->ctrprod->ViewList();
                break;
                case'delete_p':
                    $this->ctrprod->removeProd();
                break;
                case'edit_p':
                    $this->ctrprod->editProd();
                break;
                case'add_p':
                    $this->ctrprod->addProd();
                break;
                case'add_user':
                    $this->ctruser->addUser();
                break;
                case'edit_user':
                    $this->ctruser->editUser();
                break;
                case'list_user':
                    $this->ctruser->ViewList();
                break;
                case'login':
                    $this->ctruser->login();
                break;
                case'logout':
                    AuthController::logout();
                break;
                case'boutique':
                    $this->ctrpub->ViewProduct();
                break;
                case'contact':
                    $this->ctrpub->contact();
                break;
                case'checkout':
                    $this->ctrpub->recap();
                break;
                case 'order' :
                    $this->ctrpub ->orderCar();
                    break;
                case 'pay': 
                    $this->ctrpub->payment();
                break;
                case 'success': 
                    $this->ctrpub->success();
                    break;
                case 'cancel': 
                    $this->ctrpub->failed();
                    break;
                default:
                    throw new Exception('Action non définie');
                    
            }


            
        }else{
            $this->ctrpub->ViewArticle();


        }
    }catch(Exception $e){

        $this->page404($e->getMessage());
    
    }

    }


    public function page404($errorMsg){
        require_once('./views/notFound.php');
    }
}

?>