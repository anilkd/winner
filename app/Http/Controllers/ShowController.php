<?php

namespace App\Http\Controllers;

use App\Show;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;

class ShowController extends Controller
{
    const createValidations = [
        'show_name' => 'required|unique:shows',
        'show_start_time' => 'required',
        'show_end_time' => 'required|after:show_start_time',
    ];
    const editValidations = [
        'show_name' => 'required',
        'show_start_time' => 'required',
        'show_end_time' => 'required|after:show_start_time',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Show::paginate(15);
        return view('shows.index', array('shows' => $shows));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shows.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, self::createValidations);
        $show = new Show();
        $show->show_name = Input::get('show_name');
        $show->show_start_time = Input::get('show_start_time');
        $show->show_end_time = Input::get('show_end_time');
        $show->save();

        Session::flash('message', 'Successfully created Show!');
        return Redirect::to('shows');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $show = Show::find($id);
        $contests=$show->contests()->get();
        $filtered = $contests->filter(function ($value) {
            $today = new DateTime();
            return DateTime::createFromFormat('Y-m-d', $value->end_date)->getTimestamp()>= $today->getTimestamp();
        });

        return view('shows.show', array('show' => $show, 'contests' => $filtered->all()));
    }

    public function exportPDF($id){
        $show = Show::find($id);
        $contests=$show->contests()->get();
        $filtered = $contests->filter(function ($value) {
            $today = new DateTime();
            return DateTime::createFromFormat('Y-m-d', $value->end_date)->getTimestamp()>= $today->getTimestamp();
        });

        $pdf = PDF::loadView('reports.show',array('show' => $show, 'contests' => $filtered->all()));
        return $pdf->download($show->show_name.'-report.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $show = Show::find($id);
        return view('shows.edit', array('show' => $show));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $show = Show::findOrFail($id);
        $this->validate($request, self::editValidations);

        $input = $request->all();

        $show->update($input);
        return redirect('shows');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
