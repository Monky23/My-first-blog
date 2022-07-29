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
        <?php foreach ($params['comments'] as $comment) : ?>
            <tr>
                <th scope="row"><?= (int)$comment->id ?></th>
                <td><?= htmlspecialchars($comment->title) ?></td>
                <td><?= $comment->getCreatedAt() ?></td>
                <td>
                    <a href="/admin/comments/edit/<?= (int)$comment->id ?>" class="btn btn-warning">Modifier</a>
                    <form action="/admin/comments/delete/<?= (int)$comment->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>