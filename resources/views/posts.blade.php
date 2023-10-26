<!doctype html>
<html>
    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>
    <title>My Blog</title>
    <body>
        <?php foreach ($posts as $post) : ?>
        <article>
            <h1>
            <a href="/posts/<?= $post->slug; ?>">
                <?=$post->title; ?></h1>
            </a>
            <div><?=$post->body; ?></div>
        </article>
        <?php endforeach; ?>
    </body>
</html>