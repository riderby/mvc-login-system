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
    $Template->setAlert('Required field', 'error');
    $Template->redirect('login.php');
}

$input['input_name'] = '';
$input['current_pass'] = '';



if (isset($_POST['submit']))
{

    //get data from form
    $Template->setData('input_name', $_POST['name']);
    $Template->setData('inputCurrent', $_POST['current_pass']);
    $Template->setData('input_pass', $_POST['password']);
    $Template->setData('input_pass2', $_POST['password2']);


    //validation data
    if ($_POST['name'] == '' || $_POST['password'] == '' || $_POST['password2'] == ''
    || $_POST['current_pass'] == '')
    {

        //show error msg
        if ($_POST['name'] == '') { $Template->setData('error_user', 'required field'); }
        if ($_POST['current_pass'] == '') { $Template->setData('error_current', 'required field'); }
        if ($_POST['password'] == '') { $Template->setData('error_pass', 'required field'); }
        if ($_POST['password2'] == '') { $Template->setData('error_pass2', 'required field'); }


        if ($Auth->validateLogin($Template->getData('input_name'),
                $Template->getData('inputCurrent')) == true )
        { $Template->setAlert('Введите заново текущий пароль и введите новый', 'warning');  }



        if ($_POST['current_pass'] != '' AND  $_POST['name'] != ''   )
        {
            if ($Auth->validateLogin($Template->getData('input_name'),
                    $Template->getData('inputCurrent')) == false )
            {
                $Template->setAlert('Неверный текущий пароль', 'warning');
            }
        }

    }
    if (empty($_POST['current_pass']))
    {
        $Template->redirect("change_password.php");
    }

    if (!empty($_POST['password']) && $_POST['password2'])

    {
        if ($_POST['password'] != $_POST['password2'])
        {
            $Template->setAlert('Пароли не совпадают, введите заново', 'warning');

        }

        if ($Auth->validateLogin($Template->getData('input_name'),
                $Template->getData('inputCurrent')) == true &&($_POST['password']) ==($_POST['password2']))

        {

          ($Auth->updatePassword($Template->getData('input_name'),
            $Template->getData('input_pass')));



            $Template->setAlert('Поздравляем  с успешной сменой пароля', 'success');

        }


    }
}


$Template->load("views/v_change.php");