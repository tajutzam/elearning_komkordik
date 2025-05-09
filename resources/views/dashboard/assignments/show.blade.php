@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4>{{ $assignment->title }}</h4>
                <p><strong>Deskripsi:</strong><br>{{ $assignment->description }}</p>
                <p><strong>Tenggat Waktu:</strong> {{ $assignment->due_date }}</p>
                @if ($assignment->file_path)
                    <p><strong>File:</strong> <a href="{{ asset('storage/' . $assignment->file_path) }}"
                            target="_blank">Download</a></p>
                @endif
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Daftar Mahasiswa yang sudah mengumpulkan
                </h5>
            </div>
            <div class="card-body">
                @foreach ($assignment->submissions as $submission)
                    @php
                        $user = $submission->user;
                        $nim = $user->profile->nim ?? 'Unknown';
                    @endphp

                    <div class="card mb-4 shadow-sm">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Mahasiswa:</strong> {{ $nim }}
                            </div>
                            <button class="btn btn-sm btn-light" type="button" data-toggle="collapse"
                                data-target="#userCollapse{{ $submission->id }}" aria-expanded="false"
                                aria-controls="userCollapse{{ $submission->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-down">
                                    <path d="M6 9l6 6 6-6" />
                                </svg>
                            </button>
                        </div>

                        <div id="userCollapse{{ $submission->id }}" class="collapse">
                            <div class="card-body">
                                <p><strong>Deskripsi Pengumpulan:</strong> {{ $submission->description }}</p>
                                <p><strong>Waktu Pengumpulan:</strong>
                                    {{ \Carbon\Carbon::parse($submission->submitted_at)->format('d M Y H:i') }}</p>
                                <p><strong>File:</strong>
                                    <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank"
                                        class="btn btn-sm btn-primary">
                                        Download File
                                    </a>
                                </p>

                                <p><strong>Nilai:</strong>
                                    @if ($submission->grade)
                                        <span class="badge badge-success">{{ $submission->grade }}</span>
                                        <p class="text-muted">{{ $submission->feedback }}</p>
                                    @else
                                        <span class="badge badge-warning">Belum Dinilai</span>

                                        <form action="{{ route('assignments.submissions.grade', $submission->id) }}"
                                            method="POST" class="mt-2">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="grade_{{ $submission->id }}">Masukkan Nilai</label>
                                                <input type="number" name="grade" id="grade_{{ $submission->id }}"
                                                    class="form-control" min="0" max="100" required>
                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="feedback_{{ $submission->id }}">Feedback</label>
                                                <textarea name="feedback" id="feedback_{{ $submission->id }}" class="form-control" rows="3"></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-sm btn-success mt-2">Simpan
                                                Penilaian</button>
                                        </form>
                                    @endif
                                </p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <a href="{{ route('tugas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
