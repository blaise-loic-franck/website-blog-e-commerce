<?php ob_start(); ?>

<div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline">Ajouter utilisateur</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                    <div class="row">
                        <div class="col">
                            <label for="lastname">Nom</label>
                            <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Entrez le nom" value="" required >
                        </div>
                        <div class="col">
                            <label for="firstname">Prénom</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Entrez le prénom"  value="" required >
                        </div>
                    </div>
                    <div class="col">
                            <label for="pass">Mot de passe</label>
                            <input type="text" id="pass" name="pass" class="form-control" placeholder="Entrez le mot de passe" required >
                    </div>
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="" required >
                    </div>
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control" value="" required>
                    </div>
                
                    <select class="form-select" aria-label="Default select example" name="id_g" required>
                        <option value="" selected>Choisir le grade</option>
                        <?php foreach($tabG as $grade){ ?>

                            <option value="<?= $grade->getIdG();?>"><?= $grade->getNameG();?></option>
                       
                        <?php } ?>
                    </select>
                    <td>
     
           
                    </td>
                    
                
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