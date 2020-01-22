<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class PostController
{
    public function create_post()
    {
        $userRepository = new UserRepository();

        $view = new View('post/createpost');
        $view->title = 'Create Post';
        $view->heading = 'Create Post';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function edit_post()
    {
        $view = new View('post/editpost');
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
