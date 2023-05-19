<?php
	#konfiguracja bazy danych MySQL
	$db_hostname = 'localhost';
	$db_username = 'root';
	$db_password = '';
	$db_database = 'puw';
	$db = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
   
	#konfiguracja LDAP/AD
	$ldap_server = 'ldap://127.0.0.1:389';
	$ldap_root_dn = 'CN=Users,DC=domain,DC=com';
	$ldap_admin_dn = 'CN=Admin,CN=Users,DC=domain,DC=com';
	$ldap_admin_password = 'Password';
	$ldap_uid_field	 = 'sAMAccountName';
	#$g_ldap_protocol_version = 3;
	#$g_ldap_follow_referrals = OFF;
?>