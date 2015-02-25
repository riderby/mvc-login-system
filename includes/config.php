<?
/*
 * config.php
 */

//user auth
$config['salt'] = 'jK7d?3';
$config['session_timeout'] = 500;//seconds


//error report
mysqli_report(MYSQLI_REPORT_ERROR);

function is_admin()
{
    if ($_SESSION['type'] == 'admin')
    {
        return true;
    }
    else
    {
        return false;
    }
}


?>
