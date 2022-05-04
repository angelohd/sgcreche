@can('agregar_encarregado')

@extends('layout.index')
@section('titulo', 'Agregar encarregado')
@section('corpo')

    @include('admin.include.data_table')

    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h2>Criança: <strong>{{ $crianca->nome }}</strong></h2>
            </div>
            <div class="ibox-content">
                <form method="POST" action="{{ route('encarregado.agregar', $crianca->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nome *</label>
                                <input id="nome" name="nome" type="text" class="form-control" required>
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
                                <input id="numero_doc" name="numero_doc" type="text" class="form-control required" required
                                    onblur="encarregado(this.value)">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Data de Validade *</label>
                                <input id="data_validade" name="data_validade" type="date" class="form-control required"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Telefone 1 *</label>
                                <input id="telefone1" name="telefone1" type="text" data-mask="(244)-999-999-999"
                                    class="form-control required" required>
                            </div>

                            <div class="form-group">
                                <label>Telefone 2</label>
                                <input id="telefone2" name="telefone2" type="text" data-mask="(244)-999-999-999"
                                    class="form-control">
                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="form-group">
                                <label>E-Mail</label>
                                <input id="email" name="email" type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Endereo *</label>
                                <textarea name="endereco" id="endereco" class="form-control required" required></textarea>
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

    <script>
        function encarregado(numero_doc) {
            $.get("{{ route('encarregado.buscar') }}", {
                numero_doc: numero_doc
            }, function(data) {
                // console.log(data.nome)
                if (data != "") {
                    $("#nome").val(data.nome)
                    $("#numero").val(data.numero_doc)
                    $("#data_validade").val(data.data_validade)
                    $("#telefone1").val(data.telefone1)
                    $("#telefone2").val(data.telefone2)
                    $("#email").val(data.email)
                    $("#endereco").val(data.endereco)
                }

            });
        }
    </script>
@endsection
@endcan
