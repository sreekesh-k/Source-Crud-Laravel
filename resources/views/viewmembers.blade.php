@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Members</title>
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
</head>
<body>
    <br><br>
    <div class="container">
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
    @foreach($sourcemembers as $member)
    <tr>
        <td>{{ $member->id }}</td>
        <td>{{ $member->name }}</td>
        <td>{{ $member->email }}</td>
        <td>{{ $member->phone }}</td>
        <td>{{ $member->description }}</td>
        <td>
            @if($member->image)
            <img src="{{ asset('storage/' . $member->image) }}" alt="Current Image" width="100" height="100" >
            @else
                No Image
            @endif
        </td>
        <td><a href="{{ route('edit', ['member' => $member]) }}" class="btn btn-primary">Edit</a></td>
        <td>
            <form method="POST" action="{{ route('destroy', ['member' => $member]) }}" onsubmit="return confirm('Are you sure you want to delete this member?');">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

        </table>
    </div>
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<br/>
<br/>
@endsection
