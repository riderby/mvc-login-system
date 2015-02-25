<?

include("includes/init.php");

session_start();


//check authorization
if ($Auth->checkLogStatus() == false)
{
    $Template->setAlert('Вы не авторизированы', 'error');
    $Template->redirect('login.php');
}

else
{
    $Template->load('views/v_members.php');
}