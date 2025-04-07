@extends('admin-page.template.main')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <button type="button" class="btn btn-light shadow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Masukan data kaum saleh
            </button>
            <button type="button" class="btn btn-light shadow" data-bs-toggle="modal" data-bs-target="#importModal">
                Import Excel
            </button>
            <a href="{{ route('download-sample-kaum-saleh') }}" class="btn btn-light shadow">
                Download Sample Excel
            </a>
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
                            <th>Tanggal Lahir</th>
                            <th>Tanggal Baptis</th>
                            <th>Lokal</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $kaumSaleh)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $kaumSaleh->nama }}</td>
                            <td>{{ $kaumSaleh->gender }}</td>
                            <td>{{ $kaumSaleh->usia }}</td>
                            <td>{{ $kaumSaleh->telepon }}</td>
                            <td>{{ $kaumSaleh->alamat }}</td>
                            <td>{{ $kaumSaleh->tgl_lahir }}</td>
                            <td>{{ $kaumSaleh->tgl_baptis }}</td>
                            <td>{{ $kaumSaleh->lokal }}</td>
                            <td>
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $kaumSaleh->id }}">Edit</button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $kaumSaleh->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $kaumSaleh->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $kaumSaleh->id }}">Edit Data Kaum Saleh</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('edit-kaum-saleh', $kaumSaleh->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="nama">Nama Lengkap:</label>
                                                    <input type="text" name="nama" value="{{ $kaumSaleh->nama }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="jenis_kelamin">L/P:</label>
                                                    <select name="jenis_kelamin" required class="form-control">
                                                        <option value="L" {{ $kaumSaleh->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="P" {{ $kaumSaleh->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label for="usia">Usia:</label>
                                                    <input type="number" name="usia" value="{{ $kaumSaleh->usia }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="telepon">Telepon:</label>
                                                    <input type="text" name="telepon" value="{{ $kaumSaleh->telepon }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label for="alamat">Alamat:</label>
                                                    <textarea name="alamat" required class="form-control">{{ $kaumSaleh->alamat }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                                                    <input type="date" name="tanggal_lahir" value="{{ $kaumSaleh->tgl_lahir }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="tanggal_baptis">Tanggal Baptis:</label>
                                                    <input type="date" name="tanggal_baptis" value="{{ $kaumSaleh->tgl_baptis }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <label for="lokal">Lokal:</label>
                                                    <input type="text" name="lokal" value="{{ $kaumSaleh->lokal }}" required class="form-control">
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengisian Data Kaum Saleh</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('input-kaum-saleh') }}" method="post">
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
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" name="tanggal_lahir" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_baptis">Tanggal Baptis:</label>
                            <input type="date" name="tanggal_baptis" required class="form-control">
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

<!-- Import Modal -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5" id="importModalLabel">Import Data Kaum Saleh</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('import-kaum-saleh') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="file">Pilih File Excel:</label>
                            <input type="file" name="file" accept=".xlsx,.xls,.csv" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

