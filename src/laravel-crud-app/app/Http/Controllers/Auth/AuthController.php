<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
//            return redirect()->intended('dashboard')
            return redirect()->intended('/')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'place_of_birth' => 'required|max:50',
            'date_of_birth' => 'required|before:today',
            'gender' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

//        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
        return redirect("/")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $user = User::all();
        return view('user.index', compact('user'));
//        return view('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name' => 'required',
            'place_of_birth' => 'required|max:50',
            'date_of_birth' => 'required|before:today',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id
//            'password' => 'required|confirmed|min:6',
        ]);

//        $data = $request->all();
//        $check = $this->create($data);

//        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
//        return redirect("users")->withSuccess('Great! You have Successfully loggedin');


//        $updateData = $request->validate([
//            'name' => 'required|max:255',
//            'email' => 'required|max:255',
//            'phone' => 'required|numeric',
//            'password' => 'required|max:255',
//        ]);
        User::whereId($id)->update($updateData);
        return redirect('users')->with('completed', 'User has been updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users')->with('completed', 'Student has been deleted');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        return view('product.index');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'place_of_birth' => $data['place_of_birth'],
            'date_of_birth' => $data['date_of_birth'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
