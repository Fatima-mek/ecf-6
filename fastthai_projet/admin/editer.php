<?php
require_once('security.inc');
require_once('../connect.php');

$error = "";

$sql = "SELECT id_category, type 
        FROM category";

$res = mysqli_query($connexion, $sql);

if(isset($_GET['id']) && $_GET['id'] <= 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
    $id = htmlspecialchars(addslashes($_GET['id']));

    $sql = "SELECT * FROM plat p
            INNER JOIN category c
            ON p.id_type = c.id_category
            WHERE p.id_plat = '$id'";

    $result = mysqli_query($connexion, $sql);

    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);

        //var_dump($data);
    }
}

if(isset($_POST['soumis'])){
    if(isset($_POST['nom_plat']) && strlen($_POST['nom_plat'])<=20){
        $id_plat = trim(htmlspecialchars(addslashes($_POST['id_plat'])));
        $nom_plat = trim(htmlspecialchars(addslashes($_POST['nom_plat'])));
        $image = $_FILES['image']['name'];
        $description= trim(htmlspecialchars(addslashes($_POST['description'])));
        $prix = trim(htmlspecialchars(addslashes($_POST['prix'])));
        $created = trim(htmlspecialchars(addslashes($_POST['created'])));
        $id_type = trim(htmlspecialchars(addslashes($_POST['type'])));
       
        $destination ="../assets/images/";
        move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);

        if(empty($image)){
            $sql = "UPDATE plat
                    SET nom_plat = '$nom_plat',description = '$description', prix = '$prix',created ='$created',id_type = '$id_type'  
                    WHERE id_plat =".$id_plat;
        }else{
            if(file_exists('../assets/images/'.$data['image'])){

                unlink('../assets/images/'.$data['image']);
            }
            $sql = "UPDATE plat SET nom_plat ='$nom_plat',image='$image', description ='$description',prix ='$prix',created ='$created', id_type = '$id_type'  
            WHERE id_plat =".$id_plat;
        }

        $resultat = mysqli_query($connexion, $sql);

        if($resultat){
            header('location:liste.php');
        }
    }else{
            $error = '<div class="alert alert-danger">Erreur de modification</div>';
        }
        
}
   

 require_once('../partials/header.inc'); 
?>
<div class="offset-2 col-8 mt-5">
    <h1 class="bg-dark text-center text-white h2">Formulaire d'édition</h1>
    <?= $error; ?>

    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id_plat" value="<?=$data['id_plat'];?>">

        <div class="row">
            <div class="col-5">
                <label for="nom_plat">Plat*</label>
                <input type="text" class="form-control" id="nom_plat" name="nom_plat" value="<?=$data['nom_plat'];?>">
            </div>
            <div class="col-5">
                <label for="image">Image*</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="../assets/images/<?=$data['image'];?>" alt="" width="200">

            </div>
            <div class="col-2">
                <label for="prix">Prix*</label>
                <input type="number" class="form-control" id="prix" name="prix" value="<?=$data['prix'];?>">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="created">Date</label>
                <input type="date" class="form-control" id="created" value="<?=$data['created'];?>" name="created">
            </div>

            <div class="col">
                <label for="type">Catégorie*</label>
                <select class="form-select" id="type" name="type">
                    <option value="<?=$data['id_type'];?>">
                        <?=$data['type'];?>
                    </option>
                    <?php while($rows = mysqli_fetch_assoc($res)){ if($data['id_type'] !== $rows['id_category']){ ?>
                    <option value="<?=$rows['id_category']; ?>">
                        <?=ucfirst($rows['type']); ?>
                    </option>
                    <?php }}?>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col mb-2">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5"
                    placeholder="Entrez la description svp"><?=$data['description'];?></textarea>
            </div>

        </div>
        <button type="submit" class="btn btn-warning col-12" name="soumis"><strong>Modifier</strong> </button>
    </form>
    <p class="text-right "><a href="liste.php"><i class="far fa-hand-point-left text-dark mt-5"></i></a> </p>

</div>


<?php require_once('../partials/footer.inc');?>
