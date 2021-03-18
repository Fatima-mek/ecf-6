<?php

$connexion = mysqli_connect('127.0.0.1','root','','fastthay');

if(!$connexion){
    echo 'erreur de connexion'.mysqli_connect_error($connexion)." ".mysqli_connect_errno($connexion);
}


?>