<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs" role="tablist">
                <li><a class="nav-link active" data-toggle="tab" href="#tab-aluno"> Dados do aluno.</a></li>
                <li><a class="nav-link" data-toggle="tab" href="#tab-encarregado-1">Dados do 1º encarregado.</a></li>
                @if(isset($encarregado2))
                <li><a class="nav-link" data-toggle="tab" href="#tab-encarregado-2">Dados do 2º encarregado.</a></li>
                @endif
            </ul>
            <div class="tab-content">
                <!-- aluno -->
                <div role="tabpanel" id="tab-aluno" class="tab-pane active">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input type="text" class="form-control" value="{{ $aluno->nome }}">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de Identificação:</label>
                                    <input type="text" class="form-control" value="{{ $aluno->tipo_doc }}">
                                </div>
                                <div class="form-group">
                                    <label>Numero de Identificação:</label>
                                    <input type="text" class="form-control" value="{{ $aluno->numero_doc }}">
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Data de Validade:</label>
                                    <input type="date" class="form-control" value="{{ $aluno->data_validade }}">
                                </div>
                                <div class="form-group">
                                    <label>Data de Nascimento:</label>
                                    <input type="date" class="form-control" value="{{ $aluno->data_nasc }}">
                                </div>
                                <div class="form-group">
                                    <label>Endereço:</label>
                                    <textarea class="form-control">{{ $aluno->endereco }}</textarea>
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
                                    <label>Nome</label>
                                    <input type="text" class="form-control" value="{{ $encarregado1->nome }}">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de Identificação</label>
                                    <input type="text" class="form-control" value="{{ $encarregado1->tipo_doc }}">
                                </div>
                                <div class="form-group">
                                    <label>Numero de Identificação</label>
                                    <input type="text" class="form-control" value="{{ $encarregado1->numero_doc }}">
                                </div>

                                <div class="form-group">
                                    <label>Data de Validade</label>
                                    <input  type="date" class="form-control" value="{{ $encarregado1->data_validade }}">
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Telefone 1</label>
                                    <input type="text" class="form-control" value="{{ $encarregado1->telefone1 }}">
                                </div>

                                <div class="form-group">
                                    <label>Telefone 2</label>
                                    <input type="text" class="form-control" value="{{ $encarregado1->telefone2 }}">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control" value="{{ $encarregado1->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Endereo</label>
                                    <textarea class="form-control">{{ $encarregado1->endereco }}</textarea>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- fim primeiro encarregado -->
                <!-- segundo encarregado -->
                @if(isset($encarregado2))
                <div role="tabpanel" id="tab-encarregado-2" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" value="{{ $encarregado2->nome }}">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de Identificação</label>
                                    <input type="text" class="form-control" value="{{ $encarregado2->tipo_doc }}">
                                </div>
                                <div class="form-group">
                                    <label>Numero de Identificação</label>
                                    <input type="text" class="form-control" value="{{ $encarregado2->numero_doc }}">
                                </div>

                                <div class="form-group">
                                    <label>Data de Validade</label>
                                    <input  type="date" class="form-control" value="{{ $encarregado2->data_validade }}">
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Telefone 1</label>
                                    <input type="text" class="form-control" value="{{ $encarregado2->telefone1 }}">
                                </div>

                                <div class="form-group">
                                    <label>Telefone 2</label>
                                    <input type="text" class="form-control" value="{{ $encarregado2->telefone2 }}">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control" value="{{ $encarregado2->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Endereo</label>
                                    <textarea class="form-control">{{ $encarregado2->endereco }}</textarea>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                @endif
                <!-- fim segundo encarregado -->
            </div>
        </div>
    </div>
</div>
