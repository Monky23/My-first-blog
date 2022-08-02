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
        $this->isAdmin() || $this->isSubscriber();
            return $this->view('blog.post.show');

        return $this->view('blog.post.show');
    }

    public function createComment()
    {
        $comment = new Comment($this->getDB());

        $result = $comment->create($_POST);
    
        if ($result) {
            return header('Location: /posts');
        }


    }

    public function edit(int $id)
    {
        if ($this->isAdmin() || $this->isSubscriber()) {

            $comment = (new Comment($this->getDB()))->findById($id);
    
            return $this->view('subscriber.comment.form', compact('comment'));
        }
    }

    public function update(int $id)
    {
        if ($this->isAdmin() || $this->isSubscriber()) {
            $comment = new Comment($this->getDB());

            $result = $comment->update($id, $_POST);
    
            if ($result) {
                return $this->view('commentinwait');
            }
            
        }
    }

    public function delete(int $id)
    {
        if ($this->isAdmin() || $this->isSubscriber()) {

            $comment = new Comment($this->getDB());
            $result = $comment->delete($id);
    
            if ($result) {
                return header('Location: /posts');
            }
        }

    }
}