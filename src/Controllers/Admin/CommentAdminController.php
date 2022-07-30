<?php

namespace Controllers\Admin;

use Controllers\Controller;
use Models\Comment;

class CommentAdminController extends Controller
{

    public function index()
    {
        $this->isAdmin();

        $comment = new Comment($this->getDB());
        $comments = $comment->getUnpublishedComments();
        
        return $this->view('admin.comment.index', compact('comments'));
    }

    public function create()
    {
        $this->isAdmin();

        return $this->view('admin.comment.form');
    }

    public function createComment()
    {
        $this->isAdmin();

        $comment = new Comment($this->getDB());

        $result = $comment->create($_POST);

        if ($result) {
            return header('Location: /admin/comments');
        }
    }

    public function edit(int $id)
    {
        $this->isAdmin();

        $comment = (new Comment($this->getDB()))->findById($id);

        return $this->view('admin.comment.form', compact('comment'));
    }

    public function update(int $id)
    {
        $this->isAdmin();

        $comment = new Comment($this->getDB());

        $result = $comment->update($id, $_POST);

        if ($result) {
            return header('/admin/comments');
        }
    }

    public function delete(int $id)
    {
        $this->isAdmin();

        $comment = new Comment($this->getDB());
        $result = $comment->delete($id);

        if ($result) {
            return header('Location: /admin/comments');
        }
    }
}
