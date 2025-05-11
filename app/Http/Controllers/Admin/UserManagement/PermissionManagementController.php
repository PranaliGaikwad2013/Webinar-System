<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class PermissionManagementController extends Controller
{
    public function indexPermission(Request $request)
    {
         if ($request->ajax()){
            $permissions = Permission::query()->orderBy('created_at', 'desc');
            return DataTables::eloquent($permissions)
            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                $editUrl = route('permission.edit', $user->id);
                $deleteUrl = route('permission.delete', $user->id);

                $buttons = '';

                if (Auth::user()->can('update permission')) {
                    $buttons .= '<a href="' . $editUrl . '" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a> ';
                }

                if (Auth::user()->can('delete permission')) {
                    $buttons .= '<a href="' . $deleteUrl . '" class="btn btn-danger btn-sm delete-confirm"><i class="bi bi-trash3-fill"></i></a>';
                }

                return $buttons;
            })
            ->rawColumns(['action'])
            ->make(true);
           };

        return view('admin.permission_management.index');
    }

    public function storePermission(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
           ]);

           Permission::create([
            'name' => $request->name
           ]);
           return redirect('permission')->with('success','Permission created successfully!');
    }
}
