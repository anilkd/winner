<?php

namespace App\Http\Controllers;

use App\Contest;
use App\Winner;
use App\Show;
use App\ShowContestWinner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
class WinnerController extends Controller
{
    const createValidations = [
        'show_id' => 'required',
        'rj_name' => 'required',
        'contest_id' => 'required',
        'winner_name' => 'required',
        'phone_no' => 'required|phone|winner',
        'area_name' => 'required',
        'gift_issued_date' => 'required',
    ];

    const editValidations = [
        'show_id' => 'required',
        'rj_name' => 'required',
        'contest_id' => 'required',
        'winner_name' => 'required',
        'phone_no' => 'required|phone',
        'area_name' => 'required',
        'gift_issued_date' => 'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the nerds
        $winners = Winner::paginate(15);

        // load the view and pass the nerds
        return view('winners.index', array('winners' => $winners));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contests = Contest::
        whereDate('end_date', '>=', Carbon::today())
            ->lists('name', 'id');
        $shows = Show::lists('show_name', 'id');
        $selectedContest = null;
        return view('winners.create', array('contests' => $contests, 'shows' => $shows, 'selectedContest' => $selectedContest));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWinner($request, self::createValidations);
        $winner = new Winner;
        $winner->show_id = Input::get('show_id');
        $winner->rj_name = Input::get('rj_name');
        $winner->contest_id = Input::get('contest_id');
        $winner->winner_name = Input::get('winner_name');
        $winner->phone_no = Input::get('phone_no');
        $winner->email = Input::get('email');
        $winner->area_name = Input::get('area_name');
        $winner->gift_issued_date = Input::get('gift_issued_date');
        $winner->active = Input::get('active');

        $showContestWinner= new ShowContestWinner;
        $showContestWinner->show_id=Input::get('show_id');
        $showContestWinner->contest_id=Input::get('contest_id');

        DB::transaction(function() use ($winner, $showContestWinner) {
            $winner->save();
            $showContestWinner->winner_id=$winner->id;
            $showContestWinner->save();
        });

        Session::flash('message', 'Successfully created winner!');
        return Redirect::to('winners');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $winner = Winner::find($id);
        return view('winners.show', array('winner' => $winner));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contests = Contest::lists('name', 'id');
        $winner = Winner::find($id);
        $shows = Show::lists('show_name', 'id');
        $selectedContest = $winner->contest_name;
        $selectedShow = $winner->show_name;

        return view('winners.edit', array('winner' => $winner,
            'contests' => $contests,
            'shows' => $shows,
            'selectedShow' => $selectedShow,
            'selectedContest' => $selectedContest));
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
        $this->validateWinner($request, self::editValidations);

        $winner = Winner::findOrFail($id);
        $input = $request->all();

        $winner->update($input);
        return redirect('winners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $winner = Winner::findOrFail($id);
        $winner->destroy();
    }

    /**
     * @param Request $request
     */
    public function validateWinner(Request $request, $validations)
    {
        $validator = Validator::make($request->all(), $validations);

//        $validator->after($fun);
        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
    }


}
