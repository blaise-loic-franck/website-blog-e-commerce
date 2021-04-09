<?php ob_start();?>

<div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline">Ajout Produit</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                
                    <div class="col">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" class="form-control" value="" required>
                    </div>
                    <div class="col">
                        <label for="prix">Prix</label>
                        <input type="text" id="prix" name="prix" class="form-control" value="" required>
                    </div>
                    <div class="col">
                        <label for="quantite">Quantité</label>
                        <input type="text" id="quantite" name="quantite" class="form-control" value="" required >
                    </div>
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control" value="">
                        
                    </div>
                    <select class="form-select" aria-label="Default select example" name="id_cat">
                        <option  selected> Choisissez la categorie </option>
                        <?php foreach($tabCat as $cat){ ?>
                            <option value="<?= $cat->getIdCat()?>"><?= $cat->getNameCat()?></option>
                        <?php } ?>
                    </select>
                
                    <div class="col">
                        <label for="desc">Description</label>
                        <textarea id="desc" name="desc" class="form-control" rows="5" required>
                        </textarea>
                    </div>
                    
                
                <button type="submit" class="btn btn-primary col-12 mt-2" name="submit">Ajouter</button>
                </div>
            </form>
         </div>
     </div>
 </div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/templateAdmin.php');
?>