<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Source members</title>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="/">Source Developrs</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            
          </ul>
        </div>
      </nav>
    <div class="container">
        <div class="text-right">
            <a href="member/create" class="btn btn-primary mt-2">add new members</a>
        </div>
        <h1>members</h1>
        <table class="table table-hover mt-4">
          <thead>
            <tr>
              <th>name</th>
              <th>image</th>
              <th>phone</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($members as $member)
              <tr>

              <td>{{$member->name}}</td>
              <td><img src="members/{{$member->image}}" class="rounded-circle" width="50" height="50"></td>
              <td>{{$member->phone}}</td>
              <td>{{$member->email}}</td>
              <td><a href="members/{{$member->id}}/edit" class="btn btn-primary">edit</a></td>
            </tr>
              @endforeach
          </tbody>
        </table>
    </div>
</body>
</html>