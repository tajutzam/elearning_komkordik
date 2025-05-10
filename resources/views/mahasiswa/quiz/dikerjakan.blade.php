@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <h1 class="page-title mb-0">Data Quiz Selesai</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizes as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 10px">
                                            <a href="{{ route('quiz.show-result', ['id' => $item->id]) }}"
                                                class="btn btn-indigo btn-sm">Detail</a>
                                            <form action="{{ route('quiz.selesai.delete', ['id' => $item->id]) }}"
                                                class="d-inline" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-2">
                        {{ $quizes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
