<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('users.index', compact('users'));
    }

    public function dashboard()
    {
        if(Auth::user()->role){
            $alltask = count(Tasks::where('employer_id',Auth::id())->get());
            $completed = count(Tasks::where('employer_id',Auth::id())->where('completed',1)->get());
            $pending = count(Tasks::where('employer_id',Auth::id())->where('completed',0)->get());
        }else{
            $alltask = count(Tasks::where('employee_id',Auth::id())->get());
            $completed = count(Tasks::where('employee_id',Auth::id())->where('completed',1)->get());
            $pending = count(Tasks::where('employee_id',Auth::id())->where('completed',0)->get());
        }


        return view('dashboard', compact('alltask','completed','pending'));
    }
}
