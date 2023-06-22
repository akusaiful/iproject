@extends('layouts.main')

@section('content')
    <section class="section profile">
        <div class="row">

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#meeting"
                                    aria-selected="true" role="tab">Butiran Permohonan</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="meeting" role="tabpanel">

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Mesyurat</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesyuarat->jenis_mesyuarat->getNama() }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Tarikh</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesyuarat->tarikh }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Bilangan</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesyuarat->bil }}/{{ $mesyuarat->tahun }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Masa</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesyuarat->masa }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tempat</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesyuarat->tempat }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Catatan</div>
                                    <div class="col-lg-9 col-md-8">{{ $mesyuarat->catatan }}</div>
                                </div>




                                <div class="row mt-5">
                                    <div class="col-lg-3 col-md-4 label "></div>
                                    <div class="col-lg-9 col-md-8">
                                        <a href="{{ route('mesyuarat.index') }}" class="btn btn-primary">Senarai
                                            Mesyuarat</a>
                                        {{-- <a href="{{ route('.edit', $mohon) }}" class="btn btn-warning">Kemaskini</a> --}}
                                    </div>
                                </div>

                            </div>



                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>

            <div class="col-xl-4">



                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-left">
                        <h3>NAMA MESYUARAT</h3>
                        <h2>
                            <div class="badge rounded-pill bg-primary">{{ $mesyuarat->jenis_mesyuarat->getNama() }}</div>
                        </h2>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-left">
                        <h3>JENIS PERMOHONAN</h3>
                        <h2>
                            <div class="badge rounded-pill bg-primary"></div>
                        </h2>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-left">
                        <h3>KEMASKINI TERAKHIR</h3>
                        <h2>{{ $mesyuarat->updated_at->diffForHumans() }}</h2>

                    </div>
                </div>

            </div>


        </div>
    </section>
@endsection
