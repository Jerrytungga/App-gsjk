@extends('admin-page.template.main')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Jadwal Sidang-sidang Gereja</h4>
            <p class="card-category">Wilayah 8</p>
            <button class="btn btn-light " data-bs-toggle="modal" data-bs-target="#addModal">
                Tambah Jadwal
            </button>
        </div>
        <div class="card-body">
            <!-- Tombol Tambah Data -->
       

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered border-black" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Sidang</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Tempat</th>
                            <th>Lokal</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwal as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_sidang }}</td>
                            <td>{{ $item->hari }}</td>
                            <td>{{ $item->waktu_mulai }} - {{ $item->waktu_akhir }}</td>
                            <td>{{ $item->tempat }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Jadwal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addModalLabel">Tambah Jadwal Sidang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_sidang" class="form-label">Nama Sidang</label>
                        <input type="text" class="form-control" id="nama_sidang" name="nama_sidang" required>
                    </div>
                    <div class="mb-3">
                        <label for="hari" class="form-label">Hari</label>
                        <select class="form-control" id="hari" name="hari" required>
                            <option value="">Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                        <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_akhir" class="form-label">Waktu Akhir</label>
                        <input type="time" class="form-control" id="waktu_akhir" name="waktu_akhir" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" class="form-control" id="tempat" name="tempat" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Lokal</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
