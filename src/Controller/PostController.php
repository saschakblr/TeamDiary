<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class PostController
{
    public function create()
    {
        $userId = Authentication::checkIfLoggedIn();
        if ($userId > 0) {
            $postRepository = new postRepository();

            $view = new View('post/create');
            $view->title = 'Create Post';
            $view->heading = 'Create Post';
            $view->posts = $postRepository->readAll();
            $view->display($userId);
        }
    }

    public function home()
    {
        $userId = Authentication::checkIfLoggedIn();
        if ($userId > 0) {
            $postRepository = new PostRepository();
    
            $view = new View('post/home');
            $view->title = 'Home';
            $view->heading = 'Home';
            $view->user = $userId;
            $view->posts = $postRepository->readAllWithUser();
            $view->display($userId);
        } else {
            echo "You are not logged in!";
        }
    }

    public function doCreate() {
        $userId = Authentication::checkIfLoggedIn();
        if ($userId > 0) {
            if (isset($_POST['send'])) {
                if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['length']) && !empty($_POST['length']) && isset($_POST['description']) && !empty($_POST['description'])) {
                    $title = $_POST['title'];
                    $length = $_POST['length'];
                    $description = $_POST['description'];

                    $postRepository = new PostRepository();
                    $postRepository->create($title, $length, $description, $userId);
                }
            }
            header('Location: /post/home');
        } else {
            echo "You are not logged in!";
        }
    }

    public function doEdit() {
        $userId = Authentication::checkIfLoggedIn();
        if ($userId > 0) {
            if (isset($_POST['edit']) && isset($_POST['editId'])) {
                $postRepository = new PostRepository();
                
                $view = new View('post/edit');
                $view->title = 'Edit Post';
                $view->heading = 'Edit Post';
                $view->post = $postRepository->readById($_POST['editId']);
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
                if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['length']) && !empty($_POST['length']) && isset($_POST['description']) && !empty($_POST['description'])) {
                    $id = $_POST['saveId'];
                    $title = $_POST['title'];
                    $length = $_POST['length'];
                    $description = $_POST['description'];
                    
                    $postRepository = new PostRepository();
                    $postRepository->save($id, $title, $length, $description);

                    header('Location: /post/home');
                } else {
                    echo "Du kommst hier net rein!";
                }
            } else if (isset($_POST['reset'])) {
                header('Location: /post/home');
            }
        } else {
            echo "You are not logged in!";
        }
    }

    public function doDelete() {
        $userId = Authentication::checkIfLoggedIn();
        if ($userId > 0) {
            if (isset($_POST['delete']) && isset($_POST['deleteId'])) {
                $postRepository = new PostRepository();
                $postRepository->deleteById($_POST['deleteId']);
                header('Location: /post/home');
            } else {
                echo "Du kommst hier net rein!";
            }
        } else {
            echo "You are not logged in!";
        }
    }
}

