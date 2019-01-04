<?php

// use App\Match\Match;
// use App\Pari\Pari;
// use App\User;

//  if(Auth::user()->role == "user"){
//     return redirect('team')->with('success', 'Nouvelle équipe près pour la bataille');
//  }
?>

@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Liste des matchs</h3>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p> {{$message}} </p>
    </div>
@endif

<table class ="table table-hover table-sm">
    <tr>
        <th width = "300px"><b>Le match n°</b></th>
        <th width = "300px"><b>Score</b></th>
        <th width = "300px">Equipe gagnante</th>
        <th width = "150px">Equipe 1</th>
        <th width = "300px">Equipe 2</th>
        <th width = "300px">Emplacement</th>
        <th width = "300px">Température</th>
        <th width = "300px">Nombre de fautes</th>
        @auth
        <th width = "300px">Parier</th>
        @endauth
        @admin
        <th width = "300px">Modifier</th>
        <th width = "300px">Supprimer</th>
        @endadmin
    </tr>

    @foreach($matches as $match)
        <tr>
            <td><b> {{$match->id}} </b></td>
            <td><b> {{$match->scoreBoard}} </b></td>
            <td><b> {{$match->winner_id}} </b></td>
            <td><b> {{$match->teams1_id}} </b></td>
            <td><b> {{$match->teams2_id}} </b></td>
            <td><b> {{$match->placement}} </b></td>
            <td><b> {{$match->temperature}} </b></td>
            <td><b> {{$match->nb_faults}} </b></td>
            @auth
            @if($match->winner_id == null)
            <td><button class="btn" type="button" onclick="window.location='{{route('match.pari', $match->id)}}'"><a href="{{route('match.pari', $match->id)}}">Parier</a></button></td>  
            @endif
            @if($match->winner_id != null)
            <td>Paris terminés</a></button></td>  
            @endif
            @endauth

            @admin
            <td><button class="btn" type="button" onclick="window.location='{{route('match.edit', $match->id)}}'"><a href="{{route('match.edit', $match->id)}}">Modifier</a></button></td>
            <td>
            <form action="{{action('MatchController@destroy', $match->id)}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce match ?')">Supprimer</button>
            </form>
            </td>
        @endadmin

        </tr>
    @endforeach

</table>

@admin
<button class="btn" type="button" onclick="window.location='{{route('match.create')}}'">Nouveau</a></button>
@endadmin

@endsection