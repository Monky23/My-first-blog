<h1>Administration des articles</h1>

<a href="/admin/posts/create" class="btn btn-success my-3">Créer un nouvel article</a>
<a href="/admin/comments" class="btn btn-success my-3">controle des commentaires</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col md-6">#</th>
            <th scope="col md-12">Titre</th>
            <th scope="col md-6">Publié le</th>
            <th scope="col md-6">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['posts'] as $post) : ?>
            <tr>
                <th scope="row"><?= (int)$post->id ?></th>
                <td><?= htmlspecialchars($post->title) ?></td>
                <td><?= $post->getCreatedAt() ?></td>
                <td>
                    <a href="/admin/posts/edit/<?= (int)$post->id ?>" class="btn btn-warning">Modifier</a>
                    <form action="/admin/posts/delete/<?= (int)$post->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>