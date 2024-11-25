{{-- View principal dos Telefones --}}
@extends('layouts.app')

@section('content')
<script>
    function confirmaDelete(){
        return confirm("Certeza de apagar esse registro?");
    }
</script>
    <div class="card">
        <div class="card-header h4">Telefones PRIP Cadastrados
            <button type="button" class="btn btn-secundary float-right">
            <a href="{{ route('telefones.exportacao') }}" target="_blank">
            <i class="fa fa-file-pdf" aria-hidden="true" title="Lista PDF"></i></button></a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col-sm-2">ID</th>
                    <th scope="col-4">RAMAL</th>
                    <th scope="col-1">RESPONSÁVEL</th>
                    <th scope="col-6">DIVISÃO</th>
                    <th scope="col-1">SEÇÃO</th>
                    <th scope="col-1">LOCAL</th>
                    <th scope="col-1">ALTERAR</th>
                    <th scope="col-1">AÇÃO</th>
                  </tr>
                </thead>
                <tbody>
                @csrf
            @foreach ($telefones as $telefone)
                  <tr>
                    <td size="3"><a href="{{ route('telefones.edit',['telefone'=>$telefone, 'divisas'=>$divisas]) }}"> {{ $telefone->id }}</a></td>

                    <td>{{ $telefone->ramaln }}</td>
                    <td>{{ $telefone->responsa }}</td>
                    <td>@forelse($divisas as $divisa)
                         {{ $telefone->divisas_id == $divisa->id ? $divisa->sigla : ''}}
                        @empty
                            Sem divisão
                        @endforelse
                    </td>
                    <td>{{ $telefone->secao }}</td>
                    <td>
                        @forelse($enderecos as $endereco)
                            {{ $telefone->enderecos_id == $endereco->id ? $endereco->local : ''}}
                        @empty
                            Sem divisão
                        @endforelse
                    </td>
                    <td>
                        <a href="{{ route('telefone.troca',['telefone'=>$telefone, 'divisas'=>$divisas]) }}">
                           {{-- <a href="{{ route('/telefones/testroute') }}"> --}}
                            <i class="fa fa-edit" aria-hidden="true" title="Solicitar alteração"></a></td>
                    <form id="form_{{$telefone->id}}" method="post" action="{{ route('telefones.destroy', $telefone->id) }}" onsubmit="return confirmaDelete();">
                        @csrf
                        @method('DELETE')
                         <td>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true" title="apagar registro"></i></button>
                    </form>

                    </td>
                  </tr>
            @endforeach
        </tbody>
        </table>
    </div>
       <div class="card-footer">
            {{-- $telefones->appends($request)->links() }} <br> --}}
            Exibindo {{ $telefones->count() }} ramais de {{$telefones->total() }} (de
            {{ $telefones->firstItem() }} a {{ $telefones->lastItem() }})
        </div>

    </div>


@endsection
