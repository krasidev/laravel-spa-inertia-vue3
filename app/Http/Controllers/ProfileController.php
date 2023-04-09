<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdatePasswordProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();

        return Inertia::render('Profile/Edit', [
            'lang.content.profile' => __('content.profile'),
            'user' => collect(new ProfileResource($user))->merge([
                'role' => $user->roles->pluck('id')->first()
            ]),
            'roles' => RoleResource::collection(Role::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Profile\UpdateProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $data = $request->only(['name', 'email', 'role']);

        $user = auth()->user();

        $user->update($data);

        $user->syncRoles([$data['role']]);

        return redirect()->route('profile.edit')
            ->with('success', [
                'title' => __('messages.profile.update_success.title'),
                'text' => __('messages.profile.update_success.text')
            ]);
    }

    /**
     * Update password in storage.
     *
     * @param  \App\Http\Requests\Profile\UpdatePasswordProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(UpdatePasswordProfileRequest $request)
    {
        $data = $request->only(['current_password', 'password']);

        $user = auth()->user();

        if (Hash::check($data['current_password'], $user->password)) {
            $user->update([
                'password' => Hash::make($data['password'])
            ]);
        }

        return redirect()->route('profile.edit')
            ->with('success', [
                'title' => __('messages.profile.update_password_success.title'),
                'text' => __('messages.profile.update_password_success.text')
            ]);
    }
}
