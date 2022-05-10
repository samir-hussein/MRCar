<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{

    public function read()
    {
        // check if auth user is not owner
        if (Auth::user()->role != 'owner') {
            return response()->json(['error' => 'Not Allowed.']);
        }

        $sellers = Seller::all();

        return response()->json(['message' => $sellers]);
    }

    public function store(Request $request)
    {
        // validate inputs
        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'email' => 'required|email:filter|unique:sellers',
            'password' => 'required|min:8|same:confirm_password',
        ]);


        // store new seller
        Seller::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // redirect to login page with success message
        return redirect(route('seller.login'))->withSuccess('Account created successfully, you can login now!');
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
        if (!Auth::guard('seller')->attempt($credentials)) {
            // redirect to login page with error message
            return redirect()->back()->with('error', 'Invalid Credentials');
        }

        // redirect to seller dashboard
        return redirect(route('seller.dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::guard('seller')->logout();

        return redirect(route('seller.login'));
    }

    public function update(Request $request)
    {
        if ($request->has('name')) {
            $request->validate([
                'name' => 'required'
            ]);

            Seller::where('id', Auth::guard('seller')->id())->update($request->only(['name']));
            return redirect()->back()->withSuccess('Name changed successfully.');
        }

        if ($request->has('phone')) {
            $request->validate([
                'phone' => 'required|regex:/(01)[0-9]{9}/'
            ]);

            Seller::where('id', Auth::guard('seller')->id())->update($request->only(['phone']));
            return redirect()->back()->withSuccess('Phone changed successfully.');
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

            Seller::where('id', Auth::guard('seller')->id())->update($request->only(['password']));
            Auth::guard('seller')->logout();
            return redirect(route('seller.login'))->withSuccess('Password changed successfully.');
        }
    }

    public function delete()
    {
        $seller = Seller::find(Auth::guard('seller')->id());

        Auth::guard('seller')->logout();

        $seller->delete();

        return redirect(route('seller.register'))->withSuccess('Account deleted successfully.');
    }

    public function getOwnedCars($id)
    {
        $seller = Seller::find($id);

        return view('admin.sellers.owned_cars', ['seller' => $seller]);
    }
}
