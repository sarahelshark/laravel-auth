<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Lead Message</title>
</head>
<body>

    <h1>
        You received a new message:
        {{$lead[$name]}}

    </h1>

    <p>
        Email:
        {{$lead[$email]}}

    </p>

    <div>
        {{$lead[$message]}}

    </div>
    
</body>
</html>