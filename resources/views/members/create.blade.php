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
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
      </div>
          
      @endif
    <div class="container">
        <h1>New Member</h1>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <form action="/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label >name</label>
                            <input type=text name=name class="form-control" value="{{old('name')}}"/>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label >image</label>
                            <input type=file name=image class="form-control"/>
                            @if ($errors->has('image'))
                                <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label >email</label>
                            <input type=email name=email class="form-control" value="{{old('email')}}"/>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label >phone</label>
                            <input type=text name=phone class="form-control" value="{{old('phone')}}"/>
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{$errors->first('phone')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-dark">submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>