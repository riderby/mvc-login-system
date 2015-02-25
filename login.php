<?php

include("includes/database.php");
include("includes/init.php");

session_start();

if (isset($_POST['submit']))
{
    //get data from form
    $Template->setData('input_user', $_POST['username']);
    $Template->setData('input_pass', $_POST['password']);

    //validation data
    if ($_POST['username'] == '' || $_POST['password'] == '')
    {
        //show error msg
        if ($_POST['username'] == '') { $Template->setData('error_user', 'required field'); }
        if ($_POST['password'] == '') { $Template->setData('error_pass', 'обязательное поле'); }
        $Template->setAlert('Заполните все поля', 'error');
        $Template->load("views/v_login.php");
    }



    else if ($Auth->validateLogin($Template->getData('input_user'), $Template->getData('input_pass')) == false)
    {
        //invalid login
        $Template->setAlert('Неправильный логин или пароль', 'error');
        $Template->load("views/v_login.php");
    }

        else
        {
            //successful login
            $_SESSION['username'] = $Template->getData('user_name');
            $_SESSION['loggedin'] = true;
            $Template->setAlert('Welcome <i>' . $Template->getData('input_user').'</i>');
            $Template->redirect("members.php");

        }

}
else
{

    $Template->load("views/v_login.php");
}