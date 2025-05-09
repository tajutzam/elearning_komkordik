@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Isi Survey Mahasiswa
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse ($surveysBelumDiisi as $survey)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $survey->title ?? 'Survey Tanpa Judul' }}</h5>
                                    <p class="card-text">{{ $survey->description ?? 'Tidak ada deskripsi.' }}</p>
                                    <a href="{{ url('/dashboard-user/isi-survey/' . $survey->id) }}"
                                        class="btn btn-primary btn-sm">
                                        Isi Survey
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info">Semua survey sudah diisi.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
