<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\PostRepository;
use App\Repository\UnitRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
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
        $userId = Authentication::checkIfLoggedIn();
        if ($userId > 0) {
            $userRepository = new UserRepository();
            $postRepository = new PostRepository();

            $view = new View('user/profile');
            $view->title = 'Profile';
            $view->heading = 'Profile';
            $view->user = $userRepository->readById($userId);
            $view->posts = $postRepository->readAllFromCurrentUser($userId);
            $view->display($userId);
        } else {
            echo "You are not logged in!";
        }
    }

    public function edit()
    {
        $userId = Authentication::checkIfLoggedIn();
        if ($userId > 0) {
            $view = new View('user/edit');
            $view->title = 'Edit Profile';
            $view->heading = 'Edit Profile';
            $view->display($userId);
        } else {
            echo "You are not logged in!";
        }
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

            $userRepository->login($email, $password);
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

    public function doEdit() {
        $userId = Authentication::checkIfLoggedIn();
        if ($userId > 0) {
            if (isset($_POST['edit']) && isset($_POST['editId'])) {
                $userRepository = new UserRepository();
                $unitRepository = new UnitRepository();
                
                $view = new View('user/edit');
                $view->title = 'Edit User';
                $view->heading = 'Edit User';
                $view->user = $userRepository->readById($_POST['editId']);
                $view->units = $unitRepository->readAll();
                $view->display($userId);
            }
        } else {
            echo "You are not logged in!";
        }
    }

    public function doSave() {
        $userId = Authentication::checkIfLoggedIn();
        if ($userId > 0) {
            if (isset($_POST['save']) && isset($_POST['saveId'])) {
                if (isset($_POST['firstName']) && !empty($_POST['firstName']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email'])) {
                    $id = $_POST['saveId'];
                    $firstName = $_POST['firstName'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    
                    $userRepository = new UserRepository();
                    $userRepository->save($id, $firstName, $name, $email);

                    header('Location: /user/profile');
                } else {
                    print_r($_POST);
                    echo "Du kommst hier net rein!";
                }
            } else if (isset($_POST['reset'])) {
                header('Location: /user/profile');
            }
        } else {
            echo "You are not logged in!";
        }
    }

    public function doLogout() {
        session_start();
        session_destroy();
        unset($_SESSION['user_id']);

        if (!isset($_SESSION['user_id'])) {
            header('Location: /user/login');
        } else {
            echo "We weren&apos;t able to log you out!";
        }
    }
}
