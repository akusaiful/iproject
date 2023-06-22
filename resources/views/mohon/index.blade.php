@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Senarai Permohonan Baru</h5>

                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-4"><a href="{{ route('mohon.create') }}"
                                        class="btn btn-primary mt-2">Permohonan Baru</a></div>
                                <div class="col pt-3">
                                    <b>Jumlah Rekod : {{ $senaraiPermohonan->total() }}</b>
                                    | Papar Rekod {{ $senaraiPermohonan->firstItem() }}
                                    dari {{ $senaraiPermohonan->lastItem() }} </div>

                            </div>

                        </div>
                        <div class="col pb-2">
                            <form action="{{ route('mohon.index') }}">
                                <div class="d-flex justify-content-end bd-highlight">
                                    <div class="p-2 bd-highlight">
                                        <input type="text" name="query" class="form-control"
                                            value="{{ request()->get('query') }}">
                                    </div>
                                    <div class="p-2 bd-highlight"><button type="submit"
                                            class="btn btn-primary">Cari</button></div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Default Table -->
                    <table class="table">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">NO</th>
                                <th scope="col">Tajuk</th>
                                <th scope="col">Jenis Permohonan</th>
                                <th scope="col">Tarikh Hantar</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($senaraiPermohonan as $key => $mohon)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $mohon->tajuk }}</td>
                                    <td>{{ $mohon->jenis_permohonan->nama }}</td>
                                    <td>{{ $mohon->created_at }}</td>
                                    <td>{{ $mohon->status_borang }}</td>
                                    <td>
                                        <a href="{{ route('mohon.show', $mohon->id) }}"
                                            class="btn btn-primary btn-sm">View</a>
                                        <a href="{{ route('mohon.edit', $mohon) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('mohon.delete', $mohon->id) }}" class="btn btn-danger btn-sm"
                                            data-confirm-delete="true">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <!-- Ini arahan untuk generate pagination page -->
                    {{ $senaraiPermohonan->appends([
                            'query' => request()->get('query'),
                        ])->links() }}

                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </div>
@endsection
