<?php

namespace Models;
use DateTime;

class Comment extends Model
{

    protected $table = 'comments';

    public function getCreatedAt(): string //à implémenter dans un Trait
    {
        return (new DateTime($this->created_date))->format('d/m/Y à H:i');
    }

    public function getByPost(string $post): Comment
    {
        return $this->query("SELECT * FROM {$this->table} 
        WHERE post_id = ?", [$post], true);
    }

    public function getUnpublishedComments(): array
    {
        return $this->query("SELECT * FROM {$this->table} 
        WHERE comments.published = 0
        ORDER BY created_date DESC");
    }
}
