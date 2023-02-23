@extends('adminlte::page')

@section('content_header')
    <div class="d-flex align-items-center justify-content-end mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Início</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('admin.balance') }}">Saldo</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('admin.balance.transfer') }}">Transferir</a>
            </li>
            <li class="breadcrumb-item active">
                Confirmação
            </li>
        </ol>
    </div>
@stop

@section('content')
    @include('admin.includes.alerts')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h2>Confirmar Transferência</h2>
        </div>
        <div class="card-body">
            <p><strong>Recebedor: </strong>{{ $sender->name }}</p>
            <p><strong>Seu saldo atual: </strong>R${{ number_format($balance->amount, 2, ',', '.') }}</p>

            <form action="{{ route('admin.balance.transfer.store') }}" method="POST" class="form ">
                @csrf
                <input type="hidden" name="sender_id" value="{{ $sender->id }}" />

                <div class="form-group">
                    <input type="text" name="value" class="form-control" placeholder="Valor" />
                </div>

                <button type="submit" class="btn btn-primary bg-primary">Transferir</button>
            </form>
        </div>
    </div>
@stop
