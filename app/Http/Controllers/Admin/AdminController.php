<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balaisidang;
use App\Models\DataUser;
use App\Models\Ksv;
use App\Models\PesertaRB;
use App\Models\FileAdministrasi;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KaumSalehImport;
use App\Models\Kontakan;
use Illuminate\Support\Facades\Log;
use App\Models\Sekolah;
use App\Models\Universitas;
use Illuminate\Support\Facades\Storage;
use App\Models\JadwalSidang;

class AdminController extends Controller
{
   
   
    // Tampilan Halaman balai sidang
    public function h_balaisidang(){
        $daftar_balai = Balaisidang::orderBy('created_at', 'desc')->get();
            return view('admin-page.content.balaisidang.index',
            ['daftar_balai' => $daftar_balai]); 
     }

    //  Tampilan Halaman input balai sidang
     public function input_balai_sidang(Request $request){
        $request->validate([
            'lokal' => 'required|string', 
            'lokasi' => 'required|string', 
            'alamat' => 'required|string', 
            'kontak' => 'required|string', 
        ]);
        Balaisidang::create([
            'lokal' => $request->lokal,
            'lokasi' => $request->lokasi,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
    
    // Tampilan Halaman edit balai sidang
    
    public function edit_balai_sidang(Request $request, $id)
    {
        $balaiSidang = BalaiSidang::findOrFail($id);
        $balaiSidang->lokal = $request->input('lokal');
        $balaiSidang->alamat = $request->input('alamat');
        $balaiSidang->lokasi = $request->input('lokasi');
        $balaiSidang->kontak = $request->input('kontak');
        $balaiSidang->save();
        
        return redirect()->back()->with('success', 'Data Balai Sidang berhasil diubah.');
    }
    
    
    // Tampilan Halaman kaum saleh
    public function h_kaum_saleh(){
        $data = Ksv::orderBy('created_at', 'desc')->get();
        return view('admin-page.content.kaumsaleh.index', ['data' => $data]);
    }

    public function input_Ksv(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'usia' => 'required|numeric',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tanggal_baptis' => 'required|date',
            'lokal' => 'required|string',
        ]);

        Ksv::create([
            'nama' => $request->nama,
            'gender' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tanggal_lahir,
            'tgl_baptis' => $request->tanggal_baptis,
            'lokal' => $request->lokal,
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

     // Update an existing Kaum Saleh
     public function update_Ksv(Request $request, $id)
     {
         $request->validate([
             'nama' => 'required|string',
             'jenis_kelamin' => 'required|string',
             'usia' => 'required|numeric',
             'telepon' => 'required|string',
             'alamat' => 'required|string',
             'tanggal_lahir' => 'required|date',
             'tanggal_baptis' => 'required|date',
             'lokal' => 'required|string',
         ]);
 
         $kaumSaleh = Ksv::findOrFail($id);
         $kaumSaleh->update([
             'nama' => $request->nama,
             'gender' => $request->jenis_kelamin,
             'usia' => $request->usia,
             'telepon' => $request->telepon,
             'alamat' => $request->alamat,
             'tgl_lahir' => $request->tanggal_lahir,
             'tgl_baptis' => $request->tanggal_baptis,
             'lokal' => $request->lokal,
         ]);
 
         return redirect()->back()->with('success', 'Data berhasil diubah');
     }

     public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv|max:2048',
    ]);

    try {
        $import = new KaumSalehImport();
        Excel::import($import, $request->file('file')->store('temp'));

        $imported = $import->getImportedCount();
        $skipped = $import->getSkippedCount();
        $duplicates = $import->getDuplicateData();

        if ($skipped > 0) {
            $duplicateList = implode(", ", $duplicates);
            $message = "Data berhasil diimpor.\nBerhasil: {$imported} baris.\n⚠️ {$skipped} baris diabaikan karena duplikat.\nData duplikat:\n{$duplicateList}\n";
        } else {
            $message = "Data berhasil diimpor. Berhasil: {$imported} baris.";
        }

        return redirect()->back()->with('import_message', $message);

    } catch (\Exception $e) {
        Log::error('Gagal mengimpor file: ' . $e->getMessage());
        return redirect()->back()->with('import_error', 'Terjadi kesalahan saat mengimpor file.');
    }
}


     public function downloadSample()
     {
         $filePath = public_path('sample_kaum_saleh.xlsx');
         return response()->download($filePath);
     }


   // Tampilan Halaman Ft lokal
    
    public function h_ftlokal(){
        $dataUser = DataUser::orderBy('created_at', 'desc')->get();
        return view('admin-page.content.ftlokal.index', ['data'=> $dataUser]);
    }
    public function input_ftlokal( Request $request){
        $request ->validate([
            'ktp' => 'required|string',
            'nama' => 'required|string',
            'telepon' => 'required|string',
            'pelayanan'=> 'required|string',
            'lokal'=> 'required|string',
            'akses'=> 'required|string',
            'username'=> 'required|string',
            'password'=> 'required|string',
        ]);
        
        DataUser::create([
            'ktp' => $request->ktp,
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'pelayanan' => $request->pelayanan,
            'lokal' => $request->lokal,
            'akses' => $request->akses,
            'username' => $request->username,
            'password' => $request->password,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update_dataUser(Request $request, $id)
    {
        $request->validate([
            'ktp' => 'required|numeric',
            'nama' => 'required|string',
            'telepon' => 'required|numeric',
            'pelayanan' => 'required|string',
            'lokal' => 'required|string',
            'akses' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = DataUser::findOrFail($id);
        $user->update([
            'ktp' => $request->ktp,
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'pelayanan' => $request->pelayanan,
            'lokal' => $request->lokal,
            'akses' => $request->akses,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }
    






    public function h_jadwal_sidang()
    {
        $jadwal = JadwalSidang::orderBy('created_at', 'asc')->get();
        return view('admin-page.content.jadwal_sidang.index', compact('jadwal'));
    }



    /////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////
    // Tampilan Halaman Kontakan
    public function h_Kontakan(){
        $dataKontakan = Kontakan::orderBy('created_at', 'desc')->get();
        return view('admin-page.content.kontakan.index', ['data'=> $dataKontakan]);
    }

    public function input_dataKontakan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'usia' => 'required|numeric',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
            'pic' => 'required|string',
            'kategori' => 'required|string',
            'lokal' => 'required|string'
        ]);

        Kontakan::create([
            'nama' => $request->nama,
            'gender' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'pic' => $request->pic,
            'Kategori' => $request->kategori,
            'lokal' => $request->lokal
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function edit_dataKontakan(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'usia' => 'required|numeric',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
            'pic' => 'required|string',
            'kategori' => 'required|string',
            'lokal' => 'required|string'
        ]);

        $kontakan = Kontakan::findOrFail($id);
        $kontakan->update([
            'nama' => $request->nama,
            'gender' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'pic' => $request->pic,
            'kategori' => $request->kategori,
            'lokal' => $request->lokal
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function delete_dataKontakan($id)
    {
        $kontakan = Kontakan::findOrFail($id);
        $kontakan->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }


    /////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////
   // Tampilan Halaman Sekolah 

    public function Daftar_sekolah(){
        $data_sekolah = Sekolah::orderBy('created_at', 'desc')->get(); 
        return view('admin-page.content.sekolah.index', ['data_masuk'=> $data_sekolah]);
    }

    public function input_dataSekolah(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'lokasi' => 'required|string',
            'lokal' => 'required|string'
        ]);

        Sekolah::create([
            'nama_sekolah' => $request->nama,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'lokal' => $request->lokal
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function edit_dataSekolah(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'lokasi' => 'required|string',
            'lokal' => 'required|string'
        ]);

        $sekolah = Sekolah::findOrFail($id);
        $sekolah->update([
            'nama_sekolah' => $request->nama,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'lokal' => $request->lokal
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function delete_dataSekolah($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    // Tampilan Halaman akhir Sekolah
    //////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////

    // /////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////
    // Tampilan Halaman Universitas

    public function Daftar_universitas(){
        $data_universitas = Universitas::orderBy('created_at', 'desc')->get(); 
        return view('admin-page.content.sekolah.universitas', ['data_univ'=> $data_universitas]);
    }

    public function input_dataUniversitas(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'akreditasi' => 'required|string',
            'lokasi' => 'required|string',
            'lokal' => 'required|string'
        ]);

        Universitas::create([
            'nama_universitas' => $request->nama,
            'akreditasi' => $request->akreditasi,
            'lokasi' => $request->lokasi,
            'lokal' => $request->lokal
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function edit_dataUniversitas(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'akreditasi' => 'required|string',
            'lokasi' => 'required|string',
            'lokal' => 'required|string'
        ]);

        $universitas = Universitas::findOrFail($id);
        $universitas->update([
            'nama_universitas' => $request->nama,
            'akreditasi' => $request->akreditasi,
            'lokasi' => $request->lokasi,
            'lokal' => $request->lokal
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function delete_dataUniversitas($id)
    {
        $universitas = Universitas::findOrFail($id);
        $universitas->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
  //////////////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////////////
  // Tampilan Halaman akhir Universitas


  ////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////
  // Tampilan Halaman baptisan

    public function Daftar_baptisan(){
        return view('admin-page.content.baptisan.index');
    }

    // Tampilan Halaman akhir baptisan
    ////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////

    public function RB(){
        $pesertaRB = PesertaRB::orderBy('created_at', 'desc')->get();
        return view('admin-page.content.rumahbelajar.peserta', ['data_peserta' => $pesertaRB]);
    }  

    public function input_dataPeserta(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string',
            'gender' => 'required|string',
            'sekolah' => 'required|string',
            'kelas' => 'required|string',
            'agama' => 'required|string',
            'lokal' => 'required|string',
            'tgl_terdaftar' => 'required|date'
        ]);

        PesertaRB::create([
            'nama_siswa' => $request->nama_siswa,
            'gender' => $request->gender,
            'sekolah' => $request->sekolah,
            'kelas' => $request->kelas,
            'agama' => $request->agama,
            'lokal' => $request->lokal,
            'tgl_terdaftar' => $request->tgl_terdaftar
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function edit_dataPeserta(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required|string',
            'gender' => 'required|string',
            'sekolah' => 'required|string',
            'kelas' => 'required|string',
            'agama' => 'required|string',
            'lokal' => 'required|string',
            'tgl_terdaftar' => 'required|date'
        ]);

        $peserta = PesertaRB::findOrFail($id);
        $peserta->update([
            'nama_siswa' => $request->nama_siswa,
            'gender' => $request->gender,
            'sekolah' => $request->sekolah,
            'kelas' => $request->kelas,
            'agama' => $request->agama,
            'lokal' => $request->lokal,
            'tgl_terdaftar' => $request->tgl_terdaftar
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function delete_dataPeserta($id)
    {
        $peserta = PesertaRB::findOrFail($id);
        $peserta->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

  


    public function File_manager(Request $request)
    {
        $files = FileAdministrasi::orderBy('created_at', 'desc')->get();
        return view('admin-page.content.file_manager.index', compact('files'));
    }
    

    public function input_file(Request $request)
    {
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'kategori_file' => 'required|string',
            'file_upload' => 'required|file|mimes:pdf,doc,docx,xlsx,csv|max:2048'
        ]);

       // Ambil file dari request
    $file = $request->file('file_upload');

    // Buat nama file sesuai dengan input pengguna + ekstensi file asli
    $fileName = $request->nama_file . '.' . $file->getClientOriginalExtension();

    // Simpan file dengan nama yang sudah ditentukan ke storage
    $path = $file->storeAs('uploads/files', $fileName, 'public');

    // Simpan data ke database
    FileAdministrasi::create([
        'nama_file' => $request->nama_file, // Nama file yang dimasukkan user
        'kategori_file' => $request->kategori_file,
        'file_path' => $path // Simpan path file yang benar
    ]);
        return redirect()->route('file-manager.index')->with('success', 'File berhasil diunggah!');
    }

    public function hapus_file($id)
    {
        $file = FileAdministrasi::findOrFail($id);

        // Hapus file dari storage
        if (Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        // Hapus file dari database
        $file->delete();

        return response()->json(['success' => 'File berhasil dihapus!']);
    }


}
