<?php

session_start();

class Auth
{

    private $salt = 'sd?sdk?221';


    function  insertdb($user, $email, $pass)
    {
        global $Database;

        if ($stmt = $Database->prepare("insert users (username, email, password) values (?,?,?)"))
        {
            $stmt->bind_param("sss", $user,  $email, md5($pass . $this->salt));
            $stmt->execute();
            $stmt->store_result();
            $stmt->close();

        }
        return true;
    }

    function  getPass($current_pass)
    {
        global $mysqli;
        if ($check = $mysqli->prepare("SELECT password FROM users WHERE id = ?"))
        {
            $check->bind_param("s", $_SESSION['id']);
            $check->execute();
            $check->bind_result($current_pass);
            $check->fetch();
            $check->close();
        }
    }

    function getTest()
    {
        global $mysqli;
        if ($check = $mysqli->prepare("SELECT password FROM users WHERE username = 'admin'"))
        {

            $check->execute();
            $check->store_result();
            $check->close();
            echo $check;

        }

    }

    function updatePassword($username, $pass)
    {


        global $Database;

        if ($stmt = $Database->prepare("UPDATE users SET password = ? WHERE username = ?"))
        {
            $stmt->bind_param("ss",  md5($pass . $this->salt), $username);
            $stmt->execute();
            $stmt->store_result();


        }

        return true;
    }


    
    function validateLogin($user,$pass)
    {
        //access to DB
        global $Database;

        if ($stmt = $Database->prepare("SELECT * FROM users WHERE username = ?
        AND password =?"))
        {
            $stmt->bind_param("ss", $user, md5($pass . $this->salt));
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0)
            {
                $stmt->close();
                return true;
            }
            else
            {
                $stmt->close();
                return false;
            }
        }

        else
        {
            die("Error: can't prepare mysql");
        }
    }

    function validatePass($pass)
    {
        //access to DB
        global $Database;

        if ($stmt = $Database->prepare("SELECT username FROM users WHERE  password = ?"))
        {
            $stmt->bind_param("s", md5($pass . $this->salt));
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0)
            {
                $stmt->close();
                return true;
            }
            else
            {
                $stmt->close();
                return false;
            }
        }
        else
        {
            die("Error: can't prepare mysql");
        }
    }


    function validateName($username, $pass)
    {
        //access to DB
        global $Database;

        if ($stmt = $Database->prepare("SELECT username, password FROM users WHERE  username = ?
        AND password = ?"))
        {
            $stmt->bind_param("ss", $username, md5($pass . $this->salt));
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0)
            {
                $stmt->close();
                return true;
            }
            else
            {
                $stmt->close();
                return false;
            }
        }

        else
        {
            die("Error: can't prepare mysql");
        }
    }

    function  checkLogStatus()
    {
        if (isset($_SESSION['loggedin']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function logout()
    {
        session_destroy();
        session_start();
    }
}