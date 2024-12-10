<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Source Members</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.6;
        }
        h1 {
            color: #333;
        }
        .membersList {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .memberWrapper {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            width: 250px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .memberWrapper img {
            max-width: 100%;
            border-radius: 50%;
            height: 100px;
            width: 100px;
            object-fit: cover;
        }
        .memberWrapper h3, .memberWrapper h4, .memberWrapper h5 {
            margin: 10px 0;
        }
        .memberWrapper div a {
            margin: 5px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 5px 10px;
            border-radius: 4px;
        }
        .memberWrapper div a:hover {
            background-color: #0056b3;
        }
        .addMember {
            margin-top: 20px;
        }
        .addMember a {
            text-decoration: none;
            color: white;
            background-color: #28a745;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .addMember a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Source Members</h1>

    <div class="membersList">
        @forelse($members as $member)
            <div class="memberWrapper">
                <img src="{{ $member->img_url }}" alt="{{ $member->name }}">
                <h3>{{ $member->name }}</h3>
                <h4>{{ $member->email }}</h4>
                <h5>{{ $member->des }}</h5>
                <div>
                    <a href="{{ route('source_members.edit', $member->id) }}">Edit</a>
                    <a href="{{ route('source_members.destroy', $member->id) }}" 
                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $member->id }}').submit();">Delete</a>
                    <form id="delete-form-{{ $member->id }}" action="{{ route('source_members.destroy', $member->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        @empty
            <p>No members found. <a href="{{ route('source_members.create') }}">Add a new member</a> to get started.</p>
        @endforelse
    </div>
    

    <div class="addMember">
        <a href="{{ route('source_members.create') }}">Add a New Member</a>
    </div>

</body>
</html>
