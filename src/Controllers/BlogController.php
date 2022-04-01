<?php

namespace Controllers;

use Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $post = new Post($this->getDB());
        $posts = $post->getAll();
    }
}