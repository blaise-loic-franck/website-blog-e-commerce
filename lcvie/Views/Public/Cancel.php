  
<?php ob_start();?>

<div class="container">
<h2>Echec au cours de paiement</h2>
<p>Vérifiez votre coordonnées bancaires!</p>
<a href="index.php?action=boutique" class="btn-warning">Boutique</a>
</div>
<?php 
    $contenu = ob_get_clean();
    require_once('./views/TemplatePublic.php');
?>