<?php
ob_start();


?>
<h1 class="display-6 text-center font-monospace text-decoration-underline"> Liste Utilisateurs</h1>

<div class="row">
    <div class="col">
       
    </div>
        <div class="text-end col mx-4">
            <a href="index.php?action=add_user" class="btn btn-warning ">
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
            <th>Email</th>
            <th>Grade</th>
            <?php if($_SESSION['auth']->id_g == 1){ ?>
            <th colspan="3" class="text-center">Action</th>
                <?php } ?>
           
        </tr>
    </thead>
   
    <tbody>
       <?php foreach($allUser as $user){ ?>
        <tr class="text-center align-middle">
            <td><?= $user->getIdU();?></td>
            <td>
            <img src="./Assets/Images/<?=$user->getImageU();?>" alt="image" width=50>
            </td>
            <td><?= $user->getLastname();?></td>
            <td><?= $user->getFirstname();?> </td>  
            <td><?= $user->getEmail();?> </td>  
             <td><?= $user->getGrade()->getNameG();?> </td> 
             <?php if($_SESSION['auth']->id_g == 1){ ?>
            <td>
            
            <a href="index.php?action=delete_user&id=<?= $user->getIdU(); ?>" class="btn btn-danger"
            onclick="return confirm('Etes vous sur de vouloir supprimer?')">
            <i class="fas fa-trash"></i></a>
            </td>
            <td>
            <a href="index.php?action=edit_user&id=<?= $user->getIdU();  ?>" class="btn btn-success">
            <i class="fas fa-edit"></i></a>
            </td>
            <td>
            <?php

                 echo ($user->getState())
                ?"<a href='index.php?action=list_user&id=".$user->getIdU()."&state=".$user->getState()."'  onclick='return confirm(`Etes-vous sur de désactiver ce compte?`)'  class='btn btn-success'> <i class='fas fa-lock'></i> Désactiver </a>"
                :"<a href='index.php?action=list_user&id=".$user->getIdU()."&state=".$user->getState()."'  onclick='return confirm(`Etes-vous sur de vouloir activer ce compte?`)' class='btn btn-danger'> <i class='fas fa-lock-open'></i> Activer</a>" 

            ?>
            </tr>
            </td>
        <?php }} ?>

        
    </tbody>
</table>
<?php
    $contenu = ob_get_clean();
    
    
    require_once('./views/templateAdmin.php');
?>
