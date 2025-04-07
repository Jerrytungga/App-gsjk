<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\DataUser;
use App\Models\Ksv;
use App\Models\FtLokal;
use App\Models\Kontakan;        
use App\Models\Sekolah;
use App\Models\Universitas;
use App\Models\Baptisan;
use App\Models\Peserta;
use App\Models\RumahBelajar;
use App\Models\Kegiatan;
use App\Models\KegiatanPeserta;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login()
    {
        return view('login');
    }

  

    public function proses_login( Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $admin = Admin::where('username', $request->username)->first();
   
        if ($admin && $request->password == $admin->password) { // Cek password jika terenkripsi
        // Simpan data admin di session
        Session::put('role', 'admin');  // Simpan role ke session

        // Redirect ke halaman admin setelah login
        return redirect()->route('dashboard-admin');
         }
         
         
         $user = DataUser::where('username', $request->username)->first();
    
         if ($user && $request->password == $user->password) { // Cek password jika terenkripsi
         // Simpan data admin di session
         Session::put('role', 'user');  // Simpan role ke session
         Session::put('lokal', $user->lokal);
         // Redirect ke halaman admin setelah login
         return redirect()->route('dashboard-user');
          }



    // Jika gagal login, beri pesan error
    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ]);
         
     }


     public function logout()
{
    // Hapus semua session
    Session::flush();

    // Redirect ke halaman login
    return redirect()->route('halaman_login')->with('success', 'Anda telah logout.');
}
    

  // Tampilan Halaman kaum saleh
  public function h_kaum_saleh_user()
  {
      // Ambil user_id dari session
      $user_id = Session::get('lokal');
  
      // Ambil data yang hanya milik user yang sedang login
      $data = Ksv::where('lokal', $user_id) // Filter berdasarkan user
                  ->orderBy('created_at', 'desc') // Urutkan terbaru
                  ->get();
  
      return view('user-page.content.kaumsaleh.index', compact('data'));
  }


}
