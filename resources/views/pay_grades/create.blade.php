@extends('layouts.master_layout')

@section('title')
    Pay Grades
@endsection

@section('subtitle')
    Add New Pay Grades
@endsection

@section('content')
    <div class="container ">
        <form method="POST" action="/pay_grades" class="col-md-8 offset-md-2">
            @csrf

            <label for="pay_grade_name">Enter new pay grade</label>
            <div class="form-row">

                <input class="form-control" type="text" name="pay_grade_name" placeholder="Pay Grade Name" required value="{{ old('pay_grade_name') }}">
            </div>

            <label for="pay_grade_range" class="mt-5">Enter pay range</label>
            <div class="form-row">

                <input class="form-control" type="text" name="pay_grade_range" placeholder="Pay Range" required value="{{ old('pay_grade_range') }}">
            </div>

            <div class="mt-4 form-row">
                <input class="btn btn-primary col-md-3" type="submit" value="Add">
                <a href="/pay_grades" class="btn btn-outline-danger col-md-3 offset-md-1">Cancel</a>
            </div>

        </form>
    </div>

@endsection