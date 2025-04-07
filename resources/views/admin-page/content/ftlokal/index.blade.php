@extends('admin-page.template.main')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <button type="button" class="btn btn-light shadow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Masukan user
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered border-black" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Ktp</th>
                            <th>Nama Lengkap</th>
                            <th>Telepon</th>
                            <th>Status Pelayanan</th>
                            <th>Gereja Lokal</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $ambildata)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ambildata->ktp }}</td>
                            <td>{{ $ambildata->nama }} <br> <span class="badge text-bg-success">{{ $ambildata->akses }}</span></td>
                            <td>{{ $ambildata->telepon }}</td>
                            <td>{{ $ambildata->pelayanan }}</td>
                            <td>{{ $ambildata->lokal }}</td>
                            <td>{{ $ambildata->username }}</td>
                            <td>{{ $ambildata->password }}</td>
                            <td>
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $ambildata->id }}">Edit</button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $ambildata->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $ambildata->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $ambildata->id }}">Edit Data User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('edit-Ft-lokal', $ambildata->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Ktp :</label>
                                                    <input type="number" name="ktp" value="{{ $ambildata->ktp }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Nama Lengkap :</label>
                                                    <input type="text" name="nama" value="{{ $ambildata->nama }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <label for="">Telepon :</label>
                                                    <input type="number" class="form-control" name="telepon" value="{{ $ambildata->telepon }}" required>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="">Status Pelayanan :</label>
                                                    <input type="text" name="pelayanan" value="{{ $ambildata->pelayanan }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <label for="">Gereja Lokal :</label>
                                                    <input type="text" class="form-control" name="lokal" value="{{ $ambildata->lokal }}" required>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label class="text-danger" for="">Akses :</label>
                                                    <select name="akses" class="form-control" required>
                                                        <option value="Aktif" {{ $ambildata->akses == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                        <option value="Tidak Aktif" {{ $ambildata->akses == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <label for="">Username :</label>
                                                    <input type="text" class="form-control" name="username" value="{{ $ambildata->username }}" required>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="">Password :</label>
                                                    <input type="text" name="password" value="{{ $ambildata->password }}" required class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengisian Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('input-Ft-lokal')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Ktp :</label>
                            <input type="number" name="ktp" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Nama Lengkap :</label>
                            <input type="text" name="nama" required class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label for="">Telepon :</label>
                            <input type="number" class="form-control" name="telepon" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="">Status Pelayanan :</label>
                            <input type="text" name="pelayanan" required class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label for="">Gereja Lokal :</label>
                            <input type="text" class="form-control" name="lokal" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="text-danger" for="">Akses :</label>
                            <select name="akses" class="form-control" required>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <label for="">Username :</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="">Password :</label>
                            <input type="text" name="password" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

