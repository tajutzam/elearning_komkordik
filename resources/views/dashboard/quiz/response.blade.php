@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Response</h3>
            </div>
        </div>

        <div class="card mt-2 shadow-sm">
            <div class="card-body">
                @php
                    $responsesByUser = $quiz->answers->groupBy('user_id');
                @endphp

                <div class="accordion" id="accordionExample">
                    @foreach ($responsesByUser as $userId => $responses)
                        @php
                            $user = optional($responses->first()->user);
                            $collapseId = 'collapseUser' . $userId;
                            $headingId = 'headingUser' . $userId;
                            $quizResult = $quiz->quizResults->firstWhere('user_id', $userId);
                        @endphp

                        <div class="card">
                            <div class="card-header" id="{{ $headingId }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#{{ $collapseId }}" aria-expanded="false"
                                        aria-controls="{{ $collapseId }}">
                                        {{ $user->name ?? 'Unknown User' }} | NIM : {{ $user->profile->nim }}
                                        @if ($quizResult)
                                            — <span class="badge badge-info">Score: {{ $quizResult->score }}</span>
                                        @endif
                                    </button>
                                </h2>
                            </div>

                            <div id="{{ $collapseId }}" class="collapse" aria-labelledby="{{ $headingId }}"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <ul>
                                        @foreach ($quiz->questions as $question)
                                            @php
                                                $userAnswer = $question->answers->firstWhere('user_id', $userId);
                                                $isCorrect =
                                                    $userAnswer && $userAnswer->response === $question->correct_answer;
                                            @endphp
                                            <li class="mb-2">
                                                <strong>{{ $question->question }}</strong><br>
                                                Jawaban: {{ $userAnswer->response ?? '-' }}
                                                @if ($userAnswer)
                                                    @if ($isCorrect)
                                                        <span class="badge badge-success">Benar</span>
                                                    @else
                                                        <span class="badge badge-danger">Salah</span>
                                                        <p>Jawaban yang benar adalah :
                                                            {{ $question->correct_answer }}
                                                        </p>
                                                    @endif
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
