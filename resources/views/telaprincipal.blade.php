@include('templates.header', ['titulo' => 'SysCPE - Principal'])


<main class="principal">
    <div class="content">
        <div class="recepcao">
            <div class="titulo"> <span>Oi! Tudo bem?</span> </div>
            <div class="titulo"> <span>Bem vinde ao SysCPE</span> </div>
        </div>
        <div class="atalhos">
            <p class="texto">Aqui estão alguns atalhos que podem ser uteis para você</p>
            <a href="{{ url('/pessoa/meusdados',['id' => session('id')]) }}" class="btn btn-primary mb-2">Meus Dados</a>
            <a href="{{ url('/eleicoes') }}" class="btn btn-primary mt-2">Votar em eleição</a>
        </div>
    </div>
    <div class="atena">
        <img src="{!! asset('img/atena_camisaazul.png') !!}">
    </div>

</main>


@include('templates.footer')
