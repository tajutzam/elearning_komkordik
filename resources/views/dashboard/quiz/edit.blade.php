@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Edit Quiz
            </h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('quiz.update', $quiz->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" value="{{ $quiz->title }}" required>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control">{{ $quiz->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('survey.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
