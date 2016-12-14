<?php

include '../dao/DAOFactory.php';

class LoginController
{

    public function showLogin()
    {
        require_once('../view/login.php');
    }

    public function showReset()
    {
        require_once('../view/reset.php');
    }

    public function login()
    {

        if (isset($_POST['email']) && isset($_POST['password'])) {

            $university = DAOFactory::getUniversityDAO()->readUniversityByEmail($_POST['email']);

            if (!empty($university)) {

                if (password_verify($_POST['password'], $university->getPassword())) {
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['id'] = $university->getId();

                    if ($university->getName() == "admin") {
                        $_SESSION['admin'] = true;
                    }

                    header("Refresh:0");
                } else {
                    $message = "Wrong credentials!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            } else {
                $message = "Wrong credentials!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }

        if ($_SESSION['loggedIn']) {
            return Route::call("Home", "show");
        }

        require_once('../view/login.php');
    }

    public function logout()
    {
        if ($_SESSION['loggedIn'] == true) {
            $_SESSION['loggedIn'] = null;
            $_SESSION['id'] = null;
            header("Refresh:0");
        }

        require_once('../view/login.php');
    }

    public function reset()
    {
        if (isset($_POST['email'])) {

            $university = DAOFactory::getUniversityDAO()->readUniversityByEmail($_POST['email']);

            if (!empty($university)) {

                $newPassword = $this->generateRandomString();

                $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
                $university->setPassword($hashed_password);
                DAOFactory::getUniversityDAO()->updateUniversity($university);

                // in PROD the email address should be replaced by the real one (we dont want to spam them)
                $this->sendMail($university->getName(), $newPassword, "everybodyuniversity@gmail.com");

                $message = "New password send!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {

                $message = "Wrong email address";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }

        require_once('../view/reset.php');
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function sendMail($name, $password, $email)
    {

        // the message
        $msg = "Hello, " . $name . "\nYour new password is: " . $password;

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

        // send email
        mail($email, "Password reset", $msg);

    }
}