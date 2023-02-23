@extends('adminlte::page')

@section('content_header')
    <div class="d-flex align-items-center justify-content-end mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Início</a>
            </li>
            <li class="breadcrumb-item active">
                Perfil
            </li>
        </ol>
    </div>
@stop

@section('content')
    @include('admin.includes.alerts')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h1>Perfil</h1>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.profile.update') }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label"><strong>Nome:</strong></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nome"
                        value="{{ auth()->user()->name }}" />
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email" class="form-label"><strong>E-mail:</strong></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail"
                            value="{{ auth()->user()->email }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password" class="form-label"><strong>Senha:</strong></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Senha" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="image" class="form-label"><strong>Imagem:</strong></label>
                    <input type="file" name="image" id="image" accept="image/*" class="form-control-file" />
                </div>

                <button type="submit" class="btn btn-primary bg-primary mt-3">Salvar</button>
            </form>
        </div>
    </div>
@stop
