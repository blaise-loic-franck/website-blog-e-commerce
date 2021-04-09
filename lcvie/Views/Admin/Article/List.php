<?php
ob_start();


?>
               <h1 class="display-6 text-center font-monospace text-decoration-underline"> List Articles</h1>

<table class="table table-striped mt-5">
<div class="text-end">
        <a href="index.php?action=add_art" class="btn btn-warning ">
        <i class="fas fa-plus"></i> Ajouter</a>
</div>   
    <thead>
        <tr class="text-center bg-dark text-white">
            <th>Id</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Image</th>
            <th>Date_creation</th>
            <th colspan="2" class="text-center">Action</th>
                
           
        </tr>
    </thead>
   
    <tbody>
       <?php foreach($allList as $list){ ?>
        <tr class="text-center align-middle">
            <td><?= $list->getIdArt();?></td>
            <td><?= $list->getTitleArt();?></td>
            <td>
           <!-- <?php 

               // $comment = $list->getContentArt();
                // $comment = substr($comment, 0, 50);
                // $dernier_mot = strrpos($comment," ");
                // $comment = substr($comment,0,$dernier_mot);
            ?> -->

<!-- <                p class=" " id="midContent<?=$list->getContentArt()?>"><?=$comment."...  "?></p>   -->
                <p  class=" d-none" id="fullContent"><?=$list->getContentArt()?></p> 
           
             <!-- <a class="btn"  id="content-modif" >
             <i class="fas fa-angle-double-down"></i> 
             Lire la suite
             </a> -->
             <!-- href="index.php?action=list_art&id=<?= $list->getIdArt();?>" -->
              
                            </td>
            <td>
            <img src="./Assets/Images/<?= $list->getImage();?>" alt="image" width=50></td>   
            
            <td><?= $list->getDateCreated();?></td>
            <td>
            <a href="index.php?action=delete_art&id=" class="btn btn-danger"
            onclick="return confirm('Etes vous sur de vouloir supprimer?')">
            <i class="fas fa-trash"></i></a>
            </td>
            <td>
            <a href="index.php?action=edit_art&id=<?=$list->getIdArt()?>" class="btn btn-success">
            <i class="fas fa-edit"></i></a>
            </td>
            
        <?php } ?>

        </tr>
    </tbody>
</table>
<?php
    $contenu = ob_get_clean();
    
    require_once("./Views/TemplateAdmin.php");
?>
