<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        Inertia::share('lang.content.roles', __('content.roles'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return Inertia::render('Roles/Index', [
            'lang.datatables' => __('datatables'),
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::orderBy('id')->get();

        return Inertia::render('Roles/Create', [
            'lang.permissions' => Arr::dot(__('permissions')),
            'permissions' => $permissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Role\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->only(['name', 'permissionsIds']);

        $role = Role::create([
            'name' => $data['name']
        ]);

        $role->syncPermissions($data['permissionsIds'] ?? []);

        return redirect()->route('roles.index')
            ->with('success', [
                'title' => __('messages.roles.store_success.title'),
                'text' => __('messages.roles.store_success.text')
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role->permissionsIds = $role->permissions->pluck('id')->toArray();
        $permissions = Permission::orderBy('id')->get();

        return Inertia::render('Roles/Edit', [
            'lang.permissions' => Arr::dot(__('permissions')),
            'permissions' => $permissions,
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Role\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if ($role->readonly == 0) {
            $data = $request->only(['name', 'permissionsIds']);

            $role->update([
                'name' => $data['name']
            ]);

            $role->syncPermissions($data['permissionsIds'] ?? []);

            return redirect()->route('roles.index')
                ->with('success', [
                    'title' => __('messages.roles.update_success.title'),
                    'text' => __('messages.roles.update_success.text')
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->readonly == 0) {
            $role->delete();

            return redirect()->route('roles.index')
                ->with('success', [
                    'title' => __('messages.roles.delete_success.title'),
                    'text' => __('messages.roles.delete_success.text'),
                ]);
        }
    }
}
