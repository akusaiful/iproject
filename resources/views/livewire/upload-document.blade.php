<div>

    @if ($success) 

    <div class="alert alert-success">
        Dokumen berjaya dimuatnaik
        <a href="{{ route('download.file', ['model' => $model, 'field' => 'file_proses_semasa']) }}">{{ $documentFilename }}</a>
    </div>

        <script>
            Swal.fire({
                icon: 'success',
                // title: 'Oops...',
                text: 'File berjaya dimuatnaik!',
                footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
    <form wire:submit.prevent="save">



        <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label">Dokumen Semasa Projek</label>
            <div class="col-sm-10">
                <input class="form-control @error('document') is-invalid @enderror" type="file" id="formFile"
                    name="file_proses_semasa" wire:model='document'>
                @error('document')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Upload Document</button>
            </div>
        </div>


    </form>
</div>
