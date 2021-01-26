<?php

namespace App\Http\Controllers;

use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

// Models
use App\User;
use App\Models\AdminDetails;
use App\Models\ModelHasRoles;
use Spatie\Permission\Models\Role;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::select('id', 'name')->get();
        return view('role.pengguna', compact('roles'));
    }

   public function api(){
        $pengguna = AdminDetails::all();
        return DataTables::of($pengguna)
            ->addColumn('action', function ($p) {
                return "
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Permission'><i class='icon-remove'></i></a>";
            })
            ->editColumn('admin_id', function ($p) {
                return "<a href='" . route( 'pengguna.show', $p->id) . "' class='text-primary' title='Show Data'>".$p->admins->username."</a>";
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'admin_id'])
            ->toJson();
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
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required',
            'nama'     => 'required',
            'email'    => 'required|email|unique:admin_details',
            'role_id'  => 'required'
        ]);

        /** Tahapan :
         * 1. admins
         * 2. admins_details
         * 3. model_has_roles
         */

        // Tahap 1
        $username = $request->username;
        $password = $request->password;

        $admin = new User();
        $admin->username = $username;
        $admin->password = Hash::make($password);
        $admin->save();

        // Tahap 2
        $nama    = $request->nama;
        $email   = $request->email;
        $get_admin_id = User::select('id')->latest()->first();


        $admin_detail = new AdminDetails();
        $admin_detail->nama     = $nama;
        $admin_detail->email    = $email;
        $admin_detail->admin_id = $get_admin_id->id;
        $admin_detail->save();

        // Tahap 3
        $path    = 'app\User';
        $role_id = $request->role_id;

        $model_has_role = new ModelHasRoles();
        $model_has_role->role_id    = $role_id;
        $model_has_role->model_type = $path;
        $model_has_role->model_id   = $get_admin_id->id;
        $model_has_role->save();

        return response()->json([
            'message' => 'Data berhasil tersimpan.'
        ]);
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
