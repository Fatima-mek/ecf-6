
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fastthay</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="icon" href="../assets/images/favicon.ico" />

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="../assets/js/script1.js"></script>
</head>
<body style= "background-image: url('../assets/images/fond.jpg');background-repeat: no-repeat ;background-size: cover;">
<header>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php"><img src='../assets/images/logo_fast2.png' alt="..."></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/php/fastthay_projet/index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/php/fastthay_projet/carte.php">La carte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/php/fastthay_projet/apropos.php">A propos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/php/fastthay_projet/contact.php">Contact</a>
        </li>
        <?php if(isset($_SESSION['auth'])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/php/fastthay_projet/admin/liste.php">liste</a>
          </li>
          <?php } ?>
      </ul>
    </div>
      <div class="nav-item dropdown col-1">
        <?php if(isset($_SESSION['auth'])){ ?>
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?=$_SESSION['auth']['login'];?>
          </a>
        <?php } ?>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['role']==1){ ?>
              <li><a class="dropdown-item" href="http://localhost/php/fastthay_projet/admin/inscription.php">Inscription</a></li>
              <?php } ?>
            <!--<li><a class="dropdown-item" href="index.php">Connexion</a></li>-->
            <li><a class="dropdown-item" href="http://localhost/php/fastthay_projet/admin/logout.php">Déconnexion</a></li>
          </ul>
        </div>
  </div>
</nav>

</header>