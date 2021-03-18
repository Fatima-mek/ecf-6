<?php
require_once('security.inc');
require_once('../connect.php');

function trDate($created){
    $dateArray = (explode("-",substr(($created),0,10)));
    $dateIns = $dateArray[2]."/".$dateArray[1]."/".$dateArray[0];
    return $dateIns;
}

if(isset($_POST['submit']) && !empty($_POST['search'])){
    $mCle = trim(addslashes(htmlentities($_POST['search'])));


    $sql = " SELECT * FROM plat p
    INNER JOIN category c
    ON p.id_type = c.id_category
    WHERE nom_plat LIKE '$mCle%' 
    OR type LIKE '$mCle%'";

}else{

$sql = "SELECT * FROM plat p
        INNER JOIN category c
        ON p.id_type = c.id_category";
        
}

$result = mysqli_query($connexion, $sql);


//var_dump($result);

?>

<?php require_once('../partials/header.inc'); ?>

<div class="container mt-2 ">

<h1 class="bg-dark text-center text-white ">Administration</h1>
<p class='text-right'><a href="ajouter.php" class="btn btn-warning "><i class="fas fa-plus"> </i></a></p>
<form action="<?=$_SERVER['PHP_SELF']; ?>" method="post">

    <div class="input-group justify-content-end mb-2">
        <input type="search" class="form-control offset-9 col-3 text-center" name="search" id="search" placeholder="Rechercher">

        <button type="submit" name="submit"><i class="fas fa-search"></i></button>
    </div>
</form>
<table class="table table-border bg bg-dark text-white mb-5">
    <thead class="table bg bg-warning text-center">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Image</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Type</th>
            <th>Date de creation</th>
            <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['role']==1){ ?>
            <th colspan="2" class="text-center">Actions</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php while($rows = mysqli_fetch_assoc($result)){  ?>
        <tr>
            <td><?= $rows['id_plat']; ?></td>
            <td><?= $rows['nom_plat']; ?></td>
            <td><img src="../assets/images/<?=$rows['image']; ?>"width="60"/></td>
            <td><i><?=  $rows['description']; ?></i></td>
            <td><?= $rows['prix']; ?>€</td>
            <td><?= $rows['type']; ?></td>
            <td> <?=trDate($rows['created']);?></td>
            <?php if(isset($_SESSION['auth']) && $_SESSION['auth']['role']==1){ ?>
            <td><a href="editer.php?id=<?=$rows['id_plat'];?>" class="btn btn-success"><i class="fas fa-edit"></a></td>
            <td><a href="supprimer.php?id=<?=$rows['id_plat'];?>" class="btn btn-danger" onclick="return confirm('Etes vous sûr de vouloir supprimer?')"><i class="fas fa-trash"></i></a></td>
            <?php } ?>
            </tr>
    <?php } ?>
    </tbody>
</table>
</div>
<br>
<?php require_once('../partials/footer.inc'); ?>