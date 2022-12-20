<!DOCTYPE html>
<title>My blog</title>
<link rel="stylesheet" href="/app.css">

<body>
<article>
    <h1>{!! $post->title !!}</h1>
    <p><?= $post->body ?></>
</article>
    <a href="/">Back</a>
</body>

</html>