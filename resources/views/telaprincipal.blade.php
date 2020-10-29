@include('templates.header')


<main class="principal">
    <div class="content">
        <div class="recepcao">
            <p class="titulo">Oi {{ $nome ?? '' }}!</p> 
            <p class="titulo">Bem vinde ao SysCPE</p>
        </div>
        <div class="atalhos">
            <p class="texto">Aqui estão alguns atalhos que podem ser uteis para você</p>
            <button type="button" name="btnDados" class="btn btn-primary">Meus Dados</button><br>
            <button type="button" name="btnVotar" class="btn btn-primary">Votar em eleição</button>
        </div>
    </div>
    <div class="atena">
        <img src="{!! asset('img/logomarca-c.svg') !!}">
    </div>

</main>


@include('templates.footer')
