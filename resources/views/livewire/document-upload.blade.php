<div>

    <h5 class="card-title">Upload Dokumen</h5>

    @if($model->checkFileExist())
    <div class="row">
        <div class="col">
            <div class="card info-card sales-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Dokumen Proses Semasa</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-pdf"></i>
                        </div>
                        <div class="ps-3">
                            <h6><a href="{{ $model->getFileLink() }}">{{ $model->file_dokumen_proses_semasa }}</a></h6>
                            <span class="text-success small pt-1 fw-bold">File Size : 12 MB</span> <span
                                class="text-muted small pt-2 ps-1">Document Type : PDF</span>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endif



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

                <input type="file" class="form-control @error('document') is-invalid @enderror"
                    wire:model="document">

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
