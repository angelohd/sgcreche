@if (isset($show))
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" value="{{ $funcionario->nome }}">
                    </div>
                    <div class="form-group">
                        <label>Tipo de Identificação:</label>
                        <input type="text" class="form-control" value="{{ $funcionario->tipo_doc }}">
                    </div>
                    <div class="form-group">
                        <label>Numero de Identificação:</label>
                        <input type="text" class="form-control" value="{{ $funcionario->numero_doc }}">
                    </div>
                    <div class="form-group">
                        <label>Data de Validade:</label>
                        <input type="text" class="form-control required" required
                            value="{{ $funcionario->data_validade }}">
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="form-group">
                        <label>Telefone 1:</label>
                        <input type="text" class="form-control" required value="{{ $funcionario->telefone1 }}">
                    </div>

                    <div class="form-group">
                        <label>Telefone 2:</label>
                        <input type="text" class="form-control" value="{{ $funcionario->telefone2 }}">
                    </div>
                    <div class="form-group">
                        <label>E-Mail:</label>
                        <input type="email" class="form-control" value="{{ $funcionario->email }}">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Endereço:</label>
                        <textarea class="form-control">{{ $funcionario->endereco }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Função:</label>
                        <input type="email" class="form-control" value="{{ $funcionario->funcao }}">

                    </div>

                </div>
            </div>
        </div>
    </div>
@else
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Nome *</label>
                        <input id="nome" name="nome" type="text" class="form-control" required
                            value="{{ $funcionario->nome ?? old('nome') }}" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$">
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
                        <input id="numero_doc" name="numero_doc" type="text" class="form-control" required
                            value="{{ $funcionario->numero_doc ?? old('numero_doc') }}">
                    </div>
                    <div class="form-group">
                        <label>Data de Validade *</label>
                        <input id="data_validade" name="data_validade" type="date" class="form-control required"
                            required value="{{ $funcionario->data_validade ?? old('data_validade') }}">
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="form-group">
                        <label>Telefone 1 *</label>
                        <input id="telefone1" name="telefone1" type="text" class="form-control" required
                            value="{{ $funcionario->telefone1 ?? old('telefone1') }}" data-mask="+244999999999">
                    </div>

                    <div class="form-group">
                        <label>Telefone 2</label>
                        <input id="telefone2" name="telefone2" type="text" class="form-control"
                            value="{{ $funcionario->telefone2 ?? old('telefone2') }}" data-mask="+244999999999">
                    </div>
                    <div class="form-group">
                        <label>E-Mail *</label>
                        <input id="email" name="email" type="email" class="form-control" required
                            value="{{ $funcionario->email ?? old('email') }}">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Endereço *</label>
                        <textarea name="endereco" id="endereco" class="form-control"
                            required>{{ $funcionario->endereco ?? old('endereco') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Função *</label>
                        <select class="form-control" name="funcao_id">
                            @if (isset($funcionario))
                                @foreach ($funcoes as $funcao)
                                    <option value="{{ $funcao->id }}"
                                        @if ($funcao->id == $funcionario->funcao_id) selected @endif>{{ $funcao->funcao }}
                                    </option>
                                @endforeach
                            @else
                                @forelse($funcoes as $funcao)
                                    <option value="{{ $funcao->id }}">{{ $funcao->funcao }}</option>
                                @empty
                                    <a href="{{ route('funcoes.index') }}" class="btn btn-primary">Registar
                                        função</a>
                                @endforelse
                            @endif

                        </select>
                    </div>

                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary dim">S A L V A R</button>
            </div>
        </div>
    </div>

@endif
