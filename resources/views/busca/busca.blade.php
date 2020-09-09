@extends('layouts.app')

@section('title', 'Busca Veículo')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buscar Veículos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('buscar') }}">
                        @csrf

                        <div class="form-group">
                            <label for="busca" class="col-form-label">{{ __('Digite aqui o termo que deseja buscar:') }}</label>

                            <input id="busca" type="text" class="form-control @error('busca') is-invalid @enderror" name="busca" value="{{ old('busca') }}" required autocomplete="busca" autofocus>

                            @error('busca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-baseline">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Buscar') }}
                            </button>
                            <p><a href="{{ route('exibir') }}">Clique aqui</a> para exibir todos os veículos!</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('error'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="alert alert-danger">
                    <h4 class="alert-heading">Erro!</h4>
                    <hr>
                    <p class="mb-0">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
@if (session('ok'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <div class="alert alert-success">
                    <h4 class="alert-heading">Sucesso!</h4>
                    <hr>
                    <p class="mb-0">Busca realizada com sucesso.</p>
                    <form method="POST" action="{{ route('exibir') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" id="resultado" name="resultado" rows="3" hidden>{{ session('ok') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Exibir Busca</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
