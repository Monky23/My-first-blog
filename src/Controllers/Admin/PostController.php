<?php

namespace Controllers\Admin;

use Controllers\Controller;
use Exception;
use Models\Post;
use Models\Tag;

class PostController extends Controller
{

    public function index()
    {
        try {
            $this->isAdmin();

            $posts = (new Post($this->getDB()))->all();
    
            return $this->view('admin.post.index', compact('posts'));
        } catch (Exception $e) {
            // retourner une erreur
        }

    }

    public function create()
    {
        $this->isAdmin();

        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.post.form', compact('tags'));
    }

    public function createPost()
    {
        try {
            $this->isAdmin();

            $post = new Post($this->getDB());

            $this->getUploadFile();

            $tags = array_pop($_POST);
            $array = $_POST;
            $array['picture'] = $_FILES['picture']['name'];

            $result = $post->create($array, $tags);

            if ($result) {
                return header('Location: /admin/posts');
            }
        } catch (Exception $e) {
            // retourner une erreur
        }
    }

    public function edit(int $id)
    {
        $this->isAdmin();

        $post = (new Post($this->getDB()))->findById($id);
        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.post.form', compact('post', 'tags'));
    }

    public function update(int $id)
    {
        $this->isAdmin();

        $post = new Post($this->getDB());

        $this->getUploadFile();

        $tags = array_pop($_POST);
        $array = $_POST;
        $array['picture'] = $_FILES['picture']['name'];

        $result = $post->update($id, $array, $tags);

        if ($result) {
            return header('Location: /admin/posts');
        }
    }

    public function delete(int $id)
    {
        $this->isAdmin();

        $post = new Post($this->getDB());
        $result = $post->delete($id);

        if ($result) {
            return header('Location: /admin/posts');
        }
    }

    public function getUploadFile()
    {
        $uploaddir = 'uploads/';

        $uploadfile = $uploaddir . basename($_FILES['picture']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile)) {
            echo "Le fichier est valide, et a été téléchargé
                   avec succès. Voici plus d'informations :\n";
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
                  Voici plus d'informations :\n";
        }

        echo '<pre>';
    }

}

