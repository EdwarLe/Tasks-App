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

                    <form action='' method='POST'>
                        @csrf   
                        <div class=''>
                            <label for="Employee">
                                Employee:
                            </label>
                            <select name="Employee" >
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
                            <label for="Attachment">
                                Upload Fiel:
                            </label>
                            <input type="text" name='Attachment' value="{{ old('Attachment') }}">
                        </div>
                        <div>
                            <button type='submit'>Create Task</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
