@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">Data Materi</h1>


        <div class="card">
            <div class="card-body">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materis as $material)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $material->title }}</td>
                                <td>{{ $material->description }}</td>
                                <td><a href="{{ asset('storage/' . $material->file_path) }}" target="_blank">Lihat File</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-2">
                    {{ $materis->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
