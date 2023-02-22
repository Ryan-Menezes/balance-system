@extends('adminlte::page')

@section('content_header')
    <div class="d-flex align-items-center justify-content-end mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Início</a>
            </li>
            <li class="breadcrumb-item active">
                Histórico
            </li>
        </ol>
    </div>
@stop

@section('content')
    @include('admin.includes.alerts')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h1>Histórico</h1>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Valor(R$)</th>
                        <th>Tipo</th>
                        <th>?sender?</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($historics as $historic)
                        <tr>
                            <td>{{ $historic->id }}</td>
                            <td>{{ number_format($historic->amount, 2, ',', '.') }}</td>
                            <td>{{ $historic->type }}</td>
                            <td>{{ $historic->user_id_transaction }}</td>
                            <td>{{ $historic->date->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <p></p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
