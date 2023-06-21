@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kemaskini Butiran Permohonan</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('mohon.update', $mohon) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Permohonan</label>
                                <div class="col-sm-10">

                                    <select name="jenis_permohonan_id" id=""
                                        class="form-select @error('jenis_permohonan_id') is-invalid @enderror">
                                        @foreach ($jenisPermohonan as $permohonan)
                                            <option value="{{ $permohonan->id }}"
                                                @if ($mohon->jenis_permohonan_id == $permohonan->id) selected @endif>{{ $permohonan->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jenis_permohonan_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            `
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tajuk</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control @error('tajuk') is-invalid @enderror"
                                        value="{{ old('tajuk', $mohon->tajuk) }}" name="tajuk">
                                    @error('tajuk')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Tujuan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('tujuan') is-invalid @enderror"
                                        value="{{ old('tujuan', $mohon->tujuan) }}" name="tujuan">
                                    @error('tujuan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Objektif</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('objektif') is-invalid @enderror" style="height:100px" name="objektif">{{ old('objektif', $mohon->objektif) }}</textarea>
                                    @error('objektif')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Latar Belakang</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('latar_belakang') is-invalid @enderror" style="height:100px" name="latar_belakang">{{ old('latar_belakang', $mohon->latar_belakang) }}</textarea>
                                    @error('latar_belakang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <h5 class="card-title">Butiran Kos</h5>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Kod OSOL</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control @error('kod_osol') is-invalid @enderror"
                                        value="{{ old('kod_osol', $mohon->kod_osol) }}" name="kod_osol">
                                    @error('kod_osol')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Kod</label>
                                <div class="col-sm-10">

                                    <input type="text" class="form-control @error('kos') is-invalid @enderror"
                                        value="{{ old('kos', $mohon->kos) }}" name="kos">
                                    @error('kos')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>

                            

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
