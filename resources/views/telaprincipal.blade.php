@include('templates.header', ['titulo' => 'SysCPE - Principal'])


<main class="principal">
    <div class="content">
        <div class="recepcao">
            <div class="titulo"> <span>Oi {{ $nome ?? '{nome}' }}!</span> </div>
            <div class="titulo"> <span>Bem vinde ao SysCPE</span> </div>
        </div>
        <div class="atalhos">
            <p class="texto">Aqui estão alguns atalhos que podem ser uteis para você</p>
            <a href="" class="btn btn-primary">Meus Dados</a>
            <button type="button" name="btnVotar" class="btn btn-primary">Votar em eleição</button>
        </div>
    </div>
    <div class="atena">
        <img src="{!! asset('img/atena_camisaazul.png') !!}">
    </div>

</main>


@include('templates.footer')
