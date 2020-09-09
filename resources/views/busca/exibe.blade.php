@extends('layouts.app')

@section('title', 'Exibe Veículo')
@section('content')
<div class="container">
    <div class="mb-3 d-flex justify-content-between">
        <div class="buttons">
            <a href="{{ route('exibir') }}" class="btn btn-info mr-3">Exibir tudo</a>
            <a href="{{ route('capturar') }}" class="btn btn-info">Voltar para Busca</a>
        </div>
        @if (session('destroy'))
            <p class="text-danger font-weight-bold h4">{{ session('destroy') }}</p>
        @endif
    </div>
    <table class="table table-sm table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nome do Veículo</th>
                <th scope="col">Ano</th>
                <th scope="col">Combustível</th>
                <th scope="col">Portas</th>
                <th scope="col">Quilometragem</th>
                <th scope="col">Câmbio</th>
                <th scope="col">Cor</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($id as $carro)
                <tr>
                    <td><a href="{{ $carro->link }}" target="_blank">{{ $carro->nome_veiculo }}</a></td>
                    <td>{{ $carro->ano }}</td>
                    <td>{{ $carro->combustivel }}</td>
                    <td>{{ $carro->portas }}</td>
                    <td>{{ $carro->quilometragem }}</td>
                    <td>{{ $carro->cambio }}</td>
                    <td>{{ $carro->cor }}</td>
                    <td>
                        <form method="POST" action="{{ route('excluir', $carro->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>            
            @endforeach
        </tbody>
    </table>
</div>
@endsection
