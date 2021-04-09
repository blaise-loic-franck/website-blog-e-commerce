<?php ob_start(); ?>

<div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline">Editer article</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                
                    <div class="col">
                        <label for="title">Titre</label>
                        <input type="text" id="title" name="title" class="form-control" value="<?=$article->getTitleArt();?>" >
                    </div>
                    
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control" value="<?=$article->getImage();?>">
                        <img src="./assets/images/<?=$article->getImage();?>" alt="" width=100>
                    </div>
                
                
                    <div class="col">
                        <label for="content">Contenu</label>
                        <textarea id="content" name="content" class="form-control" rows="5"><?=$article->getContentArt();?>
                        </textarea>
                    </div>
                
                <button type="submit" class="btn btn-primary col-12 mt-2" name="submit">Editer</button>
                </div>
            </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>