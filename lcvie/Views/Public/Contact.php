<?php ob_start(); 
?>


    <div class="container">
        <div className="d-flex justify-content-center my-3">
                        <h1 className="text-center  border border-2 border-dark p-3 mb-3">Nous contacter</h1>
                    </div>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <div class="row mt-5 bg-light p-5">
                
            <div class="mb-3">
                    <label for="email">Mail:</label>
                    <input class="form-control" type="email" name="email" placeholder="Votre email svp"/>
                
            </div>
            <div class="mb-3">
                    <label for="subject">Objet:</label>
                    <input class="form-control" id="subject"type="text" name="subject" placeholder="L'objet de votre demande"/>
                
            </div>
            <div class="mb-3">
                    <label for="message">Message :</label>
                    <textarea name="message" class="form-control mb-3" id="" cols="50" rows="5" placeholder="Ecrivez ici"></textarea>
                    <button type="submit" id="submit-send" name="submit" class="col-3">Envoyer</button>
                        
          
        </div>
    </form>  
            <iframe class="mt-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2636.9256694278088!2d2.332849415897219!3d48.63040442468582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e5d94677bf8915%3A0xb8508dc90ece67e1!2s27B%20Rue%20des%20Maisons%20Neuves%2C%2091700%20Sainte-Genevi%C3%A8ve-des-Bois!5e0!3m2!1sfr!2sfr!4v1606404226173!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style={{border:0}} allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        
        </div>
    </div>


<?php 
    $contenu = ob_get_clean();
    require_once('./Views/TemplatePublic.php');
?>