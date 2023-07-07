<html>
	<head>
		<link rel="stylesheet" href="public/style.css">
		<link rel="icon" type="image/x-icon" href="public/icons/logo.png">
		<meta charset='UTF-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv='Cache-control' content='no-store'>
	</head>
	<body style="height:100%">
		<div id="login_form" class="col-2 center">
			<h2 class="col-12 text_center margin_bottom_2vw">Zaloguj się</h2>
			<form action="" method="post">
				<label for="username">Login:</label><br>
				<div class="col-12 margin_bottom_2vw">
					<input type="image" class="col-2" src="public/icons/email.png" tabindex="-1"/>
					<input type="text" class="col-10" name="username" placeholder="" id="username" required/>
				</div>
				<label for="password">Hasło:</label>
				<div class="col-12">
					<input type="image" class="col-2" src="public/icons/padlock.png" tabindex="-1"/>
					<input type="password" class="col-10" name="password" placeholder="" id="password" required>
				</div>
				<div id="login_error" class="col-12">
					<?php
						include("config.php");
						session_start();
						
						//https://gist.github.com/heiglandreas/5689592
						//https://github.com/anthony-b/simple-php-LDAP-Authentication
						
						if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password']) ) {
							if ($_POST['username'] != "" && $_POST['password'] != ""){
								$username = $_POST['username'];
								$password = $_POST['password']; 
								
								$ds = ldap_connect($ldap_server);
								ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
								ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);
								
								if ($ldap_admin_bind = ldap_bind($ds, $ldap_admin_dn, $ldap_admin_password)) {
									//echo("Admin Login correct<br/>");
									
									$filter = '(sAMAccountName=' . $username . ')';
									$attributes = array("name", "mail", "samaccountname");
									$result = ldap_search($ds, $ldap_root_dn, $filter, $attributes);
									
									if(! $result) {
										//brak zbioru danych
										echo 'Złe hasło lub login1';
									}
									else if(1 > ldap_count_entries($ds, $result)){
										//brak danych w zbiorze
										echo 'Złe hasło lub login2';
									}
									else if(1 < ldap_count_entries($ds, $result)){
										//Wiecej niz jeden uzytkownik z podanycmi danymi
										echo 'Złe hasło lub login3';
									} else {
										//Znaleziono jednego użytkownika z pasujacymi danymi
										$entries = ldap_get_entries($ds, $result);
										$ldap_user_dn = $entries[0]["name"][0];
										$ldap_user_email = $entries[0]["mail"][0];
										
										if (@$ldap_user_bind = ldap_bind($ds, $ldap_user_dn, $password)) {
											//Logged in.
											//echo "User Login Correct<br/>";
											
											$sql = "SELECT id, config_recent_apps FROM users WHERE (user_login = '" . $username . "')";
											$result = mysqli_query($db,$sql);
											$count = mysqli_num_rows($result);
											
											// Create Session
											$_SESSION['user_login'] = $username;
											$_SESSION['user_dn'] = $ldap_user_dn;
											
											if($count > 0) {
												//Przy kazdym nastepnym logowaniu - aktualizacja danych
												while ($row = $result->fetch_assoc()) {
													$_SESSION['recent_apps'] = json_decode($row['config_recent_apps']);
													$_SESSION['user_id'] = $row['id'];
												}
												$sql = "UPDATE users SET user_dn = '" . $ldap_user_dn . "', email = '" . $ldap_user_email . "' WHERE users.user_login = '" . $username . "';";
												$result = mysqli_query($db,$sql);
											} else {
												//Przy pierwszym logowaniu - dodanie uzytkownika do bazy
												$sql = "INSERT INTO users (user_login, user_dn, email, config_recent_apps) VALUES ('" . $username . "', '" . $ldap_user_dn . "', '" . $ldap_user_email . "', '[0,0,0,0,0]');";
												$result = mysqli_query($db,$sql);
												$_SESSION['recent_apps'] = json_decode("[0,0,0,0,0]");
												$_SESSION['user_id'] = mysqli_insert_id($db);
											}
											
											// Redirect
											header("location:eventManager.php");
										} else {
											//Incorrect login details.
											echo "Złe hasło lub login4";
										}
									}
								} else {
									//Error
									//echo "Admin Login Failed<br/>";
								}
							} else {
								//Puste pola
								echo "Wprowadź login i hasło";
							}
						} else {
							//echo "Missing Login Data";
						}
					?>
				</div>
				<input type="submit" class="col-12" value="Zaloguj"/>
			</form>
		</div>
	</body>
</html>