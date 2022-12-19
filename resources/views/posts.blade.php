<!DOCTYPE html>
<title>Muy blog</title>
<link rel="stylesheet" href="/app.css">

<body>
<?php foreach ($posts as $post) : ?>
<article>
    {!! $post !!}
</article>

<? endforeach; ?>

</body>

</html>