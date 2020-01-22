<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class PostController
{
    public function create()
    {
        $userRepository = new UserRepository();

        $view = new View('post/create');
        $view->title = 'Create Post';
        $view->heading = 'Create Post';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function edit()
    {
        $view = new View('post/edit');
        $view->title = 'Edit Post';
        $view->heading = 'Edit Post';
        $view->display();
    }

    public function home()
    {
        $view = new View('post/home');
        $view->title = 'Home';
        $view->heading = 'Home';
        $view->display();
    }
}

