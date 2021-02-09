<?php

namespace App\Http\Controllers\kategori;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Jobs\ImportJob;
use DataTables;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Kategori = Kategori::paginate(10);

        return view('Kategori.import');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required'
        ]);

        //JIKA FILE ADA
        if ($request->hasFile('gambar')) {
            //GET FILE NYA
            $file = $request->file('gambar');
            //MEMBUAT FILENAME DENGAN MENGAMBIL EKSTENSI DARI FILE YANG DI-UPLOAD
            $filename = time() . '.' . $file->getClientOriginalExtension();

            //FILE TERSEBUT DISIMPAN KEDALAM FOLDER
            // STORAGE > APP > PUBLIC > IMPORT
            //DENGAN MENGGUNAKAN METHOD storeAs()
            $file->storeAs(
                'public/import', $filename
            );

            //MEMBUAT INSTRUKSI JOB QUEUE
            ImportJob::dispatch($filename);
            //REDIRECT DENGAN FLASH MESSAGE BERHASIL
            return redirect()->back()->with(['success' => 'Upload success']);
        }
        //JIKA TIDAK ADA FILE, REDIRECT ERROR
        return redirect()->back()->with(['error' => 'Failed to upload file']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
