<?php

namespace App\Http\Controllers\kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\KategoriImport;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
       return view('kategori.import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */


    /**
    * @return \Illuminate\Support\Collection
    */
    public function store(Request $request)
    {
        // Excel::import(new KategoriImport,request()->file('gambar'));

        // return back();

        // validasi

		$this->validate($request, [
			'gambar' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('gambar');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file',$nama_file);

		// import data
		Excel::import(new KategoriImport, public_path('/file/'.$nama_file));

		// // notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');

		// alihkan halaman kembali
		return response()->json([
            'message' => 'data berhasil di input.', 200
        ]);
    }
}
