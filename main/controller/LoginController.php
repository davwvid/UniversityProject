<?php

class LoginController
{

    public function create()
    {

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            echo $email;
        }

    }
}