<?php
session_start();
if (isset($_GET['idUser'])) {
session_destroy();
unset($_SESSION['user']);
header('location: index.php');
// echo $id = $_GET['idUser'];
}