@extends('admin-page.template.main')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">File Administrasi</h4>
            <p class="card-category">Wilayah 8</p>
        </div>
        <div class="card-body">
            {{-- Form Tambah Data --}}
            <form action="{{ route('file-administrasi.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nama_file" class="form-label">Nama File</label>
                        <input type="text" class="form-control" id="nama_file" name="nama_file" placeholder="Masukkan nama file" required>
                    </div>
                    <div class="col-md-4">
                        <label for="kategori_file" class="form-label">Kategori File</label>
                        <select class="form-control" id="kategori_file" name="kategori_file" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="Jadwal">Jadwal</option>
                            <option value="Administrasi">Administrasi</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="file_upload" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="file_upload" name="file_upload" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Tambah Data</button>
            </form>
            {{-- End Form Tambah Data --}}

            <hr>

            {{-- Tabel Data --}}
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered border-black" style="width:100%">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama File</th>
                            <th>Kategori File</th>
                            <th>Pengaturan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $key => $file)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $file->nama_file }}</td>
                            <td>{{ $file->kategori_file }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="viewFile('{{ asset('storage/' . $file->file_path) }}')">
                                    Lihat
                                </button>
                                <button class="btn btn-sm btn-danger shadow-sm deleteFile" data-id="{{ $file->id }}">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- End Tabel Data --}}
        </div>
    </div>
</div>

<!-- Modal View File -->
<div class="modal fade" id="viewFileModal" tabindex="-1" aria-labelledby="viewFileLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl"> <!-- Menggunakan modal ekstra besar -->
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="viewFileLabel">Lihat File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Untuk file PDF -->
                <iframe id="fileViewer" src="" width="100%" height="500px" style="border: none; display: none;"></iframe>
                
                <!-- Untuk file Excel -->
                <div id="excelContainer" style="display: none;">
                    <table id="excelTable" class="table table-bordered table-striped">
                        <thead></thead>
                        <tbody></tbody>
                    </table>
                </div>

                <!-- Link untuk mengunduh file jika tidak bisa ditampilkan -->
                <p id="downloadLink" class="mt-3"></p>
            </div>
        </div>
    </div>
</div>


<!-- Tambahkan jQuery & DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<!-- SheetJS untuk membaca Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>


<!-- Load SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".deleteFile").forEach(button => {
        button.addEventListener("click", function() {
            let fileId = this.getAttribute("data-id");
            let deleteUrl = `/file-administrasi/${fileId}`; // Pastikan URL sesuai

            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "File ini tidak bisa dikembalikan setelah dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(deleteUrl, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            "Content-Type": "application/json"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire({
                            title: "Terhapus!",
                            text: data.success,
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload(); // Reload halaman setelah sukses hapus
                        });
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        Swal.fire({
                            title: "Gagal!",
                            text: "Terjadi kesalahan saat menghapus file.",
                            icon: "error"
                        });
                    });
                }
            });
        });
    });
});
</script>


<script>
    function viewFile(fileUrl) {
        let fileExt = fileUrl.split('.').pop().toLowerCase();
        let viewer = document.getElementById("fileViewer");
        let excelContainer = document.getElementById("excelContainer");
        let downloadLink = document.getElementById("downloadLink");

        viewer.style.display = "none";
        excelContainer.style.display = "none";
        excelContainer.querySelector("thead").innerHTML = "";
        excelContainer.querySelector("tbody").innerHTML = "";

        if (fileExt === "pdf") {
            viewer.src = fileUrl;
            viewer.style.display = "block";
        } else if (fileExt === "doc" || fileExt === "docx" || fileExt === "ppt" || fileExt === "pptx") {
            viewer.src = `https://docs.google.com/gview?url=${fileUrl}&embedded=true`;
            viewer.style.display = "block";
        } else if (fileExt === "xlsx" || fileExt === "csv") {
            fetch(fileUrl)
                .then(response => response.arrayBuffer())
                .then(data => {
                    let workbook = XLSX.read(data, { type: "array" });
                    let sheetName = workbook.SheetNames[0];
                    let sheet = workbook.Sheets[sheetName];
                    let jsonData = XLSX.utils.sheet_to_json(sheet, { header: 1 });

                    if (jsonData.length > 0) {
                        let theadHTML = "<tr>";
                        jsonData[0].forEach(col => { theadHTML += `<th>${col}</th>`; });
                        theadHTML += "</tr>";

                        let tbodyHTML = "";
                        for (let i = 1; i < jsonData.length; i++) {
                            tbodyHTML += "<tr>";
                            jsonData[i].forEach(cell => {
                                tbodyHTML += `<td>${cell ? cell : ''}</td>`;
                            });
                            tbodyHTML += "</tr>";
                        }

                        document.querySelector("#excelTable thead").innerHTML = theadHTML;
                        document.querySelector("#excelTable tbody").innerHTML = tbodyHTML;

                        // Inisialisasi DataTables setelah data dimasukkan
                        if ($.fn.DataTable.isDataTable("#excelTable")) {
                            $('#excelTable').DataTable().destroy();
                        }
                        $('#excelTable').DataTable();

                        excelContainer.style.display = "block";
                    }
                })
                .catch(error => {
                    console.error("Error membaca file Excel:", error);
                    downloadLink.innerHTML = `<a href="${fileUrl}" target="_blank" class="btn btn-primary">Unduh File</a>`;
                });
        } else {
            downloadLink.innerHTML = `<a href="${fileUrl}" target="_blank" class="btn btn-primary">Unduh File</a>`;
        }

        var viewModal = new bootstrap.Modal(document.getElementById("viewFileModal"));
        viewModal.show();
    }
</script>


@endsection

