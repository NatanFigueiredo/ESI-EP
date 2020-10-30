@include('templates.header', ['titulo' => 'SysCPE - Principal'])


<main class="principal">

    <div class="card">
        <div class="titulo"> 
                <span>Alterando sua senha</span> 
        </div>
        <form action="{{route('salvarsenha',['id' => $login->id])}}" method="post">
        @csrf
            <div class="form-row">
            <div class="form-group col-md-5">
                <label for="login">Seu Login:</label>
                <input type="text" class="form-control" name="login" disabled>
            </div></div>
            <div class="form-row">
            <div class="form-group col-md-5">
                <label for="senhaAntiga">Senha Atual:</label>
                <input type="password" class="form-control" name="senhaAntiga">
            </div></div>
            <div class="form-row">
            <div class="form-group col-md-5">
                <label for="novaSenha">Nova Senha:</label>
                <input type="password" class="form-control" name="novaSenha">
            </div></div>
            
            <div class="botoesp">
            <button type="submit" class="salvar">
                <img class="icon" src="{!! asset('img/icons/save.png') !!}">
            </button>
            <a href="{{ url('/principal') }}" >
                <img class="icon" src="{!! asset('img/icons/close.png') !!}">
            </a>
            </div>>
        </form>
    </div>

</main>


@include('templates.footer')