@csrf
<h1>Dados da Criança</h1>
<fieldset>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nome *</label>
                <input id="nome" name="nome_aluno" type="text" class="form-control required">
            </div>
            <div class="form-group">
                <label>Tipo de Identificação *</label>
                <select class="form-control" name="tipo_doc_aluno">
                    <option value="Bilhete de Identidade">Bilhete de Identidade</option>
                    <option value="Passaporte">Passaporte</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
            <div class="form-group">
                <label>Numero de Identificação *</label>
                <input id="numero_doc" name="numero_doc_aluno" type="text" class="form-control required">
            </div>

        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label>Data de Validade *</label>
                <input id="data_validade" name="data_validade_aluno" type="date" class="form-control required">
            </div>
            <div class="form-group">
                <label>Data de Nascimento *</label>
                <input id="data_nasc" name="data_nasc_aluno" type="date" class="form-control required">
            </div>
            <div class="form-group">
                <label>Endereço *</label>
                <textarea name="endereco_aluno" id="endereco" class="form-control required"></textarea>
            </div>

        </div>

    </div>

</fieldset>
<h1>Dados do 1 º encarregado</h1>
<fieldset>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Nome *</label>
                <input id="nome_encarregado_1" name="nome_encarregado_1" type="text" class="form-control required">
            </div>
            <div class="form-group">
                <label>Tipo de Identificação *</label>
                <select class="form-control" name="tipo_doc_encarregado_1">
                    <option value="Bilhete de Identidade">Bilhete de Identidade</option>
                    <option value="Passaporte">Passaporte</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
            <div class="form-group">
                <label>Numero de Identificação *</label>
                <input id="numero_doc_encarregado_1" name="numero_doc_encarregado_1" type="text"
                    class="form-control required" onblur="encarregado1(this.value)">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Data de Validade *</label>
                <input id="data_validade_encarregado_1" name="data_validade_encarregado_1" type="date"
                    class="form-control required">
            </div>
            <div class="form-group">
                <label>Telefone 1 *</label>
                <input id="telefone_encarregado_1" name="telefone_encarregado_1" type="text"
                    data-mask="+244999999999" class="form-control required">
            </div>

            <div class="form-group">
                <label>Telefone 2</label>
                <input id="telefone2_encarregado_1" name="telefone2_encarregado_1" type="text"
                    data-mask="+244999999999" class="form-control">
            </div>

        </div>

        <div class="col-lg-4">

            <div class="form-group">
                <label>E-Mail *</label>
                <input id="email_encarregado_1" name="email_encarregado_1" type="email" class="form-control required">
            </div>
            <div class="form-group">
                <label>Endereo *</label>
                <textarea name="endereco_encarregado_1" id="endereco_encarregado_1" class="form-control required"></textarea>
            </div>

        </div>

    </div>
</fieldset>

<h1>Dados do 2º encarregado</h1>
<fieldset>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Nome</label>
                <input id="nome_encarregado_2" name="nome_encarregado_2" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Tipo de Identificação</label>
                <select class="form-control" name="tipo_doc_encarregado_2">
                    <option value="Bilhete de Identidade">Bilhete de Identidade</option>
                    <option value="Passaporte">Passaporte</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
            <div class="form-group">
                <label>Numero de Identificação</label>
                <input id="numero_doc_encarregado_2" name="numero_doc_encarregado_2" type="text" class="form-control"
                    onblur="encarregado2(this.value)">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label>Data de Validade</label>
                <input id="data_validade_encarregado_2" name="data_validade_encarregado_2" type="date"
                    class="form-control">
            </div>

            <div class="form-group">
                <label>Telefone 1</label>
                <input id="telefone_encarregado_2" name="telefone1_encarregado_2" type="text" class="form-control"
                    data-mask="+244999999999">
            </div>

            <div class="form-group">
                <label>Telefone 2</label>
                <input id="telefone2_encarregado_2" name="telefone2_encarregado_2" type="text" class="form-control"
                    data-mask="+244999999999">
            </div>

        </div>

        <div class="col-lg-4">

            <div class="form-group">
                <label>E-Mail</label>
                <input id="email_encarregado_2" name="email_encarregado_2" type="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Endereo</label>
                <textarea name="endereco_encarregado_2" id="endereco_encarregado_2" class="form-control"></textarea>
            </div>

        </div>

    </div>
</fieldset>

<h1>Dados academícos</h1>
<fieldset>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Ano lectivo *</label>
                <input type="text" name="" id="" value="{{ $ano_lectivos->ano_lectivo }}" class="form-control">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label>Sala</label>
                <select name="sala_id" id="sala_id" class="form-control">
                    @forelse ($salas as $sala)
                        <option value="{{ $sala->id }}">{{ $sala->sala }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
    </div>
</fieldset>

<script>
    function encarregado1(numero_doc) {
        $.get("{{ route('encarregado.buscar') }}", {
            numero_doc: numero_doc
        }, function(data) {
            // console.log(data.nome)
            console.log(data)
            if (data != "") {
                $("#nome_encarregado_1").val(data.nome)
                $("#numero_doc_encarregado_1").val(data.numero_doc)
                $("#data_validade_encarregado_1").val(data.data_validade)
                $("#telefone_encarregado_1").val(data.telefone1)
                $("#telefone2_encarregado_1").val(data.telefone2)
                $("#email_encarregado_1").val(data.email)
                $("#endereco_encarregado_1").val(data.endereco)
            }

        });
    }

    function encarregado2(numero_doc) {
        $.get("{{ route('encarregado.buscar') }}", {
            numero_doc: numero_doc
        }, function(data) {
            // console.log(data.nome)
            if (data != "") {
                $("#nome_encarregado_2").val(data.nome)
                $("#numero_doc_encarregado_2").val(data.numero_doc)
                $("#data_validade_encarregado_2").val(data.data_validade)
                $("#telefone_encarregado_2").val(data.telefone1)
                $("#telefone2_encarregado_2").val(data.telefone2)
                $("#email_encarregado_2").val(data.email)
                $("#endereco_encarregado_2").val(data.endereco)
            }

        });
    }
</script>
