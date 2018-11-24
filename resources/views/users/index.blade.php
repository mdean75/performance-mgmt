@extends('layouts.master_layout')

@section('title')
    Users
@endsection

@section('subtitle')
    Current Listing
@endsection

@section('content')

    <div class="container">
        <div class="row ">
            <h4 class="col-auto">
                <span>Username</span>
            </h4>
            <h4 class="col-md-3">
                <span>First Name</span>
            </h4>
            <h4 class="col-sm-3 ml-3">
                <span>Last Name</span>
            </h4>
            <h4 class="col-sm-2">
                <span>&nbsp Action</span>
            </h4>
        </div>



        <hr style="height: 2px;">
        @foreach($users as $user)
        <div class="row">

                {{-- Two separate forms for edit and delete, however due to using a split button group the first (edit) form
                     has the end form tag before all of the elements are closed. This is intentional to achieve the desired layout--}}


            <span class="form-control col-md-2 ml-3">{{ $user->username }}</span>
            <span class="form-control col-md-3 ml-3">{{ $user->first_name }}</span>
            <span class="form-control col-md-3 ml-3">{{ $user->last_name }}</span>

            <div class="btn-group btn-group-sm btn-group-toggle ml-3">
                <label class="btn btn-primary">
                    <a href="/users/{{ $user->user_id }}" class="btn btn-primary btn-sm">View</a>
                </label>

                <label class="btn btn-danger">
                <form method="post" action="users/{{ $user->user_id }}">
                    @csrf
                    @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to permanently Delete this User?  ' +
                        'This action cannot be undone.');">DELETE</button>

                </form>
                </label>

            </div>
        </div>
        <br>
        @endforeach

    <a href="/users/create" class="btn btn-outline-success col-md-4 offset-md-4 mt-4">Add User</a>
    </div>

@endsection