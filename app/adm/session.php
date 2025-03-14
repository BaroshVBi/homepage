<?php
    session_start();
	if(!isset($_SESSION['user_login'])){
		header("location:../login.php");
		die();
	}

    include("../config.php");

    $sql = "SELECT user_lvl FROM users WHERE (user_login = '" . $_SESSION['user_login'] . "')";
    $result = mysqli_query($db,$sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['user_lvl'] =! 1) {
                header("location:../login.php");
                die();
            }
        }
    } else {
        header("location:../login.php");
        die();
    }
?>