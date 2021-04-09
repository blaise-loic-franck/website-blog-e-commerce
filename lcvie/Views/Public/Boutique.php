<?php ob_start(); ?>

<div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./assets/images/mango.jpg" class="d-block w-100 " style="height:400px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/mango.jpg" class="d-block w-100" style="height:400px" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/new york.png" class="d-block w-100" style="height:400px" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
          </div>
          <!---end carrousel-->
          <div class="row my-3">
              <div class="col-8">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach($products as $product){ ?>
                    <div class="col">
                      <div class="card">
                        <img src="./assets/images/<?=$product->getImageP();?>" class="card-img-top" height="300" alt="...">
                        <div class="card-body">
                          <h5 class="bg-secondary text-center text-white card-title"> <?=$product->getNameP();?></h5>
                          <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Description : <?=$product->getDescription();?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                             Prix: <?=$product->getPrix();?> €
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              Quantité: <?=$product->getQuantite();?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                              
                            <form action="index.php?action=checkout" method="POST">
                                <input type="hidden" name="id"  value="<?=$product->getIdP();?>">
                                <input type="hidden" name="name"  value="<?=$product->getNameP();?>">
                                <input type="hidden" name="image" value="<?=$product->getImageP();?>">
                                <input type="hidden" name="quantite" value="<?=$product->getQuantite();?>">
                                <input type="hidden" name="prix" value="<?=$product->getPrix();?>">
                                <?php if($product->getQuantite() > 0){ ?>
                                  <button type="submit" class="btn btn-success" name="send">Acheter</button>
                                <?php } ?>
                              </form>
                              <strong class="badge rounded-pill">
                                <?php if($product->getQuantite() == 0){ ?>
                                <a href="index.php?action=order&id=<?=$product->getIdP();?>" class="btn btn-warning text-white">
                                   Commander
                                </a>
                                <?php } ?>
                              </strong>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
         
              </div>
            </div>
              <!--end cards-->
              <!-- <div class="col-4">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="input-group">
                        <input class="form-control text-center" type="search" name="search" id="search" placeholder="Rechecher...">
                        <button type="submit" class="btn btn-outline-secondary" name="soumis"><i class="fas fa-search"></i></button>
                     </form>
                <div class="card mt-1">
                    <ul class="list-group list-group-flush">
                      <?php foreach($tabCat as $cat ){ ?>
                      <li class="list-group-item text-center">
                        <a class="btn text-center" href="index.php?id=<?=$cat->getId_cat();?>"><?=ucfirst($cat->getNom_cat());?></a>
                      </li>
                     <?php } ?>
                    </ul>
                </div> 
              </div> -->
          
    </div>
 
<?php 
    $contenu = ob_get_clean();
    require_once('./Views/TemplatePublic.php');
?>