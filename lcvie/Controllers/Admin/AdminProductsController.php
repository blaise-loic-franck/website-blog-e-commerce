<?php



class AdminProductsController{

    private $adpm;
    private $adcm;


    public function __construct(){
    
            $this->adpm = new AdminProductsModel;
            $this->adcm = new AdminCategoriesModel;

    }

    public function ViewList(){

        AuthController::isLogged();

        if(isset($_POST['soumis']) && !empty($_POST['search'])){
            
            $search = trim(htmlspecialchars(addslashes($_POST['search'])));
            $allList = $this->adpm->getProduct($search);
            require_once('./Views/Admin/Product/List.php');
            
        }else{

            $allList = $this->adpm->getProduct();
            require_once('./Views/Admin/Product/List.php');
            
        }
    }
    public function removeProd(){
        AuthController::isLogged();
        AuthController::accessUser();

        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
            $id = trim($_GET['id']);
            
            $nbLine= $this->adpm->deletePro($id);

            if($nbLine > 0){
                        header('location:index.php?action=list_p');
                    }
        }
        
    }

    Public function editProd(){

        AuthController::isLogged();
       
        if(isset($_GET['id']) && $_GET['id'] < 1000 && filter_var($_GET['id'],FILTER_VALIDATE_INT)){
            
            $id = trim($_GET['id']);
            $product = $this->adpm->selectPro($id);


            if(isset($_POST['submit']) && !empty($_POST['name'])){
                 
                $name_p = trim(htmlentities(addslashes($_POST['name'])));
                $prix = trim(htmlentities(addslashes($_POST['prix'])));
                
                $description = trim(htmlentities(addslashes($_POST['description'])));
                $quantite = trim(htmlentities(addslashes($_POST['quantite'])));
                $id_cat = trim(htmlentities(addslashes($_POST['id_cat'])));
                $image_p = $_FILES['image']['name'];
                
                $product->setIdP($id);
                $product->setNameP($name_p);
                $product->setImageP($image_p);
                $product->setPrix($prix);
                $product->setQuantite($quantite);
                $product->setDescription($description);
                $product->getCategory()->setIdCat($id_cat);

                $destination = "./Assets/Images/";
                move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image_p);

                $ok = $this->adpm->updateProd($product); 

               
                    header('location:index.php?action=list_p');
                

            }
            $tabCat = $this->adcm->getCategorie();
            require_once('./Views/Admin/product/Edit.php');
        }
    }

    public function addProd(){
        AuthController::isLogged();

        
        if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['desc'])){
            $product = new Products();

                $name_p = trim(htmlentities(addslashes($_POST['name'])));
                $prix = trim(htmlentities(addslashes($_POST['prix'])));
                $image_p = $_FILES['image']['name'];
                $description = trim(htmlentities(addslashes($_POST['desc'])));
                $quantite = trim(htmlentities(addslashes($_POST['quantite'])));
                $id_cat = trim(htmlentities(addslashes($_POST['id_cat'])));
                
                $product->setNameP($name_p);
                $product->setImageP($image_p);
                $product->setPrix($prix);
                $product->setQuantite($quantite);
                $product->setDescription($description);
                $product->getCategory()->setIdCat($id_cat);

                $destination = "./Assets/Images/";
                move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image_p);

           
            $ok = $this->adpm->addProd($product);

            if($ok){
                header('location:index.php?action=list_p');
            }

        }
        $tabCat = $this->adcm->getCategorie();
        require_once('./Views/Admin/Product/Add.php');
    }


}



?>