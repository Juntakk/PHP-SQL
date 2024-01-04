<?php
$connexion = mysqli_connect("localhost", "root", "", "projet");

if ($connexion->connect_error) {
    die("Connexion failed" . $connexion->connect_error);
}
?>