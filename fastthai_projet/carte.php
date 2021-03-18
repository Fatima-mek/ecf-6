<?php
session_start();

require_once('connect.php');

$sql = "SELECT * FROM plat p
        INNER JOIN category c
        ON p.id_type = c.id_category";

$result = mysqli_query($connexion, $sql);


function trDate($date){
    $dateArray = (explode("-",substr(($date),0,10)));
    $dateIns = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
    return $dateIns;
}
?>
<?php require_once('partials/header1.inc');?>

<div class="container" >

<div class="bg-light p-5" id="haut">

    <div class="container text-center">
        <h1 id='titre' class="display-1  text-warning text-bolder">FASTTHAI</h1>
        <p class="lead  "> Venez degustez nos plats, préparés par des cuisiniers venus tout droit de Thailand <img
                src="assets/images/cuisinier.jpg" alt='' width='200'></img></p>

    </div>


    <div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
            <?php while($rows = mysqli_fetch_assoc($result)){ ?>
            <div class="col">
                <div class="card bg bg-dark text-white" style= "background-image: url('assets/images/fond.jpg');background-repeat: no-repeat ;background-size: cover;">
                    <img src="assets/images/<?=$rows['image'];?>" class="card-img-top" alt="..." height="300">
                    <div class="card-body">
                        <h5 class="card-title text-center">Plat 00<?=$rows['id_plat'];?>
                        </h5>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center h2 bg bg-dark text-white"> <strong>
                                    <?=$rows['nom_plat'];?>
                                </strong></li>
                            <li class="list-group-item text-dark bg bg-warning text-center "><strong>
                                    <?=$rows['prix'];?> €
                                </strong> </li>
                        </ul>
                        <hr>
                        <p class="card-text">
                            <?=$rows['description'];?>
                        </p>
                        <i class="list-group-item text-dark text-right">crée le :
                            <?=trDate($rows['created']);?>
                        </i>

                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class='container col-6 offset-3 mt-5 mb-5'>
    <div class="card bg bg-dark ">
        <h5 class="card-header text-warning text-center">SUPPLEMENT(S)</h5>
        <div class="card-body text-white">
            <p>Boeuf, poulet, crevettes</p>
            <p>Riz, nouilles, vermicelles, légumes</p>
            <p>Ciboulette, menthe, coriandre, basilic, citron vert, cacahuetes, oignons frits</p>

        </div>
    </div>
</div>

<div>
    <div class='container mb-5'>
        <div class="row">
            <div class="col-sm-6">
                <div class="card text-white">
                    <div class="card-body bg bg-dark ">
                        <h5 class="card-title text-warning text-center">DESSERTS</h5>
                        <ul>
                            <li>Perles de coco</li>
                            <li>Mousse au chocolat</li>
                            <li>Tarte coco & coulis de framboise</li>
                            <li>Tarte Chocolat</li>
                            <li>Perle de tapioca banane</li>
                            <li>Perle de tapioca mangue</li>
                            <li>Riz gluant mangue</li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body bg bg-dark">
                        <h5 class="card-title text-warning text-center">BOISSONS</h5>
                        <div class="row">
                            <div class='col-4 text-white'>
                                <h6 class="card-text text-white">BOISSONS CLASSIQUES</h6>
                                <ul>
                                    <li>Evian (50cl) </li>
                                    <li>Badoit (50cl) </li>
                                    <li>Coca cola (33cl) </li>
                                    <li>Coca cola sans sucre (33cl)</li>
                                    <li>Fanta orange (33cl)</li>
                                    <li>Sprite (33cl)</li>
                                    <li>Tropico (33cl)</li>
                                    <li>Fuze tea pêche (33cl)</li>
                                </ul>
                            </div>
                            <div class='col-4 text-white'>
                                <h6 class="card-text text-white">BOISSONS EXOTIQUES</h6>
                                <ul>
                                    <li>Arizona grenade/pêche (50cl) </li>
                                    <li>Aloe vera mangue (50cl) </li>
                                    <li>Vita eau de coco (33cl) </li>

                                </ul>
                            </div>
                            <div class='col-4 text-white'>
                                <h6 class="card-text text-white">BOISSONS CHAUDES</h6>
                                <ul>
                                    <li>Café</li>
                                    <li>Thé</li>
                                    <li>Chocolat</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<?php require_once('partials/footer1.inc');?>