<?php

$server = 'mysql.hostinger.ru';
$user = 'u126293540_root';
$pass = '31011989';
$db = 'u126293540_login';

$Database = new mysqli($server, $user, $pass, $db);

mysqli_report(MYSQLI_REPORT_ERROR);