<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::all();
        return view('User.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == "admin"){
            return view('User.create');
        }else{
            return abort('403');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:40',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required'],
        ]);


        $user= new User();
        $user->name= $request['name'];
        $user->email= $request['email'];
        $user->password= $request['password'];
        $user->role= $request['role'];
        // add other fields
        $user->save();

        
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role == "admin"){
            $user = User::find($id);
            return view('User.edit', compact('user'));
        }else{
            return abort('403');
        }
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
          ]);
    
          $user = User::find($id);
          $user->name = $request->get('name');
          $user->email = $request->get('email');
          $user->role = $request->get('role');

        if ($user->email != $request->get('email'))
        {
            $request->validate([
                'email' => ['unique:users']
            ]);

            $user->email = $request->get('email');
        }

        if (!empty($request->get('password')))
        {
            $request->validate([
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);

            $user->password = Hash::make($request->get('password'));
        }

          $user->save();
    
          return redirect('/user')->with('success', 'L\'utilisateur a été mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role == "admin"){
            $user = User::findorFail($id);
            $user->delete();
            return redirect('user');
        }else{
            return abort('403');
        }
    }
}
