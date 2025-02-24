<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
    <h1>All Users</h1>

    @if ($users->isEmpty())
        <p>No users found.</p>
    @else
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->id }} - {{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ url('/') }}">Back to Home</a>
</body>
</html>