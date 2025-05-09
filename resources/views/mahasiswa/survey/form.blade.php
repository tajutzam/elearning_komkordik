@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Judul Survey -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Isi Survey</h3>
            </div>
        </div>

        <x-info-survey :survey="$survey" />

        <form action="{{ route('isi-survey.post', ['id' => $survey->id]) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <ol class="list-group list-group-numbered">
                        @foreach ($survey->questions as $item)
                            <li class="list-group-item mb-4">
                                <div class="mb-2">
                                    <strong>{{ $item->question }}</strong>
                                </div>

                                @if ($item->question_type == 'single')
                                    <input type="text" name="answer[{{ $item->id }}]" class="form-control"
                                        placeholder="Masukkan jawaban kamu di sini" required>
                                @else
                                    @foreach ($item->answers as $answer)
                                        <div class="form-check my-2">
                                            <input class="form-check-input" type="radio"
                                                name="answer[{{ $item->id }}]" value="{{ $answer->answer }}"
                                                id="answer_{{ $item->id }}_{{ $loop->index }}" required>
                                            <label class="form-check-label d-flex align-items-center gap-2"
                                                for="answer_{{ $item->id }}_{{ $loop->index }}">
                                                <strong>{{ strtoupper($answer->key) }}.</strong>
                                                {{ $answer->answer }}
                                            </label>
                                        </div>
                                    @endforeach
                                @endif
                            </li>
                        @endforeach
                    </ol>
                    <div class="mt-4 text-end">
                        <button class="btn btn-primary">Kirim Jawaban</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
