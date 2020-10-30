@include('templates.header', ['titulo' => 'SysCPE - Pessoas'])


<main class="indexPessoas">
    <div class="busca">
        <p class="titulo">Painel de pessoas da entidade</p>
        <form action="" method="get">
            <div class="form-row justify-content-center">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" class="textBox"> 
                </div>
                <div class="form-group col-md-3">
                    <label for="funcao">Função</label>
                    <input type="text" class="form-control" id="funcao">
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div class="botoes">
                    <a href=" {{ url('/pessoa/novo') }} " >
                        <img class="icon" src="{!! asset('img/icons/plus.png') !!}">
                    </a>
                    <a href="" >
                        <img class="icon" src="{!! asset('img/icons/search.png') !!}">
                    </a>
                </div>
            </div>
        </form>
    </div>
    <div class="tabela table-responsive">
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
                    <td>{{$p->id}}</td>
                    @if (!is_null($p->nomesocial))
                        <td>{{$p->nomesocial}}</td>
                    @else
                        <td>{{$p->nomecivil}}</td>
                    @endif
                    <td>{{$p->email}}</td>
                    <td>{{$p->funcao}}</td>
                    <td class="text-center">
                        <a href="{{ route('membro.consultar',['id' => $p->id]) }}" >
                            <img class="icon" src="{!! asset('img/icons/edit.png') !!}">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</main>


@include('templates.footer')