<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Scores;
use App\Http\Resources\Scores as ScoresResource;

class ScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllScores(){
        $scores = Scores::paginate(15);
        return ScoresResource::collection($scores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scores = $scores->isMethod('put') ? Scores::findOrFail($request->scores_id) : new Scores;
        $scores->id = $request->input('scores_id');
        $scores->strokes = $request->input('strokes');
        $scores->course = $request->input('course');
        $scores->slope = $request->input('slope');
        $scores->differential = $request->input('differential');
        $scores->user_id = $request->input('user_id');

        if($scores->save()){
            return new Scores($scores);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scores = Scores::findOrFail($id);
        return new ScoresResource($scores);
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
        $scores = Scores::findOrFail($id);
        if($scores->delete()){
        return new ScoresResource($scores);
        }
    }
}
