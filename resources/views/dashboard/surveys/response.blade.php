@extends('layouts.app')

@section('content')
    <div class="container">
        <x-info-survey :survey="$survey" />
        <div class="mt-2 card">
            <div class="card-header">
                <h3 class="card-title">Response Survey</h3>
            </div>

            <div class="card-body">
                @php
                    $responsesByUser = $survey->questions->flatMap->responses->groupBy('user_id');
                @endphp

                @forelse ($responsesByUser as $userId => $responses)
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header d-flex justify-content-start align-items-center">
                            <strong>Mahasiswa:</strong> {{ $responses->first()->mahasiswa->profile->nim ?? 'Unknown' }}
                            <button class="btn btn-sm btn-light" type="button" data-toggle="collapse"
                                data-target="#userCollapse{{ $userId }}" aria-expanded="false"
                                aria-controls="userCollapse{{ $userId }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-chevron-down">
                                    <path d="M6 9l6 6 6-6" />
                                </svg>
                            </button>
                        </div>

                        <div id="userCollapse{{ $userId }}" class="collapse">
                            <div class="card-body">
                                @php
                                    $score = 0;
                                    $total = 0;
                                @endphp
                                @foreach ($survey->questions as $question)
                                    @php
                                        $userResponse = $question->responses->firstWhere('user_id', $userId);
                                        $correctAnswers = $question->answers
                                            ->where('is_correct', true)
                                            ->pluck('answer')
                                            ->map(fn($a) => strtolower(trim($a)))
                                            ->toArray();

                                        $hasBeenScored = $survey->userNilaiSurveys->where('user_id', $userId)->first();

                                    @endphp

                                    <div class="mb-3">


                                        <strong>Pertanyaan:</strong> {{ $question->question }} <br>
                                        <strong>Jawaban:</strong>
                                        @if ($userResponse)
                                            {{ $userResponse->response }}
                                            @php
                                                $isCorrect = in_array(
                                                    strtolower(trim($userResponse->response)),
                                                    $correctAnswers,
                                                );
                                                $score += $isCorrect ? 1 : 0;
                                                $total++;
                                            @endphp
                                            <span class="badge {{ $isCorrect ? 'badge-success' : 'badge-danger' }}">
                                                {{ $isCorrect ? 'Benar' : 'Salah' }}
                                            </span>
                                        @else
                                            <em class="text-muted">Belum menjawab</em>
                                            @php $total++; @endphp
                                        @endif

                                        <div>
                                            <small class="text-muted">Kunci Jawaban:
                                                @foreach ($question->answers->where('is_correct', true) as $correct)
                                                    <span class="badge badge-info">{{ $correct->answer }}</span>
                                                @endforeach
                                            </small>
                                        </div>
                                    </div>
                                @endforeach

                                <hr>
                                @if (isset($hasBeenScored->nilai))
                                    <div>
                                        <strong>Nilai Akhir:</strong>
                                        <span class="badge badge-primary">
                                            <span>{{ $hasBeenScored->nilai }} / 100</span>
                                        </span>
                                    </div>
                                @else
                                    <div>
                                        <strong>Nilai Akhir:</strong>
                                        <span class="badge badge-primary">
                                            {{ $total > 0 ? number_format(($score / $total) * 100, 2) : '0.00' }}%
                                        </span>
                                    </div>
                                    <form method="POST"
                                        action="{{ route('survey.responses.store', ['survey' => $survey->id]) }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $userId }}">
                                        <input type="number" name="nilai" class="form-control mt-2"
                                            placeholder="Masukkan nilai manual">
                                        <button class="btn btn-sm btn-success mt-2" type="submit">Simpan Nilai</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada mahasiswa yang mengisi survei.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
