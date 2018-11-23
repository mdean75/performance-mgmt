<?php

namespace App\Http\Controllers;

use App\Department;
use App\JobTitle;
use App\PayGrade;
use App\Team;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // list of all users
        $users = User::all();

        return view('/users/index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::all()->sortBy('department_name');
        $teams = Team::all()->sortBy('name');
        $job_titles = JobTitle::all()->sortBy('job_title_name');
        $pay_grades = PayGrade::all()->sortBy('pay_grade_name');
        $managers = User::all()->where('is_manager', true)->sortBy('last_name');

        return view('users.create', [
                'departments' => $departments,
                'teams' => $teams,
                'job_titles' => $job_titles,
                'pay_grades' => $pay_grades,
                'managers' => $managers
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create new user from the form post request data, then create and add a hashed password, and check if the
        // is_manager box was checked and set to true. Finally save the new user
        $user = new User($request->all());

        // create and add hashed password
        $random = random_bytes(10);
        $user->password = Hash::make($random);

        // test if the manager check box was checked and set is_manager true if so
        if ($request->has('manager_check')) {
            $user->is_manager = true;
        }

        // todo: If save is successful, send new user email
        $user->save();

        return redirect('/users')->with('message', 'New user successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);

        $departments = Department::all()->sortBy('department_name');
        $teams = Team::all()->sortBy('name');
        $job_titles = JobTitle::all()->sortBy('job_title_name');
        $pay_grades = PayGrade::all()->sortBy('pay_grade_name');
        $managers = User::all()->where('is_manager', true)->sortBy('last_name');

        return view("/users.show",
            [
                'user' => $user,
                'departments' => $departments,
                'teams' => $teams,
                'job_titles' => $job_titles,
                'pay_grades' => $pay_grades,
                'managers' => $managers
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the user record and send to the view

        $user = User::findOrFail($id);

        $departments = Department::all()->sortBy('department_name');
        $teams = Team::all()->sortBy('name');
        $job_titles = JobTitle::all()->sortBy('job_title_name');
        $pay_grades = PayGrade::all()->sortBy('pay_grade_name');
        $managers = User::all()->where('is_manager', true)->sortBy('last_name');

        return view("/users.edit",
            [
                'user' => $user,
                'departments' => $departments,
                'teams' => $teams,
                'job_titles' => $job_titles,
                'pay_grades' => $pay_grades,
                'managers' => $managers
            ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
