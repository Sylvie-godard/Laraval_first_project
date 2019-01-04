@extends('layouts.app')

@section('content')

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
    </tr>
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
    </tr>
</table>
<td><button><a  href="{{route('player.index')}}">Retour</a></button></td>

@endsection
