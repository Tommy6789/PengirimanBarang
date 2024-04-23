<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('login.login');
    }

    public function register(Request $request)
    {
        return view ('login.register');
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|max:255|unique:users',
            'password'=> 'required|min:8|confirmed',
            'password_confirmation'=> 'required',
            'terms'=> 'required',
        ], [
            'terms.required'=> 'Anda harus menyetujui persyaratan dan ketentuan.',
        ]);
        // dd($validator->fails());
        if ($validator->fails()){
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Akun Anda berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login_check(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();

            return redirect()->intended('/pengiriman');

            return back()->withErrors([
                'email' => 'The provided credentials do not match out record'
            ]);
        }
    }
    // public function logout()
    // {
    //     Auth::logout(); //Log out pengguna
    //     return redirect('/login'); //Redirect ke halaman utama
    // }
}
