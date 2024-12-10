<!-- resources/views/source_members/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Source Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        input, textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="file"] {
            padding: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #ffcccc;
            border-radius: 5px;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Create New Source Member</h1>

        <!-- Display Validation Errors -->
        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Member Form -->
        <form action="{{ route('source_members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="des">Description:</label>
                <textarea id="des" name="des" required>{{ old('des') }}</textarea>
            </div>

            <div>
                <label for="img_url">Image URL:</label>
                <input type="file" id="img_url" name="img_url" required>
            </div>

            <div>
                <button type="submit">Create Member</button>
            </div>
        </form>
    </div>

</body>
</html>
