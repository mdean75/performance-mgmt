@extends('layouts.master_layout')

@section('title')
    Job Titles
@endsection

@section('subtitle')
    Add New Job Title
@endsection

@section('content')
    <div class="container ">
        <form method="POST" action="/job_titles" class="col-md-8 offset-md-2">
            @csrf

            <label for="job_title_name">Enter new job title</label>
            <div class="form-row">

                <input class="form-control" type="text" name="job_title_name" placeholder="Job Title" required value="{{ old('job_title_name') }}">
            </div>
            <div class="mt-4 form-row">
                <input class="btn btn-primary col-md-3" type="submit" value="Add">
                <a href="/job_titles" class="btn btn-outline-danger col-md-3 offset-md-1">Cancel</a>
            </div>

        </form>
    </div>

@endsection