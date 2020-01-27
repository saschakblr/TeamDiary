<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\UnitRepository;
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
        if(Authentication::checkIfLoggedIn()){
            $userRepository = new UserRepository(); 
            $view = new View('user/profile');
            $view->title = 'Profile';
            $view->heading = 'Profile';
            $view->user = $userRepository->readById($_SESSION['user_id']);
            $view->display();
        }else{
        header ("location : /user/irgendöbbis");}
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

    public function doEdit() {
        if (isset($_POST['edit']) && isset($_POST['editId'])) {
            $userRepository = new UserRepository();
            $unitRepository = new UnitRepository();
            
            $view = new View('user/edit');
            $view->title = 'Edit User';
            $view->heading = 'Edit User';
            $view->user = $userRepository->readById($_POST['editId']);
            $view->units = $unitRepository->readAll();
            $view->display();
        }
    }

    public function doSave() {
        if (isset($_POST['save']) && isset($_POST['saveId'])) {
            if (isset($_POST['image']) && !empty($_POST['image']) && isset($_POST['firstName']) && !empty($_POST['firstName']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email'])) {
                $id = $_POST['saveId'];
                $image = $_POST['image'];
                $firstName = $_POST['firstName'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $deleteProfile = $_POST['deleteProfile'];
                
                $userRepository = new UserRepository();
                $userRepository->save($id, $image, $firstName, $lastName, $email, $deleteProfile);

                //header('Location: /user/profile');
            } else {
                //echo "Du kommst hier net rein!";
            }
        } else if (isset($_POST['reset'])) {
            //header('Location: /user/profile');
        }
    }

    public function doLogout() {
        session_destroy();
        unset($_SESSION["user_id"]);
    }
}
