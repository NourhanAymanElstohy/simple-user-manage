<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $types = Type::all();
        return view('users.create', compact('types'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->name . Str::random(5),
            'phone' => $request->phone,
            'password' => bcrypt('password'),
            'type_id' => $request->type_id,
            'email' => $request->email
        ]);

        $user->accessrights()->attach($request->access_ids);
        $token = app('auth.password.broker')->createToken($user);
        $user->sendPasswordResetNotification($token);

        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $types = Type::all();
        return view('users.edit', compact('user', 'types'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User Updated Successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted Successfully');
    }

    public function getTypeAcesses($type)
    {
        $type = Type::findOrFail($type);
        return $type->accessrights;
    }
}
