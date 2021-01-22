<?php

namespace App\Http\Controllers\MasterPasar;

use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Pasar;
use App\Models\JenisLapak;
use App\Models\PasarKategori;

class PasarKategoriController extends Controller
{
    protected $route = 'master-pasar.pasarKategori.';
    protected $view  = 'pages.masterPasar.pasarKategori.';
    protected $title = 'Pasar Kategori';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;

        $pasar      = Pasar::select('id', 'nm_pasar')->get();
        $jenisLapak = JenisLapak::select('id', 'nm_jenis_lapak')->get();

        return view($this->view . 'index', compact(
            'route',
            'title',
            'pasar',
            'jenisLapak'
        ));
    }

    public function api()
    {
        $pasarkategori = PasarKategori::all();
        return DataTables::of($pasarkategori)
            ->addColumn('action', function ($p) {
                return "
                <a href='#' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })
            ->editColumn('tm_pasar_id', function ($p) {
                return "<a href='" . route($this->route . 'show', $p->id) . "' class='text-primary' title='Show Data'>" . $p->pasar->nm_pasar . "</a>";
            })
            ->editColumn('tm_jenis_lapak_id', function ($p) {
                return $p->jenisLapak->nm_jenis_lapak;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'tm_pasar_id'])
            ->toJson();
    }

    public function show($id)
    {
        $route = $this->route;
        $title = $this->title;

        $pasarkategori = PasarKategori::find($id);

        return view($this->view . 'show', compact(
            'route',
            'title',
            'pasarkategori'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tm_pasar_id'       => 'required',
            'tm_jenis_lapak_id' => 'required',
            'luas'      => 'required',
            'nm_blok'   => 'required',
            'ukuran'    => 'required',
            'retribusi' => 'required',
            'jumlah'    => 'required'
        ]);

        $pasarkategori = new PasarKategori();
        $pasarkategori->tm_pasar_id       = $request->tm_pasar_id;
        $pasarkategori->tm_jenis_lapak_id = $request->tm_jenis_lapak_id;
        $pasarkategori->luas    = $request->luas;
        $pasarkategori->nm_blok = $request->nm_blok;
        $pasarkategori->ukuran    = $request->ukuran;
        $pasarkategori->retribusi = $request->retribusi;
        $pasarkategori->jumlah    = $request->jumlah;
        $pasarkategori->save();

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil tersimpan.'
        ]);
    }

    public function edit($id)
    {
        $pasarkategori = PasarKategori::find($id);

        return $pasarkategori;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tm_pasar_id'       => 'required',
            'tm_jenis_lapak_id' => 'required',
            'luas'      => 'required',
            'nm_blok'   => 'required',
            'ukuran'    => 'required',
            'retribusi' => 'required',
            'jumlah'    => 'required'
        ]);

        $pasarkategori = PasarKategori::find($id);
        $pasarkategori->update([
            'tm_pasar_id'       => $request->tm_pasar_id,
            'tm_jenis_lapak_id' => $request->tm_jenis_lapak_id,
            'luas'    => $request->luas,
            'nm_blok' => $request->nm_blok,
            'ukuran'  => $request->ukuran,
            'retribusi' => $request->retribusi,
            'jumlah'    => $request->jumlah
        ]);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }

    public function destroy($id)
    {
        PasarKategori::destroy($id);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.'
        ]);
    }
}
