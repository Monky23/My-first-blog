<?php

namespace Controllers;

use Models\Post;
use Models\Tag;

class BlogController extends Controller
{

    public function welcome()
    {
        return $this->view('blog.home');
    }

    public function index()
    {
        $post = new Post($this->getDB());
        $posts = $post->getPublishedPosts();

        return $this->view('blog.index', compact('posts'));
    }

    public function show(int $id)
    {
        $post = new Post($this->getDB());
        $post = $post->findById($id);

        return $this->view('blog.show', compact('post'));
    }

    public function tag(int $id)
    {
        $tag = (new Tag($this->getDB()))->findById($id);

        return $this->view('blog.tag', compact('tag'));
    }
}