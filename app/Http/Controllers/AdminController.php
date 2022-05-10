<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function read()
    {
        // check if auth user is not owner
        if (Auth::user()->role != 'owner') {
            return response()->json(['error' => 'Not Allowed.']);
        }

        $admins = Admin::all();

        return response()->json(['message' => $admins]);
    }

    public function store(Request $request)
    {
        // check if auth user is not owner  #only owner can create new account
        if (Auth::user()->role != 'owner') {
            return response()->json(['error' => 'Not Allowed.']);
        }

        // validate inputs
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email:filter|unique:admins',
            'password' => 'required|min:8|same:confirm_password',
        ]);


        // store new admin
        Admin::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // redirect back with success message
        return redirect()->back()->withSuccess('Account created successfully.');
    }

    public function login(Request $request)
    {
        // validate inputs
        $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // check if the credentials is not valid
        if (!Auth::attempt($credentials)) {
            // redirect to login page with error message
            return redirect()->back()->with('error', 'Invalid Credentials.');
        }

        // redirect to admin dashboard
        return redirect(route('admin.dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect(route('admin.login'));
    }

    public function update(Request $request)
    {
        if ($request->has('name')) {
            $request->validate([
                'name' => 'required'
            ]);
        }

        if ($request->has('old_password')) {
            if (!Hash::check($request->old_password, Auth::user()->password)) {
                return redirect()->back()->with('error', 'Old password is wrong!');
            }

            $request->validate([
                'new_password' => 'required|min:8|same:confirm_new_password'
            ]);

            if (Hash::check($request->new_password, Auth::user()->password)) {
                return redirect()->back()->with('error', 'new password same as old password.');
            }

            $request->request->add([
                'password' => Hash::make($request->new_password),
            ]);
        }

        if ($request->has('name') && $request->has('password')) {
            Admin::where('id', Auth::id())->update($request->only(['name', 'password']));
            Auth::logout();
            return redirect(route('admin.login'))->withSuccess('Password changed successfully.');
        } elseif ($request->has('name')) {
            Admin::where('id', Auth::id())->update($request->only(['name']));
            return redirect()->back()->withSuccess('Name changed successfully.');
        } elseif ($request->has('password')) {
            Admin::where('id', Auth::id())->update($request->only(['password']));
            Auth::logout();
            return redirect(route('admin.login'))->withSuccess('Password changed successfully.');
        }
    }

    public function delete($id)
    {
        // check if auth user is not owner  #only owner can create new account
        if (Auth::user()->role != 'owner') {
            return response()->json(['error' => 'Not Allowed.']);
        }

        $admin = Admin::find($id);

        $admin->delete();

        return response()->json(['success' => 'Admin deleted successfully']);
    }
}
