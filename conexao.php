<?php
$MYSQL_URL = 'mysql://root:dXoE7fIBLN5eJlWQHfbr@containers-us-west-109.railway.app:7207/railway';
$MYSQLDATABASE = 'railway';
$MYSQLHOST = 'containers-us-west-109.railway.app';
$MYSQLPASSWORD = 'dXoE7fIBLN5eJlWQHfbr';
$MYSQLPORT = '7207';
$MYSQLUSER = 'root';

$conexao = mysqli_connect($MYSQLHOST, $MYSQLUSER, $MYSQLPASSWORD, $MYSQLDATABASE, $MYSQLPORT);


?>