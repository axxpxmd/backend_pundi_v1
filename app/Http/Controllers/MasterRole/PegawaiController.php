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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

// Models
use App\User;
use App\Models\AdminDetails;
use App\Models\ModelHasRoles;
use Spatie\Permission\Models\Role;

class PegawaiController extends Controller
{
    protected $route = 'master-role.pegawai.';
    protected $view  = 'pages.masterRole.pegawai.';
    protected $title = 'Config Pegawai';
    protected $path  = 'public_html/storage/images/ava/';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;
        $roles = Role::select('id', 'name')->get();

        return view($this->view . 'index', compact(
            'route',
            'title',
            'roles'
        ));
    }

    public function api()
    {
        $pegawai = AdminDetails::all();
        return DataTables::of($pegawai)
            ->addColumn('action', function ($p) {
                return "
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Permission'><i class='icon-remove'></i></a>";
            })
            ->editColumn('admin_id', function ($p) {
                return "<a href='" . route($this->route . 'show', $p->id) . "' class='text-primary pull-right' title='Show Data'>" . $p->admin->username . "</a>";
            })
            ->editColumn('photo',  function ($p) {
                if ($p->photo != null) {
                    return "<img width='50' class='rounded img-fluid mx-auto d-block rounded-circle' alt='photo' src='" . config('app.ftp_src') . "/ava/" . $p->photo . "'>";
                } else {
                    return "<img width='50' class='rounded img-fluid mx-auto d-block' alt='photo' src='" . asset('images/boy.png') . "'>";
                }
            })
            ->rawColumns(['action', 'photo', 'admin_id'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required',
            'nama'     => 'required',
            'email'    => 'required|email|unique:admin_details',
            'no_telp'  => 'required|max:13|unique:admin_details',
            'photo'    => 'required|mimes:png,jpg,jpeg|max:1024',
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
        $no_telp = $request->no_telp;
        $get_admin_id = User::select('id')->latest()->first();

        $file     = $request->file('photo');
        $fileName = time() . "." . $file->getClientOriginalName();
        $request->file('photo')->storeAs($this->path, $fileName, 'ftp', 'public');

        $admin_detail = new AdminDetails();
        $admin_detail->nama     = $nama;
        $admin_detail->email    = $email;
        $admin_detail->no_telp  = $no_telp;
        $admin_detail->photo    = $fileName;
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
            'message' => 'Data ' . $this->title . ' berhasil tersimpan.'
        ]);
    }

    public function show($id)
    {
        $route = $this->route;
        $title = $this->title;

        $admin_detail = AdminDetails::findOrFail($id);
        $admin = User::whereid($admin_detail->admin_id)->first();
        $roles = Role::select('id', 'name')->get();

        // get role_id by user
        $model_has_role = ModelHasRoles::where('model_id', $admin_detail->admin_id)->first();
        $role  = Role::select('id', 'name')->whereid($model_has_role->role_id)->first();

        return view($this->view . 'show', compact(
            'route',
            'title',
            'admin_detail',
            'admin',
            'roles',
            'role'
        ));
    }

    public function update(Request $request, $id)
    {
        $admin_detail = AdminDetails::find($id);
        $request->validate([
            'username' => 'required|unique:admins,username,' . $admin_detail->admin_id,
            'nama'     => 'required',
            'email'    => 'required|email|unique:admin_details,email,' . $id,
            'no_telp'  => 'required|max:13|unique:admin_details,no_telp,' . $id,
            'role_id'  => 'required'
        ]);

        /** Tahapan :
         * 1. admins
         * 2. admins_details
         * 3. model_has_roles
         */

        //  Tahap 1
        $username = $request->username;
        $admin    = User::find($admin_detail->admin_id);
        $admin->update([
            'username' => $username
        ]);

        // Tahap 2
        $nama    = $request->nama;
        $email   = $request->email;
        $no_telp = $request->no_telp;

        if ($request->photo != null) {
            $request->validate([
                'photo' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);

            $file     = $request->file('photo');
            $fileName = time() . "." . $file->getClientOriginalName();
            $request->file('photo')->storeAs($this->path, $fileName, 'ftp', 'public');

            // delete from storage
            $exist = $admin_detail->photo;
            Storage::disk('ftp')->delete($this->path . $exist);

            $admin_detail->update([
                'nama'    => $nama,
                'email'   => $email,
                'no_telp' => $no_telp,
                'photo'   => $fileName
            ]);
        } else {
            $admin_detail->update([
                'nama'    => $nama,
                'email'   => $email,
                'no_telp' => $no_telp,
            ]);
        }

        // Tahap 3
        $role_id = $request->role_id;

        $model_has_role = ModelHasRoles::wheremodel_id($admin_detail->admin_id);
        $model_has_role->update([
            'role_id' => $role_id
        ]);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }

    public function destroy($id)
    {
        $admin_detail = AdminDetails::findOrFail($id);

        // delete from table admins
        User::whereid($admin_detail->admin_id)->delete();

        // delete photo from storage
        $photo = $admin_detail->photo;
        Storage::disk('ftp')->delete($this->path . $photo);

        // delete from table admin_details
        $admin_detail->delete();

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.'
        ]);
    }
}
