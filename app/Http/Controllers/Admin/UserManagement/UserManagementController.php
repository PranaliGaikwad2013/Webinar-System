<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;


class UserManagementController extends Controller
{
    public function indexUser(Request $request)
{
    if ($request->ajax()) {
        $users = User::with('roles')->orderBy('created_at', 'desc');

        return DataTables::eloquent($users)
            ->addIndexColumn()
            ->addColumn('roles', function ($user) {
                return $user->getRoleNames()
                            ->map(fn ($role) => '<span class="badge bg-primary mx-1 text-white">' . $role . '</span>')
                            ->implode(' ');
            })
            ->addColumn('action', function ($user) {
                $editUrl = route('user.edit', $user->id);
                $deleteUrl = route('user.delete', $user->id);

                return '<a href="' . $editUrl . '" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> 
                        <a href="' . $deleteUrl . '" class="btn btn-danger btn-sm delete-confirm"><i class="bi bi-trash3-fill"></i></a>';
            })
            ->rawColumns(['roles', 'action'])
            ->make(true);
    }

    $roles = Role::pluck('name','name')->all();
    $users = User::all();
    $editUser = null;
    $userRoles = [];

    return view('admin.user_management.index', compact('roles','users','editUser','userRoles'));
}


    public function storeUser(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required',
        ]);

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles($request->roles);

        return redirect('users')->with('success', 'User  created successfully!');
    }


    public function editUser($id)
    {
        $users = User::all();
        $editUser = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $userRoles = $editUser->roles->pluck('name','name')->all();
        return view('admin.user_management.index', compact('users','editUser','roles','userRoles'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::findOrFail($id);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('users')->with('success', 'User  updated successfully!');
    }
    
}
