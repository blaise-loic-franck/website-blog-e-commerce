<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./assets/css/Sidebar.css">
<link rel="stylesheet" href="./assets/css/User.css">
<link rel="stylesheet" href="./assets/css/Index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>
<body>

<div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
  <ul class="nav flex-column text-white w-100">
  <?php if(isset($_SESSION['auth'])){ ?>
    <a href="index.php?action=logout" class="nav-link h3 text-white my-2">
      Déconnexion
    </a>
    
    <li  class="nav-link">
      <a href="index.php?action=list_art" class="text-white">
         <strong class="mx-2 fs-5">Articles</strong>
      </a>
    </li>
    <?php if($_SESSION['auth']->id_g == 1){ ?>
    <li  class="nav-link">
      <a href="index.php?action=list_cat" class="text-white ">
         <strong class="mx-2 fs-5">Categories</strong>
      </a>
    </li>
    <li  class="nav-link">
      <a href="index.php?action=list_g" class="text-white ">
         <strong class="mx-2 fs-5">Grades</strong>
      </a>
    </li>

    <?php }?>

    <li  class="nav-link">
      <a href="index.php?action=list_p" class="text-white ">
         <strong class="mx-2 fs-5">Produits</strong>
      </a>
    </li>
    <li  class="nav-link">
      <a href="index.php?action=list_user" class="text-white ">
         <strong class="mx-2 fs-5">Utilisateurs</strong>
      </a>
    </li>
  <?php }?>
    
  
  </ul>
</div>

<div class="p-1 my-container active-cont">

<div class="main ">
    
    <div class="row bg-secondary">
    <h1 class=" offset-3 col text-center text-white">ADMINISTRATION</h1>
    <?php if(isset($_SESSION['auth'])){ ?>
  <h4 class="text-end col-4 text-white my-2 ">Bonjour, <?= $_SESSION['auth']->firstname?></h4>
  <?php } ?>
    </div>
    <a class="btn border-0" id="menu-btn">
      <i class="fas fa-bars"></i>
    </a>
    <?= $contenu ?>
</div>
  
</div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./Assets/js/scriptSidebar.js"></script>
<script src="./Assets/js/scriptUser.js"></script>
<script src="./Assets/js/scriptArticle.js"></script>


</body>
</html> 