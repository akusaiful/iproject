<div>

    <h5 class="card-title">Upload Dokumen</h5>


    @if ($success)
        <div class="alert alert-success">Dokumen <b>{{ $filename }}</b> berjaya dimuat naik. Terima kasih daun
            keladi. Esok upload lagi</div>
    @endif

    @error('document')
        <div class="alert alert-danger">Dokumen gagal dimuat naik</div>
    @enderror

    <form wire:submit.prevent="save">

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">
                Dokumen Proses Semasa
            </label>

            <div class="col-sm-10">

                <input type="file" class="form-control @error('document') is-invalid @enderror" wire:model="document">

                @error('document')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Upload Document</button>
            </div>
        </div>

    </form>


</div>
