@include('templates.header')


<main class="indexEleicoes">
    <div class="busca">
        <p class="titulo">Painel de Eleições</p>
        <form action="" method="get">
            <div class="form-group">
                <label for="titulo">Titulo da eleição:</label>
                <input type="text" class="form-control" id="titulo"> 
            </div>
            <div class="form-group">
                <label for="status">Estado:</label>
                <input type="text" class="form-control" id="status">
            </div>
            <div class="form-group">
                <label for="data_inicio">Data de Inicio:</label>
                <input type="text" class="form-control" id="data_inicio"> 
            </div>
            <div class="form-group">
                <label for="data_fim">Data de Encerramento:</label>
                <input type="text" class="form-control" id="data_fim">
            </div>
            <div class="botoes">
                <a href="" >
                    <img class="icon" src="{!! asset('img/icons/plus.png') !!}">
                </a>
                <a href="" >
                    <img class="icon" src="{!! asset('img/icons/search.png') !!}">
                </a>
                <a href="" >
                    <img class="icon" src="{!! asset('img/icons/graph.png') !!}">
                </a>
            </div>
        </form>
    </div>
    <div class="tabela">
        <table class="table table-hover table-responsive-xl">
            <thead>
                <tr>
                <td>ID</td>
                <td>Ano</td>
                <td>Titulo</td>
                <td>Estado</td>
                <td class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @if(!is_null($eleicoes ?? null))
                @foreach($eleicoes as $e)
                <tr>
                    <td>{{$e->ideleicao}}</td>
                    <td>{{date("Y",strtotime($e->data_inicio))}}</td>
                    <td>{{$e->titulo}}</td>
                    @if($e->status = 0)
                        <td>{{'Encerrada'}}</td>
                    @elseif($e->status = 1)
                        <td>{{'Aberta para candidatura'}}</td>
                    @elseif($e->status = 2)
                        <td>{{'Aberta para votação'}}</td>
                    @elseif($e->estado = -1)
                        <td>{{'Anulada'}}</td>    
                    @endif
                    <td class="text-center">
                        <a href=" " class="btn btn-primary btn-sm"">Editar</a>
                        <a href=" " class="btn btn-primary btn-sm"">Votar</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

</main>


@include('templates.footer')