@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        @if (session('notification'))
                            <div>
                                {{ session('notification') }}
                            </div>
                        @endif
                    </div>

                    <div>
                        @if (count($errors) > 0)
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            {{$error}}
                                        </li>
                                        @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <form action='' method='POST' enctype='multipart/form-data'>
                        @csrf   
                        <div class=''>
                            <label for="employee">
                                Employee:
                            </label>
                            <select name="employee" >
                                <option>Select...</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=''>
                            <label for="Title">
                                Title:
                            </label>
                            <input type="text" name="Title" value="{{ old('Title') }}">
                        </div>
                        <div>
                            <label for="Description">
                                Description:
                            </label>
                            <textarea name="Description" cols="30" rows="4">{{ old('Description') }}</textarea>
                        </div>
                        <div>
                            <label for="attachment">
                                Upload File:
                            </label>
                            <input type="file" name='attachment'>
                        </div>
                        <div>
                            <button type='submit'>Create Task</button>
                        </div>

                    </form>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>User</th>
                                <th>Attachments</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->asigned_to }}</td>
                                <td>
                                    <div>
                                        <img src="/images/{{ $task->attachment }}" alt="" style="width: 100px"></td>
                                    </div>
                                <td>
                                    @if ($task->trashed())
                                    <a href="/assign-task/{{$task->id}}/restore">Restore</a>
                                    @else
                                    <a href="/assign-task/{{$task->id}}">Edit</a>
                                    <a href="/assign-task/{{$task->id}}/delete">Delete</a>

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
