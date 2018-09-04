<?php

require '../../database.php';

if (isset($_POST['proID'])) {
	$idPro = $_POST['proID'];
	$output = "";

	$query = "SELECT id,description, size, color FROM product WHERE id = '$idPro' ";

	$result = mysqli_query($conn, $query);

	$output  .= '
			<div class="table-responsive">
			<table class="table table-bordered">
		 ';
		 while ($row = mysqli_fetch_assoc($result)) {
		 	$output .=  '
				<tr>
					<td width="30%"><label>Kích thước </label></td>
					<td width="70%">' .$row['size']. '</td>
				</tr>	
				<tr>
					<td width="30%"><label> Màu sắc </label></td>
					<td width="70%">' .$row['color']. '</td>
				</tr>
				<tr>
					<td width="30%"><label>Mô tả </label></td>
					<td width="70%">' .$row['description']. '</td>
				</tr>

		 	 ';
		 }

		 $output .='</table></div>';
		 echo $output;
}