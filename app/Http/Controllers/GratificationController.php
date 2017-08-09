<?php

namespace App\Http\Controllers;

use App\Gratification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GratificationController extends Controller
{
    const createValidations = [
        'grat_name' => 'required|unique:gratifications',
        'grat_value' => 'required',
        'quantity' => 'required|integer|min:0',
        'expire_date' => 'required|date',
    ];
    const editValidations = [
        'grat_name' => 'required',
        'grat_value' => 'required',
        'quantity' => 'required|integer|min:0',
        'expire_date' => 'required|date',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gratifications = Gratification::paginate(15);

        return view('gratifications.index', array('gratifications' => $gratifications));
    }

    public function welcome()
    {
        $gratifications = Gratification::paginate(15);

        return view('welcome', array('gratifications' => $gratifications));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gratifications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, self::createValidations);
        $gratification = new Gratification;
        $gratification->grat_name       = Input::get('grat_name');
        $gratification->grat_value      = Input::get('grat_value');
        $gratification->quantity = Input::get('quantity');
        $gratification->expire_date = Input::get('expire_date');
        $gratification->save();

        Session::flash('message', 'Successfully created Gratification!');
        return Redirect::to('gratifications');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gratification=Gratification::find($id);
        return view('gratifications.edit', array('gratification' => $gratification));
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
        $gratification = Gratification::findOrFail($id);
        $this->validate($request, self::editValidations);

        $input = $request->all();

        $gratification->update($input);
        return redirect('gratifications');
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
