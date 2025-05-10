@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Isi Quiz</h3>
            </div>
        </div>

        <x-info-survey :survey="$survey" />

        <form action="{{ route('quiz.submit', $survey->id) }}" method="POST">
            @csrf
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
                                @endphp

                                @foreach ($option as $key)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="answers[{{ $item->id }}]"
                                            value="{{ $key }}" id="q{{ $item->id }}_{{ $key }}"
                                            required>
                                        <label class="form-check-label" for="q{{ $item->id }}_{{ $key }}">
                                            {{ strtoupper($key) }}. {{ $item->{'option_' . $key} }}
                                        </label>
                                    </div>
                                @endforeach
                            </li>
                        @endforeach
                    </ol>

                    <div class="mt-4 text-end">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-send me-1"></i> Kirim Jawaban
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
