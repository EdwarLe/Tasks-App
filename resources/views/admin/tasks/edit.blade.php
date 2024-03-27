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
                                {{ session('notification')}}
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
                            <label for="title">
                                Title:
                            </label>
                            <input type="text" name="title" value="{{ old('title'), $task->title }}">
                        </div>
                        <div>
                            <label for="Description">
                                Description:
                            </label>
                            <textarea name="Description" cols="30" rows="4">{{ old('Description', $task->description) }}</textarea>
                        </div>
                        <div>
                            <label for="attachment">
                                Upload File:
                            </label>
                            <input type="file" name='attachment'>
                        </div>
                        <div>
                            <button type='submit'>Edit Task</button>
                        </div>
                    </form>
                    <form action="" method='POST'>
                        @csrf
                        <div>
                            <h3>Task: {{ $task->title }}</h3>
                            <h2>User: {{ $task->asigned_to }}</h2>
                            <p>Description: {{ $task->description }}</p>
                            <div>
                                        <img src="/images/{{ $task->attachment }}" alt="" style="width: 100px;"></td>
                                    </div>
                        </div>
                        <div>
                            <label for="comment">Comments:</label>
                            <input type="text" name='comment'>
                        </div>
                        <div>
                            <button type='submit'>Comment</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
