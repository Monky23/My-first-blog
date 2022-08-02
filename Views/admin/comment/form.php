<h2>Un commentaire</h2>
<h3><?= $params['comment']->title ?? 'Exprimez-vous à l\'aide de ce formulaire' ?></h3>

<form action="<?= isset($params['comment']) ? "/admin/comments/edit/{$params['comment']->id}" : "/admin/comments/create" ?>" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="post_id" id="post_id" value="<?= (int)$params['comment']->post_id ?>">
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

        <div class="form-check form-group">
            <input type="hidden" name="published" value="0">
            <input type="checkbox" name="published" value="1" class="form-check-input" id="published">
            <label class="form-check-label" for="published">Approuvé</label>
        </div>

    </div>
    <button type="submit" class="btn btn-primary"><?= isset($params['comment']) ? 'Enregistrer les modifications' : 'Enregistrer mon commentaire' ?></button>
</form>