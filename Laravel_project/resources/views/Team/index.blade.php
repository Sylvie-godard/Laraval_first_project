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
        <th width = "50px"><b>Numéro d'équipe</b></th>
        <th width = "50px"><b>Nom</b></th>
        <th width = "300px">Pays</th>
        <th width = "300px">Nombre de joueurs</th>
        <th width = "300px">Nombre de Maths gagné</th>
        <th width = "300px">Nombre de Buts</th>
        <th width = "300px">Rang</th>
        <th width = "300px">Drapeau</th>
        @admin
        <th width = "300px">Modifier</th>
        <th width = "300px">Supprimer</th>
        @endadmin
    </tr>

    @foreach($teams as $team)
        <tr>
            <td><b> {{$team->id}} </b></td>
            <td><b> {{$team->name}} </b></td>
            <td><b> {{$team->country}} </b></td>
            <td><b> {{$team->numberPlayers}} </b></td>
            <td><b> {{$team->numberMatchesWon}} </b></td>
            <td><b> {{$team->numberGoals}} </b></td>
            <td><b> {{$team->ranking}} </b></td>
            <td><img src="/Images/{{$team->flag}}"></td>
            @admin
            <td><button class="btn"><a href="{{route('team.edit', $team->id)}}">Modifier</a></button></td>
            <td>
            <form action="{{action('TeamController@destroy', $team->id)}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit" onclick="return confirm('Si vous supprimer cette équipe, tous les joueurs de cette équipe seront supprimer. Veuillez changer l\'équipe des joueurs concernés avant de cliquer sur ok ')">Supprimer</button>
            </form>
            </td>
            @endadmin
        </tr>
    @endforeach
</table>

@admin
<td><button><a  href="{{route('team.create')}}">Nouveau</a></button></td>
@endadmin

@endsection