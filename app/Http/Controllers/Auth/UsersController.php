<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $auth = Auth::user();

        return view('users.index',['auth' => $auth]);
    }

    public function edit($id)
    {
        $auth = Auth::user();

        return view('users.edit',['auth' => $auth]);
    }
}
