<?php

namespace App\Http\Controllers\MasterPedagang;

use DataTables;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

// Models
use App\Models\Pedagang;
use App\Models\JenisUsaha;
use App\Models\PasarKategori;
use App\Models\PedagangAlamat;

class PedagangAlamatController extends Controller
{
    protected $route = 'master-pedagang.pedagangAlamat.';
    protected $view  = 'pages.masterPedagang.pedagangAlamat.';
    protected $title = 'Pedagang Alamat';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;

        $pedagang   = Pedagang::select('id', 'nm_pedagang')->orderBy('nm_pedagang', 'ASC')->get();
        $alamatToko = PasarKategori::select('id', 'tm_pasar_id', 'tm_jenis_lapak_id', 'ukuran', 'nm_blok')->whereNotIn('jumlah', [0])->with('pasar', 'jenisLapak')->get();
        $jenisUsaha = JenisUsaha::select('id', 'nm_kategori')->get();

        return view($this->view . 'index', compact(
            'route',
            'title',
            'pedagang',
            'alamatToko',
            'jenisUsaha'
        ));
    }

    public function api()
    {
        $pedagangAlamat = PedagangAlamat::all();
        return DataTables::of($pedagangAlamat)
            ->addColumn('action', function ($p) {
                return "
                <a href='#' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })
            ->editColumn('tm_pedagang_id', function ($p) {
                return "<a href='" . route($this->route . 'show', $p->id) . "' class='text-primary' title='Show Data'>" . $p->pedagang->nm_pedagang . "</a>";
            })
            ->editColumn('tm_pasar_kategori_id', function ($p) {
                return $p->pasarkategori->pasar->nm_pasar;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'tm_pedagang_id'])
            ->toJson();
    }

    public function show($id)
    {
        $route = $this->route;
        $title = $this->title;

        $pedagangAlamat = PedagangAlamat::findOrFail($id);

        return view($this->view . 'show', compact(
            'route',
            'title',
            'pedagangAlamat'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tm_pasar_kategori_id' => 'required',
            'tm_jenis_usaha_id'    => 'required',
            'tm_pedagang_id' => 'required|unique:tm_pedagang_alamats,tm_pedagang_id',
            'tgl_tinggal'    => 'required',
            'nm_toko' => 'required|unique:tm_pedagang_alamats,nm_toko',
            'status'  => 'required'
        ]);

        /**
         * Tahapan :
         * 1. tm_pedagang_alamats
         * 2. tm_pasar_kategoris
         */

        //  Tahap 1
        $tm_pasar_kategori_id = $request->tm_pasar_kategori_id;
        $tm_jenis_usaha_id    = $request->tm_jenis_usaha_id;
        $tm_pedagang_id = $request->tm_pedagang_id;
        $tgl_tinggal    = $request->tgl_tinggal;
        $nm_toko = $request->nm_toko;
        $status  = $request->status;

        // generate kd_toko
        $generate  = PasarKategori::find($tm_pasar_kategori_id);
        // Digit 1
        $digit1 = $generate->pasar->id;
        if (\strlen($digit1) == 1) {
            $digit1 = 0 . $digit1;
        }
        // Digit 2
        $digit2 = $generate->jenisLapak->id;
        if (\strlen($digit2) == 1) {
            $digit2 = 0 . $digit2;
        }
        // Digit 3
        $count = PedagangAlamat::where('tm_pasar_kategori_id', $tm_pasar_kategori_id)->count();
        if ($count != 0) {
            $result = $count + 1;
        } else {
            $result = '01';
        }
        if (\strlen($result) == 1) {
            $digit3 = 0 . $result;
        } else {
            $digit3 = $result;
        }
        $kd_toko = $digit1 . $digit2 . $digit3;

        $pedagangAlamat = new PedagangAlamat();
        $pedagangAlamat->tm_pasar_kategori_id = $tm_pasar_kategori_id;
        $pedagangAlamat->tm_jenis_usaha_id    = $tm_jenis_usaha_id;
        $pedagangAlamat->tm_pedagang_id = $tm_pedagang_id;
        $pedagangAlamat->tgl_tinggal    = $tgl_tinggal;
        $pedagangAlamat->nm_toko = $nm_toko;
        $pedagangAlamat->kd_toko = $kd_toko;
        $pedagangAlamat->status  = $status;
        $pedagangAlamat->save();

        // Tahap 2
        DB::update('UPDATE tm_pasar_kategoris SET jumlah = jumlah - 1 WHERE id = "' . $tm_pasar_kategori_id . '"');

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil tersimpan.'
        ]);
    }

    public function edit($id)
    {
        $pedagangAlamat = PedagangAlamat::find($id);

        return $pedagangAlamat;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tm_pedagang_id'    => 'required|unique:tm_pedagang_alamats,tm_pedagang_id,' . $id,
            'tm_jenis_usaha_id' => 'required',
            'tgl_tinggal'       => 'required',
            'nm_toko' => 'required|unique:tm_pedagang_alamats,nm_toko,' . $id,
            'status'  => 'required'
        ]);

        $tm_pedagang_id    = $request->tm_pedagang_id;
        $tm_jenis_usaha_id = $request->tm_jenis_usaha_id;
        $tgl_tinggal       = $request->tgl_tinggal;
        $nm_toko = $request->nm_toko;
        $status  = $request->status;

        $pedagangAlamat = PedagangAlamat::find($id);
        $pedagangAlamat->update([
            'tm_pedagang_id'    => $tm_pedagang_id,
            'tm_jenis_usaha_id' => $tm_jenis_usaha_id,
            'tgl_tinggal'       => $tgl_tinggal,
            'nm_toko' => $nm_toko,
            'status'  => $status
        ]);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }

    public function destroy($id)
    {
        $pedagangAlamat = PedagangAlamat::find($id);

        // Update table tm_pasar_kategoris
        DB::update('UPDATE tm_pasar_kategoris SET jumlah = jumlah + 1 WHERE id = "' . $pedagangAlamat->tm_pasar_kategori_id . '"');

        // delete from tabel tm_pedagang_alamat
        $pedagangAlamat->delete();

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.'
        ]);
    }
}
