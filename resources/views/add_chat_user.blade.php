<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User to Chat</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Add User to Chat</h1>
        <form method="POST" action="{{ route('addChatUser') }}">
    @csrf
    <input type="hidden" name="user_id" value="{{ $id }}">
    <button type="submit" class="btn btn-success">Add to Chat</button>
</form>

    </div>
</body>
</html>
