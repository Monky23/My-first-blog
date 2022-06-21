<?php

namespace Models;

class Comment extends Model
{

    protected $table = 'comments';

    public function getByPost(string $post): Comment
    {
        return $this->query("SELECT * FROM {$this->table} 
        WHERE post_id = ?", [$post], true);
    }

    /*public function getPublishedCommentsByPosts(): array
    {
        return $this->query("SELECT * FROM {$this->table} 
        WHERE comments.published = 1
        ORDER BY created_date DESC");
    }*/

    public function getPostByComment()
    {
        return $this->query(
            "
            SELECT p.* FROM posts p
            WHERE comment.post_id = p.id",
            [$this->id]
        );
    }
}
