<?php ob_start(); ?>

<div class="container">
     <div class="row">
         <div class="col-8 offset-2">
         <h1 class="display-6 text-center font-monospace text-decoration-underline">Editer utilisateur</h1>
             <form action="<?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?=$user->getEmail();?>" >
                    </div>
                    <div class="col">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control" value="<?=$user->getImageU();?>">
                        <img src="./assets/images/<?=$user->getImageU();?>" alt="" width=100>
                    </div>
                
                    <select class="form-select" aria-label="Default select example" name="id_g">
                        <option value="<?= $user->getGrade()->getIdG();?>" selected><?= $user->getGrade()->getNameG();?></option>
                        <?php foreach($tabG as $grade){ ?>

                            <option value="<?= $grade->getIdG();?>"><?= $grade->getNameG();?></option>
                       
                        <?php } ?>
                    </select>
                    
                    
                
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