<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class PermissionController extends Controller
{
    public function __construct()
    {
        Inertia::share('lang.content.permissions', __('content.permissions'));
        Inertia::share('lang.permissions', Arr::dot(__('permissions')));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return Inertia::render('Permissions/Index', [
            'lang.datatables' => __('datatables'),
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permission->rolesIds = $permission->roles->pluck('id')->toArray();
        $roles = Role::where('readonly', 0)->orderBy('id')->get();

        return Inertia::render('Permissions/Edit', [
            'permission' => $permission,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->only(['rolesIds']);

        $readonlyRolesIds = $permission->roles->where('readonly', 1)->pluck('id')->toArray();
        $rolesIds = Role::whereIn('id', $data['rolesIds'] ?? [])->where('readonly', 0)->pluck('id')->toArray();

        $permission->syncRoles(array_merge(
            $readonlyRolesIds,
            $rolesIds
        ));

        return redirect()->route('permissions.index')
            ->with('success', [
                'title' => __('messages.permissions.update_success.title'),
                'text' => __('messages.permissions.update_success.text')
            ]);
    }
}
