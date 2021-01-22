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

namespace App\Http\Controllers\MasterRole;

use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use Spatie\Permission\Models\Role;
use App\Models\RoleHasPermissions;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    protected $route = 'master-role.role.';
    protected $view  = 'pages.masterRole.role.';
    protected $title = 'Config Role';

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
        $role = Role::all();
        return Datatables::of($role)
            ->addColumn('permissions', function ($p) {
                return count($p->permissions) . " <a href='" . route($this->route . 'addPermissions', $p->id) . "' class='text-success pull-right' title='Edit Permissions'><i class='icon-clipboard-list2 mr-1'></i></a>";
            })
            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'permissions'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required'
        ]);

        $input = $request->all();
        Role::create($input);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil tersimpan.'
        ]);
    }

    public function edit($id)
    {
        return Role::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'guard_name' => 'required'
        ]);

        $input = $request->all();
        $role  = Role::findOrFail($id);
        $role->update($input);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }

    public function destroy($id)
    {
        Role::destroy($id);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.'
        ]);
    }

    public function permission($id)
    {
        $route = $this->route;
        $title = $this->title;

        $role  = Role::findOrFail($id);
        $exist_permission = RoleHasPermissions::select('permission_id')->whererole_id($id)->get()->toArray();
        $permissions      = Permission::select('id', 'name')->whereNotIn('id', $exist_permission)->get();

        return view($this->view . 'formPermission', compact(
            'route',
            'title',
            'role',
            'permissions'
        ));
    }

    public function storePermission(Request $request)
    {
        $request->validate([
            'permissions' => 'required'
        ]);

        $role = Role::findOrFail($request->id);
        $role->givePermissionTo($request->permissions);

        return response()->json([
            'message' => 'Data permission berhasil tersimpan.'
        ]);
    }

    public function getPermissions($id)
    {
        $role = Role::findOrFail($id);
        return $role->permissions;
    }

    public function destroyPermission(Request $request, $name)
    {
        $role = Role::findOrFail($request->id);
        $role->revokePermissionTo($name);

        return response()->json([
            'success' => true
        ]);
    }
}
