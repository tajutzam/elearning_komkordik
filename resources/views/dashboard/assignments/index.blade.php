@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Data Tugas
            </h1>
        </div>

        <div class="page-content mb-2">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                Tambah Tugas
            </button>
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
                                <th>Tenggat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignments as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ Str::limit($item->description, 50) }}</td>
                                    <td>{{ $item->due_date }}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 5px">
                                            <a href="{{ route('tugas.show', $item->id) }}"
                                                class="btn btn-info btn-sm">Detail</a>
                                            <button class="btn btn-indigo btn-sm" data-toggle="modal"
                                                data-target="#editModal-{{ $item->id }}">Edit</button>
                                            <form action="{{ route('tugas.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-red btn-sm" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel-{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('tugas.update', $item->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Tugas</h5>
                                                    <button type="button" class="close" data-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Judul</label>
                                                        <input type="text" name="title" class="form-control"
                                                            value="{{ $item->title }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Deskripsi</label>
                                                        <textarea name="description" class="form-control">{{ $item->description }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tenggat Waktu</label>
                                                        <input type="datetime-local" name="due_date" class="form-control"
                                                            value="{{ \Carbon\Carbon::parse($item->due_date)->format('Y-m-d\TH:i') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>File (kosongkan jika tidak ganti)</label>
                                                        <input type="file" name="file_path" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- End Modal --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-2">
                    {{ $assignments->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Tugas</h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tenggat Waktu</label>
                            <input type="datetime-local" name="due_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" name="file_path" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
