<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User\User;
use App\Team\Team;
use Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $teams = team::all();
        return view('team.index', ['teams' => $teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == "admin"){
            return view('Team.create');
        }else{
            return abort('403');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:40',
            'country' => 'required|max:40',
            'flag' => 'required|max:400',
            'numberPlayers' => 'required|max:40',
            'numberMatchesWon' => 'required|max:200',
            'numberGoals' => 'required|max:40',
            'ranking' => 'required|max:40',
        ]);


        $team= new Team();
        $team->name= $request['name'];
        $team->country= $request['country'];
        $team->flag= $request['flag'];
        $team->numberPlayers= $request['numberPlayers'];
        $team->numberMatchesWon= $request['numberMatchesWon'];
        $team->numberGoals= $request['numberGoals'];
        $team->ranking= $request['ranking'];
        $team->save();

        return redirect('team')->with('success', 'Nouvelle équipe près pour la bataille');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view(;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role == "admin"){
            $team = Team::findorFail($id);
            return view('Team.edit', compact('team'));
        }else{
            return abort('403');
        }
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'flag' => ['required', 'string', 'max:255'],
            'numberPlayers' => ['required', 'integer'],
            'numberMatchesWon' => ['required', 'integer'],
            'numberGoals' => ['required', 'integer'],
            'ranking' => ['required', 'integer'],
        ]);
    
          $team = team::findorFail($id);
          $team->name = $request->get('name');
          $team->country = $request->get('country');
          $team->flag = $request->get('flag');
          $team->numberPlayers = $request->get('numberPlayers');
          $team->numberMatchesWon = $request->get('numberMatchesWon');
          $team->numberGoals = $request->get('numberGoals');
          $team->ranking = $request->get('ranking');
          $team->save();
    
          return redirect('/team')->with('success', 'L\'Equipe a bien été mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role == "admin"){
            $team = team::findorFail($id);
            $team->delete();
            return redirect('team');
        }else{
            return abort('403');
        }
    }
}