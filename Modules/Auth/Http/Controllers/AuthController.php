<?php

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Http\Requests\Admin\UpdateAdminPasswordRequest;
use Modules\Admin\Http\Requests\Admin\UpdateAdminRequest;
use Modules\Auth\Http\Requests\LoginAdminRequest;
use Yoeunes\Toastr\Toastr;

class AuthController extends Controller
{

    public function index()
    {
        $errors = Session::get('errors');

        if ($errors){
            foreach ($errors->all() as $error){
                toastr()->error($error);
            }
        }

        if (!auth()->check())
        {
            return view('auth::profile.login',compact('errors'));
        }

        return redirect('dashboard');
    }

    public function login(LoginAdminRequest $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'status' => 1
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->user()->save();

            return redirect()->intended('/panel/dictionaries');
        }

        return back()->withErrors([
            'email' => 'Wrong Information',
        ]);
    }

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }



    public function show(){
        $adminId = auth()->user()->id;
        $admin=Admin::find($adminId);

        return view('auth::profile.show',compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        return view ('auth::profile.edit',compact('admin'));
    }

    public function update(UpdateAdminRequest $request,$id){
        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'username' => $request->username,
            'mobile' => $request->mobile,
            'email' => $request->email,
        ]);

        return redirect()->route('showProfile');
    }

    public function updatePassword(UpdateAdminPasswordRequest $request,$id)
    {
        $admin = Admin::findOrFail($id);
        if (Hash::check($request->oldpassword, $admin->password)) {
            $admin->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return app(AuthController::class)->logout($request);
    }

    public function delete(){
        auth()->user()->delete();

        return view('admin::admin.index');
    }

    public function editProfileImage()
    {
        return view('auth::profile.editProfileImage');
    }

    public function updateProfileImage(Admin $admin, Request $request)
    {
        $admin->update($request->all());
        $admin->save();
        $admin->uploadImage($request);

        return redirect()->route('showProfile');
    }
}
