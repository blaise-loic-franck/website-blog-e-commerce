<?php ob_start(); ?>

<div class="container">

     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline"> Ajout Grades</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                
                    <div class="col">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" class="form-control" value="" >
                    </div>
                
                <button type="submit" class="btn btn-primary col-12 mt-2" name="submit">Insérer</button>
                </div>
            </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>