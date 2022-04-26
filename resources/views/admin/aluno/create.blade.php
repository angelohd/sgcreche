@extends('layout.index')
@section('titulo', 'Registar Aluno')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <a href="{{ route('alunos.index') }}" class="btn btn-info">Alunos</a>
            </div>
            <div class="ibox-content">
                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-aluno"> Dados do aluno</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-encarregado-1">Dados do 1º
                                    encarregado</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-encarregado-2">Dados do 2º
                                    encarregado</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-academico">Dados académico</a></li>
                        </ul>
                        <form method="POST" action="{{ route('alunos.store') }}">
                            @include('admin.aluno.form')
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
