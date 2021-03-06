<h1>Les derniers articles</h1>

<div id="articles-listing" class="row">
    <?php foreach ($params['posts'] as $post) : ?>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4 mb-3 mt-3">
                    <img src="/uploads/<?= htmlspecialchars($post->picture) ?>" 
                    class="img-fluid rounded-start" 
                    alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">
                            <?= htmlspecialchars($post->title) ?>
                        </h2>
                        <div>
                            <?php foreach ($post->getTags() as $tag) : ?>
                                <span class="badge bg-info">
                                    <a href="/tags/<?= (int)$tag->id ?>" class="text-white">
                                    <?= htmlspecialchars($tag->name) ?>
                                    </a>
                                </span>
                            <?php endforeach ?>
                        </div>
                        <small class="text-info">
                            Publié le <?= $post->getCreatedAt() ?>
                        </small>
                        <p class="card-text"><?= $post->getExcerpt() ?></p>
                        <a href="/posts/<?= (int)$post->id ?>" class="btn btn-primary">Lire l'article</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>