<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Update Category</span>
        </div>
    </nav>

    <div class="container mt-4">
       
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <form action="{{ route('update.confirm', ['category' => $category->id]) }}" method="POST" class="ms-auto me-auto" style="width: 400px;">
            @csrf
            @method('PUT') 

           
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name"
                    value="{{ $category->name }}" required>
            </div>

          
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                    value="{{ $category->email }}" required>
            </div>

            
            <div class="mb-3">
                <label for="phone_no" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter phone number"
                    value="{{ $category->phone_no }}" required>
            </div>

        
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Enter description" required>{{ $category->description }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
