@extends('layout.index')
@section('titulo', 'Detalhes da Criança')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <a href="{{ route('alunos.index') }}" class="btn btn-info">Crianças</a>
            </div>
            <div class="ibox-content">
                @include('admin.aluno.form')
            </div>
        </div>
    </div>
@endsection
