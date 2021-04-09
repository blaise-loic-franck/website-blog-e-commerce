<?php
ob_start();


?>
<h1 class="display-6 text-center font-monospace text-decoration-underline"> Liste Produits</h1>

<div class="row">
    <div class="col">
        <form action="<?php $_SERVER['PHP_SELF']?>"  method="post">
            <div class="row">
                <input  type="search" id="search" name="search" placeholder="Rechercher..."  class="offset-1 col-8 ">
                <button type="submit" name="soumis" class="btn btn-outline-secondary col-1"><i class="fas fa-search"></i></button>
                </div>
        </form>
    </div>
        <div class="text-end col mx-4">
            <a href="index.php?action=add_p" class="btn btn-warning ">
            <i class="fas fa-plus"></i> Ajouter</a>
        </div> 
</div>
<table class="table table-striped mt-5">
  
    <thead>
        <tr class="text-center bg-dark text-white">
            <th>Id</th>
            <th>Image</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Description</th>
            <th>Quantité</th>
            <th>Categorie</th>
            <th colspan="2" class="text-center">Action</th>
                
           
        </tr>
    </thead>
   
    <tbody>
       <?php foreach($allList as $list){ ?>
        <tr class="text-center align-middle">
            <td><?= $list->getIdP();?></td>
            <td>
            <img src="./Assets/Images/<?=$list->getImageP();?>" alt="image" width=50>
            </td>
            <td><?= $list->getNameP();?></td>
            <td><?= $list->getPrix();?> </td>  
            <td><?= $list->getDescription();?> </td>  
            <td><?= $list->getQuantite();?></td>
            <td><?= $list->getCategory()->getNameCat();?></td>
            <td>
            <a href="index.php?action=delete_p&id=<?= $list->getIdP(); ?>" class="btn btn-danger"
            onclick="return confirm('Etes vous sur de vouloir supprimer?')">
            <i class="fas fa-trash"></i></a>
            </td>
            <td>
            <a href="index.php?action=edit_p&id=<?= $list->getIdP();  ?>" class="btn btn-success">
            <i class="fas fa-edit"></i></a>
            </td>
            </tr>
        <?php } ?>

        
    </tbody>
</table>
<?php
    $contenu = ob_get_clean();
    
    
    require_once('./views/templateAdmin.php');
?>
