<?php

class LoginController
{

    public function create()
    {

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            echo $email;
            $_SESSION['loggedIn'] = true;
            $_SESSION['id'] = 1; //Hardcoded for now....
        }

    }

    public function logOut()
    {
        $_SESSION['loggedIn'] = null;
        $_SESSION['id'] = null; //Hardcoded for now...
    }
}