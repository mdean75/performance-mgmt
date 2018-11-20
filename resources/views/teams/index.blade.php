@extends('layouts.master_layout')

@section('title')
    Teams
@endsection

@section('subtitle')
    Current Listing
@endsection


@section('content')
    <div class="container">
        <div class="row ">
            <h4 class="col-sm-1 offset-sm-1">
                <span>ID</span>
            </h4>
            <h4 class="col-sm-5 offset-sm-1">
                <span>Name</span>
            </h4>
            <h4 class="col-sm-2 offset-sm-1">
                <span>&nbsp Action</span>
            </h4>
        </div>



        <hr style="height: 2px;">
        <div class="">
            @foreach($teams as $team)
                {{-- Two separate forms for edit and delete, however due to using a split button group the first (edit) form
                     has the end form tag before all of the elements are closed. This is intentional to achieve the desired layout--}}
                <form method="POST" action="/teams/{{ $team->team_id }}">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <input class="col-sm-1 offset-sm-1 form-control" type="text" name="team_id" value="{{ $team->team_id }}" readonly="readonly">
                        <input class="col-sm-5 offset-sm-1 form-control" type="text" name="name" value="{{ $team->name }}" required>
                        {{--<input class="btn btn-danger col-sm-2 offset-md-1 form-control" type="submit" value="Edit">--}}

                        <div class="offset-sm-1 btn-group btn-group-sm btn-group-toggle">
                            <label class="btn btn-primary">
                                <input class="btn btn-primary btn-sm" type="submit" value="Edit"></input>
                            </label>


                </form>
                <label class="btn btn-danger">

                    <form method="post" action="teams/{{ $team->team_id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to permanently Delete this Team?  ' +
                               'This action cannot be undone.');">DELETE</button>

                    </form>
                </label>
        </div>

    </div>


    <br>
    @endforeach

    <a href="/teams/create" class="btn btn-outline-success col-md-4 offset-md-4 mt-4">Add Team</a>

@endsection