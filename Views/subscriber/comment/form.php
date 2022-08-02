<h1><?= $params['comment']->title ?? 'Créer un commentaire' ?></h1>

<form action="<?= isset($params['comment']) ? "/subscriber/comments/edit/{$params['comment']->id}" : "/subscriber/comments/create" ?>" method="POST">
    <div class="form-group">
        <label for="title">Vous pouvez donnez un titre à votre commentaire</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['comment']->title ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="username" class="form-control" name="username" id="username" value="<?= $params['comment']->username ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" rows="8" class="form-control"><?= $params['comment']->content ?? '' ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($params['comment']) ? 'Enregistrer les modifications' : 'Enregistrer mon commentaire' ?></button>
</form>