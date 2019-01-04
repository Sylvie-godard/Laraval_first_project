@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Modifier un utilisateur
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('team.update', $team->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nom de l'équipe :</label>
          <input type="text" class="form-control" name="name" value={{ $team->name }} />
        </div>
        <div class="form-group">
          <label for="country">Pays :</label>
          <input type="text" class="form-control" name="country" value={{ $team->country }} />
        </div>
        <div class="form-group">
          <label for="goals">Drapeau :</label>
          <input type="file" class="form-control" name="flag" value={{ $team->flag }} />
        </div>
        <div class="form-group">
          <label for="numberPlayers">Nombre de joueur :</label>
          <input type="number" class="form-control" name="numberPlayers" value={{ $team->numberPlayers }} />
        </div>
        <div class="form-group">
          <label for="numberMatchesWon">Nombre de Matchs gagnés :</label>
          <input type="number" class="form-control" name="numberMatchesWon" value={{ $team->numberMatchesWon }} />
        </div>
        <div class="form-group">
          <label for="numberGoals">Nombre de Buts :</label>
          <input type="number" class="form-control" name="numberGoals" value={{ $team->numberGoals }} />
        </div>

        <div class="form-group">
          <label for="ranking">Classement :</label>
          <input type="number" class="form-control" name="ranking" value={{ $team->ranking }} />
        </div>
        
        <button type="submit" class="btn btn-primary">Modifier</button><br>
        <button><a  href="{{route('team.index')}}">Retour</a></button>
      </form>
  </div>
</div>
@endsection