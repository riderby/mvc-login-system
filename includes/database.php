<?php

$server = 'mysql.hostinger.ru';
$user = '...';
$pass = '.......';
$db = '......';

$Database = new mysqli($server, $user, $pass, $db);

mysqli_report(MYSQLI_REPORT_ERROR);
