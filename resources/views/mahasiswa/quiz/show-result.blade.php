@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Hasil Quiz</h3>
            </div>
        </div>

        <x-info-survey :survey="$survey" />

        <div class="card">
            <div class="card-body">
                <ol class="list-group list-group-numbered">
                    @foreach ($survey->questions as $item)
                        <li class="list-group-item mb-4 border-0 shadow-sm rounded">
                            <div class="mb-2">
                                <strong>{{ $item->question }}</strong>
                            </div>

                            @php
                                $option = ['a', 'b', 'c', 'd'];
                                $userAnswer = $answers[$item->id] ?? null;
                            @endphp

                            @foreach ($option as $key)
                                @php
                                    $isCorrect = $item->correct_answer === $key;
                                    $isUserAnswer = $userAnswer === $key;

                                    // Tentukan kelas warna
                                    $textClass = '';
                                    if ($isCorrect) {
                                        $textClass = 'text-success'; // Hijau untuk jawaban benar
                                    } elseif ($isUserAnswer) {
                                        $textClass = 'text-danger'; // Merah untuk jawaban salah
                                    }
                                @endphp

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="answers[{{ $item->id }}]"
                                        value="{{ $key }}" id="q{{ $item->id }}_{{ $key }}"
                                        {{ $isUserAnswer ? 'checked' : '' }} disabled>
                                    <label class="form-check-label {{ $textClass }}"
                                        for="q{{ $item->id }}_{{ $key }}">
                                        {{ strtoupper($key) }}. {{ $item->{'option_' . $key} }}
                                        @if ($isCorrect)
                                            <span class="badge bg-success ms-1">Kunci</span>
                                        @elseif ($isUserAnswer)
                                            <span class="badge bg-danger ms-1">Jawabanmu</span>
                                        @endif
                                    </label>
                                </div>
                            @endforeach
                        </li>
                    @endforeach
                </ol>

                @php
                    $totalQuestions = count($survey->questions);
                    $correctAnswers = 0;
                    foreach ($survey->questions as $item) {
                        if (($answers[$item->id] ?? null) === $item->correct_answer) {
                            $correctAnswers++;
                        }
                    }
                @endphp

                <div class="mt-4 alert alert-info">
                    Jawaban mu benar: <strong>{{ $correctAnswers }}</strong> dari <strong>{{ $totalQuestions }}</strong>
                    soal.
                </div>
                <div class="mt-4 alert alert-info">
                    Nilai Kamu: <strong>{{ $result->score }} / 100</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
