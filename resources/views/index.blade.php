<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@extends('components.layout')
@section('content')
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <span class="navbar-brand">Source Developers</span>
        </div>
    </nav>
    <div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>SI</th>
                    <th>Photo</th> <!-- Photo column before name -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if ($category->photo)
                                <img src="{{ asset('storage/' . $category->photo) }}" alt="Category Photo" width="100">
                            @else
                                No Photo
                            @endif
                        </td> <!-- Display photo -->
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->email }}</td>
                        <td>{{ $category->phone_no }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('updating', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('deleting', $category) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('creating') }}" class="btn btn-primary">Create New</a>
    </div>
@endsection
</body>
</html>
