<h1><?= $params['post']->title ?></h1>
<div>
    <?php foreach ($params['post']->getTags() as $tag) : ?>
        <span class="badge bg-info"><a href="/tags/<?= $tag->id ?>" class="text-white"><?= $tag->name ?></a></span>
    <?php endforeach ?>
</div>
<p><?= $params['post']->content ?></p>
<a href="/posts" class="btn btn-secondary">Retourner en arrière</a>