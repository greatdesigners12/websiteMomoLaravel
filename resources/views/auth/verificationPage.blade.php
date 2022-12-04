<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification</title>
</head>
<body>
    @if ($status == "verified")
        <form action="{{route('verifyUser')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$_GET['id']}}">
            <button type="submit">Verify</button>
        </form>
    @else
        Invalid verification token
    @endif
    
</body>
</html>