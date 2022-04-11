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
    <form action="<?= isset($params['comment']) ? "/comments/edit/{$params['comment']->id}" : "/comments/create" ?>" method="post">
        <div>
            <label for="title">Donner un titre à votre commentaire :)</label><br />
            <input type="text" id="title" name="title" value="<?= $params['comment']->title ?? '' ?>" />
        </div>
        <div>
            <label for="pseudo">Auteur</label><br />
            <input type="text" id="pseudo" name="pseudo" value="<?= $params['comment']->pseudo ?? '' ?>" />
        </div>
        <div>
            <label for="content">Commentaire</label><br />
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</div>