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
                    <input class="form-control" type="text" name="first_name" required value="{{ $user->first_name }}">

                </div>

                <div class="form-group col ml-3">

                    <label for="name">Last Name</label>
                    <input class="form-control" type="text" name="last_name" required value="{{ $user->last_name }}">
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" required value="{{ $user->username }}">
                </div>

                <div class="form-group col ml-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" required value="{{ $user->email }}">
                </div>


            </div>

            <div class="form-row mb-5">
                <div class="form-group col-md-4">
                    <label for="phone">Phone</label>
                    <input class="form-control " type="text" name="phone" required value="{{ $user->phone }}">
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="department_id">Department</label>
                    <select class="form-control" name="department_id">

                        @foreach($departments as $department)
                            <option value="{{ $department->department_id }}"
                                    @if($department->department_id == $user->department_id)
                                    selected=selected
                                    @endif>
                                {{ $department->department_name }}

                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group col">
                    <label for="team_id">Team</label>
                    <select class="form-control" name="team_id">

                        @foreach($teams as $team)
                            <option value="{{ $team->team_id }}"
                                    @if($team->team_id == $user->team_id)
                                    selected=selected
                                    @endif>
                                {{ $team->name }}
                            </option>

                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="job_title_id">Job Title</label>
                    <select class="form-control" name="job_title_id">

                        @foreach($job_titles as $job_title)
                            <option value="{{ $job_title->job_title_id }}"
                                    @if($job_title->job_title_id == $user->job_title_id)
                                    selected="selected"
                                    @endif>
                                {{ $job_title->job_title_name }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group col">
                    <label for="pay_grade_id">Pay Grade</label>
                    <select class="form-control" name="pay_grade_id">

                        @foreach($pay_grades as $pay_grade)
                            <option value="{{ $pay_grade->pay_grade_id }}"
                                    @if($pay_grade->pay_grade_id == $user->pay_grade_id)
                                    selected="selected"
                                    @endif>
                                {{ $pay_grade->pay_grade_name }}
                            </option>

                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="manager_id">Immediate Supervisor</label>
                    <select class="form-control" name="manager_id">

                        @foreach($managers as $manager)
                            <option value="{{ $manager->manager_id }}"
                                    @if($manager->user_id == $user->manager_id)
                                    selected="selected"
                                    @endif>
                                {{ $manager->first_name . " " . $manager->last_name }}
                            </option>

                        @endforeach

                    </select>
                </div>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="manager_check" name="manager_check"
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