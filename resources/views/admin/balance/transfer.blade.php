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
                Transferir
            </li>
        </ol>
    </div>
@stop

@section('content')
    @include('admin.includes.alerts')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h2>Transferir saldo (informe o recebedor)</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.balance.transfer.confirm') }}" method="POST" class="form ">
                @csrf
                <div class="form-group">
                    <input type="text" name="sender" class="form-control"
                        placeholder="Informação de quem vai receber o saque (Nome ou E-mail)" />
                </div>

                <button type="submit" class="btn btn-primary bg-primary">Próxima etapa</button>
            </form>
        </div>
    </div>
@stop
