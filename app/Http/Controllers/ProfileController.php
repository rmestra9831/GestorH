<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\User;   

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','can:create user']);
    }
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }
    public function editUser($slug)
    {
        $roles = Role::get();
        $user= User::where('slug',$slug)->firstOrFail();
        return view('profile.editUser', compact(['user','roles']));
    }
    public function updateUser(Request $request, $slug)
    {
        $user = User::where('slug',$slug)->firstOrFail();
        $user->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }
}
