<?php ob_start(); ?>

<div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline">Login</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Entrez l'email'" required>
                    </div>
                    <div class="col ">
                        
                        <label for="pass">Mot de passe</label>
                        <div class="input-group mb-3">
                            <input type="password" id="password" name="pass" class="form-control " placeholder="Entrez le mot de passe" required>
                                <button type="button" id="fa-eye" class="btn btn-light input-group-text"><i  class="far fa-eye"></i>
                                </button>
                        </div>
                <button type="submit" class="btn btn-primary col-12 mt-2" name="submit">Soumettre</button>
                </div>
            </form>
         </div>
     </div>
 </div>
 
<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>