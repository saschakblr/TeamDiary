<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function users()
    {
        $userRepository = new UserRepository();

        $view = new View('user/users');
        $view->title = 'Users';
        $view->heading = 'Users';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function sign_up()
    {
        $view = new View('user/signup');
        $view->title = 'Sign Up';
        $view->heading = 'Sign Up';
        $view->display();
    }

    public function sign_in()
    {
        $view = new View('user/signin');
        $view->title = 'Sign In';
        $view->heading = 'Sign In';
        $view->display();
    }

    public function profile()
    {
        $view = new View('user/profile');
        $view->title = 'Profile';
        $view->heading = 'Profile';
        $view->display();
    }

    public function edit_profile()
    {
        $view = new View('user/editprofile');
        $view->title = 'Edit Profile';
        $view->heading = 'Edit Profile';
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->create($firstName, $lastName, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }
}
