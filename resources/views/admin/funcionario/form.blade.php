@csrf
<div class="row">
    <div class="col-lg-12">
        <div class="row">

            <div class="col-lg-4">
                <div class="form-group">
                    <label>Nome *</label>
                    <input id="nome" name="nome" type="text" class="form-control" required value="">
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
                    <input id="numero_doc" name="numero_doc" type="text" class="form-control" required value="">
                </div>
                <div class="form-group">
                    <label>Data de Validade *</label>
                    <input id="data_validade" name="data_validade" type="date" class="form-control required" required value="">
                </div>
            </div>

            <div class="col-lg-4">

                <div class="form-group">
                    <label>Telefone 1 *</label>
                    <input id="telefone1" name="telefone1" type="text" class="form-control" required value="" data-mask="(244)-999-999-999">
                </div>

                <div class="form-group">
                    <label>Telefone 2</label>
                    <input id="telefone2" name="telefone2" type="text" class="form-control" value="" data-mask="(244)-999-999-999">
                </div>
                <div class="form-group">
                    <label>E-Mail *</label>
                    <input id="email" name="email" type="email" class="form-control" required value="">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label>Endereço *</label>
                   <textarea name="endereco" id="endereco" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>Função *</label>
                  <select name="funcao_id" id="funcao_id" class="form-control">
                      @forelse ($funoes as $funcao)
                      <option value="{{ $funcao->id }}">{{ $funcao->funcao }}</option>
                      @empty
                        <option value="0">Nenhuma função encontrada</option>
                      @endforelse
                  </select>
                </div>

            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">S A L V A R</button>
        </div>
    </div>
</div>
