<?php

namespace Controllers\Subscriber;

use Controllers\Controller;
use Models\Comment;

class CommentController extends Controller {

    public function index()
    {
        $this->isSubscriber();
        
        return $this->view('blog.post.home');
    }

    public function create()
    {
        $this->isSubscriber();

        $tags = (new Comment($this->getDB()))->all();

        return $this->view('subscriber.comment.formcomment');
    }

    public function createComment()
    {
        $this->isSubscriber();

        $comment = new Comment($this->getDB());;

        $result = $comment->create($_POST);

        if ($result) {
            return header('Location: /posts');
        }
    }

    public function edit(int $id)
    {
        $this->isSubscriber();

        $post = (new Comment($this->getDB()))->findById($id);

        return $this->view('subscriber.comment.formcomment', compact('comment'));
    }

    public function update(int $id)
    {
        $this->isSubscriber();

        $comment = new Comment($this->getDB());

        $result = $comment->update($id, $_POST);

        if ($result) {
            return header('Location: /posts');
        }
    }

    public function destroy(int $id)
    {
        $this->isSubscriber();

        $post = new Comment($this->getDB());
        $result = $post->destroy($id);

        if ($result) {
            return header('Location: /posts');
        }
    }
}