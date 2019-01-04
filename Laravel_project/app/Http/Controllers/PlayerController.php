<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player\Player;
use Auth;

class PlayerController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct(playerRepository $repository)
    // {
    //     $this->repository = $repository;
    //     $this->middleware('ajax')->only('destroy');
    // }

    
    public function index()
    {
        $players = player::all();
        return view('Player.index', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == "admin"){
            return view('Player.create');
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
            'firstname' => 'required|max:40',
            'lastname' => 'required|max:40',
            'goals' => 'required|max:400',
            'height' => 'required|max:40',
            'age' => 'required|max:200',
            'birthdate' => 'required|max:40',
            'weight' => 'required|max:40',
        ]);


        $player= new Player();
        $player->firstname= $request['firstname'];
        $player->lastname= $request['lastname'];
        $player->goals= $request['goals'];
        $player->height= $request['height'];
        $player->age= $request['age'];
        $player->birthdate= $request['birthdate'];
        $player->weight= $request['weight'];
        $player->position= $request['position'];
        $player->teams_id= $request['teams_id'];
        // add other fields
        $player->save();

        
        return redirect('player')->with('success', 'Nouveau joueur près pour la bataille');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::findorFail($id);
        return view('Player.show', compact('player'));
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
            $player = Player::findorFail($id);
            return view('Player.edit', compact('player'));
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'goals' => ['required', 'string', 'max:255'],
            'height' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'string', 'max:255'],
            'weight' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'teams_id' => ['required', 'string', 'max:255'],
          ]);
    
          $player = player::findorFail($id);
          $player->firstname = $request->get('firstname');
          $player->lastname = $request->get('lastname');
          $player->goals = $request->get('goals');
          $player->height = $request->get('height');
          $player->age = $request->get('age');
          $player->birthdate = $request->get('birthdate');
          $player->weight = $request->get('weight');
          $player->position = $request->get('position');
          $player->teams_id = $request->get('teams_id');

          if($request->get('position') == null){
            $player->position = $player->position;
          }
          $player->save();
    
          return redirect('/player')->with('success', 'Le joueur a été mis à jour.');
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
            $player = player::findorFail($id);
            $player->delete();
            return redirect('player')->with('success', 'Le joueur a bien été supprimé.');
        }else{
            return abort('403');
        }
    }
}

