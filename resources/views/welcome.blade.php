<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="{{ route('users.deleteById') }}">    @csrf
    @method('DELETE')
    
    <label for="user_id">Enter User ID to Delete:</label>
    <input type="number" name="user_id" id="user_id" required>

    <button type="submit">Delete User</button>
</form>
<form method="POST" action="{{ route('users.store') }}">    @csrf
    @method('POST')
    
    <label for="user_name">Enter User name:</label>
    <input type="string" name="user_name" id="user_name" required>

    <label for="user_email">Enter User email:</label>
    <input type="string" name="user_email" id="user_email" required>


    <label for="user_password">Enter User password:</label>
    <input type="password" name="user_password" id="user_password" required>

    <button type="submit">Create User</button>
</form>

<form action="{{ route('users.show') }}" method="GET">
    <button type="submit">View All Users</button>
</form>
</body>
