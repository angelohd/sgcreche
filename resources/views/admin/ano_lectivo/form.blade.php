@csrf
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Ano lectivo *</label>
            <input id="ano_lectivo" name="ano_lectivo" type="text" class="form-control required" required value="{{ $ano_lectivo->ano_lectivo ?? old('ano_lectivo') }}">
        </div>
        <div class="form-group">
           <button type="submit" class="btn btn-primary">S A L V A R</button>
        </div>
    </div>
</div>
