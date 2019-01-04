<?php

use App\Match\Match;
use App\Pari\Pari;
use App\User;

 if(Auth::user()->role == "user"){
     echo "oui";
 }
?>

@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Liste des utilisateurs</h3>
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
        <th width = "300px"><b>Nom d'utilisateur</b></th>
        <th width = "300px">Email</th>
        <th width = "150px">Statut</th>
        <th width = "300px">Date de création</th>
        <th width = "300px">Date de dernière modification</th>
        <th width = "300px">Modifier</th>
        <th width = "300px">Supprimer</th>
        
    </tr>

    @foreach($users as $user)
        <tr>
            <td><b> {{$user->name}} </b></td>
            <td><b> {{$user->email}} </b></td>
            <td><b> {{$user->role}} </b></td>
            <td><b> {{$user->created_at}} </b></td>
            <td><b> {{$user->updated_at}} </b></td>
            <td><button class="btn" type="button" onclick="window.location='{{route('user.edit', $user->id)}}'"><a href="{{route('user.edit', $user->id)}}">Modifier</a></button></td>
            <td>
            <form action="{{action('UserController@destroy', $user->id)}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit" onclick="return confirm('Êtes-vous sur de vouloir supprimer cet utilisateur ?')">Supprimer</button>
            </form>
            </td>

        </tr>
    @endforeach

</table>

@admin
<button class="btn" type="button" onclick="window.location='{{route('user.create')}}'">Nouveau</a></button>
@endadmin

@endsection