@extends('layout.index')
@section('titulo', 'Registar Criança')
@section('corpo')

@include('admin.include.data_table')

<div class="col-lg-12">
    <div class="ibox">
        <div class="ibox-title">
            <a href="{{ route('alunos.index') }}" class="btn btn-info">Crianças</a>
        </div>
        <div class="ibox-content">

            <form id="form" action="{{ route('alunos.store') }}" class="wizard-big" method="POST">
                @include('admin.aluno.form1')

            </form>
        </div>
    </div>
</div>

@endsection
