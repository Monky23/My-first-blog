<h1><?= $params['post']->title ?></h1>
<div>
    <?php foreach ($params['post']->getTags() as $tag) : ?>
        <span class="badge bg-info"><a href="/tags/<?= $tag->id ?>" class="text-white"><?= $tag->name ?></a></span>
    <?php endforeach ?>
</div>
<p><?= $params['post']->content ?></p>
<a href="/posts" class="btn btn-secondary">Retourner en arrière</a>

<h2>Commentaires</h2>
<div>
    <?php foreach ($params['post']->getComments() as $comment) : ?>
        <h3><?= $comment->title ?></h3>
        <small><?= $comment->created_date ?></small>
        <p><?= $comment->pseudo ?></p>
        <p><?= $comment->content ?></p>
    <?php endforeach ?>
    <h3>Ajoutez un commentaire !</h3>

    <?php if (isset($_SESSION['auth'])) : ?>
        <a href="/subscriber/comments/create" class="btn btn-success my-3">ajouter un commentaire</a>
    <?php endif ?>