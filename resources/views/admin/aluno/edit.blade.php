@extends('layout.index')
@section('titulo', 'Editar Criança')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <a href="{{ route('alunos.index') }}" class="btn btn-info">Crianças</a>
            </div>
            <div class="ibox-content">
                <form method="POST" action="{{ route('alunos.update',$aluno->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nome *</label>
                                <input id="nome" name="nome" type="text" class="form-control required" value="{{ $aluno->nome }}">
                            </div>
                            <div class="form-group">
                                <label>Tipo de Identificação *</label>
                                <select class="form-control" name="tipo_doc">
                                    <option value="Bilhete de Identidade">Bilhete de Identidade</option>
                                    <option value="Passaporte">Passaporte</option>
                                    <option value="Outro">Outro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Numero de Identificação *</label>
                                <input id="numero_doc" name="numero_doc" type="text" class="form-control required" value="{{ $aluno->numero_doc }}">
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Data de Validade *</label>
                                <input id="data_validade" name="data_validade" type="date" class="form-control required" value="{{ $aluno->data_validade }}">
                            </div>
                            <div class="form-group">
                                <label>Data de Nascimento *</label>
                                <input id="data_nasc" name="data_nasc" type="date" class="form-control required" value="{{ $aluno->data_nasc }}">
                            </div>
                            <div class="form-group">
                                <label>Endereço *</label>
                                <textarea name="endereco" id="endereco" class="form-control required">{{ $aluno->endereco }}</textarea>
                            </div>

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">S A L V A R</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
