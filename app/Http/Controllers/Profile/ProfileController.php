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

namespace App\Http\Controllers\Profile;

use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

// Models
use App\User;
use App\Models\AdminDetails;
use App\Models\ModelHasRoles;

class ProfileController extends Controller
{
    protected $route = 'master-profile.profile.';
    protected $view  = 'pages.profile.';
    protected $title = 'Profile';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;

        $user = AdminDetails::where('id', Auth::user()->id)->first();
        $role = ModelHasRoles::where('model_id', Auth::user()->id)->first();

        return view($this->view . 'index', compact(
            'route',
            'title',
            'user',
            'role'
        ));
    }

    public function update(Request $request, $id)
    {
        $admin_detail = AdminDetails::find($id);
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'email'    => 'required|email|unique:admin_details,email,' . $id,
            'no_telp'  => 'required|max:13|unique:admin_details,no_telp,' . $id,
        ]);

        /** Tahapan :
         * 1. admins
         * 2. admins_details
         */

        // Tahap 1
        $username = $request->username;
        $admin    = User::find($admin_detail->admin_id);
        $admin->update([
            'username' => $username
        ]);

        // Tahap 2
        $nama    = $request->nama;
        $email   = $request->email;
        $no_telp = $request->no_telp;

        if ($request->foto != null) {
            $request->validate([
                'foto' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);

            // Proses Saved Foto
            $file     = $request->file('foto');
            $fileName = time() . "." . $file->getClientOriginalName();
            $request->file('foto')->move("images/ava/", $fileName);

            // Proses Delete Foto
            $exist = $admin_detail->foto;
            $path  = "images/ava/" . $exist;
            \File::delete(public_path($path));

            $admin_detail->update([
                'nama'    => $nama,
                'email'   => $email,
                'no_telp' => $no_telp,
                'foto'    => $fileName
            ]);
        } else {
            $admin_detail->update([
                'nama'    => $nama,
                'email'   => $email,
                'no_telp' => $no_telp,
            ]);
        }

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }

    public function editPassword($id)
    {
        $route = $this->route;
        $title = $this->title;

        $admin_detail = AdminDetails::findOrFail($id);

        return view($this->view . 'editPassword', compact(
            'route',
            'title',
            'admin_detail'
        ));
    }

    public function updatePassword(Request $request, $id)
    {

        $admin_detail = AdminDetails::find($id);
        $request->validate([
            'password'         => 'required|string|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $password = $request->password;
        $admin    = User::find($admin_detail->admin_id);
        $admin->update([
            'password' => Hash::make($password)
        ]);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }
}
