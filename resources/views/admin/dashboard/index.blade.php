@extends('layout.index')
@section('corpo')
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Nº de ciranças</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-center">{{ number_format($numero_total_alunos) }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Inscirção feita esse ano</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-center">{{ number_format($alunos) }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Crianças presente.</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-center">{{ number_format($presente) }}</h1>
            </div>
        </div>
    </div>
@endsection
