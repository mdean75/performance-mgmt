@extends('layouts.master_layout')

@section('title')
    Users
@endsection

@section('subtitle')
    View User
@endsection

@section('content')
    <div class="container ">
        <form method="POST" action="/users" class="col-md-10 offset-md-1">
            @csrf


            <div class="form-row">
                <div class="form-group col">
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" name="first_name" readonly="readonly" value="{{ $user->first_name }}">

                </div>

                <div class="form-group col ml-3">

                    <label for="name">Last Name</label>
                    <input class="form-control" type="text" name="last_name" readonly="readonly" value="{{ $user->last_name }}">
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" readonly="readonly" value="{{ $user->username }}">
                </div>

                <div class="form-group col ml-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" readonly="readonly" value="{{ $user->email }}">
                </div>


            </div>

            <div class="form-row mb-5">
                <div class="form-group col-md-4">
                    <label for="phone">Phone</label>
                    <input class="form-control " type="text" name="phone" readonly="readonly" value="{{ $user->phone }}">
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="department_id">Department</label>
                    <input class="form-control " type="text" name="phone" readonly="readonly" value="{{ $user->department->department_name }}">

                </div>

                <div class="form-group col">
                    <label for="team_id">Team</label>
                    <input class="form-control" type="text" name="team_id" readonly="readonly" value="{{ $user->team->name }}">

                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="job_title_id">Job Title</label>
                    <input class="form-control" type="text" name="job_title_id" readonly="readonly" value="{{ $user->job_title->job_title_name }}">
                </div>

                <div class="form-group col">
                    <label for="pay_grade_id">Pay Grade</label>
                    <input class="form-control" type="text" name="pay_grade_id" readonly="readonly" value="{{ $user->pay_grade->pay_grade_name }}">
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="manager_id">Immediate Supervisor</label>
                    <input class="form-control" type="text" name="manager_id" readonly="readonly"
                           value="{{ $user->manager->first_name . " " . $user->manager->last_name }}">
                </div>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="manager_check" name="manager_check" disabled="disabled"
                       @if($user->is_manager == true)
                            checked="checked"
                       @endif>
                <label class="custom-control-label" for="manager_check">This employee is a manager</label>
            </div>

            <div class="mt-4 form-row">
                <a href="/users/{{ $user->user_id }}/edit" class="btn btn-primary col-md-3">Update</a>
                <a href="/users" class="btn btn-outline-danger col-md-3 offset-md-1">Back</a>
            </div>

        </form>
    </div>

@endsection