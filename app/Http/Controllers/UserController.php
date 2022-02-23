<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('users.index', compact('users'));
    }

    public function dashboard()
    {
        $alltask = count(Tasks::get());
        $completed = count(Tasks::where('completed',1)->get());
        $pending = count(Tasks::where('completed',1)->get());
     
        return view('dashboard', compact('alltask','completed','pending'));
    }
}
