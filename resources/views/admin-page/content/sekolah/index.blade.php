@extends('admin-page.template.main')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <button type="button" class="btn btn-light shadow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Masukan data sekolah
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered border-black" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Sekolah</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Lokal</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_masuk as $index => $sekolah)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sekolah->nama_sekolah }}</td>
                            <td>{{ $sekolah->kategori }}</td>
                            <td>{{ $sekolah->lokasi }}</td>
                            <td>{{ $sekolah->lokal }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $sekolah->id }}">Edit</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $sekolah->id }}">Hapus</button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $sekolah->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $sekolah->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $sekolah->id }}">Edit Data Sekolah</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('edit-data-sekolah', $sekolah->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="nama">Nama Sekolah:</label>
                                                    <input type="text" name="nama" value="{{ $sekolah->nama_sekolah }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="kategori">Kategori:</label>
                                                    <input type="text" name="kategori" value="{{ $sekolah->kategori }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label for="lokasi">Lokasi:</label>
                                                    <input type="text" name="lokasi" value="{{ $sekolah->lokasi }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="lokal">Lokal:</label>
                                                    <input type="text" name="lokal" value="{{ $sekolah->lokal }}" required class="form-control">
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
                        <div class="modal fade" id="deleteModal{{ $sekolah->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $sekolah->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel{{ $sekolah->id }}">Hapus Data Sekolah</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('delete-data-sekolah', $sekolah->id) }}" method="post">
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengisian Data Sekolah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('input-data-sekolah') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama">Nama Sekolah:</label>
                            <input type="text" name="nama" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="kategori">Kategori:</label>
                            <input type="text" name="kategori" required class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="lokasi">Lokasi:</label>
                            <input type="text" name="lokasi" required class="form-control">
                        </div>
                        <div class="col-md-6">
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

