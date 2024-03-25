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

                    <form action=''>
                        <div class=''>
                            <label for="employee_id">
                                Employee:
                            </label>
                            <select name="employee_id">
                                <option value="1">Employee 1</option>
                                <option value="2">Employee 2</option>
                                <option value="3">Employee 3</option>
                            </select>
                        </div>
                        <div class=''>
                            <label for="title_task_id">
                                Title:
                            </label>
                            <input type="text">
                        </div>
                        <div>
                            <label for="description_task_id">
                                Description:
                            </label>
                            <textarea name="description_task_id" cols="30" rows="4"></textarea>
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
