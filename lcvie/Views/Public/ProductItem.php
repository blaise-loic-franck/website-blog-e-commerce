<?php ob_start();?>

<div class="container">
  <h2 class="text-white text-center bg-success">Ma commande</h2>
<div class="row">
  <div class="col-8">
    <div class="card mb-3" >
      <div class="row g-0">
        <div class="col-md-8">
          <img src="./assets/images/<?=$image;?>" alt="..." width="200" >
        </div>
        <div class="col-md-3">
          <div class="card-body">
            <h5 class="card-title"><?=$name_p;?></h5>
            <p class="card-text text-danger">Prix: <?=$prix;?> €</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-3">
  <h4 class="text-center">Validation</h4>
    <form>
      <label for="email">Email*</label>
      <input type="email"id="email" class="form-control" placeholder="Votre email svp...">
      <label for="quant">Quantite*</label>
      <input type="number" id="quant" class="form-control" min="1" value="1" max="<?=$quantite;?>">
      <input type="hidden" id="ref" value="<?=$id_p;?>">
      <input type="hidden" id="name_p" value="<?=$name_p;?>">
      <input type="hidden" id="prix" value="<?=$prix;?>">
      <input type="hidden" id="quantite" value="<?=$quantite;?>">

      <button id="checkout-button" class="btn btn-success col-12 mt-2">
      <i class="fab fa-cc-visa"></i> Valider
      </button>
    </form>
  </div>
</div>
</div>
<?php 
    $contenu = ob_get_clean();
    require_once('./Views/TemplatePublic.php');
?>