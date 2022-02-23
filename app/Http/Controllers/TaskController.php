<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\CursorPaginator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role==1){
            $tasks = Tasks::whereEmployerId(Auth::id())->with('assign_to')->with('created_by')->paginate(10);
        }else{
            $tasks = Tasks::whereEmployeeId(Auth::id())->with('assign_to')->with('created_by')->paginate(10);
        }
        return view('Tasks.index')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::where('role',0)->get()->toArray();
        return view('Tasks.create')->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tasks::create([
            'title'=>$request->title,
            'employee_id'=>$request->assign_to,
            'employer_id'=>Auth::id(),
            'feedback'=>$request->feedback
        ]);
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       dd('shpow00');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param sdss int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=Tasks::where('id',$id)->first();
        return view('Tasks.edit')->with('task',$task);
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
        Tasks::where('id',$id)->update([
            'feedback'=>$request->feedback,
            'completed'=>$request->completed
        ]);
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('delete');
    }
}
