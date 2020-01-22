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
        $view = new View('post/edit');
        $view->title = 'Edit Post';
        $view->heading = 'Edit Post';
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
}

