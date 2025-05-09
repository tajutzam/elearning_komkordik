@extends('layouts.app')

@section('content')
    <div class="container">
        <x-info-survey :survey="$survey" />
        <div class="mt-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pertanyaan</h3>
                </div>
                <div class="card-body">
                    <button class="btn btn-sm btn-azure" data-toggle="modal" data-target="#tambahPertanyaanModal">
                        Tambah Pertanyaan
                    </button>
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pertanyaan</th>
                                    <th>Tipe</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->question }}</td>
                                        <td>
                                            @if ($item->question_type == 'multiple')
                                                <span class="badge bg-green-dark">{{ $item->question_type }}</span>
                                            @else
                                                <span class="badge bg-blue-light">{{ $item->question_type }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex" style="gap: 5px">
                                                <button type="button" class="btn btn-sm btn-indigo" data-toggle="modal"
                                                    data-target="#detailPertanyaanModal{{ $item->id }}">
                                                    Lihat Detail
                                                </button>
                                                <form class="d-flex"
                                                    action="{{ route('pertanyaan.destroy', ['id' => $item->id]) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" type="submitS">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- modal detail --}}
                                    <div class="modal fade" id="detailPertanyaanModal{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Pertanyaan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Tutup">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Pertanyaan</label>
                                                        <input value="{{ $item->question }}" type="text"
                                                            id="question-detail" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tipe</label>
                                                        <input type="text" value="{{ $item->question_type }}"
                                                            id="type-detail" class="form-control" readonly>
                                                    </div>

                                                    @if ($item->question_type == 'multiple')
                                                        {{-- multiple --}}
                                                        <div id="options-container-detail">
                                                            @php $correct = ''; @endphp
                                                            @foreach ($item->answers as $answer)
                                                                <div class="form-group">
                                                                    <label>Opsi {{ $answer->key }}</label>
                                                                    <input type="text" value="{{ $answer->answer }}"
                                                                        id="option_{{ $answer->key }}-detail"
                                                                        class="form-control" readonly>
                                                                </div>
                                                                @if ($answer->is_correct == 1)
                                                                    @php $correct = $answer->key; @endphp
                                                                @endif
                                                            @endforeach

                                                            <div class="form-group">
                                                                <label>Jawaban Benar</label>
                                                                <input type="text" value="{{ $correct }}"
                                                                    id="correct_answer-detail" class="form-control"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $questions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahPertanyaanModal" tabindex="-1" role="dialog"
        aria-labelledby="tambahPertanyaanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="formTambahPertanyaan">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPertanyaanModalLabel">Tambah Pertanyaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="survey_id" value="{{ $survey->id }}" hidden>
                        <div class="form-group">
                            <label for="question">Pertanyaan</label>
                            <input type="text" class="form-control" name="question" id="question" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Tipe</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="">Pilih Tipe</option>
                                <option value="single">Single</option>
                                <option value="multiple">Multiple</option>
                            </select>
                        </div>

                        <div id="options-container" style="display: none;">
                            <div class="form-group">
                                <label for="option_a">Opsi A</label>
                                <input type="text" class="form-control" name="option_a" id="option_a">
                            </div>
                            <div class="form-group">
                                <label for="option_b">Opsi B</label>
                                <input type="text" class="form-control" name="option_b" id="option_b">
                            </div>
                            <div class="form-group">
                                <label for="option_c">Opsi C</label>
                                <input type="text" class="form-control" name="option_c" id="option_c">
                            </div>
                            <div class="form-group">
                                <label for="option_d">Opsi D</label>
                                <input type="text" class="form-control" name="option_d" id="option_d">
                            </div>
                            <div class="form-group">
                                <label>Jawaban Benar</label>
                                <select name="correct_answer" class="form-control">
                                    <option value="">Pilih Jawaban Benar</option>
                                    <option value="a">Opsi A</option>
                                    <option value="b">Opsi B</option>
                                    <option value="c">Opsi C</option>
                                    <option value="d">Opsi D</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('type');
            const optionsContainer = document.getElementById('options-container');

            typeSelect.addEventListener('change', function() {
                optionsContainer.style.display = (this.value === 'multiple') ? 'block' : 'none';
            });

            $('#formTambahPertanyaan').on('submit', function(e) {
                e.preventDefault();

                const formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('pertanyaan.store') }}",
                    method: "POST",
                    data: formData,
                    success: function(res) {
                        $('#tambahPertanyaanModal').modal('hide');
                        $('#formTambahPertanyaan')[0].reset();
                        $('#options-container').hide();
                        location.reload();
                    },
                    error: function(xhr) {
                        let errorMessage = 'Terjadi kesalahan. Coba lagi.';

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            errorMessage = 'Validasi gagal:\n' + Object.values(errors).map(e =>
                                e.join(', ')).join('\n');
                        }

                    },
                    complete: function() {
                        Swal.close();
                    }
                });
            });
        });
    </script>
@endpush
