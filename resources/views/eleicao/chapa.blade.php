@include('templates.header',['titulo' => 'SysCPE - Nova Chapa'])

<main class="dadosChapa">
    <p class="titulo">Nova Chapa</p>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form action="{{ route('eleicao.salvarchapa',['id' => $id]) }}" method="post">
        @csrf
        <div class="chapa">
            <label for="nome">Nome da chapa:</label>
            <input type="text" name="nome">
            
            <label for="cargo">Cargo:</label>
            <select name="cargo" id="cargo">
                @foreach($cargos as $c)
                <option value="{{ $c->id }}"> {{ $c->cargo }} </option>
                @endforeach
            </select>
        </div>
        <div class="candidatos">
            <div class="titular">
                <label for="titular">Nome da pessoa titular:</label>
                <input type="text" name="titular">
                <label for="cpf_t">CPF:</label>
                <input type="text" name="cpf_t">
            </div>
            <div class="suplente">
                <label for="suplente">Nome da pessoa suplente:</label>
                <input type="text" name="suplente">
                <label for="cpf_s">CPF:</label>
                <input type="text" name="cpf_s">
            </div>
        </div>

        <div class="botoes">
            <button type="submit">
                <img class="icon" src="{!! asset('img/icons/save.png') !!}">
            </button>
            <a href="{{ url('/eleicoes') }}" >
                <img class="icon" src="{!! asset('img/icons/close.png') !!}">
            </a>
        </div>
    </form>
</main>

@include('templates.footer')
