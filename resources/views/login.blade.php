<!DOCTYPE html>
<html>
   <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SysCPE - Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
   </head>
   <body>
        <div class="card">
            <div class="card-header">
                <span class="titulo">SysCPE - Login</span>
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
                    <div class="botoes">
                        <button type="submit" class="">Login</button>
                        <a href="https://www.cursinhoeach.com.br">Voltar pro site do CPE</a>
                    </div>
                    </form>
            </div>
        </div>
      
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
   </body>
</html>