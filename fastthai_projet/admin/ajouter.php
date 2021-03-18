<?php
require_once('security.inc');
require_once('../connect.php');

$error = "";

$sql = "SELECT id_category, type FROM category";

$res = mysqli_query($connexion, $sql);



if(isset($_POST['soumis'])){
    if(isset($_POST['nom_plat']) && strlen($_POST['nom_plat'])<=50 ){
        $nom_plat = trim(htmlspecialchars(addslashes($_POST['nom_plat'])));
        $image = $_FILES['image']['name'];
        $description= trim(htmlspecialchars(addslashes($_POST['description'])));
        $prix = trim(htmlspecialchars(addslashes($_POST['prix'])));
        $created = trim(htmlspecialchars(addslashes($_POST['created'])));
        $id_type = trim(htmlspecialchars(addslashes($_POST['type'])));
       
        $destination ="../assets/images/";
        move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);

        $sql= "INSERT INTO plat(nom_plat, image , description, prix, created, id_type)
                VALUES('$nom_plat','$image','$description', '$prix','$created','$id_type')";

        $result = mysqli_query($connexion, $sql);

        if(mysqli_insert_id($connexion) > 0){
            header('location:liste.php');
        }else{
            $error = '<div class="alert alert-danger">Erreur d\'insertion</div>';
        }
        
    }
}

require_once('../partials/header.inc'); 
?>
<div class="offset-2 col-8 mt-5">
<h1 class="bg-dark text-center text-white h2">Formulaire d'ajout</h1>

    <?= $error; ?>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    
    <div class="row">
    <div class="col-5">
        <label for="nom_plat">Plat*</label>
        <input type="text" class="form-control" id="nom_plat" name="nom_plat" placeholder="Entrez votre nom du plat svp" required>
    </div>
    <div class="col-5">
        <label for="image">Image*</label>
        <input type="file" class="form-control" id="image" name="image" placeholder="Entrez votre prénom svp" required>
    </div>
    <div class="col-2">
        <label for="prix">Prix*</label>
        <input type="number" class="form-control" id="prix" name="prix" placeholder="Entrez le prix" required>
    </div>
    </div>
    
    <div class="row">
    <div class="col">
        <label for="created">Date</label>
        <input type="date" class="form-control" id="created" name="created" >
    </div>

    <div class="col">
        <label for="type">Type*</label>
        <select class="form-select" id="type" name="type" >
        <option >Choisir</option>
        <?php while($rows = mysqli_fetch_assoc($res)){ ?>
            <option value="<?=$rows['id_category']; ?>"><?=$rows['type']; ?></option>
        <?php } ?>
        </select>
    </div>
    </div>
    <div class="row">
    <div class="col mb-2">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Entrez la description svp"></textarea>
    </div>

    </div>
    <button type="submit" class="btn btn-warning col-12" name="soumis" ><strong>Soumettre</strong> </button>
    </form>
    <p class="text-right "><a href="liste.php"><i class="far fa-hand-point-left text-dark mt-5" ></i></a> </p>

</div>

<?php require_once('../partials/footer.inc');?>