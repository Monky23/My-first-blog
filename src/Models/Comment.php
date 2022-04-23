<?php

namespace Models;

class Comment extends Model
{

    protected $table = 'comments';

    public function getByPost(string $post): Comment
    {
        return $this->query("SELECT * FROM {$this->table} WHERE post_id = ?", [$post], true);
    }
}
