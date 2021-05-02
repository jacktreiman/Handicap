<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Scores;
use App\Models\User;
use App\Http\Resources\Scores as ScoresResource;
use App\Http\Resources\Diff as DiffResource;
//use Auth;
use Illuminate\Support\Facades\Auth;

class userScoreController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //this.$router.push('http://127.0.0.1:8001/home');
        $user_id = Auth::id();
        $scores = Scores::where('user_id','=',$user_id)->orderBy('created_at', 'desc')->paginate(10);
        return ScoresResource::collection($scores);
    }
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
        $scores->user_id = Auth::id();
        

        $scores->save();
            return new ScoresResource($scores);
    
    }

}
