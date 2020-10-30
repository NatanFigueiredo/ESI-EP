@include('templates.header', ['titulo' => 'SysCPE - Eleições'])


<main class="indexEleicoes">
    <div class="busca">
        <p class="titulo">Painel de Eleições</p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="dadosEleicao">
            <form action="{{ route('eleicao.novo') }}" method="post">
                @csrf
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-4">
                        <label for="titulo">Titulo da eleição:</label>
                        <input type="text" class="form-control" name="titulo"> 
                    </div>
                    <div class="form-group col-md-4">
                        <label for="status">Estado:</label>
                        <select name="flag_status" class="form-control" id="status" disabled>
                            <option value="0">Encerrada</option>
                            <option value="1">Aberta para candidatura</option>
                            <option value="2">Aberta para votação</option>
                        </select>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-3">
                        <label for="data_inicio">Data de Inicio:</label>
                        <input type="date" class="form-control" name="data_inicio"> 
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data_fim">Data de Encerramento:</label>
                        <input type="date" class="form-control" name="data_fim">
                    </div>
                </div>
                <div class="form-row justify-content-center divcargos">
                    <div class="form-check">
                        <input class="" type="checkbox" value="1" name="checkGeral">
                        <label class="" for="checkGeral">
                            Diretoria Geral
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="" type="checkbox" value="1" name="checkFiscal">
                        <label class="" for="defaultCheck1">
                            Conselho Fiscal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="" type="checkbox" value="1" name="checkJF">
                        <label class="" for="defaultCheck1">
                            Diretoria do Juridico-Financeiro
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="" type="checkbox" value="1" name="checkCMKT">
                        <label class="" for="defaultCheck1">
                            Diretoria de Comunicação e Marketing
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="" type="checkbox" value="1" name="checkInovaTec">
                        <label class="" for="defaultCheck1">
                            Diretoria de Inovação e Tecnologia
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="" type="checkbox" value="1" name="checkGP">
                        <label class="" for="defaultCheck1">
                            Diretoria de Gestão de Pessoas
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="" type="checkbox" value="1" name="checkPed">
                        <label class="" for="defaultCheck1">
                            Diretoria Pedagógica
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="" type="checkbox" value="1" name="checkProj">
                        <label class="" for="checkProj">
                            Diretoria de Projetos
                        </label>
                    </div>
                </div>
                <div class="form-row justify-content-center">
                    <div class="form-group botoes">
                        <button type="submit" class="salvar">
                            <img class="icon" src="{!! asset('img/icons/save.png') !!}">
                        </button>
                        <a href="" >
                            <img class="icon" src="{!! asset('img/icons/search.png') !!}">
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive tabela">
        <table class="table table-hover">
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
                @if(!is_null($eleicoes))
                @foreach($eleicoes as $e)
                <tr>
                    <td>{{$e->id}}</td>
                    <td>{{date("Y",strtotime($e->data_inicio))}}</td>
                    <td>{{$e->titulo}}</td>
                    @if($e->flag_status == 0)
                        <td>{{"Encerrada"}}</td>
                    @elseif($e->flag_status == 1)
                        <td>{{"Aberta para candidatura"}}</td>
                    @elseif($e->flag_status == 2)
                        <td>{{"Aberta para votação"}}</td>
                    @elseif($e->flag_status == -1)
                        <td>{{"Anulada"}}</td>    
                    @endif
                    <td class="text-center">
                        <a href="{{ route('eleicao.consultar',['id' => $e->id]) }} ">
                            <img class="icon" src="{!! asset('img/icons/edit.png') !!}">
                        </a>

                        @if($e->flag_status == 1)
                        <a href="{{ route('eleicao.chapa',['id' => $e->id]) }}">
                            <img class="icon" src="{!! asset('img/icons/candidatar.png') !!}">
                        </a>
                        @elseif($e->flag_status == 2)
                        <a href="{{ route('eleicao.votacao',['eleicao' => $e->id]) }}">
                            <img class="icon" src="{!! asset('img/icons/star.png') !!}">
                        </a>
                        @elseif($e->flag_status == 0)
                        <a href="" >
                            <img class="icon" src="{!! asset('img/icons/result.png') !!}">
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

</main>


@include('templates.footer')