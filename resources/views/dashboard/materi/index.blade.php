@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">Data Materi</h1>

        <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addModal">Tambah Materi</button>

        <div class="card">
            <div class="card-body">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materials as $material)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $material->title }}</td>
                                <td>{{ $material->description }}</td>
                                <td><a href="{{ asset('storage/' . $material->file_path) }}" target="_blank">Lihat File</a>
                                </td>
                                <td>
                                    <div class="d-flex" style="gap: 5px">
                                        <button class="btn btn-indigo btn-sm" data-toggle="modal"
                                            data-target="#editModal-{{ $material->id }}">Edit</button>
                                        <form action="{{ route('materi.destroy', $material->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-red btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal Edit --}}
                            <div class="modal fade" id="editModal-{{ $material->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('materi.update', $material->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Materi</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Judul</label>
                                                    <input type="text" name="title" class="form-control"
                                                        value="{{ $material->title }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi</label>
                                                    <textarea name="description" class="form-control">{{ $material->description }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ganti File (opsional)</label>
                                                    <input type="file" name="file_path" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button class="btn btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- End Modal --}}
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-2">
                    {{ $materials->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Materi</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>File Materi</label>
                            <input type="file" name="file_path" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
