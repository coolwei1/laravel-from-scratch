<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>title</title>
</head>
<body>
<h1>Projects</h1>
<ul>
    @foreach($projects as $project)
        <li>{{$project->title}}</li>
    @endforeach
</ul>
</body>
</html>