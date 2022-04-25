<h2><?= $params['post']->title ?? 'Créer un nouvel article' ?></h2>

<form action="<?= isset($params['post']) ? "/admin/posts/edit/{$params['post']->id}" 
: "/admin/posts/create" ?>" enctype="multipart/form-data" method="POST">
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
    <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" rows="8" class="form-control">
            <?= $params['post']->content ?? '' ?>
        </textarea>
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
    <div class="mb-3  form-group">
        <img src="uploads/<?= $params['post']->ft_image ?? '' ?>" alt="">
        <label for="ft_image" class="form-label">Image de l'article</label>
        <input type="file" class="form-control" id="ft_image" name="ft_image" 
        value="<?= $params['post']->ft_image ?? '' ?>" />
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($params['post']) ?
    'Enregistrer les modifications' : 'Enregistrer mon article' ?></button>
</form>