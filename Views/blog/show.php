<h1><?= htmlspecialchars($params['post']->title) ?></h1>
<div>
    <?php foreach ($params['post']->getTags() as $tag) : ?>
        <span class="badge bg-info"><a href="/tags/<?= $tag->id ?>" class="text-white"><?= htmlspecialchars($tag->name)?></a></span>
    <?php endforeach ?>
</div>
<p><?= nl2br(htmlspecialchars($params['post']->content)) ?></p>
<a href="/posts" class="btn btn-secondary">Retourner en arrière</a>