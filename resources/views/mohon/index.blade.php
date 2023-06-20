@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Senarai Permohonan Baru</h5>

                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">#</th>
                                <th scope="col">Tajuk</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Tarikh Hantar</th>
                                <th scope="col">Start Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($senaraiPermohonan as $mohon)
                                <tr>
                                    <th scope="row">{{ $mohon->id }}</th>
                                    <td>{{ $mohon->tajuk }}</td>
                                    <td>{{ $mohon->tujuan }}</td>
                                    <td>{{ $mohon->created_at }}</td>
                                    <td>2016-05-25</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </div>
@endsection
