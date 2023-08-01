
<div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Jenis Mesyuarat</label>
    <div class="col-sm-10">

        {{ $jenis_mesyuarat }}

    </div>
</div>

<div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Tarikh</label>
    <div class="col-sm-10">

        <input type="text" class="form-control @error('tarikh') is-invalid @enderror"
            value="{{ old('tarikh', $mesyuarat->tarikh) }}" name="tarikh">
        @error('tarikh')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

    </div>
</div>

<div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Bil</label>
    <div class="col-sm-10">

        <input type="text" class="form-control @error('bil') is-invalid @enderror"
            value="{{ old('bil', $mesyuarat->bil) }}" name="bil">
        @error('bil')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror


    </div>
</div>
<div class="row mb-3">
    <label for="inputEmail" class="col-sm-2 col-form-label">Tahun</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('tahun') is-invalid @enderror"
            value="{{ old('tahun', $mesyuarat->tahun) }}" name="tahun">
        @error('tahun')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="inputEmail" class="col-sm-2 col-form-label">Masa</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('masa') is-invalid @enderror" name="masa" value="{{ old('masa', $mesyuarat->masa) }}" />
        @error('masa')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="inputEmail" class="col-sm-2 col-form-label">Tempat</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('tempat') is-invalid @enderror"  name="tempat" value="{{ old('tempat', $mesyuarat->tempat) }}" />
        @error('tempat')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="inputEmail" class="col-sm-2 col-form-label">Catatan</label>
    <div class="col-sm-10">
        <textarea class="form-control @error('catatan') is-invalid @enderror" style="height:100px" name="catatan">{{ old('catatan', $mesyuarat->catatan) }}</textarea>
        @error('catatan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

