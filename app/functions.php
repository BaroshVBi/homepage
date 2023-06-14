<?php
	function returnDate($string) {
		$date = strtotime($string);
		return "" . return00(idate('d', $date)) . "." . return00(idate('m', $date)) . "." . idate('Y', $date) . "";
	}
	
	function return00($i) {
		if ($i < 10) {
			return "0" . $i;
		} else {
			return $i;
		}
	}
	
	function dot($count) {
		if($count > 0) {
			if ($count > 9) {
				return "<div class='dot text_center'><p class='ver_center' style='font-size:1vw;'>+9</p></div>";
			} else {
				return "<div class='dot'><p>" . $count . "</p></div>";
			}
		}
	}
	
	function greyout($m, $currentmonth) {
		if($m != $currentmonth){
			return "greyout";
		}
	}
	
	function returnUserDN($id) {
		include("config.php");
		$sql = "SELECT user_dn FROM users WHERE (id = '" . $id . "')";
		$result = mysqli_query($db,$sql);
		while ($row = $result->fetch_assoc()) {
			return $row['user_dn'];
		}
	}
?>