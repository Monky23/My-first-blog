<?php

namespace Controllers\Subscriber;

use Controllers\Controller;
use Models\Comment;

class CommentController extends Controller {

    public function index()
    {
        $this->isSubscriber() || $this->isAdmin();

        $comments = (new Comment($this->getDB()))->all();
        
        return $this->view('blog.post.home');
    }

    public function create()
    {
        $this->isSubscriber ()  || $this->isAdmin();

        $tags = (new Comment($this->getDB()))->all();

        return $this->view('blog.post.show');
    }

    public function createComment()
    {
        $this->isSubscriber()  || $this->isAdmin();

        $comment = new Comment($this->getDB());

        $result = $comment->create($_POST);

        if ($result) {
            return header('Location: /posts');
        }
    }

    public function edit(int $id)
    {
        $this->isSubscriber() || $this->isAdmin();

        $comment = (new Comment($this->getDB()))->findById($id);

        return $this->view('subscriber.comment.formcomment', compact('comment'));
    }

    public function update(int $id)
    {
        $this->isSubscriber() || $this->isAdmin();

        $comment = new Comment($this->getDB());

        $result = $comment->update($id, $_POST);

        if ($result) {
            return header('Location: /');
        }
    }

    public function destroy(int $id)
    {
        $this->isSubscriber()  || $this->isAdmin();

        $comment = new Comment($this->getDB());
        $result = $comment->destroy($id);

        if ($result) {
            return header('Location: /posts');
        }
    }
}