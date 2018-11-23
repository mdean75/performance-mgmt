@extends('layouts.master_layout')

@section('title')
    Users
@endsection

@section('subtitle')
    Add New User
@endsection

@section('content')
    <div class="container ">
        <form method="POST" action="/users" class="col-md-10 offset-md-1">
            @csrf

            <div class="form-row">
                <div class="form-group col">
                    <label for="first_name">First Name</label>
                    <input class="form-control" type="text" name="first_name" required value="{{ old('first_name') }}">

                </div>

                <div class="form-group col ml-3">

                    <label for="name">Last Name</label>
                    <input class="form-control" type="text" name="last_name" required value="{{ old('last_name') }}">
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" required value="{{ old('username') }}">
                </div>

                <div class="form-group col ml-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" required value="{{ old('email') }}">
                </div>


            </div>

            <div class="form-row mb-5">
                <div class="form-group col-md-4">
                    <label for="phone">Phone</label>
                    <input class="form-control " type="text" name="phone" required value="{{ old('phone') }}">
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="department_id">Department</label>
                    <select class="form-control" name="department_id">
                        <option>Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group col">
                    <label for="team_id">Team</label>
                    <select class="form-control" name="team_id">
                        <option>Select Team</option>
                        @foreach($teams as $team)
                            <option value="{{ $team->team_id }}">{{ $team->name }}</option>

                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="job_title_id">Job Title</label>
                    <select class="form-control" name="job_title_id">
                        <option>Select Job Title</option>
                        @foreach($job_titles as $job_title)
                            <option value="{{ $job_title->job_title_id }}">{{ $job_title->job_title_name }}</option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group col">
                    <label for="pay_grade_id">Pay Grade</label>
                    <select class="form-control" name="pay_grade_id">
                        <option>Select Pay Grade</option>
                        @foreach($pay_grades as $pay_grade)
                            <option value="{{ $pay_grade->pay_grade_id }}">{{ $pay_grade->pay_grade_name }}</option>

                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="form-group col">
                    <label for="manager_id">Immediate Supervisor</label>
                    <select class="form-control" name="manager_id">
                        <option>Select Manager</option>
                        @foreach($managers as $manager)
                            <option value="{{ $manager->manager_id }}">
                                {{ $manager->first_name . " " . $manager->last_name }}
                            </option>

                        @endforeach

                    </select>
                </div>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" name="manager_check">
                <label class="custom-control-label" for="customCheck1">This employee is a manager</label>
            </div>

            {{--<div class="btn-group-toggle" data-toggle="button">--}}
                {{--<label class="btn btn-secondary active">--}}
                    {{--<input type="checkbox" checked autocomplete="off"> Checked--}}
                {{--</label>--}}
                {{--<span id="toggle" class="invisible">The new employee is a manager</span>--}}
            {{--</div>--}}


            <div class="mt-4 form-row">
                <input class="btn btn-primary col-md-3" type="submit" value="Add">
                <a href="/users" class="btn btn-outline-danger col-md-3 offset-md-1">Cancel</a>
            </div>

        </form>
    </div>

    <script>function myFunction() {
            let x = document.getElementById("manager_toggle");
            let y = document.getElementById('toggle_message');

            if(x.classList.contains('active')) {
                y.innerHTML = "this is a test";
            }

            // if (x.style.display === "none") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";
            // }
        }</script>

@endsection