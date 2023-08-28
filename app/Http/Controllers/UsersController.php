<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->to("/admin/users");
    }
    public function edit(User $user){
        return view('dashboard.edit-user')->with('user', $user);
    }

    public function update(Request $request, User $user){
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();
        return redirect()->to("/admin/users");
    }
}
