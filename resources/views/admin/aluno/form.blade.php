@csrf
<div class="tab-content">
    <!-- aluno -->
    <div role="tabpanel" id="tab-aluno" class="tab-pane active">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Nome *</label>
                        <input id="nome" name="nome_aluno" type="text" class="form-control" required>
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
                        <input id="numero_doc" name="numero_doc_aluno" type="text" class="form-control" required>
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
                        <label>Data de Validade *</label>
                        <textarea name="endereco_aluno" id="endereco" class="form-control" required></textarea>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- fim aluno -->
    <!-- primeiro encarregado -->
    <div role="tabpanel" id="tab-encarregado-1" class="tab-pane">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Nome *</label>
                        <input id="nome" name="nome_encarregado_1" type="text" class="form-control" required>
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
                        <input id="numero_doc" name="numero_doc_encarregado_1" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Data de Validade *</label>
                        <input id="data_validade" name="data_validade_encarregado_1" type="date" class="form-control required">
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Telefone 1 *</label>
                        <input id="telefone1_encarregado_1" name="telefone_encarregado_1" type="text" data-mask="(244)-999-999-999" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Telefone 2 *</label>
                        <input id="telefone2" name="telefone2_encarregado_1" type="text" data-mask="(244)-999-999-999" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>E-Mail *</label>
                        <input id="email" name="email_encarregado_1" type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Endereo *</label>
                        <textarea name="endereco_encarregado_1" class="form-control"></textarea>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- fim primeiro encarregado -->
    <!-- segundo encarregado -->
    <div role="tabpanel" id="tab-encarregado-2" class="tab-pane">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Nome</label>
                        <input id="nome" name="nome_enaccerago_2" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tipo de Identificação</label>
                        <select class="form-control" name="tipo_doc_enaccerago_2">
                            <option value="Bilhete de Identidade">Bilhete de Identidade</option>
                            <option value="Passaporte">Passaporte</option>
                            <option value="Outro">Outro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Numero de Identificação</label>
                        <input id="numero_doc" name="numero_doc_enaccerago_2" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Data de Validade</label>
                        <input id="data_validade" name="data_validade_enaccerago_2" type="date" class="form-control">
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Telefone 1</label>
                        <input id="telefone1_enaccerago_2" name="telefone1_enaccerago_2" type="text" class="form-control" data-mask="(244)-999-999-999">
                    </div>

                    <div class="form-group">
                        <label>Telefone 2</label>
                        <input id="telefone2_enaccerago_2" name="telefone2_enaccerago_2" type="text" class="form-control" data-mask="(244)-999-999-999">
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <input id="email" name="email_enaccerago_2" type="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Endereo</label>
                        <textarea name="endereco_enaccerago_2" id="" class="form-control"></textarea>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- fim segundo encarregado -->

    <!-- dados academico -->
    <div role="tabpanel" id="tab-academico" class="tab-pane">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Ano lectivo *</label>
                        <input type="text" name="" id="" value="{{ $ano_lectivos->ano_lectivo }}"
                            class="form-control">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Sala</label>
                        <select name="" id="" class="form-control">
                            @forelse ($salas as $sala)
                                <option value="{{ $sala->id }}">{{ $sala->sala }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
               <button class="btn btn-primary dim" type="submit">S A L V A R </button>
            </div>
        </div>
    </div>
    <!-- fim dados academico -->
</div>
