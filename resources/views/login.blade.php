<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Laravel 7/6 CRUD App Example</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
        <style>
            .container {
            max-width: 450px;
            }
            .push-top {
            margin-top: 50px;
            }
        </style>

        <div class="card push-top">
        <div class="card-header">
            Add User
        </div>

        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="{{ route('login') }}">
                <div class="form-group">
                    @csrf
                    <label for="login">Login</label>
                    <input type="text" class="form-control" name="login"/>
                </div>
                <div class="form-group">
                    <label for="senha">Email</label>
                    <input type="password" class="form-control" name="senha"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Login</button>
            </form>
        </div>
        </div>
      </div>
      
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
   </body>
</html>