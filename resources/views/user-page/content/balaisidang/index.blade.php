@extends('admin-page.template.main')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <button type="button" class="btn btn-light shadow" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Masukan alamat balai sidang
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered border-black" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Lokal</th>
                            <th>Alamat</th>
                            <th>Lokasi</th>
                            <th>Kontak Person</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftar_balai as $index => $data)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $data->lokal }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>
                                <center>
                                    <a href="{{ $data->lokasi }}" target="_blank"><i class="fas fa-map-marker-alt" style="color: green; font-size: 30px;"></i></a>
                                </center>
                            </td>
                            <td>{{ $data->kontak }}</td>
                            <td>
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id }}">Edit</button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $data->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $data->id }}">Edit Alamat Balai Sidang</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('edit-balai-sidang', $data->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Lokal :</label>
                                                    <input type="text" name="lokal" value="{{ $data->lokal }}" required class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Lokasi :</label>
                                                    <input type="text" name="lokasi" value="{{ $data->lokasi }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 mt-2">
                                                    <label for="">Alamat :</label>
                                                    <textarea name="alamat" required class="form-control mt-1">{{ $data->alamat }}</textarea>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="">Kontak Person :</label>
                                                    <input type="text" name="kontak" value="{{ $data->kontak }}" required class="form-control">
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengisian Alamat Balai Sidang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('input-balai-sidang') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Lokal :</label>
                            <input type="text" name="lokal" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Lokasi :</label>
                            <input type="text" name="lokasi" required class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <label for="">Alamat :</label>
                            <textarea name="alamat" required class="form-control mt-1"></textarea>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="">Kontak Person :</label>
                            <input type="text" name="kontak" required class="form-control">
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

