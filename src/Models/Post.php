<?php

namespace Models;

use DateTime;

class Post extends Model
{

    protected $table = 'posts';

    public function getCreatedAt(): string //à implémenter dans un Trait
    {
        return (new DateTime($this->created_date))->format('d/m/Y à H:i');
    }

    public function getExcerpt(): string
    {
        return substr($this->content, 0, 200) . '...';
    }

    public function getPublishedPosts(): array
    {
        return $this->query("SELECT * FROM {$this->table} 
        WHERE posts.published = 1
        ORDER BY created_date DESC");
    }

    public function getTags()
    {
        return $this->query("
            SELECT t.* FROM tags t
            INNER JOIN post_tag pt ON pt.tag_id = t.id
            WHERE pt.post_id = ?
        ", [$this->id]);
    }

    public function getComments()
    {
        return $this->query("
            SELECT c.* FROM comments c
            WHERE c.post_id = ?
            AND c.published = 1
        ", [$this->id]);
    }

    public function create(array $data, ?array $relations = null)
    {
        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();
        var_dump($id);

        foreach ($relations as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT post_tag (post_id, tag_id) VALUES (?, ?)");
            $stmt->execute([$id, $tagId]);
        }

        return true;
    }

    public function update(int $id, array $data, ?array $relations = null)
    {
        parent::update($id, $data);

        $stmt = $this->db->getPDO()->prepare("DELETE FROM post_tag WHERE post_id = ?");
        $result = $stmt->execute([$id]);

        foreach ($relations as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT post_tag (post_id, tag_id) 
            VALUES (?, ?)");
            $stmt->execute([$id, $tagId]);
        }

        if ($result) {
            return true;
        }
    }
}
