<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './vendor/autoload.php';

class PublicController{

    private $pum;
    private $ppm;


    public function __construct(){
    
            $this->pum = new PublicModel;
            $this->ppm = new AdminProductsModel;
            
    }

    public function ViewArticle(){

        $articles = $this->pum->getArticle();
        require_once('./Views/public/Accueil.php');
        return $articles;
    }

    public function ViewProduct($search = null){

        

        if(isset($_POST['soumis']) && !empty($_POST['search'])){
            
            $search = trim(htmlspecialchars(addslashes($_POST['search'])));
            $products = $this->pum->getProduct($search);
            require_once('./Views/Admin/Boutique.php');
            
        }else{

            $products = $this->pum->getProduct();
            require_once('./Views/Public/Boutique.php');
            
        }
    }

    public function recap(){

        if(isset($_POST['send']) ){
            $id_p = htmlspecialchars(addslashes($_POST['id']));
            $name_p = htmlspecialchars(addslashes($_POST['name']));
            $quantite = htmlspecialchars(addslashes($_POST['quantite']));
            $image = htmlspecialchars(addslashes($_POST['image']));
            $prix = htmlspecialchars(addslashes($_POST['prix']));
            require_once('./Views/Public/ProductItem.php');

        }
    }

    public function orderCar(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = addslashes(htmlspecialchars($_GET['id']));
            require_once('./Views/Public/OrderForm.php');
        }
    }

    public function payment(){

       if(isset($_POST) && !empty($_POST['email']) && !empty($_POST['quantite'])){
            \Stripe\Stripe::setApiKey('sk_test_51IMWbiGO4FFeK4h2KxUyR9qdqIFzsklDAre72AeREsEHGeuVLCDZGqbpVO2x7B14iQYCypuxAukAGBv85U9VJKYS00AaYXZE8S');

            header('Content-Type: application/json');

            $checkout_session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                'currency' => 'eur',
                'unit_amount' => $_POST['prix']*100,
                'product_data' => [
                    'name' => $_POST['name_p'],
                    'images' => ["./Assets/images/mango.jpg"],
                ],
                ],
                'quantity' => $_POST['quantite'],
            ]],
            'customer_email'=> $_POST['email'],
            'mode' => 'payment',
            'success_url' => 'http://localhost:80/php/ecf6/lcvie/index.php?action=success',
            'cancel_url' => 'http://localhost:80/php/ecf6/lcvie/index.php?action=cancel',
            ]);
            $_SESSION['pay'] = $_POST;
            echo json_encode(['id' => $checkout_session->id]);
       }
    }

    public function success() {
        $newStock = ((int)$_SESSION['pay']['nb']) - ((int)$_SESSION['pay']['quantite']);
        $product = new Products();
        $product->setIdP($_SESSION['pay']['id']);
        $product->setQuantite($newStock);

        $nbLine = $this->pum->updateStock($product);
        if($nbLine > 0 ){
           
            //Load Composer's autoloader
            $email = $_SESSION['pay']['email'];
            $name= $_SESSION['pay']['name_p'];
   
            $prix= $_SESSION['pay']['prix'];
            $message = "
            <h2>Confirmation d'achat</h2>
            <div>
             <b>Marque:  </b>".$name."  
             <b>Prix:  </b>".$prix." 
             <p>Nous vous remercions pour votre achat.</p>
            </div>";

            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'bazzyblaze@gmail.com';                     //SMTP username
                $mail->Password   = 'nqxayninioeuablt';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                // //Recipients
                $mail->setFrom('bazzyblaze@gmail.com', 'lcvie');
                $mail->addAddress("$email", 'Mr/Mme');     //Add a recipient
                // $mail->addAddress("adimicool@gmail.com", 'Nicodeme');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "Achat validé";
                $mail->Body    = "$message";
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
                require_once('./Views/Public/success.php');
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }    

            
        
    }

    public function failed() {
        require_once('./Views/Public/Cancel.php');
     }

    public function contact(){

        
        if(isset($_POST['submit']) && !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) &&  !empty($_POST['subject'])){

            $email= trim(htmlspecialchars(addslashes($_POST['email'])));
            $subject= trim(htmlentities(addslashes($_POST['subject'])));
            $message= trim(htmlentities(addslashes($_POST['message'])));
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'bazzyblaze@gmail.com';                     //SMTP username
                $mail->Password   = 'nqxayninioeuablt';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                // //Recipients
                $mail->setFrom('bazzyblaze@gmail.com', 'lcvie');
                $mail->addAddress("$email", 'Mr/Mme');     //Add a recipient
                // $mail->addAddress("adimicool@gmail.com", 'Nicodeme');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "$subject";
                $mail->Body    = "$message";
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
                require_once('./Views/Public/success.php');
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        
        
        }
        require_once('./Views/Public/Contact.php');
        
    }
    
        
}





?>