<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;


class TasksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index () {
        $users = User::all();
        $tasks = Task::withTrashed()->get();


        return view('admin.tasks.assign-task')->with(compact('users', 'tasks'));
    }

    public function store(Request $request) {

        
        $rules = [
            'employee' => ['sometimes', 'exists:users,id'],
            'Title' => ['required', 'min:5'],
            'Description' => ['required', 'min:15'],
            'attachment' => ['nullable','file', 'max:11000', 'mimes:jpg,jpeg,pdf,png']
        ];

        $messages = [
            'employee' => 'Please select an employee, is required',
            'Title.required' => 'Please add a title, it\'s necessary for task',
            'Title.min' => 'The title must be at least 5 characters',
            'Description.required' => 'Please add a description, it\'s necessary for task',
            'Description.min' => 'The description must be at least 15 characters',
            'attachment.ends_with' => 'Files must have the following extensions .jpg, .jpeg, .png, .pdf'
        ];

        $this->validate($request, $rules, $messages);
        
        $task = new Task();
        $task->user_id = 1;
        $task->asigned_to = $request->input('employee');
        $task->title = $request->input('Title');
        $task->description = $request->input('Description');
        // $task->attachment = $request->file('attachment');
      
        if ($request->hasfile('attachment')) {
            $image = $request->file('attachment');
            $pathImage = 'images/';
            $taskImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($pathImage, $taskImage);
            $task['attachment'] = $taskImage;
        }
        $task->save();
        
        return back()->with('notification', 'Task created successfully');
       
    }

    public function edit ($id) {
        
        $task = Task::find($id);
        $user_assigned = $task->asigned_to;

        $users = User::all();
        $find_user = User::find($user_assigned)->name;
    
        return view('admin.tasks.edit')->with(compact('task','users','find_user'));
    }

    public function update ($id, Request $request) {
        
        $rules = [
            'employee' => ['sometimes', 'exists:users,id'],
            'title' => ['min:5'],
            'Description' => ['min:15'],
            'attachment' => ['nullable','file', 'max:11000', 'mimes:jpg,jpeg,pdf,png']
        ];

        $messages = [
            'employee' => 'Please select an employee, is required',
            'title.min' => 'The title must be at least 5 characters',
            'Description.min' => 'The description must be at least 15 characters',
            'attachment.ends_with' => 'Files must have the following extensions .jpg, .jpeg, .png, .pdf'
        ];

        $this->validate($request, $rules, $messages);

        $task = Task::find($id);
        $task->user_id = 1;
        $task->asigned_to = $request->input('employee');
        $task->title = $request->input('title');
        $task->description = $request->input('Description');

        if ($request->hasfile('attachment')) {
            $image = $request->file('attachment');
            $pathImage = 'images/';
            $taskImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($pathImage, $taskImage);
            $task->attachment = $taskImage;
        }

        $task->save();

        return back()->with('notification', 'Succesfully updated task');
    }

    public function delete ($id) {
        $task = Task::find($id);
        $task->delete();

        return back()->with('notification', 'Succesfully deleted task');
    }

    public function restore ($id) {
        $task = Task::withTrashed()->find($id)->restore();
        

        return back()->with('notification', 'Succesfully restored task');
    }
}
