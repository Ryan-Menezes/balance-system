@extends('adminlte::page')

@section('content_header')
    <div class="d-flex align-items-center justify-content-end mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Início</a>
            </li>
            <li class="breadcrumb-item active">
                Saldo
            </li>
        </ol>
    </div>
@stop

@section('content')
    @include('admin.includes.alerts')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h1>Saldo</h1>

                <div class="d-flex align-items-center justify-content-end">
                    <a href="{{ route('admin.balance.deposit') }}" class="btn border">
                        Recarregar
                        <i class="fa fa-cart-plus text-primary"></i>
                    </a>

                    @if ($amount > 0)
                        <a href="{{ route('admin.balance.withdraw') }}" class="btn border ml-3">
                            Sacar
                            <i class="fa fa-cart-arrow-down text-danger"></i>
                        </a>
                    @endif

                    @if ($amount > 0)
                        <a href="{{ route('admin.balance.transfer') }}" class="btn border ml-3">
                            Transferir
                            <i class="fa fa-exchange text-info"></i>
                        </a>
                    @endif
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="small-box bg-white mb-0">
                <div class="inner">
                    <h3 class="mt-3">R$ {{ number_format($amount, 2, ',', '.') }}</h3>
                </div>
                <div class="icon">
                    <i class="fa fa-money-bill"></i>
                </div>
                <a href="{{ route('admin.historic') }}" class="small-box-footer">Histórico <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop
