<h2><?= $params['post']->title ?? 'Créer un nouvel article' ?></h2>

<form action="<?= isset($params['post']) ? "/admin/posts/edit/{$params['post']->id}" 
: "/admin/posts/create/" ?>" enctype="multipart/form-data" method="POST">
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" 
        value="<?= $params['post']->title ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="chapo">Chapô de l'article</label>
        <textarea name="chapo" id="chapo" rows="8" class="form-control">
            <?= $params['post']->chapo ?? '' ?>
        </textarea>
    </div>
    <div class="mb-3 form-group">
        <label for="picture" class="form-group">image de l'article</label><br>
        <img src="/uploads/<?= $params['post']->picture ?? '' ?>" alt="" width="80%">
        <input type="file" class="form-control" id="picture" name="picture" 
        value="<?= $params['post']->title ?? '' ?>"/>
    </div>
    <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" rows="8" class="form-control">
            <?= $params['post']->content ?? '' ?>
        </textarea>
    </div>
    <div class="form-check form-group">
        <input type="hidden" name="published" value="0">
        <input type="checkbox" name="published" value="1" class="form-check-input" 
        id="published">
        <label class="form-check-label" for="published">Publier</label>
    </div>
    <div class="form-group">
        <label for="tags">Tags de l'article</label>
        <select multiple class="form-control" id="tags" name="tags[]">
            <?php foreach ($params['tags'] as $tag) : ?>
                <option value="<?= (int)$tag->id ?>"
                <?php if (isset($params['post'])) : ?>
                <?php foreach ($params['post']->getTags() as $postTag) {
                    echo ((int)$tag->id === (int)$postTag->id) ? 'selected' : '';
                }
                ?>
                <?php endif ?>><?= htmlspecialchars($tag->name) ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <input type="submit" class="btn btn-primary"><?= isset($params['post']) ?
    'Enregistrer les modifications' : 'Enregistrer mon article' ?>
</form>
<?php if (isset($params['post'])) : ?>
<h2>Commentaires</h2>
    <div id="comments-listing" class="row">
        <?php foreach ($params['post']->getPublichedComments() as $comment) : ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5><?= htmlspecialchars($comment->title) ?></h5>
                <p class="badge bg-dark">
                    De: <?= htmlspecialchars($comment->username) ?>
                </p><br>
                <small class="text-info">Dernière modification le:
                    <?= $comment->created_date ?></small>
                <p><?= nl2br(htmlspecialchars($comment->content)) ?></p>

                <a href="/admin/comments/edit/<?= (int)$comment->id ?>" class="btn btn-warning">Modifier</a>
                <form action="/admin/comments/delete/<?= (int)$comment->id ?>" method="POST" class="d-inline">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form><br>

        </div>
    </div>
        <?php endforeach ?>
<?php endif ?>