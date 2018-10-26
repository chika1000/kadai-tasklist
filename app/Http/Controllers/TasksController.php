<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;    // 追加

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if ( \Auth::check() ){
            $user = \Auth::user();
            $tasks = $user->tasks()->orderByRaw('deadline is NULL ASC')->orderBy('deadline', 'ASC')->get();

            return view('tasks.index', [
                'tasks' => $tasks,
            ]);
        }else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( \Auth::check() ){
            $task = new \App\Task;

            return view('tasks.create', [
                'task' => $task,
            ]);
        }else {
            return redirect('/');
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
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:10',
            'memo' => 'max:255',
        ]);

        $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
            'deadline' => $request->deadline,
            'memo' => $request->memo,
            'mark' => $request->mark,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = \App\Task::find($id);

        if ( \Auth::id() === $task->user_id ){

            return view('tasks.show', [
                'task' => $task,
            ]);
        }else {
            return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = \App\Task::find($id);

        if ( \Auth::id() === $task->user_id ){

            return view('tasks.edit', [
                'task' => $task,
            ]);
        }else {
            return redirect('/');
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
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:10',
            'memo' => 'max:255',
        ]);

        $task = \App\Task::find($id);
        $task->content = $request->content;
        $task->status = $request->status;
        $task->deadline = $request->deadline;
        $task->memo = $request->memo;
        $task->mark = $request->mark;
        $task->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = \App\Task::find($id);

        if ( \Auth::id() === $task->user_id ){
            $task->delete();
        }

        return redirect('/');
    }

    public function status_working()
    {
        if ( \Auth::check() ){
            $user = \Auth::user();
            $tasks = $user->tasks()
                            ->where('status', '進行中')
                            ->orderByRaw('deadline is NULL ASC')
                            ->orderBy('deadline', 'ASC')
                            ->get();

            return view('tasks.status_working', [
                'tasks' => $tasks,
            ]);
        }else {
            return redirect('/');
        }
    }
}
