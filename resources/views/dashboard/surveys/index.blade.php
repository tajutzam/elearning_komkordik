@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Data Survei</h1>
        </div>

        <div class="page-content mb-2">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                Tambah Survei
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
                                <th class="w-25">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surveys as $survey)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $survey->title }}</td>
                                    <td>{{ Str::limit($survey->description, 50) }}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 5px">
                                            <a href="{{ route('survey.edit', $survey->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{ route('survey.questions', $survey->id) }}"
                                                class="btn btn-warning btn-sm">Pertanyaan</a>
                                            <a href="{{ route('survey.responses', $survey->id) }}"
                                                class="btn btn-success btn-sm">Respon</a>

                                            <form action="{{ route('survey.destroy', $survey->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-2">
                    {{ $surveys->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('survey.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Survei</h5>
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
