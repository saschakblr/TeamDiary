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
        $postRepository = new postRepository();

        $view = new View('post/create');
        $view->title = 'Create Post';
        $view->heading = 'Create Post';
        $view->posts = $postRepository->readAll();
        $view->display();
    }

    public function edit()
    {
        $postRepository = new PostRepository();

        $view = new View('post/edit');
        $view->title = 'Edit Post';
        $view->heading = 'Edit Post';
        $view->post = $postRepository->readById($_POST['saveId']);
        $view->display();
    }

    public function home()
    {
        $postRepository = new PostRepository();

        $view = new View('post/home');
        $view->title = 'Home';
        $view->heading = 'Home';
        $view->posts = $postRepository->readAll();
        $view->display();
    }

    public function doCreate() {
        if (isset($_POST['send'])) {
            if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['length']) && !empty($_POST['length']) && isset($_POST['description']) && !empty($_POST['description'])) {
                $title = $_POST['title'];
                $length = $_POST['length'];
                $description = $_POST['description'];
    
                $postRepository = new PostRepository();
                $postRepository->create($title, $length, $description);
            }
        }

        header('Location: /post/home');
    }

    public function doEdit() {
        if (isset($_POST['edit']) && isset($_POST['editId'])) {
            $postRepository = new PostRepository();
            
            $view = new View('post/edit');
            $view->title = 'Edit Post';
            $view->heading = 'Edit Post';
            $view->post = $postRepository->readById($_POST['editId']);
            $view->display();
        }
    }

    public function doSave() {
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
    }

    public function doDelete() {
        if (isset($_POST['delete']) && isset($_POST['deleteId'])) {
            $postRepository = new PostRepository();
            $postRepository->deleteById($_POST['deleteId']);
            header('Location: /post/home');
        } else {
            echo "Du kommst hier net rein!";
        }

    }
}

