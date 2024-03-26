<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getAssignTask() {
        $users = User::all();
        return view('assign-task')->with(compact('users'));
    }

    public function postAssignTask(Request $request) {
        

        $rules = [
            'Employee' => ['sometimes', 'exists:users, id'],
            'Title' => ['required', 'min:5'],
            'Description' => ['required', 'min:15'],
            'Attachment' => ['ends_with:jpg,jpeg,pdf,png']
        ];

        $messages = [
            'Title.required' => 'Please add a title, it\'s necessary for task',
            'Title.min' => 'The title must be at least 5 characters',
            'Description.required' => 'Please add a description, it\'s necessary for task',
            'Description.min' => 'The description must be at least 15 characters',
            'Attachment.ends_with' => 'Files must have the following extensions .jpg, .jpeg, .png, .pdf'
        ];

        $this->validate($request, $rules);

        $task = new Task();
        $task->user_id = 1;
        $task->asigned_to = $request->input('Employee');
        $task->title = $request->input('Title');
        $task->description = $request->input('Description');
        $task->attachment = $request->input('Attachment') ?: null;
        $task->save();
        
        return back();
       
    }
}
