<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome
 *
 * @author Asip Hamdi
 * Github : axxpxmd
 */

namespace App\Http\Controllers\ConfigTemplate;

use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Template;

class TemplateController extends Controller
{
    protected $route = 'config-template.template.';
    protected $view  = 'pages.configTemplate.';
    protected $title = 'Config Template';
    protected $path  = '../images/logo/';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;
        $path  = $this->path;

        return view($this->view . 'index', compact(
            'route',
            'title',
            'path'
        ));
    }

    public function api()
    {
        $template = Template::all();

        return DataTables::of($template)
            ->addColumn('action', function ($p) {
                return "<a href='#' onclick='edit(" . $p->id . ")' title='Edit Permission'><i class='icon-pencil mr-1'></i></a>";
            })
            ->editColumn('logo',  function ($p) {
                if ($p->logo != null) {
                    return "<img width='50' class='img-fluid mx-auto d-block ' alt='foto' src='" . $this->path . $p->logo . "'>";
                } else {
                    return "<img width='50' class='rounded img-fluid mx-auto d-block' alt='foto' src='" . asset('images/404.png') . "'>";
                }
            })
            ->editColumn('logo_title',  function ($p) {
                if ($p->logo_title != null) {
                    return "<img width='50' class='img-fluid mx-auto d-block ' alt='foto' src='" . $this->path . $p->logo_title . "'>";
                } else {
                    return "<img width='50' class='rounded img-fluid mx-auto d-block' alt='foto' src='" . asset('images/404.png') . "'>";
                }
            })
            ->editColumn('logo_auth',  function ($p) {
                if ($p->logo_auth != null) {
                    return "<img width='50' class='img-fluid mx-auto d-block ' alt='foto' src='" . $this->path . $p->logo_auth . "'>";
                } else {
                    return "<img width='50' class='rounded img-fluid mx-auto d-block' alt='foto' src='" . asset('images/404.png') . "'>";
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'logo', 'logo_title', 'logo_auth'])
            ->toJson();
    }

    public function store()
    {
        return response()->json([
            'message' => 'Tidak bisa menambah data, Silahkan edit'
        ], 422);
    }

    public function edit($id)
    {
        $template = Template::findOrFail($id);

        return $template;
    }

    public function update(Request $request, $id)
    {
        $logo       = $request->logo;
        $logo_title = $request->logo_title;
        $logo_auth  = $request->logo_auth;
        $template   = Template::find($id);

        if ($logo != null) {
            $request->validate([
                'logo' => 'required|mimes:png,jpg,jpeg|max:2024'
            ]);

            // Proses Saved Foto
            $file     = $request->file('logo');
            $fileName = time() . "." . $file->getClientOriginalName();
            $request->file('logo')->move("images/logo/", $fileName);

            // Proses Delete Foto
            $exist = $template->logo;
            if ($exist != null) {
                $path  = "images/logo/" . $exist;
                \File::delete(public_path($path));
            }

            $template->update([
                'logo' => $fileName
            ]);
        }

        if ($logo_title != null) {
            $request->validate([
                'logo_title' => 'required|mimes:png,jpg,jpeg|max:2024'
            ]);

            // Proses Saved Foto
            $file     = $request->file('logo_title');
            $fileName1 = time() . "." . $file->getClientOriginalName();
            $request->file('logo_title')->move("images/logo/", $fileName1);

            // Proses Delete Foto
            $exist = $template->logo_title;
            if ($exist != null) {
                $path  = "images/logo/" . $exist;
                \File::delete(public_path($path));
            }

            $template->update([
                'logo_title' => $fileName1
            ]);
        }

        if ($logo_auth != null) {
            $request->validate([
                'logo_auth' => 'required|mimes:png,jpg,jpeg|max:2024'
            ]);

            // Proses Saved Foto
            $file     = $request->file('logo_auth');
            $fileName2 = time() . "." . $file->getClientOriginalName();
            $request->file('logo_auth')->move("images/logo/", $fileName2);

            // Proses Delete Foto
            $exist = $template->logo_auth;
            if ($exist != null) {
                $path  = "images/logo/" . $exist;
                \File::delete(public_path($path));
            }

            $template->update([
                'logo_auth' => $fileName2
            ]);
        }

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }

    public function destroy()
    {
        // 
    }
}
