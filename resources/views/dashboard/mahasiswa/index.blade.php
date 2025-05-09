@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                Data Mahasiswa
            </h1>
        </div>

        <div class="page-content">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
                Tambah Mahasiswa
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Nim</th>
                                <th>Unit Kerja</th>
                                <th>Asal Kampus</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->profile->nim }}</td>
                                    <td>{{ $item->profile->unit_kerja }}</td>
                                    <td>{{ $item->profile->asal_kampus }}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 5px">
                                            <button class="btn btn-indigo btn-sm" data-toggle="modal"
                                                data-target="#editModal-{{ $item->id }}">Edit</button>
                                            <form action="{{ route('mahasiswa.destroy', ['mahasiswa' => $item->id]) }}"
                                                method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-red btn-sm" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel-{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('mahasiswa.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel-{{ $item->id }}">Edit
                                                        Mahasiswa</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $item->email }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ $item->name }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NIM</label>
                                                        <input type="text" name="nim" class="form-control"
                                                            value="{{ $item->profile->nim }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Unit Kerja</label>
                                                        <input type="text" name="unit_kerja" class="form-control"
                                                            value="{{ $item->profile->unit_kerja }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Asal Kampus</label>
                                                        <input type="text" name="asal_kampus" class="form-control"
                                                            value="{{ $item->profile->asal_kampus }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{-- End Modal --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-2">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>


    {{-- Add Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Unit Kerja</label>
                            <input type="text" name="unit_kerja" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Asal Kampus</label>
                            <input type="text" name="asal_kampus" class="form-control">
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
