@include('templates.header', ['titulo' => 'SysCPE - Pessoas'])
<main class="dadosPessoa">

    <div class="titulo"> 
        @if (!is_null($pessoa->nomesocial))
            <span>Dados de {{ $pessoa->nomesocial}}</span> 
        @else
            <span>Dados de {{ $pessoa->nomecivil}}</span>
        @endif
    </div>
    <div class="pessoa card">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form action="{{ route('membro.editar',['id' => $pessoa->id]) }}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="idpessoa">ID</label>
                <input type="text" class="form-control" name="idpessoa" value="{{ $pessoa->id }}" disabled>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nomecivil">Nome Civil:</label>
                <input type="text" class="form-control" name="nomecivil" value="{{ $pessoa->nomecivil }}">
            </div>

            <div class="form-group col-md-6">
                <label for="nomesocial">Nome Social:</label>
                <input type="text" class="form-control" name="nomesocial" value="{{ $pessoa->nomesocial }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="rg">RG:</label>
                <input type="text" class="form-control" name="rg" value="{{ $pessoa->rg }}">
            </div>
            <div class="form-group col-md-4">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" value="{{ $pessoa->rg }}">
            </div>
            <div class="form-group col-md-4">
                <label for="data_nasc">Data de Nascimento:</label>
                <input type="date" class="form-control" name="data_nasc" value="{{ $pessoa->data_nasc }}">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ $pessoa->email }}">
            </div>
            <div class="form-group col-md-4">
                <label for="celular">Celular:</label>
                <input type="number" class="form-control" name="celular" value="{{ $pessoa->celular }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="funcao">Função:</label>
                <input type="text" class="form-control" name="funcao" value="{{ $pessoa->funcao }}">
            </div>
            <div class="form-group col-md-4">
                <label for="flag_status">Estado:</label>
                <select name="flag_status" class="form-control" id="flag_status" value="{{ $pessoa->status }} required"> 
                    <option value="0">Desligado</option>
                    <option value="1">Ativo</option>
                    <option value="2">Para aprovar</option>
                </select>
            </div>
        </div>  

        <div class="botoesp">
            <button type="submit" class="salvar">
                <img class="icon" src="{!! asset('img/icons/save.png') !!}">
            </button>
            <a href="{{ url('/pessoa') }}" >
                <img class="icon" src="{!! asset('img/icons/close.png') !!}">
            </a>
        </div>
    </form>
    </div>
</main>

@include('templates.footer')