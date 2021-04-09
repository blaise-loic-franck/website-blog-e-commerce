<?php
ob_start();


?>
   
   <h1 class="display-6 text-center font-monospace text-decoration-underline"> Liste Grades</h1>
<div class="text-end">
    <a href="index.php?action=add_g" class="btn btn-warning ">
    <i class="fas fa-plus"></i> Ajouter</a>
</div>
<table class="table table-striped mt-5">
    <thead>
        <tr class="text-center bg-dark text-white">
            <th>Id</th>
            <th>Nom</th>
            <th>Action</th>
        </tr>
    </thead>
   
    <tbody>
       <?php foreach($allList as $list){ ?>
        <tr class="text-center align-middle">
            <td><?= $list->getIdG();?></td>
            <td><?= $list->getNameG();?></td>
           
           
            <td>
            <a href="index.php?action=delete_g&id=<?=$list->getIdG()?>" class="btn btn-danger"
            onclick="return confirm('Etes vous sur de vouloir supprimer?')">
            <i class="fas fa-trash"></i></a>
            </td>
            

           
            
        <?php } ?>

        </tr>
    </tbody>
</table>
<?php
    $contenu = ob_get_clean();
    
    require_once("./Views/TemplateAdmin.php");
?>
