@include('templates.header')


<main class="indexPessoas">
    <div class="busca">
        <p class="titulo">Painel de pessoas da entidade</p>
        <form action="" method="get">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" class="textBox"> 
            </div>
            <div class="form-group">
                <label for="funcao">Função</label>
                <input type="text" class="form-control" id="funcao">
            </div>
            <div class="botoes">
                <a href="" >
                    <img class="icon" src="{!! asset('img/icons/plus.png') !!}">
                </a>
                <a href="" >
                    <img class="icon" src="{!! asset('img/icons/search.png') !!}">
                </a>
            </div>
        </form>
    </div>
    <div class="tabela">
        <table class="table table-responsive-xl">
            <thead>
                <tr class="table-warning">
                <td>ID</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Função</td>
                <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($pessoa as $p)
                <tr>
                    <td>{{$p->idpessoa}}</td>
                    @if (!is_null($p->nomesocial))
                        <td>{{$p->nomesocial}}</td>
                    @else
                        <td>{{$p->nomecivil}}</td>
                    @endif
                    <td>{{$p->email}}</td>
                    <td>{{$p->funcao}}</td>
                    <td class="text-center">
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</main>


@include('templates.footer')