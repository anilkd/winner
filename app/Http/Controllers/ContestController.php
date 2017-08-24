<?php

namespace App\Http\Controllers;

use App\Contest;
use App\Gratification;
use App\Show;
use App\ShowContest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Winner;
use Barryvdh\DomPDF\Facade as PDF;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the nerds
        $contests = Contest::paginate(15);

        // load the view and pass the nerds
        return view('contests.index', array('contests' => $contests));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contestShows = Show::all();
        $gratifications = Gratification::selectRaw('CONCAT(grat_name, "-", quantity) as grat, id')->lists('grat', 'id');
//        $gratifications=Gratification::get()->lists('grat_name', 'id');
        return view('contests.create', array('contestShows' => $contestShows, 'gratifications' => $gratifications));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = $this->contestRules();
        $rules['name'] = 'required|unique:contests';

        $this->customValidate($request, $rules);

        $contest = new Contest;
        $contest->name = Input::get('name');
        $contest->grat_id = Input::get('grat_id');
        $contest->start_date = Input::get('start_date');
        $contest->end_date = Input::get('end_date');
        $contest->save();

        $shows = Input::get('shows');

        foreach ($shows as $show) {
            $showContest = new ShowContest;
            $showContest->show_id = $show['show_id'];
            $showContest->winner_count = $show['winner_count'];
            $showContest->contest_id = $contest->id;
//            $contest->shows()->save($showContest);
            $showContest->save();
        }

        Session::flash('message', 'Successfully created Contest!');
        return Redirect::to('contests');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contest = Contest::find($id);
        $winners = Winner::where('contest_id', $contest->id)->paginate(15);
        return view('contests.display', array('contest' => $contest, 'winners' => $winners));
    }


    public function exportPDF($id){
        $contest = Contest::find($id);
        $winners =  Winner::where('contest_id', $contest->id)->get();
        $pdf = PDF::setOptions(['dpi' => 300,"isHtml5ParserEnabled"=>true,'defaultFont' => 'sans-serif'])->loadView('reports.contest',array('contest' => $contest, 'winners' => $winners));
        return $pdf->download($contest->name.'-report.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contest = Contest::find($id);
        $contestShows = Show::all();
        $gratifications = Gratification::selectRaw('CONCAT(grat_name, "-", quantity) as grat, id')->lists('grat', 'id');
        return view('contests.edit', array('contest' => $contest, 'contestShows' => $contestShows, 'gratifications' => $gratifications));
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
        $contest = Contest::findOrFail($id);

        $rules = $this->contestRules();
        $rules['name'] = 'required';
//        $rules['shows'] = 'min:3';
        $this->customValidate($request, $rules);

        $input = $request->all();

        $contest->update($input);

        $shows =  $request->input('shows');

        foreach ($shows as $show) {
//            $showContest=ShowContest::findOrNew(array('show_id'=>$show['show_id'],'contest_id'=> $contest->id));
//            $showContest=ShowContest::where('show_id', $show['show_id'])->where('contest_id', $contest->id);
            $showContest = ShowContest::firstOrNew(['show_id' => $show['show_id'],'contest_id'=>$contest->id]);
            $showContest->winner_count=$show['winner_count'];
            $showContest->save();


        }
        return redirect('contests');
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

    /**
     * @return array
     */
    public function contestRules()
    {
        $shows = Input::get('shows');
        $rules = [];
        $rules['grat_id'] = 'required|integer';
        $rules['start_date'] = 'required|date';
        $rules['end_date'] = 'required|date|after:start_date';
        foreach ($shows as $key => $show) {
            $rules['shows.' . $key . '.winner_count'] = 'required';
        }
        return $rules;
    }

    public function customValidate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);
        $validator->after(function ($validator) {
            if ($this->validateGratifications()) {
                $validator->errors()->add('grat_id', 'Gratification quantity does not match with show quantity');
            }
        });
        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
    }

    private function validateGratifications()
    {
        $showTotalWinners = 0;
        $shows = Input::get('shows');
        foreach ($shows as $key => $show) {
            $showTotalWinners += $show['winner_count'];
        }
        $gratification = Gratification::find(Input::get('grat_id'));
        if ($gratification->quantity != $showTotalWinners) {
            return true;
        }
        return false;
    }


}
