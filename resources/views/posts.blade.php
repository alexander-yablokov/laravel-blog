<!DOCTYPE html>
<title>Muy blog</title>
<link rel="stylesheet" href="/app.css">

<body>
<?php foreach ($posts as $post) : ?>
<article>
    <h1><a href="/posts/<?= $post->slug ?>">{!! $post->title !!}</a></h1>
    <p><?= $post->excerpt ?></>
</article>

<? endforeach; ?>

</body>

</html>