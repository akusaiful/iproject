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
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($senaraiPermohonan as $mohon)
                                <tr>
                                    <th scope="row">{{ $mohon->id }}</th>
                                    <td>{{ $mohon->tajuk }}</td>
                                    <td>{{ $mohon->tujuan }}</td>
                                    <td>{{ $mohon->created_at }}</td>
                                    <td>
                                        <form action="{{ route('mohon.delete', $mohon) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('mohon.show', $mohon->id) }}"
                                                class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('mohon.edit', $mohon) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">

                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <!-- Ini arahan untuk generate pagination page -->
                    {{ $senaraiPermohonan->links() }}

                    <!-- End Default Table Example -->
                </div>
            </div>

        </div>
    </div>
@endsection
