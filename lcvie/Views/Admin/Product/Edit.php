<?php ob_start(); ?>

<div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline">Editer article</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                
                    <div class="col">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?=$product->getNameP();?>" >
                    </div>
                    <div class="col">
                        <label for="prix">prix</label>
                        <input type="text" id="prix" name="prix" class="form-control" value="<?=$product->getPrix();?>" >
                    </div>
                    <div class="col">
                        <label for="quantite">Quantité</label>
                        <input type="text" id="quantite" name="quantite" class="form-control" value="<?=$product->getQuantite();?>" >
                    </div>
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control" value="<?=$product->getImageP();?>">
                        <img src="./assets/images/<?=$product->getImageP();?>" alt="" width=100>
                    </div>
                
                    <select class="form-select" aria-label="Default select example" name="id_cat">
                        <option value="<?= $user->getGrade()->getIdG();?>" selected><?= $user->getGradw()->getNameG();?></option>
                        <?php foreach($tabCat as $cat){ ?>

                            <option value="<?= $cat->getIdCat();?>"><?= $cat->getNameCat();?></option>
                       
                        <?php } ?>
                    </select>

                    <div class="col">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="5"><?=$product->getDescription();?>
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