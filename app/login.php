<html>
	<head>
		<link rel="stylesheet" href="public/style.css">
		<meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv='Cache-control' content='no-store'>
	</head>
	<body>
		<?php
			include("config.php");
			session_start();
		   
			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password']) ) {
				if ($_POST['username'] != "" && $_POST['password'] != ""){
					$username = $_POST['username'];
					$password = $_POST['password']; 
					$ds = ldap_connect($ldap_server);
					ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
					ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
					
					if ($ldap_admin_bind = ldap_bind($ds, $ldap_admin_dn, $ldap_admin_password)) {
						echo("Admin Login correct<br/>");
						
						$filter = '(sAMAccountName=' . $username . ')';
						$attributes = array("name", "telephonenumber", "mail", "samaccountname");
						$result = ldap_search($ds, $ldap_root_dn, $filter, $attributes);
						
						$entries = ldap_get_entries($ds, $result);  
						$ldap_user_dn = $entries[0]["name"][0];
						
						if ($ldap_user_bind = ldap_bind($ds, $ldap_user_dn, $password)) {
							echo "User Login Correct<br/>"; //Logged in.
							// Create Session
							$_SESSION['user_login'] = $username;
							$_SESSION['user_dn'] = $ldap_user_dn;
							// Redirect
							header("location:/app/eventManager.php");
						} else {
							echo "User Login Failed<br/>"; //Incorrect login details.
							// Delete session
							// Display Error
						}
					} else {
						echo "Admin Login Failed<br/>";	//Error
					}
				} else {
					echo "Wprowadź login i hasło";
				}
			} else {
				echo "Missing Login Data";
			}
		?>
		<div id="login_form" class="col-2 center">
			<h2 class="col-12 text_center margin_bottom_2vw">Zaloguj się</h2>
			<form action="" method="post">
				<label for="username">Login:</label><br>
				<div class="col-12 margin_bottom_2vw">
					<input type="image" class="col-2" src="public/icons/email.png" tabindex="-1"/>
					<input type="text" class="col-10" name="username" placeholder="" id="email" required/>
				</div>
				<label for="password">Hasło:</label>
				<div class="col-12 margin_bottom_2vw">
					<input type="image" class="col-2" src="public/icons/padlock.png" tabindex="-1"/>
					<input type="password" class="col-10" name="password" placeholder="" id="password" required>
				</div>
				<input type="submit" class="col-12" value="Zaloguj"/>
			</form>
		</div>
	</body>
</html>