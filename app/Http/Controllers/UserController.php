<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function __construct()
    {
        Inertia::share('lang.content.users', __('content.users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::query();

        $users->with('roles');

        if ($filters['trashed'] = $request->get('trashed', 0)) {
            $users->onlyTrashed();
        }

        return Inertia::render('Users/Index', [
            'lang.datatables' => __('datatables'),
            'filters' => $filters,
            'users' => UserResource::collection($users->get())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Users/Create', [
            'roles' => RoleResource::collection(Role::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->only(['name', 'email', 'password', 'role']);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $user->assignRole($data['role']);

        return redirect()->route('users.index')
            ->with('success', [
                'title' => __('messages.users.store_success.title'),
                'text' => __('messages.users.store_success.text')
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->load('roles');

        return Inertia::render('Users/Edit', [
            'user' => new UserResource($user),
            'roles' => RoleResource::collection(Role::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->only(['name', 'email', 'password', 'role']);

		if (isset($data['password'])) {
			$data['password'] = Hash::make($data['password']);
		} else {
			unset($data['password']);
		}

        $user->update($data);

        $user->syncRoles([$data['role']]);

        return redirect()->route('users.index')
            ->with('success', [
                'title' => __('messages.users.update_success.title'),
                'text' => __('messages.users.update_success.text'),
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if ($user->id != auth()->user()->id) {
            $user->delete();

            return redirect()->route('users.index')
                ->with('success', [
                    'title' => __('messages.users.delete_success.title'),
                    'text' => __('messages.users.delete_success.text'),
                ]);
        }
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        User::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('users.index', $request->query())
            ->with('success', [
                'title' => __('messages.users.restore_success.title'),
                'text' => __('messages.users.restore_success.text'),
            ]);
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Request $request, $id)
    {
        User::withTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('users.index', $request->query())
            ->with('success', [
                'title' => __('messages.users.delete_success.title'),
                'text' => __('messages.users.delete_success.text'),
            ]);
    }
}
