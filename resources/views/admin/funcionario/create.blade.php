@extends('layout.index')
@section('titulo', 'Registar funcionario')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <a href="{{ route('funcionarios.index') }}" class="btn btn-info">Funcionarios</a>
            </div>
            <div class="ibox-content">
                <form method="POST" action="{{ route('funcionarios.store') }}">
                    @include('admin.funcionario.form')
                </form>

            </div>
        </div>
    </div>
@endsection
