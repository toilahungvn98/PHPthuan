<?php
function display_errors($errors) {
	$display = "";
	foreach ($errors as $err) {
		$display .= "<div class='text-danger'>" . $err . "</div>";
	}

	// $display .= "</ul>";

	return $display;
}

 ?>