<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_ecologikal = "localhost";
$database_ecologikal = "greenble_ecologikalv1";
$username_ecologikal = "greenble_admin";
$password_ecologikal = "sustentable";
$ecologikal = mysql_pconnect($hostname_ecologikal, $username_ecologikal, $password_ecologikal) or trigger_error(mysql_error());
mysql_select_db($database_ecologikal, $ecologikal);

?>