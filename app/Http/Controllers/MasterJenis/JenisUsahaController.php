<?php

namespace App\Http\Controllers\MasterJenis;

use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Model
use App\Models\JenisUsaha;

class JenisUsahaController extends Controller
{
    protected $route = 'master-jenis.jenisUsaha.';
    protected $view  = 'pages.masterJenis.usaha.';
    protected $title = 'Jenis Usaha';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;

        return view($this->view . 'index', compact(
            'route',
            'title'
        ));
    }

    public function api()
    {
        $jenisUsaha = JenisUsaha::all();
        return DataTables::of($jenisUsaha)
            ->addColumn('action', function ($p) {
                return "
                <a href='#' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_kategori' => 'required'
        ]);

        $jenisUsaha = new JenisUsaha();
        $jenisUsaha->nm_kategori = $request->nm_kategori;
        $jenisUsaha->save();

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil tersimpan.'
        ]);
    }

    public function edit($id)
    {
        $jenisUsaha = JenisUsaha::findOrFail($id);

        return $jenisUsaha;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nm_kategori' => 'required'
        ]);

        $jenisUsaha = JenisUsaha::find($id);
        $jenisUsaha->update([
            'nm_kategori' => $request->nm_kategori
        ]);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }

    public function destroy($id)
    {
        JenisUsaha::destroy($id);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.'
        ]);
    }
}
