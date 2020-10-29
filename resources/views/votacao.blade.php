@include('templates.header')

<main class="votacao">
        <form action="" method="post">
            <p class="titulo">Votação: {eleição}</p>
            @include('templates.cedula_cargo')

            {{-- @each('',$cargos,'cargo') --}}

            <button type="submit" class="btn btn-primary mb-2 btnEncerrar">Encerrar voto</button>
        </form>
</main>

@include('templates.footer')