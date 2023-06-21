@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Butiran Permohonan</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('mohon.store') }}" method="POST">
                            @csrf
                            
                            @include('mohon._form')
                        
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Daftar Permohonan Baru</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
