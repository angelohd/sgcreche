@csrf
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Sala *</label>
            <input id="sala" name="sala" type="text" class="form-control required" required value="{{ $sala->sala ?? old('sala') }}">
        </div>
        <div class="form-group">
           <button type="submit" class="btn btn-primary">S A L V A R</button>
        </div>
    </div>
</div>
