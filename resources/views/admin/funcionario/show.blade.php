@extends('layout.index')
@section('titulo', 'Detalhes do funcionario')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                @can('list_funcionario')
                <a href="{{ route('funcionarios.index') }}" class="btn btn-info">Funcionarios</a>
                @endcan
            </div>
            <div class="ibox-content">
                @include('admin.funcionario.form')
            </div>
        </div>
    </div>
@endsection
