<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        $user = User::all();
        return view('user.index' , [
            'users' => $user,
        ]);
    }

    public function update(Request $request  , $id) {
        $user = User::where('id' ,$id)->first();
        $user->update([
            'is_admin' => 1,
        ]);

        return redirect()->route('user.index')->with([
            'success' => 'New Update!!',
        ]);
    }
}
