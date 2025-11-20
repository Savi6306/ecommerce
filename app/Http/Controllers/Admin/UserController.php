<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use App\Models\Admin\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of users with optional role filter.
     */
 public function index(Request $request)
{
    $roleSlug = $request->query('role');

    if ($roleSlug) {
        $role = Role::where('slug', $roleSlug)->first();

        if ($role) {
            $users = $role->users()->latest()->paginate(15);
        } else {
            // Return empty paginator for consistency
            $users = User::whereNull('id')->paginate(15);
        }
    } else {
        $users = User::with('roles')->latest()->paginate(15);
    }

    $roles = Role::all();

    return view('admin.users.index', compact('users', 'roles', 'roleSlug'));
}

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    
  public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'role_id'  => 'required|exists:roles,id',
        'gender'   => 'nullable|in:male,female',
    ]);

    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'gender'   => $request->gender,
        'role_id'  => $request->role_id, // 👈 Add this line
    ]);

    return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
}

    
    /* * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $userRoleId = $user->roles->pluck('id')->first();

        return view('admin.users.edit', compact('user', 'roles', 'userRoleId'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|string|min:6|confirmed',
            'role_id'  => 'required|exists:roles,id',
            'gender'   => 'nullable|in:male,female',
        ]);

        $user->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'gender'  => $request->gender,
            'password'=> $request->password ? Hash::make($request->password) : $user->password,
        ]);

        $user->roles()->sync([$request->role_id]);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }
}
