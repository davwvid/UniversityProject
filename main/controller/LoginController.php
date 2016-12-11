<?php

include '../dao/DAOFactory.php';

class LoginController
{

    public function create()
    {

        if (isset($_POST['email']) && isset($_POST['password'])) {

            $university = DAOFactory::getUniversityDAO()->readUniversityByCredentials($_POST['email'], $_POST['password']);

            if ($university != null) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['id'] = $university->getId();
                header("Refresh:0");
            }
        }
    }

    public function logOut()
    {
        $_SESSION['loggedIn'] = null;
        $_SESSION['id'] = null; //Hardcoded for now...
    }
}