<?php

include("includes/database.php");
include("includes/init.php");
include("includes/config.php");

session_start();
$_SESSION['last_active'] = time();

if (time() > $_SESSION['last_active'] + $config['session_timeout'])
{
    //log out user
    session_destroy();
    header("Location: login.php?timeout");
}


//check authorization
if ($Auth->checkLogStatus() == false)
{
    $Template->setAlert('Вы не авторизированы', 'error');
    $Template->redirect('login.php');
}


if (isset($_POST['submit']))
{


    //get data from form
    $Template->setData('input_user', $_POST['username']);
    $Template->setData('input_email', $_POST['email']);
    $Template->setData('input_pass', $_POST['password']);
    $Template->setData('input_pass2', $_POST['password2']);


    //validation data
    if ($_POST['username'] == '' || $_POST['email'] == '' || $_POST['password'] == ''
        || $_POST['password2'] == '')
    {
        //show error msg
        if ($_POST['username'] == '') { $Template->setData('error_user', 'required field'); }
        if ($_POST['email'] == '') { $Template->setData('error_email', 'required field'); }
        if ($_POST['password'] == '') { $Template->setData('error_pass', 'required field'); }
        if ($_POST['password2'] == '') { $Template->setData('error_pass', 'required field'); }
        $Template->setAlert('Заполните обязательные поля', 'error');
        $Template->load("views/v_register.php");


    }
    elseif ($_POST['password'] != $_POST['password2'])
    {
        $Template->setAlert('Пароли не совпадают, повторите попытку', 'warning');
        $Template->load("views/v_register.php");
    }

    elseif ($Auth->insertdb($Template->getData('input_user'), $Template->getData('input_email'),
    $Template->getData('input_pass')))
    {
        $Template->redirect("register.php");
        $Template->setAlert('Поздравляем  с успешной регистрацией', 'success');
    }



}
else
{

    $Template->load("views/v_register.php");
}