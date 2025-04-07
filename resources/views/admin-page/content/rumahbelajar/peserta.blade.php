@extends('admin-page.template.main')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <button type="button" class="btn btn-light shadow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Masukan data peserta
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered border-black" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama siswa</th>
                            <th>Gender</th>
                            <th>Sekolah</th>
                            <th>Kelas</th>
                            <th>Agama</th>
                            <th>Lokal</th>
                            <th>Tgl terdaftar</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_peserta as $index => $peserta)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $peserta->nama_siswa }}</td>
                            <td>{{ $peserta->gender }}</td>
                            <td>{{ $peserta->sekolah }}</td>
                            <td>{{ $peserta->kelas }}</td>
                            <td>{{ $peserta->agama }}</td>
                            <td>{{ $peserta->lokal }}</td>
                            <td>{{ $peserta->tgl_terdaftar }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $peserta->id }}">Edit</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $peserta->id }}">Hapus</button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $peserta->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $peserta->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $peserta->id }}">Edit Data Peserta</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('edit-data-peserta', $peserta->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="nama_siswa">Nama Siswa:</label>
                                                    <input type="text" name="nama_siswa" value="{{ $peserta->nama_siswa }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="gender">Gender:</label>
                                                    <select name="gender" required class="form-control">
                                                        <option value="L" {{ $peserta->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="P" {{ $peserta->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label for="sekolah">Sekolah:</label>
                                                    <input type="text" name="sekolah" value="{{ $peserta->sekolah }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="kelas">Kelas:</label>
                                                    <input type="text" name="kelas" value="{{ $peserta->kelas }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label for="agama">Agama:</label>
                                                    <input type="text" name="agama" value="{{ $peserta->agama }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="lokal">Lokal:</label>
                                                    <input type="text" name="lokal" value="{{ $peserta->lokal }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label for="tgl_terdaftar">Tanggal Terdaftar:</label>
                                                    <input type="date" name="tgl_terdaftar" value="{{ $peserta->tgl_terdaftar }}" required class="form-control">
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

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $peserta->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $peserta->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel{{ $peserta->id }}">Hapus Data Peserta</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('delete-data-peserta', $peserta->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Hapus</button>
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
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengisian Data Peserta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('input-data-peserta') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama_siswa">Nama Siswa:</label>
                            <input type="text" name="nama_siswa" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="gender">Gender:</label>
                            <select name="gender" required class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="sekolah">Sekolah:</label>
                            <input type="text" name="sekolah" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="kelas">Kelas:</label>
                            <input type="text" name="kelas" required class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="agama">Agama:</label>
                            <input type="text" name="agama" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="lokal">Lokal:</label>
                            <input type="text" name="lokal" required class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="tgl_terdaftar">Tanggal Terdaftar:</label>
                            <input type="date" name="tgl_terdaftar" required class="form-control">
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

