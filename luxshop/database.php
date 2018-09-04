<?php

$conn = mysqli_connect('localhost','root','','luxshop');

if (!$conn) {
	echo "Connect failed : ". mysqli_connect_error();
}

mysqli_set_charset($conn, 'utf8');