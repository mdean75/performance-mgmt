@extends('layouts.master_layout')

@section('title')
    Departments
@endsection

@section('subtitle')
    Add New Department
@endsection

@section('content')
    <div class="container ">
        <form method="POST" action="/departments" class="col-md-8 offset-md-2">
            @csrf

            <label for="department_name">Enter new department name</label>
            <div class="form-row">

                <input class="form-control" type="text" name="department_name" placeholder="Department Name" required value="{{ old('department_name') }}">
            </div>
            <div class="mt-4 form-row">
                <input class="btn btn-primary col-md-3" type="submit" value="Add">
                <a href="/departments" class="btn btn-outline-danger col-md-3 offset-md-1">Cancel</a>
            </div>

        </form>
    </div>

@endsection