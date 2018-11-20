@extends('layouts.master_layout')

@section('title')
    Teams
@endsection

@section('subtitle')
    Add New Team
@endsection

@section('content')
    <div class="container ">
        <form method="POST" action="/teams" class="col-md-8 offset-md-2">
            @csrf

            <label for="name">Enter new team name</label>
            <div class="form-row">

                <input class="form-control" type="text" name="name" placeholder="Team Name" required value="{{ old('name') }}">
            </div>
            <div class="mt-4 form-row">
                <input class="btn btn-primary col-md-3" type="submit" value="Add">
                <a href="/teams" class="btn btn-outline-danger col-md-3 offset-md-1">Cancel</a>
            </div>

        </form>
    </div>

@endsection