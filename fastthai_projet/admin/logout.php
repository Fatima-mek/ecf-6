<?php

session_start();
session_destroy();
session_unset();

header('location:http://localhost/php/fastthay_projet/admin/index.php');
?>