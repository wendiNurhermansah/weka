<?php

namespace App\Http\Controllers\MasterPasar;

use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Modes
use App\Models\Pasar;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class PasarController extends Controller
{
    protected $route = 'master-pasar.pasar.';
    protected $view  = 'pages.masterPasar.pasar.';
    protected $title = 'Pasar';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;

        $provinsi = Provinsi::select('id', 'kode', 'n_provinsi')->get();

        return view($this->view . 'index', compact(
            'route',
            'title',
            'provinsi'
        ));
    }

    public function kabupatenByProvinsi($provinsi_id)
    {
        return Kabupaten::select('id', 'n_kabupaten')->where('provinsi_id', $provinsi_id)->get();
    }

    public function kecamatanByKabupaten($kabupaten_id)
    {
        return Kecamatan::select('id', 'n_kecamatan')->where('kabupaten_id', $kabupaten_id)->get();
    }

    public function kelurahanByKecamatan($kecamatan_id)
    {
        return Kelurahan::select('id', 'n_kelurahan')->where('kecamatan_id', $kecamatan_id)->get();
    }

    public function api()
    {
        $pasar = Pasar::all();
        return DataTables::of($pasar)
            ->addColumn('action', function ($p) {
                return "
                <a href='#' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })
            ->editColumn('nm_pasar', function ($p) {
                return "<a href='" . route($this->route . 'show', $p->id) . "' class='text-primary' title='Show Data'>" . $p->nm_pasar . "</a>";
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'nm_pasar'])
            ->toJson();
    }

    public function show($id)
    {
        $route = $this->route;
        $title = $this->title;

        $pasar = Pasar::find($id);

        return view($this->view . 'show', compact(
            'route',
            'title',
            'pasar'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_pasar'  => 'required',
            'luas_area' => 'required',
            'id_kel' => 'required',
            'id_kec' => 'required',
            'id_kab' => 'required'
        ]);

        $nm_pasar  = $request->nm_pasar;
        $luas_area = $request->luas_area;
        $id_kel = $request->id_kel;
        $id_kec = $request->id_kec;
        $id_kab = $request->id_kab;

        // Generate kd_pasar
    }
}
