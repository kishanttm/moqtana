<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'valuation_membership_number' => $validated['valuation_membership_number'] ?? null,
            'valuation_type' => $validated['valuation_type'] ?? null,
        ]);

        // Handle file uploads
        if ($request->hasFile('profile_image_path')) {
            $user->profile_image_path = $request->file('profile_image_path')->store('profiles', 'public');
        }
        if ($request->hasFile('signature_path')) {
            $user->signature_path = $request->file('signature_path')->store('signatures', 'public');
        }
        $user->save();

        if (!empty($validated['role_single'])) {
            $roleName = Role::find($validated['role_single'])?->name; // get role name by ID
            if ($roleName) {
                $user->assignRole($roleName); // pass the name, not ID
            }
        }

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        $userRoleIds = $user->roles()->pluck('id')->toArray();
        return view('admin.users.edit', compact('user', 'roles', 'userRoleIds'));
    }

    public function show(User $user)
    {
        $user->load('roles');
        return view('admin.users.show', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();

        // Prepare data for update
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'valuation_membership_number' => $validated['valuation_membership_number'] ?? null,
            'valuation_type' => $validated['valuation_type'] ?? null,
        ];

        // Handle file uploads (replace old files if new ones uploaded)
        if ($request->hasFile('profile_image_path')) {
            if ($user->profile_image_path && Storage::disk('public')->exists($user->profile_image_path)) {
                Storage::disk('public')->delete($user->profile_image_path);
            }
            $data['profile_image_path'] = $request->file('profile_image_path')->store('profiles', 'public');
        }

        if ($request->hasFile('signature_path')) {
            if ($user->signature_path && Storage::disk('public')->exists($user->signature_path)) {
                Storage::disk('public')->delete($user->signature_path);
            }
            $data['signature_path'] = $request->file('signature_path')->store('signatures', 'public');
        }

        $user->update($data);

        // Update role safely
        if (!empty($validated['role_single'])) {
            $roleName = Role::find($validated['role_single'])?->name; // get the role name
            if ($roleName) {
                $user->syncRoles([$roleName]); // sync by name
            }
        }

        // Redirect with success message
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }


    public function destroy(User $user)
    {
        if ($user->hasRole('superadmin')) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete superadmin user'
            ], 403);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully'
        ]);
    }
}


