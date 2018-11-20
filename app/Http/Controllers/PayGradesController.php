<?php

namespace App\Http\Controllers;

use App\PayGrade;
use Illuminate\Http\Request;

class PayGradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pay_grades = PayGrade::all();
        return view('/pay_grades.index', ['pay_grades' => $pay_grades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/pay_grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // first validate
        $attributes = request()->validate([
            'pay_grade_name'    =>  ['required', 'min:2', 'max:5'],
            'pay_grade_range'   =>  ['required', 'min:10', 'max:255']
        ]);

        PayGrade::create($attributes);

        return redirect('/pay_grades')->with('message', 'Pay Grade "' . request('pay_grade_name'). '" Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PayGrade  $payGrade
     * @return \Illuminate\Http\Response
     */
    public function show(PayGrade $payGrade)
    {
        // currently integrated with index due to small amount of data
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PayGrade  $payGrade
     * @return \Illuminate\Http\Response
     */
    public function edit(PayGrade $payGrade)
    {
        // currently integrated with index due to small amount of data
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PayGrade  $payGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PayGrade $payGrade)
    {
        // first validate
        $attributes = request()->validate([
            'pay_grade_name'    =>  ['required', 'min:2', 'max:5'],
            'pay_grade_range'   =>  ['required', 'min:10', 'max:255']
        ]);

        $payGrade->update($attributes);

        return redirect('/pay_grades')->with('message', 'Pay Grade "' . $payGrade->pay_grade_name . '" Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PayGrade  $payGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayGrade $payGrade)
    {
        //
        PayGrade::destroy($payGrade->pay_grade_id);

        return redirect('/pay_grades')->with('message', 'Pay Grade "' . $payGrade->pay_grade_name. '" Successfully deleted');
    }
}
