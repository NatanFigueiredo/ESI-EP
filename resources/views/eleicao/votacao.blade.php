@include('templates.header',['titulo'=>'SysCPE - Votação'])

<main class="votacao">
    <div class="titulo"> 
        <span>Votação: {{ $eleicao->titulo }}</span> 
    </div>

    <div class="cedula card">
    <form action= "{{route('eleicao.registravoto', ['eleicao'=>$eleicao->id])}}" method="post">
        @csrf
        @foreach ($arrayFinal as $cargo)
        <div class="form-row justify-content-center">
            <div class="form-group cargoCedula col-md-6">
                <label for="cargo">{{ $cargo['cargo'] }}</label>
                <select name="{{ $cargo['id'] }}" class="form-control" id="flag_status" required"> 
                    @foreach ($cargo['chapas'] as $chapa)
                    <option value="{{$chapa['id']}}">{{$chapa['nome']}} | 
                        @if($chapa['titular'])
                            {{$chapa['titular']}} 
                            @if(isset($chapa['suplente']))
                                e {{$chapa['suplente']}}
                            @endif
                        @endif
                    </option>
                    @endforeach

                    <option value="0">Voto branco</option>
                </select>
            </div>
        </div>     
        @endforeach

        <div class="form-row justify-content-center">
            <div class="form-group botoes">
                <button type="submit" class="btn btn-primary mb-2 btnEncerrar">Encerrar voto</button>
            </div>
        </div>

        {{-- @each('',$cargos,'cargo') --}}

        
    </form>
    </div>
</main>

@include('templates.footer')