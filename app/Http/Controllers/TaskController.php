<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Tasks;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('task');
    }

    public function destroy($taskID)
    {

        $task = $this->tasks->find($taskID);
        $this->authorize('destroy', $task);
        $task->delete();

        return redirect('task');
    }
}
