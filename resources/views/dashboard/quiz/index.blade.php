@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Data Quiz</h1>
        </div>

        <div class="page-content mb-2">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                Tambah Quiz
            </button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th class="w-25">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizes as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $item->title }}
                                    </td>
                                    <td>
                                        {{ $item->description }}
                                    </td>
                                    <td>
                                        <div class="d-flex" style="gap: 10px">
                                            <a href="{{ route('quiz.edit', ['id' => $item->id]) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            <a href="{{ route('quiz.pertanyaan', ['id' => $item->id]) }}"
                                                class="btn btn-warning btn-sm">Pertanyaan</a>
                                            <a class="btn btn-success btn-sm">Respon</a>

                                            <form action="{{ route('survey.destroy', $item->id) }}" method="POST">
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
            </div>
        </div>
    </div>




    {{-- add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('quiz.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Quiz</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="judul">Judul Quiz</label>
                            <input type="text" class="form-control" id="judul" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="description" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
