<?php ob_start();?>

<div class="container">
<h2>Page d'erreur</h2>
<div class="alert alert-danger">
    La page que vous chercher n'existe pas  
</div>
</div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/TemplatePublic.php');
?>