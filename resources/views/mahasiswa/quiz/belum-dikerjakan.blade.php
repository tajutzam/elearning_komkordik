@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Quiz tersedia
                </h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>Judul</th>
                                <th>
                                    Deskripsi
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($quizes as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 10px">
                                            <a class="btn btn-indigo btn-sm"
                                                href="{{ route('quiz.form', ['id' => $item->id]) }}">Kerjakan</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-info">Tidak ada quiz yang belum dikerjakan</div>
                                </div>
                            @endforelse
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
