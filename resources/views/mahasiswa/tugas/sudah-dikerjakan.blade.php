@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <h1 class="page-title mb-0">Data Tugas Selesai</h1>
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
                                <th>Tanggal Dikumpulkan</th>
                                <th>File Tugas</th>
                                <th>File Yang Dikumpulkan</th>
                                <th>Status penilaian</th>
                                <th>Feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignments as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->description, 50) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->submissions->first()->created_at)->toFormattedDayDateString() }}
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ asset('storage/' . $item->file_path) }}">File Tugas</a>
                                    </td>
                                    <td>
                                        <a target="_blank"
                                            href="{{ asset('storage/' . $item->submissions->first()->file_path) }}">File
                                            Yang Kamu Submit</a>
                                    </td>
                                    <td>
                                        @if (isset($item->submissions->first->grade))
                                            <span class="badge bg-indigo">
                                                {{ $item->submissions->first->grade }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">Belum Dinilai</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($item->submissions->first->feedback))
                                            <span class="badge bg-indigo">
                                                {{ $item->submissions->first->feedback }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">Tidak ada feedback</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-2">
                        {{ $assignments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal (pindahkan ke luar loop/table) -->
    @foreach ($assignments as $item)
        <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel-{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('submissions.store') }}" method="POST" enctype="multipart/form-data"
                    class="modal-content">
                    @csrf
                    <input type="hidden" name="assignment_id" value="{{ $item->id }}">

                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel-{{ $item->id }}">Kerjakan Tugas:
                            {{ $item->title }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>File</label>
                            <input type="file" name="file" class="form-control-file" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
