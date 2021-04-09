<?php ob_start(); ?>

<div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline">Ajout article</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                
                    <div class="col">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" class="form-control" value="" >
                    </div>
                    
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                        
                    </div>
                
                
                    <div class="col">
                        <label for="content">Contenu</label>
                        <textarea id="content" name="content" class="form-control" rows="5">
                            
                        </textarea>
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