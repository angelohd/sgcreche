@extends('layout.index')
@section('titulo', 'Editar Encarregado')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <a href="{{ route('encarregados.index') }}" class="btn btn-info">Encarregados</a>
            </div>
            <div class="ibox-content">
                <form method="POST" action="{{ route('encarregados.update',$encarregado->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nome *</label>
                                <input id="nome" name="nome" type="text" class="form-control required" value="{{ $encarregado->nome }}" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$">
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
                                <input id="numero_doc" name="numero_doc" type="text" class="form-control required" value="{{ $encarregado->numero_doc }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Data de Validade *</label>
                                <input id="data_validade" name="data_validade" type="date" class="form-control required" value="{{ $encarregado->data_validade }}">
                            </div>
                            <div class="form-group">
                                <label>Telefone 1 *</label>
                                <input id="telefone1" name="telefone1" type="text" data-mask="+244999999999" class="form-control required" value="{{ $encarregado->telefone1 }}">
                            </div>

                            <div class="form-group">
                                <label>Telefone 2</label>
                                <input id="telefone2" name="telefone2" type="text" data-mask="+244999999999" class="form-control" value="{{ $encarregado->telefone2 }}">
                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="form-group">
                                <label>E-Mail</label>
                                <input id="email" name="email" type="email" class="form-control" value="{{ $encarregado->email }}">
                            </div>
                            <div class="form-group">
                                <label>Endereo *</label>
                                <textarea name="endereco" id="endereco" class="form-control required">{{ $encarregado->endereco }}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary text-center" type="submit"> S A L V A R </button>
                            </div>

                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
