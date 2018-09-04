<?php
session_start();
session_destroy();
unset($_SESSION['admin_login']);
header('location: index.php');
