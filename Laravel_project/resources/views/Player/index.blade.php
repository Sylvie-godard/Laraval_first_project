@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Liste des joueurs</h3>
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
        <th width = "50px"><b>Prénom</b></th>
        <th width = "300px">Nom</th>
        <th width = "300px">Âge</th>
        <th width = "300px">Nombre de buts</th>
        <th width = "300px">Taille</th>
        <th width = "300px">Poids</th>
        <th width = "300px">Anniversaire</th>
        <th width = "300px">Position</th>
        <th width = "300px">Equipe</th>
        <th width = "300px">Afficher</th>
        @admin
        <th width = "300px">Modify</th>
        <th width = "300px">Delete</th>
        @endadmin
    </tr>

    @foreach($players as $player)
        <tr>
            <td><b> {{$player->firstname}} </b></td>
            <td><b> {{$player->lastname}} </b></td>
            <td><b> {{$player->age}} </b></td>
            <td><b> {{$player->goals}} </b></td>
            <td><b> {{$player->height}} </b></td>
            <td><b> {{$player->weight}} </b></td>
            <td><b> {{$player->birthdate}} </b></td>
            <td><b> {{$player->position}} </b></td>
            <td><b> {{$player->teams_id}} </b></td>
            
            @csrf
            <td><button class="btn"><a href="{{route('player.show', $player->id)}}">Afficher</a></button></td>
            @admin
            <td><button class="btn"><a href="{{route('player.edit', $player->id)}}">Modifier</a></button></td>
            <td>
                <form action="{{action('PlayerController@destroy', $player->id)}}" method="post">
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce joueur?')">Supprimer</button>
                </form>
            </td>
            @endadmin
        </tr>
    @endforeach
</table>

@admin
<td><button><a  href="{{route('player.create')}}">Nouveau</a></button></td>
@endadmin

@endsection
