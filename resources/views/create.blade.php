@extends('layout')
@section('content')
<br><br>

<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1 class="text-center">Add Member</h1></div>
                <div class="card-body">
                    <!-- Display Success Message -->
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Form to Add Member -->
                    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            @error('name')
                            <div class="col-md-6 offset-md-4 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email">
                            </div>
                            @error('email')
                            <div class="col-md-6 offset-md-4 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                            </div>
                            @error('phone')
                            <div class="col-md-6 offset-md-4 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" rows="4" required>{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                            <div class="col-md-6 offset-md-4 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image" accept="image/*" required>
                            </div>
                            @error('image')
                            <div class="col-md-6 offset-md-4 text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br/><br/>
@endsection
