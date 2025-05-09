@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Hasil Survey
                </h3>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Isi Survey</th>
                                <th>judul Survey</th>
                                <th>Deskripsi Survey</th>
                                <th>Status Nilai</th>
                                <th>Nilai</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hasilSurvey as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->toFormattedDateString() }}</td>
                                    <td>{{ $item->survey->title }}</td>
                                    <td>{{ $item->survey->description }}</td>
                                    <td>
                                        @if (isset($item->nilai))
                                            <span class="badge bg-indigo-dark">Sudah Dinilai</span>
                                        @else
                                            <span class="badge bg-danger">Belum Dinilai</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-teal">{{ $item->nilai }} / 100</span>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <form
                                                action="{{ route('survey.hasil-survey.destroy', ['survey' => $item->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-2">
                        {{ $hasilSurvey->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
