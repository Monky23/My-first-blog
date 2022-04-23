<h1><?= htmlspecialchars($params['post']->title) ?></h1>
<div>
    <?php foreach ($params['post']->getTags() as $tag) : ?>
        <span class="badge bg-info"><a href="/tags/<?= $tag->id ?>" class="text-white"><?= $tag->name ?></a></span>
    <?php endforeach ?>
    <small class="text-info">Publié le <?= $params['post']->getCreatedAt() ?></small>
</div>
<p><?= nl2br(htmlspecialchars($params['post']->content)) ?></p>
<a href="/posts" class="btn btn-secondary">Les derniers articles</a>

<h2>Commentaires</h2>
<div id="comments-listing" class="row">
    <?php foreach ($params['post']->getComments() as $comment) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5><?= $comment->title ?></h5>
                <p class="badge bg-dark">De: <?= $comment->username ?></p><br>
                <small class="text-info">Dernière modification le:
                    <?= $comment->created_date ?></small>
                <p><?= $comment->content ?></p>
                <?php if (isset($_SESSION['auth'])) : ?>
                    <a href="/subscriber/comments/edit/<?= $comment->id ?>" class="btn btn-warning">Modifier</a>
                    <form action="/subscriber/comments/delete/<?= $comment->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form><br>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>

    <?php if (isset($_SESSION['auth'])) : ?>
        <h2>Un commentaire?</h2>
        <h3><?= $params['comment']->title ?? 'Créer un commentaire' ?></h3>

        <form action="<?= isset($params['comment']) ? "/subscriber/comments/edit/{$params['comment']->id}" : "/subscriber/comments/create" ?>" method="POST">
            <div class="form-group">
                <input type="hidden" class="form-control" name="post_id" id="post_id" value="<?= (int)$params['post']->id ?>">
            </div>
            <div class="form-group">
                <label for="title">Vous pouvez donnez un titre à votre commentaire</label>
                <input type="text" class="form-control" name="title" id="title" value="<?= $params['comment']->title ?? '' ?>">
            </div>
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="username" class="form-control" name="username" id="username" value="<?= $params['comment']->username ?? '' ?>">
            </div>
            <div class="form-group">
                <label for="content">Saisissez votre commentaire ici</label>
                <textarea name="content" id="content" rows="8" class="form-control"><?= $params['comment']->content ?? '' ?></textarea>
            </div>
            <div class="form-group">

            </div>
            <button type="submit" class="btn btn-primary"><?= isset($params['comment']) ? 'Enregistrer les modifications' : 'Enregistrer mon commentaire' ?></button>
        </form>

    <?php endif ?>

    <a href="/login" class="btn btn-success my-3">ajouter un commentaire</a>