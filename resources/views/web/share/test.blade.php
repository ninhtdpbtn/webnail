<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST" action="{{route('test_validate')}}">
    @csrf
    @error('date')
    {{ $message }}
    @enderror
    <input type="datetime-local" name="date">
    <input type="submit">
</form>

</body>
</html>