<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user/index');
        $view->title = 'Users';
        $view->heading = 'Users';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user/create');
        $view->title = 'Sign Up';
        $view->heading = 'Sign Up';
        $view->display();
    }

    public function login()
    {
        $view = new View('user/login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }

    public function profile()
    {
        $view = new View('user/profile');
        $view->title = 'Profile';
        $view->heading = 'Profile';
        $view->display();
    }

    public function edit()
    {
        $view = new View('user/edit');
        $view->title = 'Edit Profile';
        $view->heading = 'Edit Profile';
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $firstName = $_POST['firstname'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->create($firstName, $name, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /post/home');
    }

    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function doLogin() {
        if (!isset($_POST['send'])) {
            header('Location: /user/login');
        }
            
        if (!isset($_POST['email'])) {
            header('Location: /user/login');
        }

        if (isset($_POST['password'])) {
            $userRepository = new UserRepository();
            if ($userRepository->login($_POST["email"], $_POST["password"])) {
                header('Location: /post/home');
            } else {
                header('Location: /user/login');
            }
        }
    }

    public function doLogout() {
        session_destroy();
        unset($_SESSION["user_id"]);
    }
}
