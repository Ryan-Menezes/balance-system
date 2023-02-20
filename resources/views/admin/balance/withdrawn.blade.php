@extends('adminlte::page')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between p-3 border bg-white">
        <h1>Sacar</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Início</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('admin.balance') }}">Saldo</a>
            </li>
            <li class="breadcrumb-item active">
                Sacar
            </li>
        </ol>
    </div>
@stop

@section('content')
    @include('admin.includes.alerts')

    <form action="{{ route('admin.balance.withdrawn.store') }}" method="POST" class="form p-3 py-4 border bg-white">
        @csrf
        <div class="form-group">
            <input type="text" name="value" class="form-control" placeholder="Valor do saque" />
        </div>

        <button type="submit" class="btn btn-danger">Sacar</button>
    </form>
@stop
