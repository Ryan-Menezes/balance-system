@extends('adminlte::page')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between p-3 border bg-white">
        <h1>Saldo</h1>

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
    <div class="p-3 bg-white border">
        <div class="d-flex align-items-center justify-content-end">
            <a href="{{ route('admin.balance.deposit') }}" class="btn btn-primary">
                Recarregar
                <i class="fa fa-cart-plus"></i>
            </a>
            <a href="" class="btn btn-danger ml-3">
                Sacar
                <i class="fa fa-cart-arrow-down"></i>
            </a>
        </div>

        <div class="small-box bg-success mt-4">
            <div class="inner">
                <h3 class="mt-3">R$ {{ number_format($amount, 2, ',', '.') }}</h3>
            </div>
            <div class="icon">
                <i class="fa fa-money-bill"></i>
            </div>
            <a href="" class="small-box-footer">Histórico <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
@stop
