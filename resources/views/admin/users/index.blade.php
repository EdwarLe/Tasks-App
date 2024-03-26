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
                        @if (session('notification') > 0)
                            <div>
                                {{session('notification')}}
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

                    <form action='' method='POST'>
                        @csrf   
                        <div class=''>
                            <label for="email">
                                E-mail:
                            </label>
                            <input type='email' name='email' value="{{ old('email') }}"/>
                        </div>
                        <div class=''>
                            <label for="name">
                                Name:
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="password">
                                Password:
                            </label>
                            <input type="text" name="password" value="{{ old('password') }}">
                        </div>
                        <div>
                            <button type='submit'>Create User</button>
                        </div>

                    </form>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>E-mail</th>
                                <th>Name</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <a href="/user/{{ $user->id }}">Edit</a>
                                    <a href="#">Delete</a>
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
