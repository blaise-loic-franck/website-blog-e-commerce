<?php ob_start(); ?>

<div class="container" id="home">
    
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./Assets/images/ensemble2.png" height="400px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none text-dark d-md-block">
        <h5>Actualité 1</h5>
        <p>Notre nouvelle collaboration</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./Assets/images/zxvc.png" height="400px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none text-dark d-md-block">
        <h5>Actualité 2</h5>
        <p>Notre nouvelle collection</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./Assets/images/1.jpg" height="400px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none text-dark  d-md-block">
        <h5>Actualité 3</h5>
        <p>Le meilleur site</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
          
                <h1 class="my-5 text-center">Qui nous sommes?</h1>
                    <?php foreach($articles as $article){ ?>
                    
                        
                            <div class="card mb-3" id="card-accueil">
                                <div class="row g-0">
                                    <div class="col-4">
                                    <img src="./Assets/images/<?= $article->getImage();?>" class="mt-5"  width="310" alt="image">
                                    </div>
                                    <div class="col-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-center mb-3"><?= $article->getTitleArt();?></h5>
                                        <p class="card-text"><?= $article->getContentArt();?></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    
                    <?php } ?>
         
             
  
                    
        
 
<?php 
    $contenu = ob_get_clean();
    require_once('./Views/TemplatePublic.php');
?>