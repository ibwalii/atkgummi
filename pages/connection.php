<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_atk = "localhost";
$database_atk = "atk";
$username_atk = "root";
$password_atk = "";
$atk = mysql_pconnect($hostname_atk, $username_atk, $password_atk) or trigger_error(mysql_error(),E_USER_ERROR); 
?>