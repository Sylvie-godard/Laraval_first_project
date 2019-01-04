<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match\Match;
use Auth;
use App\User\User;
use App\Pari\Pari;
use App\Player\Player;
use Illuminate\Support\Facades\Hash;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = match::all();
        return view('Match.index', ['matches' => $matches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == "admin"){
            return view('Match.create');
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
            'teams1_id' => ['required', 'integer'],
            'teams2_id' => ['required', 'integer'],
            'placement' => ['required', 'string'],            
        ]);

        $match= new Match();
        $match->scoreBoard= $request['scoreBoard'];
        $match->winner_id= $request['winner_id'];
        $match->teams1_id= $request['teams1_id'];
        $match->teams2_id= $request['teams2_id'];
        $match->placement= $request['placement'];
        $match->temperature= $request['temperature'];
        $match->nb_faults= $request['nb_faults'];
        // add other fields
        $match->save();

        
        return redirect('match');
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
    public function pari($id)
    {
        $match = Match::findorFail($id);

        return view('Pari.create', compact('match'));
    }

    public function pariStore(Request $requests)
    {
       $requests->validate([
            'teams_id' => ['required', 'integer'],
            'matches_id' => ['required', 'integer'],            
            'amount' => ['required', 'integer'],            
        ]);

        $pari= new Pari();
        $pari->users_id= $requests['users_id'];
        $pari->teams_id= $requests['teams_id'];
        $pari->matches_id= $requests['matches_id'];;
        $pari->amount= $requests['amount'];
       
        $pari->save();

        
        return redirect('match')->with('success', 'Good luck pour empocher la mise !');

        
    }

    public function stats()
    {
        $matches = match::all();
        $avr_temp = 0;
        $avr_faults = 0;
        $counter = 0;

        foreach ($matches as $match)
        {
            $counter += 1;
            $avr_temp += $match->temperature;
            $avr_faults += $match->nb_faults;
        }

        $avr_temp /= $counter;
        $avr_faults /= $counter;

        return view('Match.stats', ['avr_temp' => $avr_temp], ['avr_faults' => $avr_faults] );
    }


    public function paris()
    {
        $paris = Pari::all();
        return view('Match.pari', ['paris' => $paris]);
    }

    public function edit($id)
    {
        if(Auth::user()->role == "admin"){
            $match = match::findorFail($id);
            return view('match.edit', compact('match'));
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
            'teams1_id' => ['required', 'integer'],
            'teams2_id' => ['required', 'integer'],
            'placement' => ['required', 'string'],            
          ]);
    
          $match = match::findorFail($id);
          $match->scoreBoard= $request['scoreBoard'];
          if($request['winner_id'] == ''){
            $request['winner_id'] = null;
          }
          $match->winner_id= $request['winner_id'];
          $match->teams1_id= $request['teams1_id'];
          $match->teams2_id= $request['teams2_id'];
          $match->placement= $request['placement'];
          $match->temperature= $request['temperature'];
          $match->nb_faults= $request['nb_faults'];

          $match->save();
    
          return redirect('/match')->with('success', 'Le match a été mis à jour.');
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
            $match = match::findorFail($id);
            $match->delete();
            return redirect('match');
        }else{
            return abort('403');
        }
    }
}
