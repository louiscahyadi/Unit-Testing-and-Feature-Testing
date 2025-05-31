<!DOCTYPE html>
<html>
<head><title>Articles</title></head>
<body>
    <h1>Article List</h1>
    @foreach ($articles as $article)
        <p>{{ $article->title }}</p>
    @endforeach
</body>
</html>
