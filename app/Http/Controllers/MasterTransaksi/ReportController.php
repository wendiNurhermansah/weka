<?php

namespace App\Http\Controllers\MasterTransaksi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    protected $route = 'master-transaksi.transaksi.';
    protected $view  = 'pages.masterTransaksi.report.';
    protected $title = 'Report';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;

        return view($this->view . 'index', compact(
            'route',
            'title'
        ));
    }
}
