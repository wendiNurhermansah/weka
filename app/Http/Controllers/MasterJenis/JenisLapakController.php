<?php

namespace App\Http\Controllers\MasterJenis;

use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Model
use App\Models\JenisLapak;

class JenisLapakController extends Controller
{
    protected $route = 'master-jenis.jenisLapak.';
    protected $view  = 'pages.masterJenis.lapak.';
    protected $title = 'Jenis Lapak';

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
        $jenisLapak = JenisLapak::all();
        return DataTables::of($jenisLapak)
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
            'nm_jenis_lapak' => 'required'
        ]);

        $jenisLapak = new JenisLapak();
        $jenisLapak->nm_jenis_lapak = $request->nm_jenis_lapak;
        $jenisLapak->save();

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil tersimpan.'
        ]);
    }

    public function edit($id)
    {
        $jenisLapak = JenisLapak::findOrFail($id);

        return $jenisLapak;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nm_jenis_lapak' => 'required'
        ]);

        $jenisLapak = JenisLapak::find($id);
        $jenisLapak->update([
            'nm_jenis_lapak' => $request->nm_jenis_lapak
        ]);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }

    public function destroy($id)
    {
        JenisLapak::destroy($id);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.'
        ]);
    }
}
