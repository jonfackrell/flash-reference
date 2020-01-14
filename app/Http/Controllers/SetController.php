<?php

namespace App\Http\Controllers;

use App\Card;
use App\Charts\SetViewsSummary;
use App\Set;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user();
        $user->load('courses');
        $user->load('sets');
        $sets = $user->sets;

        return view('app.sets.index', [
            'user' => $user,
            'sets' => $sets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = user();
        return view('app.sets.create', [
            'user' => $user,
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
        $input = $request->validate([
            'name' => 'required|max:255',
        ]);

        $set = new Set();
        $set->name = $input['name'];
        $set->institution_id = $request->institution_id;
        $set->course_id = $request->course_id;
        $set->user_id = user()->id;
        $set->save();

        $set->cards()->save((new Card()));

        return redirect()->route('sets.show', [
            'set' => $set
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Set $set)
    {
        $user = user();
        $cards = $set->cards;

        $setViews = new SetViewsSummary();
        $setViews->title('Study Set Views');

        $dates = [];
        $start = Carbon::now()->subDays(30);
        for ($i = 0 ; $i <= 30; $i++) {
            $dates[] = $start->copy()->addDays($i)->toDateString();
        }
        $setViews->labels($dates);

        $dateData = [];
        $start = Carbon::now()->subDays(30);
        for ($i = 0 ; $i <= 30; $i++) {
            $dateData[$start->copy()->addDays($i)->toDateString()] = 0;
        }

        $stats = DB::table('stats')
                    ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(DISTINCT(user_id)) as stat_count'))
                    ->where('set_id', $set->id)
                    ->where('created_at', '>', Carbon::now()->subDays(30))
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get();

        $stats->each(function($stat, $key) use (&$dateData){
            $dateData[$stat->date] = $stat->stat_count;
        });

        $setViews->dataset('Views', 'line', array_values($dateData))
            ->backgroundColor($setViews->colors->pop());

        return view('app.sets.show', [
            'user' => $user,
            'set' => $set,
            'cards' => $cards,
            'setViews' => $setViews,
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
        //
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



    /**
     * Preview the study set.
     *
     * @param  Set $set
     * @return \Illuminate\Http\Response
     */
    public function preview(Set $set)
    {
        $set->load('cards');

        return view('app.sets.preview' , [
            'course' => $set->course,
            'set' => $set,
        ]);
    }
}
