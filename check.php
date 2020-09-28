<?php 
	$start = microtime(true); 
	$X = $_POST['X'];
	$Y = $_POST['Y'];
	$R = $_POST['R'];
	

	if (!(is_numeric($X) && is_numeric($Y) && ($X < 3) && ($X > -5) && ($Y < 5) && ($Y > -3))) 
		echo "error";
	else {
		$flag = "false";

		if (
			($X >= 0 && $Y >= 0 && $X <= $R && $Y <= $R) || 
			($X <= 0 && $Y >= 0 && $Y <= ($X + $R)) || 
			($X <= 0 && $Y <=0 && ($X*$X + $Y*$Y)<=(0.25*$R*$R))
		) $flag = "true";


		$executionTime = round((microtime(true) - $start), 6);
		$currentTime = date("H:i:s");

		$result = "{".
			"\"x\":\"$X\",".
			"\"y\":\"$Y\",".
			"\"r\":\"$R\",".
			"\"curtime\":\"$currentTime\",".
			"\"exectime\":$executionTime,".
			"\"result\":$flag".
			"}";

		echo $result;
	}
?>
