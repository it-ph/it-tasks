<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('itdev-task/profile/changepassword');
    }
    public function update(Request $request)
    {
        // dd($id);
        $this->validate($request,
        [
            'new_password' => 'required|min:8',
        ],
        [
            'new_password.required' => 'Password field is required.'
        ]);

        $user = User::where('id',Auth::user()->id)->first();
        $request['password'] = Hash::make( $request['new_password']);
        $user->update(['password' =>$request['password']] );

        return redirect()->back()->with('with_success',"Password Updated Successfully!" );
    }
}
