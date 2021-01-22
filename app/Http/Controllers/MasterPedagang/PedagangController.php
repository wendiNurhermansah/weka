<?php

namespace App\Http\Controllers\MasterPedagang;

use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Model
use App\Models\Pedagang;

class PedagangController extends Controller
{
    protected $route = 'master-pedagang.pedagang.';
    protected $view  = 'pages.masterPedagang.pedagang.';
    protected $title = 'Pedagang';

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
        $pedagang = Pedagang::all();
        return DataTables::of($pedagang)
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
            'no_telp' => 'required',
            'no_ktp'  => 'required|min:16|unique:tm_pedagangs,no_ktp',
            'nm_pedagang'     => 'required',
            'alamat_pedagang' => 'required'
        ]);

        $pedagang = new Pedagang();
        $pedagang->nm_pedagang     = $request->nm_pedagang;
        $pedagang->alamat_pedagang = $request->alamat_pedagang;
        $pedagang->no_ktp = $request->no_ktp;
        $pedagang->no_telp = $request->no_telp;
        $pedagang->save();

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil tersimpan.'
        ]);
    }

    public function edit($id)
    {
        $pedagang = Pedagang::findOrFail($id);

        return $pedagang;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nm_pedagang'     => 'required',
            'alamat_pedagang' => 'required',
            'no_ktp'  => 'required|min:16|unique:tm_pedagangs,no_ktp,' . $id,
            'no_telp' => 'required'
        ]);

        $pedagang = Pedagang::find($id);
        $pedagang->update([
            'nm_pedagang'     => $request->nm_pedagang,
            'alamat_pedagang' => $request->alamat_pedagang,
            'no_ktp'  => $request->no_ktp,
            'no_telp' => $request->no_telp
        ]);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }

    public function destroy($id)
    {
        Pedagang::destroy($id);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.'
        ]);
    }
}
