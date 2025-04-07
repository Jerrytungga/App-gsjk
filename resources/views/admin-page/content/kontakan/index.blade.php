@extends('admin-page.template.main')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <button type="button" class="btn btn-light shadow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Masukan data kontakan TIA & TIK
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered border-black" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>L/P</th>
                            <th>Usia</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Pic</th>
                            <th>Kategori</th>
                            <th>Lokal</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $ambildata)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $ambildata->nama }}</td>
                            <td>{{ $ambildata->gender }}</td>
                            <td>{{ $ambildata->usia }}</td>
                            <td>{{ $ambildata->telepon }}</td>
                            <td>{{ $ambildata->alamat }}</td>
                            <td>{{ $ambildata->pic }}</td>
                            <td>{{ $ambildata->kategori }}</td>
                            <td>{{ $ambildata->lokal }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $ambildata->id }}">Edit</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $ambildata->id }}">Hapus</button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $ambildata->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $ambildata->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $ambildata->id }}">Edit Data Kontakan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('edit-data-kontakan', $ambildata->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="nama">Nama Lengkap:</label>
                                                    <input type="text" name="nama" value="{{ $ambildata->nama }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="jenis_kelamin">L/P:</label>
                                                    <select name="jenis_kelamin" required class="form-control">
                                                        <option value="L" {{ $ambildata->gender == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="P" {{ $ambildata->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label for="usia">Usia:</label>
                                                    <input type="number" name="usia" value="{{ $ambildata->usia }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="telepon">Telepon:</label>
                                                    <input type="text" name="telepon" value="{{ $ambildata->telepon }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label for="alamat">Alamat:</label>
                                                    <textarea name="alamat" required class="form-control">{{ $ambildata->alamat }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label for="pic">Pic:</label>
                                                    <input type="text" name="pic" value="{{ $ambildata->pic }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="kategori">Kategori:</label>
                                                    <select name="kategori" class="form-control">
                                                        <option value="TIA" {{ $ambildata->kategori == 'TIA' ? 'selected' : '' }}>TIA</option>
                                                        <option value="TIK" {{ $ambildata->kategori == 'TIK' ? 'selected' : '' }}>TIK</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label for="lokal">Lokal:</label>
                                                    <input type="text" name="lokal" value="{{ $ambildata->lokal }}" required class="form-control">
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
                        <div class="modal fade" id="deleteModal{{ $ambildata->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $ambildata->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel{{ $ambildata->id }}">Hapus Data Kontakan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('delete-data-kontakan', $ambildata->id) }}" method="post">
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
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengisian Data Kontakan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('input-data-kontakan') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama">Nama Lengkap:</label>
                            <input type="text" name="nama" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="jenis_kelamin">L/P:</label>
                            <select name="jenis_kelamin" required class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="usia">Usia:</label>
                            <input type="number" name="usia" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="telepon">Telepon:</label>
                            <input type="text" name="telepon" required class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="alamat">Alamat:</label>
                            <textarea name="alamat" required class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="pic">Pic:</label>
                            <input type="text" name="pic" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="kategori">Kategori:</label>
                            <select name="kategori" class="form-control">
                                <option value="TIA">TIA</option>
                                <option value="TIK">TIK</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="lokal">Lokal:</label>
                            <input type="text" name="lokal" required class="form-control">
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

