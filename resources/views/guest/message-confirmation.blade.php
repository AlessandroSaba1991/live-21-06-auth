<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Confirmation</title>
</head>
<body>
<div class="container py-5">
    @if(session('message'))
    <h1 class="py-5">{{session('message')}}</h1>
    <a class="btn btn-primary" href="/">Go Back</a>
    @endif
</div>
</body>
</html>
