@extends('layouts.master_layout')

@section('title')
    Pay Grades
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
            <h4 class="col-sm-2 ml-5">
                <span>Grade</span>
            </h4>
            <h4 class="col-sm-3 ml-4">
                <span>Range</span>
            </h4>
            <h4 class="col-sm-2 ml-5">
                <span>&nbsp Action</span>
            </h4>
        </div>



        <hr style="height: 2px;">
        <div class="">
            @foreach($pay_grades as $pay_grade)
                {{-- Two separate forms for edit and delete, however due to using a split button group the first (edit) form
                     has the end form tag before all of the elements are closed. This is intentional to achieve the desired layout--}}
                <form method="POST" action="/pay_grades/{{ $pay_grade->pay_grade_id }}">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <input class="col-sm-1 offset-sm-1 form-control" type="text" name="pay_grade_id" value="{{ $pay_grade->pay_grade_id }}" readonly="readonly">
                        <input class="col-sm-1 offset-sm-1 form-control" type="text" name="pay_grade_name" value="{{ $pay_grade->pay_grade_name }}" required>
                        <input class="col-sm-3 offset-sm-1 form-control" type="text" name="pay_grade_range" value="{{ $pay_grade->pay_grade_range }}" required>

                        <div class="offset-sm-1 btn-group btn-group-sm btn-group-toggle">
                            <label class="btn btn-primary">
                                <input class="btn btn-primary btn-sm" type="submit" value="Edit" />
                            </label>


                </form>
                <label class="btn btn-danger">

                    <form method="post" action="pay_grades/{{ $pay_grade->pay_grade_id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to permanently Delete this Pay Grade?  ' +
                               'This action cannot be undone.');">DELETE</button>

                    </form>
                </label>
        </div>

    </div>


    <br>
    @endforeach

    <a href="/pay_grades/create" class="btn btn-outline-success col-md-4 offset-md-4 mt-4">Add Pay Grade</a>

@endsection