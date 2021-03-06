<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Groups;
use App\Models\User;
use App\Http\Resources\Groups as GroupsResource;
//use Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\group_usr;
use App\Http\Resources\group_usr as group_usrResource;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::orderBy('created_at', 'desc')->paginate(40);
        return GroupsResource::collection($groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGroupScores(){
        $groupScores = group_usr::rightJoin('scores', 'group_usrs.user_id', '=', 'scores.user_id')->orderBy('scores.strokes', 'asc')->paginate(40);
        return $groupScores;
    }
    public function getGroupDifferentials(){
        $groupScores = group_usr::rightJoin('scores', 'group_usrs.user_id', '=', 'scores.user_id')->orderBy('scores.differential', 'asc')->paginate(40);
        return $groupScores;
    }


    public function joinGroup(Request $request)
    {
        $group_usr = new group_usr;
        $group_usr->group_id = $request->input('group_id');
        $group_usr->user_id = $request->input('user_id');

        $group_usr->save();
        return new group_usrResource($group_usr);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $groups = $request->isMethod('put') ? Groups::findOrFail($request->scores_id) : new Groups;
        $groups->id = $request->input('group_id');
        $groups->name = $request->input('name');

        $groups->save();
        return new GroupsResource($groups);
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
        $groups = Groups::findOrFail($id);
        if($groups->delete()){
        return new GroupsResource($groups);
        }
    }
}
