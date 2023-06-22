@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Butiran Mesyuarat</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('mesyuarat.store') }}" method="POST">
                            @csrf
                            
                            @include('mesyuarat._form')
                        
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Daftar Mesyuarat</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
