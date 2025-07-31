{{--blade para edição de registros de Divisões--}}
@extends('layouts.app')
@section('content')
  <div class="card">
    <div class="card-header h4">

      Editando a Divisão/Serviço, registro nº {{$divisa->id}}
    </div>
    <div class="card-body">
        <div class="mx-auto p-2" style="width: 500px;">
            <form action="{{ route('divisas.update',['divisa'=>$divisa]) }}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $divisa->id }}">
                <label for="">Sigla</label><p>
                <input type="text" name="sigla" style="border-radius: 15px" value="{{old('sigla',$divisa->sigla)}}"> <br /><p>
               {{-- {{ $errors->has('sigla') ? $errors->first('sigla' : '') }} --}}
                <label for="">Descrição</label><br>
                {{--Colocar tamanho para esse input--}}
                <input type="text" name="descricao" size="60" style="border-radius: 15px" value="{{old('descricao',$divisa->descricao)}}"> <br /><p>
                @can('manager')<button type="submit" name="butao" class="btn btn-primary" style="border-radius: 25px">Salvar Alterações</button>@endcan
                @can('manager'){{-- <center><a href="{{ route('salvadivisa') }}" class="btn btn-primary" style="border-radius: 25px">Salvar</a></center> --}}@endcan
            </form>
        </div>
    </div>
  </div>
@endsection









