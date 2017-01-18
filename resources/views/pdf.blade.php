<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$articles->title}}</title>
</head>
<body>
<div class="container">
    <h2>{{$articles->title}}</h2>
    <p><i>Posted by {{$articles->user->name}} on {{$articles->created_at->formatLocalized('%A %d %B %Y - %H:%M')}}.</i></p>
    <p>{!! $articles->content !!}</p>
</div>
</body>
</html>