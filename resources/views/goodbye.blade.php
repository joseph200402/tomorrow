<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Good Bye</h1>
    <p>
        @if($gender == 'F')
            Miss
        @else
            Mr
        @endif
        {{ $name }}
    </p>
</body>
</html>