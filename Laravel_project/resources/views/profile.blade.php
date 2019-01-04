<?php

use App\Match\Match;
use App\Pari\Pari;
use App\User;

$pari = new Pari;


$paris = Pari::where('users_id', '=', Auth::user()->id)
->get();      

foreach($paris as $pari){
    $id = $pari->matches_id;
}
if(isset($id)){
    $matches = match::findorFail($id);
    compact('matches');
}
?>
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tableau de bord</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <strong>Mes paris</strong> <br>
                    @if (empty($id))
                    <strong>Pas encore de Paris ? Fonce <a href ="{{ route('match.index') }}">Parier ici</a> </strong> <br>
                    @endif
                    <table>
                        <tr>
                            <th width = "300px"><b>Nom</b></th>
                            <th width = "300px"><b>Le match n°</b></th>
                            <th width = "300px"><b>L'équipe n°</b></th>
                            <th width = "300px">Montant parié</th>
                        </tr>
                    @if (isset($id))
                    @foreach ($paris as $pari)
                        <tr>
                            <td>{{ Auth::user()->name }}</td>
                            <td>{{ $pari->matches_id}}</td>
                            <td>{{ $pari->teams_id}}</td>
                            <td>{{ $pari->amount}} €</td>
                        </tr>
                    @endforeach
                    
                    
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if ($matches->winner_id == null)
    <div>Gains en attente</div>
    @elseif ($matches->winner_id == $pari->teams_id)
    <div>L'équipe n°{{ $matches->winner_id}} a gagné et tu as parié sur l'équipe n°{{ $pari->teams_id}}, tu as misé {{ $pari->amount }} € et tu as gagné 2 fois la mise, soit {{ $pari->amount * 2}} € mon pote !!!</div>
    @else
    <div>L'équipe n°{{ $matches->winner_id}} a gagné et tu as parié sur l'équipe n°{{ $pari->teams_id}}, PERDU !!</div>
    @endif

</div>
@endif

@endsection
