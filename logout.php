<?php

include("includes/init.php");

//log out
$Auth->logout();


//redirect
$Template->setAlert('Вы успешно разлогились');
$Template->redirect('login.php');