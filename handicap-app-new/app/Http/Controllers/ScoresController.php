<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Scores;
use App\Models\User;
use App\Http\Resources\Scores as ScoresResource;
use App\Http\Resources\Diff as DiffResource;
//use Auth;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;


class ScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
   
     */
   
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/



     public function getAllScores(){
        //this.$router.push('http://127.0.0.1:8001/home');
        $scores = Scores::orderBy('strokes', 'asc')->paginate(10);
        return ScoresResource::collection($scores);
    }

    public function getAllDifferentials(){
        $differentials = Scores::orderBy('created_at', 'desc')->pluck('differential');
        return $differentials;
    }

    public function getUserScores(Request $request){
        $user_id = Auth::id();
        $scores = Scores::where('user_id','=',$user_id)->orderBy('created_at', 'desc')->paginate(10);
        return ScoresResource::collection($scores);
    }

    public function getUserId()
    {
        // Retrieve the currently authenticated user...
        $id = Auth::id();
        return $id;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$scores = new Scores; 

        $scores = $request->isMethod('put') ? Scores::findOrFail($request->scores_id) : new Scores;
        //$scores = new Scores;
        $scores->id = $request->input('scores_id');
        $scores->strokes = $request->input('strokes');
        $scores->course = $request->input('course');
        $scores->slope = $request->input('slope');
        $scores->differential = $slope*$course;
        $scores->user_id = $request->input('user_id');
        

        $scores->save();
            return new ScoresResource($scores);
    
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
    /*public function edit($id)
    {
        //
    }*/

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
