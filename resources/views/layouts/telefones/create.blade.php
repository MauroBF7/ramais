{{--blade para criação de Rmais--}}
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header h4">
            Cadastrando Ramais
        </div>
        <div class="card-body">
            <div class="mx-auto p-2" style="width: 500px;">
                <form action="{{ route('telefones.store') }}" method="post">
                    @csrf
                    <label for="">Ramal</label><p>
                    <input type="text" name="ramaln" style="border-radius: 15px"> <br /><p>
                    <label for="">Responsável</label><br>
                    <input type="text" name="responsa" size="40" style="border-radius: 15px"> <br /><p>
                    <label for="">Divisão</label><br>
                    <select name="divisas_id" class="form-control" style="border-radius: 15px">
                    @foreach($divisas as $divisa)
                        <option value={{ $divisa->id }}>{{ $divisa->sigla}}</option>
                    @endforeach
                    </select><p>
                    {{--inserir botão para cadastrar--}}
                    <label for="">Seção</label><br>
                    <input type="text" name="secao" size="60" style="border-radius: 15px"> <br /><br />
                    <label for="">Endereço</label><br>
                    <select name="enderecos_id" class="form-control" style="border-radius: 15px">
                    @foreach($enderecos as $endereco)
                        <option value={{ $endereco->id }}>{{ $endereco->local}}</option>
                    @endforeach
                    </select></p>
               {{--colocar o endereço por vue --}}
                    <button type="submit" name="butao" class="btn btn-primary" style="border-radius: 25px">Salvar</button>
                </form>
            </div>
        </div>
    </div>
@endsection









